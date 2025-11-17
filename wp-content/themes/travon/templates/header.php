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

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $travon_post_id = get_the_ID();

            // Get the page settings manager
            $travon_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $travon_page_settings_model = $travon_page_settings_manager->get_model( $travon_post_id );

            // Retrieve the color we added before
            $travon_header_style = $travon_page_settings_model->get_settings( 'travon_header_style' );
            $travon_header_builder_option = $travon_page_settings_model->get_settings( 'travon_header_builder_option' );

            if( $travon_header_style == 'header_builder'  ) {

                if( !empty( $travon_header_builder_option ) ) {
                    $travonheader = get_post( $travon_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $travonheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $travon_header_builder_trigger = travon_opt('travon_header_options');
                if( $travon_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $travon_global_header_select = get_post( travon_opt( 'travon_header_select_options' ) );
                    $header_post = get_post( $travon_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    travon_global_header_option();
                }
            }
        } else {
            $travon_header_options = travon_opt('travon_header_options');
            if( $travon_header_options == '1' ) {
                travon_global_header_option();
            } else {
                $travon_header_select_options = travon_opt('travon_header_select_options');
                $travonheader = get_post( $travon_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $travonheader->ID );
                echo '</header>';
            }
        }
    } else {
        travon_global_header_option();
    }