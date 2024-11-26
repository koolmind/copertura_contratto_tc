<?php
if (!defined('ABSPATH')) {
    exit;
}

// picklists
global $sesso;
global $docs;
global $ruoli;
$sesso = array("1"=>"Femmina","2"=>"Maschio");
$docs = array( "1"=>"Carta di identità", "2" => "Patente di guida","4"=>"Passaporto", "5"=>"Permesso di soggiorno" );
$ruoli = array('titolare','legale rappresentante','delegato');


/**
 * transientKey: nome del transient
 * dataSection : nome sezione del transient, e anche prefisso dei suoi campi (nei casi in oggetto, sì)
 * newPrefix   : prefisso dei campi da esportare
 * prepend     : indica se il newPrefix debba essere appeso all'inizio o sostituito
 */
function loadDataFromTransient($transientKey, $dataSection, $newPrefix, $prepend=false) {
    $allTransientData = get_transient($transientKey);
    
    if(!isset($allTransientData[$dataSection])) return null;

    $sectionTransientData  = $allTransientData[$dataSection];

    $out = array();
    foreach($sectionTransientData as $key=>$val) {
        if($prepend){
            $newKey = $newPrefix."_".$key;
        } else {
            $regex = '/'.$dataSection.'/i';
            $newKey = preg_replace($regex, $newPrefix, $key);          
        }            

        $out[$newKey] = $val;     
    }

    return $out;
}

function tcGetFieldValue( $haystack, $needle, $output=true ) {
	$out = null;
	
	if( $haystack && isset($haystack[$needle]) ) $out = sanitize_text_field(wp_unslash($haystack[$needle]));

	if (!$output) return $out;

	echo $out;	
}

function showSteps($curr) {
    
    $allSteps = array(
        "1"=>'anagrafica',
        "2"=>'attivazione',
        "3"=>'consegna',
        "4"=>'linea',
        "5"=>'gdpr',
        "6"=>'pagamento',
        "7"=>'elenchi',
        "8"=>'riepilogo',
        "9"=>'accettazione',        
        "10"=>'download',

    ); ?>

    <div class="steps-track mb-5">
        <ul id="all_steps">
    
    <?php
    foreach($allSteps as $idx=>$label){
        
        $setActive = (intval($idx) == intval($curr)) ? ' active ' : '';
        printf('<li class="%s"><span class="num">%s</span><span class="desc">%s</span></li>', $setActive, $idx, $label);
    } ?>        
    
        </ul>
    </div>
    <?php
}

/**
 * Ritorna il corretto valore formattato, in base al tipo di dato e al suo valore
 * @param $section: sottoinsieme dei dati
 * @param $item: indice dell'array
 * @param $type: tipo di dato (int, str, price, bool, date)
 */
function valOrNull($section, $item, $type) {
    $defaultValue = $type === 'bool' ? 0 : null;
    
    if(!isset($section[$item])) {
        return $defaultValue;
    }

    if($type === 'date') {
        return implode("-", array_reverse(explode("/", $section[$item]) ) );
    }

    if($type === 'price') {
        $newVal = preg_replace( '/,/i', '.', $section[$item] );
        return ( floatval($newVal) > 0 ) ? $newVal : 0;
    }

    if($type === 'int' || $type === 'bool') {
        return intval($section[$item]);
    }

    if($type === 'str') {
        return esc_sql(strval($section[$item]));
    }
}

function saveDataToDb($data, $cID) {
    global $wpdb;
    $table_contratti = $wpdb->prefix . 'contratti';
    $table_elenchi = $wpdb->prefix . 'elenchi';

    // variabili di comodo
    $offerta = $data['offerta'];
    $anagr = $data['anagrafica'];
    $attiv = $data['attivazione'];
    $serv = $data['servizi'];
    $mig = $data['migrazione'];
    $gdpr = $data['gdpr'];
    $pagamento = $data['pagamento'];
    $firme = $data['firme'];
    $elenchi = $data['elenchi'];
    $opzioni = maybe_serialize($offerta['opzioni']);

    // Cancello eventuali righe già presenti nel db con lo stesso codice contratto (succede solo col debug, ma non si sa mai)
    $wpdb->delete( $table_contratti, ['codice' => $cID], ['%s'] );
    $wpdb->delete( $table_elenchi, ['codice' => $cID], ['%s'] );

    // Preparo i dati
    $toSave = array(
        'codice' => $cID,
        'target' => valOrNull($offerta, 'target', 'str'),
        'tipo_accesso' => valOrNull($offerta, 'tipoaccesso', 'str'),
        'nomeofferta' => valOrNull($offerta, 'nomeofferta', 'str'),
        'velocita' => valOrNull($offerta, 'velocita', 'int'),
        'canone' => valOrNull($offerta, 'canone', 'price'),
        'opzioni' => $opzioni,
        'attivazione' => valOrNull($offerta, 'attivazione', 'price'),
        'gestione' => valOrNull($offerta, 'gestione', 'price'),
        'rag_sociale' => valOrNull($anagr, 'rag_sociale', 'str'),
        'azienda_indirizzo' => valOrNull($anagr, 'azienda_indirizzo', 'str'),
        'azienda_civico'=> valOrNull($anagr, 'azienda_civico', 'str'),
        'azienda_citta' => valOrNull($anagr, 'azienda_citta', 'str'),
        'azienda_provincia' => valOrNull($anagr, 'azienda_provincia', 'str'),
        'azienda_cap' => valOrNull($anagr, 'azienda_cap', 'str'),
        'azienda_piva_cf' => valOrNull($anagr, 'azienda_piva_cf', 'str'),
        'azienda_cod_destinatario' => valOrNull($anagr, 'azienda_cod_destinatario', 'str'),
        'azienda_fax' => valOrNull($anagr, 'azienda_fax', 'str'),
        'cliente_ruolo' => valOrNull($anagr, 'cliente_ruolo', 'str'),
        'cliente_email' => valOrNull($anagr, 'cliente_email', 'str'),
        'cliente_telefono' => valOrNull($anagr, 'cliente_telefono', 'str'),
        'cliente_cellulare' => valOrNull($anagr, 'cliente_cellulare', 'str'),
        'cliente_pec' => valOrNull($anagr, 'cliente_pec', 'str'),
        'cliente_cognome' => valOrNull($anagr, 'cliente_cognome', 'str'),
        'cliente_nome' => valOrNull($anagr, 'cliente_nome', 'str'),
        'cliente_sesso' => valOrNull($anagr, 'cliente_sesso', 'int'),
        'cliente_data_nascita' => valOrNull($anagr, 'cliente_data_nascita', 'date'),
        'cliente_luogo_nascita' => valOrNull($anagr, 'cliente_luogo_nascita', 'str'),
        'cliente_provincia_nascita' => valOrNull($anagr, 'cliente_provincia_nascita', 'str'),
        'cliente_cod_fiscale' => valOrNull($anagr, 'cliente_cod_fiscale', 'str'),
        'cliente_nazionalita' => valOrNull($anagr, 'cliente_nazionalita', 'str'),
        'cliente_tipo_documento' => valOrNull($anagr, 'cliente_tipo_documento', 'int'),
        'cliente_doc_numero' => valOrNull($anagr, 'cliente_doc_numero', 'str'),
        'cliente_doc_emittente' => valOrNull($anagr, 'cliente_doc_emittente', 'str'),
        'cliente_doc_rilascio' => valOrNull($anagr, 'cliente_doc_rilascio', 'date'),
        'cliente_doc_scadenza' => valOrNull($anagr, 'cliente_doc_scadenza', 'date'),
        'cliente_indirizzo' => valOrNull($anagr, 'cliente_indirizzo', 'str'),
        'cliente_civico' => valOrNull($anagr, 'cliente_civico', 'str'),
        'cliente_citta' => valOrNull($anagr, 'cliente_citta', 'str'),
        'cliente_provincia' => valOrNull($anagr, 'cliente_provincia', 'str'),
        'cliente_cap' => valOrNull($anagr, 'cliente_cap', 'str'),
        'attivazione_indirizzo' => valOrNull($attiv, 'attivazione_indirizzo', 'str'),
        'attivazione_civico' => valOrNull($attiv, 'attivazione_civico', 'str'),
        'attivazione_citta' => valOrNull($attiv, 'attivazione_citta', 'str'),
        'attivazione_provincia' => valOrNull($attiv, 'attivazione_provincia', 'str'),
        'attivazione_cap' => valOrNull($attiv, 'attivazione_cap', 'str'),
        'servizi_indirizzo' => valOrNull($serv, 'servizi_indirizzo', 'str'),
        'servizi_civico' => valOrNull($serv, 'servizi_civico', 'str'),
        'servizi_citta' => valOrNull($serv, 'servizi_citta', 'str'),
        'servizi_provincia' => valOrNull($serv, 'servizi_provincia', 'str'),
        'servizi_cap' => valOrNull($serv, 'servizi_cap', 'str'),
        'linea_migrazione' => valOrNull($mig, 'linea_migrazione', 'bool'),
        'linea_nuova' => valOrNull($mig, 'linea_nuova', 'bool'),
        'linea_portability' => valOrNull($mig, 'linea_portability', 'bool'),
        'linea_codice_migrazione_1' => valOrNull($mig, 'linea_codice_migrazione_1', 'str'),
        'linea_codice_migrazione_2' => valOrNull($mig, 'linea_codice_migrazione_2', 'str'),
        'linea_numero_1' => valOrNull($mig, 'linea_numero_1', 'str'),
        'linea_numero_2' => valOrNull($mig, 'linea_numero_2', 'str'),
        'linea_numero_3' => valOrNull($mig, 'linea_numero_3', 'str'),
        'linea_numero_4' => valOrNull($mig, 'linea_numero_4', 'str'),
        'linea_rag_sociale' => valOrNull($mig, 'linea_rag_sociale', 'str'),
        'linea_azienda_nome' => valOrNull($mig, 'linea_azienda_nome', 'str'),
        'linea_azienda_indirizzo' => valOrNull($mig, 'linea_azienda_indirizzo', 'str'),
        'linea_azienda_civico'=> valOrNull($mig, 'linea_azienda_civico', 'str'),
        'linea_azienda_citta' => valOrNull($mig, 'linea_azienda_citta', 'str'),
        'linea_azienda_provincia' => valOrNull($mig, 'linea_azienda_provincia', 'str'),
        'linea_azienda_cap' => valOrNull($mig, 'linea_azienda_cap', 'str'),
        'linea_azienda_piva_cf' => valOrNull($mig, 'linea_azienda_piva_cf', 'str'),
        'linea_cliente_ruolo' => valOrNull($mig, 'linea_cliente_ruolo', 'str'),
        'linea_cliente_nome' => valOrNull($mig, 'linea_cliente_nome', 'str'),
        'linea_cliente_cognome' => valOrNull($mig, 'linea_cliente_cognome', 'str'),
        'linea_cliente_sesso' => valOrNull($mig, 'linea_cliente_sesso', 'int'),
        'linea_cliente_data_nascita' => valOrNull($mig, 'linea_cliente_data_nascita', 'date'),
        'linea_cliente_luogo_nascita' => valOrNull($mig, 'linea_cliente_luogo_nascita', 'str'),
        'linea_cliente_provincia_nascita' => valOrNull($mig, 'linea_cliente_provincia_nascita', 'str'),
        'linea_cliente_cod_fiscale' => valOrNull($mig, 'linea_cliente_cod_fiscale', 'str'),
        'linea_cliente_nazionalita' => valOrNull($mig, 'linea_cliente_nazionalita', 'str'),
        'linea_cliente_tipo_documento' => valOrNull($mig, 'linea_cliente_tipo_documento', 'int'),
        'linea_cliente_doc_numero' => valOrNull($mig, 'linea_cliente_doc_numero', 'str'),
        'linea_cliente_doc_emittente' => valOrNull($mig, 'linea_cliente_doc_emittente', 'str'),
        'linea_cliente_doc_rilascio' => valOrNull($mig, 'linea_cliente_doc_rilascio', 'date'),
        'linea_cliente_doc_scadenza'  => valOrNull($mig, 'linea_cliente_doc_scadenza', 'date'),
        'linea_cliente_indirizzo' => valOrNull($mig, 'linea_cliente_indirizzo', 'str'),
        'linea_cliente_civico'=> valOrNull($mig, 'linea_cliente_civico', 'str'),
        'linea_cliente_citta' => valOrNull($mig, 'linea_cliente_citta', 'str'),
        'linea_cliente_provincia' => valOrNull($mig, 'linea_cliente_provincia', 'str'),
        'linea_cliente_cap' => valOrNull($mig, 'linea_cliente_cap', 'str'),
        'linea_consenso_migrazione' => valOrNull($mig, 'linea_consenso_migrazione', 'bool'),
        'linea_consenso_portability' => valOrNull($mig, 'linea_consenso_portability', 'bool'),
        'consenso_marketing' => valOrNull($gdpr, 'consenso_marketing', 'bool'),
        'consenso_profilazione' => valOrNull($gdpr, 'consenso_profilazione', 'bool'),
        'metodo_pagamento' => valOrNull($pagamento, 'metodo_pagamento', 'str'),
        'sdd_intestatario_cognome_nome' => valOrNull($pagamento, 'sdd_intestatario_cognome_nome', 'str'),
        'sdd_intestatario_codfisc_piva' => valOrNull($pagamento, 'sdd_intestatario_codfisc_piva', 'str'),
        'sdd_iban' => valOrNull($pagamento, 'sdd_iban', 'str'),
        'sdd_sottoscrittore_cognome_nome' => valOrNull($pagamento, 'sdd_sottoscrittore_cognome_nome', 'str'),
        'sdd_sottoscrittore_codfisc' => valOrNull($pagamento, 'sdd_intestatario_codfisc_piva', 'str'),       
        'sdd_titolare_linea' => valOrNull($pagamento, 'sdd_sottoscrittore_codfisc', 'str'),
        'sdd_titolare_cognome_nome' => valOrNull($pagamento, 'sdd_titolare_cognome_nome', 'str'),
        'sdd_titolare_codfisc_piva' => valOrNull($pagamento, 'sdd_titolare_codfisc_piva', 'str'),
        'sdd_titolare_recapito' => valOrNull($pagamento, 'sdd_titolare_recapito', 'str'),
        'accettazione_contratto' => valOrNull($firme, 'accettazione_contratto', 'bool'),
        'firma_contratto' => valOrNull($firme, 'firma_contratto', 'bool'),
        'approvazione_articoli_contratto' => valOrNull($firme, 'approvazione_articoli_contratto', 'bool'),
        'data_proposta_contratto' => date("Y-m-d H:i:s")
    );

    $R1 = $wpdb->insert($table_contratti, $toSave);
    
    if ($wpdb->last_error) {
         error_log("Errore MySQL durante l'inserimento: " . $wpdb->last_error);
     } else {
         error_log("Nessun errore MySQL riportato, ma nessuna riga inserita");
     }

     $contrattoID = $wpdb->insert_id;

     error_log('Query SQL generata: ' . $wpdb->last_query);
    
    error_log("Inizio salvataggio Dati Elenco");
    // SALVO I DATI PER GLI ELENCHI
    $toSaveElenchi = array(
        'codice' => $cID,
        'contratto_id' => $contrattoID,
        'elenchi_consenso' => valOrNull($elenchi, 'elenchi_consenso', 'bool'),
        'elenchi_servabbonati' => valOrNull($elenchi, 'elenchi_servabbonati', 'bool'),        
        'elenchi_nome' => valOrNull($elenchi, 'elenchi_nome', 'str'),
        'elenchi_cognome' => valOrNull($elenchi, 'elenchi_cognome', 'str'),
        'elenchi_soloiniziale' => valOrNull($elenchi, 'elenchi_soloiniziale', 'bool'),
        'elenchi_numero' => valOrNull($elenchi, 'elenchi_numero', 'str'),
        'elenchi_indirizzo' => valOrNull($elenchi, 'elenchi_indirizzo', 'str'),
        'elenchi_civico' => valOrNull($elenchi, 'elenchi_civico', 'str'),
        'elenchi_citta' => valOrNull($elenchi, 'elenchi_citta', 'str'),
        'elenchi_provincia' => valOrNull($elenchi, 'elenchi_provincia', 'str'),
        'elenchi_cap' => valOrNull($elenchi, 'elenchi_cap', 'str'),
        'elenchi_titolo' => valOrNull($elenchi, 'elenchi_titolo', 'str'),
        'elenchi_professione' => valOrNull($elenchi, 'elenchi_professione', 'str'),
        'elenchi_nomedanumero' => valOrNull($elenchi, 'elenchi_nomedanumero', 'bool'),
        'elenchi_posta' => valOrNull($elenchi, 'elenchi_posta', 'bool'),
        'data_compilazione' => date("Y-m-d H:i:s")
    );

    $R2 = $wpdb->insert($table_elenchi, $toSaveElenchi);



    // if ($wpdb->last_error) {
    //     error_log("Errore MySQL durante l'inserimento: " . $wpdb->last_error);
    // } else {
    //     error_log("Nessun errore MySQL riportato, ma nessuna riga inserita");
    // }

    // error_log('Query SQL generata: ' . $wpdb->last_query);

    // create Pdf?

    return;
}


function handle_contratto_aziende() {
    $contrattoUID = sanitize_text_field($_POST['cuid']);
    $sezione = sanitize_text_field($_POST['section']);
    $goBack = (bool) isset($_POST['btnContrattoPrev']);
    
 
    // recupero i dati salvati
    $data = get_transient($contrattoUID);

    if($goBack){
        // devo solo tornare allo step precedentemente compilato
        array_pop($data['path']);
        $data['step'] = intval($data['path'][ count($data['path']) - 1]);        
    }
    
    if( ! $goBack){
        // integro coi nuovi dati
        $postData = $_POST['dati'];
        
        foreach($postData as $key=>$val) {
            $data[$sezione][$key] = sanitize_text_field($val);           
        }

        $data['step'] = intval($data['step']) + 1;
        
        //else 
        $data['path'][] = $data['step'];

        // potrei aver inserito uno step nel posto sbagliato, perché magari sono tornato indietro e avevo saltato uno step non necessario (es: prima 1 2 4, adesso 1 2 4 3). Riordino!
        asort($data['path'], SORT_NUMERIC);        
    }
    
    
    // IN OGNI CASO RICARICO LA PAGINA AL GIUSTO STEP e AGGIORNO IL TRANSIENT
    set_transient( $contrattoUID, $data, TC_TRANSIENT_EXP);

    // Se sono allo step 10, devo salvare i dati sul DB! 
    if( $data['step'] == 10 ){
        saveDataToDb($data, $contrattoUID);
    } 
    // ... poi redirect
    wp_redirect(home_url('/contratto/?cuid='.$contrattoUID) );
    
    exit;
}
add_action('admin_post_nopriv_submit_contratto_aziende', 'handle_contratto_aziende');
add_action('admin_post_submit_contratto_aziende', 'handle_contratto_aziende');


function getCapFromDB($provincia, $comune) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'comuni_cap';

    $sql = $wpdb->prepare("SELECT cap FROM {$table_name} WHERE denominazione_provincia=%s AND denominazione_ita LIKE %s LIMIT 0,1", array($provincia, $comune));

    $cap = $wpdb->get_var($sql); // prendo il primo CAP, nel caso ce ne fossero più di uno

    return $cap;
}

function getProvFromDB($provincia) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'comuni_cap';

    $sql = $wpdb->prepare("SELECT sigla_provincia FROM {$table_name} WHERE denominazione_provincia=%s LIMIT 0,1", array($provincia));

    $prv = $wpdb->get_var($sql); // prendo il la prima Provincia, nel caso ce ne fossero più di una

    return $prv;
}


function fixAccents($text) {
    // Array delle sostituzioni
    $replacements = [
        "a'" => "à",
        "e'" => "è",
        "i'" => "ì",
        "o'" => "ò",
        "u'" => "ù",
        "A'" => "À",
        "E'" => "È",
        "I'" => "Ì",
        "O'" => "Ò",
        "U'" => "Ù"
    ];
    
    // Effettua le sostituzioni
    return str_replace(
        array_keys($replacements), 
        array_values($replacements), 
        $text
    );
}