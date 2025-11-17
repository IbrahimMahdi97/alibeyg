<?php
/**
 * Citynet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Citynet
 */

require_once "inc/simple_html_dom.php";
include "inc/admin-tinymce-buttons.php";
require get_template_directory() . "/jdf.php";

if (!function_exists('citynet_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function citynet_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Citynet, use a find and replace
         * to change 'citynet' to the name of your theme in all the template files.
         */
        load_theme_textdomain('citynet', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'citynet'),
            'footer' => esc_html__('Footer Menu', 'citynet'),
            'language' => esc_html__('Language Menu', 'citynet'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
	// Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets');
    add_image_size('image-gallery-slider', 605, 330, true);
    }
endif;
add_action('after_setup_theme', 'citynet_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function citynet_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'citynet'),
        'id' => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'citynet' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'citynet_widgets_init');

/**
 * Enqueue scripts and styles in admin panel
 */
function load_custom_wp_admin_style() {
	$theme_path_real = get_template_directory();
    wp_enqueue_style('citynet-admin', get_template_directory_uri() . '/css/admin.css', [], filemtime("$theme_path_real/css/admin.css"));
	wp_enqueue_script( 'custom-option-tree', get_template_directory_uri() . '/js/custom_option_tree.js', ['jquery'], null, true );

    $screen = get_current_screen();
    $is_needed_authenticate = (in_array($screen->post_type, ['tour', 'irantour', 'media', 'post', 'country', 'city', 'location', 'page']) && ($screen->base == 'post'));
    if ($is_needed_authenticate) {
        wp_enqueue_script( 'citynet-admin-awesomplete', get_template_directory_uri() . '/js/libs/awesomplete.js', [], null, true );
        wp_register_script('axios', get_template_directory_uri() . '/js/libs/axios.min.js', [], null, true);
        wp_enqueue_script( 'citynet-admin', get_template_directory_uri() . '/js/admin-panel.js', ['citynet-admin-awesomplete','axios','underscore','jquery'], null, true );
        global $post;
        wp_localize_script('citynet-admin', 'wordpressData', [
            'activeServiceName' => get_field('services-choices', $post->ID)['value']
        ]);
        wp_enqueue_style('citynet-admin-css', get_template_directory_uri() . '/css/admin.css');
        //wp_enqueue_style('citynet-admin-css-awesomplete', get_template_directory_uri() . '/css/awesomplete.css');
    }

	if (is_admin() && in_array($screen->post_type, ['tour', 'irantour', 'hotelpackage']) && $screen->base == 'post') {
		wp_enqueue_style('amib', get_template_directory_uri() . '/css/adatepicker-main.css');
		wp_register_script( 'amib', get_template_directory_uri() . '/js/libs/amibdatepicker.js', ['jquery'], null, true );
		wp_enqueue_script( 'citynet-admin-general', get_template_directory_uri() . '/js/admin.js', ['amib'], filemtime("$theme_path_real/js/admin.js"), true );
		wp_localize_script('citynet-admin-general', 'wpAdminGeneralData', ['ajaxurl' => admin_url('admin-ajax.php')]);
	}
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');


function headerLoad(){

    if( strpos($_SERVER["REQUEST_URI"], "/mobile") !== false ){
        $token = $_REQUEST["token"];
        global $wp_query;
//        var_dump($_REQUEST);
//        die;

        if( $token == null ){
            $wp_query->set_404();
            status_header( 404 );
            get_template_part( 404 ); exit();
        } else {

            $post_to_http = post2http($_REQUEST);
            if ( isset($post_to_http) ){
                $post_to_http = json_decode($post_to_http);
                if( $post_to_http->success != "true" ){
                    $wp_query->set_404();
                    status_header( 404 );
                    get_template_part( 404 ); exit();
                }
            }
        }
    }
}

add_action("init", 'headerLoad');

/**
 * Enqueue scripts and styles.
 */
function citynet_scripts()
{
	$theme_path_real = get_template_directory();

    if ( citynet_option('captcha') == "on" ) {
        wp_enqueue_script('captcha', 'https://www.google.com/recaptcha/api.js?hl=fa', [], null, true);
    }

    // Register your stylesheets here
	//$file_address = citynet_cdn_or_local_resource('cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css', 'css/bootstrap.min.css');
    $file_address = get_template_directory_uri() . '/css/bootstrap.min.css';
    wp_register_style('bootstrap', $file_address, [], null);
    wp_register_style('bootstrap-rtl', get_template_directory_uri() . '/css/bootstrap-rtl.min.css', [], null);

    wp_enqueue_style( 'owl-style', get_template_directory_uri() .'/css/owl.carousel.min.css');
    wp_enqueue_style( 'owl-default-style', get_template_directory_uri() .'/css/owl.theme.default.min.css');
  

	//$file_address = citynet_cdn_or_local_resource('cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', 'css/font-awesome.min.css');
    $file_address = get_template_directory_uri() . '/css/font-awesome.min.css';
    wp_register_style('font-awesome', $file_address, [], null);

    $deps = ['font-awesome', 'bootstrap', 'bootstrap','owl-style','owl-default-style'];
    if (is_fa()) {
        $deps[] = 'bootstrap-rtl';
    }
    wp_enqueue_style('citynet-style', get_stylesheet_uri(), $deps, filemtime("$theme_path_real/style.css"));

    // Register your JS files here
    wp_register_script('popper', get_template_directory_uri() .'/js/popper.min.js', ['jquery'], null, true);
	//$file_address = citynet_cdn_or_local_resource('cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js', 'js/libs/bootstrap.min.js');
    $file_address = get_template_directory_uri() . '/js/bootstrap.min.js';
    wp_register_script('bootstrap', $file_address, ['jquery'], null, true);

    wp_enqueue_script( 'general-custom', get_template_directory_uri() . '/js/general-custom.js', ['popper', 'bootstrap', 'hoverIntent'], filemtime("$theme_path_real/js/general-custom.js"), true );

    wp_enqueue_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js', ['jquery'], null, true);

    wp_localize_script('general-custom', 'generaldata', array(
        'is_rtl_language' => is_rtl()
    ));
    if (is_front_page()) {
        wp_enqueue_script( 'home-custom', get_template_directory_uri() . '/js/home-custom.js', ['jquery'], filemtime("$theme_path_real/js/home-custom.js"), true );
        }

    if (is_page_template('search-tours.php')) {
        wp_enqueue_script('tour-search', get_template_directory_uri() . '/js/tour-search.js', ['jquery', 'underscore'], null, true);
        wp_localize_script('tour-search', 'ajaxURL', admin_url('admin-ajax.php'));
        wp_localize_script('tour-search', 'cnNonce', wp_create_nonce('cnNonce'));
    }

    if (get_post_type() != 'post') {
        wp_enqueue_script('isotope-settings', get_template_directory_uri() . '/js/isotope-settings.js', ['isotope'], null, true);
        $dir = get_locale();
        wp_localize_script('isotope-settings', 'dir', $dir);
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

	/*if(is_singular('tour')){
		wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBkOSLQime293r98OZF4YTBuESIVEwWbj8', array( 'jquery' ), null, true );
		wp_enqueue_script('google-roadmap', get_template_directory_uri() . '/js/roadmap.js',array(), null, true);
	}*/

	if (is_singular()) {
        $gallery_type = get_field('gallery-type', 'option');
        if ($gallery_type == 'simple') {
            wp_enqueue_script('lightslider', get_template_directory_uri() . '/js/lightslider.min.js', ['jquery'], null, true);
            wp_enqueue_style('lightslider', get_template_directory_uri() . '/css/lightslider.min.css');
        } else {
            // wp_enqueue_style('lightgallery', get_template_directory_uri() . '/css/lightgallery.min.css');
            // wp_enqueue_script('lightgallery-js', get_template_directory_uri() . '/js/lightgallery-all.min.js', ['jquery'], null, true);
        }
        wp_localize_script('general-custom', 'galleryInfo', ['type' => $gallery_type]);

	}
	if (is_singular('tour')) {
		wp_enqueue_script('lightbox-gallery', get_template_directory_uri() . '/js/lightbox-gallery.js', ['jquery'], null, true);
		wp_enqueue_style('lightbox-gallery', get_template_directory_uri() . '/css/lightbox-gallery/lightbox-gallery.css');
	}
    if (!is_front_page()) {
        wp_localize_script('general-custom', 'wpData', ['ajaxurl' => admin_url('admin-ajax.php')]);
    }
    if ( is_rtl() ) {
        wp_enqueue_style( 'rtl', get_template_directory_uri() . '/rtl.css', [], filemtime( "$theme_path_real/rtl.css" ) );
    }
}
add_action('wp_enqueue_scripts', 'citynet_scripts');

//Wordpress not allow to enqueue rtl.css automatically - because it included just for screen media
add_action( 'init', function() {
    remove_action( 'wp_head', 'locale_stylesheet' );
} );


/**
 * Require other php files in 'inc' folder.
 */
$require_inc_files = ['custom-header.php', 'template-tags.php', 'extras.php', 'customizer.php', 'jetpack.php', 'jdatetime.class.php'];
foreach ($require_inc_files as $php_file) {
	require get_template_directory() . '/inc/' . $php_file;
}

/**
 * Load custom functions.
 */
function load_custom_functions()
{
    require get_template_directory() . '/inc/custom-functions.php';
}

add_action('after_setup_theme', 'load_custom_functions', 2);
/*
**************   ACF GOOGLE MAP   **************
 */
function my_acf_init() {
    $google_map_api_key = citynet_option( 'google_map_api_key' );
    acf_update_setting('google_api_key', $google_map_api_key);
}

add_action('acf/init', 'my_acf_init');
/*
**************   HIDE SEARCH ENGINE PAGES FROM ADMIN   **************
*/
// function citynet_hide_pages_from_admin($query) {
//     if (!is_admin())
//         return $query;

//     $page_template_ids = array();
//     $page_template_names = array('bus.php','change-pass.php','create-pid.php','currency.php','discounts.php','edit-profile.php','file-downloads.php','flight-domestic.php','flight-outbound.php','insurance.php','manage-discounts.php','pay.php','reports.php','subsystems.php','train.php','transfer.php');
//     foreach($page_template_names as $page_template_name){
//         $template_page_property_comparison_array = get_pages( array (
//                 'meta_key' => '_wp_page_template',
//                 'meta_value' => 'app-templates/'.$page_template_name
//             )
//         );
//         if ( $template_page_property_comparison_array ) {
//             array_push($page_template_ids,$template_page_property_comparison_array[0]->ID);
//         }
//     }

//     global $pagenow, $post_type;
//     if ( !current_user_can( 'administrator' ) && $pagenow == 'edit.php' && $post_type == 'page' ){
//         $query->query_vars['post__not_in'] = $page_template_ids;
//     }
// }
// add_filter( 'parse_query', 'citynet_hide_pages_from_admin' );

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'تنظیمات سایت',
        'menu_title' => 'تنظیمات سایت',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_pages',
        'redirect'   => false,
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'تنظیمات PWA',
        'menu_title'  => 'تنظیمات PWA',
        'menu_slug'   => 'pwa-footer-settings',
        'parent_slug' => 'theme-settings',
        'autoload'    => true
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'تنظیمات واتس‌اپ',
        'menu_title'  => 'تنظیمات واتس‌اپ',
        'menu_slug'   => 'whatsapp-footer-settings',
        'parent_slug' => 'theme-settings',
        'autoload'    => true
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'تنظیمات هدر و فوتر',
        'menu_title'  => 'هدر و فوتر',
        'menu_slug'   => 'header-footer-settings',
        'parent_slug' => 'theme-settings',
        'autoload'    => true
    ));
    // acf_add_options_sub_page(array(
    //     'page_title'  => 'تنظیمات تماس با ما',
    //     'menu_title'  => 'تنظیمات تماس با ما',
    //     'menu_slug'   => 'header-contactus-settings',
    //     'parent_slug' => 'theme-settings',
    //     'autoload'    => true
    // ));
}
add_filter('acf/load_field/key=field_624d245add52c', function ($field){
    $field['instructions'] = '<a href="/wp-content/plugins/citynet/assets/other/fonticons/demo.html"> راهنمای انتخاب آیکون</a>';
    return $field;
});

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
}, 10, 4 );
  
add_filter( 'upload_mimes', function ( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
} );
  
add_action( 'admin_head', function () {
echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
        </style>';
} );