<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Header Widget .
 *
 */
class Travon_Header extends Widget_Base {

	public function get_name() {
		return 'travonheader';
	}
	public function get_title() {
		return __( 'Header', 'travon' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'travon_header_elements' ];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Header Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'travon' ),
					'2' 		=> __( 'Style Two', 'travon' ),
					'3' 		=> __( 'Style Three', 'travon' ),
					'4' 		=> __( 'Style Four', 'travon' ),
					'5' 		=> __( 'Style Five', 'travon' ),
				],
			]
		);

		/* Topbar -----------------------------------------*/
		$this->add_control(
			'show_topbar',
			[
				'label' 		=> __( 'Show Topbar ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'topbar_slogan',
			[
				'label' 		=> __( 'Topbar Slogan', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'label_block' => true,
				'condition'		=> [ 'layout_style' => ['0'] ],
			]
		);		
		$this->add_control(
			'topbar_phone',
			[
				'label' 		=> __( 'Phone', 'travon' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'show_topbar' => 'yes' ],
			]
		);	
		$this->add_control(
			'topbar_email',
			[
				'label' 		=> __( 'Email', 'travon' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'show_topbar' => 'yes' ],
			]
		);	
		$this->add_control(
			'topbar_location',
			[
				'label' 		=> __( 'Location', 'travon' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'show_topbar' => 'yes' ],
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'travon' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'travon' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'travon' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(
			'topbar_social_title',
			[
				'label' 		=> __( 'Social Title', 'travon' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'layout_style' => ['4', '5'] ],
			]
		);
		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','travon' ),
					],
				],
				'condition'		=> [ 'layout_style' => ['4', '5'] ],
			]
		);

		$this->add_control(
			'logo_bg',
			[
				'label' 		=> __( 'Logo Background', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition' => ['layout_style' => ['5']]
			]
        );
       
		//----------------------------maim menu control----------------------------//

		$this->add_control(

			'logo_image',

			[
				'label' 		=> __( 'Upload Logo', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$menus = $this->travon_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'travon_menu_select',
				[
					'label'     	=> __( 'Select Travon Menu', 'travon' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'travon' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'travon' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'travon' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}


		$this->add_control(
			'show_search_btn',
			[
				'label' 		=> __( 'Show Search ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'show_off_canvus',
			[
				'label' 		=> __( 'Show Offcanvus ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'travon' ),
				'type' 			=> Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button Link', 'travon' ),
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

		$this->end_controls_section();


		//----------------------------------- Topbar Styling-------------------------------------//
        $this->start_controls_section(
			'topbar_styling',
			[
				'label'     => __( 'Topbar Styling', 'travon' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition'	=> [ 'show_topbar' => 'yes' ],
			]
        );

        $this->add_control(
			'top_bg_color',
			[
				'label' 		=> __( 'Menu top Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .header-top' => 'background-color: {{VALUE}};',
                ]
			]
        );
        $this->add_control(
			'top_level_txt_color',
			[
				'label' 			=> __( 'Top Text Color', 'travon' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .header-top' => '--body-color: {{VALUE}};',
                ]
			]
        );
        $this->add_control(
			'top_level_text_hover_color',
			[
				'label' 			=> __( 'Link Hover Color', 'travon' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .header-top a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );
		$this->end_controls_section();
        

        //-----------------------------------Menubar Styling-------------------------------------//
        $this->start_controls_section(
			'menubar_styling',
			[
				'label'     => __( 'Menubar Styling', 'travon' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'top_level_menu_bg_color',
			[
				'label' 		=> __( 'Menu Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_txt_color',
			[
				'label' 			=> __( 'Menu Text Color', 'travon' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'travon' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu > ul > li > a:hover' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_txt_color',
			[
				'label' 			=> __( 'Menu Hover Text Color', 'travon' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_bottom_color',
			[
				'label' 			=> __( 'Menu Bottom Hover Color', 'travon' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .menu-style1 > ul > li > a::before' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography',
				'label' 		=> __( 'Menu Typography', 'travon' ),
                'selector' 		=> '{{WRAPPER}} .main-menu ul > li > a',
			]
		);

        $this->add_responsive_control(
			'top_level_menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'top_level_menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->add_control(
			'top_level_menu_height',
			[
				'label' 		=> __( 'Height', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 	=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max'	=> 500
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-menu ul > li > a' => 'height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}} !important;'
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

    public function travon_menu_select(){
	    $travon_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'evona' );
	    foreach( $travon_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $travon_avaiable_menu   = $this->travon_menu_select();

		if( ! $travon_avaiable_menu ){
			return;
		}

		$args = [
			'menu' 			=> $settings['travon_menu_select'],
			'menu_class' 	=> 'travon-menu',
			'container' 	=> '',
		];

		$phone      = $settings['topbar_phone'];
        $email      = $settings['topbar_email'];

        $replace        = array(' ','-',' - ');
        $with           = array('','','');

        $phoneurl       = str_replace( $replace, $with, $phone );
        $eamilurl       = str_replace( $replace, $with, $email );

	    echo travon_mobile_menu();

	    echo travon_search_box();

		echo '<div class="sidemenu-wrapper d-none d-lg-block ">';
            echo '<div class="sidemenu-content">';
                echo '<button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>';
                if(is_active_sidebar('travon-offcanvas-sidebar')){
                    dynamic_sidebar( 'travon-offcanvas-sidebar' );
                }
            echo '</div>';
        echo '</div>';

		if ( $settings['layout_style'] == '1' ) {
			echo '<div class="ot-header header-layout2">';
				echo '<div class="sticky-wrapper">';
					echo '<!-- Main Menu Area -->';
					echo '<div class="menu-area">';
						echo '<div class="container">';
							echo '<div class="row align-items-center justify-content-between">';
								if( ! empty( $settings['logo_image']['url'] ) ){
									echo '<div class="col-auto">';
										echo '<div class="header-logo">';
											echo '<a href="'.esc_url( home_url( '/' ) ).'">';
												echo travon_img_tag( array(
													'url' => esc_url( $settings['logo_image']['url'] ),
												) );
											echo '</a>';
										echo '</div>';
									echo '</div>';
								}
								echo '<div class="col-auto">';
									echo '<nav class="main-menu d-none d-lg-inline-block">';
										if( ! empty( $settings['travon_menu_select'] ) ){
											wp_nav_menu( $args );
										}
									echo '</nav>';
									echo '<button type="button" class="ot-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
								echo '</div>';
								echo '<div class="col-auto d-none d-xl-block">';
									echo '<div class="header-button">';
										if( $settings['show_search_btn'] == 'yes' ){
											echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
										}
										if( $settings['show_off_canvus'] == 'yes' ){
											echo '<a href="#" class="icon-btn sideMenuToggler"><i class="fa-regular fa-bars"></i></a>';
										}
										if(!empty($settings['button_text'])){
											echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="ot-btn ml-25">'.esc_html($settings['button_text']).'</a>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';		
		} elseif ( $settings['layout_style'] == '2' ) {
			echo '<div class="ot-header header-layout3">';
				echo '<div class="sticky-wrapper">';
					echo '<!-- Main Menu Area -->';
					echo '<div class="menu-area">';
						echo '<div class="container">';
							echo '<div class="row align-items-center justify-content-between">';
								if( ! empty( $settings['logo_image']['url'] ) ){
									echo '<div class="col-auto">';
										echo '<div class="header-logo">';
											echo '<a href="'.esc_url( home_url( '/' ) ).'">';
												echo travon_img_tag( array(
													'url' => esc_url( $settings['logo_image']['url'] ),
												) );
											echo '</a>';
										echo '</div>';
									echo '</div>';
								}
								echo '<div class="col-auto">';
									echo '<nav class="main-menu d-none d-lg-inline-block">';
										if( ! empty( $settings['travon_menu_select'] ) ){
											wp_nav_menu( $args );
										}
									echo '</nav>';
									echo '<button type="button" class="ot-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
								echo '</div>';
								echo '<div class="col-auto d-none d-xl-block">';
									echo '<div class="header-button">';
										if( $settings['show_search_btn'] == 'yes' ){
											echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
										}
										if( $settings['show_off_canvus'] == 'yes' ){
											echo '<a href="#" class="icon-btn sideMenuToggler"><i class="fa-regular fa-bars"></i></a>';
										}
										if(!empty($settings['button_text'])){
											echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="ot-btn ml-25">'.esc_html($settings['button_text']).'</a>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';		
		} elseif ( $settings['layout_style'] == '3' ) {
			echo '<div class="ot-header header-layout4">';
				echo '<div class="sticky-wrapper">';
					echo '<!-- Main Menu Area -->';
					echo '<div class="menu-area">';
						echo '<div class="container">';
							echo '<div class="row align-items-center justify-content-between">';
								if( ! empty( $settings['logo_image']['url'] ) ){
									echo '<div class="col-auto">';
										echo '<div class="header-logo">';
											echo '<a href="'.esc_url( home_url( '/' ) ).'">';
												echo travon_img_tag( array(
													'url' => esc_url( $settings['logo_image']['url'] ),
												) );
											echo '</a>';
										echo '</div>';
									echo '</div>';
								}
								echo '<div class="col-auto">';
									echo '<nav class="main-menu d-none d-lg-inline-block">';
										if( ! empty( $settings['travon_menu_select'] ) ){
											wp_nav_menu( $args );
										}
									echo '</nav>';
									echo '<button type="button" class="ot-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
								echo '</div>';
								echo '<div class="col-auto d-none d-xl-block">';
									echo '<div class="header-button">';
										if( $settings['show_search_btn'] == 'yes' ){
											echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
										}
										if( $settings['show_off_canvus'] == 'yes' ){
											echo '<a href="#" class="icon-btn sideMenuToggler"><i class="fa-regular fa-bars"></i></a>';
										}
										if(!empty($settings['button_text'])){
											echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="ot-btn ml-25">'.esc_html($settings['button_text']).'</a>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';		
		} elseif ( $settings['layout_style'] == '4' ) {
			echo '<div class="ot-header header-layout5">';
				if ($settings['show_topbar'] == 'yes') {
					echo '<div class="header-top">';
						echo '<div class="container">';
							echo '<div class="row justify-content-center justify-content-lg-between align-items-center">';
								echo '<div class="col-auto d-none d-lg-block">';
									echo ' <div class="header-links">';
										echo '<ul>';
											if (!empty($phone )) {
												echo '<li><i class="fal fa-phone"></i><a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html($phone).'</a></li>';
											}
											if (!empty($email )) {
												echo '<li class="d-none d-xl-inline-block"><i class="fal fa-envelope"></i><a href="'.esc_attr( 'mailto:'.$email ).'">'.esc_html($email).'</a></li>';
											}
											if (!empty($settings['topbar_location'] )) {
												echo '<li><i class="fal fa-location-dot"></i>'.esc_html( $settings['topbar_location'] ).'</li>';
											}
										echo '</ul>';
									echo '</div>';
								echo '</div>';
								echo '<div class="col-auto">';
									if ( ! empty( $settings['social_icon_list'] ) ) {
										echo '<div class="header-social">';
											if (!empty($settings['topbar_social_title'] )) {
												echo '<span class="social-title">'.esc_html( $settings['topbar_social_title'] ).'</span>';
											}
											foreach( $settings['social_icon_list'] as $social_icon ){
												$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
												$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

												echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

												\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

												echo '</a> ';
											}   
										echo '</div>';
									}
			                    echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
				echo '<div class="sticky-wrapper">';
					echo '<!-- Main Menu Area -->';
					echo '<div class="menu-area">';
						echo '<div class="container">';
							echo '<div class="row align-items-center justify-content-between">';
								if( ! empty( $settings['logo_image']['url'] ) ){
									echo '<div class="col-auto">';
										echo '<div class="header-logo">';
											echo '<a href="'.esc_url( home_url( '/' ) ).'">';
												echo travon_img_tag( array(
													'url' => esc_url( $settings['logo_image']['url'] ),
												) );
											echo '</a>';
										echo '</div>';
									echo '</div>';
								}
								echo '<div class="col-auto">';
									echo '<nav class="main-menu d-none d-lg-inline-block">';
										if( ! empty( $settings['travon_menu_select'] ) ){
											wp_nav_menu( $args );
										}
									echo '</nav>';
									echo '<button type="button" class="ot-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
								echo '</div>';
								echo '<div class="col-auto d-none d-xl-block">';
									echo '<div class="header-button">';
										if( $settings['show_search_btn'] == 'yes' ){
											echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
										}
										if( $settings['show_off_canvus'] == 'yes' ){
											echo '<a href="#" class="icon-btn sideMenuToggler"><i class="fa-regular fa-bars"></i></a>';
										}
										if(!empty($settings['button_text'])){
											echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="ot-btn ml-25">'.esc_html($settings['button_text']).'</a>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';		
		} elseif ( $settings['layout_style'] == '5' ) {
			echo '<div class="ot-header header-layout6">';
				if ($settings['show_topbar'] == 'yes') {
					echo '<div class="header-top">';
						echo '<div class="container">';
							echo '<div class="row justify-content-center justify-content-lg-between align-items-center">';
								echo '<div class="col-auto d-none d-lg-block">';
									echo ' <div class="header-links">';
										echo '<ul>';
											if (!empty($phone )) {
												echo '<li><i class="fal fa-phone"></i><a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html($phone).'</a></li>';
											}
											if (!empty($email )) {
												echo '<li class="d-none d-xl-inline-block"><i class="fal fa-envelope"></i><a href="'.esc_attr( 'mailto:'.$email ).'">'.esc_html($email).'</a></li>';
											}
											if (!empty($settings['topbar_location'] )) {
												echo '<li class="d-none d-xxl-inline-block"><i class="fal fa-location-dot"></i>'.esc_html( $settings['topbar_location'] ).'</li>';
											}
										echo '</ul>';
									echo '</div>';
								echo '</div>';
								echo '<div class="col-auto">';
									if ( ! empty( $settings['social_icon_list'] ) ) {
										echo '<div class="header-social">';
											if (!empty($settings['topbar_social_title'] )) {
												echo '<span class="social-title">'.esc_html( $settings['topbar_social_title'] ).'</span>';
											}
											foreach( $settings['social_icon_list'] as $social_icon ){
												$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
												$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

												echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

												\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

												echo '</a> ';
											}   
										echo '</div>';
									}
			                    echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
				echo '<div class="sticky-wrapper">';
					echo '<!-- Main Menu Area -->';
					echo '<div class="menu-area">';
						echo '<div class="container">';
							echo '<div class="row align-items-center justify-content-between">';
								if( ! empty( $settings['logo_image']['url'] ) ){
									echo '<div class="col-auto">';
										echo '<div class="header-logo">';
											echo '<a href="'.esc_url( home_url( '/' ) ).'">';
												echo travon_img_tag( array(
													'url' => esc_url( $settings['logo_image']['url'] ),
												) );
											echo '</a>';
										echo '</div>';
									echo '</div>';
								}
								echo '<div class="col-auto">';
									echo '<nav class="main-menu d-none d-lg-inline-block">';
										if( ! empty( $settings['travon_menu_select'] ) ){
											wp_nav_menu( $args );
										}
									echo '</nav>';
									echo '<button type="button" class="ot-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
								echo '</div>';
								echo '<div class="col-auto ms-auto d-none d-xl-block">';
									echo '<div class="header-button">';
										if( $settings['show_search_btn'] == 'yes' ){
											echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
										}
										if( $settings['show_off_canvus'] == 'yes' ){
											echo '<a href="#" class="icon-btn sideMenuToggler"><i class="fa-regular fa-bars"></i></a>';
										}
										if(!empty($settings['button_text'])){
											echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="ot-btn ml-25">'.esc_html($settings['button_text']).'</a>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				if ( ! empty( $settings['logo_bg']['url'] ) ) {
					echo '<div class="logo-bg" data-bg-src="'.esc_url( $settings['logo_bg']['url'] ).'"></div>';
				}
			echo '</div>';		
		}
	}
}