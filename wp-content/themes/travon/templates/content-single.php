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

    travon_setPostViews( get_the_ID() );

    ?>
    <div <?php post_class(); ?>>
    <?php
        if( class_exists('ReduxFramework') ) {
            $travon_post_details_title_position = travon_opt('travon_post_details_title_position');
        } else {
            $travon_post_details_title_position = 'header';
        }

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
        // Blog Post Thumbnail
        do_action( 'travon_blog_post_thumb' );

        if( $travon_post_details_title_position != 'header' ) {
            echo '<h2 class="blog-title h3">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';
        }
        
        echo '<div class="blog-content">';
            // Blog Post Meta
            do_action( 'travon_blog_post_meta' );

            if( get_the_content() ){

                the_content();
                // Link Pages
                travon_link_pages();
            }
        echo '</div>';

        if( class_exists('ReduxFramework') ) {
            $travon_post_details_share_options = travon_opt('travon_post_details_share_options');
        } else {
            $travon_post_details_share_options = false;
        }
        
        $travon_post_tag = get_the_tags();
        
        if( ! empty( $travon_post_tag ) || ( function_exists( 'travon_social_sharing_buttons' ) || $travon_post_details_share_options ) ){
            echo '<div class="share-links clearfix">';
                echo '<div class="row justify-content-between">';
                    if( is_array( $travon_post_tag ) && ! empty( $travon_post_tag ) ){
                        if( count( $travon_post_tag ) > 1 ){
                            $tag_text = __( 'Tags:', 'travon' );
                        }else{
                            $tag_text = __( 'Tag:', 'travon' );
                        }
                        echo '<div class="col-sm-auto">';
                        echo '<span class="share-links-title">'.$tag_text.'</span>';

                            echo '<div class="tagcloud">';
                                foreach( $travon_post_tag as $tags ){
                                    echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                }
                            echo '</div>';
                        echo '</div>';
                    }

                    /**
                    *
                    * Hook for Blog Details Share Options
                    *
                    * Hook travon_blog_details_share_options
                    *
                    * @Hooked travon_blog_details_share_options_cb 10
                    *
                    */
                    do_action( 'travon_blog_details_share_options' );
                echo '</div>';
            echo '</div>';
        }

    echo '</div>'; 

        /**
        *
        * Hook for Blog Details Author Bio
        *
        * Hook travon_blog_details_author_bio
        *
        * @Hooked travon_blog_details_author_bio_cb 10
        *
        */
        do_action( 'travon_blog_details_author_bio' );
    
    do_action( 'travon_blog_details_comments' );