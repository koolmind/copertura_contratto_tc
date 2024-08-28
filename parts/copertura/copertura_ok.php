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
                
                <div id="offers-list">        
            
                <?php while($prods->have_posts()): 
                    $prods->the_post(); 
                    $offerID = get_the_ID(); 
                    $titolo = get_the_title();
                    $prezzo = get_post_meta( $offerID, "prezzo", true );
                    $attivazione = get_post_meta( $offerID, "costo_attivazione", true );
                    $note = trim(get_post_meta( $offerID, "note", true ));
                    $caratteristiche = get_post_meta( $offerID, "caratteristiche_offerta", true );
                    // $disclaimer = get_post_meta( $offerID, "disclaimer", true );
                    ?>

                    <div class="offer-single offer-box offer-details" 
                        id="offer-<?php echo $offerID; ?>" 
                        data-offer="<?php echo $offerID; ?>"
                        data-name="<?php echo $titolo; ?>"
                        data-price="<?php echo $prezzo; ?>"
                        data-attivazione="<?php echo $attivazione; ?>"
                        data-note="<?php echo $note; ?>"
                        >
                    <h2><?php echo get_the_title(); ?></h2>
                    </div>
                <?php endwhile; ?>

                </div>
            <?php endif; wp_reset_postdata(); ?>

            
            <div id="offer-options" class="hide">
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
                        $quantitaMax = get_post_meta($postID, 'quantita_max', true);
                        $prodotti_collegati = get_post_meta($postID, 'prodotti_collegati', false);
                        
                        
                ?>
                
                <div class="offer-option offer-box" id="opt-<?php echo $slug;?>" data-prodotti="<?php echo implode(";", $prodotti_collegati[0]); ?>">
                    
                    <h3><?php echo $title; ?></h3>
                    <h4><?php echo $prezzo; ?> euro/mese</h4>
                    <?php echo $desc; ?>
                    <button role="button" class="btn-offer-option offer-option-add js-btn-cart-add"  id="btn-opt-<?php echo $slug;?>" 
                        data-cost="<?php echo $prezzo; ?>" 
                        data-id="<?php echo $slug;?>" 
                        data-name="<?php echo $title;?>" 
                        data-multi="<?php echo $isMultipla; ?>" 
                        <?php if($quantitaMax) echo 'data-qmax="'. $quantitaMax . '"'; ?>
                        data-action="add">
                        + aggiungi
                    </button>
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
            
            <form action="http://tcdev.terrecablate.it/tester.php" method="POST">

                <div id="dettaglio-title">                
                    <h3 id="cart-nome-offerta">COMPONI LA TUA OFFERTA <br><small>selezionandone una tra quelle suggerite</small></h3>
                    <input type="hidden" name="cnt-nomeofferta" id="cnt-nomeofferta" value="" />  
                    <ul id="cart-caratteristiche-offerta" class="js_offer_selected_only hide">
                        <li>Fibra ultraveloce</li>
                        <li>Internet fino a 1Gbps</li>
                        <li>Router Zyxel WiFi 6</li>
                        <li>Attivazione linea gratuita</li>
                    </ul>
                </div>

                <div id="dettaglio-mensili">
                    <div class="riga-costo js_offer_selected_only hide">
                        <span>CANONE MENSILE BASE: </span>
                        <span id="cart-canone">0 €</span>
                        <input type="hidden" name="cnt-canone" id="cnt-canone" value="" />  
                    </div>

                    <hr class="js_offer_selected_only hide" />

                    <div class="js_offer_selected_only hide">
                        <span>OPZIONI AGGIUNTIVE: </span>
                        <div id="costi-opzioni">nessuna opzione selezionata</div>
                    </div>

                    <hr class="js_offer_selected_only hide" />

                    <div id="cart-note" class="js_offer_selected_only hide"></div>		            
                </div>

                <div class="dettaglio-bottom js_offer_selected_only hide">
                    <div class="flex-space-between riga-costo" id="cart-totale">
                        <span>Canone mensile: </span>
                        <span class="costo">0 €</span>
                        <input type="hidden" name="cnt-costo" id="cnt-costo" value="" />  
                    </div>
                    <div class="riga-costo">
                        <span class="costo-label">Costo attivazione: </span>
                        <span id="cart-attivazione">0 €</span>
                        <input type="hidden" name="cnt-attivazione" id="cnt-attivazione" value="" />  
                    </div>

                    <!-- <div class="disclaimer">
                        <p>Hai 14 giorni dall'attivazione per cambiare idea e richiedere la disattivazione della linea.<br>Pensaci!</p>
                    </div> -->

                    <div class="flex-align-center js_offer_selected_only hide">
                        <button type="submit" class="btn-offerta" name="btn_acquista_offerta">ACQUISTA</a>
                    </div>
                </div>
                
            </form>
        </div>
        <!-- /result cart -->

    </div>
    <!-- copertura result -->