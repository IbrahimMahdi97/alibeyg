<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "travon_opt";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }


    $alowhtml = array(
        'p' => array(
            'class' => array()
        ),
        'span' => array()
    );


    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        // 'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Travon Options', 'travon' ),
        'page_title'           => esc_html__( 'Travon Options', 'travon' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'travon' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'travon' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'travon' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'travon' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'travon' );
    Redux::set_help_sidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */


    // -> START General Fields

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'travon' ),
        'id'               => 'travon_general',
        'customizer_width' => '450px',
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'       => 'travon_theme_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Theme Color', 'travon' )
            ),
            array(
                'id'       => 'travon_map_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Map Api Key', 'travon' ),
                'subtitle' => esc_html__( 'Set Map Api Key', 'travon' ),
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Back To Top', 'travon' ),
        'id'               => 'travon_backtotop',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'travon_display_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Back To Top Button', 'travon' ),
                'subtitle' => esc_html__( 'Switch On to Display back to top button.', 'travon' ),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'travon' ),
                'off'      => esc_html__( 'Disabled', 'travon' ),
            ),
            array(
                'id'       => 'travon_custom_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Custom Back To Top Button', 'travon' ),
                'subtitle' => esc_html__( 'If you select "Disabled", it will show default design for "back to top" button.', 'travon' ),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'travon' ),
                'off'      => esc_html__( 'Disabled', 'travon' ),
                'required' => array('travon_display_bcktotop','equals','1'),
            ),
            array(
                'id'       => 'travon_custom_bcktotop_icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Back To Top Button Icon', 'travon'),
                'subtitle' => esc_html__( 'Write Icon Class Here', 'travon'),
                'required' => array( 'travon_custom_bcktotop', 'equals', '1' ),
            ),
            array(
                'id'       => 'travon_bcktotop_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Back To Top Button Background Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Back to top button Background Color.', 'travon' ),
                'required' => array('travon_display_bcktotop','equals','1'),
                'output'   => array( 'background-color' =>'.scroll-btn i' ),
            ),
            array(
                'id'       => 'travon_bcktotop_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Back To Top Icon Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Back to top Icon Color.', 'travon' ),
                'required' => array('travon_display_bcktotop','equals','1'),
                'output'   => array( '.scrollToTop i' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Preloader', 'travon' ),
        'id'               => 'travon_preloader',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'travon_display_preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'travon' ),
                'subtitle' => esc_html__( 'Switch Enabled to Display Preloader.', 'travon' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','travon'),
                'off'      => esc_html__('Disabled','travon'),
            ),

            array(
                'id'       => 'travon_preloader_img',
                'type'     => 'media',
                'title'    => esc_html__( 'Preloader Image', 'travon' ),
                'subtitle' => esc_html__( 'Set Preloader Image.', 'travon' ),
                'required' => array( "travon_display_preloader","equals",true )
            ),
        )
    ));

    /* End General Fields */

    /* Admin Lebel Fields */
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Admin Label', 'travon' ),
        'id'                => 'travon_admin_label',
        'customizer_width'  => '450px',
        'subsection'        => true,
        'fields'            => array(
            array(
                'title'     => esc_html__( 'Admin Login Logo', 'travon' ),
                'subtitle'  => esc_html__( 'It belongs to the back-end of your website to log-in to admin panel.', 'travon' ),
                'id'        => 'travon_admin_login_logo',
                'type'      => 'media',
            ),
            array(
                'title'     => esc_html__( 'Custom CSS For admin', 'travon' ),
                'subtitle'  => esc_html__( 'Any CSS your write here will run in admin.', 'travon' ),
                'id'        => 'travon_theme_admin_custom_css',
                'type'      => 'ace_editor',
                'mode'      => 'css',
                'theme'     => 'chrome',
                'full_width'=> true,
            ),
        ),
    ) );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'travon' ),
        'id'               => 'travon_header',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card',
        'fields'           => array(
            array(
                'id'       => 'travon_header_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"   => esc_html__('Prebuilt','travon'),
                    "2"      => esc_html__('Header Builder','travon'),
                ),
                'title'    => esc_html__( 'Header Options', 'travon' ),
                'subtitle' => esc_html__( 'Select header options.', 'travon' ),
            ),
            array(
                'id'       => 'travon_header_select_options',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'travon_header'
                ),
                'title'    => esc_html__( 'Header', 'travon' ),
                'subtitle' => esc_html__( 'Select header.', 'travon' ),
                'required' => array( 'travon_header_options', 'equals', '2' )
            ),
            array(
                'id'       => 'travon_header_topbar_switcher',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => esc_html__( 'Show', 'travon' ),
                'off'      => esc_html__( 'Hide', 'travon' ),
                'title'    => esc_html__( 'Header Topbar?', 'travon' ),
                'subtitle' => esc_html__( 'Control Header Topbar By Show Or Hide System.', 'travon'),
                'required' => array( 'travon_header_options', 'equals', '1' )
            ), 

            array(
                'id'       => 'travon_header_topbar_social_icon_switcher',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => esc_html__( 'Show', 'travon' ),
                'off'      => esc_html__( 'Hide', 'travon' ),
                'title'    => esc_html__( 'Header Social Icon?', 'travon' ),
                'subtitle' => esc_html__( 'Click Show To Display Social Icon?', 'travon'),
                'required' => array( 'travon_header_topbar_switcher', 'equals', '1' )
            ),
            
             array(
                'id'       => 'travon_menu_topbar_email',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Email Address :', 'travon' ),
                'default'  => esc_html__( 'info@travon.com', 'travon' ),
                'required' => array( 'travon_header_topbar_switcher', 'equals', '1' )
            ), 
            array(
                'id'       => 'travon_menu_topbar_phone',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Phone Number :', 'travon' ),
                'default'  => esc_html__( '+1 (044) 123 456 789', 'travon' ),
                'required' => array( 'travon_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'travon_menu_topbar_location',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Location :', 'travon' ),
                'default'  => esc_html__( '835 Middle Country Rd, NY 11784, USA', 'travon' ),
                'required' => array( 'travon_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'travon_menu_topbar_btn_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'Login / Register', 'travon' ),
                'title'    => esc_html__( 'Button Text', 'travon' ),
                'subtitle' => esc_html__( 'Set Button Text', 'travon' ),
                'required' => array( 'travon_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'travon_menu_topbar_btn_url',
                'type'     => 'text',
                'default'  => esc_html__( '#', 'travon' ),
                'title'    => esc_html__( 'Button URL?', 'travon' ),
                'subtitle' => esc_html__( 'Set Button URL Here', 'travon' ),
                'required' => array( 'travon_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'travon_header_topbar_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Topbar Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Topbar Color', 'travon' ),
                'output'   => array( '--title-color' => '.navbar-top.style-2' ),
                'required' => array( 'travon_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'travon_header_social_icon_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Social Icon Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Header Social Icon Color', 'travon' ),
                'output'   => array( 'color'    =>  '.header-social a' ),
                'required' => array( 'travon_header_topbar_social_icon_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'travon_header_btn_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'Book Your Stay', 'travon' ),
                'title'    => esc_html__( 'Button Text', 'travon' ),
                'subtitle' => esc_html__( 'Set Button Text', 'travon' ),
            ),
            array(
                'id'       => 'travon_btn_url',
                'type'     => 'text',
                'default'  => esc_html__( '#', 'travon' ),
                'title'    => esc_html__( 'Button URL?', 'travon' ),
                'subtitle' => esc_html__( 'Set Button URL Here', 'travon' ),
            ),
            array(
                'id'       => 'travon_header_search_switcher',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => esc_html__( 'Show', 'travon' ),
                'off'      => esc_html__( 'Hide', 'travon' ),
                'title'    => esc_html__( 'Header Search Switcher?', 'travon' ),
                'subtitle' => esc_html__( 'Click Show To Display Header Search?', 'travon'),
            ),
            array(
                'id'       => 'travon_header_offcanvas_switcher',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => esc_html__( 'Show', 'travon' ),
                'off'      => esc_html__( 'Hide', 'travon' ),
                'title'    => esc_html__( 'Header Offcanvas Switcher?', 'travon' ),
                'subtitle' => esc_html__( 'Click Show To Display Header Offcanvas?', 'travon'),
            ),
        ),
    ) );
    // -> START Header Logo
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Logo', 'travon' ),
        'id'               => 'travon_header_logo_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'travon_site_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'travon' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your site logo for header ( recommendation png format ).', 'travon' ),
            ),
            array(
                'id'       => 'travon_site_logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Dimensions (Width/Height).', 'travon'),
                'output'   => array('.header-logo .logo img'),
                'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'travon'),
            ),
            array(
                'id'       => 'travon_site_logomargin_dimensions',
                'type'     => 'spacing',
                'mode'     => 'margin',
                'output'   => array('.header-logo .logo img'),
                'units_extended' => 'false',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Top and Bottom Margin.', 'travon'),
                'left'     => false,
                'right'    => false,
                'subtitle' => esc_html__('Set logo top and bottom margin.', 'travon'),
                'default'            => array(
                    'units'           => 'px'
                )
            ),
            array(
                'id'       => 'travon_text_title',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Text Logo', 'travon' ),
                'subtitle' => esc_html__( 'Write your logo text use as logo ( You can use span tag for text color ).', 'travon' ),
            )
        )
    ) );
    // -> End Header Logo

    // -> START Header Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Menu', 'travon' ),
        'id'               => 'travon_header_menu_option',
        'subsection'       => true,
        'fields'           => array(            
            array(
                'id'       => 'travon_menu_background',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Menu Bakcground Image', 'travon' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your site Menu Bakcground Image for header ( recommendation png format ).', 'travon' ),
            ),
            array(
                'id'       => 'travon_header_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Menu Color', 'travon' ),
                'output'   => array( 'color'    =>  '.main-menu > ul > li > a' ),
            ),
            array(
                'id'       => 'travon_header_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Hover Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Menu Hover Color', 'travon' ),
                'output'   => array( 'color'    =>  '.main-menu > ul > li > a:hover' ),
            ),
            array(
                'id'       => 'travon_header_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Submenu Color', 'travon' ),
                'output'   => array( 'color'    =>  '.main-menu ul li ul.sub-menu li a' ),
            ),
            array(
                'id'       => 'travon_header_submenu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Hover Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Submenu Hover Color', 'travon' ),
                'output'   => array( 'color'    =>  '.main-menu ul li ul.sub-menu li a:hover' ),
            ),
            array(
                'id'       => 'travon_header_submenu_icon_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Icon Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Submenu Icon Color', 'travon' ),
                'output'   => array( 'color'    =>  '.main-menu ul li ul.sub-menu li a:after' ),
            ),
            array(
                'id'       => 'travon_header_submenu_border_top_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Border Top Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Submenu Border Top Color', 'travon' ),
                'output'   => array( 'border-top-color'    =>  '.main-menu ul.sub-menu' ),
            ),
        )
    ) );
    // -> End Header Menu

     // -> START Mobile Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Offcanvas', 'travon' ),
        'id'               => 'travon_offcanvas_panel',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'travon_offcanvas_panel_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Offcanvas Panel Background', 'travon' ),
                'output'   => array('.sidemenu-wrapper .sidemenu-content'),
                'subtitle' => esc_html__( 'Set Offcanvas Panel Background Color', 'travon' ),
            ),
            array(
                'id'       => 'travon_offcanvas_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Offcanvas Title Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Offcanvas Title color.', 'travon' ),
                'output'   => array( '.sidemenu-content h3.sidebox-title' )
            ),
        )
    ) );
    // -> End Mobile Menu

    // -> START Blog Page
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'travon' ),
        'id'         => 'travon_blog_page',
        'icon'  => 'el el-blogger',
        'fields'     => array(

            array(
                'id'       => 'travon_blog_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'travon' ),
                'subtitle' => esc_html__( 'Choose blog layout from here. If you use this option then you will able to change three type of blog layout ( Default Left Sidebar Layour ). ', 'travon' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'travon_blog_grid',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Post Column', 'travon' ),
                'subtitle' => esc_html__( 'Select your blog post column from here. If you use this option then you will able to select three type of blog post layout ( Default Two Column ).', 'travon' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/1column.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2column.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3column.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'travon_blog_page_title_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__('Show','travon'),
                'off'      => esc_html__('Hide','travon'),
                'title'    => esc_html__('Blog Page Title', 'travon'),
                'subtitle' => esc_html__('Control blog page title show / hide. If you use this option then you will able to show / hide your blog page title ( Default Setting Show ).', 'travon'),
            ),
            array(
                'id'       => 'travon_blog_page_title_setting',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog Page Title Setting', 'travon'),
                'subtitle' => esc_html__('Control blog page title setting. If you use this option then you can able to show default or custom blog page title ( Default Blog ).', 'travon'),
                'options'  => array(
                    "predefine"   => esc_html__('Default','travon'),
                    "custom"      => esc_html__('Custom','travon'),
                ),
                'default'  => 'predefine',
                'required' => array("travon_blog_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'travon_blog_page_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Custom Title', 'travon'),
                'subtitle' => esc_html__('Set blog page custom title form here. If you use this option then you will able to set your won title text.', 'travon'),
                'required' => array('travon_blog_page_title_setting','equals','custom')
            ),
            array(
                'id'            => 'travon_blog_postExcerpt',
                'type'          => 'slider',
                'title'         => esc_html__('Blog Posts Excerpt', 'travon'),
                'subtitle'      => esc_html__('Control the number of characters you want to show in the blog page for each post.. If you use this option then you can able to control your blog post characters from here ( Default show 10 ).', 'travon'),
                "default"       => 46,
                "min"           => 0,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text',
            ),
            array(
                'id'       => 'travon_blog_readmore_setting',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Read More Text Setting', 'travon' ),
                'subtitle' => esc_html__( 'Control read more text from here.', 'travon' ),
                'options'  => array(
                    "default"   => esc_html__('Default','travon'),
                    "custom"    => esc_html__('Custom','travon'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'       => 'travon_blog_custom_readmore',
                'type'     => 'text',
                'title'    => esc_html__('Read More Text', 'travon'),
                'subtitle' => esc_html__('Set read moer text here. If you use this option then you will able to set your won text.', 'travon'),
                'required' => array('travon_blog_readmore_setting','equals','custom')
            ),
            array(
                'id'       => 'travon_blog_title_color',
                'output'   => array( '.ot-blog .blog-title a'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Blog Title Color.', 'travon' ),
            ),
            array(
                'id'       => 'travon_blog_title_hover_color',
                'output'   => array( '.ot-blog .blog-title a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Hover Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Blog Title Hover Color.', 'travon' ),
            ),
            array(
                'id'       => 'travon_blog_contant_color',
                'output'   => array( '.blog-content p'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Excerpt / Content Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Blog Excerpt / Content Color.', 'travon' ),
            ),
            array(
                'id'       => 'travon_blog_read_more_button_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Read More Button Color.', 'travon' ),
                'output'   => array( '--theme-color' => '.blog-single .ot-btn' ),
            ),
            array(
                'id'       => 'travon_blog_read_more_button_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Hover Gradient Color 1', 'travon' ),
                'subtitle' => esc_html__( 'Set Read More Button Hover Color.', 'travon' ),
                'output'   => array( '--theme-color' => '.blog-single .blog-content .ot-btn' ),
            ),
            array(
                'id'       => 'travon_blog_read_more_button_hover_color_2',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Hover Gradient Color 2', 'travon' ),
                'subtitle' => esc_html__( 'Set Read More Button Hover Color.', 'travon' ),
                'output'   => array( '--theme-color2' => '.blog-single .blog-content .ot-btn' ),
            ),
            array(
                'id'       => 'travon_blog_pagination_color',
                'output'   => array( '.pagination li a,.pagination a i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Color', 'travon'),
                'subtitle' => esc_html__('Set Blog Pagination Color.', 'travon'),
            ),
            array(
                'id'       => 'travon_blog_pagination_active_color',
                'output'   => array( '.pagination li span.current'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Active Color', 'travon'),
                'subtitle' => esc_html__('Set Blog Pagination Active Color.', 'travon'),
                'required'  => array('travon_blog_pagination', '=', '1')
            ),
            array(
                'id'       => 'travon_blog_pagination_hover_color',
                'output'   => array( '.pagination li a:hover,.pagination a i:hover'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Hover Color', 'travon'),
                'subtitle' => esc_html__('Set Blog Pagination Hover Color.', 'travon'),
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Blog Page', 'travon' ),
        'id'         => 'travon_post_detail_styles',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'travon_blog_single_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'travon' ),
                'subtitle' => esc_html__( 'Choose blog single page layout from here. If you use this option then you will able to change three type of blog single page layout ( Default Left Sidebar Layour ). ', 'travon' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'travon_post_details_title_position',
                'type'     => 'button_set',
                'default'  => 'header',
                'options'  => array(
                    'header'        => esc_html__('On Header','travon'),
                    'below'         => esc_html__('Below Thumbnail','travon'),
                ),
                'title'    => esc_html__('Blog Post Title Position', 'travon'),
                'subtitle' => esc_html__('Control blog post title position from here.', 'travon'),
            ),
            array(
                'id'       => 'travon_post_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Details Custom Title', 'travon'),
                'subtitle' => esc_html__('This title will show in Breadcrumb title.', 'travon'),
                'required' => array('travon_post_details_title_position','equals','below')
            ),
            array(
                'id'       => 'travon_display_post_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'travon' ),
                'subtitle' => esc_html__( 'Switch On to Display Tags.', 'travon' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','travon'),
                'off'       => esc_html__('Disabled','travon'),
            ),
            array(
                'id'       => 'travon_post_details_share_options',
                'type'     => 'switch',
                'title'    => esc_html__('Share Options', 'travon'),
                'subtitle' => esc_html__('Control post share options from here. If you use this option then you will able to show or hide post share options.', 'travon'),
                'on'        => esc_html__('Show','travon'),
                'off'       => esc_html__('Hide','travon'),
                'default'   => '0',
            ),
            array(
                'id'       => 'travon_post_details_author_desc_trigger',
                'type'     => 'switch',
                'title'    => esc_html__('Biography Info', 'travon'),
                'subtitle' => esc_html__('Control biography info from here. If you use this option then you will able to show or hide biography info ( Default setting Show ).', 'travon'),
                'on'        => esc_html__('Show','travon'),
                'off'       => esc_html__('Hide','travon'),
                'default'   => '0',
            ),
            array(
                'id'       => 'travon_post_details_post_navigation',
                'type'     => 'switch',
                'title'    => esc_html__('Post Navigation', 'travon'),
                'subtitle' => esc_html__('Control post navigation from here. If you use this option then you will able to show or hide post navigation ( Default setting Show ).', 'travon'),
                'on'        => esc_html__('Show','travon'),
                'off'       => esc_html__('Hide','travon'),
                'default'   => true,
            ),
            array(
                'id'       => 'travon_post_details_related_post',
                'type'     => 'switch',
                'title'    => esc_html__('Related Post', 'travon'),
                'subtitle' => esc_html__('Control related post from here. If you use this option then you will able to show or hide related post ( Default setting Show ).', 'travon'),
                'on'        => esc_html__('Show','travon'),
                'off'       => esc_html__('Hide','travon'),
                'default'   => false,
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Meta Data', 'travon' ),
        'id'         => 'travon_common_meta_data',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'travon_blog_meta_icon_color',
                'output'   => array( '.blog-meta span i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Meta Icon Color', 'travon'),
                'subtitle' => esc_html__('Set Blog Meta Icon Color.', 'travon'),
            ),
            array(
                'id'       => 'travon_blog_meta_text_color',
                'output'   => array( '.blog-meta a,.blog-meta span'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Text Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Blog Meta Text Color.', 'travon' ),
            ),
            array(
                'id'       => 'travon_blog_meta_text_hover_color',
                'output'   => array( '.blog-meta a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Hover Text Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Blog Meta Hover Text Color.', 'travon' ),
            ),
            array(
                'id'       => 'travon_display_post_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Author', 'travon' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Author.', 'travon' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','travon'),
                'off'       => esc_html__('Disabled','travon'),
            ),
            array(
                'id'       => 'travon_display_post_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Date', 'travon' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Date.', 'travon' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','travon'),
                'off'       => esc_html__('Disabled','travon'),
            ),
            array(
                'id'       => 'travon_display_post_tag',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Tag', 'travon' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Tag.', 'travon' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','travon'),
                'off'       => esc_html__('Disabled','travon'),
            ),
            array(
                'id'       => 'travon_display_post_comment',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Comments', 'travon' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Comments.', 'travon' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','travon'),
                'off'       => esc_html__('Disabled','travon'),
            ),
        )
    ));

    /* End blog Page */

    // -> START Page Option
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page', 'travon' ),
        'id'         => 'travon_page_page',
        'icon'  => 'el el-file',
        'fields'     => array(
            array(
                'id'       => 'travon_page_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Select layout', 'travon' ),
                'subtitle' => esc_html__( 'Choose your page layout. If you use this option then you will able to choose three type of page layout ( Default no sidebar ). ', 'travon' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'travon_page_layoutopt',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Settings', 'travon'),
                'subtitle' => esc_html__('Set page sidebar. If you use this option then you will able to set three type of sidebar ( Default no sidebar ).', 'travon'),
                //Must provide key => value pairs for options
                'options' => array(
                    '1' => esc_html__( 'Page Sidebar', 'travon' ),
                    '2' => esc_html__( 'Blog Sidebar', 'travon' )
                 ),
                'default' => '1',
                'required'  => array('travon_page_sidebar','!=','1')
            ),
            array(
                'id'       => 'travon_page_title_switcher',
                'type'     => 'switch',
                'title'    => esc_html__('Title', 'travon'),
                'subtitle' => esc_html__('Switch enabled to display page title. Fot this option you will able to show / hide page title.  Default setting Enabled', 'travon'),
                'default'  => '1',
                'on'        => esc_html__('Enabled','travon'),
                'off'       => esc_html__('Disabled','travon'),
            ),
            array(
                'id'       => 'travon_page_title_tag',
                'type'     => 'select',
                'options'  => array(
                    'h1'        => esc_html__('H1','travon'),
                    'h2'        => esc_html__('H2','travon'),
                    'h3'        => esc_html__('H3','travon'),
                    'h4'        => esc_html__('H4','travon'),
                    'h5'        => esc_html__('H5','travon'),
                    'h6'        => esc_html__('H6','travon'),
                ),
                'default'  => 'h1',
                'title'    => esc_html__( 'Title Tag', 'travon' ),
                'subtitle' => esc_html__( 'Select page title tag. If you use this option then you can able to change title tag H1 - H6 ( Default tag H1 )', 'travon' ),
                'required' => array("travon_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'travon_allHeader_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Title Color', 'travon' ),
                'subtitle' => esc_html__( 'Set Title Color', 'travon' ),
                'output'   => array( 'color' => '.breadcumb-title' ),
            ),
            array(
                'id'       => 'travon_allHeader_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Default Pages', 'travon' ),
                'subtitle' => esc_html__( 'Setting page header background. If you use this option then you will able to set Background Color, Background Image, Background Repeat, Background Size, Background Attachment, Background Position.', 'travon' ),
                'output'   => array( 'background' => '.breadcumb-wrapper' ),
            ),
            array(
                'id'       => 'travon_shoppage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Shop Pages', 'travon' ),
                'output'   => array( 'background' => '.custom-woo-class' ),
            ),
            array(
                'id'       => 'travon_searchpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Search Pages', 'travon' ),
                'output'   => array( 'background' => '.custom-search-class' ),
            ),
            array(
                'id'       => 'travon_errorpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Error Pages', 'travon' ),
                'output'   => array( 'background' => '.custom-fof-class' ),
            ),
            array(
                'id'       => 'travon_enable_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumb Hide/Show', 'travon' ),
                'subtitle' => esc_html__( 'Hide / Show breadcrumb from all pages and posts ( Default settings hide ).', 'travon' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'travon_allHeader_breadcrumbtextcolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Color', 'travon' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text color here.If you user this option then you will able to set page breadcrumb color.', 'travon' ),
                'required' => array("travon_page_title_switcher","equals","1"),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li a' ),
            ),
            array(
                'id'       => 'travon_allHeader_breadcrumbtextactivecolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Active Color', 'travon' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text active color here.If you user this option then you will able to set page breadcrumb active color.', 'travon' ),
                'required' => array( "travon_page_title_switcher", "equals", "1" ),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li:last-child' ),
            ),
            array(
                'id'       => 'travon_allHeader_dividercolor',
                'type'     => 'color',
                'output'   => array( 'color'=>'.breadcumb-wrapper .breadcumb-content ul li:after' ),
                'title'    => esc_html__( 'Breadcrumb Divider Color', 'travon' ),
                'subtitle' => esc_html__( 'Choose breadcrumb divider color.', 'travon' ),
            ),
        ),
    ) );
    /* End Page option */

    // -> START 404 Page

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page', 'travon' ),
        'id'         => 'travon_404_page',
        'icon'       => 'el el-ban-circle',
        'fields'     => array(
            array(
                'id'       => 'travon_404_bg',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( '404  Image', 'travon' ),
                'compiler' => 'true',
            ),
            array(
                'id'       => 'travon_fof_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Title', 'travon' ),
                'subtitle' => esc_html__( 'Set Page Title', 'travon' ),
                'default'  => esc_html__( '404', 'travon' ),
            ),
            array(
                'id'       => 'travon_fof_description',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Description', 'travon' ),
                'subtitle' => esc_html__( 'Set Page Subtitle ', 'travon' ),
                'default'  => esc_html__( 'Unfortunately, something went wrong and this page does not exist. Try using the search or return to the previous page.', 'travon' ),
            ),
            array(
                'id'       => 'travon_fof_btn_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Text', 'travon' ),
                'subtitle' => esc_html__( 'Set Button Text ', 'travon' ),
                'default'  => esc_html__( 'Return To Home', 'travon' ),
            ),
            array(
                'id'       => 'travon_fof_text_color',
                'type'     => 'color',
                'output'   => array( '.error-content h3' ),
                'title'    => esc_html__( 'Title Color', 'travon' ),
                'subtitle' => esc_html__( 'Pick a title color', 'travon' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'travon_fof_subtitle_color',
                'type'     => 'color',
                'output'   => array( '.error-content p' ),
                'title'    => esc_html__( 'Description Color', 'travon' ),
                'subtitle' => esc_html__( 'Pick a subtitle color', 'travon' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'travon_fof_btn_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Color', 'travon' ),
                'subtitle' => esc_html__( 'Button Color.', 'travon' ),
                'output'   => array( '--theme-color' => '.ot-error-wrapper.ot-btn' ),
            ),
            array(
                'id'       => 'travon_fof_btn_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Gradient Color 1', 'travon' ),
                'subtitle' => esc_html__( 'Set Button Hover Color.', 'travon' ),
                'output'   => array( '--theme-color' => '.ot-error-wrapper .ot-btn' ),
            ),
            array(
                'id'       => 'travon_fof_btn_hover_color_2',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Gradient Color 2', 'travon' ),
                'subtitle' => esc_html__( 'Read More Button Hover Color.', 'travon' ),
                'output'   => array( '--theme-color2' => '.ot-error-wrapper .ot-btn' ),
            ),
        ),
    ) );

    /* End 404 Page */
    // -> START Woo Page Option

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Woocommerce Page', 'travon' ),
        'id'         => 'travon_woo_page_page',
        'icon'  => 'el el-shopping-cart',
        'fields'     => array(
            array(
                'id'       => 'travon_woo_shoppage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Set Shop Page Sidebar.', 'travon' ),
                'subtitle' => esc_html__( 'Choose shop page sidebar', 'travon' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'travon_woo_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Column', 'travon' ),
                'subtitle' => esc_html__( 'Set your woocommerce product column.', 'travon' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '2' => array(
                        'alt' => esc_attr__('2 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('3 Columns','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '4' => array(
                        'alt' => esc_attr__('4 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),),
                'default'  => '4'
            ),
            array(
                'id'       => 'travon_woo_product_perpage',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Per Page', 'travon' ),
                'default' => '10'
            ),
            array(
                'id'       => 'travon_woo_singlepage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Single Page sidebar', 'travon' ),
                'subtitle' => esc_html__( 'Choose product single page sidebar.', 'travon' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'travon_product_details_title_position',
                'type'     => 'button_set',
                'default'  => 'below',
                'options'  => array(
                    'header'        => esc_html__('On Header','travon'),
                    'below'         => esc_html__('Below Thumbnail','travon'),
                ),
                'title'    => esc_html__('Product Details Title Position', 'travon'),
                'subtitle' => esc_html__('Control product details title position from here.', 'travon'),
            ),
            array(
                'id'       => 'travon_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'travon' ),
                'default'  => esc_html__( 'Shop Details', 'travon' ),
                'required' => array('travon_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'travon_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'travon' ),
                'default'  => esc_html__( 'Shop Details', 'travon' ),
                'required' => array('travon_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'travon_woo_relproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related product Hide/Show', 'travon' ),
                'subtitle' => esc_html__( 'Hide / Show related product in single page (Default Settings Show)', 'travon' ),
                'default'  => '1',
                'on'       => esc_html__('Show','travon'),
                'off'      => esc_html__('Hide','travon')
            ),
            array(
                'id'       => 'travon_woo_relproduct_subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products Subtitle', 'travon' ),
                'default'  => esc_html__( 'Some Others Product', 'travon' ),
                'required' => array('travon_woo_relproduct_display','equals',true)
            ),
            array(
                'id'       => 'travon_woo_relproduct_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products Title', 'travon' ),
                'default'  => esc_html__( 'Related products', 'travon' ),
                'required' => array('travon_woo_relproduct_display','equals',true)
            ),
            array(
                'id'       => 'travon_woo_relproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products number', 'travon' ),
                'subtitle' => esc_html__( 'Set how many related products you want to show in single product page.', 'travon' ),
                'default'  => 4,
                'required' => array('travon_woo_relproduct_display','equals',true)
            ),

            array(
                'id'       => 'travon_woo_related_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Related Product Column', 'travon' ),
                'subtitle' => esc_html__( 'Set your woocommerce related product column.', 'travon' ),
                'required' => array('travon_woo_relproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'travon_woo_upsellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Upsell product Hide/Show', 'travon' ),
                'subtitle' => esc_html__( 'Hide / Show upsell product in single page (Default Settings Show)', 'travon' ),
                'default'  => '1',
                'on'       => esc_html__('Show','travon'),
                'off'      => esc_html__('Hide','travon'),
            ),
            array(
                'id'       => 'travon_woo_upsellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Upsells products number', 'travon' ),
                'subtitle' => esc_html__( 'Set how many upsells products you want to show in single product page.', 'travon' ),
                'default'  => 3,
                'required' => array('travon_woo_upsellproduct_display','equals',true),
            ),

            array(
                'id'       => 'travon_woo_upsell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Upsells Product Column', 'travon' ),
                'subtitle' => esc_html__( 'Set your woocommerce upsell product column.', 'travon' ),
                'required' => array('travon_woo_upsellproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'travon_woo_crosssellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross sell product Hide/Show', 'travon' ),
                'subtitle' => esc_html__( 'Hide / Show cross sell product in single page (Default Settings Show)', 'travon' ),
                'default'  => '1',
                'on'       => esc_html__( 'Show', 'travon' ),
                'off'      => esc_html__( 'Hide', 'travon' ),
            ),
            array(
                'id'       => 'travon_woo_crosssellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Cross sell products number', 'travon' ),
                'subtitle' => esc_html__( 'Set how many cross sell products you want to show in single product page.', 'travon' ),
                'default'  => 3,
                'required' => array('travon_woo_crosssellproduct_display','equals',true),
            ),

            array(
                'id'       => 'travon_woo_crosssell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Cross sell Product Column', 'travon' ),
                'subtitle' => esc_html__( 'Set your woocommerce cross sell product column.', 'travon' ),
                'required' => array( 'travon_woo_crosssellproduct_display', 'equals', true ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','travon'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','travon'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
        ),
    ) );

    /* End Woo Page option */
    // -> START Gallery
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Gallery', 'travon' ),
        'id'         => 'travon_gallery_widget',
        'icon'       => 'el el-gift',
        'fields'     => array(
            array(
                'id'          => 'travon_gallery_image_widget',
                'type'        => 'slides',
                'title'       => esc_html__('Add Gallery Image', 'travon'),
                'subtitle'    => esc_html__('Add gallery Image and url.', 'travon'),
                'show'        => array(
                    'title'          => false,
                    'description'    => false,
                    'progress'       => false,
                    'icon'           => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => true,
                ),
            ),
        ),
    ) );
    // -> START Subscribe
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Subscribe', 'travon' ),
        'id'         => 'travon_subscribe_page',
        'icon'       => 'el el-eject',
        'fields'     => array(

            array(
                'id'       => 'travon_subscribe_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp API Key', 'travon' ),
                'subtitle' => esc_html__( 'Set mailchimp api key.', 'travon' ),
            ),
            array(
                'id'       => 'travon_subscribe_listid',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp List ID', 'travon' ),
                'subtitle' => esc_html__( 'Set mailchimp list id.', 'travon' ),
            ),
        ),
    ) );

    /* End Subscribe */

    // -> START Social Media

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social', 'travon' ),
        'id'         => 'travon_social_media',
        'icon'      => 'el el-globe',
        'desc'      => esc_html__( 'Social', 'travon' ),
        'fields'     => array(
            array(
                'id'          => 'travon_social_links',
                'type'        => 'slides',
                'title'       => esc_html__('Social Profile Links', 'travon'),
                'subtitle'    => esc_html__('Add social icon and url.', 'travon'),
                'show'        => array(
                    'title'          => true,
                    'description'    => true,
                    'progress'       => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => false,
                ),
                'placeholder'   => array(
                    'icon'          => esc_html__( 'Icon (example: fa fa-facebook) ','travon'),
                    'title'         => esc_html__( 'Social Icon Class', 'travon' ),
                    'description'   => esc_html__( 'Social Icon Title', 'travon' ),
                ),
            ),
        ),
    ) );

    /* End social Media */


    // -> START Footer Media
    Redux::setSection( $opt_name , array(
       'title'            => esc_html__( 'Footer', 'travon' ),
       'id'               => 'travon_footer',
       'desc'             => esc_html__( 'travon Footer', 'travon' ),
       'customizer_width' => '400px',
       'icon'              => 'el el-photo',
   ) );

   Redux::setSection( $opt_name, array(
       'title'      => esc_html__( 'Pre-built Footer / Footer Builder', 'travon' ),
       'id'         => 'travon_footer_section',
       'subsection' => true,
       'fields'     => array(
            array(
               'id'       => 'travon_footer_builder_trigger',
               'type'     => 'button_set',
               'default'  => 'prebuilt',
               'options'  => array(
                   'footer_builder'        => esc_html__('Footer Builder','travon'),
                   'prebuilt'              => esc_html__('Pre-built Footer','travon'),
               ),
               'title'    => esc_html__( 'Footer Builder', 'travon' ),
            ),
            array(
               'id'       => 'travon_footer_builder_select',
               'type'     => 'select',
               'required' => array( 'travon_footer_builder_trigger','equals','footer_builder'),
               'data'     => 'posts',
               'args'     => array(
                   'post_type'     => 'travon_footer_build'
               ),
               'on'       => esc_html__( 'Enabled', 'travon' ),
               'off'      => esc_html__( 'Disable', 'travon' ),
               'title'    => esc_html__( 'Select Footer', 'travon' ),
               'subtitle' => esc_html__( 'First make your footer from footer custom types then select it from here.', 'travon' ),
            ),
            array(
               'id'       => 'travon_cta_enable',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer CTA', 'travon' ),
               'default'  => 0,
               'on'       => esc_html__( 'Enabled', 'travon' ),
               'off'      => esc_html__( 'Disable', 'travon' ),
               'required' => array( 'travon_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
                'id'       => 'travon_cta_heading_enable',
                'type'     => 'text',
                'title'    => esc_html__( 'CTA Heading', 'travon' ),
                'required' => array( 'travon_cta_enable','equals','1'),

            ),
            array(
                'id'       => 'travon_cta_title_enable',
                'type'     => 'text',
                'title'    => esc_html__( 'CTA Title', 'travon' ),
                'required' => array( 'travon_cta_enable','equals','1'),

            ),
            array(
               'id'       => 'travon_footerwidget_enable',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Widget', 'travon' ),
               'default'  => 0,
               'on'       => esc_html__( 'Enabled', 'travon' ),
               'off'      => esc_html__( 'Disable', 'travon' ),
               'required' => array( 'travon_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
               'id'       => 'travon_footer_background',
               'type'     => 'background',
               'title'    => esc_html__( 'Footer Background', 'travon' ),
               'subtitle' => esc_html__( 'Set footer background.', 'travon' ),
               'output'   => array( '.footer-custom' ),
               'required' => array( 'travon_footerwidget_enable','=','1' ),
            ),
            
            array(
               'id'       => 'travon_footer_widget_title_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Title Color', 'travon' ),
               'required' => array('travon_footerwidget_enable','=','1'),
               'output'   => array( '.footer-custom-style h5' ),
            ),
            array(
               'id'       => 'travon_footer_widget_anchor_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Color', 'travon' ),
               'required' => array('travon_footerwidget_enable','=','1'),
               'output'   => array( '.footer-custom-style a' ),
            ),
            array(
               'id'       => 'travon_footer_widget_anchor_hov_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Hover Color', 'travon' ),
               'required' => array('travon_footerwidget_enable','=','1'),
               'output'   => array( '.footer-layout1 .footer-wid-wrap .widget_contact p a:hover,.footer-layout1 .footer-wid-wrap .widget-links ul li a:hover' ),
            ),
            array(
               'id'       => 'travon_disable_footer_bottom',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Bottom?', 'travon' ),
               'default'  => 1,
               'on'       => esc_html__('Enabled','travon'),
               'off'      => esc_html__('Disable','travon'),
               'required' => array('travon_footer_builder_trigger','equals','prebuilt'),
            ),
             array(
               'id'       => 'travon_footer_bottom_background',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Bottom Background Color', 'travon' ),
               'default'  =>'#1b1b1b',
               'required' => array( 'travon_disable_footer_bottom','=','1' ),
               'output'   => array( 'background-color'   =>   '.footer-copyright' ),
            ),
            array(
               'id'       => 'travon_copyright_text',
               'type'     => 'text',
               'title'    => esc_html__( 'Copyright Text', 'travon' ),
               'subtitle' => esc_html__( 'Add Copyright Text', 'travon' ),
               'default'  => sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'Travon.','travon' ),esc_url('https://angfuzsoft.com/'),__( 'Adivaha', 'travon' ) ),
               'required' => array( 'travon_disable_footer_bottom','equals','1' ),
            ),
            array(
               'id'       => 'travon_footer_copyright_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Text Color', 'travon' ),
               'subtitle' => esc_html__( 'Set footer copyright text color', 'travon' ),
               'required' => array( 'travon_disable_footer_bottom','equals','1'),
               'output'   => array( '.footer-layout2 .footer-copyright .copyright' ),
            ),
            array(
               'id'       => 'travon_footer_copyright_acolor',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Ancor Color', 'travon' ),
               'subtitle' => esc_html__( 'Set footer copyright ancor color', 'travon' ),
               'required' => array( 'travon_disable_footer_bottom','equals','1'),
               'output'   => array( '.footer-copyright p a' ),
            ),
            array(
               'id'       => 'travon_footer_copyright_a_hover_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Ancor Hover Color', 'travon' ),
               'subtitle' => esc_html__( 'Set footer copyright ancor Hover color', 'travon' ),
               'required' => array( 'travon_disable_footer_bottom','equals','1'),
               'output'   => array( '.footer-copyright p a:hover' ),
            ),

       ),
   ) );


    /* End Footer Media */

    // -> START Custom Css
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Css', 'travon' ),
        'id'         => 'travon_custom_css_section',
        'icon'  => 'el el-css',
        'fields'     => array(
            array(
                'id'       => 'travon_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__('CSS Code', 'travon'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'travon'),
                'mode'     => 'css',
                'theme'    => 'monokai',
            )
        ),
    ) );

    /* End custom css */



    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'travon' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'travon' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'travon' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }