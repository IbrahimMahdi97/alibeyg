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
 * Team Widget .
 *
 */
class Travon_Team extends Widget_Base {

	public function get_name() {
		return 'travonteam';
	}

	public function get_title() {
		return __( 'Travon Team', 'travon' );
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
				'label'     => __( 'Team Slider', 'travon' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'layout',
			[
				'label' 		=> __( 'Team Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'travon' ),
					'2'  			=> __( 'Style Two', 'travon' ),
				],
			]
		);

		$this->add_control(
			'shape_image',
			[
				'label' 		=> esc_html__( 'Shape Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => [ '2' ] ],
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Name' , 'travon' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'profile_link',
			[
				'label' 		=> esc_html__( 'Profile Link', 'travon' ),
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
			'designation', [
				'label' 		=> __( 'Designation', 'travon' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Customer' , 'travon' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'team_image',
			[
				'label' 		=> esc_html__( 'Guide Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );
        $repeater->add_control(
			'fb_link',
			[
				'label' 		=> esc_html__( 'Facebook Link', 'travon' ),
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
			'twitter_link',
			[
				'label' 		=> esc_html__( 'Twitter Link', 'travon' ),
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
			'driblle_link',
			[
				'label' 		=> esc_html__( 'Dribble Link', 'travon' ),
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
			'linkedin_link',
			[
				'label' 		=> esc_html__( 'Linkedin Link', 'travon' ),
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
			'team_members',
			[
				'label' 		=> __( 'Speaker Member', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'travon' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
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
				'label' => esc_html__( 'Name', 'travon' ),
			]
		);
        $this->add_control(
			'overview_title_color',
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
					'{{WRAPPER}} .team-desig'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} .team-desig',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
   
		if( ! empty( $settings['team_members'] ) ){
			if($settings['make_it_slider'] == 'yes'){
				$this->add_render_attribute( 'wrapper', 'class', ' row slider-shadow ot-carousel' );
				$this->add_render_attribute( 'wrapper', 'id', $settings['slider_id'] );
				$this->add_render_attribute( 'wrapper', 'data-slide-show', $settings['desktop_items']['size'] );
		        $this->add_render_attribute( 'wrapper', 'data-lg-slide-show', $settings['laptop_items']['size'] );
		        $this->add_render_attribute( 'wrapper', 'data-md-slide-show', $settings['tablet_items']['size'] );
		        $this->add_render_attribute( 'wrapper', 'data-sm-slide-show', $settings['mobile_items']['size'] );
				$this->add_render_attribute( 'wrapper', 'data-xs-slide-show', $settings['small_mobile_items']['size'] );

		        if($settings['show_dots'] == 'yes'){
		        	$this->add_render_attribute( 'wrapper', 'data-dots', true );
		        }	
		        if($settings['show_arrow'] == 'yes'){
		        	$this->add_render_attribute( 'wrapper', 'data-arrows', true );
		        }	
			}else{
				$this->add_render_attribute( 'wrapper', 'class', 'row gy-30' );
			}

			if ( $settings['layout'] == '1' ) {
				echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					foreach( $settings['team_members'] as $data ) {
						$target = $data['profile_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow = $data['profile_link']['nofollow'] ? ' rel="nofollow"' : '';

						$f_target = $data['fb_link']['is_external'] ? ' target="_blank"' : '';
						$f_nofollow = $data['fb_link']['nofollow'] ? ' rel="nofollow"' : '';

						$t_target = $data['twitter_link']['is_external'] ? ' target="_blank"' : '';
						$t_nofollow = $data['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

						$i_target = $data['driblle_link']['is_external'] ? ' target="_blank"' : '';
						$i_nofollow = $data['driblle_link']['nofollow'] ? ' rel="nofollow"' : '';

						$l_target = $data['linkedin_link']['is_external'] ? ' target="_blank"' : '';
						$l_nofollow = $data['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';


						echo '<div class="col-md-6 col-lg-4 col-xl-3 ">';
							echo '<div class="ot-team team-box">';
								echo '<div class="team-img">';
									if( ! empty( $data['team_image']['url'] ) ){
										echo travon_img_tag( array(
											'url'       => esc_url( $data['team_image']['url'] ),
										) );
									}
									echo '<div class="team-social">';
										echo '<div class="play-btn"><i class="far fa-plus"></i></div>';
										echo '<div class="ot-social">';
											if( ! empty( $data['fb_link']['url']) ){
												echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'" class="icon-bg-custom"><i class="fab fa-facebook-f"></i></a>';
											}
											if( ! empty( $data['twitter_link']['url']) ){
												echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'" class="icon-bg-custom"><i class="fab fa-twitter"></i></a>';
											}
											if( ! empty( $data['driblle_link']['url']) ){
												echo '<a '.wp_kses_post( $i_nofollow.$i_target ).' href="'.esc_url( $data['driblle_link']['url'] ).'" class="icon-bg-custom"><i class="fa-brands fa-dribbble"></i></a>';
											}
											if( ! empty( $data['linkedin_link']['url']) ){
												echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'" class="icon-bg-custom"><i class="fab fa-linkedin-in"></i></a>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
								echo '<div class="team-content">';
									if( ! empty( $data['name']) ){
										echo '<h3 class="box-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
									}
									if( ! empty( $data['designation']) ){
										echo '<span class="team-desig">'.esc_html($data['designation']).'</span>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
			} elseif ( $settings['layout'] == '2' ) {
				echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					foreach( $settings['team_members'] as $data ) {
						$target = $data['profile_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow = $data['profile_link']['nofollow'] ? ' rel="nofollow"' : '';

						$f_target = $data['fb_link']['is_external'] ? ' target="_blank"' : '';
						$f_nofollow = $data['fb_link']['nofollow'] ? ' rel="nofollow"' : '';

						$t_target = $data['twitter_link']['is_external'] ? ' target="_blank"' : '';
						$t_nofollow = $data['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

						$i_target = $data['driblle_link']['is_external'] ? ' target="_blank"' : '';
						$i_nofollow = $data['driblle_link']['nofollow'] ? ' rel="nofollow"' : '';

						$l_target = $data['linkedin_link']['is_external'] ? ' target="_blank"' : '';
						$l_nofollow = $data['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';


						echo '<div class="col-md-6 col-lg-4 col-xl-3 ">';
							echo '<div class="ot-team team-card">';
								echo '<div class="team-img">';
									if( ! empty( $data['team_image']['url'] ) ){
										echo travon_img_tag( array(
											'url'       => esc_url( $data['team_image']['url'] ),
										) );
									}
								echo '</div>';
								echo '<div class="team-social">';
									echo '<div class="icon-btn"><i class="far fa-plus"></i></div>';
									echo '<div class="ot-social">';
										if( ! empty( $data['fb_link']['url']) ){
											echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'" class="icon-bg-custom"><i class="fab fa-facebook-f"></i></a>';
										}
										if( ! empty( $data['twitter_link']['url']) ){
											echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'" class="icon-bg-custom"><i class="fab fa-twitter"></i></a>';
										}
										if( ! empty( $data['driblle_link']['url']) ){
											echo '<a '.wp_kses_post( $i_nofollow.$i_target ).' href="'.esc_url( $data['driblle_link']['url'] ).'" class="icon-bg-custom"><i class="fa-brands fa-dribbble"></i></a>';
										}
										if( ! empty( $data['linkedin_link']['url']) ){
											echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'" class="icon-bg-custom"><i class="fab fa-linkedin-in"></i></a>';
										}
									echo '</div>';
								echo '</div>';
								echo '<div class="team-content" data-bg-src="'.esc_url($settings['shape_image']['url']).'">';
									if( ! empty( $data['designation']) ){
										echo '<span class="team-desig">'.esc_html($data['designation']).'</span>';
									}
									if( ! empty( $data['name']) ){
										echo '<h3 class="box-title team-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
			}
		}
	}
}