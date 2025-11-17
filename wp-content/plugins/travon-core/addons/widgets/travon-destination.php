<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Destination Box Widget .
 *
 */
class Travon_Destination extends Widget_Base {

	public function get_name() {
		return 'travondestination';
	}

	public function get_title() {
		return __( 'Travon Trip Categories', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'destination_section',
			[
				'label' 	=> __( 'Trip Categories', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Select Option', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Show as destination', 'travon' ),
					'2' 		=> __( 'Show as activities', 'travon' ),
				],
			]
		);
		$this->add_control(
			'layout',
			[
				'label' 		=> __( 'Select Layout', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Layout One', 'travon' ),
					'2' 		=> __( 'Layout Two', 'travon' ),
				],
			]
		);

        $this->end_controls_section();


        /*-----------------------------------------destinations styling------------------------------------*/

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Title Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3, {{WRAPPER}} .info-media_title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} h3, {{WRAPPER}} .info-media_title',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3, {{WRAPPER}} .info-media_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3, {{WRAPPER}} .info-media_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------destinations content styling------------------------------------*/

		$this->start_controls_section(
			'content_style_section',
			[
				'label' 	=> __( 'Content Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'destinations_content_color',
			[
				'label' 		=> __( 'Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'destinations_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'destinations_content_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'destinations_content_padding',
			[
				'label' 		=> __( 'Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        if( $settings['layout_style'] == '1' ){
        	if( $settings['layout'] == '1' ){
		        wte_get_template( 'content-template-destination-style-2.php', array( 'taxonomy' => 'destination' ) );
		    }else{
		    	wte_get_template( 'content-template-destination-style-3.php', array( 'taxonomy' => 'destination' ) );
		    }
	    }else{
	    	if( $settings['layout'] == '1' ){
		        wte_get_template( 'content-template-destination-style-2.php', array( 'taxonomy' => 'activities' ) );
		    }else{
		    	wte_get_template( 'content-template-destination-style-3.php', array( 'taxonomy' => 'activities' ) );
		    }
	    }
	}

}