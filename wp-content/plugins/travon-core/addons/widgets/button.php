<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Button Widget .
 *
 */
class Travon_Button extends Widget_Base {

	public function get_name() {
		return 'travonbutton';
	}

	public function get_title() {
		return __( 'Button', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		// $this->start_controls_section(
		// 	'theme_button',
		// 	[
		// 		'label' 	=> __( 'Theme Button', 'travon' ),
		// 		'tab' 		=> Controls_Manager::TAB_CONTENT,
		// 	]
  //       );
  // //       $this->add_control(
		// // 	'button_style',
		// // 	[
		// // 		'label' 		=> __( 'Button Style', 'mechon' ),
		// // 		'type' 			=> Controls_Manager::SELECT,
		// // 		'default' 		=> '1',
		// // 		'options' 		=> [
		// // 			'1'  		=> __( 'Style One', 'mechon' ),
		// // 			'2' 		=> __( 'Style Two', 'mechon' ),
		// // 			'3' 		=> __( 'Style Three', 'mechon' ),
		// // 		],
		// // 	]
		// // );

  //       $this->end_controls_section();

		$this->start_controls_section(
			'button_section',
			[
				'label' 	=> __( 'Button', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'travon' )
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'travon' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'travon' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
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
					'{{WRAPPER}} .btn-wrapper' => 'text-align: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );


        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn:hover',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Button Shadow', 'travon' ),
				'selector' => '{{WRAPPER}} .ot-btn',
			]
		);
        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        
	        $this->add_render_attribute( 'wrapper', 'class', 'btn-wrapper');
	        $this->add_render_attribute( 'wrapper', 'class', esc_attr(  $settings['button_align'] ) );
        	$this->add_render_attribute( 'button', 'class', 'ot-btn' );
	        
	        if( ! empty( $settings['button_link']['url'] ) ) {
	            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
	        }
	        if( ! empty( $settings['button_link']['nofollow'] ) ) {
	            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
	        }
	        if( ! empty( $settings['button_link']['is_external'] ) ) {
	            $this->add_render_attribute( 'button', 'target', '_blank' );
	        }
	        echo '<!-- Button -->';
	        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
	        	
	        	if( ! empty( $settings['button_text'] ) ) {
	                echo '<a '.$this->get_render_attribute_string('button').'>'.esc_html( $settings['button_text'] ).'</a>';
		        }
	        echo '</div>';
	        echo '<!-- End Button -->';
	}
}