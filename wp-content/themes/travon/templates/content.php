<?php
/**
 * @Packge     : Travon
 * @Version    : 1.0
 * @Author     : Adivaha
 * @Author URI : https://www.adivaha.com/
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

echo '<!-- Single Post -->';

if(has_post_thumbnail()){ ?>

    <div <?php post_class('hot-post-thumbnail'); ?>>
    <?php
}else{ ?>
    <div <?php post_class(); ?>>
<?php }


    // Blog Post Content
    do_action( 'travon_blog_post_content' );


echo '</div>';
echo '<!-- End Single Post -->';