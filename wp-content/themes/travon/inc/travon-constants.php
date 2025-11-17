<?php
/**
 * @Packge     : Travon
 * @Version    : 1.0
 * @Author     : Adivaha
 * @Author URI : https://www.adivaha.com/
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'TRAVON_DIR_URI' ) ) {
    define('TRAVON_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'TRAVON_DIR_ASSIST_URI' ) ) {
    define( 'TRAVON_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'TRAVON_DIR_CSS_URI' ) ) {
    define( 'TRAVON_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Js File URI
if (!defined('TRAVON_DIR_JS_URI')) {
    define('TRAVON_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// Base Directory
if (!defined('TRAVON_DIR_PATH')) {
    define('TRAVON_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('TRAVON_DIR_PATH_INC')) {
    define('TRAVON_DIR_PATH_INC', TRAVON_DIR_PATH . 'inc/');
}

//TRAVON framework Folder Directory
if (!defined('TRAVON_DIR_PATH_FRAM')) {
    define('TRAVON_DIR_PATH_FRAM', TRAVON_DIR_PATH_INC . 'travon-framework/');
}

//Hooks Folder Directory
if (!defined('TRAVON_DIR_PATH_HOOKS')) {
    define('TRAVON_DIR_PATH_HOOKS', TRAVON_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'TRAVON_DEMO_DIR_PATH' ) ){
    define( 'TRAVON_DEMO_DIR_PATH', TRAVON_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'TRAVON_DEMO_DIR_URI' ) ){
    define( 'TRAVON_DEMO_DIR_URI', TRAVON_DIR_URI.'inc/demo-data/' );
}