<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Trip Post Widget .
 *
 */
class Travon_Trip_Post extends Widget_Base {

	public function get_name() {
		return 'travontrippost';
	}

	public function get_title() {
		return __( 'Travon Trip Post', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'trip_post_section',
			[
				'label' => __( 'Trip Post', 'travon' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'trip_layout_style',
			[
				'label' 		=> __( 'Trip Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'travon' ),
					'two' 			=> __( 'Style Two', 'travon' ),
					'three' 		=> __( 'Style Three', 'travon' ),
				],
			]
		);

        $this->add_control(
			'listby',
			[
				'label' 	=> __( 'Order By', 'travon' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'featured' => __( 'Featured', 'wptravelengine-elementor-widgets' ),
					'latest'   => __( 'Latest', 'wptravelengine-elementor-widgets' ),
					'onsale'   => __( 'onsale', 'wptravelengine-elementor-widgets' ),
					'byid'     => __( 'Choose from the list', 'wptravelengine-elementor-widgets' ),
                ],
                'default'  	=> 'byid'
			]
        );
        $this->add_control(
			'tripsCount',
			[
				'label' 	=> __( 'No of Post to show', 'travon' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'trip', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'  	=> __( '4', 'travon' ),
                'condition' => array(
					'listby!' => 'byid',
				),
			]
        );
        $this->add_control(
			'tripsToDisplay',
			[
				'label'         => __( 'Select Trips', 'travon' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->travon_post_id(),
				'condition' => array(
					'listby' => 'byid',
				),
			]
        );

        $this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'trip_layout_style' => [ 'three' ] ],
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'trip_layout_style' => [ 'three' ] ],
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'countdown_section',
			[
				'label' 	=> __( 'Ofer Area', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'trip_layout_style' => [ 'three' ] ],
			]
        );


        $this->add_control(
			'date', [
				'label' 		=> __( 'Offer End Date With Time', 'travon' ),
				'type' 			=> Controls_Manager::DATE_TIME,
				'label_block' 	=> true,
			]
        );

        $this->add_control(
			'offer_image',
			[
				'label' 		=> __( 'Offer Image', 'travon' ),
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
			'bg_image',
			[
				'label' 		=> __( 'Backgrond Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
        );
        $this->end_controls_section();

        //------------------------------------feature Control------------------------------------//

		$this->start_controls_section(
			'service_control',
			[
				'label'     => __( 'Slider Control', 'travon' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'trip_layout_style!' =>  'three'  ],
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
					'size' 			=> 5,
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
					'size' 		=> 2,
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
		$this->add_control(
			'slider_id',
			[
				'label' 		=> __( 'Slider Id?', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> 'p_001',
			]
		);

		$this->end_controls_section();
		
    }

    public function travon_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'destination',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'travon');
        }

        return $catarr;
    }

    public function travon_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'activities',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'travon');
        }

        return $catarr;
    }

    // Get Specific Post
    public function travon_post_id(){
        $args = array(
            'post_type'         => 'trip',
            'posts_per_page'    => -1,
        );

        $travon_post = new WP_Query( $args );

        $postarray = [];

        while( $travon_post->have_posts() ){
            $travon_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $query_args = array(
			'post_type'      => WP_TRAVEL_ENGINE_POST_TYPE,
			'posts_per_page' => $settings['tripsCount'],
			'fields'         => 'ids',
			'post_status'    => 'publish',
		);
		if ( 'featured' === $settings['listby'] ) {
			$query_args['meta_key'] = 'wp_travel_engine_featured_trip';
			$query_args['meta_value'] = 'yes';
		} elseif ( 'onsale' === $settings['listby'] ) {
			$query_args['meta_key'] = '_s_has_sale';
			$query_args['meta_value'] = 'yes';
		} elseif ( 'byid' === $settings['listby'] ) {
			$query_args = array(
				'post_type'      => WP_TRAVEL_ENGINE_POST_TYPE,
				'posts_per_page' => -1,
				'fields'         => 'ids',
				'post__in'         => $settings['tripsToDisplay'],
				'post_status'    => 'publish',
			);
			
		}


        $blogpost = new WP_Query( $query_args );
        global $wp;
		global $post;


		if( $settings['trip_layout_style'] !== 'three' ){
			if($settings['make_it_slider'] == 'yes'){
				if( $settings['trip_layout_style'] == 'one' ){
					$this->add_render_attribute( 'wrapper', 'class', 'row slide-shadow ot-carousel' );
				}else{
					$this->add_render_attribute( 'wrapper', 'class', 'row gx-0 ot-carousel' );
				}
				$this->add_render_attribute( 'wrapper', 'id', $settings['slider_id'] );
				$this->add_render_attribute( 'wrapper', 'data-slide-show', $settings['desktop_items']['size'] );
		        $this->add_render_attribute( 'wrapper', 'data-lg-slide-show', $settings['laptop_items']['size'] );
		        $this->add_render_attribute( 'wrapper', 'data-md-slide-show', $settings['tablet_items']['size'] );
		        $this->add_render_attribute( 'wrapper', 'data-sm-slide-show', $settings['mobile_items']['size'] );
		
		        if($settings['show_arrow'] == 'yes'){
		        	$this->add_render_attribute( 'wrapper', 'data-arrows', true );
		        }	
			}else{
				$this->add_render_attribute( 'wrapper', 'class', 'row gy-30 custom-4-col' );
			}
		}

		if( $settings['trip_layout_style'] !== 'three' ){
		echo '<div '.$this->get_render_attribute_string('wrapper').'>';
		}
	        if( $settings['trip_layout_style'] == 'one' ){
	        	$j = 1;
	        	// $user_wishlists = wptravelengine_user_wishlists();
	        	
	        	while($blogpost->have_posts()) :
	        		$user_wishlists = wptravelengine_user_wishlists();
	                $blogpost->the_post(); 
	                $details      = wte_get_trip_details( get_the_ID() );
					$details['j'] = $j;
					$details['user_wishlists'] = $user_wishlists;
	                wte_get_template( 'content-grid.php', $details );
	                $j++;                            
	            endwhile; 
	            wp_reset_postdata();
		    }elseif( $settings['trip_layout_style'] == 'two' ){
		    	$j = 1;
	        	// $user_wishlists = wptravelengine_user_wishlists();
	        	
	        	while($blogpost->have_posts()) :
	        		$user_wishlists = wptravelengine_user_wishlists();
	                $blogpost->the_post(); 
	                $details      = wte_get_trip_details( get_the_ID() );
					$details['j'] = $j;
					$details['user_wishlists'] = $user_wishlists;
	                wte_get_template( 'content-grid-style-2.php', $details );
	                $j++;                            
	            endwhile; 
	            wp_reset_postdata();
	           
		    }else{
		    	$offer_date_end = $settings['date'];
				$replace 	= array('-');
				$with 		= array('/');

				$date 	= str_replace( $replace, $with, $offer_date_end );
		    	$ofr_img 	= $settings['offer_image']['url'] ? $settings['offer_image']['url'] : '#'; 
				$bg_img 	= $settings['bg_image']['url'] ? $settings['bg_image']['url'] : '#'; 
		    	echo '<section class="bg-repeat overflow-hidden">';
			        echo '<div class="custom-row">';
			            echo '<div class="offer-box space" data-bg-src="'.esc_url( $bg_img ).'">';
				            echo '<img class="offer-img" src="'.esc_url( $ofr_img ).'" alt="offer">';
				            echo '<ul class="countdown-list countdown-1" data-offer-date="'.esc_attr($date).'">';
				                echo '<li>';
					                echo '<div class="day count-number">'.esc_html('00', 'travon').'</div>';
					                echo '<span class="count-name">'.esc_html('Days', 'travon').'</span>';
					            echo '</li> ';
					            echo '<li>';
					                echo '<div class="hour count-number">'.esc_html('00', 'travon').'</div>';
					                echo '<span class="count-name">'.esc_html('Hours', 'travon').'</span>';
					            echo '</li> ';
					            echo '<li>';
					                echo '<div class="minute count-number">'.esc_html('00', 'travon').'</div>';
					                echo '<span class="count-name">'.esc_html('Min', 'travon').'</span>';
					            echo '</li> ';
					            echo '<li>';
					                echo '<div class="seconds count-number">'.esc_html('00', 'travon').'</div>';
					                echo '<span class="count-name">'.esc_html('Sec', 'travon').'</span>';
					            echo '</li>';
				            echo '</ul>';
				        echo '</div>';
			            echo '<div class="deal-box">';
			                echo '<div class="custom-container space-top">';
			                    echo '<div class="row text-center text-lg-start justify-content-lg-between justify-content-center align-items-end">';
			                        echo '<div class="col-lg-9 mb-n2 mb-lg-0">';
			                            echo '<div class="title-area">';
			                            	if( $settings['title'] ){
				                                echo '<span class="sub-title text-white justify-content-center justify-content-lg-start">';
				                                    echo '<span class="shape bg-white left d-inline-block d-lg-none"><span class="dots"></span></span>';
				                                    echo esc_html( $settings['title'] );
				                                    echo '<span class="shape bg-white right"><span class="dots"></span></span>';
				                                echo '</span>';
				                            }
				                            if( $settings['subtitle'] ){
				                                echo '<h2 class="sec-title text-white">'.$settings['subtitle'].'</h2>';
				                            }
			                            echo '</div>';
			                        echo '</div>';
			                        echo '<div class="col-auto">';
			                            echo '<div class="sec-btn">';
			                                echo '<div class="icon-box style2">';
			                                    echo '<button data-slick-prev="#dealSlide2" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>';
			                                    echo '<button data-slick-next="#dealSlide2" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>';
			                                echo '</div>';
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			                echo '<div class="slider-area space-bottom">';
			                   echo ' <div class="row" id="dealSlide2">';

			                        $j = 1;
						        	// $user_wishlists = wptravelengine_user_wishlists();
						        	
						        	while($blogpost->have_posts()) :
						        		$user_wishlists = wptravelengine_user_wishlists();
						                $blogpost->the_post(); 
						                $details      = wte_get_trip_details( get_the_ID() );
										$details['j'] = $j;
										$details['user_wishlists'] = $user_wishlists;
						                wte_get_template( 'content-grid-style-3.php', $details );
						                $j++;                            
						            endwhile; 
						            wp_reset_postdata();
			                       
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			       echo ' </div>';
			   echo ' </section>';
		    }
		if( $settings['trip_layout_style'] !== 'three' ){
		    echo '</div>';
		}
	}
}