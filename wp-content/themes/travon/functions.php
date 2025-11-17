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
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/travon-constants.php';

//theme setup
require_once TRAVON_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once TRAVON_DIR_PATH_INC . 'essential-scripts.php';

// Woo Hooks
require_once TRAVON_DIR_PATH_INC . 'woo-hooks/travon-woo-hooks.php';

// Woo Hooks Functions
require_once TRAVON_DIR_PATH_INC . 'woo-hooks/travon-woo-hooks-functions.php';

// plugin activation
require_once TRAVON_DIR_PATH_FRAM . 'plugins-activation/travon-active-plugins.php';

// theme dynamic css
require_once TRAVON_DIR_PATH_INC . 'travon-commoncss.php';

// meta options
require_once TRAVON_DIR_PATH_FRAM . 'travon-meta/travon-config.php';

// page breadcrumbs
require_once TRAVON_DIR_PATH_INC . 'travon-breadcrumbs.php';

// sidebar register
require_once TRAVON_DIR_PATH_INC . 'travon-widgets-reg.php';

//essential functions
require_once TRAVON_DIR_PATH_INC . 'travon-functions.php';

// helper function
require_once TRAVON_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once TRAVON_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once TRAVON_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// travon options
require_once TRAVON_DIR_PATH_FRAM . 'travon-options/travon-options.php';

// hooks
require_once TRAVON_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once TRAVON_DIR_PATH_HOOKS . 'hooks-functions.php';