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
 * Activity Box Widget .
 *
 */
class Travon_Activity extends Widget_Base {

	public function get_name() {
		return 'travonactivity';
	}

	public function get_title() {
		return __( 'Travon Activity', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'activity_section',
			[
				'label' 	=> __( 'Activity', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 		=> __( 'Activity Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'travon' ),
					'2'  			=> __( 'Style Two', 'travon' ),
					'3'  			=> __( 'Style Three', 'travon' ),
				],
			]
		);

        $this->add_control(
			'btn_text',
			[
				'label'     => __( 'Button Text', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( 'Learn More', 'travon' ),
				'condition' => ['layout!' => ['3']]
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Activity Link', 'travon' ),
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
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'icon',
			[
				'label' 		=> __( 'Choose Icon', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
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
				'condition' => ['layout!' => ['3']]
			]
		);

		// For Style 3 -----------------------------
		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Activity Link', 'travon' ),
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
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
			]
        );
        $repeater->add_control(
			'price',
			[
				'label'     => __( 'Price', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'duration',
			[
				'label'     => __( 'Duration', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'guest',
			[
				'label'     => __( 'Guest', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'steps3',
			[
				'label' 		=> __( 'Steps', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'travon' ),
					],
				],
				'condition'		=> ['layout' => ['3']]
			]
		);
		
        $this->end_controls_section();


        //------------------------------------ Slider Control------------------------------------//
		$this->start_controls_section(
			'slider_control',
			[
				'label'     => __( 'Slider Control', 'travon' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'make_it_slider',
			[
				'label' 		=> __( 'Use it as slider ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
        $this->add_control(
			'slider_id',
			[
				'label'     => __( 'Slider ID', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'	=> [ 'make_it_slider' => [ 'yes' ] ],
			]
        );
		$this->add_control(
			'desktop_items',
			[
				'label' 		=> __( 'Items To Show', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 		=> 0,
						'step' 		=> 1,
						'max' 		=> 10,
					],
				],
				'default' 		=> [
					'unit' 			=> '%',
					'size' 			=> 4,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'laptop_items',
			[
				'label' 		=> __( 'Laptop Items', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max' 	=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 3,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);

        $this->add_control(
			'tablet_items',
			[
				'label' 		=> __( 'Tablet Items', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max' 	=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 2,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);

        $this->add_control(
			'mobile_items',
			[
				'label' 		=> __( 'Mobile Items', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max' 	=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 1,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);
        $this->add_control(
			'small_mobile_items',
			[
				'label' 		=> __( 'Small Mobile Items', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max' 	=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 1,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'show_dots',
			[
				'label' 		=> __( 'Show Dots ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);
		$this->add_control(
			'show_arrow',
			[
				'label' 		=> __( 'Show Arrow ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->end_controls_section();


        /*-----------------------------------------activitys styling------------------------------------*/

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

        /*-----------------------------------------activitys content styling------------------------------------*/

		$this->start_controls_section(
			'content_style_section',
			[
				'label' 	=> __( 'Content Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'activitys_content_color',
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
				'name' 			=> 'activitys_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'activitys_content_margin',
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
			'activitys_content_padding',
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

        if ($settings['make_it_slider'] == 'yes') {
            $this->add_render_attribute( 'wrapper', 'class', ' row slider-shadow ot-carousel' );
            $this->add_render_attribute( 'wrapper', 'id', $settings['slider_id'] );
            $this->add_render_attribute( 'wrapper', 'data-slide-show', $settings['desktop_items']['size'] );
            $this->add_render_attribute( 'wrapper', 'data-lg-slide-show', $settings['laptop_items']['size'] );
            $this->add_render_attribute( 'wrapper', 'data-md-slide-show', $settings['tablet_items']['size'] );
            $this->add_render_attribute( 'wrapper', 'data-sm-slide-show', $settings['mobile_items']['size'] );
            $this->add_render_attribute( 'wrapper', 'data-xs-slide-show', $settings['small_mobile_items']['size'] );

            if ($settings['show_dots'] == 'yes') {
                $this->add_render_attribute( 'wrapper', 'data-dots', true );
            }	
            if ($settings['show_arrow'] == 'yes') {
                $this->add_render_attribute( 'wrapper', 'data-arrows', true );
            }	
        } else {
            $this->add_render_attribute( 'wrapper', 'class', 'row gy-30' );
        }
        

        if ( $settings['layout'] == '1' ) {
	        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
	            foreach( $settings['steps'] as $data ) {   

                    $h_target = $data['button_link']['is_external'] ? ' target="_blank"' : '';
                    $h_follow = $data['button_link']['nofollow'] ? ' rel="nofollow"' : '';          

		            echo '<div class="col-xl-3 col-lg-4 col-md-6">';
                        echo '<div class="activity-card">';
                            if ( ! empty( $data['image']['url'] ) ) {
                                echo '<div class="box-img">';
                                    echo '<div class="img" data-mask-src="'.TRAVON_PLUGDIRURI.'assets/img/activity_card_mask.png">';
                                        echo travon_img_tag( array(
                                            'url'   => esc_url( $data['image']['url'] ),
                                        ) );
                                    echo '</div>';
                                    if ( ! empty( $data['icon']['url'] ) ) {
                                        echo '<div class="box-icon">';
                                            echo travon_img_tag( array(
                                                'url'   => esc_url( $data['icon']['url'] ),
                                            ) );
                                        echo '</div>';
                                    }
                                echo '</div>';
                                
                            }
                            if ( ! empty( $data['title'] ) ) {
                                echo '<h3 class="box-title"><a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_url( $data['button_link']['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
                            }
                            if(!empty($data['content'])){
			                    echo '<p class="box-text">'.esc_html($data['content']).'</p>';
			                }
                            echo '<div class="box-bottom">';
                                echo '<a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_url( $data['button_link']['url'] ).'" class="link-btn">'.esc_html( $settings['btn_text'] ).' <i class="fas fa-arrow-up-right"></i></a>';
                            echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        }    
	        echo '</div>';
        } elseif ( $settings['layout'] == '2' ) {
			echo '<div '.$this->get_render_attribute_string('wrapper').'>';
	            foreach( $settings['steps'] as $data ) {   

                    $h_target = $data['button_link']['is_external'] ? ' target="_blank"' : '';
                    $h_follow = $data['button_link']['nofollow'] ? ' rel="nofollow"' : '';          

		            echo '<div class="col-xl-3 col-lg-4 col-md-6">';
                        echo '<div class="activity-box">';
                            if ( ! empty( $data['image']['url'] ) ) {
                                echo '<div class="box-img">';
									echo travon_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
                                    echo '<div class="shape" data-bg-src="'.TRAVON_PLUGDIRURI.'assets/img/activity_box_mask.png"></div>';
                                    
                                echo '</div>';
                                
                            }
							echo '<div class="box-content">';
								if ( ! empty( $data['icon']['url'] ) ) {
									echo '<div class="box-icon">';
										echo travon_img_tag( array(
											'url'   => esc_url( $data['icon']['url'] ),
										) );
									echo '</div>';
								}
								if ( ! empty( $data['title'] ) ) {
									echo '<h3 class="box-title"><a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_url( $data['button_link']['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
								}
								if(!empty($data['content'])){
									echo '<p class="box-text">'.esc_html($data['content']).'</p>';
								}
								echo '<div class="box-bottom">';
									echo '<a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_url( $data['button_link']['url'] ).'" class="link-btn">'.esc_html( $settings['btn_text'] ).' <i class="fas fa-arrow-up-right"></i></a>';
								echo '</div>';
		                	echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        }    
	        echo '</div>';
		} elseif ( $settings['layout'] == '3' ) {
			echo '<div '.$this->get_render_attribute_string('wrapper').'>';
	            foreach( $settings['steps3'] as $data ) {   

                    $h_target = $data['button_link']['is_external'] ? ' target="_blank"' : '';
                    $h_follow = $data['button_link']['nofollow'] ? ' rel="nofollow"' : '';          

		            echo '<div class="col-xl-3 col-lg-4 col-md-6">';
                        echo '<div class="activity-grid">';
                            if ( ! empty( $data['image']['url'] ) ) {
                                echo '<div class="box-img">';
									echo travon_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
                                    echo '<div class="shape" data-bg-src="'.TRAVON_PLUGDIRURI.'assets/img/activity_grid_shape.png"></div>';
                                    if(!empty($data['price'])){
										echo '<div class="price">'.esc_html($data['price']).'</div>';
									}
                                echo '</div>';
                                
                            }
							echo '<div class="box-content">';
								if ( ! empty( $data['title'] ) ) {
									echo '<h3 class="box-title"><a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_url( $data['button_link']['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
								}
								if(!empty($data['content'])){
									echo '<p class="box-text">'.esc_html($data['content']).'</p>';
								}
		                	echo '</div>';
							echo '<div class="box-bottom">';
								echo '<div class="tour-meta">';
									if(!empty($data['duration'])){
										echo '<span><i class="fa-light fa-clock"></i> '.esc_html($data['duration']).'</span>';
									}
									if(!empty($data['guest'])){
										echo '<span><i class="fa-light fa-user-group"></i> '.esc_html($data['guest']).'</span>';
									}
								echo '</div>';
							echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        }    
	        echo '</div>';
		}
	}

}