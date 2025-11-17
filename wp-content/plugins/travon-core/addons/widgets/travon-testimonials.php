<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Travon_Testimonial_Slider extends Widget_Base{

	public function get_name() {
		return 'travontestimonialslider';
	}

	public function get_title() {
		return __( 'Testimonial Slider', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' 		=> __( 'Testimonial Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'travon' ),
					'two' 			=> __( 'Style Two', 'travon' ),
					'three' 		=> __( 'Style Three', 'travon' ),
					'four' 			=> __( 'Style Four', 'travon' ),
					'five' 			=> __( 'Style Five', 'travon' ),
					'six' 			=> __( 'Style Six', 'travon' ),
				],
			]
		);

		//----------------------------feddback repeter start--------------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'travon' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Chef Leader' , 'travon' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' , 'travon' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'five',
				'options' 	=> [
					'one'  		=> __( 'One Star', 'travon' ),
					'two' 		=> __( 'Two Star', 'travon' ),
					'three' 	=> __( 'Three Star', 'travon' ),
					'four' 		=> __( 'Four Star', 'travon' ),
					'five' 	 	=> __( 'Five Star', 'travon' ),
				],
			]
		);
		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'travon' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'travon' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'travon' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'travon' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'travon' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'travon' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);

		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'testimonial_style' => [ 'two' ] ],
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'testimonial_style' => [ 'two' ] ],
			]
        );
		$this->add_control(
			'shape_image',
			[
				'label' 		=> __( 'Shape Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'testimonial_style' => [ 'four', 'five', 'six' ] ],
			]
		);

		$this->end_controls_section();


        //-------------------------------general settings-------------------------------//

		$this->start_controls_section(
			'testimonial_general',
			[
				'label' 	=> __( 'General', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'feedback_bg_clr',
			[
				'label' 		=> __( 'Feedback Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-card' => '--white-color: {{VALUE}}!important;',
				],
			]
		);
		$this->end_controls_section();

		 /*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Feedback Styling', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Nmae', 'travon' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_title_padding',
			[
				'label' 		=> __( 'Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Designation', 'travon' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} span'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} span',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Feedback', 'travon' ),
			]
		);
		$this->add_control(
			'testi_feedback_color',
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
				'name' 			=> 'testi_feedback_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'testi_feedback_margin',
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
			'testi_feedback_padding',
			[
				'label' 		=> __( 'Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( $settings['testimonial_style'] == 'one' ) {
			echo '<div class="row slider-shadow ot-carousel" id="testiSlide1" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1">';
				foreach( $settings['slides'] as $singleslide ) {
		            echo '<div class="col-lg-6">';
		                echo '<div class="testi-card">';
		                    echo '<div class="testi-card__rating">';
		                      	if( $singleslide['client_rating'] == 'one' ){
				                	echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
				                }elseif( $singleslide['client_rating'] == 'two' ){
				                	echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
				                }elseif( $singleslide['client_rating'] == 'three' ){
				                	echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
				                }elseif( $singleslide['client_rating'] == 'four' ){
				                	echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="far fa-star-sharp"></i>';
				                }else{
				                	echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
					                echo '<i class="fa-solid fa-star-sharp"></i>';
				                }    
	                   		echo '</div>';
		                    if( ! empty( $singleslide['client_feedback'] ) ) {
	                            echo '<p class="testi-card_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
	                        }
		                    echo '<div class="testi-card__profile">';
		                    	if( ! empty( $singleslide['client_image']['url'] ) ){
			                        echo '<div class="testi-card__avater">';
			                            echo travon_img_tag( array(
											'url'	=> esc_url( $singleslide['client_image']['url'] ),
										) );
			                        echo '</div>';
			                    }
		                        echo '<div class="media-body">';
		                            if( ! empty( $singleslide['client_name'] ) ) {
			                            echo '<h3 class="testi-card__name">'.esc_html( $singleslide['client_name'] ).'</h3>';
			                        }
	                                if( ! empty( $singleslide['client_designation'] ) ) {
			                            echo '<span class="testi-card__desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        }
	        echo '</div>';
	    } elseif ( $settings['testimonial_style'] == 'two' ) {
	    	echo '<div class="position-relative space bg-auto">';
		        echo '<div class="container">';
		            echo '<div class="title-area text-center">';
		                if( $settings['title'] ){
                            echo '<span class="sub-title justify-content-center">';
                                echo '<span class="shape left"><span class="dots"></span></span>';
                                echo esc_html( $settings['title'] );
                                echo '<span class="shape right"><span class="dots"></span></span>';
                            echo '</span>';
                        }
                        if( $settings['subtitle'] ){
                            echo '<h2 class="sec-title">'.$settings['subtitle'].'</h2>';
                        }
		            echo '</div>';
		            echo '<div class="testi-box-area">';
		                echo '<div class="testi-box-slide ot-carousel" data-fade="true" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true" data-md-arrows="true">';
		                	foreach( $settings['slides'] as $singleslide ) {
			                    echo '<div class="">';
			                        echo '<div class="testi-box">';
			                            if( ! empty( $singleslide['client_image']['url'] ) ){
					                        echo '<div class="testi-box_avater">';
					                            echo travon_img_tag( array(
													'url'	=> esc_url( $singleslide['client_image']['url'] ),
												) );
					                        echo '</div>';
					                    }
			                            if( ! empty( $singleslide['client_feedback'] ) ) {
				                            echo '<p class="testi-box_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
				                        }
			                            echo '<div class="testi-box_review">';
			                                if( $singleslide['client_rating'] == 'one' ){
							                	echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
							                }elseif( $singleslide['client_rating'] == 'two' ){
							                	echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
							                }elseif( $singleslide['client_rating'] == 'three' ){
							                	echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
							                }elseif( $singleslide['client_rating'] == 'four' ){
							                	echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="far fa-star-sharp"></i>';
							                }else{
							                	echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
								                echo '<i class="fa-solid fa-star-sharp"></i>';
							                }  
			                            echo '</div>';
			                            if( ! empty( $singleslide['client_name'] ) ) {
				                            echo '<h3 class="testi-box_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
				                        }
		                                if( ! empty( $singleslide['client_designation'] ) ) {
				                            echo '<span class="testi-box_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
				                        }
			                        echo '</div>';
			                    echo '</div>';
			                }
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="testi-box-tab" data-asnavfor=".testi-box-slide">';
		        	$i = 0;
		            foreach( $settings['slides'] as $singleslide ) {
		            	$i++;
		            	$active_class = ( $i == 1 ) ? 'active' : '';

		            	if( ! empty( $singleslide['client_image']['url'] ) ){
	                        echo '<div class="tab-btn '.esc_attr( $active_class ).'">';
	                            echo travon_img_tag( array(
									'url'	=> esc_url( $singleslide['client_image']['url'] ),
								) );
	                        echo '</div>';
	                    }
			        }
		        echo '</div>';
		    echo '</div>';
	    } elseif ( $settings['testimonial_style'] == 'three' ) {
			echo '<div class="row slider-shadow ot-carousel" id="testiSlide3" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">';
				foreach( $settings['slides'] as $singleslide ) {
		            echo '<div class="col-xl-4 col-md-6">';
		                echo '<div class="testi-grid">';
							if( ! empty( $singleslide['client_image']['url'] ) ){
								echo '<div class="testi-grid__img">';
									echo travon_img_tag( array(
										'url'	=> esc_url( $singleslide['client_image']['url'] ),
									) );
								echo '</div>';
							}
							if( ! empty( $singleslide['client_name'] ) ) {
								echo '<h3 class="testi-grid__name box-title">'.esc_html( $singleslide['client_name'] ).'</h3>';
							}
							if( ! empty( $singleslide['client_designation'] ) ) {
								echo '<span class="testi-grid__desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
							}
							echo '<div class="testi-grid__content">';
								echo '<div class="left-icon"><i class="fa-sharp fa-solid fa-ditto"></i></div>';
								echo '<div class="right-icon"><i class="fa-sharp fa-solid fa-ditto"></i></div>';
								echo '<div class="testi-grid__review">';
									if( $singleslide['client_rating'] == 'one' ){
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
									}elseif( $singleslide['client_rating'] == 'two' ){
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
									}elseif( $singleslide['client_rating'] == 'three' ){
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
									}elseif( $singleslide['client_rating'] == 'four' ){
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
									}else{
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
									}    
								echo '</div>';
								if( ! empty( $singleslide['client_feedback'] ) ) {
									echo '<p class="testi-grid__text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
								}
							echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        }
	        echo '</div>';
		} elseif ( $settings['testimonial_style'] == 'four' ) {
			echo '<div class="row ot-carousel" id="testiSlide4" data-slide-show="2" data-lg-slide-show="2" data-md-slide-show="1">';
				foreach( $settings['slides'] as $singleslide ) {
		            echo '<div class="col-xl-4 col-lg-6">';
		                echo '<div class="testi-block">';
							if( ! empty( $settings['shape_image']['url'] ) ){
								echo '<div class="testi-block_shape">';
									echo travon_img_tag( array(
										'url'	=> esc_url( $settings['shape_image']['url'] ),
									) );
								echo '</div>';
							}
							echo '<div class="testi-block_profile">';
								if( ! empty( $singleslide['client_image']['url'] ) ){
									echo '<div class="testi-block_avater">';
										echo travon_img_tag( array(
											'url'	=> esc_url( $singleslide['client_image']['url'] ),
										) );
									echo '</div>';
								}
								echo '<div class="media-body">';
									if( ! empty( $singleslide['client_name'] ) ) {
										echo '<h3 class="testi-block_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
									}
									if( ! empty( $singleslide['client_designation'] ) ) {
										echo '<span class="testi-block_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
									}
									echo '<div class="testi-block_review">';
										if( $singleslide['client_rating'] == 'one' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'two' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'three' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'four' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
										}else{
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
										}    
									echo '</div>';
								echo '</div>';
							echo '</div>';
							if( ! empty( $singleslide['client_feedback'] ) ) {
								echo '<p class="testi-block_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
							}
		                echo '</div>';
		            echo '</div>';
		        }
	        echo '</div>';
		} elseif ( $settings['testimonial_style'] == 'five' ) {
			echo '<div class="row ot-carousel" id="testiSlide4" data-slide-show="1" data-lg-slide-show="2" data-md-slide-show="1">';
				foreach( $settings['slides'] as $singleslide ) {
		            echo '<div class="col-xl-4 col-lg-6">';
		                echo '<div class="testi-block">';
							if( ! empty( $settings['shape_image']['url'] ) ){
								echo '<div class="testi-block_shape">';
									echo travon_img_tag( array(
										'url'	=> esc_url( $settings['shape_image']['url'] ),
									) );
								echo '</div>';
							}
							echo '<div class="testi-block_profile">';
								if( ! empty( $singleslide['client_image']['url'] ) ){
									echo '<div class="testi-block_avater">';
										echo travon_img_tag( array(
											'url'	=> esc_url( $singleslide['client_image']['url'] ),
										) );
									echo '</div>';
								}
								echo '<div class="media-body">';
									if( ! empty( $singleslide['client_name'] ) ) {
										echo '<h3 class="testi-block_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
									}
									if( ! empty( $singleslide['client_designation'] ) ) {
										echo '<span class="testi-block_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
									}
									echo '<div class="testi-block_review">';
										if( $singleslide['client_rating'] == 'one' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'two' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'three' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'four' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="far fa-star-sharp"></i>';
										}else{
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
										}    
									echo '</div>';
								echo '</div>';
							echo '</div>';
							if( ! empty( $singleslide['client_feedback'] ) ) {
								echo '<p class="testi-block_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
							}
		                echo '</div>';
		            echo '</div>';
		        }
	        echo '</div>';
			echo '<div class="testi-block-arrow">';
				echo '<div class="icon-box">';
					echo '<button data-slick-prev="#testiSlide4" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>';
					echo '<button data-slick-next="#testiSlide4" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>';
				echo '</div>';
			echo '</div>';
		} elseif ( $settings['testimonial_style'] == 'six' ) {
			
			echo '<div class="testi-tab-menu" data-asnavfor=".testi-tab-slide">';
				foreach( $settings['slides'] as $index => $singleslide ) {
					if( ! empty( $singleslide['client_image']['url'] ) ){
						echo '<div class="tab-btn' . ($index === 0 ? ' active' : '') . '">';
						echo travon_img_tag( array(
							'url'    => esc_url( $singleslide['client_image']['url'] ),
						) );
						echo '</div>';
					}
				}
			echo '</div>';

			echo '<div class="row testi-tab-slide ot-carousel" data-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1">';
				foreach( $settings['slides'] as $singleslide ) {
		            echo '<div class="col-xl-4 col-lg-6">';
		                echo '<div class="testi-tab">';
							if( ! empty( $settings['shape_image']['url'] ) ){
								echo '<div class="testi-tab_shape">';
									echo travon_img_tag( array(
										'url'	=> esc_url( $settings['shape_image']['url'] ),
									) );
								echo '</div>';
							}
							if( ! empty( $singleslide['client_feedback'] ) ) {
								echo '<p class="testi-tab_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
							}
							if( ! empty( $singleslide['client_name'] ) ) {
								echo '<h3 class="testi-tab_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
							}
							if( ! empty( $singleslide['client_designation'] ) ) {
								echo '<span class="testi-tab_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
							}
		                echo '</div>';
		            echo '</div>';
		        }
	        echo '</div>';
		}

		echo '<!-----------------------End Testimonials Area----------------------->';
	}

}