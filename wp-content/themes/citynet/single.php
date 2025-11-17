<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Citynet
 */

get_header(); ?>

    <?php $post_type = null;
    while (have_posts()) : the_post();
    $post_type = get_post_type(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php get_template_part('template-parts/content', $post_type); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

    <?php endwhile; ?>

<?php get_footer(); ?>
