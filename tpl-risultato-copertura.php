<?php
/**
 * Template name: Risultato copertura
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// recupero i dati della copertura da GET
$cop = isset($_GET['cop']) ? $_GET['cop'] : null;
$tipoCli = isset($_GET['cli']) ? $_GET['cli'] : null;
$esclusivo = isset($_GET['e']) ? intval($_GET['e']) : 0;
$tecnologia = isset($_GET['t']) ? $_GET['t'] : null;
$indirizzo = isset($_GET['ind']) ? $_GET['ind'] : null;
$speed = isset($_GET['sp']) ? $_GET['sp'] : null;


get_header(); ?>


<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>
	<?php get_sidebar(); ?>
<?php endif ?>


<div id="primary" <?php astra_primary_class(); ?>>
    <main id="main" class="site-main">
        <?php astra_primary_content_top(); ?>

        <div class="copertura-result-wrapper">

            <?php 
            if (! $cop || ! $tipoCli || ! $tecnologia || ! $indirizzo) {
                include "parts/copertura/copertura_problem.php";
            } else {
                
                if ($cop=='ok'){
                    include "parts/copertura/copertura_ok.php";
                } else {
                    include "parts/copertura/copertura_ko.php";
                }
            } ?>
        </div>

        <?php astra_primary_content_bottom(); ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>
	<?php get_sidebar(); ?>
<?php endif ?>

<?php get_footer(); ?>