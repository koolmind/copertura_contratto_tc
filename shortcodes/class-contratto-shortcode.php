<?php
namespace PangeaTcrs;

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ContrattoOnLineShortcode {

    private static $_instance = null;
    
    private $contrattoData = null;
    private $contrattoUID = null;

    public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

    public function __construct() {        
        add_shortcode('tcrs_contratto_on_line', array($this, 'tcrsContrattoCallback'));        
    }

    public function tcrsContrattoCallback($atts, $content = null) {
        
        $this->contrattoUID = $this->getContrattoID();
        

        // eseguo lo shortcode solo su frontend, su admin crasha per mancanza di parametri
        if ( ! is_admin() && ! \Elementor\Plugin::$instance->editor->is_edit_mode() && $this->contrattoUID!==null) {        
            
            // CARICO I DATI DAL TRANSIENT
            $this->contrattoData = $this->loadContrattoData($this->contrattoUID);

            echo "<p>DEBUG</p>";
            var_dump($this->contrattoData);
            

            // recupero e aggiorno i dati della copertura da POST
            if( isset($_POST['btn_acquista_offerta'])) {        
                // salvo i dati base dell'offerta
                $composizione_offerta = array(
                    'target'        => sanitize_text_field($_POST["target"]),
                    'nomeofferta'   => sanitize_text_field($_POST["cnt-nomeofferta"]),
                    'canone'        => sanitize_text_field($_POST["cnt-canone"]),
                    'opzioni'       => $_POST['cnt-options'],
                    'costo'         => sanitize_text_field($_POST['cnt-costo']),
                    'attivazione'   => sanitize_text_field($_POST['cnt-attivazione'])
                );
        
                // update data
                $this->contrattoData['offerta'] = $composizione_offerta;
                $this->contrattoData['step'] = 1;
                $this->contrattoData['path'][] = 1; // array contenente tutti gli step che mano mano vengono completati, per tenere traccia di eventuali salti
                $this->contrattoData['anagrafica']['rag_sociale'] = "società pippo";

                set_transient( $this->contrattoUID, $this->contrattoData, 0);
                
                printf("<a href='%s' class='' id='cnt_redir'>skip.</a>", home_url('/contratto/?cuid='.$this->contrattoUID) );
                echo "<script> document.getElementById('cnt_redir').click(); </script>";
                
                exit;
            }  else {
                ob_start();
                
                echo "<div class='contratto-form-wrapper'>";

                $step = $this->contrattoData['step'];
                // if($step=='x'){
                //     $section ='common';
                // }
                $section = $this->contrattoData['offerta']['target'];
                
                include(TC_ADDONS_ROOT .  "parts/contratto/{$section}/step-{$step}.php");

                echo "</div>";

                return ob_get_clean(); 
            }            
            
        } else {
            print ('Impossibile visualizzare il contenuto.');
        }           

    }


    private function loadContrattoData($transientID) {
        if( false !== ($data = get_transient($transientID) ) ) {
            return $data;
        }
        return [];
    }
    
    private function getContrattoID() {
        if ( isset($_POST['contratto_unique_id']) ) return sanitize_text_field($_POST['contratto_unique_id']);
        if ( isset($_GET['cuid']) ) return sanitize_text_field($_GET['cuid']);
        return null;
    }
}
