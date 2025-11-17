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

    /**
    * 
    * Hook for Blog Content
    *
    * Hook travon_blog_content
    *
    * @Hooked travon_blog_content_cb 10
    *  
    */
    do_action( 'travon_blog_content' );

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