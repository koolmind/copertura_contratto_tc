<?php
function handle_get_transient_data() {
    // Aggiungi questi header se necessario per CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: *");

    // Se è una richiesta OPTIONS, termina qui
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        status_header(200);
        exit();
    }
    
    check_ajax_referer('contratto_nonce', 'nonce');
        
    $transientKey = $_POST['id_transient'];
    $dataSection = $_POST['section'];

    $allTransientData = get_transient($transientKey);
    $sectionTransientData  = $allTransientData[$dataSection];

   if ($transientData === false) {
        wp_send_json_error(array(
            'message' => 'Dati non trovati o scaduti.',
        ));
    } else {
        wp_send_json_success(array(
            'transient_data' => $sectionTransientData,
        ));
    }

    wp_die();
}


add_action('wp_ajax_get_transient_data', 'handle_get_transient_data');
add_action('wp_ajax_nopriv_get_transient_data', 'handle_get_transient_data');
