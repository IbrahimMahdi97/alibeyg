<?php
    /**
     * Class For Builder
     */
    class TravonBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'travon_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'travon-core',TRAVON_PLUGDIRURI.'assets/js/travon-core.js',array( 'jquery' ),'1.0',true );
		}


        public function travon_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'travon_header_option',
                [
                    'label'     => __( 'Header Option', 'travon' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'travon_header_style',
                [
                    'label'     => __( 'Header Option', 'travon' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'travon' ),
    					'header_builder'       => __( 'Header Builder', 'travon' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'travon_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'travon' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->travon_header_choose_option(),
                    'condition' => [ 'travon_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'travon_footer_option',
                [
                    'label'     => __( 'Footer Option', 'travon' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'travon_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'travon' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'travon' ),
    				'label_off'     => __( 'No', 'travon' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'travon_footer_style',
                [
                    'label'     => __( 'Footer Style', 'travon' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'travon' ),
    					'footer_builder'       => __( 'Footer Builder', 'travon' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'travon_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'travon_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'travon' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->travon_footer_build_choose_option(),
                    'condition' => [ 'travon_footer_style' => 'footer_builder','travon_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Travon Builder', 'travon' ),
            	esc_html__( 'Travon Builder', 'travon' ),
				'manage_options',
				'travon',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('travon', esc_html__('Footer Builder', 'travon'), esc_html__('Footer Builder', 'travon'), 'manage_options', 'edit.php?post_type=travon_footer_build');
			add_submenu_page('travon', esc_html__('Header Builder', 'travon'), esc_html__('Header Builder', 'travon'), 'manage_options', 'edit.php?post_type=travon_header');
			add_submenu_page('travon', esc_html__('Tab Builder', 'travon'), esc_html__('Tab Builder', 'travon'), 'manage_options', 'edit.php?post_type=travon_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','travon' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'travon' ),
				'singular_name'      => __( 'Footer', 'travon' ),
				'menu_name'          => __( 'Travon Footer Builder', 'travon' ),
				'name_admin_bar'     => __( 'Footer', 'travon' ),
				'add_new'            => __( 'Add New', 'travon' ),
				'add_new_item'       => __( 'Add New Footer', 'travon' ),
				'new_item'           => __( 'New Footer', 'travon' ),
				'edit_item'          => __( 'Edit Footer', 'travon' ),
				'view_item'          => __( 'View Footer', 'travon' ),
				'all_items'          => __( 'All Footer', 'travon' ),
				'search_items'       => __( 'Search Footer', 'travon' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'travon' ),
				'not_found'          => __( 'No Footer found.', 'travon' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'travon' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'travon_footer_build', $args );

			$labels = array(
				'name'               => __( 'Header', 'travon' ),
				'singular_name'      => __( 'Header', 'travon' ),
				'menu_name'          => __( 'Travon Header Builder', 'travon' ),
				'name_admin_bar'     => __( 'Header', 'travon' ),
				'add_new'            => __( 'Add New', 'travon' ),
				'add_new_item'       => __( 'Add New Header', 'travon' ),
				'new_item'           => __( 'New Header', 'travon' ),
				'edit_item'          => __( 'Edit Header', 'travon' ),
				'view_item'          => __( 'View Header', 'travon' ),
				'all_items'          => __( 'All Header', 'travon' ),
				'search_items'       => __( 'Search Header', 'travon' ),
				'parent_item_colon'  => __( 'Parent Header:', 'travon' ),
				'not_found'          => __( 'No Header found.', 'travon' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'travon' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'travon_header', $args );

			$labels = array(
				'name'               => __( 'Tab Builder', 'travon' ),
				'singular_name'      => __( 'Tab Builder', 'travon' ),
				'menu_name'          => __( 'Gesund Tab Builder', 'travon' ),
				'name_admin_bar'     => __( 'Tab Builder', 'travon' ),
				'add_new'            => __( 'Add New', 'travon' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'travon' ),
				'new_item'           => __( 'New Tab Builder', 'travon' ),
				'edit_item'          => __( 'Edit Tab Builder', 'travon' ),
				'view_item'          => __( 'View Tab Builder', 'travon' ),
				'all_items'          => __( 'All Tab Builder', 'travon' ),
				'search_items'       => __( 'Search Tab Builder', 'travon' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'travon' ),
				'not_found'          => __( 'No Tab Builder found.', 'travon' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'travon' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'travon_tab_builder', $args );
		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'travon_footer_build' == $post->post_type || 'travon_header' == $post->post_type || 'travon_tab_build' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function travon_footer_build_choose_option(){

			$travon_post_query = new WP_Query( array(
				'post_type'			=> 'travon_footer_build',
				'posts_per_page'	    => -1,
			) );

			$travon_builder_post_title = array();
			$travon_builder_post_title[''] = __('Select a Footer','Travon');

			while( $travon_post_query->have_posts() ) {
				$travon_post_query->the_post();
				$travon_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $travon_builder_post_title;

		}

		public function travon_header_choose_option(){

			$travon_post_query = new WP_Query( array(
				'post_type'			=> 'travon_header',
				'posts_per_page'	    => -1,
			) );

			$travon_builder_post_title = array();
			$travon_builder_post_title[''] = __('Select a Header','Travon');

			while( $travon_post_query->have_posts() ) {
				$travon_post_query->the_post();
				$travon_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $travon_builder_post_title;

        }

    }

    $builder_execute = new TravonBuilder();