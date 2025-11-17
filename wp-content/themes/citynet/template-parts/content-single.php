<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Citynet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('main-article-format'); ?>>
	<header class="entry-header">
	
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php citynet_posted_on(); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail('large');
        } ?>
		<?php the_content(); ?>
		<?php wp_link_pages([
		    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'citynet' ),
		    'after'  => '</div>',
		]); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php citynet_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->