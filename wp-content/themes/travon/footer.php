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
    
    /**
    *
    * Hook for Footer Content
    *
    * Hook travon_footer_content
    *
    * @Hooked travon_footer_content_cb 10
    *
    */
    do_action( 'travon_footer_content' );

    /**
    *
    * Hook for Back to Top Button
    *
    * Hook travon_back_to_top
    *
    * @Hooked travon_back_to_top_cb 10
    *
    */
    do_action( 'travon_back_to_top' );

    wp_footer();
    ?>
</body>
</html>