<?php
namespace PangeaTcrs;

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class EsitoCoperturaShortcode {

    private static $_instance = null;

    public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

    public function __construct() {
        
        add_shortcode('tcrs_esito_copertura', array($this, 'tcrsEsitoCoperturaCallback'));
    }

    
    
    public function tcrsEsitoCoperturaCallback($atts, $content = null) {
        
        $cop = isset($_GET['cop']) ? $_GET['cop'] : null;
        $tipoCli = isset($_GET['cli']) ? $_GET['cli'] : null;
        $esclusivo = isset($_GET['e']) ? intval($_GET['e']) : 0;
        $tecnologia = isset($_GET['t']) ? $_GET['t'] : null;
        
        $via = isset($_GET['via']) ? $_GET['via'] : null;
        $nc = isset($_GET['nc']) ? $_GET['nc'] : null;
        $co = isset($_GET['co']) ? $_GET['co'] : null;
        $prv = isset($_GET['prv']) ? $_GET['prv'] : null;
        $indirizzo = $via . ", " . $co . " (" . $prv . ")";
        
        $speed = isset($_GET['sp']) ? $_GET['sp'] : null;
        $effSpeed = isset($_GET['eff']) ? $_GET['eff'] : null;


        print('<div class="copertura-result-wrapper">');
        
        if (! $cop || ! $tipoCli || ! $tecnologia || ! $indirizzo) {
            include TC_ADDONS_ROOT."parts/copertura/copertura_problem.php";
        } else {
            
            if ($cop=='ok'){
                include TC_ADDONS_ROOT."parts/copertura/copertura_ok.php";
            } else {
                include TC_ADDONS_ROOT."parts/copertura/copertura_ko.php";
            }
        }
        print("</div>");

    }
}
