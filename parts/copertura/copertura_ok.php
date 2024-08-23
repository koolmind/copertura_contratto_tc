<?php
// Trovo il prodotto adeguato al risultato tipoCli tecnologia speed
list($down, $up) = explode("/",$speed);

$prodArgs = array(
    'post_type' => 'prodottotcrs',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => "menu_order",
    'order' => 'ASC',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'target',
            'value' => $tipoCli,
            'compare' => '='
        ),
        array(
            'key' => 'banda_down',
            'value' => $down,
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'esclusivita',
            'value' => $esclusivo,
            'compare' => '='
        ),        
    ),
    'tax_query' => array(
        array(
            'taxonomy' => 'tecnologia',
            'field' => 'name',
            'terms' => $tecnologia,
        ),
    ),
);

$prods = new WP_Query($prodArgs);

// Mappo i nomi in maniera più utile per l'utente
$tecToShow = '';
switch ($tecnologia) {
    case 'TCRS_GPON':
    case 'OF_FTTH':
    case 'VULA FTTH':
    case 'Bitstream NGA FTTH':
        $tecToShow = "FTTH";
        break;    
    default:
        $tecToShow = "FTTC";
        break;
}
?>

    <div class="copertura-result-header copertura-ok">
        <img src="<?php echo TC_ADDONS_ROOT_URL;?>/img/tick-round-out.svg" alt="copertura OK" class="ico-esito" />
        <h2>Il tuo indirizzo "<?php echo $indirizzo; ?>" <br/>
        è coperto con tecnologia <?php echo $tecToShow; ?> fino a <?php echo $speed; ?> Mbps.</h2>
    </div>

    <div class="copertura-result">
        
        <div id="result-details">
            <?php if($prods->have_posts()): ?>
                
                <div id="offers-list" class="offer-box">        
            
                <?php while($prods->have_posts()): $prods->the_post(); ?>

                    <div id="offer-details" class="offer-box">
                    <h2><?php echo get_the_title(); ?></h2>
                    </div>
                <?php endwhile; ?>

                </div>
            <?php endif; wp_reset_postdata(); ?>

            
            <div id="offer-options">
                <h3>SERVIZI OPZIONALI</h3>
                <?php // recupero le opzioni disponibili per il prodotto in base al target residenziale / azienda. Poi nascondo quelle che non servono col JS (non ho altro modo)    
                
                $optArgs = array(
                    'post_type' => 'opzionetcrs',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'meta_query' => array(
                        array(
                            'key' => 'target', 
                            'value' => $tipoCli,
                            'compare' => 'LIKE'
                        ),
                    ),
                    'orderby' => "menu_order",
                    'order' => 'ASC'
                );
                
                $opzioni = new WP_Query($optArgs);

                if($opzioni->have_posts()): 
                    while($opzioni->have_posts()): 
                        $opzioni->the_post();

                        $postID = get_the_ID();
                        $slug = get_post_field('post_name', $postID);
                        $title = get_the_title();
                        $desc = get_the_content();
                        $prezzo = get_post_meta($postID,'opzione_prezzo', true);
                        $isMultipla = get_post_meta($postID, 'opzione_multipla', true);
                        $prodotti_collegati = get_post_meta($postID, 'prodotti_collegati', false);
                        
                        
                ?>
                
                <div class="offer-option offer-box" id="opt-<?php echo $slug;?>" data-prodotti="<?php echo implode(";", $prodotti_collegati[0]); ?>">
                    
                    <h3><?php echo $title; ?></h3>
                    <h4><?php echo $prezzo; ?> euro/mese</h4>
                    <?php echo $desc; ?>
                    <button role="button" class="btn-offer-option offer-option-add" data-cost="<?php echo $prezzo; ?>" data-id="<?php echo $slug;?>" data-name="<?php echo $title;?>" data-action="add">+ aggiungi</button>
                </div>

                <?php
                    endwhile; 
                endif;
                wp_reset_postdata();
                ?>

            </div>
        </div> 
        <!-- /result details -->


        <div id="result-cart" class="offer-box">
            
            <?php //echo do_shortcode('[tcrs_offer_details id="2529"  target="cnt" color_theme="azienda"]'); ?>

            <div class="tcrs-box-dettaglio-offerta offerta-azienda">
            
            <div class="dettaglio-top">                
                <h3 id="cart-nome-offerta">NOME OFFERTA SCELTA</h3>

                <ul id="caratteristiche-offerta">
                    <li>Fibra ultraveloce</li>
                    <li>Internet fino a 1Gbps</li>
                    <li>Router Zyxel WiFi 6</li>
                    <li>Attivazione linea gratuita</li>
                </ul>    

                <p class="flex-space-between riga-costo" id="cart-canone">
                    <span>Costo mensile: </span>
                    <span>38,00 €</span>
                </p>
                <p class="flex-space-between riga-costo" id="cart-attivazione">
                    <span>Costo attivazione: </span>
                    <span>25,00 €</span>
                </p>

                <p id="cart-note">Altri costi: Chiamate da fisso verso fissi e mobili nazionali 15 cent/min</p>				
				
                <div id="costi-opzioni"></div>
				
            </div>

            <div class="dettaglio-bottom">
                <p class="flex-space-between riga-costo" id="cart-totale">
                    <span>Totale: </span>
                    <span class="costo">63,00 €</span>
                </p>
                <div class="disclaimer">
                    <p>Hai 14 giorni dall'attivazione per cambiare idea e richiedere la disattivazione della linea.<br>Pensaci!</p>
                </div>

                <div class="flex-align-center">
                    <a class="btn-offerta" href="/abbonati/?parametro2=y">ACQUISTA</a>
                </div>
            </div>

        </div>
        <!-- /result cart -->

    </div>
    <!-- copertura result -->