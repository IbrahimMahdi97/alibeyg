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
 * Pricing Box Widget .
 *
 */
class Travon_Pricing extends Widget_Base {

	public function get_name() {
		return 'travonpricing';
	}

	public function get_title() {
		return __( 'Travon Pricing', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'checklist_section',
			[
				'label' 	=> __( 'Pricing', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 		=> __( 'Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'travon' ),
				],
			]
		);
        $repeater = new Repeater();

		$repeater->add_control(
			'plan',
			[
				'label'     => __( 'Plan Name', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
		$repeater->add_control(
			'text',
			[
				'label'     => __( 'Plan Duration', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
			]
        );
        $repeater->add_control(
			'plan_cost',
			[
				'label'     => __( 'Plan Cost', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'features',
			[
				'label'     => __( 'Features', 'travon' ),
                'type'      => Controls_Manager::WYSIWYG,
			]
        );
        $repeater->add_control(
            'button_text',
            [
                'label'         => __( 'Button Text', 'travon' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
				'rows' 		=> 2,
				'default'		=> __( 'Choose Packages','travon' )
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label'         => __( 'Button Url', 'travon' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
				'rows' 		=> 2,
				'default'		=> '#'
            ]
        );
        $repeater->add_control(
			'make_it_active',
			[
				'label' 		=> __( 'Make It Active?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'travon' ),
				'label_off' 	=> __( 'No', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);
        $this->add_control(
			'steps',
			[
				'label' 		=> __( 'Steps', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'travon' ),
					],
				],
			]
		);

        $this->end_controls_section();

        /*-----------------------------------------GENERAL styling------------------------------------*/

        $this->start_controls_section(
			'basic_styling',
			[
				'label' 	=> __( 'General Styling', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'general_color',
			[
				'label' 		=> __( 'Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card'	=> 'background-color: {{VALUE}};',
				]
			]
        );       
        $this->add_control(
			'price_color',
			[
				'label' 		=> __( 'Price Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_price'	=> '--title-color: {{VALUE}};',
				]
			]
        );
        $this->add_control(
			'price_plan',
			[
				'label' 		=> __( 'Price Plan', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}};',
				]
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
					'{{WRAPPER}} .ot-btn:before, {{WRAPPER}} .ot-btn:after' => 'background-color:{{VALUE}}',
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
        if ( $settings['layout'] == '1' ) { 
			echo '<div class="row gx-0 justify-content-center align-items-center">';
				foreach( $settings['steps'] as $data ) {  
					$active = $data['make_it_active'] == 'yes' ? 'active':'';
					echo '<div class="col-xl-4 col-md-6">';
						echo '<div class="price-card '.esc_attr( $active ).'">';
							if( ! empty( $data['plan'] ) ){
								echo '<h3 class="price-card__title" data-bg-src="'.TRAVON_PLUGDIRURI.'assets/img/price_card_title.svg">'.esc_html( $data['plan'] ).'</h3>';
							}
                            echo '<div class="price-card__content">';
                                echo '<div class="price-card__price">';
                                    echo '<div class="price">';
                                        echo wp_kses_post( $data['plan_cost'] );
                                    echo '</div>';
                                    if( ! empty( $data['text'] ) ){
                                        echo '<span class="package-duration">'.esc_html( $data['text'] ).'</span>';
                                    }
                                echo '</div>';
                                if( ! empty( $data['features'] ) ){
                                    echo wp_kses_post( $data['features'] );
                                }
                                if( ! empty( $data['button_text'] ) ){
                                    echo '<a href="'.esc_url( $data['button_url'] ).'" class="ot-btn style4">'.esc_html( $data['button_text'] ).'<i class="fas fa-arrow-right ms-2"></i></a>';
                                }
                            echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';
	    }
	}
}