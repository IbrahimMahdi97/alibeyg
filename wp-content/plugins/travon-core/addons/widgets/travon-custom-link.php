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
 * Footer Menu Widget .
 *
 */
class Travon_Footer_Menu extends Widget_Base {

	public function get_name() {
		return 'travonfootermenu';
	}

	public function get_title() {
		return __( 'Travon Footer Menu', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon_footer_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'footer_menu_section',
			[
				'label' 	=> __( 'Footer Menu', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
       
		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
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



        echo '<div class="footer-widget widget_nav_menu">';
        	if(!empty($settings['title'])){
	            echo '<h3 class="widget_title">'.esc_html($settings['title']).'</h3>';
	        }
            echo '<div class="menu-all-pages-container">';
                if( ! empty( $settings['travon_menu_select'] ) ){
					wp_nav_menu( $args );
				} 
            echo '</div>';
        echo '</div>';
	}
}