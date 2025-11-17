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
 * Hotel Box Widget .
 *
 */
class Travon_Hotel extends Widget_Base {

	public function get_name() {
		return 'travonhotel';
	}

	public function get_title() {
		return __( 'Travon Hotel', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_section',
			[
				'label' 	=> __( 'Hotel', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 		=> __( 'Hotel Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'travon' ),
					'2' 			=> __( 'Style Two', 'travon' ),
				],
			]
		);

        $this->add_control(
			'book_btn',
			[
				'label'     => __( 'Book Btn Text', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( 'Book Now', 'travon' ),
			]
        );
        $this->add_control(
			'details_btn',
			[
				'label'     => __( 'Details Btn Text', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( 'See Details', 'travon' ),
				'condition'		=> [ 'layout' => [ '1' ] ],
			]
        );

        $repeater = new Repeater();

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
			'title',
			[
				'label'     => __( 'Title', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( 'Deluxe Suite Room', 'travon' ),
			]
        );
        $repeater->add_control(
			'url',
			[
				'label' 		=> esc_html__( 'Hotel URL', 'travon' ),
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
			'price',
			[
				'label'     => __( 'price', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( '$250', 'travon' ),
			]
        );
		$repeater->add_control(
			'info1',
			[
				'label'     => __( 'Info 1', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( '250 sqm', 'travon' ),
			]
        );
		$repeater->add_control(
			'info2',
			[
				'label'     => __( 'Info 2', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( '3 Beds', 'travon' ),
			]
        );
		$repeater->add_control(
			'info3',
			[
				'label'     => __( 'Info 3', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( '2 Bathroom', 'travon' ),
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
				'condition'		=> [ 'layout' => [ '1' ] ],
			]
		);

		$repeater = new Repeater();

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
			'title',
			[
				'label'     => __( 'Title', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( 'Deluxe Suite Room', 'travon' ),
			]
        );
        $repeater->add_control(
			'url',
			[
				'label' 		=> esc_html__( 'Hotel URL', 'travon' ),
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
			'price',
			[
				'label'     => __( 'price', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '5',
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
			'steps2',
			[
				'label' 		=> __( 'Steps', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'travon' ),
					],
				],
				'condition'		=> [ 'layout' => [ '2' ] ],
			]
		);
       
        $this->end_controls_section();

        //------------------------------------ Slider Control------------------------------------//
		$this->start_controls_section(
			'slider_control',
			[
				'label'     => __( 'Slider Control', 'travon' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'layout' => [ '1' ] ],
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
			'small_items',
			[
				'label' 		=> __( 'Small Device', 'travon' ),
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

        /*-----------------------------------------features styling------------------------------------*/

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

        /*-----------------------------------------features content styling------------------------------------*/

		$this->start_controls_section(
			'content_style_section',
			[
				'label' 	=> __( 'Content Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'features_content_color',
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
				'name' 			=> 'features_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'features_content_margin',
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
			'features_content_padding',
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
			$this->add_render_attribute( 'wrapper', 'data-xs-slide-show', $settings['small_items']['size'] );

            if ($settings['show_dots'] == 'yes') {
                $this->add_render_attribute( 'wrapper', 'data-dots', true );
            }	
            if ($settings['show_arrow'] == 'yes') {
                $this->add_render_attribute( 'wrapper', 'data-arrows', true );
            }	
        } else {
            $this->add_render_attribute( 'wrapper', 'class', 'row gy-30' );
        }

        if( $settings['layout'] == '1' ){
	        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
	            foreach( $settings['steps'] as $data ) {

                    $h_target = $data['url']['is_external'] ? ' target="_blank"' : '';
                    $h_follow = $data['url']['nofollow'] ? ' rel="nofollow"' : '';

                    echo '<div class="col-xl-4 col-md-6">';
                        echo '<div class="hotel-card">';
                            if ( ! empty( $data['image']['url'] ) ) {
                                echo '<div class="hotel-card__img">';
                                    echo travon_img_tag( array(
                                        'url'   => esc_url( $data['image']['url'] ),
                                    ) );
                                echo '</div>';
                            }
                            echo '<div class="hotel-card__content">';
                                echo '<div class="hotel-card__top">';
                                    if ( ! empty( $data['price'] ) ) {
                                        echo '<span class="hotel-card__price">PRICE <span class="price">'.esc_html( $data['price'] ).'</span> / NIGHT</span>';
                                    }
                                    echo '<div class="hotel-card__rating">';
                                        if( $data['client_rating'] == 'one' ){
                                            echo '<i class="fa-solid fa-star-sharp"></i>';
                                            echo '<i class="far fa-star-sharp"></i>';
                                            echo '<i class="far fa-star-sharp"></i>';
                                            echo '<i class="far fa-star-sharp"></i>';
                                            echo '<i class="far fa-star-sharp"></i>';
                                        }elseif( $data['client_rating'] == 'two' ){
                                            echo '<i class="fa-solid fa-star-sharp"></i>';
                                            echo '<i class="fa-solid fa-star-sharp"></i>';
                                            echo '<i class="far fa-star-sharp"></i>';
                                            echo '<i class="far fa-star-sharp"></i>';
                                            echo '<i class="far fa-star-sharp"></i>';
                                        }elseif( $data['client_rating'] == 'three' ){
                                            echo '<i class="fa-solid fa-star-sharp"></i>';
                                            echo '<i class="fa-solid fa-star-sharp"></i>';
                                            echo '<i class="fa-solid fa-star-sharp"></i>';
                                            echo '<i class="far fa-star-sharp"></i>';
                                            echo '<i class="far fa-star-sharp"></i>';
                                        }elseif( $data['client_rating'] == 'four' ){
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
                                if ( ! empty( $data['title'] ) ) {
                                    echo '<h3 class="box-title"><a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_html( $data['url']['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
                                }
                                echo '<div class="hotel-meta">';
                                    if ( ! empty( $data['info1'] ) ) {
                                        echo '<span><i class="fa-light fa-arrows-maximize"></i> '.esc_html( $data['info1'] ).'</span>';
                                    }
                                    if ( ! empty( $data['info2'] ) ) {
                                        echo '<span><i class="fa-light fa-bed-front"></i> '.esc_html( $data['info2'] ).'</span>';
                                    }
                                    if ( ! empty( $data['info3'] ) ) {
                                        echo '<span><i class="fa-light fa-bath"></i> '.esc_html( $data['info3'] ).'</span>';
                                    }
                                echo '</div>';

                                echo '<div class="hotel-card__bottom">';
                                    echo '<a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_html( $data['url']['url'] ).'" class="ot-btn">'.esc_html( $settings['book_btn'] ).'</a>';
                                    echo '<a href="'.esc_html( $data['url']['url'] ).'" class="link-btn">'.esc_html( $settings['details_btn'] ).' <i class="fas fa-arrow-up-right"></i></a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
		        }    
	        echo '</div>'; 
        } elseif( $settings['layout'] == '2' ) {
        	echo '<div class="row gy-30 masonary-active">';
	            foreach( $settings['steps2'] as $data ) {

                    $h_target = $data['url']['is_external'] ? ' target="_blank"' : '';
                    $h_follow = $data['url']['nofollow'] ? ' rel="nofollow"' : '';

                    echo '<div class="col-xxl-auto col-md-6 filter-item">';
                        echo '<div class="hotel-box">';
                            if ( ! empty( $data['image']['url'] ) ) {
                                echo '<div class="box-img">';
                                    echo travon_img_tag( array(
                                        'url'   => esc_url( $data['image']['url'] ),
                                    ) );
                                echo '</div>';
                            }
							echo '<a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_html( $data['url']['url'] ).'" class="ot-btn">'.esc_html( $settings['book_btn'] ).'</a>';
                            echo '<div class="box-content">';
                                echo '<div class="media-body">';
                                    if ( ! empty( $data['price'] ) ) {
                                        echo '<p class="box-text">PRICE <span class="price">'.esc_html( $data['price'] ).'</span> / NIGHT</p>';
                                    }
									if ( ! empty( $data['title'] ) ) {
										echo '<h3 class="box-title"><a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_html( $data['url']['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
									}
                                echo '</div>';
                                
                                echo '<div class="rating-stars">';
									if( $data['client_rating'] == 'one' ){
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
									}elseif( $data['client_rating'] == 'two' ){
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
									}elseif( $data['client_rating'] == 'three' ){
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="fa-solid fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
										echo '<i class="far fa-star-sharp"></i>';
									}elseif( $data['client_rating'] == 'four' ){
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
                    echo '</div>';
		        }    
	        echo '</div>'; 
        } 
	}

}