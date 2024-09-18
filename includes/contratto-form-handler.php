<?php
if (!defined('ABSPATH')) {
    exit;
}

function tcGetFieldValue( $haystack, $needle, $output=true ) {
	$out = null;
	
	if( $haystack && isset($haystack[$needle]) ) $out = esc_attr($haystack[$needle]);

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
        "7"=>'riepilogo',
        "8"=>'accettazione',
        "9"=>'download',

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
        
        //if($data['step'] > 9) $data['step'] = 9;

        //else 
        $data['path'][] = $data['step'];

        // potrei aver inserito uno step nel posto sbagliato, perché magari sono tornato indietro e avevo saltato uno step non necessario (es: prima 1 2 4, adesso 1 2 4 3). Riordino!
        asort($data['path'], SORT_NUMERIC);        
    }
    
    
    // IN OGNI CASO RICARICO LA PAGINA AL GIUSTO STEP e AGGIORNO IL TRANSIENT
    set_transient( $contrattoUID, $data, 0);

    // Se sono allo step 9, devo salvare i dati sul DB! 
    if( $data['step'] == 9 ){
        saveDataToDb($data, $contrattoUID);
    } 
    // ... poi redirect
    wp_redirect(home_url('/contratto/?cuid='.$contrattoUID) );
    
    exit;
}
add_action('admin_post_nopriv_submit_contratto_aziende', 'handle_contratto_aziende');
add_action('admin_post_submit_contratto_aziende', 'handle_contratto_aziende');


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
        return implode("-", explode("/", $section[$item]) );
    }

    if($type === 'price') {
        $newVal = preg_replace( '/,/i', '.', $section[$item] );
        return ( floatval($newVal) > 0 ) ? $newVal : 0;
    }

    if($type === 'int' || $type === 'bool') {
        return intval($section[$item]);
    }

    if($type === 'str') {
        return strval($section[$item]);
    }
}

function saveDataToDb($data, $cID) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contratti';

    // variabili di comodo
    $offerta = $data['offerta'];
    $anagr = $data['anagrafica'];
    $attiv = $data['attivazione'];
    $serv = $data['servizi'];
    $mig = $data['migrazione'];
    $gdpr = $data['gdpr'];
    $pagamento = $data['pagamento'];
    $firme = $data['firme'];
    $opzioni = maybe_serialize($offerta['opzioni']);

    $toSave = array(
        'codice' => $cID,
        'target' => valOrNull($offerta, 'target', 'str'),
        'tipo_accesso' => valOrNull($offerta, 'tipoaccesso', 'str'),
        'nomeofferta' => valOrNull($offerta, 'nomeofferta', 'str'),
        'canone' => valOrNull($offerta, 'canone', 'price'),
        'opzioni' => $opzioni,
        'attivazione' => valOrNull($offerta, 'attivazione', 'price'),
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
        'linea_codice_migrazione_1' => valOrNull($mig, 'linea_codice_migazione_1', 'str'),
        'linea_codice_migrazione_2' => valOrNull($mig, 'linea_codice_migazione_2', 'str'),
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

    $wpdb->insert($table_name, $toSave);

    // if ($wpdb->last_error) {
    //     error_log("Errore MySQL durante l'inserimento: " . $wpdb->last_error);
    // } else {
    //     error_log("Nessun errore MySQL riportato, ma nessuna riga inserita");
    // }

    // error_log('Query SQL generata: ' . $wpdb->last_query);

    // create Pdf?

    return;
}