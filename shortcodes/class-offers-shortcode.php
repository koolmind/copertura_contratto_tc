<?php
namespace PangeaTcrs;

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class OffersShortcode {

    private static $_instance = null;

    public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

    public function __construct() {
        
        add_shortcode('tcrs_offer_details', array($this, 'tcrsOfferDetailsCallback'));
    }

    private function _convertPrice($val) {
        $newVal = preg_replace( '/,/i', '.' ,$val );
        return ( floatval($newVal) > 0 ) ? $newVal : 0;
    }

    private function _formatPrice($val) {        
        return intval($val) > 0 ? number_format(floatval($val), 2, "," ,"") . " &euro;" : "GRATIS";
    }
    
    public function tcrsOfferDetailsCallback($atts, $content = null) {
        $default = array(
            'id' => '',
            'target' => 'cop', // cop o cnt
            'color_theme' => 'azienda'
        );
        $atts = shortcode_atts($default, $atts);

        $offertaID = $atts['id'];
        $target = $atts['target'];
        $colorTheme = $atts['color_theme'];

        if(!$offertaID) return "Selezionare un'offerta!";

        $offerta = get_post($offertaID, OBJECT);

        $prezzo = get_post_meta( $offertaID, "prezzo", true );
        $attivazione = get_post_meta( $offertaID, "costo_attivazione", true );
        $note = trim(get_post_meta( $offertaID, "note", true ));
        $caratteristiche = get_post_meta( $offertaID, "caratteristiche_offerta", true );
        $disclaimer = get_post_meta( $offertaID, "disclaimer", true );
        
        $arrFeatures = explode(";", $caratteristiche);

        $prezzo = $this->_convertPrice($prezzo);
        $attivazione = $this->_convertPrice($attivazione);
        
        $totale = floatval($prezzo) + floatval($attivazione);

        $link = "";

        if($target == 'cop') {
            // punto alla verifica copertura
            $txt = "Verifica la copertura";
            $link = "/copertura/?tgt=x";
        } else {
            $txt = "Sottoscrivi l'offerta";
            $link = "/abbonati/?parametro2=y";
        }

        ob_start();
        ?>
        <div class='tcrs-box-dettaglio-offerta offerta-<?php echo $colorTheme ?>'>
            
            <div class='dettaglio-top'>                
                <h3 class='tcrs-nome-offerta'><?php echo $offerta->post_title; ?></h3>

                <?php
                if(count($arrFeatures) > 0):
                    print("<ul class='caratteristiche-offerta'>");
                    
                    foreach($arrFeatures as $feat):
                        printf("<li>%s</li>", $feat);
                    endforeach;
                    
                    print("</ul>");
                endif;
                ?>
    
                <p class="flex-space-between riga-costo" id="canone" >
                    <span>Costo mensile: </span>
                    <span><?php echo $this->_formatPrice($prezzo); ?></span>
                </p>
                <p class="flex-space-between riga-costo" id="attivazione">
                    <span>Costo attivazione: </span>
                    <span><?php echo $this->_formatPrice($attivazione); ?></span>
                </p>

                <?php
                if($note) {
                   printf("<p class='note'>%s</p>", $note);
                }
                ?>
				
				<div id="costi-opzioni"></div>
				
            </div>

            <div class='dettaglio-bottom'>
                <p class="flex-space-between riga-costo" id="totale">
                    <span>Totale: </span>
                    <span class="costo"><?php echo $this->_formatPrice($totale); ?></span>
                </p>
                <div class="disclaimer"><?php echo wpautop($disclaimer); ?></div>

                <div class="flex-align-center">
                    <a class="btn-offerta"href="<?php echo $link; ?>"><?php echo $txt; ?></a>
                </div>
            </div>

        </div>

        <?php
            
        return ob_get_clean(); 
    }
}
