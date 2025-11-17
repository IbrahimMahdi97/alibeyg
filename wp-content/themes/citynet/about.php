<?php
/**
 * Template Name: درباره ما
 *
 *
 * @package Citynet
 */

get_header(); 
$banner = get_field('top-banner')? get_field('top-banner'):citynet_option('default_single_top_image'); ?>

<section id="top-banner">
    <div class="wrapper">
        <?= wp_get_attachment_image($banner, 'full'); ?>
    </div>
</section>

<div id="primary" class="content-area">
		<main id="main" class="site-main container py-5 about-page" role="main">
			
            <header class="main-title py-3 mb-4">
                <h1 class="text-center m-0"><?= get_the_title(); ?></h1>
            </header>
            
            <div class="main-article-format">
                <?= get_the_content(); ?>
            </div>

        </main><!-- #main -->
	</div><!-- #primary -->

    <?php get_footer(); ?>