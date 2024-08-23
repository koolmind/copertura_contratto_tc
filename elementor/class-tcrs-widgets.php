<?php
namespace PangeaTcrs;

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include(__DIR__ .'/widget-categories.php');

final class TcrsElementorAddons {
    private static $_instance = null;

    public static function instance() {
        if(is_null(self::$_instance) ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        // Add plugin actions
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

        // Register widget styles
        add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] );

        // Register widget scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );
    }


    public function register_widgets() {
       require (__DIR__ . '/widgets/wdg-offer-details.php');
       
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \PangeaTcrs\Offer_Details_Widget() );
    }

    public function widget_styles() {
    
    }

    public function widget_scripts() {
        // $apiKey = get_option('kgmap_api_key', '');
      
        // CUSTOM
        // wp_enqueue_script( 'kgmaps-script', plugin_dir_url(__FILE__ ) . 'build/index.js', ['jquery','elementor-frontend','kgmaps-api']);
        // wp_localize_script( 'kgmaps-script', 'kgmData',
		//  	array( 
		//  		'line_color' => $lineColor,
		//  		'graph_color' => $graphColor,
        //         'marker_img' => plugins_url('assets/img/marker.png', __FILE__ )		
		//  	)
		// );
       
    }
}

TcrsElementorAddons::instance();