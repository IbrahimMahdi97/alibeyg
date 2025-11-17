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
    exit;
}

if ( ! is_active_sidebar( 'travon-blog-sidebar' ) ) {
    return;
}
?>

<div class="col-xxl-4 col-lg-5">
    <aside class="sidebar-area">
	    <?php dynamic_sidebar( 'travon-blog-sidebar' ); ?>
	</aside>
</div>