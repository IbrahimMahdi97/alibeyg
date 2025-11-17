<?php
/**
 * @Packge     : Travon
 * @Version    : 1.0
 * @Author     : Adivaha
 * @Author URI : https://www.adivaha.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue scripts and styles.
 */
function travon_essential_scripts() {

    wp_enqueue_style( 'travon-style', get_stylesheet_uri() ,array(), wp_get_theme()->get( 'Version' ) );

    // google font
    wp_enqueue_style( 'travon-fonts', travon_google_fonts() ,array(), null );

    // Bootstrap Min
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) ,array(), '5.0.0' );

    // Font Awesome Five
    wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/fontawesome.min.css' ) ,array(), '6.0.0' );

    // Magnific Popup
    wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.min.css' ), array(), '1.0' );

    // Slick css
    wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/css/slick.min.css' ) ,array(), '4.0.13' );

    // travon main style
    wp_enqueue_style( 'travon-main-style', get_theme_file_uri('/assets/css/style.css') ,array(), wp_get_theme()->get( 'Version' ) );


    // Load Js


    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '4.3.1', true );
    wp_enqueue_script( 'isotope-pkgd', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'counterup', get_theme_file_uri( '/assets/js/jquery.counterup.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'nice-select', get_theme_file_uri( '/assets/js/nice-select.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'tilt-jquery', get_theme_file_uri( '/assets/js/tilt.jquery.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'slick', get_theme_file_uri( '/assets/js/slick.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'imagesloaded' );

    // main script
    wp_enqueue_script( 'travon-main-script', get_theme_file_uri( '/assets/js/main.js' ), array('jquery'), wp_get_theme()->get( 'Version' ), true );

    // comment reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'travon_essential_scripts',99 );


function travon_block_editor_assets( ) {
    // Add custom fonts.
    wp_enqueue_style( 'travon-editor-fonts', travon_google_fonts(), array(), null );
}

add_action( 'enqueue_block_editor_assets', 'travon_block_editor_assets' );

/*
Register Fonts
*/
function travon_google_fonts() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
     
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'travon' ) ) {
        $font_url =  'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700&display=swap';
    }
    return $font_url;
}