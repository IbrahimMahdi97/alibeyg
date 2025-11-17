<?php get_header();

$page_title = $post_type = $all_label = null;
$breadcrumb = '<li><a href="' . get_home_url() . '">' . __('Home', 'citynet') . '</a></li>';
if (is_post_type_archive()) :
	$post_type = get_queried_object()->name;
	$page_title = get_queried_object()->label;
	$all_label = $page_title;
elseif (is_tax() || is_category() || is_tag()) :
	$post_type = get_taxonomy(get_queried_object()->taxonomy)->object_type[0];
	$breadcrumb_text = ($post_type == 'post')? get_the_title(get_option('page_for_posts')) : get_post_type_object($post_type)->labels->name;
	$breadcrumb .= '<li><a href="' . get_post_type_archive_link($post_type) . '">' . $breadcrumb_text . '</a></li>';
	$page_title = get_queried_object()->name;
	$all_label = $breadcrumb_text;
endif;

$posts_per_page = (int)get_option('posts_per_page');
$orderby = ( $post_type == 'post' )? 'date' : 'priority';
$args = citynet_generate_args($post_type, $posts_per_page, 0, [get_queried_object()->term_id], false, $orderby, [], get_queried_object()->taxonomy);
$citynet_query = new WP_Query($args);
$archive_data = [
    'post-type'      => $post_type,
    'taxonomy'       => get_queried_object()->taxonomy,
    'match-query'    => $citynet_query->found_posts,
    'pages'          => $citynet_query->max_num_pages,
    'posts-per-page' => $posts_per_page,
    'translates'     => [
        'more-items' => __('More Items', 'citynet')
    ]
];

$banner_field_id = 'archive_' . $post_type . '_top_image' . (wp_is_mobile()? '_mobile': '');
$top_banner = citynet_option( $banner_field_id );
if (!$top_banner) $top_banner = citynet_option( wp_is_mobile()? 'default_single_top_image_mobile' : 'default_single_top_image' );
$breadcrumb .= '<li><span>' . $page_title . '</span></li>'; ?>

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
						<span class="current-filter-text"><?= is_post_type_archive()? __('All', 'citynet') : $page_title; ?></span>
					</div>
				</div>
				<div class="col-12 col-md-5 col-lg-4 col-xl-3">
                    <?php $taxonomy = get_queried_object()->taxonomy;
                    if ( ! $taxonomy ) $taxonomy = ($post_type == 'post')? 'category' : $post_type . '-category';
					$terms = get_terms(['taxonomy' => $taxonomy]); ?>
                    <div class="select-area mt-3 mt-md-0">
                        <span><?php _e('Select articles category', 'citynet'); ?></span>
                        <ul class="list-unstyled m-0 d-none">
                            <?php $options_html = '<li data-term="all" data-text="' . $all_label . '">' . __('All', 'citynet') . '</li>';
                            if ($terms) :
                                foreach ($terms as $term) :
                                    $options_html .= '<li data-term="' . $term->term_id . '"' . ((get_queried_object()->term_id == $term->term_id)? ' class="selected"' : '') . '>' . $term->name . '</li>';
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
                    <div class="col-5 mt-5 col-sm-4 col-md-3 col-xl-2">
                        <a class="theme-button archives-load-more waitable-element"><i class="fa fa-eye"></i><?php _e('More Items', 'citynet'); ?></a>
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
