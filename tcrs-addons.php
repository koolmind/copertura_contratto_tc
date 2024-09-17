<?php
/**
 * Plugin Name: TCRS Addons
 * Author: Simone Conti
 * Description: Shortcodes e Widgets per TerreCablate ed. 2024
 * Version: 1.2.3
 * Text Domain: tcrsaddons
 */

 namespace PangeaTcrs;

 if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 define ('TC_ADDONS_ROOT', trailingslashit( __DIR__) );
 define ('TC_ADDONS_ROOT_URL', plugin_dir_url(__FILE__));
 
 include_once __DIR__ .'/shortcodes/class-offers-shortcode.php';
 include_once __DIR__ .'/shortcodes/class-copertura-shortcode.php';
 include_once __DIR__ .'/shortcodes/class-esito-copertura-shortcode.php';
 include_once __DIR__ .'/shortcodes/class-contratto-shortcode.php';

 include_once __DIR__ . '/elementor/class-tcrs-widgets.php';
 //include_once __DIR__ . '/includes/settings-contratto.php';
 include_once __DIR__ . '/includes/contratto-form-handler.php';
 include_once __DIR__ . '/includes/ajax-handler.php';
 include_once __DIR__ . '/settings/options-tcrs.php';


class PangeaTerrecablateAddons {
    const VERSION = "1.2.3";

    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

    const MINIMUM_PHP_VERSION = '8.0';

    private static $_instance = null;

    public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

    public function __construct() {
        register_activation_hook(__FILE__, [$this, 'tcrs_addons_activate'] );
        //register_deactivation_hook(__FILE__, [$this, 'tcrs_addons_deactivate'] );

        add_action('plugins_loaded', [$this, 'on_plugins_loaded']);
        add_filter('theme_page_templates', [$this, 'register_custom_template']);
        add_filter('page_template', [$this, 'load_custom_template']);
    }
    

    // Funzione di attivazione del plugin
    function tcrs_addons_activate() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'contratti';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            codice varchar(25) NOT NULL,
            target varchar(15) NOT NULL,
            nomeofferta varchar(50) NOT NULL,
            canone float NOT NULL,
            opzioni text NOT NULL,
            attivazione float NOT NULL,
            rag_sociale varchar(50) DEFAULT NULL,
            azienda_indirizzo varchar(150) DEFAULT NULL,
            azienda_civico varchar(10) DEFAULT NULL,
            azienda_citta varchar(50) DEFAULT NULL,
            azienda_provincia varchar(2) DEFAULT NULL,
            azienda_cap varchar(5) DEFAULT NULL,
            azienda_piva_cf varchar(16) DEFAULT NULL,
            azienda_cod_destinatario varchar(10) DEFAULT NULL,
            azienda_fax_cf varchar(30) DEFAULT NULL,
            cliente_ruolo varchar(25) DEFAULT NULL,
            cliente_email varchar(50) DEFAULT NULL,
            cliente_telefono varchar(30) DEFAULT NULL,
            cliente_cellulare varchar(30) DEFAULT NULL,
            cliente_cognome varchar(100) DEFAULT NULL,
            cliente_nome varchar(100) DEFAULT NULL,
            cliente_sesso int(11) DEFAULT NULL,
            cliente_data_nascita date '0000-00-00 00:00:00' NOT NULL,
            cliente_luogo_nascita varchar(50) NOT NULL,
            cliente_provincia_nascita varchar(2) NOT NULL,
            cliente_cod_fiscale varchar(16) NOT NULL,
            cliente_nazionalita varchar(100) NOT NULL,
            cliente_tipo_documento int(11) NOT NULL,
            cliente_doc_numero varchar(50) NOT NULL,
            cliente_doc_emittente varchar(100) NOT NULL,
            cliente_doc_rilascio date '0000-00-00 00:00:00' NOT NULL,
            cliente_doc_scadenza date '0000-00-00 00:00:00' NOT NULL,
            cliente_indirizzo varchar(150) DEFAULT NULL,
            cliente_civico varchar(10) DEFAULT NULL,
            cliente_citta varchar(50) DEFAULT NULL,
            cliente_provincia varchar(2) DEFAULT NULL,
            cliente_cap varchar(5) DEFAULT NULL,
            attivazione_indirizzo varchar(150) DEFAULT NULL,
            attivazione_civico varchar(10) DEFAULT NULL,
            attivazione_citta varchar(50) DEFAULT NULL,
            attivazione_provincia varchar(2) DEFAULT NULL,
            attivazione_cap varchar(5) DEFAULT NULL,
            servizi_indirizzo varchar(150) DEFAULT NULL,
            servizi_civico varchar(10) DEFAULT NULL,
            servizi_citta varchar(50) DEFAULT NULL,
            servizi_provincia varchar(2) DEFAULT NULL,
            servizi_cap varchar(5) DEFAULT NULL,
            linea_migrazione TINYINT(1) NOT NULL DEFAULT 0,
            linea_nuova TINYINT(1) NOT NULL DEFAULT 0,
            linea_portability TINYINT(1) NOT NULL DEFAULT 0,
            date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    // Funzione di disattivazione del plugin
    function tcrs_addons_deactivate() {
        // Codice per pulire tabelle nel database, se necessario
    }


    public function i18n() {
        load_plugin_textdomain('tcrsaddons');
    }

    public function on_plugins_loaded() {
        $this->i18n();

        add_action( 'wp_enqueue_scripts', function(){
            wp_register_style( 'jquery-ui','https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css');
            wp_enqueue_script('sweetalert', 'https://cdn.jsdelivr.net/npm/sweetalert2@10?ver=2.0.0', array(), '2.0', true);
            wp_register_style( 'font-awesome-cop', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css", array(), '5.15.4', 'all' ); 
            
            // boostrap 5.3.3
            wp_register_style('bootstrap5css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css?ver=5.3.3', array(), '5.3.3');
            wp_register_style('bootstrap5js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
            
            wp_register_style("verificacopertura", plugins_url('css/verificacopertura.css', __FILE__ ), array('font-awesome-cop'));
            wp_register_style("contratto", plugins_url('css/contratto.css', __FILE__ ), array('font-awesome-cop'));
            wp_register_script("scc-coperturatcrs", plugins_url( 'js/copertura.js', __FILE__ ), array('jquery','sweetalert','leaflet','easy-autocomplete','axios'), self::VERSION, true);
            wp_register_script("scc-esitocoperturatcrs", plugins_url( 'js/esito.js', __FILE__ ), array(), self::VERSION, true);
            wp_register_script("scc-contratto", plugins_url( 'js/contratto.js', __FILE__ ), array('jquery'), rand(1,32000), true);


            if ( is_page( 'copertura' ) ) {                
                wp_enqueue_style( 'easy-autocomplete', plugins_url( 'vendor/easy-autocomplete/jquery.easy-autocomplete.min.css', __FILE__ ), array(), '1.3.3', 'all' ); 
                wp_enqueue_style( 'leaflet', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css', array(), '1.7.1', 'all' ); 
                wp_enqueue_script('easy-autocomplete', plugins_url( 'vendor/easy-autocomplete/jquery.easy-autocomplete.js',__FILE__), array(), '1.3.3', true);
                wp_enqueue_script( 'axios', plugins_url('vendor/axios.min.js', __FILE__), null, '0.21.0', true ) ; 
                wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', array(), '1.7.1', true);      

                wp_enqueue_style( 'font-awesome-cop' );
                wp_enqueue_style( 'verificacopertura' );

                wp_enqueue_script('scc-coperturatcrs');
                wp_localize_script( 'scc-coperturatcrs', 'copertura_params',array(
                                                        'TCRS_WS_ROOT'  => trailingslashit( plugins_url( 'ws', __FILE__ ) ),
                                                        'TCRS_SITE_URL' => trailingslashit(get_bloginfo('url'))
                ) );
            }

            if( is_page( 'esito-copertura' ) ) {
                wp_enqueue_style( 'bootstrap5css' );
                wp_enqueue_script('bootstrap5js');
                wp_enqueue_style( 'font-awesome-cop' );
                wp_enqueue_style( 'verificacopertura' );

                wp_enqueue_script('scc-esitocoperturatcrs');
                wp_localize_script('scc-esitocoperturatcrs', 'esito_params', array('TC_ADDONS_ROOT_URL'=>TC_ADDONS_ROOT_URL));
            }

            if (is_page('contratto') ) {
                wp_enqueue_script("jquery-ui-datepicker");
                wp_enqueue_style( 'jquery-ui' );
                wp_enqueue_style( 'bootstrap5css' );
                wp_enqueue_script('bootstrap5js');
                wp_enqueue_style( 'contratto' );
                wp_enqueue_script('scc-contratto');
                wp_localize_script('scc-contratto', 'contratto_utils', array(
                    'nonce' => wp_create_nonce('contratto_nonce'),
                    'ajax_url' => admin_url( 'admin-ajax.php')
                ));
            }
            
        });

        OffersShortcode::instance();
        CoperturaShortcode::instance();
        EsitoCoperturaShortcode::instance();
        ContrattoOnLineShortcode::instance();

        if($this->is_compatible()) {
            add_action('elementor/init',[$this,'load_widgets']);
        }
    }

    public function load_widgets() {
        TcrsElementorAddons::instance();
    }

    public function is_compatible(){
        
        // check if Elementor is installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this,'admin_notice_missing_main_plugin']);
            return false;
        }

        // check for the correct version of Elementor
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION,'>=')){
            add_action('admin_notices', [$this,'admin_notice_minimum_elementor_version']);
            return false;
        }

        // check for the right PHP version
        if (!version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION,'>=')){
            add_action('admin_notices', [$this,'admin_notice_minimum_php_version']);
            return false;
        }

        return true;
    }

    public function admin_notice_missing_main_plugin() {
        if(isset($_GET['activate'])) unset($_GET['activate']);

        // 1: plugin name, 2:Elementor
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.','tcrsaddons'),
            '<strong>' . esc_html__("Elementor Test Extension",'tcrsaddons') .  '</strong>',
            '<strong>' . esc_html__("Elementor",'tcrsaddons') .  '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function admin_notice_minumum_elementor_version() {
        if(isset($_GET['activate'])) unset($_GET['activate']);

        // 1: plugin name, 2:Elementor, 3: Required Elementor version (not passed by WP)
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.','tcrsaddons'),
            '<strong>' . esc_html__("Elementor Test Extension",'tcrsaddons') .  '</strong>',
            '<strong>' . esc_html__("Elementor",'tcrsaddons') .  '</strong>', self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    public function admin_notice_minumum_php_version() {
        if(isset($_GET['activate'])) unset($_GET['activate']);

        // 1: plugin name, 2:PHP, 3: Required Elementor version (not passed by WP)
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.','tcrsaddons'),
            '<strong>' . esc_html__("Elementor Test Extension",'tcrsaddons') .  '</strong>',
            '<strong>' . esc_html__("Elementor",'tcrsaddons') .  '</strong>', self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }
    

    public function register_custom_template($templates) {
        $templates['tpl-risultato-copertura.php'] = 'Risultato copertura';
        $templates['tpl-contratto.php'] = 'Contratto on line';
        return $templates;
    }

    public function load_custom_template($template) {
        // if (get_page_template_slug() === 'tpl-risultato-copertura.php') {
        //     $template = plugin_dir_path(__FILE__) . 'tpl-risultato-copertura.php';
        // }

        if (get_page_template_slug() === 'tpl-contratto.php') {
            $template = plugin_dir_path(__FILE__) . 'tpl-contratto.php';
        }
        return $template;
    }

}
 
PangeaTerrecablateAddons::instance();