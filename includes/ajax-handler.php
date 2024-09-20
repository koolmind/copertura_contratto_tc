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


function handleValidateMigrationCode() {
    global $wpdb;
    $codmig = $_POST['migcode'];

    if (strlen($codmig) > 13 && strlen($codmig) < 19) {
        $stringa = substr($codmig, 0, -1);
        $arrstringa = str_split($stringa);
        $controlChar = substr($codmig, -1);

        $posiz = 1;
        $somma = 0;
        foreach ($arrstringa as $carattere) {
            $risultato = $wpdb->get_row(
                $wpdb->prepare(
                    "SELECT pari, dispari FROM {$wpdb->prefix}char_mapping WHERE carattere = %s",
                    $carattere
                ),
                ARRAY_A
            );

            if ($risultato === null) {
                wp_send_json_error(array(
                    'esito'=>'ko', 'message' => 'Errore nella query char_mapping.',
                ));
            }

            $pari = $risultato['pari'];
            $dispari = $risultato['dispari'];

            if ($posiz & 1) {
                // dispari
                $somma += $dispari;
            } else {
                // pari
                $somma += $pari;
            }
            $posiz++;
        }

        $resto = $somma % 26;
        $lettera = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT lettera FROM {$wpdb->prefix}char_resto WHERE resto = %d",
                $resto
            )
        );

        if ($lettera === null) {
            wp_send_json_error(array(
                'esito'=>'ko', 'message' => 'Errore nella query char_resto.',
            ));
        }

        // confronto il carattere di controllo calcolato con quello del codice fornito
        if($controlChar == $lettera){
            wp_send_json_success(array(
                'esito'=>'ok','message' => 'valid',
            ));
        } else {
            wp_send_json_success(array(
                'esito'=>'ok','message' => 'invalid',
            ));
        }        
        
    } else {
        wp_send_json_success(array(
            'esito'=>'ko', 'message' => $codmig." - lunghezza errata",
        ));
    }
    wp_die();
}

add_action('wp_ajax_validate_migration_code', 'handleValidateMigrationCode');
add_action('wp_ajax_nopriv_validate_migration_code', 'handleValidateMigrationCode');
