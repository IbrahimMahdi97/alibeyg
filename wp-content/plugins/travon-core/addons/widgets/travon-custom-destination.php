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
 * Custom Destination Box Widget .
 *
 */
class Travon_Custom_Destination extends Widget_Base {

	public function get_name() {
		return 'travoncustomdestination';
	}

	public function get_title() {
		return __( 'Travon  Custom Destination', 'travon' );
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
				'label' 	=> __( 'Destination', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'location_label',
			[
				'label'     => __( 'Location Label', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'btn_label',
			[
				'label'     => __( 'Button Label', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );


        $repeater = new Repeater();

		$repeater->add_control(
			'location',
			[
				'label'     => __( 'Location', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'desc',
			[
				'label'     => __( 'Short Description', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
			]
        );
        $repeater->add_control(
			'trip_count',
			[
				'label'     => __( 'Trip Count', 'travon' ),
                'type'      => Controls_Manager::TEXT,
			]
        );
        $repeater->add_control(
			'url',
			[
				'label'     => __( 'URL', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
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


        echo '<div class="row align-items-center">';
            echo '<div class="col-xl-3 mb-40 mb-xl-0">';
                echo '<div class="trip-details-slide ot-carousel" data-fade="true">';
                	foreach( $settings['steps'] as $data ) { 
	                    echo '<div>';
	                        echo '<div class="trip-card-details">';
	                        	if ( ! empty( $settings['location_label'] ) ) {
		                            echo '<span class="subtitle">'.esc_html( $settings['location_label'] ).'</span>';
		                        }
		                        if ( ! empty( $data['location'] ) ) {
		                            echo '<h3 class="trip-title"><a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['location'] ).'</a></h3>';
		                        }
		                        if ( ! empty( $data['desc'] ) ) {
		                            echo '<p class="trip-text">'.esc_html( $data['desc'] ).'</p>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                }
                    
                echo '</div>';

                echo '<div class="icon-box text-center text-xl-start">';
                    echo '<button data-slick-prev=".trip-details-slide" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>';
                    echo '<button data-slick-next=".trip-details-slide" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>';
                echo '</div>';
            echo '</div>';
            echo '<div class="col-xl-9">';
                echo '<div class="trip-tab" data-asnavfor=".trip-details-slide">';
                	$i = 0;
                	foreach( $settings['steps'] as $data ) { 
                		$i++;

                		$active_class = $i == 1 ? 'active' : '';

	                    echo '<div class="trip-card '.esc_attr( $active_class ).'">';
	                    	if ( ! empty( $data['image']['url'] ) ) {
		                        echo '<div class="trip-card__img">';
		                            echo travon_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
		                        echo '</div>';
		                    }
	                        echo '<div class="trip-card__content">';
	                            echo '<div class="trip-card__location"><i class="fas fa-location-dot"></i></div>';
	                            if ( ! empty( $data['location'] ) ) {
		                            echo '<h2 class="trip-card__title box-title"> <a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['location'] ).'</a></h2>';
		                        }
		                        if ( ! empty( $data['trip_count'] ) ) {
		                            echo '<span class="trip-card__count">'.esc_html( $data['trip_count'] ).'</span>';
		                        }
		                        if ( ! empty( $settings['btn_label'] ) ) {
		                            echo '<a target="_blank" href="'.esc_url( $data['url'] ).'" class="ot-btn">'.esc_html( $settings['btn_label'] ).'</a>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                }
                echo '</div>';
            echo '</div>';
        echo '</div>';  
	}

}