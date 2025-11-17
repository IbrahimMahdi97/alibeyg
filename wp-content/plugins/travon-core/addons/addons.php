<?php
if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.
}

/**
 * Main Travon Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

final class Travon_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}


		// Add Plugin actions

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );


        // Register widget scripts

		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);


		// Specific Register widget scripts

		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'travon_regsiter_widget_scripts' ] );
		// add_action( 'elementor/frontend/before_register_scripts', [ $this, 'travon_regsiter_widget_scripts' ] );


        // category register

		add_action( 'elementor/elements/categories_registered',[ $this, 'travon_elementor_widget_categories' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'travon' ),
			'<strong>' . esc_html__( 'Travon Core', 'travon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'travon' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */

			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'travon' ),
			'<strong>' . esc_html__( 'Travon Core', 'travon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'travon' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(

			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'travon' ),
			'<strong>' . esc_html__( 'Travon Core', 'travon' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'travon' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */

	public function init_widgets() {

		// Include Widget files

		require_once( TRAVON_ADDONS . '/widgets/animated-shape.php' );
		require_once( TRAVON_ADDONS . '/widgets/button.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-blog.php' );
		require_once( TRAVON_ADDONS . '/widgets/section-title.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-banner.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-group-image.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-features.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-customer-image.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-counter-up.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-trips-post.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-arrow.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-destination.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-offer-area.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-offer-cart.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-duel-button.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-custom-image.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-testimonials.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-process.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-map.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-subscribe-form.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-custom-link.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-progressbar.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-team.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-contact-info.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-team-details.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-custom-destination.php' );

		require_once( TRAVON_ADDONS . '/widgets/travon-hotel.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-service.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-destination-v2.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-price.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-cta.php' );
		require_once( TRAVON_ADDONS . '/widgets/button-video.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-category.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-list.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-activity.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-tour-affiliate.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-gallery.php' );

		require_once( TRAVON_ADDONS . '/widgets/travon-flight.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-deal.php' );
		require_once( TRAVON_ADDONS . '/widgets/travon-transport.php' );
		

		// Register widget

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \travon_Animated_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Group_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Feature() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Client() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Counterup() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Trip_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Slider_Arrow() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Destination() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Countdown() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Cart() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Group_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Testimonial_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Process() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Trip_Map() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Subscribe_Form() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Footer_Menu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Skill_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Contact_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Team_member_info_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Custom_Destination() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Hotel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_DestinationV2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Pricing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Cta() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_VideoButton() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Category() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_List() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Activity() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Tour_Affiliate() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Gallery() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Flight() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Deal() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Transport() );
		
		

		// Header Elements

		require_once( TRAVON_ADDONS . '/header/header.php' );
		

		// Header Widget Register

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Travon_Header() );

	}

    public function widget_scripts() {

        wp_enqueue_script(
            'travon-frontend-script',
            TRAVON_PLUGDIRURI . 'assets/js/travon-frontend.js',
            array('jquery'),
            false,
            true
		);
	}

	// public function travon_regsiter_widget_scripts( ) {

	// 	wp_register_script(
 //            'travon-tilt',
 //            TRAVON_PLUGDIRURI . 'assets/js/tilt.jquery.min.js',
 //            array('jquery'),
 //            false,
 //            true
	// 	);
	// }


    function travon_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'travon',
            [
                'title' => __( 'Travon', 'travon' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

        $elements_manager->add_category(
            'travon_footer_elements',
            [
                'title' => __( 'Travon Footer Elements', 'travon' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'travon_header_elements',
            [
                'title' => __( 'Travon Header Elements', 'travon' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
	}
}

Travon_Extension::instance();