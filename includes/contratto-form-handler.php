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
        $data['path'][] = $data['step'];

        // potrei aver inserito uno step nel posto sbagliato, perché magari sono tornato indietro e avevo saltato uno step non necessario (es: prima 1 2 4, adesso 1 2 4 3). Riordino!
        asort($data['path'], SORT_NUMERIC);        
    }
    
    
    // IN OGNI CASO RICARICO LA PAGINA AL GIUSTO STEP e AGGIORNO IL TRANSIENT
    set_transient( $contrattoUID, $data, 0);

    // Se sono allo step 9, devo salvare i dati sul DB! 
    if( $data['step'] == 9 ){
        saveDataOnDb($data, $contrattoUID);
    } else {
// ... poi redirect
wp_redirect(home_url('/contratto/?cuid='.$contrattoUID) );
    }

    
    exit;
}
add_action('admin_post_nopriv_submit_contratto_aziende', 'handle_contratto_aziende');
add_action('admin_post_submit_contratto_aziende', 'handle_contratto_aziende');


function toPrice($val) {
    $newVal = preg_replace( '/,/i', '.' ,$val );
    return ( floatval($newVal) > 0 ) ? $newVal : 0;
}

function toSqlDate($val) {
    return implode("-", explode("/",$val) );
}

function saveDataOnDb($data, $cID) {
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
        'target' => $offerta['target'],
        'nomeofferta' => $offerta['nomeofferta'],
        'canone' => toPrice($offerta['canone']),
        'opzioni' => $opzioni,
        'attivazione' => toPrice($offerta['attivazione']),
        'rag_sociale' => $anagr['rag_sociale'],
        'azienda_indirizzo' => $anagr['azienda_indirizzo'],
        'azienda_civico'=> $anagr['azienda_civico'],
        'azienda_citta' => $anagr['azienda_citta'],
        'azienda_provincia' => $anagr['azienda_provincia'],
        'azienda_cap' => $anagr['azienda_cap'],
        'azienda_piva_cf' => $anagr['azienda_piva_cf'],
        'azienda_cod_destinatario' => $anagr['azienda_cod_destinatario'],
        'azienda_fax' => $anagr['azienda_fax'],
        'cliente_ruolo' => $anagr['cliente_ruolo'],
        'cliente_email' => $anagr['cliente_email'],
        'cliente_telefono' => $anagr['cliente_telefono'],
        'cliente_cellulare' => $anagr['cliente_cellulare'],
        'cliente_cognome' => $anagr['cliente_cognome'],
        'cliente_nome' => $anagr['cliente_nome'],
        'cliente_sesso' => intval($anagr['cliente_sesso']),
        'cliente_data_nascita' => toSqlDate($anagr['cliente_data_nascita']),
        'cliente_luogo_nascita' => $anagr['cliente_luogo_nascita'],
        'cliente_provincia_nascita' => $anagr['cliente_provincia_nascita'],
        'cliente_cod_fiscale' => $anagr['cliente_cod_fiscale'],
        'cliente_nazionalita' => $anagr['cliente_nazionalita'],
        'cliente_tipo_documento' => intval($anagr['cliente_tipo_documento']),
        'cliente_doc_numero' => $anagr['cliente_doc_numero'],
        'cliente_doc_emittente' => $anagr['cliente_doc_emittente'],
        'cliente_doc_rilascio' => toSqlDate($anagr['cliente_doc_rilascio']),
        'cliente_doc_scadenza' => toSqlDate($anagr['cliente_doc_scadenza']),
        'cliente_indirizzo' => $anagr['cliente_indirizzo'],
        'cliente_civico' => $anagr['cliente_civico'],
        'cliente_citta' => $anagr['cliente_citta'],
        'cliente_provincia' => $anagr['cliente_provincia'],
        'cliente_cap' => $anagr['cliente_cap'],        
        'attivazione_indirizzo' => $attiv['attivazione_indirizzo'],
        'attivazione_civico' => $attiv['attivazione_civico'],
        'attivazione_citta' => $attiv['attivazione_citta'],
        'attivazione_provincia' => $attiv['attivazione_provincia'],
        'attivazione_cap' => $attiv['attivazione_cap'],
        'servizi_indirizzo' => $serv['servizi_indirizzo'],
        'servizi_civico' => $serv['servizi_civico'],
        'servizi_citta' => $serv['servizi_citta'],
        'servizi_provincia' => $serv['servizi_provincia'],
        'servizi_cap' => $serv['servizi_cap'],           
        'linea_migrazione' => intval($mig['linea_migrazione']),
        'linea_nuova' => intval($mig['linea_nuova']), 
        'linea_portability' => intval($mig['linea_portability']),
        'linea_codice_migrazione_1' => $mig['linea_codice_migazione_1'],
        'linea_codice_migrazione_2' => $mig['linea_codice_migrazione_2'],
        'linea_numero_1' => $mig['linea_numero_1'],
        'linea_numero_2' => $mig['linea_numero_2'],
        'linea_numero_3' => $mig['linea_numero_3'],
        'linea_numero_4' => $mig['linea_numero_4'],
        'linea_rag_sociale' => $mig['linea_rag_sociale'],
        'linea_azienda_nome' => $mig['linea_rag_sociale'],
        'linea_azienda_indirizzo' => $mig['linea_azienda_indirizzo'],
        'linea_azienda_civico'=> $mig['linea_azienda_civico'],
        'linea_azienda_citta' => $mig['linea_azienda_citta'],
        'linea_azienda_provincia' => $mig['linea_azienda_provincia'],
        'linea_azienda_cap' => $mig['linea_azienda_cap'],
        'linea_azienda_piva_cf' => $mig['linea_azienda_piva_cf'],
        'linea_cliente_ruolo' => $mig['linea_cliente_ruolo'],
        'linea_cliente_nome' => $mig['linea_cliente_nome'],
        'linea_cliente_cognome' => $mig['linea_cliente_cognome'],
        'linea_cliente_sesso' => intval($mig['linea_cliente_sesso']),
        'linea_cliente_data_nascita' => toSqlDate($mig['linea_cliente_data_nascita']),
        'linea_cliente_luogo_nascita' => $mig['linea_cliente_luogo_nascita'],
        'linea_cliente_provincia_nascita' => $mig['linea_cliente_provincia_nascita'],
        'linea_cliente_cod_fiscale' => $mig['linea_cliente_cod_fiscale'],
        'linea_cliente_nazionalita' => $mig['linea_cliente_nazionalita'],
        'linea_cliente_tipo_documento' => intval($mig['linea_cliente_tipo_documento']),
        'linea_cliente_doc_numero' => $mig['linea_cliente_doc_numero'],
        'linea_cliente_doc_emittente' => $mig['linea_cliente_doc_emittente'],
        'linea_cliente_doc_rilascio' => toSqlDate($mig['linea_cliente_doc_rilascio']),
        'linea_cliente_doc_scadenza'  => $mig['linea_cliente_doc_scadenza'],
        'linea_cliente_indirizzo' => $mig['linea_cliente_indirizzo'],
        'linea_cliente_civico'=> $mig['linea_cliente_civico'],
        'linea_cliente_citta' => $mig['linea_cliente_citta'],
        'linea_cliente_provincia' => $mig['linea_cliente_provincia'],
        'linea_cliente_cap' => $mig['linea_cliente_cap'],
        'linea_consenso_migrazione' => intval($mig['linea_consenso_migrazione']),
        'linea_consenso_portability' => intval($mig['linea_consenso_portability']),
        'consenso_marketing' => intval($gdpr['consenso_marketing']),
        'consenso_profilazione' => intval($gdpr['consenso_profilazione']),
        'metodo_pagamento' => $pagamento['metodo_pagamento'],
        'sdd_intestatario_cognome_nome' => $pagamento['sdd_intestatario_cognome_nome'],
        'sdd_intestatario_codfisc_piva' => $pagamento['sdd_intestatario_codfisc_piva'],
        'sdd_iban' => $pagamento['sdd_iban'],
        'sdd_sottoscrittore_cognome_nome' => $pagamento['sdd_sottoscrittore_cognome_nome'],
        'sdd_sottoscrittore_codfisc' => $pagamento['sdd_sottoscrittore_codfisc'],        
        'sdd_titolare_linea' => $pagamento['sdd_titolare_linea'],
        'sdd_titolare_cognome_nome' => $pagamento['sdd_titolare_cognome_nome'],
        'sdd_titolare_codfisc_piva' => $pagamento['sdd_titolare_codfisc_piva'],
        'sdd_titolare_recapito' => $pagamento['sdd_titolare_recapito'],
        'accettazione_contratto' => intval($firme['accettazione_contratto']),
        'firma_contratto' => intval($firme['firma_contratto']),
        'approvazione_articoli_contratto' => intval($firme['approvazione_articoli_contratto']),
        'data_proposta_contratto' => date("Y-m-d H:i:s")
    );

    print_r($toSave);

    return;
}