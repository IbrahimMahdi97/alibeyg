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
class Travon_Group_Button extends Widget_Base {

	public function get_name() {
		return 'travongroupbutton';
	}

	public function get_title() {
		return __( 'Group Button', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'button_section',
			[
				'label' 	=> __( 'Button', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'btn_style',
			[
				'label' 	=> __( 'Button Style', 'dealato' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'dealato' ),
					'2' 		=> __( 'Style Two', 'dealato' ),
				],
			]
		);
        $this->start_controls_tabs(
			'style_tabs3'
		);


		$this->start_controls_tab(
			'style_normal_tab3',
			[
				'label' => esc_html__( 'Button 1', 'travon' ),
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
			'button_label',
			[
				'label' 	=> __( 'Button Label', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Download From', 'travon' ),
                'condition'		=> [ 'btn_style' => '2'],
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
		$this->add_control(
			'button_icon',
			[
				'label' 	=> __( 'Button Icon Class', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2
			]
        );

		$this->add_control(
			'button_icon_position',
			[
				'label' 	=> __( 'Button Icon Position', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Before Text', 'travon' ),
					'2' 		=> __( 'After Text', 'travon' ),
				],
			]
		);
		$this->end_controls_tab();
		//-----------------secound------------------//
		$this->start_controls_tab(
			'style_hover_tab4',
			[
				'label' => esc_html__( 'Button 2', 'travon' ),
			]
		);

		$this->add_control(
			'button_text2',
			[
				'label' 	=> __( 'Button Text', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'travon' )
			]
        );
        $this->add_control(
			'button_label2',
			[
				'label' 	=> __( 'Button Label 2', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Download From', 'travon' ),
                'condition'		=> [ 'btn_style' => '2'],
			]
        );

        $this->add_control(
			'button_link2',
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
		$this->add_control(
			'button_icon2',
			[
				'label' 	=> __( 'Button Icon Class', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2
			]
        );

		$this->add_control(
			'button_icon_position2',
			[
				'label' 	=> __( 'Button Icon Position', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Before Text', 'travon' ),
					'2' 		=> __( 'After Text', 'travon' ),
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();



        $this->add_responsive_control(
			'button_align',
			[
				'label' 		=> __( 'Alignment', 'travon' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'start' 	=> [
						'title' 		=> __( 'Left', 'travon' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'travon' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'end' 	=> [
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

        //---------------------------------------Button Style 1---------------------------------------//

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
					'{{WRAPPER}} .ot-btn.shadow-none' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn.shadow-none:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn.shadow-none' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn.shadow-none:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn.shadow-none',
			]
		);

  //       $this->add_group_control(
		// 	Group_Control_Border::get_type(),
		// 	[
		// 		'name' 		=> 'border_hover',
		// 		'label' 	=> __( 'Border Hover', 'travon' ),
  //               'selector' 	=> '{{WRAPPER}} .ot-btn:hover',
		// 	]
		// );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn.shadow-none',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn.shadow-none' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-btn.shadow-none' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-btn.shadow-none' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Button Shadow', 'travon' ),
				'selector' => '{{WRAPPER}} .ot-btn.shadow-none',
			]
		);

        $this->end_controls_section();
        
        //---------------------------------------Button Style 2---------------------------------------//

		$this->start_controls_section(
			'button_style_section2',
			[
				'label' 	=> __( 'Button 2 Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color2',
			[
				'label' 		=> __( 'Button Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover2',
			[
				'label' 		=> __( 'Button Color Hover', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color2',
			[
				'label' 		=> __( 'Button Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color2',
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
				'name' 		=> 'border2',
				'label' 	=> __( 'Border', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn',
			]
		);

  //       $this->add_group_control(
		// 	Group_Control_Border::get_type(),
		// 	[
		// 		'name' 		=> 'border_hover',
		// 		'label' 	=> __( 'Border Hover', 'travon' ),
  //               'selector' 	=> '{{WRAPPER}} .ot-btn:hover',
		// 	]
		// );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography2',
				'label' 	=> __( 'Button Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin2',
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
			'button_padding2',
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
			'button_border_radius2',
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
				'name' => 'box_shadow2',
				'label' => esc_html__( 'Button Shadow', 'travon' ),
				'selector' => '{{WRAPPER}} .ot-btn',
			]
		);
		
        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', ' class', 'btn-group');
        $this->add_render_attribute( 'wrapper', ' class', esc_attr(  'justify-content-'.$settings['button_align'] ) );
        
		$this->add_render_attribute( 'button1', ' class', 'ot-btn' );
		$this->add_render_attribute( 'button2', ' class', 'ot-btn style3' );
		
	   
        echo '<!-- Button -->';
        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
        	
        	if( ! empty( $settings['button_text'] ) ) {
        		if( ! empty( $settings['button_link']['url'] ) ) {
		            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
		        }
		        if( ! empty( $settings['button_link']['nofollow'] ) ) {
		            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
		        }

		        if( ! empty( $settings['button_link']['is_external'] ) ) {
		            $this->add_render_attribute( 'button', 'target', '_blank' );
		        }

		        if(  $settings['btn_style'] == '1' ) {
	                echo '<a '.$this->get_render_attribute_string('button') .$this->get_render_attribute_string('button1').'>';
	                if( ! empty( $settings['button_icon'] ) && $settings['button_icon_position'] == '1'  ){
						echo wp_kses_post($settings['button_icon']);
					}
	                echo esc_html( $settings['button_text'] );
	                if( ! empty( $settings['button_icon'] ) && $settings['button_icon_position'] == '2'  ){
						echo wp_kses_post($settings['button_icon']);
					}
	                echo '</a>';

	                //-------------------------------- Style 2  for button  --------------------------------//
	                
	            }else{

	            	echo '<a href="'.esc_url( $settings['button_link']['url'] ).'" class="ot-btn media" tabindex="0">';
                        echo '<div class="icon">';
                        	if( ! empty( $settings['button_icon'] ) ){
								echo wp_kses_post($settings['button_icon']);
							}
                        echo '</div>';
                        echo '<div class="media-body">';
                            echo '<span>'.esc_html($settings['button_label']).'</span>';
                            echo '<h6>'.esc_html($settings['button_text']).'</h6>';
                        echo '</div>';
                    echo '</a>';
	            }
	        }
	        if( ! empty( $settings['button_text2'] ) ) {
	        	if( ! empty( $settings['button_link2']['url'] ) ) {
		            $this->add_render_attribute( 'button_l', 'href', esc_url( $settings['button_link2']['url'] ) );
		        }
		        if( ! empty( $settings['button_link']['nofollow'] ) ) {
		            $this->add_render_attribute( 'button_l', 'rel', 'nofollow' );
		        }

		        if( ! empty( $settings['button_link']['is_external'] ) ) {
		            $this->add_render_attribute( 'button_l', 'target', '_blank' );
		        }

		        if(  $settings['btn_style'] == '1' ) {
	                echo '<a '.$this->get_render_attribute_string('button_l') .$this->get_render_attribute_string('button2').'>';
	                if( ! empty( $settings['button_icon2'] ) && $settings['button_icon_position2'] == '1'  ){
						echo wp_kses_post($settings['button_icon2']);
					}
	                echo esc_html( $settings['button_text2'] );
	                if( ! empty( $settings['button_icon2'] ) && $settings['button_icon_position2'] == '2'  ){
						echo wp_kses_post($settings['button_icon2']);
					}
	                echo '</a>';

	                //-------------------------------- Style 2  for button  --------------------------------//


	            }else{
	            	echo '<a href="'.esc_url( $settings['button_link']['url'] ).'" class="ot-btn media" tabindex="0">';
                        echo '<div class="icon">';
                        	if( ! empty( $settings['button_icon2'] ) ){
								echo wp_kses_post($settings['button_icon2']);
							}
                        echo '</div>';
                        echo '<div class="media-body">';
                            echo '<span>'.esc_html($settings['button_label2']).'</span>';
                            echo '<h6>'.esc_html($settings['button_text2']).'</h6>';
                        echo '</div>';
                    echo '</a>';
	            }
	        }
        echo '</div>';
        echo '<!-- End Button -->';
	}
}