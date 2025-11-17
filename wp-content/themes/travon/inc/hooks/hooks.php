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

	/**
	* Hook for preloader
	*/
	add_action( 'travon_preloader_wrap', 'travon_preloader_wrap_cb', 10 );

	/**
	* Hook for offcanvas cart
	*/
	add_action( 'travon_main_wrapper_start', 'travon_main_wrapper_start_cb', 10 );

	/**
	* Hook for Header
	*/
	add_action( 'travon_header', 'travon_header_cb', 10 );
	
	/**
	* Hook for Blog Start Wrapper
	*/
	add_action( 'travon_blog_start_wrap', 'travon_blog_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column Start Wrapper
	*/
    add_action( 'travon_blog_col_start_wrap', 'travon_blog_col_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'travon_blog_col_end_wrap', 'travon_blog_col_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'travon_blog_end_wrap', 'travon_blog_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Pagination
	*/
    add_action( 'travon_blog_pagination', 'travon_blog_pagination_cb', 10 );
    
    /**
	* Hook for Blog Content
	*/
	add_action( 'travon_blog_content', 'travon_blog_content_cb', 10 );
    
    /**
	* Hook for Blog Sidebar
	*/
	add_action( 'travon_blog_sidebar', 'travon_blog_sidebar_cb', 10 );
    
    /**
	* Hook for Blog Details Sidebar
	*/
	add_action( 'travon_blog_details_sidebar', 'travon_blog_details_sidebar_cb', 10 );

	/**
	* Hook for Blog Details Wrapper Start
	*/
	add_action( 'travon_blog_details_wrapper_start', 'travon_blog_details_wrapper_start_cb', 10 );

	/**
	* Hook for Blog Details Post Meta
	*/
	add_action( 'travon_blog_post_meta', 'travon_blog_post_meta_cb', 10 );

	/**
	* Hook for Blog Details Post Share Options
	*/
	add_action( 'travon_blog_details_share_options', 'travon_blog_details_share_options_cb', 10 );

	/**
	* Hook for Blog Details Post Author Bio
	*/
	add_action( 'travon_blog_details_author_bio', 'travon_blog_details_author_bio_cb', 10 );

	/**
	* Hook for Blog Details Tags and Categories
	*/
	add_action( 'travon_blog_details_tags_and_categories', 'travon_blog_details_tags_and_categories_cb', 10 );

	/**
	* Hook for Blog Details Related Post Navigation
	*/
	add_action( 'travon_blog_details_post_navigation', 'travon_blog_details_post_navigation_cb', 10 );

	/**
	* Hook for Blog Deatils Comments
	*/
	add_action( 'travon_blog_details_comments', 'travon_blog_details_comments_cb', 10 );

	/**
	* Hook for Blog Deatils Column Start
	*/
	add_action('travon_blog_details_col_start','travon_blog_details_col_start_cb');

	/**
	* Hook for Blog Deatils Column End
	*/
	add_action('travon_blog_details_col_end','travon_blog_details_col_end_cb');

	/**
	* Hook for Blog Deatils Wrapper End
	*/
	add_action('travon_blog_details_wrapper_end','travon_blog_details_wrapper_end_cb');
	
	/**
	* Hook for Blog Post Thumbnail
	*/
	add_action('travon_blog_post_thumb','travon_blog_post_thumb_cb');
    
	/**
	* Hook for Blog Post Content
	*/
	add_action('travon_blog_post_content','travon_blog_post_content_cb');
	
    
	/**
	* Hook for Blog Post Excerpt And Read More Button
	*/
	add_action('travon_blog_postexcerpt_read_content','travon_blog_postexcerpt_read_content_cb');
	
	/**
	* Hook for footer content
	*/
	add_action( 'travon_footer_content', 'travon_footer_content_cb', 10 );
	
	/**
	* Hook for main wrapper end
	*/
	add_action( 'travon_main_wrapper_end', 'travon_main_wrapper_end_cb', 10 );
	
	/**
	* Hook for Back to Top Button
	*/
	add_action( 'travon_back_to_top', 'travon_back_to_top_cb', 10 );

	/**
	* Hook for Page Start Wrapper
	*/
	add_action( 'travon_page_start_wrap', 'travon_page_start_wrap_cb', 10 );

	/**
	* Hook for Page End Wrapper
	*/
	add_action( 'travon_page_end_wrap', 'travon_page_end_wrap_cb', 10 );

	/**
	* Hook for Page Column Start Wrapper
	*/
	add_action( 'travon_page_col_start_wrap', 'travon_page_col_start_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'travon_page_col_end_wrap', 'travon_page_col_end_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'travon_page_sidebar', 'travon_page_sidebar_cb', 10 );

	/**
	* Hook for Page Content
	*/
	add_action( 'travon_page_content', 'travon_page_content_cb', 10 );