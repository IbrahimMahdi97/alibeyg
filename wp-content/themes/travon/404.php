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

    if( class_exists( 'ReduxFramework' ) ) {
        $travon404title        = travon_opt( 'travon_fof_title' );
        $travon404description  = travon_opt( 'travon_fof_description' );
        $travon404bg           = travon_opt( 'travon_404_bg','url' );
        $travon404btntext      = travon_opt( 'travon_fof_btn_text' );
    } else {
        $travon404title        = __( 'Opp’s that page can’t be found', 'travon' );
        $travon404description  = __( 'It looks like nothing was found at this location. The page or post you are looking for has been moved or removed.', 'travon' );
        $travon404bg           = ''.TRAVON_DIR_ASSIST_URI.'img/error_img.svg';
        $travon404btntext      = __( ' Back To Home', 'travon');

        
    }

    // get header
    get_header();

    echo '<div class="space">';
        echo '<div class="container">';
            echo '<div class="error-img">';
                echo travon_img_tag( array(
                    'url'   => esc_url($travon404bg),
                ) ); 
            echo '</div>';
            echo '<div class="error-content">';
                echo '<h2 class="error-title">'.esc_html( $travon404title ).'</h3>';
                echo '<p class="error-text">'.esc_html( $travon404description ).'</p>';
                echo '<a href="'.esc_url( home_url('/') ).'" class="ot-btn"><i class="fas fa-home me-2"></i>'.esc_html( $travon404btntext ).'</a>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

    //footer
    get_footer();