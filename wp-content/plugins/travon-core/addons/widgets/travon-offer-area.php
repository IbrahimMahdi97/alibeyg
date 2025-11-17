<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Countdown Widget .
 *
 */
class Travon_Countdown extends Widget_Base {

	public function get_name() {
		return 'travoncountdown';
	}

	public function get_title() {
		return __( 'Travon Countdown', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'countdown_section',
			[
				'label' 	=> __( 'Ofer Area', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );


        $this->add_control(
			'date', [
				'label' 		=> __( 'Offer End Date With Time', 'travon' ),
				'type' 			=> Controls_Manager::DATE_TIME,
				'label_block' 	=> true,
			]
        );

        $this->add_control(
			'offer_image',
			[
				'label' 		=> __( 'Offer Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
        );
        $this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Backgrond Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $offer_date_end = $settings['date'];
		$replace 	= array('-');
		$with 		= array('/');

		$date 	= str_replace( $replace, $with, $offer_date_end );


		$ofr_img 	= $settings['offer_image']['url'] ? $settings['offer_image']['url'] : '#'; 
		$bg_img 	= $settings['bg_image']['url'] ? $settings['bg_image']['url'] : '#'; 

		echo '<div class="offer-box space" data-bg-src="'.esc_url( $bg_img ).'">';
            echo '<img class="offer-img" src="'.esc_url( $ofr_img ).'" alt="offer">';
            echo '<ul class="countdown-list countdown-1" data-offer-date="'.esc_attr($date).'">';
                echo '<li>';
	                echo '<div class="day count-number">'.esc_html('00', 'travon').'</div>';
	                echo '<span class="count-name">'.esc_html('Days', 'travon').'</span>';
	            echo '</li> ';
	            echo '<li>';
	                echo '<div class="hour count-number">'.esc_html('00', 'travon').'</div>';
	                echo '<span class="count-name">'.esc_html('Hours', 'travon').'</span>';
	            echo '</li> ';
	            echo '<li>';
	                echo '<div class="minute count-number">'.esc_html('00', 'travon').'</div>';
	                echo '<span class="count-name">'.esc_html('Min', 'travon').'</span>';
	            echo '</li> ';
	            echo '<li>';
	                echo '<div class="seconds count-number">'.esc_html('00', 'travon').'</div>';
	                echo '<span class="count-name">'.esc_html('Sec', 'travon').'</span>';
	            echo '</li>';
            echo '</ul>';
        echo '</div>';
	}
}