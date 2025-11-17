<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : travon
 * @version   : 1.0
 * @Author    : Adivaha
 * @Author URI: https://www.adivaha.com/
 */

// demo import file
function travon_import_files() {

	$demoImg = '<img src="'. TRAVON_DEMO_DIR_URI  .'screen-image.png" alt="'.esc_attr__('Demo Preview Imgae','travon').'" />';

    return array(
        array(
            'import_file_name'             => esc_html__('Travon Demo','travon'),
            'local_import_file'            =>  TRAVON_DEMO_DIR_PATH  . 'travon-demo.xml',
            'local_import_widget_file'     =>  TRAVON_DEMO_DIR_PATH  . 'travon-widgets-demo.json',
            'local_import_redux'           => array(
                array(
                    'file_path'   =>  TRAVON_DEMO_DIR_PATH . 'redux_options_demo.json',
                    'option_name' => 'travon_opt',
                ),
            ),
            // 'import_notice' => $demoImg,
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'travon_import_files' );

// demo import setup
function travon_after_import_setup() {
	// Assign menus to their locations.

	$primary_menu  		= get_term_by( 'name', 'Primary Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu'   	=> $primary_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id 	= get_page_by_title( 'Home Tour Booking' );
	$blog_page_id  	= get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

    
}
add_action( 'pt-ocdi/after_import', 'travon_after_import_setup' );


//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function travon_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Travon Demo Import' , 'travon' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'travon' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'travon-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'travon_import_plugin_page_setup' );

// Enqueue scripts
function travon_demo_import_custom_scripts(){
	if( isset( $_GET['page'] ) && $_GET['page'] == 'travon-demo-import' ){
		// style
		wp_enqueue_style( 'travon-demo-import', TRAVON_DEMO_DIR_URI.'css/travon.demo.import.css', array(), '1.0', false );
	}
}
add_action( 'admin_enqueue_scripts', 'travon_demo_import_custom_scripts' );