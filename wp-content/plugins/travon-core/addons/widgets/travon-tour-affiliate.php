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
 * Tour Affiliate Box Widget .
 *
 */
class Travon_Tour_Affiliate extends Widget_Base {

	public function get_name() {
		return 'travontouraffiliate';
	}

	public function get_title() {
		return __( 'Travon Tour Affiliate', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'touraffiliate_section',
			[
				'label' 	=> __( 'Tour Affiliate', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 		=> __( 'Tour Affiliate Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'travon' ),
				],
			]
		);

        $this->add_control(
			'favorite_icon',
			[
				'label'     => __( 'Favorite Icon', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( '<i class="far fa-heart"></i>', 'travon' ),
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
				'label' 		=> esc_html__( 'Tour Affiliate Link', 'travon' ),
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
			'location',
			[
				'label'     => __( 'Location', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
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
			'review_ammount',
			[
				'label'     => __( 'Review Ammount', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
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


        /*-----------------------------------------touraffiliates styling------------------------------------*/

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
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
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
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------touraffiliates content styling------------------------------------*/

		$this->start_controls_section(
			'content_style_section',
			[
				'label' 	=> __( 'Meta Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'touraffiliates_content_color',
			[
				'label' 		=> __( 'Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} span, {{WRAPPER}} a'	=> 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'touraffiliates_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} span, {{WRAPPER}} a',
			]
		);

        $this->add_responsive_control(
			'touraffiliates_content_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span, {{WRAPPER}} a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'touraffiliates_content_padding',
			[
				'label' 		=> __( 'Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span, {{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        echo '<div class="tour-box">';
                            if ( ! empty( $data['image']['url'] ) ) {
                                echo '<div class="box-img">';
                                    echo '<div class="overflow-hidden">';
                                        echo travon_img_tag( array(
                                            'url'   => esc_url( $data['image']['url'] ),
                                        ) );
                                    echo '</div>';
                                    if ( ! empty( $settings['favorite_icon'] ) ) {
                                        echo '<div class="box-icon">';
                                            echo wp_kses_post( $settings['favorite_icon'] );
                                        echo '</div>';
                                    }
                                echo '</div>';
                                
                            }
                            echo '<div class="box-content">';
                                if(!empty($data['location'])){
                                    echo '<div class="tour-meta">';
                                        echo '<span><i class="far fa-location-dot"></i> '.esc_html($data['location']).'</span>';
                                    echo '</div>';
                                }
                                if ( ! empty( $data['title'] ) ) {
                                    echo '<h3 class="box-title"><a '.wp_kses_post( $h_follow.$h_target ).' href="'.esc_url( $data['button_link']['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
                                }
                                echo '<div class="box-rating">';
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
                                    echo esc_html($data['review_ammount']);
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="box-bottom">';
                                if(!empty($data['price'])){
                                    echo '<div class="tour-meta">';
                                        echo '<span><i class="far fa-clock"></i> '.esc_html($data['duration']).'</span>';
                                        echo '<span><i class="far fa-dollar-circle"></i> '.esc_html($data['price']).'</span>';
                                    echo '</div>';
                                }
                            echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        }    
	        echo '</div>';
        } 
	}

}