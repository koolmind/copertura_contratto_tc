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
            'terms' => urldecode($tecnologia),
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
        <!-- <p>La linea Terrecablate sarà attivata con tecnologia <?php //echo $tecnologia;?> </p> -->
    </div>

    <div class="copertura-result">
        
        <div id="result-details">
            <?php if($prods->have_posts()): ?>
                
                <p class="result-text mt-4">Seleziona una delle offerte di seguito riportate e personalizzala con i servizi opzionali che reputi utili.</p>

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
                            data-features="<?php echo $caratteristiche; ?>"                            
                            >
                        <h2><?php echo get_the_title(); ?></h2>
                        </div>
                    <?php endwhile; ?>

                </div>
            <?php endif; wp_reset_postdata(); ?>

            
            <div id="offer-options" class="hide">
                <h3 class="esito-section-title">- SERVIZI OPZIONALI - </h3>
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
                        $isEsclusiva =  get_post_meta($postID, 'opzione_esclusiva', true);
                        $quantitaMax = get_post_meta($postID, 'quantita_max', true);
                        $prodotti_collegati = get_post_meta($postID, 'prodotti_collegati', false);
                        
                        
                ?>
                
                <div class="offer-option offer-box" id="opt-<?php echo $slug;?>" data-prodotti="<?php echo implode(";", $prodotti_collegati[0]); ?>">
                    
                    <h3 class="option-title"><?php echo $title; ?></h3>
                    
                    <div class="option-desc"><?php echo $desc; ?></div>
                    
                    <h4 class="option-price"><?php echo $prezzo; ?> <small>€/mese</small></h4>

                    <button role="button" class="btn-standard offer-option-add js-btn-cart-add my-2"  id="btn-opt-<?php echo $slug;?>" 
                        data-cost="<?php echo $prezzo; ?>" 
                        data-id="<?php echo $slug;?>" 
                        data-name="<?php echo $title;?>" 
                        data-multi="<?php echo intval($isMultipla); ?>" 
                        data-excl="<?php echo intval($isEsclusiva); ?>" 
                        <?php if($quantitaMax) echo 'data-qmax="'. $quantitaMax . '"'; ?>
                        data-action="add">
                        <i class="fas fa-plus"></i> <span>aggiungi</span>
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
            
            <form action="<?php echo home_url( $path = '/contratto'); ?>" method="POST" id="offer-composer-form">

                <div id="dettaglio-titolo">                
                    <h3 id="cart-nome-offerta">COMPONI LA TUA OFFERTA <br><small>selezionandone una tra quelle suggerite</small></h3>
                    <input type="hidden" name="cnt-nomeofferta" id="cnt-nomeofferta" value="" />  
                    <ul id="cart-caratteristiche-offerta" class="js_offer_selected_only hide"></ul>
                </div>

                <div id="dettaglio-mensili">
                    <div class="riga-costo js_offer_selected_only hide">
                        <span><strong>CANONE MENSILE BASE:</strong> </span>
                        <span id="cart-canone" class="text-bold">-</span>
                        <input type="hidden" name="cnt-canone" id="cnt-canone" value="" />  
                    </div>

                    

                    <div class="mt-3 js_offer_selected_only hide">
                        <span><strong>OPZIONI AGGIUNTIVE: </strong></span>
                        <div id="costi-opzioni">nessuna opzione selezionata</div>
                    </div>

                    

                    <div id="cart-note" class="my-2 js_offer_selected_only hide"></div>		            
                </div>

                <div class="dettaglio-bottom js_offer_selected_only hide">
                    <div class="flex-space-between riga-costo" id="cart-totale">
                        <span><strong>Canone mensile:</strong></span>
                        <span class="costo text-bold">-</span>
                        <input type="hidden" name="cnt-costo" id="cnt-costo" value="" />  
                    </div>
                    <div class="riga-costo">
                        <span class="costo-label"><strong>Costo attivazione: </strong></span>
                        <span id="cart-attivazione" class="text-bold">-</span>
                        <input type="hidden" name="cnt-attivazione" id="cnt-attivazione" value="" />  
                    </div>

                    <!-- <div class="disclaimer">
                        <p>Hai 14 giorni dall'attivazione per cambiare idea e richiedere la disattivazione della linea.<br>Pensaci!</p>
                    </div> -->

                    <div id="btn-conferma-offerta" class="js_offer_selected_only hide my-2 text-right">
                        <input type="hidden" name="target" value="<?php echo $tipoCli; ?>" />
                        <input type="hidden" name="contratto_unique_id" value="C-<?php echo uniqid(); ?>" />
                        <input type="hidden" name="tipo_accesso" value="<?php echo $tecnologia; ?>" />
                        <input type="hidden" name="cop_indirizzo" id="cop-indirizzo" value="<?php echo $via; ?>" />  
                        <input type="hidden" name="cop_civico" id="cop-civico" value="<?php echo $nc; ?>" />  
                        <input type="hidden" name="cop_citta" id="cop-citta" value="<?php echo $co; ?>" />  
                        <input type="hidden" name="cop_cap" id="cop-cap" value="<?php echo $cap; ?>" />  
                        <input type="hidden" name="cop_provincia" id="cop-provincia" value="<?php echo $prv; ?>" />  
                        <button type="submit" class="btn-standard btn-offerta" name="btn_acquista_offerta"><span>acquista</span><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
            </form>
        </div>
        <!-- /result cart -->

    </div>
    <!-- copertura result -->