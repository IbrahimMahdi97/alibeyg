<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Section Title Widget .
 *
 */
class Travon_Section_Title_Widget extends Widget_Base {

	public function get_name() {
		return 'travonsectiontitle';
	}

	public function get_title() {
		return __( 'Section Title', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Section Title', 'travon' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Title Style', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'travon' ),
					'2' 		=> __( 'Style Two', 'travon' ),
					'3' 		=> __( 'Style Three', 'travon' ),
				],
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'travon' )
			]
        );
		$this->add_control(
			'subtitle_icon',
			[
				'label' 		=> __( 'Fontawesome Icon', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'  		=> __( '<i class="far fa-house-tree"></i>', 'travon' ),
				'condition'		=> ['layout_style' => ['2', '3']]
			]
		);
        $this->add_control(
			'section_title_tag',
			[
				'label' 	=> __( 'Title Tag', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'span'  => 'span',
				],
				'default' => 'span',
			]
        );

        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Subtitle', 'travon' ),
			]
        );

        $this->add_control(
			'section_subtitle_tag',
			[
				'label' 	=> __( 'Subitle Tag', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'p'  => 'P',
					'span'  => 'span',
				],
				'default' 	=> 'h2',
				'condition'	=> ['section_subtitle!' => '']
			]
		);
		$this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Section Description', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'travon' )
			]
        );
        $this->add_responsive_control(
			'section_align',
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
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .title-area' 		=> 'text-align: {{VALUE}};',
					'{{WRAPPER}} .title-selector' 	=> 'text-align: {{VALUE}};',
					'{{WRAPPER}} .sec-desc' 		=> 'text-align: {{VALUE}};',
                ]
			]
		);

        $this->end_controls_section();

        //-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Section Title Style', 'travon' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' 	=> [
                    'section_title!'    => ''
                ]
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Section Title Color', 'travon' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title-selector' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Section Title Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .title-selector',
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Section Title Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Section Title Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();


        //-------------------------------------subtitle styling-------------------------------------//

        $this->start_controls_section(
			'section_subtitle_style_section',
			[
				'label' => __( 'Section Subtitle Style', 'travon' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
		);

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> __( 'Section Subtitle Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_subtitle_typography',
				'label' 	=> __( 'Section Subtitle Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .subtitle-selector',
			]
        );

        $this->add_responsive_control(
			'section_subtitle_margin',
			[
				'label' 		=> __( 'Section Subtitle Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

			]
        );
        $this->add_responsive_control(
			'section_subtitle_padding',
			[
				'label' 		=> __( 'Section Subtitle Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        
        //-------------------------------------description styling-------------------------------------//

        $this->start_controls_section(
			'section_desc_style_section',
			[
				'label' => __( 'Section Description Style', 'travon' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' 	=> [
                    'section_description!'    => ''
                ]
			]
		);

		$this->add_control(
			'section_desc_color',
			[
				'label' 		=> __( 'Section Description Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .desc-selector' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_desc_typography',
				'label' 	=> __( 'Section Description Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .desc-selector',
			]
        );

        $this->add_responsive_control(
			'section_desc_margin',
			[
				'label' 		=> __( 'Section Description Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .desc-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'section_desc_padding',
			[
				'label' 		=> __( 'Section Description Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .desc-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        
        if ( ! empty( $settings['section_description'] ) ) {
	        $this->add_render_attribute( 'wrapper', 'class', 'title-area mb-35' );
	    } else {
	    	$this->add_render_attribute( 'wrapper', 'class', 'title-area' );
	    }

	    if ($settings['section_align'] == 'right' ) {
    		$left_dots = '<span class="shape left"><span class="dots"></span></span>';
    		$right_dots = '';
    		$align_class = 'end';
    	} elseif ($settings['section_align'] == 'left' ) {
    		$left_dots = '';
    		$right_dots = '<span class="shape right"><span class="dots"></span></span>';
    		$align_class = 'start';
    	} else {
    		$left_dots = '<span class="shape left"><span class="dots"></span></span>';
    		$right_dots = '<span class="shape right"><span class="dots"></span></span>';
    		$align_class = 'center';
    	}

		if ( ! empty( $settings['subtitle_icon'])) {
    		$subtitle_icon = $settings['subtitle_icon'];
    	} else {
			$subtitle_icon = '';
		}


		if ( $settings['layout_style'] == '1' ) {
			
			echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';

				if( ! empty( $settings['section_title'] ) ) {
					echo '<'.esc_attr($settings['section_title_tag']).' class="sub-title title-selector justify-content-'.esc_attr($align_class).'">'.wp_kses_post($left_dots).wp_kses_post( $settings['section_title'] ).''.wp_kses_post($right_dots).'</'.esc_attr($settings['section_title_tag']).'>';
				}
				if( !empty( $settings['section_subtitle'] ) ) {
					echo '<'.esc_attr($settings['section_subtitle_tag']).' class="sec-title subtitle-selector">'.wp_kses_post( $settings['section_subtitle'] ).'</'.esc_attr($settings['section_subtitle_tag']).'>';
				}		
			echo '</div>';
			if( ! empty( $settings['section_description'] ) ){
				echo travon_paragraph_tag( array(
					'text'	=> wp_kses_post( $settings['section_description'] ),
					'class'	=> 'sec-desc mt-n2 mb-35'
				) );
			}
		} elseif ( $settings['layout_style'] == '2' ) {

			echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';

			if( ! empty( $settings['section_title'] ) ) {
				echo '<'.esc_attr($settings['section_title_tag']).' class="sub-title2 title-selector">'.wp_kses_post($subtitle_icon).wp_kses_post( $settings['section_title'] ).'</'.esc_attr($settings['section_title_tag']).'>';
			}
			if( !empty( $settings['section_subtitle'] ) ) {
				echo '<'.esc_attr($settings['section_subtitle_tag']).' class="sec-title subtitle-selector">'.wp_kses_post( $settings['section_subtitle'] ).'</'.esc_attr($settings['section_subtitle_tag']).'>';
			}		
			echo '</div>';
			if( ! empty( $settings['section_description'] ) ){
				echo travon_paragraph_tag( array(
					'text'	=> wp_kses_post( $settings['section_description'] ),
					'class'	=> 'sec-desc mt-n2 mb-35'
				) );
			}
		} elseif ( $settings['layout_style'] == '3' ) {

			echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';

			if( ! empty( $settings['section_title'] ) ) {
				echo '<'.esc_attr($settings['section_title_tag']).' class="sub-title3 title-selector">'.wp_kses_post($subtitle_icon).wp_kses_post( $settings['section_title'] ).'</'.esc_attr($settings['section_title_tag']).'>';
			}
			if( !empty( $settings['section_subtitle'] ) ) {
				echo '<'.esc_attr($settings['section_subtitle_tag']).' class="sec-title subtitle-selector">'.wp_kses_post( $settings['section_subtitle'] ).'</'.esc_attr($settings['section_subtitle_tag']).'>';
			}		
			echo '</div>';
			if( ! empty( $settings['section_description'] ) ){
				echo travon_paragraph_tag( array(
					'text'	=> wp_kses_post( $settings['section_description'] ),
					'class'	=> 'sec-desc mt-n2 mb-35'
				) );
			}
		}
	}
}