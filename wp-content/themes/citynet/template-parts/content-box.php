<?php
/**
 * Template part for displaying boxes.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Citynet
 */

?>

<?php if (get_post_type() == 'continent') :
	$continent_link = get_permalink();
	$continent_name = get_the_title();
	foreach (['country', 'state', 'city', 'location', 'media', 'tour'] as $key_post_type) {
		if (is_post_type_archive($key_post_type)) {
			$continent_link = get_post_type_archive_link($key_post_type) . '?continent_id=' . get_the_ID();
			$continent_name = is_fa()? __('Countries', 'citynet') . 'ی ' . __('Continent', 'citynet') . ' ' . $continent_name : $continent_name . '\'s ' . __('Countries', 'citynet');
			break;
		}
	} ?>

    <li class="col-12 col-sm-6 col-md-4 col-lg-1of5 my-3 item">
        <div class="wrapper">
            <!-- Featured Image -->
	        <?php $pic_id = get_the_post_thumbnail()? get_post_thumbnail_id() : citynet_option('default_thumb');
	        if ($pic_id) { ?>
                <a href="<?= $continent_link; ?>" title="<?= $continent_name; ?>"
                   class="image-wrapper"><?= wp_get_attachment_image($pic_id, [400, 400], false, ['class' => 'w-100', 'alt' => $continent_name]); ?></a>
	        <?php } ?>

            <!-- Title -->
            <h3 class="item-title text-center my-3"><a href="<?= $continent_link; ?>" title="<?= $continent_name; ?>"><?= $continent_name; ?></a></h3>
        </div>
    </li>
<?php endif; ?>

<?php if (get_post_type() == 'country') :
    $country_classes = (is_front_page() || is_page_template('visa.php'))? ['col-lg-4'] : ['col-md-4', 'col-lg-1of5'];
    $country_classes[] = get_continent_name(get_field('continent'));
    $country_link = get_the_permalink();
	$country_name = get_the_title();
	if (is_page_template('visa.php')) {
	    $country_link .= '#visa';
	} else {
		foreach (['state', 'city', 'location', 'media', 'tour'] as $key_post_type) {
			if (is_post_type_archive($key_post_type)) {
				$country_has_states = (citynet_get_related_items('state', get_the_ID(), 'id'));
				$country_link = get_post_type_archive_link($key_post_type) . '?country_id=' . get_the_ID();
				if ($country_has_states) {
					if (is_fa()) {
						$country_name = (get_field('ostan-string')? 'استان‌های ' : 'ایالت‌های ') . __('Country', 'citynet') . ' ' .  $country_name;
					} else {
						$country_name = $country_name . '\'s ' . 'States';
					}
					break;
                } else {
				    $country_name = is_fa()? __('Cities', 'citynet') . 'ی ' . __('Country', 'citynet') . ' ' .  $country_name : $country_name . '\'s ' . __('Cities', 'citynet');
                }
			}
		}
    }
    $visa_price = get_field('visa_price'); ?>

    <li class="col-12 col-sm-6 my-3 item <?= implode(' ', $country_classes); ?>">
        <div class="wrapper">
            <!-- Featured Image -->
            <?php $pic_id = null;
            if (is_page_template('visa.php') && get_field('flag')) {
	            $pic_id = get_field('flag');
            } else {
	            $pic_id = get_the_post_thumbnail()? get_post_thumbnail_id() : citynet_option('default_thumb');
            }
            if ($pic_id) { ?>
                <a href="<?= $country_link; ?>" title="<?= $country_name; ?>"
                   class="image-wrapper"><?= wp_get_attachment_image($pic_id, [400, 400], false, ['class' => 'w-100', 'alt' => $country_name]); ?></a>
            <?php } ?>

            <!-- Title -->
            <h3 class="item-title text-center my-3"><a href="<?= $country_link; ?>" title="<?= $country_name; ?>"><?= $country_name; ?></a></h3>

            <?php if (is_page_template('visa.php') && $visa_price) {
                echo '<span>' . __('Visa price', 'citynet') . ': ' . $visa_price .'</span>';
            } ?>

	        <?php if (is_front_page()) { ?>
                <ul class="list-unstyled px-2">
                    <!-- continent -->
			        <?php if (is_fa()) {
				        echo '<li>' . __('Continent', 'citynet') . ': '; ?>
                        <a href="<?php the_permalink(get_field('continent')); ?>"><?= get_the_title(get_field('continent')); ?></a>
				        <?php echo '</li>';
			        } ?>

                    <!-- categories -->
			        <?php $cats = get_the_terms(false, 'country-category');
			        if ($cats && !is_wp_error($cats)) {
				        echo '<li>' . __('Categories', 'citynet') . ': ';
				        $cats_link = [];
				        foreach ($cats as $cat) {
					        $cats_link[] = '<a href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
				        }
				        echo implode(__(', ', 'citynet'), $cats_link);
				        echo '</li>';
			        } ?>
                </ul>
	        <?php } ?>
        </div>
    </li>
<?php endif; ?>

<?php if (get_post_type() == 'state') :
	$state_classes = is_front_page()? ['col-lg-4'] : ['col-md-4', 'col-lg-1of5'];
	$cats = get_the_terms(get_the_ID(), 'state-category');
	if ($cats) {
		foreach ($cats as $cat) {
			$state_classes[] = 'cat' . $cat->term_id;
		}
	}
	$state_classes[] = 'country' . get_field('country');
	$state_link = get_the_permalink();
	$state_name = get_the_title();
	foreach (['city', 'location', 'media', 'tour', 'irantour'] as $key_post_type) {
		if (is_post_type_archive($key_post_type)) {
			$state_link = get_post_type_archive_link($key_post_type) . '?state_id=' . get_the_ID();
			$archive_title = is_fa()? 'ایالت‌ها' : 'States';
			$state_word = is_fa()? 'ایالت' : 'State';
			if (is_fa() && get_field('ostan-string', get_field('country'))) {
				$state_word = 'استان‌';
			}
			$state_name = is_fa()? __('Cities', 'citynet') . 'ی ' . $state_word . ' ' . $state_name : $state_name . '\'s ' . __('Cities', 'citynet');
			break;
		}
	} ?>

    <li class="col-12 col-sm-6 my-3 item <?= implode(' ', $state_classes) ?>">
        <div class="wrapper">
            <!-- Featured Image -->
			<?php $pic_id = get_the_post_thumbnail()? get_post_thumbnail_id() : citynet_option('default_thumb');
			if ($pic_id) { ?>
                <a href="<?= $state_link; ?>" title="<?= $state_name; ?>"
                   class="image-wrapper"><?= wp_get_attachment_image($pic_id, [400, 400], false, ['class' => 'w-100', 'alt' => $state_name]); ?></a>
			<?php } ?>

            <!-- Title -->
            <h3 class="item-title text-center my-3"><a href="<?= $state_link; ?>" title="<?= $state_name; ?>"><?= $state_name; ?></a></h3>

            <?php if (is_front_page()) { ?>
                <ul class="list-unstyled px-2">
                    <!-- country -->
                    <?php if (is_fa()) {
                        echo '<li>' . __('Country', 'citynet') . ': '; ?>
                        <a href="<?php the_permalink(get_field('country')); ?>"><?= get_the_title(get_field('country')); ?></a>
                        <?php echo '</li>';
                    } ?>

                    <!-- categories -->
                    <?php $cats = get_the_terms(false, 'state-category');
                    if ($cats && !is_wp_error($cats)) {
                        echo '<li>' . __('Categories', 'citynet') . ': ';
                        $cats_link = [];
                        foreach ($cats as $cat) {
                            $cats_link[] = '<a href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
                        }
                        echo implode(__(', ', 'citynet'), $cats_link);
                        echo '</li>';
                    } ?>
                </ul>
            <?php } ?>
        </div>
    </li>
<?php endif; ?>

<?php if (get_post_type() == 'city') :
	$city_classes = is_front_page()? ['col-lg-4'] : ['col-md-4', 'col-lg-1of5'];
	$cats = get_the_terms(get_the_ID(), 'city-category');
	if ($cats) {
		foreach ($cats as $cat) {
			$city_classes[] = 'cat' . $cat->term_id;
		}
	}
	$city_classes[] = 'country' . get_field('country')->ID;
	$city_link = get_permalink();
	$city_name = get_the_title();
	foreach (['location', 'media', 'tour', 'irantour'] as $key_post_type) {
		if (is_post_type_archive($key_post_type)) {
			$city_link = get_post_type_archive_link($key_post_type) . '?city_id=' . get_the_ID();
			$use_post_type_labels = ($key_post_type == 'irantour')? 'tour' : $key_post_type;
			$post_type_multi_item_label = get_post_type_object($use_post_type_labels)->has_archive;
			$city_name = is_fa()? __(ucfirst($post_type_multi_item_label), 'citynet') . 'ی ' . __('City', 'citynet') . ' ' . $city_name : $city_name . '\'s ' . __(ucfirst($post_type_multi_item_label), 'citynet');
			break;
		}
	} ?>

    <li class="col-12 col-sm-6 my-3 item <?= implode(' ', $city_classes) ?>">
        <div class="wrapper">
            <!-- Featured Image -->
            <?php $pic_id = get_the_post_thumbnail()? get_post_thumbnail_id() : citynet_option('default_thumb');
            if ($pic_id) { ?>
                <a href="<?= $city_link; ?>" title="<?= $city_name; ?>"
                   class="image-wrapper"><?= wp_get_attachment_image($pic_id, [400, 400], false, ['class' => 'w-100', 'alt' => $city_name]); ?></a>
            <?php } ?>

            <!-- Title -->
            <h3 class="item-title text-center my-3"><a href="<?= $city_link; ?>" title="<?= $city_name; ?>"><?= $city_name; ?></a></h3>

            <?php if (is_front_page()) { ?>
                <ul class="list-unstyled px-2">
					<!-- country -->
					<?php if (is_fa()) {
						echo '<li>' . __('Country', 'citynet') . ': '; ?>
						<a href="<?= get_permalink(get_field('country')->ID); ?>"><?= get_field('country')->post_title; ?></a>
						<?php echo '</li>';
					} ?>

					<!-- categories -->
					<?php $cats = get_the_terms(false, 'city-category');
					if ($cats && !is_wp_error($cats)) {
						echo '<li>' . __('Categories', 'citynet') . ': ';
						$cats_link = [];
						foreach ($cats as $cat) {
							$cats_link[] = '<a href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
						}
						echo implode(__(', ', 'citynet'), $cats_link);
						echo '</li>';
					} ?>
				</ul>
            <?php } ?>
        </div>
    </li>
<?php endif; ?>

<?php if (get_post_type() == 'location') :
	$location_classes = is_front_page()? ['col-lg-4'] : ['col-md-4', 'col-lg-1of5'];
	$cats = get_the_terms(get_the_ID(), 'location-category');
	if ($cats) {
		foreach ($cats as $cat) {
			$location_classes[] = 'cat' . $cat->term_id;
		}
	}
	$location_classes[] = 'country' . get_field('country')->ID;
	$location_classes[] = 'city' . get_field('city')->ID; ?>

    <li class="col-12 col-sm-6 my-3 item <?= implode(' ', $location_classes); ?>">
        <div class="wrapper">
            <!-- Featured Image -->
            <?php $pic_id = get_the_post_thumbnail()? get_post_thumbnail_id() : citynet_option('default_thumb');
            if ($pic_id) { ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"
                   class="image-wrapper"><?= wp_get_attachment_image($pic_id, [400, 400], false, ['class' => 'w-100', 'alt' => get_the_title()]); ?></a>
            <?php } ?>

            <!-- Title -->
            <h3 class="item-title text-center my-3"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

	        <?php if (is_front_page()) { ?>
                <ul class="list-unstyled px-2">
					<!-- country -->
					<?php if (!is_singular()) :
						if (is_fa()) {
							echo '<li>' . __('Country', 'citynet') . ': '; ?>
							<a href="<?= get_permalink(get_field('country')->ID); ?>"><?= get_field('country')->post_title; ?></a>
							<?php echo '</li>';
						} ?>

						<!-- city -->
						<?= '<li>' . __('City', 'citynet') . ': '; ?>
						<a href="<?= get_permalink(get_field('city')->ID); ?>"><?= get_field('city')->post_title; ?></a>
						<?= '</li>';
					endif; ?>

					<!-- categories -->
					<?php $cats = get_the_terms(false, 'location-category');
					if ($cats && !is_wp_error($cats)) {
						echo '<li>' . __('Categories', 'citynet') . ': ';
						$cats_link = [];
						foreach ($cats as $cat) {
							$cats_link[] = '<a href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
						}
						echo implode(__(', ', 'citynet'), $cats_link);
						echo '</li>';
					} ?>
				</ul>
            <?php } ?>
        </div>
    </li>
<?php endif; ?>

<?php if (get_post_type() == 'media') :
    $media_classes = is_front_page()? ['col-lg-4'] : ['col-md-4', 'col-lg-1of5'];
	$cats = get_the_terms(get_the_ID(), 'media-category');
	if ($cats) {
		foreach ($cats as $cat) {
			$media_classes[] = 'cat' . $cat->term_id;
		}
	} ?>

    <li class="col-12 col-sm-6 my-3 item item-media <?= implode(' ', $media_classes); ?>">
        <div class="wrapper">
            <!-- Featured Image -->
			<?php $pic_id = get_the_post_thumbnail()? get_post_thumbnail_id() : citynet_option('default_thumb');
			if ($pic_id) { ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"
                   class="icon-layer image-wrapper"><?= wp_get_attachment_image($pic_id, [400, 400], false, ['class' => 'w-100', 'alt' => get_the_title()]); ?></a>
			<?php } ?>

            <!-- Title -->
            <h3 class="item-title text-center my-3"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

	        <?php if (is_front_page()) { ?>
                <ul class="list-unstyled px-2">
					<!-- categories -->
					<?php $cats = get_the_terms(false, 'media-category');
					if ($cats && !is_wp_error($cats)) {
						echo '<li>' . __('Categories', 'citynet') . ': ';
						$cats_link = [];
						foreach ($cats as $cat) {
							$cats_link[] = '<a href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
						}
						echo implode(__(', ', 'citynet'), $cats_link);
						echo '</li>';
					} ?>
				</ul>
            <?php } ?>
        </div>
    </li>
<?php endif; ?>

<?php if (in_array(get_post_type(), ['tour', 'irantour'])) :
	$post_type = get_post_type();
	$tour_type = $post_type . '-category';
	$tour_classes = is_front_page()? ['col-lg-4'] : ['col-md-4', 'col-lg-1of5'];
    $has_expired = ($post_type == 'tour')? citynet_tour_has_expired() : has_expired(get_field('expire_date'));
    $tour_classes[] = $has_expired? 'expired' : 'available';
	if ($post_type == 'irantour' && get_field('price') && get_field('off_price')) $tour_classes[] = 'onsale';
	if (get_field('featured') == true) $tour_classes[] = 'featured'; ?>

    <li class="col-12 col-sm-6 my-3 item <?= implode(' ', $tour_classes); ?>">
        <div class="wrapper">
            <!-- Featured Image -->
            <?php $pic_id = get_the_post_thumbnail()? get_post_thumbnail_id() : citynet_option('default_thumb');
            if ($pic_id) { ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"
                   class="image-wrapper"><?= wp_get_attachment_image($pic_id, [400, 400], false, ['class' => 'w-100', 'alt' => get_the_title()]); ?></a>
            <?php } ?>

            <!-- Title -->
            <h3 class="item-title text-center my-3"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

	        <?php if (is_front_page()) { ?>
                <ul class="list-unstyled px-2">
					<?php /* price */
					if (get_field('price') && get_field('off_price')) {
						echo '<li>' . __('Sale Price', 'citynet') . ': <small class="line-through text-muted">' . get_field('price') . '</small> <strong>' . get_field('off_price') . '</strong></li>';
					} elseif (get_field('price')) {
						echo '<li>' . __('Price', 'citynet') . ': ' . get_field('price') . '</li>';
					}

					/* duration */
					if (get_field('duration')) {
						echo '<li>' . __('Tour duration', 'citynet') . ': ' . get_field('duration') . '</li>';
					}

					/* countries */
					if (get_post_type() == 'tour') {
						echo '<li>' . __('Visiting countries', 'citynet') . ': ';
						$countries = get_field('countries');
						$countries_link = [];
						foreach ($countries as $country) {
							$countries_link[] = '<a href="' . get_permalink($country) . '">' . $country->post_title . '</a>';
						}
						echo implode(__(', ', 'citynet'), $countries_link);
						echo '</li>';
					}

					/* cities */
					echo '<li>' . __('Visiting cities', 'citynet') . ': ';
					$cities = get_field('cities');
					$cities_link = [];
					foreach ($cities as $city) {
						$cities_link[] = '<a href="' . get_permalink($city) . '">' . $city->post_title . '</a>';
					}
					echo implode(__(', ', 'citynet'), $cities_link);
					echo '</li>';

					/* categories */
					$tour_cat = $tour_type;
					$cats = get_the_terms(false, $tour_cat);
					if ($cats && !is_wp_error($cats)) {
						echo '<li>' . __('Categories', 'citynet') . ': ';
						$cats_link = [];
						foreach ($cats as $cat) {
							$cats_link[] = '<a href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
						}
						echo implode(__(', ', 'citynet'), $cats_link);
						echo '</li>';
					}

					/* is expired? */
					if ($has_expired) echo '<li>' . __('Expired', 'citynet') . '</li>'; ?>
				</ul>
            <?php } ?>
        </div>
    </li>
<?php endif; ?>

<?php if ( get_post_type() == 'hotelpackage' ) :
	$hotelpackage_classes = is_front_page()? ['col-lg-4'] : ['col-md-4', 'col-lg-1of5'];
    $has_expired = citynet_hotelpackage_has_expired();
    $hotelpackage_classes[] = $has_expired? 'expired' : 'available';
	if (get_field('featured') == true) $hotelpackage_classes[] = 'featured'; ?>

    <li class="col-12 col-sm-6 my-3 item <?= implode(' ', $hotelpackage_classes); ?>">
        <div class="wrapper">
            <!-- Featured Image -->
            <?php $pic_id = get_the_post_thumbnail()? get_post_thumbnail_id() : citynet_option('default_thumb');
            if ($pic_id) { ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"
                   class="image-wrapper"><?= wp_get_attachment_image($pic_id, [400, 400], false, ['class' => 'w-100', 'alt' => get_the_title()]); ?></a>
            <?php } ?>

            <!-- Title -->
            <h3 class="item-title text-center my-3"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

	        <?php if (is_front_page()) { ?>
                <ul class="list-unstyled px-2">
					<?php /* price */
					if (get_field('price') && get_field('off_price')) {
						echo '<li>' . __('Sale Price', 'citynet') . ': <small class="line-through text-muted">' . get_field('price') . '</small> <strong>' . get_field('off_price') . '</strong></li>';
					} elseif (get_field('price')) {
						echo '<li>' . __('Price', 'citynet') . ': ' . get_field('price') . '</li>';
					}

					/* duration */
					if (get_field('duration')) {
						echo '<li>' . __('hotelpackage duration', 'citynet') . ': ' . get_field('duration') . '</li>';
					}

					/* countries */
					if (get_post_type() == 'hotelpackage') {
						echo '<li>' . __('Visiting countries', 'citynet') . ': ';
						$countries = get_field('countries');
						$countries_link = [];
						foreach ($countries as $country) {
							$countries_link[] = '<a href="' . get_permalink($country) . '">' . $country->post_title . '</a>';
						}
						echo implode(__(', ', 'citynet'), $countries_link);
						echo '</li>';
					}

					/* cities */
					echo '<li>' . __('Visiting cities', 'citynet') . ': ';
					$cities = get_field('cities');
					$cities_link = [];
					foreach ($cities as $city) {
						$cities_link[] = '<a href="' . get_permalink($city) . '">' . $city->post_title . '</a>';
					}
					echo implode(__(', ', 'citynet'), $cities_link);
					echo '</li>';

					/* categories */
					$hotelpackage_cat = 'hotelpackage-category';
					$cats = get_the_terms(false, $hotelpackage_cat);
					if ($cats && !is_wp_error($cats)) {
						echo '<li>' . __('Categories', 'citynet') . ': ';
						$cats_link = [];
						foreach ($cats as $cat) {
							$cats_link[] = '<a href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
						}
						echo implode(__(', ', 'citynet'), $cats_link);
						echo '</li>';
					}

					/* is expired? */
					if ($has_expired) echo '<li>' . __('Expired', 'citynet') . '</li>'; ?>
				</ul>
            <?php } ?>
        </div>
    </li>
<?php endif; ?>

<?php if ( get_post_type() == 'post' || get_post_type() == 'page' ) : ?>
	 <li id="post-<?php the_ID(); ?>" class="col-12 col-md-6 col-lg-3 my-3">
		<div class="post-wrapper bg-white">
			<?php 
			$pic_id = get_the_post_thumbnail()? get_post_thumbnail_id() : citynet_option('default_thumb' );
			if ($pic_id) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="image-wrapper mx-2">
					<?= wp_get_attachment_image($pic_id, 'medium', false, ['alt' => get_the_title()]); ?>
				</a>
			<?php } ?>
			<span class="m-0 h6 mt-2 title d-block mx-3"><a class="d-block w-100 <?= $is_front_page ? 'text2 ':''; ?>" href="<?php the_permalink(); ?>"><?= get_the_title() ?></a></span>
		</div>
 	</li>
<?php endif; ?>