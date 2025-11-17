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
    exit;
}

 // theme option callback
function travon_opt( $id = null, $url = null ){
    global $travon_opt;

    if( $id && $url ){

        if( isset( $travon_opt[$id][$url] ) && $travon_opt[$id][$url] ){
            return $travon_opt[$id][$url];
        }
    }else{
        if( isset( $travon_opt[$id] )  && $travon_opt[$id] ){
            return $travon_opt[$id];
        }
    }
}

// theme logo
function travon_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= travon_img_tag( array(
            "class" => "img-fluid",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !travon_opt('travon_text_title') && travon_opt('travon_site_logo', 'url' )  ){

        $siteLogo = '<img class="img-fluid" src="'.esc_url( travon_opt('travon_site_logo', 'url' ) ).'" alt="'.esc_attr__( 'logo', 'travon' ).'" />';
        return '<a class="logo" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';


    }elseif( travon_opt('travon_text_title') ){
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( travon_opt('travon_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}

// custom meta id callback
function travon_meta( $id = '' ){
    $value = get_post_meta( get_the_ID(), '_travon_'.$id, true );
    return $value;
}


// Blog Date Permalink
function travon_blog_date_permalink() {
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link( $year, $month_link, $day);
    return $link;
}

//audio format iframe match
function travon_iframe_match() {
    $audio_content = travon_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function travon_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );


    if( in_array( 'audio' , $type) ){
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }

    }else{
        if( count( $embed ) > 0 ){
            $output = $embed[0];
        }else{
           $output = '';
        }
    }
    return $output;
}


// WP post link pages
function travon_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'travon' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'travon' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


// Data Background image attr
function travon_data_bg_attr( $imgUrl = '' ){
    return 'data-bg-img="'.esc_url( $imgUrl ).'"';
}

// image alt tag
function travon_image_alt( $url = '' ){
    if( $url != '' ){
        // attachment id by url
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );
            return $alt;
        }
    }else{
       return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function travon_get_textareahtml_output( $content ) {
    global $wp_embed;

    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = wpautop( $content );
    $content = do_shortcode( $content );

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function travon_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'travon_pingback_header' );


// Excerpt More
function travon_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'travon_excerpt_more' );


// travon comment template callback
function travon_comment_callback( $comment, $args, $depth ) {
        $add_below = 'comment';
    ?>
    <li <?php comment_class( array('ot-comment-item') ); ?>>
        <div id="comment-<?php comment_ID() ?>" class="ot-post-comment">
            <?php
                if( get_avatar( $comment, 100 )  ) :
            ?>
            <!-- Author Image -->
            <div class="comment-avater">
                <?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, 110 );
                    }
                ?>
            </div>
            <!-- Author Image -->
            <?php
                endif;
            ?>
            <!-- Comment Content -->
            <div class="comment-content">
                <span class="commented-on"> <i class="fas fa-calendar-alt"></i> <?php printf( esc_html__('%1$s', 'travon'), get_comment_date() ); ?> </span>
                <h3 class="name"><?php echo esc_html( ucwords( get_comment_author() ) ); ?></h3>
                <?php comment_text(); ?>
                <div class="reply_and_edit">
                    <?php
                        $reply_text = wp_kses_post( '<i class="fas fa-reply"></i> Reply', 'travon' );

                        $edit_reply_text = wp_kses_post( '<i class="fas fa-pencil-alt"></i> Edit', 'travon' );

                        comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 3, 'max_depth' => 5, 'reply_text' => $reply_text ) ) );
                        edit_comment_link( $edit_reply_text, '  ', '' );
                    ?>  
                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'travon' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Comment Content -->
<?php
}

//body class
add_filter( 'body_class', 'travon_body_class' );
function travon_body_class( $classes ) {
    if( class_exists('ReduxFramework') ) {
        $travon_blog_single_sidebar = travon_opt('travon_blog_single_sidebar');
        if( ($travon_blog_single_sidebar != '2' && $travon_blog_single_sidebar != '3' ) || ! is_active_sidebar('travon-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
        $new_class = is_page() ? travon_meta('custom_body_class') : null;

        if ( $new_class ) {
            $classes[] = $new_class;
        }
    } else {
        if( !is_active_sidebar('travon-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
    }
    return $classes;
}


function travon_footer_global_option(){
    // Travon Widget Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $travon_cta_enable = travon_opt( 'travon_cta_enable' );
        $travon_footer_widget_enable = travon_opt( 'travon_footerwidget_enable' );
        $travon_footer_bottom_active = travon_opt( 'travon_disable_footer_bottom' );
        $travon_cta_heading_enable = travon_opt( 'travon_cta_heading_enable' );
        $travon_cta_title_enable = travon_opt( 'travon_cta_title_enable' );
    }else{
        $travon_cta_enable = '';
        $travon_footer_widget_enable = '';
        $travon_footer_bottom_active = '';
        $travon_cta_title_enable = '';
    }
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'i'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array(),
            'class'     => array(),
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
    );
    if($travon_cta_enable == 1){
        echo '<section class=" " data-pos-for=".footer-wrapper" data-sec-pos="bottom-half">';
            echo '<div class="container">';
                echo '<div class="newsletter-wrap" data-bg-src="'.TRAVON_DIR_ASSIST_URI.'img/subscribe_bg_1.svg">';
                    echo '<h2 class="sec-title text-white mb-2">'.esc_html($travon_cta_title_enable).'</h2>';
                    echo '<p class="text-white fs-md mb-4">'.esc_html($travon_cta_heading_enable).'</p>';
                    echo '<form class="newsletter-form">';
                        echo '<div class="form-group">';
                            echo '<input class="form-control" type="email" placeholder="'.esc_attr('Email Address').'" required="">';
                            echo '<i class="fal fa-envelope"></i>';
                        echo '</div>';
                        echo '<button type="submit" class="ot-btn">'.esc_html__('Subscribe', 'travon').'</button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</section>';
    }
    
    echo '<footer class="footer-wrapper footer-layout1">';
        if( $travon_footer_widget_enable == '1' ){
            if( ( is_active_sidebar( 'travon-footer-1' ) || is_active_sidebar( 'travon-footer-2' ) || is_active_sidebar( 'travon-footer-3' ) || is_active_sidebar( 'travon-footer-4' ) )) {
                echo '<div class="widget-area">';
                    echo '<div class="container">';
                        echo '<div class="row justify-content-between">';
                        if( is_active_sidebar( 'travon-footer-1' )){
                            dynamic_sidebar( 'travon-footer-1' ); 
                        }
                        if( is_active_sidebar( 'travon-footer-2' )){
                            dynamic_sidebar( 'travon-footer-2' ); 
                        }
                        if( is_active_sidebar( 'travon-footer-3' )){
                            dynamic_sidebar( 'travon-footer-3' ); 
                        }
                        if( is_active_sidebar( 'travon-footer-4' )){
                            dynamic_sidebar( 'travon-footer-4' ); 
                        }  
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        }
        if( $travon_footer_bottom_active == '1' ){
            echo '<div class="copyright-wrap style2">';
                echo '<div class="container">';
                    echo '<div class="row justify-content-between align-items-center">';

                        if( has_nav_menu( 'footer-menu' ) ){
                            echo '<div class="col-lg-6">';
                        }else{
                            echo '<div class="col-lg-12 text-center">';
                        }
                            echo '<p class="copyright-text">'.wp_kses( travon_opt( 'travon_copyright_text' ), $allowhtml ).'</p>';
                        echo '</div>';
                        if( has_nav_menu( 'footer-menu' ) ){
                            echo '<div class="col-lg-6 text-end d-none d-lg-block">';
                                echo '<div class="footer-links">';
                                    wp_nav_menu( array(
                                        'theme_location'  => 'footer-menu',
                                    ) );
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    echo '</footer>';
}

function travon_social_icon(){
    $travon_social_icon = travon_opt( 'travon_social_links' );
    if( ! empty( $travon_social_icon ) && isset( $travon_social_icon ) ){
        foreach( $travon_social_icon as $social_icon ){
            if( ! empty( $social_icon['title'] ) ){
                echo '<a href="'.esc_url( $social_icon['url'] ).'">'.wp_kses_post( $social_icon['title'] ).'</a> ';
            }
        }
    }
}

// global header
function travon_global_header_option() {
    if( class_exists( 'ReduxFramework' ) ){
        // Travon Widget Enable Disable
        $travon_header_btn_text = travon_opt('travon_header_btn_text');
        $travon_btn_url = travon_opt('travon_btn_url');
        $travon_header_search_switcher = travon_opt( 'travon_header_search_switcher' );
        $travon_header_offcanvas_switcher = travon_opt( 'travon_header_offcanvas_switcher' );

        echo travon_search_box();
        echo travon_mobile_menu();
        echo '<header class="ot-header header-layout1">';
            travon_header_topbar();

            echo '<div class="sticky-wrapper">';
                echo '<!-- Main Menu Area -->';
                echo '<div class="menu-area">';
                    echo '<div class="container">';
                        echo '<div class="row align-items-center justify-content-between">';
                            echo '<div class="col-auto">';
                                echo '<div class="header-logo">';
                                    echo travon_theme_logo();
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="col-auto">';
                                if( has_nav_menu( 'primary-menu' ) ){
                                    echo '<nav class="main-menu d-none d-lg-inline-block">';
                                        wp_nav_menu( array(
                                            "theme_location"    => 'primary-menu',
                                            "container"         => '',
                                            "menu_class"        => ''
                                        ) );
                                    echo '</nav>';
                                }
                                echo '<button type="button" class="ot-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
                            echo '</div>';
                            echo '<div class="col-auto d-none d-xl-block">';
                                echo '<div class="header-button">';
                                    if($travon_header_search_switcher == 1){
                                        echo '<button type="button" class="icon-btn searchBoxToggler"><i class="fa-regular fa-magnifying-glass"></i></button>';
                                    }
                                    
                                    if($travon_header_offcanvas_switcher == 1){
                                        echo '<a href="#" class="icon-btn sideMenuToggler"><i class="fa-regular fa-bars"></i></a>';
                                    }
                                    if(!empty($travon_header_btn_text)){
                                        echo '<a href="'.esc_url($travon_btn_url).'" class="ot-btn ml-25">'.esc_html($travon_header_btn_text).'</a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="logo-bg">';
                    echo '</div>';
                echo '</div>';
            echo '</div> ';   
        echo '</header>';

        echo '<div class="sidemenu-wrapper d-none d-lg-block ">';
            echo '<div class="sidemenu-content">';
                echo '<button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>';
                if(is_active_sidebar('travon-offcanvas-sidebar')){
                    dynamic_sidebar( 'travon-offcanvas-sidebar' );
                }
            echo '</div>';
        echo '</div>';
    }else{
        travon_global_header();
    }
}





// travon woocommerce breadcrumb
function travon_woo_breadcrumb( $args ) {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<ul class="breadcumb-menu">',
        'wrap_after'  => '</ul>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => _x( 'Home', 'breadcrumb', 'travon' ),
    );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'travon_woo_breadcrumb' );

function travon_custom_search_form( $class ) {
    echo '<!-- Search Form -->';

    echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'" class="'.esc_attr( $class ).'">';
        echo '<label class="searchIcon">';
            echo travon_img_tag( array(
                "url"   => esc_url( get_theme_file_uri( '/assets/img/search-2.svg' ) ),
                "class" => "svg"
            ) );
            echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'travon').'">';
        echo '</label>';
    echo '</form>';
    echo '<!-- End Search Form -->';
}



//Fire the wp_body_open action.
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

//Remove Tag-Clouds inline style
add_filter( 'wp_generate_tag_cloud', 'travon_remove_tagcloud_inline_style',10,1 );
function travon_remove_tagcloud_inline_style( $input ){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input );
}

function travon_setPostViews( $postID ) {
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    }else{
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function travon_getPostViews( $postID ){
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return __( '0', 'travon' );
    }
    return $count;
}


/* This code filters the Categories archive widget to include the post count inside the link */
add_filter( 'wp_list_categories', 'travon_cat_count_span' );
function travon_cat_count_span( $links ) {
    $links = str_replace('</a> (', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'travon_archive_count_span' );
function travon_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}
//header search box
if(! function_exists('travon_search_box')){
    function travon_search_box(){
        echo '<div class="popup-search-box d-none d-lg-block">';
            echo '<button class="searchClose"><i class="fal fa-times"></i></button>';
            echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'">';
                echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'travon').'">';
                echo '<button type="submit"><i class="fal fa-search"></i></button>';
            echo '</form>';
        echo '</div>';
    }
}
//header mobile menu
if(! function_exists('travon_mobile_menu')){
    function travon_mobile_menu(){
        echo '<!--==========Mobile Menu============= -->';
        echo '<div class="ot-menu-wrapper">';
            echo '<div class="ot-menu-area text-center">';
                echo '<button class="ot-menu-toggle"><i class="fal fa-times"></i></button>';
                echo '<div class="mobile-logo">';
                    echo travon_theme_logo();
                echo '</div>';
                echo '<div class="ot-mobile-menu">';
                    if( has_nav_menu( 'primary-menu' ) ) {
                        echo '<div class="ot-mobile-menu">';
                            wp_nav_menu( array(
                                "theme_location"    => 'primary-menu',
                                "container"         => '',
                                "menu_class"        => ''
                            ) );
                        echo '</div>';                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}

//Offcanvas box
if(! function_exists('travon_offcanvas_box')){
     function travon_offcanvas_box(){
        echo '<div class="sidemenu-wrapper d-none d-lg-block ">';
            echo '<div class="sidemenu-content">';
                echo '<button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>';
                    if(is_active_sidebar('travon-offcanvas-sidebar')){
                        dynamic_sidebar( 'travon-offcanvas-sidebar' );
                    }else{
                        echo '<h4 class="text-white">No Widget Added </h4>';
                        echo '<p>Please add some widget in Offcanvs Sidebar</p>';
                    }
            echo '</div>';
        echo '</div>';
    }
}


// Travon Default Header for unit test
if( ! function_exists( 'travon_global_header' ) ){
    function travon_global_header(){
        echo travon_search_box();
        echo travon_mobile_menu();
        echo '<!--======== Header ========-->';
        echo '<header class="ot-header header-layout1 unittest-header">';
           echo ' <div class="sticky-wrapper">';
                echo '<div class="sticky-active">';
                    echo '<div class="menu-area">';
                        echo '<div class="container">';
                            echo '<div class="row gx-20 align-items-center justify-content-between">';
                                echo '<div class="col-auto">';
                                    echo '<div class="header-logo">';
                                        echo travon_theme_logo();
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="col-auto">';
                                    if( has_nav_menu( 'primary-menu' ) ) {
                                        echo '<nav class="main-menu d-none d-lg-inline-block">';
                                            wp_nav_menu( array(
                                                "theme_location"    => 'primary-menu',
                                                "container"         => '',
                                                "menu_class"        => ''
                                            ) );
                                        echo '</nav>';
                                    }                                    
                                    echo '</nav>';
                                    echo '<button type="button" class="ot-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
                                echo '</div>';
                                echo '<div class="col-auto d-none d-lg-block">';
                                    echo '<div class="header-button">';
                                        echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</header>';
    }
}

if( ! function_exists( 'travon_header_topbar' ) ){
    function travon_header_topbar(){
        
        $travon_show_header_topbar      = travon_opt( 'travon_header_topbar_switcher' );
        $travon_show_social_icon        = travon_opt( 'travon_header_topbar_social_icon_switcher' );
        $travon_menu_topbar_phone      = travon_opt( 'travon_menu_topbar_phone' );          
        $travon_menu_topbar_email       = travon_opt( 'travon_menu_topbar_email' );
        $travon_menu_topbar_location       = travon_opt( 'travon_menu_topbar_location' );
        $travon_menu_topbar_btn_text       = travon_opt( 'travon_menu_topbar_btn_text' );
        $travon_menu_topbar_btn_url       = travon_opt( 'travon_menu_topbar_btn_url' );

        $phone      = $travon_menu_topbar_phone;
        $email      = $travon_menu_topbar_email;

        $replace        = array(' ','-',' - ');
        $with           = array('','','');

        $phoneurl       = str_replace( $replace, $with, $phone );
        $eamilurl       = str_replace( $replace, $with, $email );

        if( $travon_show_header_topbar ){
            $allowhtml = array(
                'a'    => array(
                    'href' => array(),
                    'class' => array()
                ),
                'u'    => array(
                    'class' => array()
                ),
                'span' => array(
                    'class' => array()
                ),
                'i'    => array(
                    'class' => array()
                )
            );
            echo '<!--header-top-wrapper start-->';

            echo '<div class="header-top">';
                echo '<div class="container">';
                    echo '<div class="row justify-content-center justify-content-lg-between align-items-center">';
                        echo '<div class="col-auto d-none d-lg-block">';
                            echo '<div class="header-links">';
                                echo '<ul>';
                                    if(!empty($phone )){
                                        echo '<li><i class="fal fa-phone"></i><a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html($phone).'</a></li>';
                                    }
                                    if(!empty($email )){
                                        echo '<li class="d-none d-xl-inline-block"><i class="fal fa-envelope"></i><a href="'.esc_attr( 'mailto:'.$email ).'">'.esc_html($email).'</a></li>';
                                    }
                                    if(!empty($travon_menu_topbar_location )){
                                        echo '<li><i class="fal fa-location-dot"></i>'.esc_html($travon_menu_topbar_location).'</li>';
                                    }
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-auto">';
                            echo '<div class="header-links">';
                                echo '<ul>';
                                    if(!empty($travon_menu_topbar_btn_text)){
                                        echo '<li class="d-none d-lg-inline-block">';
                                            echo '<i class="far fa-user"></i><a href="'.esc_url($travon_menu_topbar_btn_url).'">'.esc_html($travon_menu_topbar_btn_text).'</a>';
                                        echo '</li>';
                                    }
                                    if( $travon_show_social_icon ){
                                        echo '<li>';
                                            echo '<div class="header-social">';
                                                echo '<span class="social-title">'.esc_html__('Follow Us:', 'travon').'</span>';
                                                travon_social_icon();
                                            echo '</div>';
                                        echo '</li>';
                                    }
                                echo '</ul>';
                            echo '</div>';

                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
}

// Add Extra Class On Comment Reply Button
function travon_custom_comment_reply_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'travon_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function travon_custom_edit_comment_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'travon_custom_edit_comment_link', 99);


function travon_post_classes( $classes, $class, $post_id ) {
    if ( get_post_type() === 'post' ) {
        $classes[] = "ot-blog blog-single";
    }elseif( get_post_type() === 'product' ){
        // Return Class
    }elseif( get_post_type() === 'page' ){
        $classes[] = "page--item";
    }
    
    return $classes;
}
add_filter( 'post_class', 'travon_post_classes', 10, 3 );
add_filter('wpcf7_autop_or_not', '__return_false');