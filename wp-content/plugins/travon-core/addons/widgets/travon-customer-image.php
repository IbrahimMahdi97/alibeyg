<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Client Logo Widget .
 *
 */
class Travon_Client extends Widget_Base {

	public function get_name() {
		return 'travonclientlogo';
	}

	public function get_title() {
		return __( 'Travon Clients', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'client_logo_section',
			[
				'label' 	=> __( 'Client Logo', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'content',
			[
				'label'     => __( 'Content', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Image', 'travon' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
        $this->end_controls_section();




	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<!-----------------------Start partner Logo Slider----------------------->';

        echo '<div class="customer-avater-wrap">';
            echo '<div class="customer-avater-group">';
            	foreach( $settings['gallery'] as $singlelogo ) {
	                echo '<div class="customer-avater">';
	                    echo travon_img_tag( array(
                            'url'   => esc_url( $singlelogo['url'] )
                        ) );
	                echo '</div>';
	            }
            echo '</div>';
            echo '<p class="mb-0">'.wp_kses_post($settings['content']).'</p>';
        echo '</div>';
        echo '<!-----------------------End partner Logo Slider----------------------->';
	}
}