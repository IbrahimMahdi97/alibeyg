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
 * Service Box Widget .
 *
 */
class Travon_Service extends Widget_Base {

	public function get_name() {
		return 'travonservice';
	}

	public function get_title() {
		return __( 'Travon Service', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_section',
			[
				'label' 	=> __( 'Service', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 		=> __( 'Service Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'travon' ),
					'2' 			=> __( 'Style Two', 'travon' ),
					'3' 			=> __( 'Style Three', 'travon' ),
				],
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
			'class',
			[
				'label' 		=> __( 'Icon Class', 'travon' ),
				'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
		);
		$repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
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


        /*-----------------------------------------services styling------------------------------------*/

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

        /*-----------------------------------------services content styling------------------------------------*/

		$this->start_controls_section(
			'content_style_section',
			[
				'label' 	=> __( 'Content Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'services_content_color',
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
				'name' 			=> 'services_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'services_content_margin',
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
			'services_content_padding',
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

        if ( $settings['layout'] == '1' ) {
	        echo '<div class="service_1">';
	            foreach( $settings['steps'] as $data ) {             
		            echo '<div class="service-card">';
		            	if ( ! empty( $data['image']['url'] ) ) {
		                    echo '<div class="service-card__icon">';
		                        echo travon_img_tag( array(
									'url'   => esc_url( $data['image']['url'] ),
								) );
		                    echo '</div>';
		                }
		                echo '<div class="media-body">';
		                	if ( ! empty( $data['title'] ) ) {
			                    echo '<h3 class="box-title">'.esc_html( $data['title'] ).'</h3>';
			                }
			                if ( ! empty( $data['content'] ) ) {
			                    echo '<p class="service-card__text">'.esc_html( $data['content'] ).'</p>';
			                }
		                echo '</div>';
		            echo '</div>';
		        }    
	        echo '</div>'; 
        } elseif ( $settings['layout'] == '2' ) {
        	echo '<div class="row slider-shadow ot-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">';
	            foreach( $settings['steps'] as $data ) {                
		            echo '<div class="col-sm-6 col-lg-4 col-xl-3">'; 
						echo '<div class="service-box">'; 
							if ( ! empty( $data['image']['url'] ) ) {
								echo '<div class="box-icon">';
									echo travon_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
								echo '</div>';
							}
							if ( ! empty( $data['title'] ) ) {
								echo '<h3 class="box-title">'.esc_html( $data['title'] ).'</h3>';
							}
							if ( ! empty( $data['content'] ) ) {
								echo '<p class="box-text">'.esc_html( $data['content'] ).'</p>';
							}
		                echo '</div>';
		            echo '</div>';
		        } 
	        echo '</div>';
        } elseif ( $settings['layout'] == '3' ) {
        	echo '<div class="row gy-30">';
	            foreach( $settings['steps'] as $data ) {                
		            echo '<div class="col-sm-6 col-lg-4 col-xl-3">'; 
						echo '<div class="service-grid">'; 
							if ( ! empty( $data['image']['url'] ) ) {
								echo '<div class="box-icon">';
									echo travon_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
								echo '</div>';
							}
							if ( ! empty( $data['title'] ) ) {
								echo '<h3 class="box-title">'.esc_html( $data['title'] ).'</h3>';
							}
							if ( ! empty( $data['content'] ) ) {
								echo '<p class="box-text">'.esc_html( $data['content'] ).'</p>';
							}
		                echo '</div>';
		            echo '</div>';
		        } 
	        echo '</div>';
        } 
	}

}