<?php
/**
 *
 * @Packge      travon
 * @Author      Angfuzsoft
 * @Author URI: https://themeforest.net/user/adivaha-themes
 * @version     1.0
 *
 */

/**
 * Enqueue style of child theme
 */
function travon_child_enqueue_styles() {

    wp_enqueue_style( 'travon-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'travon-child-style', get_stylesheet_directory_uri() . '/style.css',array( 'travon-style' ),wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'travon_child_enqueue_styles', 100000 );