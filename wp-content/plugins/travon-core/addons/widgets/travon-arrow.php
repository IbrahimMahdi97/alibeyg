<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 *
 * Product Widget .
 *
 */
class Travon_Slider_Arrow extends Widget_Base {

	public function get_name() {
		return 'travonsliderarrow';
	}

	public function get_title() {
		return __( 'Slider Arrow', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'slider_arrow_section',
			[
				'label' 	=> __( 'Slider Arrow', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
        $this->add_control(
			'style_class',
			[
				'label' 		=> __( 'Style Class', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> '',
				'rows'			=> 2,
				'description' 	=> 'for example style2, style3'
			]
		);

        $this->add_control(
			'slider_id',
			[
				'label' 		=> __( 'Slider Id?', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> 'p_001',
			]
		);

		$this->add_responsive_control(
			'button_align',
			[
				'label' 		=> __( 'Alignment', 'travon' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'travon' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'travon' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'travon' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 		=> 'left',
				'toggle' 		=> true,
				'selectors' 	=> [
					'{{WRAPPER}}' => 'text-align: {{VALUE}}',
                ],
			]
        );
		

		$this->end_controls_section();

		$this->start_controls_section(
			'general',
			[
				'label' 	=> __( 'General', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'arrow_color',
			[
				'label' 	=> __( 'Arrow Color', 'travon' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slick-arrow' => '--theme-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'arrow_hover_color',
			[
				'label' 	=> __( 'Arrow Hover Color', 'travon' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slick-arrow:hover' => '--white-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'arrow_bg_color',
			[
				'label' 	=> __( 'Arrow Background Color', 'travon' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slick-arrow' => '--white-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'arrow_bg_hover_color',
			[
				'label' 	=> __( 'Arrow Background Hover Color', 'travon' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slick-arrow:hover' => '--theme-color: {{VALUE}}',
                ],
			]
        );

		$this->end_controls_section();

    }


	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="sec-btn">';
            echo '<div class="icon-box '.esc_attr( $settings['style_class'] ).'">';
                echo '<button data-slick-prev="#'.esc_attr( $settings['slider_id'] ).'" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slick-next="#'.esc_attr( $settings['slider_id'] ).'" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>';
            echo '</div>';
        echo '</div>';
	}
}