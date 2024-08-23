<?php
namespace PangeaTcrs;

class Offer_Details_Widget extends \Elementor\Widget_Base {
    
    public function get_name() {
        return 'offer-details-widget';
    }

    public function get_title() {
        return __('Offer Details', 'pangeatcrs');
    }

    public function get_icon() {
		return 'eicon-google-maps';        
	}

	public function get_categories() {
		return [ 'tcrs-widgets' ];
	}

    public function get_script_depends() {
		//return [ 'kgmaps-script' ];
	}

    public function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Settings', 'pangeatcrs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
		$this->add_control(
			'offerta_id',
			[
				'label' => esc_html__( 'Offerta da mostrare', 'pangeatcrs' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->_getOfferte(),
				
			]
		);

        $this->add_control(
			'target',
			[
				'label' => esc_html__( 'Target bottone', 'pangeatcrs' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'cop',
				'options' => [
					'cop' => esc_html__( 'Verifica Copertura', 'pangeatcrs' ),
					'cnt' => esc_html__( 'Sottoscrizione offerta', 'pangeatcrs' ),					
				],
				
			]
		);

        $this->add_control(
			'color_theme',
			[
				'label' => esc_html__( 'Tema colori', 'pangeatcrs' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'azienda',
				'options' => [
                    'azienda' => "Colori Azienda",
                    'residenziale' => "Colori Residenziale"
                ]
				
			]
		);


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $tgt = isset($settings['target']) ? $settings['target'] : 'cop';
        $offerId = isset($settings['offerta_id']) ? $settings['offerta_id'] : null;
        $color_theme = isset($settings['color_theme']) ? $settings['color_theme'] : 'azienda';

        $shortcode_out = sprintf('[tcrs_offer_details id="%s"  target="%s" color_theme="%s"]', $offerId, $tgt, $color_theme);
        echo do_shortcode($shortcode_out);
    }

    private function _getOfferte() {
        $offers = new \WP_Query( array(
            'post_type' => 'prodottotcrs',
            'posts_per_page' => -1
        ));

        $arrOfferte = array();

        if($offers->have_posts()):
            while($offers->have_posts()):
                $offers->the_post();
                $arrOfferte[get_the_ID()] = get_the_title();
            endwhile;
        endif;

        return $arrOfferte;
    }
}