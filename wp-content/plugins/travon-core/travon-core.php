<?php
/**

 * Plugin Name: Travon Core
 * Description: This is a helper plugin of travon theme
 * Version:     1.0
 * Author:      Adivaha
 * Author URI:  http://adivaha.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: travon
 */



 // Blocking direct access

if( ! defined( 'ABSPATH' ) ) {

    exit();

}



// Define Constant

define( 'TRAVON_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'TRAVON_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'TRAVON_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );

define( 'TRAVON_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );

define( 'TRAVON_PLUGDIRURI', plugin_dir_url( __FILE__ ) );

define( 'TRAVON_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );

define( 'TRAVON_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'travon-template/' );

define( 'TRAVON_CORE_PLUGIN_OPTIONS_FUNCTION', plugin_dir_path( __FILE__ ) .'travon-options-function/' );



// load textdomain

load_plugin_textdomain( 'travon', false, basename( dirname( __FILE__ ) ) . '/languages' );



//include file.

require_once TRAVON_PLUGIN_INC_PATH .'travoncore-functions.php';
require_once TRAVON_PLUGIN_INC_PATH .'builder/builder.php';
require_once TRAVON_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once TRAVON_PLUGIN_INC_PATH .'travonajax.php';

require_once TRAVON_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';

require_once TRAVON_CORE_PLUGIN_OPTIONS_FUNCTION . 'travon-options-function.php';



//Widget

require_once TRAVON_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once TRAVON_PLUGIN_WIDGET_PATH . 'about-us-widget.php';
require_once TRAVON_PLUGIN_WIDGET_PATH . 'travon-cta.php';
require_once TRAVON_PLUGIN_WIDGET_PATH . 'travon-gallery-widget.php';



//addons

require_once TRAVON_ADDONS . 'addons.php';