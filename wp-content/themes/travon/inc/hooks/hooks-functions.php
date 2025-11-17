<?php
/**
 * @Packge     : Travon
 * @Version    : 1.0
 * @Author     : Adivaha
 * @Author URI : https://www.adivaha.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }


    // preloader hook function
    if( ! function_exists( 'travon_preloader_wrap_cb' ) ) {
        function travon_preloader_wrap_cb() {
            $preloader_display              =  travon_opt('travon_display_preloader');

            if( class_exists('ReduxFramework') ){
                if( $preloader_display ){
                    echo '<div class="preloader" style="display: none;">';
                        echo '<button class="ot-btn style3 preloaderCls">'.esc_html__( 'Cancel Preloader', 'travon' ).'</button>';
                        echo '<div class="preloader-inner">';
                            if( ! empty( travon_opt( 'travon_preloader_img','url' ) ) ){
                                echo travon_img_tag( array(
                                    'url'   => esc_url( travon_opt( 'travon_preloader_img','url' ) ),
                                    'class' => 'loader-img',
                                ) );  
                            }else{
                               echo '<span class="loader"></span>';
                            }
                        echo '</div>';
                    echo '</div>';
                }
            }else{
                echo '<div class="preloader" style="display: none;">';
                    echo '<button class="ot-btn style3 preloaderCls">'.esc_html__( 'Cancel Preloader', 'travon' ).'</button>';
                    echo '<div class="preloader-inner">';
                        echo '<span class="loader"></span>';
                    echo '</div>';
                echo '</div>';
            }
        }
    }

    // Header Hook function
    if( !function_exists('travon_header_cb') ) {
        function travon_header_cb( ) {
            get_template_part('templates/header');
            get_template_part('templates/header-menu-bottom');
        }
    }

    // back top top hook function
    if( ! function_exists( 'travon_back_to_top_cb' ) ) {
        function travon_back_to_top_cb( ) {
            $backtotop_trigger = travon_opt('travon_display_bcktotop');
            $custom_bcktotop   = travon_opt('travon_custom_bcktotop');
            $custom_bcktotop_icon   = travon_opt('travon_custom_bcktotop_icon');
            if( class_exists( 'ReduxFramework' ) ) {
                if( $backtotop_trigger ) {
                    if( $custom_bcktotop ) {
                        echo '<!-- Back to Top Button -->';
                        echo '<div class="scroll-top">';
                            echo '<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">';
                                echo '<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>';
                            echo '</svg>';
                        echo '</div>';
                        echo '<!-- End of Back to Top Button -->';
                    } else {
                        echo '<!-- Back to Top Button -->';
                        echo '<div class="scroll-top">';
                            echo '<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">';
                                echo '<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>';
                            echo '</svg>';
                        echo '</div>';
                        echo '<!-- End of Back to Top Button -->';
                    }
                }
            }

        }
    }

    // Blog Start Wrapper Function
    if( !function_exists('travon_blog_start_wrap_cb') ) {
        function travon_blog_start_wrap_cb() {
            echo '<section class="ot-blog-wrapper space-top space-extra-bottom arrow-wrap">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
    }

    // Blog End Wrapper Function
    if( !function_exists('travon_blog_end_wrap_cb') ) {
        function travon_blog_end_wrap_cb() {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // Blog Column Start Wrapper Function
    if( !function_exists('travon_blog_col_start_wrap_cb') ) {
        function travon_blog_col_start_wrap_cb() {
            if( class_exists('ReduxFramework') ) {
                $travon_blog_sidebar = travon_opt('travon_blog_sidebar');
                if( $travon_blog_sidebar == '2' && is_active_sidebar('travon-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7 order-lg-last">';
                } elseif( $travon_blog_sidebar == '3' && is_active_sidebar('travon-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('travon-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }
    // Blog Column End Wrapper Function
    if( !function_exists('travon_blog_col_end_wrap_cb') ) {
        function travon_blog_col_end_wrap_cb() {
            echo '</div>';
        }
    }

    // Blog Sidebar
    if( !function_exists('travon_blog_sidebar_cb') ) {
        function travon_blog_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $travon_blog_sidebar = travon_opt('travon_blog_sidebar');
            } else {
                $travon_blog_sidebar = 2;
                
            }
            if( $travon_blog_sidebar != 1 && is_active_sidebar('travon-blog-sidebar') ) {
                // Sidebar
                get_sidebar();
            }
        }
    }


    if( !function_exists('travon_blog_details_sidebar_cb') ) {
        function travon_blog_details_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $travon_blog_single_sidebar = travon_opt('travon_blog_single_sidebar');
            } else {
                $travon_blog_single_sidebar = 4;
            }
            if( $travon_blog_single_sidebar != 1 ) {
                // Sidebar
                get_sidebar();
            }

        }
    }

    // Blog Pagination Function
    if( !function_exists('travon_blog_pagination_cb') ) {
        function travon_blog_pagination_cb( ) {
            get_template_part('templates/pagination');
        }
    }

    // Blog Content Function
    if( !function_exists('travon_blog_content_cb') ) {
        function travon_blog_content_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $travon_blog_grid = travon_opt('travon_blog_grid');
            } else {
                $travon_blog_grid = '1';
            }

            if( $travon_blog_grid == '1' ) {
                $travon_blog_grid_class = 'col-lg-12';
            } elseif( $travon_blog_grid == '2' ) {
                $travon_blog_grid_class = 'col-sm-6';
            } else {
                $travon_blog_grid_class = 'col-lg-4 col-sm-6';
            }

            echo '<div class="row">';
                if( have_posts() ) {
                    while( have_posts() ) {
                        the_post();
                        echo '<div class="'.esc_attr($travon_blog_grid_class).'">';
                            get_template_part('templates/content',get_post_format());
                        echo '</div>';
                    }
                    wp_reset_postdata();
                } else{
                    get_template_part('templates/content','none');
                }
            echo '</div>';
        }
    }

    // footer content Function
    if( !function_exists('travon_footer_content_cb') ) {
        function travon_footer_content_cb( ) {

            if( class_exists('ReduxFramework') && did_action( 'elementor/loaded' )  ){
                if( is_page() || is_page_template('template-builder.php') ) {
                    $post_id = get_the_ID();

                    // Get the page settings manager
                    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

                    // Get the settings model for current post
                    $page_settings_model = $page_settings_manager->get_model( $post_id );

                    // Retrieve the Footer Style
                    $footer_settings = $page_settings_model->get_settings( 'travon_footer_style' );

                    // Footer Local
                    $footer_local = $page_settings_model->get_settings( 'travon_footer_builder_option' );

                    // Footer Enable Disable
                    $footer_enable_disable = $page_settings_model->get_settings( 'travon_footer_choice' );

                    if( $footer_enable_disable == 'yes' ){
                        if( $footer_settings == 'footer_builder' ) {
                            // local options
                            $travon_local_footer = get_post( $footer_local );
                            echo '<footer>';
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $travon_local_footer->ID );
                            echo '</footer>';
                        } else {
                            // global options
                            $travon_footer_builder_trigger = travon_opt('travon_footer_builder_trigger');
                            if( $travon_footer_builder_trigger == 'footer_builder' ) {
                                echo '<footer>';
                                $travon_global_footer_select = get_post( travon_opt( 'travon_footer_builder_select' ) );
                                $footer_post = get_post( $travon_global_footer_select );
                                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                                echo '</footer>';
                            } else {
                                // wordpress widgets
                                travon_footer_global_option();
                            }
                        }
                    }
                } else {
                    // global options
                    $travon_footer_builder_trigger = travon_opt('travon_footer_builder_trigger');
                    if( $travon_footer_builder_trigger == 'footer_builder' ) {
                        echo '<footer>';
                        $travon_global_footer_select = get_post( travon_opt( 'travon_footer_builder_select' ) );
                        $footer_post = get_post( $travon_global_footer_select );
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                        echo '</footer>';
                    } else {
                        // wordpress widgets
                        travon_footer_global_option();
                    }
                }
            } else {
                echo '<div class="footer-layout1 sticky-footer">';
                    echo '<div class="copyright-wrap">';
                        echo '<div class="container">';
                            echo '<p class="copyright-text text-center">'.sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'Travon.','travon' ),esc_url('#'),__( 'Adivaha', 'travon' ) ).'</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        }
    }

    // blog details wrapper start hook function
    if( !function_exists('travon_blog_details_wrapper_start_cb') ) {
        function travon_blog_details_wrapper_start_cb( ) {
            echo '<section class="ot-blog-wrapper blog-details space-top space-extra-bottom">';
                echo '<div class="container">';
                    
                    echo '<div class="row">';
        }
    }

    // blog details column wrapper start hook function
    if( !function_exists('travon_blog_details_col_start_cb') ) {
        function travon_blog_details_col_start_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $travon_blog_single_sidebar = travon_opt('travon_blog_single_sidebar');
                if( $travon_blog_single_sidebar == '2' && is_active_sidebar('travon-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7 order-last">';
                } elseif( $travon_blog_single_sidebar == '3' && is_active_sidebar('travon-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('travon-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }

    // blog details post meta hook function
    if( !function_exists('travon_blog_post_meta_cb') ) {
        function travon_blog_post_meta_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $travon_display_post_tag   =  travon_opt('travon_display_post_tag');
                $travon_display_post_date      =  travon_opt('travon_display_post_date');
                $travon_display_post_author      =  travon_opt('travon_display_post_author');
                $travon_display_post_comment      =  travon_opt('travon_display_post_comment');
            } else {
                $travon_display_post_tag   = '0';
                $travon_display_post_date      = '1';
                $travon_display_post_author      = '1';
                $travon_display_post_comment      = '1';
            }

            echo '<!-- Blog Meta -->';
                echo '<div class="blog-meta">';
                    if( $travon_display_post_author ){
                        echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'">';

                        echo '<i class="fa-solid fa-user"></i>';
                        echo esc_html( ucwords( get_the_author() ) );
                        echo '</a>';
                    }
                    if( $travon_display_post_date ){
                        echo '<a href="'.esc_url( travon_blog_date_permalink() ).'"><i class="fa-solid fa-calendar-days"></i>';
                            echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                        echo '</a>';
                    }
                    if( $travon_display_post_comment ){
                        if( get_comments_number() > 1 ){
                            $comment_text = __( ' Comments', 'travon' );
                        }else{
                            $comment_text = __( ' Comment', 'travon' );
                        }

                        echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="fa-solid fa-comment"></i>'.esc_html( get_comments_number() ).''.$comment_text.'</a>';
                    }
                    if( $travon_display_post_tag ){
                        $categories = get_the_category();  
                        echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"><i class="fa-solid fa-tag"></i>'.esc_html( $categories[0]->name ).'</a>';
                    }
                echo '</div>';
        }
    }

    // blog details share options hook function
    if( !function_exists('travon_blog_details_share_options_cb') ) {
        function travon_blog_details_share_options_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $travon_post_details_share_options = travon_opt('travon_post_details_share_options');
            } else {
                $travon_post_details_share_options = false;
            }
            if( function_exists( 'travon_social_sharing_buttons' ) && $travon_post_details_share_options ) {
                echo '<div class="col-md-auto text-xl-end">';
                echo '<span class="share-links-title">'.__( 'Share:', 'travon' ).'</span>';
                    echo '<ul class="social-links">';
                        echo travon_social_sharing_buttons();
                    echo '</ul>';
                    echo '<!-- End Social Share -->';
                echo '</div>';
            }
        }
    }

    // Blog Details Post Navigation hook function
    if( !function_exists( 'travon_blog_details_post_navigation_cb' ) ) {
        function travon_blog_details_post_navigation_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $travon_post_details_post_navigation = travon_opt('travon_post_details_post_navigation');
            } else {
                $travon_post_details_post_navigation = true;
            }

            $prevpost = get_previous_post();
            $nextpost = get_next_post();

            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );

            if( $travon_post_details_post_navigation && ! empty( $prevpost ) || !empty( $nextpost ) ) {
                echo '<div class="blog-navigation">';
                    echo '<div>';
                        if( ! empty( $prevpost ) ) {
                            echo '<a href="'.esc_url( get_permalink( $prevpost->ID ) ).'" class="nav-btn prev">';
                            if( class_exists('ReduxFramework') ) {
                                if (has_post_thumbnail( $prevpost->ID )) {
                                    echo get_the_post_thumbnail( $prevpost->ID, 'travon_80X80' );
                                };
                            }
                                echo '<span class="nav-text">'.esc_html__( ' Previous Post', 'travon' ).'</span>';
                            echo '</a>';
                        }
                    echo '</div>';

                    echo '<a href="'.get_permalink( get_option( 'page_for_posts' ) ).'" class="blog-btn"><i class="fa-solid fa-grid"></i></a>';

                    echo '<div>';
                        if( ! empty( $nextpost ) ) {
                            echo '<a href="'.esc_url( get_permalink( $nextpost->ID ) ).'" class="nav-btn next">';
                                if( class_exists('ReduxFramework') ) {
                                    if (has_post_thumbnail($nextpost->ID)) {
                                        echo get_the_post_thumbnail( $nextpost->ID, 'travon_80X80' );
                                    };
                                }
                                echo '<span class="nav-text">'.esc_html__( ' Next Post', 'travon' ).'</span>';
                            echo '</a>';
                        }
                    echo '</div>';
                echo '</div>';
            }
        }
    }
    
    // blog details author bio hook function
    if( !function_exists('travon_blog_details_author_bio_cb') ) {
        function travon_blog_details_author_bio_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $postauthorbox =  travon_opt( 'travon_post_details_author_desc_trigger' );
            } else {
                $postauthorbox = '1';
            }
            if( !empty( get_the_author_meta('description')  ) && $postauthorbox == '1' ) {

                echo '<div class="blog-author">';
                    echo '<div class="auhtor-img">';
                        echo travon_img_tag( array(
                            "url"   => esc_url( get_avatar_url( get_the_author_meta('ID'), array(
                                "size"  => '240'
                                ) ) ),
                            ) );
                    echo '</div>';
                    echo '<div class="media-body">';
                        echo '<h3 class="author-name"><a class="text-inherit" href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'">'.esc_html( ucwords( get_the_author() ) ).'</a></h3>';
                        if( ! empty( get_the_author_meta('description') ) ) {
                            echo '<p class="author-text">';
                                echo esc_html( get_the_author_meta('description') );
                            echo '</p>';
                        }

                        $travon_social_icons = get_user_meta( get_the_author_meta('ID'), '_travon_social_profile_group',true );

                        if( is_array( $travon_social_icons ) && !empty( $travon_social_icons ) ) {
                            echo '<ul class="social-links">';
                            foreach( $travon_social_icons as $singleicon ) {
                                if( ! empty( $singleicon['_travon_social_profile_icon'] ) ) {
                                    echo '<li><a href="'.esc_url( $singleicon['_travon_lawyer_social_profile_link'] ).'"><i class="'.esc_attr( $singleicon['_travon_social_profile_icon'] ).'"></i></a></li>';
                                }
                            }
                            echo '</ul>';
                        }
                    echo '</div>';
                echo '</div>';
            }

        }
    }

    // Blog Details Comments hook function
    if( !function_exists('travon_blog_details_comments_cb') ) {
        function travon_blog_details_comments_cb( ) {
            if ( ! comments_open() ) {
                echo '<div class="blog-comment-area">';
                    echo travon_heading_tag( array(
                        "tag"   => "h3",
                        "text"  => esc_html__( 'Comments are closed', 'travon' ),
                        "class" => "inner-title"
                    ) );
                echo '</div>';
            }

            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    // Blog Details Column end hook function
    if( !function_exists('travon_blog_details_col_end_cb') ) {
        function travon_blog_details_col_end_cb( ) {
            echo '</div>';
        }
    }

    // Blog Details Wrapper end hook function
    if( !function_exists('travon_blog_details_wrapper_end_cb') ) {
        function travon_blog_details_wrapper_end_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page start wrapper hook function
    if( !function_exists('travon_page_start_wrap_cb') ) {
        function travon_page_start_wrap_cb( ) {
            
            if( is_page( 'cart' ) ){
                $section_class = "ot-cart-wrapper space-top space-extra-bottom";
            }elseif( is_page( 'checkout' ) ){
                $section_class = "ot-checkout-wrapper space-top space-extra-bottom";
            }elseif( is_page('wishlist') ){
                $section_class = "wishlist-area space-top space-extra-bottom";
            }else{
                $section_class = "space-top space-extra-bottom";  
            }
            echo '<section class="'.esc_attr( $section_class ).'">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
    }

    // page wrapper end hook function
    if( !function_exists('travon_page_end_wrap_cb') ) {
        function travon_page_end_wrap_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page column wrapper start hook function
    if( !function_exists('travon_page_col_start_wrap_cb') ) {
        function travon_page_col_start_wrap_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $travon_page_sidebar = travon_opt('travon_page_sidebar');
            }else {
                $travon_page_sidebar = '1';
            }
            if( $travon_page_sidebar == '2' && is_active_sidebar('travon-page-sidebar') ) {
                echo '<div class="col-xxl-8 col-lg-7 order-last">';
            } elseif( $travon_page_sidebar == '3' && is_active_sidebar('travon-page-sidebar') ) {
                echo '<div class="col-xxl-8 col-lg-7">';
            } else {
                echo '<div class="col-lg-12">';
            }

        }
    }

    // page column wrapper end hook function
    if( !function_exists('travon_page_col_end_wrap_cb') ) {
        function travon_page_col_end_wrap_cb( ) {
            echo '</div>';
        }
    }

    // page sidebar hook function
    if( !function_exists('travon_page_sidebar_cb') ) {
        function travon_page_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $travon_page_sidebar = travon_opt('travon_page_sidebar');
            }else {
                $travon_page_sidebar = '1';
            }

            if( class_exists('ReduxFramework') ) {
                $travon_page_layoutopt = travon_opt('travon_page_layoutopt');
            }else {
                $travon_page_layoutopt = '3';
            }

            if( $travon_page_layoutopt == '1' && $travon_page_sidebar != 1 ) {
                get_sidebar('page');
            } elseif( $travon_page_layoutopt == '2' && $travon_page_sidebar != 1 ) {
                get_sidebar();
            }
        }
    }

    // page content hook function
    if( !function_exists('travon_page_content_cb') ) {
        function travon_page_content_cb( ) {
            if(  class_exists('woocommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_page('wishlist') || is_account_page() )  ) {
                echo '<div class="woocommerce--content">';
            } else {
                echo '<div class="page--content clearfix">';
            }

                the_content();

                // Link Pages
                travon_link_pages();

            echo '</div>';
            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        }
    }

    if( !function_exists('travon_blog_post_thumb_cb') ) {
        function travon_blog_post_thumb_cb( ) {
            if( get_post_format() ) {
                $format = get_post_format();
            }else{
                $format = 'standard';
            }

            $travon_post_slider_thumbnail = travon_meta( 'post_format_slider' );

            if( !empty( $travon_post_slider_thumbnail ) ){
                echo '<div class="blog-img ot-blog-carousel">';
                    foreach( $travon_post_slider_thumbnail as $single_image ){
                        echo travon_img_tag( array(
                            'url'   => esc_url( $single_image )
                        ) );
                    }
                echo '</div>';
            }elseif( has_post_thumbnail() && $format == 'standard' ) {
                echo '<!-- Post Thumbnail -->';
                echo '<div class="blog-img">';
                    if( ! is_single() ){
                        echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                    }

                    the_post_thumbnail('travon_860X500');

                    if( ! is_single() ){
                        echo '</a>';
                    }
                echo '</div>';
                echo '<!-- End Post Thumbnail -->';
            }elseif( $format == 'video' ){
                if( has_post_thumbnail() && ! empty ( travon_meta( 'post_format_video' ) ) ){
                    echo '<div class="blog-img">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            the_post_thumbnail('travon_860X500');
                        if( ! is_single() ){
                            echo '</a>';
                        }
                        echo '<a href="'.esc_url( travon_meta( 'post_format_video' ) ).'" class="popup-video play-btn style3">';
                            echo '<i class="fas fa-play"></i>';
                        echo '</a>';
                    echo '</div>';
                }elseif( ! has_post_thumbnail() && ! is_single() ){
                    echo '<div class="blog-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            echo travon_embedded_media( array( 'video', 'iframe' ) );
                        if( ! is_single() ){
                            echo '</a>';
                        }
                    echo '</div>';
                }
            }elseif( $format == 'audio' ){
                $travon_audio = travon_meta( 'post_format_audio' );
                if( ! empty( $travon_audio ) ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $travon_audio );
                    echo '</div>';
                }elseif( ! is_single() ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $travon_audio );
                    echo '</div>';
                }
            }

        }
    }

    if( !function_exists('travon_blog_post_content_cb') ) {
        function travon_blog_post_content_cb( ) {
            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );
            if( class_exists( 'ReduxFramework' ) ) {
                $travon_excerpt_length          = travon_opt( 'travon_blog_postExcerpt' );
                $travon_display_post_category   = travon_opt( 'travon_display_post_category' );
            } else {
                $travon_excerpt_length          = '48';
                $travon_display_post_category   = '1';
            }

            if( class_exists( 'ReduxFramework' ) ) {
                $travon_blog_admin = travon_opt( 'travon_blog_post_author' );
                $travon_blog_readmore_setting_val = travon_opt('travon_blog_readmore_setting');
                if( $travon_blog_readmore_setting_val == 'custom' ) {
                    $travon_blog_readmore_setting = travon_opt('travon_blog_custom_readmore');
                } else {
                    $travon_blog_readmore_setting = __( 'Read More', 'travon' );
                }
            } else {
                $travon_blog_readmore_setting = __( 'Read More', 'travon' );
                $travon_blog_admin = true;
            }
            echo '<!-- blog-content -->';

                do_action( 'travon_blog_post_thumb' );
                
                echo '<div class="blog-content">';

                    // Blog Post Meta
                    do_action( 'travon_blog_post_meta' );

                    echo '<!-- Post Title -->';
                    echo '<h2 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.wp_kses( get_the_title( ), $allowhtml ).'</a></h2>';
                    echo '<!-- End Post Title -->';

                    echo '<!-- Post Summary -->';
                        echo travon_paragraph_tag( array(
                            "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $travon_excerpt_length, '' ), $allowhtml ),
                            "class" => 'blog-text',
                        ) );

                        if( !empty( $travon_blog_readmore_setting ) ){
                            echo '<!-- Button -->';
                                echo '<a href="'.esc_url( get_permalink() ).'" class="ot-btn">'.esc_html( $travon_blog_readmore_setting ).'<i class="fas fa-arrow-right ms-2"></i></a>';
                            echo '<!-- End Button -->';
                        }
                    echo '<!-- End Post Summary -->';
                echo '</div>';
            echo '<!-- End Post Content -->';
        }
    }
