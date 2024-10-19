<?php
/**
 * Plugin Name: TCRS Addons
 * Author: Simone Conti
 * Description: Shortcodes e Widgets per TerreCablate ed. 2024
 * Version: 1.3.9
 * Text Domain: tcrsaddons
 */

 namespace PangeaTcrs;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// ini_set('log_errors', 1);



 if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 $upload_dir = wp_upload_dir();
 $contratti_dir = $upload_dir['basedir'] . '/tcrs-contratti/';
 $contratti_url = $upload_dir['baseurl'] . '/tcrs-contratti/';

 define ('TC_ADDONS_ROOT', trailingslashit( __DIR__) );
 define ('TC_ADDONS_ROOT_URL', plugin_dir_url(__FILE__));
 define ('TC_ADDONS_CONTRATTI_DIR', $contratti_dir); 
 define ('TC_ADDONS_CONTRATTI_URL', $contratti_url); 
 define ('TC_ADDONS_PLACEHOLDER_ID', 4034);
 define ('FPDF_FONTPATH', TC_ADDONS_ROOT . 'vendor/fpdf/font/');
 

 
 include_once __DIR__ .'/shortcodes/class-offers-shortcode.php';
 include_once __DIR__ .'/shortcodes/class-copertura-shortcode.php';
 include_once __DIR__ .'/shortcodes/class-esito-copertura-shortcode.php';
 include_once __DIR__ .'/shortcodes/class-contratto-shortcode.php';

 include_once __DIR__ . '/elementor/class-tcrs-widgets.php';
 //include_once __DIR__ . '/includes/settings-contratto.php';
 include_once __DIR__ . '/includes/contratto-form-handler.php';
 include_once __DIR__ . '/includes/ajax-handler.php';
 include_once __DIR__ . '/includes/generatepdf.php';
  
include_once __DIR__ . '/settings/options-tcrs.php';


class PangeaTerrecablateAddons {
    const VERSION = "1.3.9";

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
        $table_contratti = $wpdb->prefix . 'contratti';
        $table_elenchi = $wpdb->prefix . 'elenchi';
        $charset_collate = $wpdb->get_charset_collate();

        

        $sqlContratti = "CREATE TABLE IF NOT EXISTS $table_contratti (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            codice varchar(25) NOT NULL,
            target varchar(15) NOT NULL,
            tipo_accesso varchar(30) NOT NULL,
            nomeofferta varchar(50) NOT NULL,
            canone decimal(10,2) NOT NULL,
            opzioni text NOT NULL,
            attivazione decimal(10,2) NOT NULL,
            rag_sociale varchar(50) DEFAULT '',
            azienda_indirizzo varchar(100) DEFAULT '',
            azienda_civico varchar(10) DEFAULT '',
            azienda_citta varchar(50) DEFAULT '',
            azienda_provincia char(2) DEFAULT '',
            azienda_cap char(5) DEFAULT '',
            azienda_piva_cf varchar(16) DEFAULT '',
            azienda_cod_destinatario varchar(10) DEFAULT '',
            azienda_fax varchar(20) DEFAULT '',
            cliente_ruolo varchar(25) DEFAULT '',
            cliente_email varchar(50) DEFAULT '',
            cliente_telefono varchar(20) DEFAULT '',
            cliente_cellulare varchar(20) DEFAULT '',
            cliente_pec varchar(50) DEFAULT '',
            cliente_cognome varchar(50) DEFAULT '',
            cliente_nome varchar(50) DEFAULT '',
            cliente_sesso tinyint(1) DEFAULT 0,
            cliente_data_nascita date DEFAULT NULL,
            cliente_luogo_nascita varchar(50) NOT NULL,
            cliente_provincia_nascita char(2) NOT NULL,
            cliente_cod_fiscale char(16) NOT NULL,
            cliente_nazionalita varchar(50) NOT NULL,
            cliente_tipo_documento tinyint(2) NOT NULL,
            cliente_doc_numero varchar(30) NOT NULL,
            cliente_doc_emittente varchar(50) NOT NULL,
            cliente_doc_rilascio date DEFAULT NULL,
            cliente_doc_scadenza date DEFAULT NULL,
            cliente_indirizzo varchar(100) DEFAULT '',
            cliente_civico varchar(10) DEFAULT '',
            cliente_citta varchar(50) DEFAULT '',
            cliente_provincia char(2) DEFAULT '',
            cliente_cap char(5) DEFAULT '',
            attivazione_indirizzo varchar(100) DEFAULT '',
            attivazione_civico varchar(10) DEFAULT '',
            attivazione_citta varchar(50) DEFAULT '',
            attivazione_provincia char(2) DEFAULT '',
            attivazione_cap char(5) DEFAULT '',
            servizi_indirizzo varchar(100) DEFAULT '',
            servizi_civico varchar(10) DEFAULT '',
            servizi_citta varchar(50) DEFAULT '',
            servizi_provincia char(2) DEFAULT '',
            servizi_cap char(5) DEFAULT '',
            linea_migrazione tinyint(1) NOT NULL DEFAULT 0,
            linea_nuova tinyint(1) NOT NULL DEFAULT 0,
            linea_portability tinyint(1) NOT NULL DEFAULT 0,
            linea_codice_migrazione_1 varchar(50) DEFAULT '',
            linea_codice_migrazione_2 varchar(50) DEFAULT '',
            linea_numero_1 varchar(20) DEFAULT '',
            linea_numero_2 varchar(20) DEFAULT '',
            linea_numero_3 varchar(20) DEFAULT '',
            linea_numero_4 varchar(20) DEFAULT '',
            linea_rag_sociale varchar(50) DEFAULT '',
            linea_azienda_nome varchar(50) DEFAULT '',
            linea_azienda_indirizzo varchar(100) DEFAULT '',
            linea_azienda_civico varchar(10) DEFAULT '',
            linea_azienda_citta varchar(50) DEFAULT '',
            linea_azienda_provincia char(2) DEFAULT '',
            linea_azienda_cap char(5) DEFAULT '',
            linea_azienda_piva_cf varchar(16) DEFAULT '',
            linea_cliente_ruolo varchar(25) DEFAULT '',
            linea_cliente_nome varchar(50) DEFAULT '',
            linea_cliente_cognome varchar(50) DEFAULT '',
            linea_cliente_sesso tinyint(1) DEFAULT 0,
            linea_cliente_data_nascita date DEFAULT NULL,
            linea_cliente_luogo_nascita varchar(50) DEFAULT '',
            linea_cliente_provincia_nascita char(2) DEFAULT '',
            linea_cliente_cod_fiscale char(16) NOT NULL,
            linea_cliente_nazionalita varchar(50) DEFAULT '',
            linea_cliente_tipo_documento tinyint(2) DEFAULT 0,
            linea_cliente_doc_numero varchar(30) DEFAULT '',
            linea_cliente_doc_emittente varchar(50) DEFAULT '',
            linea_cliente_doc_rilascio date DEFAULT NULL,
            linea_cliente_doc_scadenza date DEFAULT NULL,
            linea_cliente_indirizzo varchar(100) DEFAULT '',
            linea_cliente_civico varchar(10) DEFAULT '',
            linea_cliente_citta varchar(50) DEFAULT '',
            linea_cliente_provincia char(2) DEFAULT '',
            linea_cliente_cap char(5) DEFAULT '',
            linea_consenso_migrazione tinyint(1) NOT NULL DEFAULT 0,
            linea_consenso_portability tinyint(1) NOT NULL DEFAULT 0,
            consenso_marketing tinyint(1) NOT NULL DEFAULT 0,
            consenso_profilazione tinyint(1) NOT NULL DEFAULT 0,
            metodo_pagamento char(3) DEFAULT '',
            sdd_intestatario_cognome_nome varchar(100) DEFAULT '',
            sdd_intestatario_codfisc_piva varchar(16) DEFAULT '',
            sdd_iban varchar(27) DEFAULT '',
            sdd_sottoscrittore_cognome_nome varchar(100) DEFAULT '',
            sdd_sottoscrittore_codfisc char(16) DEFAULT '',
            sdd_titolare_linea varchar(50) DEFAULT '',
            sdd_titolare_cognome_nome varchar(100) DEFAULT '',
            sdd_titolare_codfisc_piva varchar(16) DEFAULT '',
            sdd_titolare_recapito varchar(50) DEFAULT '',
            accettazione_contratto tinyint(1) NOT NULL DEFAULT 0,
            firma_contratto tinyint(1) NOT NULL DEFAULT 0,
            approvazione_articoli_contratto tinyint(1) NOT NULL DEFAULT 0,
            data_proposta_contratto timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";

        $sqlElenchi = "CREATE TABLE IF NOT EXISTS $table_elenchi (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            contratto_id mediumint(9) NOT NULL,
            codice varchar(25) NOT NULL,
            elenchi_consenso tinyint(1) NOT NULL DEFAULT 0,
            elenchi_servabbonati tinyint(1) NOT NULL DEFAULT 0,
            elenchi_nome varchar(50) DEFAULT '',
            elenchi_cognome varchar(50) DEFAULT '',
            elenchi_soloiniziale tinyint(1) NOT NULL DEFAULT 0,
            elenchi_numero varchar(20) DEFAULT '',
            elenchi_indirizzo varchar(100) DEFAULT '',
            elenchi_civico varchar(10) DEFAULT '',
            elenchi_citta varchar(50) DEFAULT '',
            elenchi_provincia char(2) DEFAULT '',
            elenchi_cap char(5) DEFAULT '',
            elenchi_titolo varchar(30) DEFAULT '',
            elenchi_professione varchar(50) DEFAULT '',
            elenchi_nomedanumero tinyint(1) NOT NULL DEFAULT 0,
            elenchi_posta tinyint(1) NOT NULL DEFAULT 0,
            data_compilazione timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        
        $resC = dbDelta($sqlContratti);        
        error_log('Processo Delta');
        error_log(print_r($resC, true));

        $resE = dbDelta($sqlElenchi);        
        error_log('Processo Delta2');
        error_log(print_r($resE, true));

        // creo la cartella per i contratti
        
        if (!file_exists(TC_ADDONS_CONTRATTI_DIR)) {
            wp_mkdir_p(TC_ADDONS_CONTRATTI_DIR);
        }
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