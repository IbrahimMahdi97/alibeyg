<?php
/**
 * @Packge     : Travon
 * @Version    : 1.0
 * @Author     : Adivaha
 * @Author URI : https://www.adivaha.com/
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}

if ( ! is_active_sidebar( 'travon-page-sidebar' ) ) {
    return;
}
?>

<div class="col-xxl-4 col-lg-5">
    <div class="page-sidebar">
    <?php 
        dynamic_sidebar( 'travon-page-sidebar' );
    ?>               
    </div>
</div>