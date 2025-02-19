<?php
require_once(TC_ADDONS_ROOT . 'vendor/fpdf/fpdf.php');
require_once(TC_ADDONS_ROOT . 'vendor/fpdi2/src/autoload.php');
require_once(TC_ADDONS_ROOT . 'vendor/fpdf/custompdf.php');

function decodeUTF8($text) {
    if(!$text) return "";

    $text = preg_replace('/[\\\\]*/', '', $text); // tolgo tutti gli slash prima degli apostrofi. con stripslshes ne rimane uno.
    // Usa mb_convert_encoding se disponibile
    if (function_exists('mb_convert_encoding')) {
        return mb_convert_encoding($text, 'ISO-8859-1', 'UTF-8');
    }
    // Altrimenti, usa iconv come fallback
    else if (function_exists('iconv')) {
        return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $text);
    }
    // Se nessuna delle due è disponibile, restituisci il testo originale
    // (potrebbe causare problemi con caratteri non-ASCII)

    return $text;
}

function getSesso($sex){
    return $sex==1 ? "F" : "M";
} 

function showDate($date) {
    if( !$date ) return "";
    return implode("/", array_reverse(explode("-",$date)));
}

function showDocumento ($doc) {
    $documents = array( "1"=>"Carta di identità", "2" => "Patente di guida","4"=>"Passaporto", "5"=>"Permesso di soggiorno" );
    return strtoupper($documents[$doc]);
}

function showRuolo ($role) {
    return $ruoli[$role];
}

function showMetodoPagamento ($pag) {
    $modi = array( 
        "cc"    =>"Carta di credito", 
        "11"    =>"Carta di credito", 
        "sdd"   => "Addebito automatico in conto corrente (SDD)",
        "2"     => "Addebito automatico in conto corrente (SDD)"
    );
    return $pag ? strtoupper($modi[$pag]) : "";
}

function money($val){
    if(floatval($val)==0) return "GRATIS";

    return number_format( floatval($val), 2, ",", ".") . " €";
}

function testo($doc, $col) {
    list($R,$G,$B) = explode(',', $col);
    $doc->SetTextColor( intval($R),intval($G),intval($B) );
}

function sfondo($doc, $col) {
    list($R,$G,$B) = explode(',', $col);
    $doc->SetFillColor( intval($R),intval($G),intval($B) );
}

function linea($doc, $col) {
    list($R,$G,$B) = explode(',', $col);
    $doc->SetDrawColor( intval($R),intval($G),intval($B) );
}

function getAllAvailableOptions($tipoCliente, $offerta) {
    global $wpdb;

    $offertaID = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='prodottotcrs'", $offerta ) );

    $optArgs = array(
        'post_type' => 'opzionetcrs',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => 'target', 
                'value' => $tipoCliente,
                'compare' => 'LIKE'
            ),
        ),
        'orderby' => "menu_order",
        'order' => 'ASC'
    );
    
    $allOpzioni = new WP_Query($optArgs);

    $scelteOpzioni = [];
    if($allOpzioni->have_posts()): 
        while($allOpzioni->have_posts()):  
            $allOpzioni->the_post();
           
            $postID = get_the_ID();
            $prodCollegati = get_post_meta($postID,'prodotti_collegati', false);
            
            // controllo se questa opzione è collegata all'offerta impostato dal cliente (nota: siamo in un pre-contratto)
            if(in_array($offertaID, $prodCollegati[0])):
                $temp = array(
                    'title'         => get_the_title(),
                    'desc'          => get_the_content(),
                    'prezzo'        => get_post_meta($postID,'opzione_prezzo', true),
                    'isMultipla'    => get_post_meta($postID, 'opzione_multipla', true),
                    'quantitaMax'   => get_post_meta($postID, 'quantita_max', true),
                );
                $scelteOpzioni[] = $temp;
            endif;
        endwhile;
    endif;

    return $scelteOpzioni;
}

function generate_contratto_pdf($cuid, $isPreContratto = false) { 
    global $elenchiVuoto;

    $blu = "0,79,111";
    $chiaro = "218,233,239";
    $nero = "0,0,0";
    $bianco = "255,255,255";
    $grigio = "128,128,128";
    
    // pdf AgCom
    $pdfAgcom = array(
        'Smart HOME'=> array(
            'ADSL_20'       => 'prospetto-allegato1-156-23-cons-ADSL-20_SmartHome_ADSL.pdf', 
            'FTTC_100'      => 'prospetto-allegato1-156-23-cons-VDSL2-100_SmartHome_FTTC.pdf', 
            'FTTC_200'      => 'prospetto-allegato1-156-23-cons-VDSL2-200_SmartHome_FTTC.pdf', 
            'FTTH_1000_IR'  => 'prospetto-allegato1-156-23-cons-FTTH-1000_SmartHome-IR.pdf',
            'FTTH_1000_FR'  => 'prospetto-allegato1-156-23-cons-FTTH-1000_SmartHome-FR.pdf',
            'FTTH_2500_IR'  => 'prospetto-allegato1-156-23-cons-FTTH-2500_SmartHome_PLUS-IR.pdf',
            'FTTH_2500_FR'  => 'prospetto-allegato1-156-23-cons-FTTH-2500_SmartHome_PLUS-FR.pdf',
        ),
        'Smart HOME Plus'=> array(
            'FTTH_2500_IR'  => 'prospetto-allegato1-156-23-cons-FTTH-2500_SmartHome_PLUS-IR.pdf',
            'FTTH_2500_FR'  => 'prospetto-allegato1-156-23-cons-FTTH-2500_SmartHome_PLUS-FR.pdf',
        ),
        'Smart OFFICE' => array(
            'FTTH_2500_IR'=> null,
            'FTTH_2500_FR'=> null,
        ),
        'Smart OFFICE TCRS'=> array(
            'FTTH_2500_IR'=> null,
            'FTTH_2500_FR'=> null,
        ),
    );

    // fallback per dati elenco non presenti (nei pre contratti)
    $elenchiVuoto = array(
        "elenchi_nome"          => "",
        "elenchi_cognome"       => "",
        "elenchi_soloiniziale"  => null,
        "elenchi_numero"        => "",
        "elenchi_indirizzo"     => "",
        "elenchi_civico"        => "",
        "elenchi_citta"         => "",
        "elenchi_provincia"     => "",
        "elenchi_cap"           => "",
        "elenchi_titolo"        => "",
        "elenchi_professione"   => "",
    );

    // get contract data
    global $wpdb;
    
    $contratti_tbl = $wpdb->prefix . 'contratti';
    $elenchi_tbl = $wpdb->prefix . 'elenchi';

    if( $isPreContratto ) {
        $contratti_tbl = $wpdb->prefix . 'pre_contratti';
        $elenchi_tbl = $wpdb->prefix . 'pre_elenchi';
    }
    
    $cnt = $wpdb->get_row($wpdb->prepare( "SELECT * FROM {$contratti_tbl} WHERE codice = %s ORDER BY data_proposta_contratto DESC LIMIT 0,1", $cuid ), ARRAY_A );
    $ele = $wpdb->get_row($wpdb->prepare( "SELECT * FROM {$elenchi_tbl} WHERE codice = %s", array($cuid) ), ARRAY_A );
        
    // carico header e footer in base al target
    $fileHeaderId = get_option("contratto_header_".$cnt['target']."_image", TC_ADDONS_PLACEHOLDER_ID);
    $fileHeaderPath = get_attached_file( $fileHeaderId );
    
    $fileFooterId = get_option("contratto_footer_".$cnt['target']."_image", TC_ADDONS_PLACEHOLDER_ID);
    $fileFooterPath = get_attached_file( $fileFooterId );

    $fileContrattoId = get_option("contratto_".$cnt['target']."_pdf_file");
    $fileContratto = get_attached_file( $fileContrattoId );
    

    // determino il valore espresso nel campo sondaggio (come hai conosciuto TC)
    global $sondaggio_items;

    $sondaggio_value = "non risponde."; // campo vuoto

    if ( $cnt['sondaggio'] != null && trim($cnt['sondaggio'])!='' ): // campo non vuoto 
        if ( isset( $sondaggio_items[ $cnt['sondaggio'] ] ) ) :
            $sondaggio_value = $sondaggio_items[$cnt['sondaggio']]; // uno dei valori della tendina
        else:
            $sondaggio_value = $cnt['sondaggio']; // campo altro con eventuale specifica
        endif;
    endif;

    include(TC_ADDONS_ROOT .  "parts/pdf/pdf-{$cnt['target']}.php");

    if(file_exists($pdf_file_path)) { // variabile proveniente dall'include
        // Salvo i dati base del contratto su db
        $table_log = $wpdb->prefix . 'contrattilog';
        $logData = array(
            'indirizzo' => preg_replace('/[\\\\]*/', '', $cnt['attivazione_indirizzo']),
            'civico' => preg_replace('/[\\\\]*/', '', $cnt['attivazione_civico']),
            'cap' => $cnt['attivazione_cap'],
            'comune' => preg_replace('/[\\\\]*/', '', $cnt['attivazione_citta']),
            'provincia' => $cnt['attivazione_provincia']
        );
        $resLog = $wpdb->insert(
            $table_log,
            $logData,
            array('%s', '%s', '%s', '%s', '%s')
        );
    }

    return $pdf_file_url;  // variabile proveniente dall'include
}
?>