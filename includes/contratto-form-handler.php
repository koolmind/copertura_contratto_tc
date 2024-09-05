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

        foreach($postData as $key=>$val){
            $data[$sezione][$key] = sanitize_text_field($val);
        }

        $data['step'] = intval($data['step']) + 1;
        $data['path'][] = $data['step'];

        // potrei aver inserito uno step nel posto sbagliato, perché magari sono tornato indietro e avevo saltato uno step non necessario (es: prima 1 2 4, adesso 1 2 4 3). Riordino!
        asort($data['path'], SORT_NUMERIC);
    }
    
    
    // IN OGNI CASO RICARICO LA PAGINA AL GIUSTO STEP e AGGIORNO IL TRANSIENT
    set_transient( $contrattoUID, $data, 0);
    wp_redirect(home_url('/contratto/?cuid='.$contrattoUID) );
    exit;
}
add_action('admin_post_nopriv_submit_contratto_aziende', 'handle_contratto_aziende');
add_action('admin_post_submit_contratto_aziende', 'handle_contratto_aziende');
