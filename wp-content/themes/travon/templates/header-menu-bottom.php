<?php
/**
 * @Packge     : Travon
 * @Version    : 1.0
 * @Author     : Adivaha
 * @Author URI : https://www.adivaha.com/
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( travon_meta('page_breadcrumb_area') ) ) {
            $travon_page_breadcrumb_area  = travon_meta('page_breadcrumb_area');
        } else {
            $travon_page_breadcrumb_area = '1';
        }
    }else{
        $travon_page_breadcrumb_area = '1';
    }
    
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );
    
    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $travon_page_breadcrumb_area == '1' ) {
            echo '<!-- Page title 2 -->';
            echo '<div class="breadcumb-wrapper">';
                echo '<div class="container z-index-common">';
                    echo '<div class="breadcumb-content">';
                        if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                            if( !empty( travon_meta('page_breadcrumb_settings') ) ) {
                                if( travon_meta('page_breadcrumb_settings') == 'page' ) {
                                    $travon_page_title_switcher = travon_meta('page_title');
                                } else {
                                    $travon_page_title_switcher = travon_opt('travon_page_title_switcher');
                                }
                            } else {
                                $travon_page_title_switcher = '1';
                            }
                        } else {
                            $travon_page_title_switcher = '1';
                        }

                        if( $travon_page_title_switcher ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $travon_page_title_tag    = travon_opt('travon_page_title_tag');
                            }else{
                                $travon_page_title_tag    = 'h1';
                            }

                            if( defined( 'CMB2_LOADED' )  ){
                                if( !empty( travon_meta('page_title_settings') ) ) {
                                    $travon_custom_title = travon_meta('page_title_settings');
                                } else {
                                    $travon_custom_title = 'default';
                                }
                            }else{
                                $travon_custom_title = 'default';
                            }

                            if( $travon_custom_title == 'default' ) {
                                echo travon_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $travon_page_title_tag ),
                                        "text"  => esc_html( get_the_title( ) ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                echo travon_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $travon_page_title_tag ),
                                        "text"  => esc_html( travon_meta('custom_page_title') ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }

                        }
                        if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                            if( travon_meta('page_breadcrumb_settings') == 'page' ) {
                                $travon_breadcrumb_switcher = travon_meta('page_breadcrumb_trigger');
                            } else {
                                $travon_breadcrumb_switcher = travon_opt('travon_enable_breadcrumb');
                            }

                        } else {
                            $travon_breadcrumb_switcher = '1';
                        }

                        if( $travon_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                            travon_breadcrumbs(
                                array(
                                    'breadcrumbs_classes' => 'nav',
                                )
                            );
                        }
                    echo '</div>';
                   
                echo '</div>';
                if( class_exists( 'ReduxFramework' )  ){
                    $breadcrumb_2nd_image = travon_opt('travon_allHeader_bg_2', 'url' );
                    if(!empty($breadcrumb_2nd_image)){
                    echo '<div class="breadcumb-shape">';
                        echo '<img src="'.esc_url($breadcrumb_2nd_image).'" alt="'.esc_attr__('shape', 'travon').'">';
                    echo '</div>';
                    }
                }
            echo '</div>';
            echo '<!-- End of Page title -->';
            
        }
    } else {
        if( class_exists('woocommerce') && is_shop() ) {
            $woo_class = 'custom-woo-class';
        }elseif(is_404()){
            $woo_class = 'custom-fof-class';
        }elseif(is_search()){
            $woo_class = 'custom-search-class';
        }else{
            $woo_class = '';
        }
        echo '<!-- Page title 3 -->';
        echo '<div class="breadcumb-wrapper '. esc_attr($woo_class).'">';
            echo '<div class="container z-index-common">';
                echo '<div class="breadcumb-content">';
                    if( class_exists( 'ReduxFramework' )  ){
                        $travon_page_title_switcher  = travon_opt('travon_page_title_switcher');
                    }else{
                        $travon_page_title_switcher = '1';
                    }

                    if( $travon_page_title_switcher ){
                        if( class_exists( 'ReduxFramework' ) ){
                            $travon_page_title_tag    = travon_opt('travon_page_title_tag');
                        }else{
                            $travon_page_title_tag    = 'h1';
                        }
                        if( class_exists('woocommerce') && is_shop() ) {
                            echo travon_heading_tag(
                                array(
                                    "tag"   => esc_attr( $travon_page_title_tag ),
                                    "text"  => wp_kses( woocommerce_page_title( false ), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_archive() ){
                            echo travon_heading_tag(
                                array(
                                    "tag"   => esc_attr( $travon_page_title_tag ),
                                    "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_home() ){
                            $travon_blog_page_title_setting = travon_opt('travon_blog_page_title_setting');
                            $travon_blog_page_title_switcher = travon_opt('travon_blog_page_title_switcher');
                            $travon_blog_page_custom_title = travon_opt('travon_blog_page_custom_title');
                            if( class_exists('ReduxFramework') ){
                                if( $travon_blog_page_title_switcher ){
                                    echo travon_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $travon_page_title_tag ),
                                            "text"  => !empty( $travon_blog_page_custom_title ) && $travon_blog_page_title_setting == 'custom' ? esc_html( $travon_blog_page_custom_title) : esc_html__( 'Latest News', 'travon' ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }else{
                                echo travon_heading_tag(
                                    array(
                                        "tag"   => "h1",
                                        "text"  => esc_html__( 'Latest News', 'travon' ),
                                        'class' => 'breadcumb-title',
                                    )
                                );
                            }
                        }elseif( is_search() ){
                            echo travon_heading_tag(
                                array(
                                    "tag"   => esc_attr( $travon_page_title_tag ),
                                    "text"  => esc_html__( 'Search Result', 'travon' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_404() ){
                            echo travon_heading_tag(
                                array(
                                    "tag"   => esc_attr( $travon_page_title_tag ),
                                    "text"  => esc_html__( '404 PAGE', 'travon' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_singular( 'product' ) ){
                            $posttitle_position  = travon_opt('travon_product_details_title_position');
                            $postTitlePos = false;
                            if( class_exists( 'ReduxFramework' ) ){
                                if( $posttitle_position && $posttitle_position != 'header' ){
                                    $postTitlePos = true;
                                }
                            }else{
                                $postTitlePos = false;
                            }

                            if( $postTitlePos != true ){
                                echo travon_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $travon_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $travon_post_details_custom_title  = travon_opt('travon_product_details_custom_title');
                                }else{
                                    $travon_post_details_custom_title = __( 'Shop Details','travon' );
                                }

                                if( !empty( $travon_post_details_custom_title ) ) {
                                    echo travon_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $travon_page_title_tag ),
                                            "text"  => wp_kses( $travon_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }else{
                            $posttitle_position  = travon_opt('travon_post_details_title_position');
                            $postTitlePos = false;
                            if( is_single() ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }
                            if( is_singular( 'product' ) ){
                                $posttitle_position  = travon_opt('travon_product_details_title_position');
                                $postTitlePos = false;
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }

                            if( $postTitlePos != true ){
                                echo travon_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $travon_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $travon_post_details_custom_title  = travon_opt('travon_post_details_custom_title');
                                }else{
                                    $travon_post_details_custom_title = __( 'Blog Details','travon' );
                                }

                                if( !empty( $travon_post_details_custom_title ) ) {
                                    echo travon_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $travon_page_title_tag ),
                                            "text"  => wp_kses( $travon_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }
                    }
                    if( class_exists('ReduxFramework') ) {
                        $travon_breadcrumb_switcher = travon_opt( 'travon_enable_breadcrumb' );
                    } else {
                        $travon_breadcrumb_switcher = '1';
                    }
                    if( $travon_breadcrumb_switcher == '1' ) {
                        travon_breadcrumbs(
                            array(
                                'breadcrumbs_classes' => 'nav',
                            )
                        );
                    }
                echo '</div>';                
            echo '</div>';
            if( class_exists( 'ReduxFramework' )  ){
                $breadcrumb_2nd_image = travon_opt('travon_allHeader_bg_2', 'url' );
                 if(!empty($breadcrumb_2nd_image)){
                echo '<div class="breadcumb-shape">';
                    echo '<img src="'.esc_url($breadcrumb_2nd_image).'" alt="'.esc_attr__('shape', 'travon').'">';
                echo '</div>';
                }
            }
        echo '</div>';
        echo '<!-- End of Page title -->';
    }