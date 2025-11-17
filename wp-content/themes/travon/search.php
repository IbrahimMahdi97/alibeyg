<?php
/**
 * @Packge     : Travon
 * @Version    : 1.0
 * @Author     : Adivaha
 * @Author URI : https://www.adivaha.com/
 *
 */

// Block direct access
if ( ! defined('ABSPATH') ) {
    exit;
}
    // Header
    get_header();

    /**
    *
    * Hook for Blog Start Wrapper
    *
    * Hook travon_blog_start_wrap
    *
    * @Hooked travon_blog_start_wrap_cb 10
    *
    */
    do_action( 'travon_blog_start_wrap' );

    /**
    *
    * Hook for Blog Column Start Wrapper
    *
    * Hook travon_blog_col_start_wrap
    *
    * @Hooked travon_blog_col_start_wrap_cb 10
    *
    */
    do_action( 'travon_blog_col_start_wrap' );

    echo '<div class="row search-active">';
        if( have_posts() ) {
            while( have_posts() ) {
                the_post();
                if ( is_active_sidebar( 'travon-blog-sidebar' ) ) {
                    $column_class = 'col-md-6';
                }else{
                    $column_class = 'col-md-4';
                }
                echo '<div class="'.esc_attr( $column_class ).' filter-item">';
                    echo '<div class="ot-search">';
                        if( has_post_thumbnail() ){
                            echo '<div class="search-grid-img image-scale-hover">';
                                echo '<a href="'.esc_url( get_the_permalink() ).'">';
                                    the_post_thumbnail( );
                                echo '</a>';
                            echo '</div>';
                        }
                        echo '<div class="search-grid-content">';

                            if( get_the_title() ){
                                echo '<!-- Post Title -->';
                                echo '<h4 class="search-grid-title fw-semibold"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title( ) ).'</a></h4>';
                                echo '<!-- End Post Title -->';
                            }

                            echo '<div class="search-grid-meta">';
                                echo '<span><a href="'.esc_url( travon_blog_date_permalink() ).'">';
                                    echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                                echo '</a></span>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            wp_reset_postdata();
        } else{
            get_template_part('templates/content','none');
        }
    echo '</div>';

    /**
    *
    * Hook for Blog Pagination
    *
    * Hook travon_blog_pagination
    *
    * @Hooked travon_blog_pagination_cb 10
    *
    */
    do_action( 'travon_blog_pagination' );

    /**
    *
    * Hook for Blog Column End Wrapper
    *
    * Hook travon_blog_col_end_wrap
    *
    * @Hooked travon_blog_col_end_wrap_cb 10
    *
    */
    do_action( 'travon_blog_col_end_wrap' );

    /**
    *
    * Hook for Blog Sidebar
    *
    * Hook travon_blog_sidebar
    *
    * @Hooked travon_blog_sidebar_cb 10
    *
    */
    do_action( 'travon_blog_sidebar' );

    /**
    *
    * Hook for Blog End Wrapper
    *
    * Hook travon_blog_end_wrap
    *
    * @Hooked travon_blog_end_wrap_cb 10
    *
    */
    do_action( 'travon_blog_end_wrap' );

    //footer
    get_footer();