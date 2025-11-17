<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Travon
 * @Version    : 1.0
 * @Author     : Adivaha
 * @Author URI : https://www.adivaha.com/
 *
 */

// enqueue css
function travon_common_custom_css(){
	wp_enqueue_style( 'travon-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = travon_opt( 'travon_css_editor' );
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $travon_header_bg =  get_header_image();
    }else{
        if( travon_meta( 'page_breadcrumb_settings' ) == 'page' ){
            if( ! empty( travon_meta( 'breadcumb_image' ) ) ){
                $travon_header_bg = travon_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $travon_header_bg ) ){
        $customcss .= ".breadcumb-wrapper{
            background-image:url('{$travon_header_bg}')!important;
        }";
    }
    
	// theme color
	$travonthemecolor = travon_opt('travon_theme_color');

    list($r, $g, $b) = sscanf( $travonthemecolor, "#%02x%02x%02x");

    $travon_real_color = $r.','.$g.','.$b;
	if( !empty( $travonthemecolor ) ) {
		$customcss .= ":root {
		  --theme-color: rgb({$travon_real_color});
		}";
	}

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'travon-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'travon_common_custom_css', 100 );