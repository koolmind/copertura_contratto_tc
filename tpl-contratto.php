<?php
/**
 * Template name: Contratto on line
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function loadContrattoData($transientID) {
    $emptyData = array(
        'offerta' => null,
        'step' => null,
        'anagrafica' => null);

    if( false !== ($data = get_transient($transientID) ) ) {
        return $data;
    }
    return $emptyData;
}

function getContrattoID(){
    return isset($_POST['contratto_unique_id']) ? sanitize_text_field($_POST['contratto_unique_id']) : sanitize_text_field($_GET['cuid']);
}


// CARICO I DATI DAL TRANSIENT
$contrattoUID = getContrattoID();
if(!$contrattoUID) die('ERRORE DI SISTEMA: Alcuno parametri sono mancanti.');

$contrattoData = loadContrattoData($contrattoUID);

// recupero e aggiorno i dati della copertura da POST
if( isset($_POST['btn_acquista_offerta']) ) {        
    // salvo i dati base dell'offerta
    $composizione_offerta = array(
        'target'        => sanitize_text_field($_POST["target"]),
        'nomeofferta'   => sanitize_text_field($_POST["cnt-nomeofferta"]),
        'canone'        => sanitize_text_field($_POST["cnt-canone"]),
        'opzioni'       => sanitize_text_field($_POST['options']),
        'costo'         => sanitize_text_field($_POST['cnt-costo']),
        'attivazione'   => sanitize_text_field($_POST['cnt-attivazione'])
    );

    
    // update data
    $contrattoData['offerta'] = $composizione_offerta;
    $contrattoData['step'] = 1;

    set_transient( $contrattoUID, $contrattoData, 0);

    wp_redirect(home_url('/contratto/?cuid='.$contrattoUID));
    exit;
}



get_header(); ?>


<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>
	<?php get_sidebar(); ?>
<?php endif ?>


<div id="primary" <?php astra_primary_class(); ?>>
    <main id="main" class="site-main">
        <?php astra_primary_content_top(); ?>

        <div class="contratto-form-wrapper">

            <?php //var_dump($_POST); ?>

            <?php
                $step = $contrattoData['step'];
                // if($step=='x'){
                //     $section ='common';
                // }
                $section = $contrattoData['offerta']['target'];
                
                include(TC_ADDONS_ROOT . "parts/contratto/{$section}/step-{$step}.php");
            ?>
        </div>

        <?php astra_primary_content_bottom(); ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>
	<?php get_sidebar(); ?>
<?php endif ?>

<?php get_footer(); ?>