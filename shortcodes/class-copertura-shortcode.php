<?php
namespace PangeaTcrs;

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class CoperturaShortcode {

    private static $_instance = null;

    public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

    public function __construct() {        
        add_shortcode('tc_copertura', array($this, 'tcrsVerificaCoperturaCallback'));
    }

    public function tcrsVerificaCoperturaCallback($atts, $content = null) {
        $default = array(
            'target' => 'az', // az, res
        );

        $atts = shortcode_atts($default, $atts);

        $target = $atts['target'];


        ob_start();
        include TC_ADDONS_ROOT."parts/copertura/form.php";
	    include TC_ADDONS_ROOT."parts/copertura/map.php";
       
        return ob_get_clean(); 
    }
}