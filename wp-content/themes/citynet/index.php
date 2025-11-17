<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Citynet
 */

get_header();

$page_title = get_the_title(get_option('page_for_posts'));
$posts_per_page = (int)get_option('posts_per_page');
$args = citynet_generate_args('post', $posts_per_page);
$citynet_query = new WP_Query($args);
$archive_data = [
    'post-type'      => 'post',
    'taxonomy'       => null,
    'match-query'    => $citynet_query->found_posts,
    'pages'          => $citynet_query->max_num_pages,
    'posts-per-page' => $posts_per_page,
    'translates'     => [
        'more-items' => __('More Items', 'citynet')
    ]
];

$banner_field_id = 'archive_post_top_image' . (wp_is_mobile()? '_mobile': '');
$top_banner = citynet_option( $banner_field_id );
if (!$top_banner) $top_banner = citynet_option( wp_is_mobile()? 'default_single_top_image_mobile' : 'default_single_top_image' );

$breadcrumb = '<li><a href="' . get_home_url() . '">' . __('Home', 'citynet') . '</a></li><li><span>' . $page_title . '</span></li>'; ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

	<header class="entry-header">

		<?php if ($top_banner) :
			echo wp_get_attachment_image($top_banner, 'full', false, ['class' => 'w-100', 'title' => get_the_title($top_banner)]);
		endif; ?>

		<div class="container">
			<div class="page-title mt-4 mb-3">
				<?php echo '<h1 class="mt-0 pb-3 text-center mb-lg-0 pb-lg-0 d-lg-inline-block ' . (is_rtl()? 'text-lg-right pl-lg-3' : 'text-lg-left pr-lg-3') . '">' . $page_title . '</h1>'; ?>
			</div>
		</div>

	</header>

	<div class="container">
		<div id="archives-filter-area">
			<div class="row">
				<div class="col-12 d-flex flex-column justify-content-center col-md-7 col-lg-8 col-xl-9">
					<div class="text-center <?= is_rtl()? 'text-md-right' : 'text-md-left'; ?>">
						<span><?= __('Items for', 'citynet') . ': '; ?></span>
						<span class="current-filter-text"><?php _e('All', 'citynet'); ?></span>
					</div>
				</div>
				<div class="col-12 col-md-5 col-lg-4 col-xl-3  px-0">
					<?php $terms = get_terms(['taxonomy' => 'category']); ?>
                    <div class="select-area mt-3 mt-md-0">
                        <span><?php _e('Select articles category', 'citynet'); ?></span>
                        <ul class="list-unstyled m-0 d-none">
                            <?php $options_html = '<li data-term="all" data-text="' . $page_title . '">' . __('All', 'citynet') . '</li>';
                            if ($terms) :
                                foreach ($terms as $term) :
                                    $options_html .= '<li data-term="' . $term->term_id . '">' . $term->name . '</li>';
                                endforeach;
                            endif;
                            echo $options_html; ?>
                        </ul>
                    </div>
				</div>
			</div>
        </div>

        <div class="main-side">
            <?php if ($citynet_query->have_posts()) : ?>
                <ul class="row mt-3 px-0 list-unstyled posts-area">
                    <?php while ($citynet_query->have_posts()) :
                        $citynet_query->the_post();
                        get_template_part('template-parts/content', 'box');
                    endwhile;
                    wp_reset_postdata(); ?>
                </ul>
                <div class="row justify-content-center">
                    <div class="col-5 my-5 col-sm-4 col-md-3 col-xl-2">
                        <a class="theme-button archives-load-more waitable-element py-2"><?php _e('More Items', 'citynet'); ?></a>
                    </div>
                </div>
            <?php else : ?>
                <div class="row"></div>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
	</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php wp_localize_script('general-custom', 'generalData', $archive_data);
get_footer();
