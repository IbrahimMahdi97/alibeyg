<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Counter Up Widget .
 *
 */
class Travon_Counterup extends Widget_Base {

	public function get_name() {
		return 'travoncounterup';
	}

	public function get_title() {
		return __( 'Counter Up', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Content', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );  

        $this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Style', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'travon' ),
					'2' 		=> __( 'Style Two', 'travon' ),
					'3' 		=> __( 'Style Three', 'travon' ),
					'4' 		=> __( 'Style Four', 'travon' ),
					'5' 		=> __( 'Style Five', 'travon' ),
					'6' 		=> __( 'Style Six', 'travon' ),
				],
			]
		);   
		$repeater = new Repeater();

		$repeater->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'travon' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'travon' ),
			]
		);
		$repeater->add_control(
			'counter_suffix',
			[
				'label'     => __( 'Counter Suffix', 'travon' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'k+', 'travon' ),
			]
		);
		$repeater->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'travon' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'Years Of Experience', 'travon' ),
			]
		);
		$repeater->add_control(
			'counter_image',
			[
				'label' 		=> __( 'Counter Image', 'travon' ),
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
			'counter',
			[
				'label' 		=> __( 'Counter', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_text' 		=> __( 'Counter One', 'travon' ),
					],
				],
				'title_field' 	=> '{{{ counter_text }}}',
			]
		);
		$this->add_control(
			'show_white_icon',
			[
				'label' 		=> __( 'White Icon ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'layout_style' =>  ['1']  ],
			]
		);
		$this->end_controls_section();

        /*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Content Styling', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Number', 'travon' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h2'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} h2',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Ttitle', 'travon' ),
			]
		);
		$this->add_control(
			'overview_content_color',
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
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
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
			'overview_content_padding',
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


        if( $settings['layout_style'] == '1' ){

        	if( $settings['show_white_icon'] == 'yes' ){
        		$class = 'style2';
        	}else{
        		$class = '';
        	}
	        echo '<div class="row gx-0 justify-content-between">';
	           	foreach( $settings['counter'] as $data ) {	     
		            echo '<div class="col-6 col-lg-3 counter-card-wrap">';
		                echo '<div class="counter-card '.esc_attr($class).'">';
		                	if(!empty($data['counter_image']['url'])){
			                    echo '<div class="counter-card_icon">';
			                        echo '<img src="'.esc_url( $data['counter_image']['url']  ).'" alt="'.esc_attr('img', 'dealto').'">';
			                    echo '</div>';
			                }
		                    echo '<div class="media-body">';
		                    	if( ! empty( $data['counter_number'] ) ){

				                	$suffix = ( $data['counter_suffix'] ) ? $data['counter_suffix'] : '';

				                    echo '<h2 class="counter-card_number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>'.esc_html($suffix).'</h2>';
				                }
		                        if( !empty( $data['counter_text'] ) ){
				                    echo '<p class="counter-card_text">'.esc_html( $data['counter_text'] ).'</p>';
				                }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        }
	        echo '</div>';
	    } elseif( $settings['layout_style'] == '2' ) {
			echo '<div class="counter-grid-wrap">';
                foreach( $settings['counter'] as $data ) {	        
		            echo '<div class="counter-grid">';
		            	if( ! empty( $data['counter_number'] ) ){
		            		$suffix = ( $data['counter_suffix'] ) ? $data['counter_suffix'] : '';

			                echo '<h3 class="counter-grid_number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>'.esc_html($suffix).'</h3>';
			            }
			            if( !empty( $data['counter_text'] ) ){
			                echo '<p class="counter-grid_text">'.wp_kses_post( $data['counter_text'] ).'</p>';
			            }
		            echo '</div>';
		        }   
	        echo '</div>';
		} elseif( $settings['layout_style'] == '3' ) {
			echo '<div class="row g-0 justify-content-between">';
                foreach( $settings['counter'] as $data ) {	        
		            echo '<div class="col-sm-6 col-lg-3 counter-box-wrap">';
						echo '<div class="counter-box">';
							if( ! empty( $data['counter_number'] ) ){
								$suffix = ( $data['counter_suffix'] ) ? $data['counter_suffix'] : '';

								echo '<h3 class="counter-box__number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>'.esc_html($suffix).'</h3>';
							}
							if( !empty( $data['counter_text'] ) ){
								echo '<p class="counter-box__text">'.wp_kses_post( $data['counter_text'] ).'</p>';
							}
						echo '</div>';
		            echo '</div>';
		        }   
	        echo '</div>';
		} elseif( $settings['layout_style'] == '4' ) {
	    	echo '<div class="about-counter-wrap">';
                foreach( $settings['counter'] as $data ) {	        
		            echo '<div class="about-counter">';
						if (!empty($data['counter_image']['url'])) {
							echo '<div class="about-counter__icon">';
								echo '<img src="'.esc_url( $data['counter_image']['url']  ).'" alt="'.esc_attr('img', 'dealto').'">';
							echo '</div>';
						}
		            	if ( ! empty( $data['counter_number'] ) ) {
		            		$suffix = ( $data['counter_suffix'] ) ? $data['counter_suffix'] : '';

			                echo '<h3 class="about-counter__number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>'.esc_html($suffix).'</h3>';
			            }
			            if ( !empty( $data['counter_text'] ) ) {
			                echo '<p class="about-counter__text">'.wp_kses_post( $data['counter_text'] ).'</p>';
			            }
		            echo '</div>';
		        }   
	        echo '</div>';
	    } elseif( $settings['layout_style'] == '5' ) {
	    	echo '<div class="counter-block-wrap">';
                foreach( $settings['counter'] as $data ) {	        
		            echo '<div class="counter-block">';
		            	if ( ! empty( $data['counter_number'] ) ) {
		            		$suffix = ( $data['counter_suffix'] ) ? $data['counter_suffix'] : '';

			                echo '<h3 class="counter-block_number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>'.esc_html($suffix).'</h3>';
			            }
			            if ( !empty( $data['counter_text'] ) ) {
			                echo '<p class="counter-block_text">'.wp_kses_post( $data['counter_text'] ).'</p>';
			            }
		            echo '</div>';
		        }   
	        echo '</div>';
	    } elseif( $settings['layout_style'] == '6' ) {
	    	echo '<div class="row">';
                foreach( $settings['counter'] as $data ) {	        
		            echo '<div class="col-xl-3 col-sm-6 counter-list-wrap">';
						echo '<div class="counter-list" data-bg-src="'.TRAVON_PLUGDIRURI.'assets/img/counter_list_bg.png">';
							if(!empty($data['counter_image']['url'])){
								echo '<div class="box-icon" data-mask-src="'.TRAVON_PLUGDIRURI.'assets/img/counter_icon_bg.png">';
									echo '<img src="'.esc_url( $data['counter_image']['url']  ).'" alt="'.esc_attr('img', 'dealto').'">';
								echo '</div>';
							}
							if ( ! empty( $data['counter_number'] ) ) {
								$suffix = ( $data['counter_suffix'] ) ? $data['counter_suffix'] : '';

								echo '<h3 class="counter-list_number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>'.esc_html($suffix).'</h3>';
							}
							if ( !empty( $data['counter_text'] ) ) {
								echo '<p class="box-text">'.wp_kses_post( $data['counter_text'] ).'</p>';
							}
						echo '</div>';
		            echo '</div>';
		        }   
	        echo '</div>';
	    }
	}

}