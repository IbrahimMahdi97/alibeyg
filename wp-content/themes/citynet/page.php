<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Citynet
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">
			<?php if( !citynet_is_panel_pages() ) : ?>
				<div class="main-title position-relative py-3 mb-4 mt-5">
					<h1 class="text-center m-0"><?= get_the_title(); ?></h1>
				</div>
			<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if (get_field('has-panel-widget') && get_field('widget-position') == 'top') get_template_part('template-parts/content', 'panelwidget'); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php if (get_field('has-panel-widget') && get_field('widget-position') == 'bottom') get_template_part('template-parts/content', 'panelwidget'); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
