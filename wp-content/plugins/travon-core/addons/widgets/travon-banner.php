<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Banner Widget.
 *
 */
class Travon_Banner extends Widget_Base {

	public function get_name() {
		return 'travonbanner';
	}

	public function get_title() {
		return __( 'Banner', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Banner_section',
			[
				'label' 	=> __( 'Banner', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'banner_style',
			[
				'label' 		=> __( 'Banner Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'travon' ),
					'2' 		=> __( 'Style Two', 'travon' ),
					'3' 		=> __( 'Style Three', 'travon' ),
					'4' 		=> __( 'Style Four', 'travon' ),
					'5' 		=> __( 'Style Five', 'travon' ),
					'6' 		=> __( 'Style Six', 'travon' ),
					'7' 		=> __( 'Style Seven', 'travon' ),
				],
			]
		);

		/*-----------------------------------------style one ------------------------------------*/

		$repeater = new Repeater();

        $repeater->add_control(
            'banner_img',
            [
                'label'     => __( 'Banner Image', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater->add_control(
			'banner_title', [
				'label' 		=> __( 'Title', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Affordable Prices For' , 'travon' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'banner_subtitle', [
				'label' 		=> __( 'Subtitle', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Professional Care' , 'travon' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'banner_subtitle2', [
				'label' 		=> __( 'Subtitle 2', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Professional Care' , 'travon' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'banner_desc', [
				'label' 		=> __( 'Description', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 3,
				'default' 		=> __( 'Professional Care' , 'travon' ),
				'label_block' 	=> true,
			]
        );
        
        $repeater->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'travon' ),
			]
        );

        $repeater->add_control(
			'button_link_1',
			[
				'label' 		=> esc_html__( 'First Button Link', 'travon' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'travon' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$this->add_control(
			'banners_one',
			[
				'label' 		=> __( 'Banners', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'banner_title' 		=> __( 'Banner One', 'travon' ),
					],
				],
				'title_field' 	=> '{{{ banner_title }}}',
				'condition'		=> [ 'banner_style' =>  ['1']  ],
			]
		);

		/*-----------------------------------------style Two, Three ------------------------------------*/
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Image', 'travon' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
				'condition'		=> [ 'banner_style' =>  ['3', '5', '6']  ],
			]
		);
		$this->add_control(
            'banner_img',
            [
                'label'     => __( 'Banner Image', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'banner_style' =>  ['2', '3', '4', '7']  ],
            ]
        );
		$this->add_control(
			'banner_form', [
				'label' 		=> __( 'Form Shortcode', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'		=> [ 'banner_style' =>  ['1', '2', '3', '4', '5', '6', '7']  ],
			]
        );
        $this->add_control(
			'banner_title', [
				'label' 		=> __( 'Title', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Affordable Prices For' , 'travon' ),
				'label_block' 	=> true,
				'condition'		=> [ 'banner_style' =>  ['2', '3', '4', '5', '6', '7']  ],
			]
        );
        $this->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Affordable Prices For' , 'travon' ),
				'label_block' 	=> true,
				'condition'		=> [ 'banner_style' =>  ['5', '7']  ],
			]
        );
        $this->add_control(
			'banner_title3', [
				'label' 		=> __( 'Title 3', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Affordable Prices For' , 'travon' ),
				'label_block' 	=> true,
				'condition'		=> [ 'banner_style' =>  ['5', '7']  ],
			]
        );
        $this->add_control(
			'banner_subtitle', [
				'label' 		=> __( 'Subtitle', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Professional Care' , 'travon' ),
				'label_block' 	=> true,
				'condition'		=> [ 'banner_style' =>  ['2', '3', '4', '6']  ],
			]
        );
        $this->add_control(
			'banner_subtitle2', [
				'label' 		=> __( 'Subtitle 2', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Professional Care' , 'travon' ),
				'label_block' 	=> true,
				'condition'		=> [ 'banner_style' =>  ['2', '3', '4']  ],
			]
        );
        $this->add_control(
			'banner_desc', [
				'label' 		=> __( 'Description', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 3,
				'default' 		=> __( 'Professional Care' , 'travon' ),
				'label_block' 	=> true,
				'condition'		=> [ 'banner_style' =>  ['2']  ],
			]
        );

        $this->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'travon' ),
                'condition'		=> [ 'banner_style' =>  ['2', '3', '4']  ],
			]
        );

        $this->add_control(
			'button_link_1',
			[
				'label' 		=> esc_html__( 'First Button Link', 'travon' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'travon' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'		=> [ 'banner_style' =>  ['2', '3', '4']  ],
			]
		);
        
        $this->add_control(
			'button_text_2',
			[
				'label' 	=> esc_html__( 'Video Button Text', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'travon' ),
                'condition'		=> [ 'banner_style' =>  ['2']  ],
			]
        );

        $this->add_control(
			'button_link_2',
			[
				'label' 		=> esc_html__( 'Video Button Link', 'travon' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'travon' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'		=> [ 'banner_style' =>  ['2']  ],
			]
		);

		/*----------------------------------------- some extra field for four ------------------------------------*/
		$this->add_control(
            'banner_bg_img',
            [
                'label'     => __( 'Banner Background Image', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'banner_style' =>  ['4', '5', '7']  ],
            ]
        );
		$this->add_control(
            'banner_img_shape',
            [
                'label'     => __( 'Banner Image Shape', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'banner_style' =>  ['4']  ],
            ]
        );
		$this->add_control(
            'banner_video_img',
            [
                'label'     => __( 'Banner Video Image', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'banner_style' =>  ['4']  ],
            ]
        );
		$this->add_control(
			'banner_video_link',
			[
				'label' 		=> __( 'Video Link', 'travon' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'travon' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> 'https://www.youtube.com/watch?v=_sI_Ps7JSEk',
				],
				'condition'		=> [ 'banner_style' =>  ['4']  ],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'shapw_section',
			[
				'label' 	=> __( 'Shape', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'banner_style' =>  ['2', '4', '5', '6']  ],
			]
        );
        $this->add_control(
            'shape_img1',
            [
                'label'     => __( 'shape Image 1', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_control(
            'shape_img2',
            [
                'label'     => __( 'shape Image 2', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_control(
            'shape_img3',
            [
                'label'     => __( 'shape Image 3', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_control(
            'shape_img4',
            [
                'label'     => __( 'shape Image 4', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_control(
            'shape_img5',
            [
                'label'     => __( 'shape Image 5', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_control(
            'shape_img6',
            [
                'label'     => __( 'shape Image 6', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->end_controls_section();

		

        //---------------------------------------Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .hero-subtitle',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//---------------------------------------SUBTitle Style---------------------------------------//

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Subtitle Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Subtitle Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h1, {{WRAPPER}} h2' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( 'Subtitle Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} h1, {{WRAPPER}} h2',
			]
        );
        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h1, {{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Subtitle Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h1, {{WRAPPER}} h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//---------------------------------------Desc Style---------------------------------------//

		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Desc Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Subtitle Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-text' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Subtitle Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .hero-text',
			]
        );
        $this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Subtitle Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-btn::before, {{WRAPPER}} .ot-btn::after' => '--title-color:{{VALUE}}',
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

		if ( $settings['banner_style'] == '1' ) {
			echo '<div class="ot-hero-wrapper hero-1">';
		        echo '<div class="hero-slider ot-carousel" data-fade="true">';
		        	foreach( $settings['banners_one'] as $data ) {
			            echo '<div class="ot-hero-slide">';

			                if(!empty($data['banner_img']['url'])){
					            echo '<div class="ot-hero-bg" data-bg-src="'.esc_url($data['banner_img']['url']).'">';
					            echo '</div>';
					        } 

			                echo '<div class="container z-index-common">';
			                    echo '<div class="hero-style1">';
			                    	if(!empty($data['banner_title'])){
				                        echo '<span class="sub-title hero-subtitle" data-ani="slideinup" data-ani-delay="0.1s">'.esc_html($data['banner_title']).'</span>';
				                    }
				                    if(!empty($data['banner_subtitle'])){
				                        echo '<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.2s">'.esc_html($data['banner_subtitle']).'</h1>';
				                    }
				                    if(!empty($data['banner_subtitle2'])){
				                        echo '<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.3s">'.esc_html($data['banner_subtitle2']).'</h1>';
				                    }
				                    if(!empty($data['banner_desc'])){
				                        echo '<p class="hero-text" data-ani="slideinup" data-ani-delay="0.4s">'.esc_html($data['banner_desc']).'</p>';
				                    }
				                    if(!empty($data['button_text_1'])){
				                        echo '<a href="'.esc_url( $data['button_link_1']['url'] ).'" class="ot-btn" data-ani="slideinup" data-ani-delay="0.5s">'.esc_html($data['button_text_1']).'</a>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			        }  
		        echo '</div>';
		    echo '</div>';
			echo '<div class="hero-form2">';
				echo '<div class="container">';
					echo $settings['banner_form'];
				echo '</div>';
			echo '</div>';
		} elseif ( $settings['banner_style'] == '2' ) {
			echo '<div class="ot-hero-wrapper hero-2">';
		        echo '<div class="ot-hero-slide">';
		            if(!empty($settings['banner_img']['url'])){
			            echo '<div class="ot-hero-bg" data-bg-src="'.esc_url($settings['banner_img']['url']).'">';
			            echo '</div>';
			        }
		            echo '<div class="container z-index-common">';
		                echo '<div class="hero-style2">';
		                	if(!empty($settings['banner_title'])){
			                    echo '<span class="sub-title hero-subtitle">';
			                        echo $settings['banner_title'];
			                        echo '<span class="shape right"> <span class="dots"></span></span>';
			                    echo '</span>';
			                }
			                if(!empty($settings['banner_subtitle'])){
			                    echo '<h1 class="hero-title">'.esc_html($settings['banner_subtitle']).'</h1>';
			                }
			                if(!empty($settings['banner_subtitle2'])){
			                    echo '<h1 class="hero-title">'.esc_html($settings['banner_subtitle2']).'</h1>';
			                }
			                if(!empty($settings['banner_desc'])){
			                    echo '<p class="hero-text">'.esc_html($settings['banner_desc']).'</p>';
			                }
		                    echo '<div class="btn-group">';
		                    	if(!empty($settings['button_text_1'])){
			                        echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="ot-btn">'.esc_html($settings['button_text_1']).'</a>';
			                    }
		                        echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="video-link popup-video">
		                            <span class="play-btn style3"><i class="fas fa-play"></i></span> '.esc_html($settings['button_text_2']).'</a>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        if(!empty($settings['shape_img1']['url'])){
			        echo '<div class="tree-1">';
			            echo '<img src="'.esc_url($settings['shape_img1']['url']).'" alt="tree">';
			        echo '</div>';
			    }
			    if(!empty($settings['shape_img2']['url'])){
			        echo '<div class="tree-2">';
			            echo '<img src="'.esc_url($settings['shape_img2']['url']).'" alt="tree">';
			        echo '</div>';
			    }
			    if(!empty($settings['shape_img3']['url'])){
			        echo '<div class="cloud-1">';
			            echo '<img src="'.esc_url($settings['shape_img3']['url']).'" alt="tree">';
			        echo '</div>';
			    }
			    if(!empty($settings['shape_img4']['url'])){
			        echo '<div class="cloud-2">';
			            echo '<img src="'.esc_url($settings['shape_img4']['url']).'" alt="tree">';
			        echo '</div>';
			    }
			    if(!empty($settings['shape_img5']['url'])){
			        echo '<div class="cloud-3">';
			            echo '<img src="'.esc_url($settings['shape_img5']['url']).'" alt="tree">';
			        echo '</div>';
			    }

		    echo '</div>';
			echo '<div class="hero-form2">';
				echo '<div class="container">';
					echo $settings['banner_form'];
				echo '</div>';
			echo '</div>';

		} elseif ( $settings['banner_style'] == '3' ) {
			echo '<div class="ot-hero-wrapper hero-3">';
				echo '<div class="hero-img-slider">';
					echo '<div class="hero-slider ot-carousel" data-fade="true" data-autoplay-speed="5000">';
						foreach( $settings['gallery'] as $data ) {
							echo '<div class="as-hero-slide">';
								echo '<div class="ot-hero-bg" data-bg-src="'.esc_url( $data['url'] ).'"></div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
				echo '<div class="container z-index-common">';
					echo '<div class="hero-content">';
						if(!empty($settings['banner_title'])){
							echo '<h2 class="hero-title1">';
								echo $settings['banner_title'];
							echo '</h2>';
						}
						if(!empty($settings['banner_subtitle'])){
							echo '<h1 class="hero-title2">'.esc_html($settings['banner_subtitle']).'<img class="title-img" src="'.esc_url($settings['banner_img']['url']).'" alt="Image">'.esc_html($settings['banner_subtitle2']).'</h1>';
						}
						if(!empty($settings['banner_form'])){
							echo '<div class="adivaha-form-area">';
								echo '<div class="container">';
									echo '<div class="form-hotel">';
										echo $settings['banner_form'];
									echo '</div>';
								echo '</div>';
							echo '</div> ';
						}
						if(!empty($settings['button_text_1'])){
							echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="ot-btn">'.esc_html($settings['button_text_1']).'</a>';
						}
					echo '</div>';
				echo '</div>';
		    echo '</div>';
		} elseif ( $settings['banner_style'] == '4' ) {
			echo '<div class="ot-hero-wrapper hero-4" data-bg-src="'.esc_url($settings['banner_bg_img']['url']).'">';
				if(!empty($settings['shape_img1']['url'])){
					echo '<div class="cloud-1">';
						echo '<img src="'.esc_url($settings['shape_img1']['url']).'" alt="tree">';
					echo '</div>';
				}
				if(!empty($settings['shape_img2']['url'])){
					echo '<div class="cloud-2">';
						echo '<img src="'.esc_url($settings['shape_img2']['url']).'" alt="tree">';
					echo '</div>';
				}
				if(!empty($settings['shape_img3']['url'])){
					echo '<div class="cloud-3">';
						echo '<img src="'.esc_url($settings['shape_img3']['url']).'" alt="tree">';
					echo '</div>';
				}
				if(!empty($settings['shape_img4']['url'])){
					echo '<div class="shape-1">';
						echo '<img src="'.esc_url($settings['shape_img4']['url']).'" alt="tree">';
					echo '</div>';
				}
				if(!empty($settings['shape_img5']['url'])){
					echo '<div class="shape-3 jump">';
						echo '<img src="'.esc_url($settings['shape_img5']['url']).'" alt="tree">';
					echo '</div>';
				}
				echo '<div class="container z-index-common">';
					echo '<div class="row align-items-center">';
						echo '<div class="col-lg-7">';
							echo '<div class="hero-content">';
								if(!empty($settings['banner_title'])){
									echo '<span class="hero-subtitle2">';
										echo $settings['banner_title'];
									echo '</span>';
								}
								if(!empty($settings['banner_subtitle'])){
									echo '<h1 class="hero-title3">'.esc_html($settings['banner_subtitle']).'</h1>';
								}
								if(!empty($settings['banner_subtitle2'])){
									echo '<h1 class="hero-title3 text-transparent"><a href="'.esc_url($settings['banner_video_link']['url']).'" data-overlay="title" data-opacity="6" class="video popup-video"><img class="title-img" src="'.esc_url($settings['banner_video_img']['url']).'" alt="Image"><i class="fas fa-play"></i></a> '.esc_html($settings['banner_subtitle2']).'</h1>';
								}
								echo '<div class="btn-group align-items-center">';
									if(!empty($settings['button_text_1'])){
										echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="ot-btn">'.esc_html($settings['button_text_1']).'</a>';
									}
									if(!empty($settings['shape_img6']['url'])){
										echo '<div class="shape-img">';
											echo '<img src="'.esc_url($settings['shape_img6']['url']).'" alt="plane">';
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '<div class="col-lg-5">';
							if(!empty($settings['shape_img1']['url'])){
								echo '<div class="hero-img">';
									echo '<img src="'.esc_url($settings['banner_img']['url']).'" alt="tree">';
									if(!empty($settings['banner_img_shape']['url'])){
										echo '<div class="shape">';
											echo '<img src="'.esc_url($settings['banner_img_shape']['url']).'" alt="shape">';
										echo '</div>';
									}
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
		    echo '</div>';
			echo '<div class="hero-form2">';
				echo '<div class="container">';
					echo $settings['banner_form'];
				echo '</div>';
			echo '</div>';
		} elseif ( $settings['banner_style'] == '5' ) {
			echo '<div class="ot-hero-wrapper hero-6">';
				echo '<div class="bg-img" data-bg-src="'.esc_url($settings['banner_bg_img']['url']).'"></div>';
				echo '<div class="shape-1"></div>';
				echo '<div class="shape-2"></div>';
				if(!empty($settings['shape_img1']['url'])){
					echo '<div class="shape-3 moving">';
						echo '<img src="'.esc_url($settings['shape_img1']['url']).'" alt="plane">';
					echo '</div>';
				}
				if(!empty($settings['shape_img2']['url'])){
					echo '<div class="shape-4 movingX">';
						echo '<img src="'.esc_url($settings['shape_img2']['url']).'" alt="plane">';
					echo '</div>';
				}
				echo '<div class="container z-index-common">';
					echo '<div class="hero-content">';
						if(!empty($settings['banner_title'])){
							echo '<h1 class="hero-title2">';
								echo $settings['banner_title'];
							echo '</h1>';
						}
						if(!empty($settings['banner_title2'])){
							echo '<h1 class="hero-title2">';
								echo $settings['banner_title2'];
							echo '</h1>';
						}
						if(!empty($settings['banner_form'])){
							echo '<div class="adivaha-form-area">';
								echo '<div class="container">';
									echo '<div class="form-flight">';
										echo $settings['banner_form'];
									echo '</div>';
								echo '</div>';
							echo '</div> ';
						}
					echo '</div>';
				echo '</div>';
				echo '<div class="hero-img-slider6">';
					echo '<div class="container">';
						echo '<div class="hero-slider ot-carousel" data-fade="true" data-autoplay-speed="5000" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true" data-md-arrows="true">';
							foreach( $settings['gallery'] as $data ) {
								echo '<div class="as-hero-slide">';
									echo '<div class="ot-hero-bg" data-bg-src="'.esc_url( $data['url'] ).'"></div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		} elseif ( $settings['banner_style'] == '6' ) {
			echo '<div class="ot-hero-wrapper hero-5">';
				if(!empty($settings['shape_img1']['url'])){
					echo '<img class="hero-before" src="'.esc_url($settings['shape_img1']['url']).'" alt="plane">';
				}
				if(!empty($settings['shape_img2']['url'])){
					echo '<img class="hero-after" src="'.esc_url($settings['shape_img2']['url']).'" alt="plane">';
				}
				if(!empty($settings['shape_img3']['url'])){
					echo '<div class="shape-1 jump">';
						echo '<img src="'.esc_url($settings['shape_img3']['url']).'" alt="plane">';
					echo '</div>';
				}
				if(!empty($settings['shape_img4']['url'])){
					echo '<div class="shape-2 moving">';
						echo '<img src="'.esc_url($settings['shape_img4']['url']).'" alt="plane">';
					echo '</div>';
				}
				echo '<div class="hero-img-slider">';
					echo '<div class="hero-slider ot-carousel" data-fade="true" data-autoplay-speed="5000">';
						foreach( $settings['gallery'] as $data ) {
							echo '<div class="as-hero-slide">';
								echo '<div class="ot-hero-bg" data-bg-src="'.esc_url( $data['url'] ).'"></div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
				echo '<div class="container z-index-common">';
					echo '<div class="hero-content">';
						if(!empty($settings['banner_title'])){
							echo '<span class="hero-subtitle2">'.wp_kses_post($settings['banner_title']).'</span>';
						}
						if(!empty($settings['banner_subtitle'])){
							echo '<h1 class="hero-title3">';
								echo wp_kses_post($settings['banner_subtitle']);
							echo '</h1>';
						}
						if(!empty($settings['banner_form'])){
							echo '<div class="adivaha-form-area">';
								echo '<div class="container">';
									echo '<div class="form-hotel">';
										echo $settings['banner_form'];
									echo '</div>';
								echo '</div>';
							echo '</div> ';
						}
					echo '</div>';
				echo '</div>';
		    echo '</div>';
		} elseif ( $settings['banner_style'] == '7' ) {
			echo '<div class="ot-hero-wrapper hero-7" data-bg-src="'.esc_url($settings['banner_bg_img']['url']).'">';
				echo '<div class="container z-index-common">';
					echo '<div class="hero-content">';
						if(!empty($settings['banner_title'])){
							echo '<h1 class="hero-title2">';
								echo $settings['banner_title'];
							echo '</h1>';
						}
						if(!empty($settings['banner_title2'])){
							echo '<h1 class="hero-title2 text-theme">';
								echo $settings['banner_title2'];
							echo '</h1>';
						}
						if(!empty($settings['banner_title3'])){
							echo '<h1 class="hero-title2">';
								echo $settings['banner_title3'];
							echo '</h1>';
						}
					echo '</div>';
				echo '</div>';
				if(!empty($settings['banner_img']['url'])){
					echo '<div class="container">';
						echo '<div class="hero-img">';
							echo travon_img_tag( array(
								'url'   => esc_url( $settings['banner_img']['url'] ),
							) );
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';
			echo '<div class="hero-form2">';
				echo '<div class="container">';
					echo $settings['banner_form'];
				echo '</div>';
			echo '</div>';
		}
	}
}