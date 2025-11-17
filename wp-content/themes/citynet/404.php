<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Citynet
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">
			<div class="row">
				<div class="col-12 col-sm-8 col-sm-push-4 col-lg-9 col-lg-push-3">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'citynet'); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try search?', 'citynet' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>
				
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
