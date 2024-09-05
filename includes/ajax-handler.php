<?php
//add_action('init', 'debug_ajax_request');

// function debug_ajax_request() {
//     if (defined('DOING_AJAX') && DOING_AJAX) {
//         error_log('Richiesta Ajax ricevuta');
//         error_log('Action: ' . $_POST['action']);
//         error_log('POST data: ' . print_r($_POST, true));
        
//         // Termina l'esecuzione dopo aver loggato i dati
//         if ($_POST['action'] == 'get_transient_data') {
//             wp_send_json(array('debug' => 'Richiesta Ajax intercettata'));
//             exit;
//         }
//     }
// }

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
    
    $x = check_ajax_referer('contratto_nonce', 'nonce');
        
    $transientKey = $_POST['id_transient'];
    $dataSection = $_POST['section'];

    $transientData = get_transient($transientKey);

   if ($transientData === false) {
        wp_send_json_error(array(
            'message' => 'Dati non trovati o scaduti.',
        ));
    } else {
        wp_send_json_success(array(
            'transient_data' => $transientData,
        ));
    }

    wp_die();
}


add_action('wp_ajax_get_transient_data', 'handle_get_transient_data');
add_action('wp_ajax_nopriv_get_transient_data', 'handle_get_transient_data');
