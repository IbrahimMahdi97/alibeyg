<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Citynet
 */

/* Define Custom post types with taxonomies */
// add_action( 'init', function() {
// 	foreach ( [
// 		'continent'		=> ['single' => 'Continent',	 'multi' => 'Continents',	  'archive' => 'continents',	 'icon' => 'admin-site'],
// 		'country'		=> ['single' => 'Country',		 'multi' => 'Countries',	  'archive' => 'countries',		 'icon' => 'flag'],
// 		'state'			=> ['single' => 'State',		 'multi' => 'States',		  'archive' => 'states',		 'icon' => 'location-alt'],
// 		'city'			=> ['single' => 'City',			 'multi' => 'Cities',		  'archive' => 'cities',		 'icon' => 'admin-multisite'],
// 		'location'		=> ['single' => 'Location',		 'multi' => 'Locations',	  'archive' => 'locations',		 'icon' => 'location'],
// 		'tour'			=> ['single' => 'Tour',			 'multi' => 'Tours',		  'archive' => 'tours',			 'icon' => 'palmtree'],
// 		'hotelpackage'	=> ['single' => 'Hotel Package', 'multi' => 'Hotel Packages', 'archive' => 'hotel-packages', 'icon' => 'building'],
// 		//'irantour'	=> ['single' => 'Iran Tour',	 'multi' => 'Iran Tours',	  'archive' => 'irantours',		 'icon' => 'palmtree'],
// 		//'media'		=> ['single' => 'Media',		 'multi' => 'Medias',		  'archive' => 'medias',		 'icon' => 'format-video'],
// 	] as $post_type_slug => $post_type ) :

// 		$labels = [
// 			'name'				 => __( $post_type['multi'], 'citynet' ),
// 			'singular_name' 	 => __( $post_type['single'], 'citynet' ),
// 			'menu_name'			 => __( $post_type['multi'], 'citynet' ),
// 			'all_items'			 => __( 'All ' . $post_type['multi'], 'citynet' ),
// 			'add_new'			 => __( 'Add New', 'citynet' ),
// 			'add_new_item'		 => __( 'Add New ' . $post_type['single'], 'citynet' ),
// 			'edit'				 => __( 'Edit', 'citynet' ),
// 			'edit_item'			 => __( 'Edit ' . $post_type['single'], 'citynet' ),
// 			'new_item'			 => __( 'New ' . $post_type['single'], 'citynet' ),
// 			'view'				 => __( 'View', 'citynet' ),
// 			'view_item'			 => __( 'View ' . $post_type['single'], 'citynet' ),
// 			'search_items'		 => __( 'Search ' . $post_type['multi'], 'citynet' ),
// 			'not_found'			 => __( 'No ' . $post_type['multi'] . ' found', 'citynet' ),
// 			'not_found_in_trash' => __( 'No ' . $post_type['multi'] . ' found in Trash', 'citynet' ),
// 			'parent'			 => __( 'Parent ' . $post_type['single'], 'citynet' ),
// 		];

// 		$args = [
// 			'labels'	   		  => $labels,
// 			'description'  		  => '',
// 			'public'	   		  => true,
// 			'show_ui'	   		  => true,
// 			'has_archive'  		  => $post_type['archive'] ,
// 			'show_in_menu'		  => true,
// 			'exclude_from_search' => false,
// 			'capability_type'	  => 'post',
// 			'map_meta_cap'		  => true,
// 			'hierarchical'		  => false,
// 			'rewrite'			  => [
// 				'slug'		 => $post_type_slug . (( $post_type_slug == 'location' )? '/%' . $post_type_slug . '-category%' : '' ),
// 				'with_front' => true
// 			],
// 			'query_var'			  => true,
// 			'menu_position'		  => 5,
// 			'menu_icon'			  => 'dashicons-' . $post_type['icon'],
// 			'supports'			  => ['title', 'editor', 'excerpt', 'comments', 'thumbnail']
// 		];

// 		if ( $post_type_slug == 'continent' && !citynet_is_developer() ) {
// 			$args['capabilities'] = [
// 				'create_posts'			 => 'do_not_allow',
// 				'delete_published_posts' => 'do_not_allow'
// 			];
// 		}

// 		register_post_type( $post_type_slug, $args );


// 		if ( $post_type_slug != 'continent' ) :
// 			$labels = [
// 				'name'						 => __( $post_type['single'] . ' Categories', 'citynet' ),
// 				'singular_name'				 => __( $post_type['single'] . ' Category', 'citynet' ),
// 				'label'						 => __( $post_type['single'] . ' Categories', 'citynet' ),
// 				'menu_name'					 => __( 'Categories', 'citynet' ),
// 				'all_items'					 => __( 'All ' . $post_type['single'] . ' Categories', 'citynet' ),
// 				'edit_item'					 => __( 'Edit ' . $post_type['single'] . ' Category', 'citynet' ),
// 				'view_item'					 => __( 'View ' . $post_type['single'] . ' Category', 'citynet' ),
// 				'update_item'				 => __( 'Update ' . $post_type['single'] . ' Category Name', 'citynet' ),
// 				'add_new_item'				 => __( 'Add New ' . $post_type['single'] . ' Category', 'citynet' ),
// 				'new_item_name'				 => __( 'Add New ' . $post_type['single'] . ' Category Name', 'citynet' ),
// 				'parent_item'				 => __( 'Parent ' . $post_type['single'] . ' Category', 'citynet' ),
// 				'parent_item_colon'			 => __( 'Parent ' . $post_type['single'] . ' Category:', 'citynet' ),
// 				'search_items'				 => __( 'Search ' . $post_type['single'] . ' Categories', 'citynet' ),
// 				'popular_items'				 => __( 'Popular ' . $post_type['single'] . ' Categories', 'citynet' ),
// 				'separate_items_with_commas' => __( 'Separate ' . $post_type['single'] . ' Categories with commas', 'citynet' ),
// 				'add_or_remove_items'		 => __( 'Add or remove ' . $post_type['single'] . ' Categories', 'citynet' ),
// 				'choose_from_most_used'		 => __( 'Choose from the most used ' . $post_type['single'] . ' Categories', 'citynet' ),
// 				'not_found'					 => __( 'No ' . $post_type['single'] . ' Categories found', 'citynet' ),
// 			];

// 			$args = [
// 				'labels'			=> $labels,
// 				'hierarchical'		=> true,
// 				'label'				=> __( $post_type['single'] . ' Categories', 'citynet' ),
// 				'show_ui'			=> true,
// 				'query_var'			=> true,
// 				'rewrite'			=> [
// 					'slug' => $post_type_slug . '-category',
// 					'with_front' => true,
// 					'hierarchical' => true
// 				],
// 				'show_admin_column' => true,
// 			];
// 			register_taxonomy( $post_type_slug . '-category', [$post_type_slug], $args );
// 		endif;

// 		if ( $post_type_slug == 'location' ) :

// 			$labels = citynet_generate_taxonomy_labels( [
// 				'single' => __( 'District', 'citynet' ),
// 				'multi'	 => __( 'Districts', 'citynet' )
// 			] );
// 			$args = array(
// 				"labels" => $labels,
// 				"hierarchical" => true,
// 				"label" => $labels['multi'],
// 				"show_ui" => true,
// 				"query_var" => true,
// 				"rewrite" => array( 'slug' => 'region', 'with_front' => true, 'hierarchical' => true ),
// 				"show_admin_column" => true,
// 			);
// 			register_taxonomy( 'region', array( "location" ), $args );

// 		elseif ( $post_type_slug == 'tour' ) :

// 			if (have_rows('tour-custom-taxonomies', 'option')) {
// 				while (have_rows('tour-custom-taxonomies', 'option')) { the_row();
// 					$labels = citynet_generate_taxonomy_labels( [
// 						'single' => is_fa()? get_sub_field('tct-name-fa') : get_sub_field('tct-name-en'),
// 						'multi'	 => is_fa()? get_sub_field('tct-name-multi-fa') : get_sub_field('tct-name-multi-en')
// 					] );
// 					$taxonomy_slug = str_replace( ' ', '-', strtolower( trim( get_sub_field('tct-slug') ) ) );
// 					$args = array(
// 						"labels" => $labels,
// 						"hierarchical" => true,
// 						"label" => $labels['multi'],
// 						"show_ui" => true,
// 						"query_var" => true,
// 						"rewrite" => array( 'slug' => $taxonomy_slug, 'with_front' => true, 'hierarchical' => true ),
// 						"show_admin_column" => true,
// 					);
// 					register_taxonomy( $taxonomy_slug, array( "tour" ), $args );
// 				}
// 			}

// 		endif;
// 	endforeach;
// } );

// //Returns required lables for build taxonomies
// function citynet_generate_taxonomy_labels( $labels ) {
// 	$result = [
// 		'name'					 	 => $labels['multi'],
// 		'singular_name'				 => $labels['single'],
// 		'label'						 => $labels['multi'],
// 		'menu_name'					 => $labels['multi'],
// 		'all_items'					 => is_fa()? 'همه ' . $labels['multi'] : 'All ' . $labels['multi'],
// 		'edit_item'					 => is_fa()? 'ویرایش ' . $labels['single'] : 'Edit ' . $labels['single'],
// 		'view_item'					 => is_fa()? 'مشاهده ' . $labels['single'] : 'View ' . $labels['single'],
// 		'update_item'				 => is_fa()? 'بروز رسانی نام ' . $labels['single'] : 'Update ' . $labels['single'] . ' Name',
// 		'add_new_item'				 => is_fa()? 'افزودن ' . $labels['single'] . ' جدید' : 'Add New ' . $labels['single'],
// 		'new_item_name'				 => is_fa()? 'افزودن نام ' . $labels['single'] . ' جدید' : 'Add New ' . $labels['single'] . ' Name',
// 		'parent_item'				 => is_fa()? $labels['single'] . ' والد' : 'Parent ' . $labels['single'],
// 		'parent_item_colon'			 => is_fa()? $labels['single'] . ' والد:' : 'Parent ' . $labels['single'] . ':',
// 		'search_items'				 => is_fa()? 'جستجوی ' . $labels['multi'] : 'Search ' . $labels['multi'],
// 		'popular_items'				 => is_fa()? $labels['multi'] . ' پرکاربرد' : 'Popular ' . $labels['multi'],
// 		'separate_items_with_commas' => is_fa()? $labels['multi'] . ' را با کاما جدا کنید' : 'Separate ' . $labels['multi'] . ' with commas',
// 		'add_or_remove_items'		 => is_fa()? 'افزودن یا حذف ' . $labels['multi'] : 'Add or remove ' . $labels['multi'],
// 		'choose_from_most_used'		 => is_fa()? 'انتخاب از بین ' . $labels['multi'] . ' پرکاربرد' : 'Choose from the most used ' . $labels['multi'],
// 		'not_found'					 => is_fa()? $labels['multi'] . ' پیدا نشد' : 'No ' . $labels['multi'] . ' found',
// 	];
// 	return $result;
// }

//Handle locations rewrite rules (location's single URLs) - by 2 bellow hooks
add_filter( 'post_type_link', function( $link, $post ) {
	if ( $post->post_type == 'location' ) :
		$location_single_slugs = [
			'hotels'	  => 'hotel',
			'attractions' => 'attraction'
		];
		if ( $cats = get_the_terms( $post->ID, 'location-category' ) ) :
			$location_term = current( $cats );
			$location_type = $location_term->slug;
			if ( !isset( $location_single_slugs[$location_type] ) ) :
				foreach ( $location_single_slugs as $archive_slug => $single_slug ) :
					$term_ancestors = get_ancestors( $location_term->term_id, 'location-category', 'taxonomy' );
					foreach ( $term_ancestors as $ancestor_id ) :
						$ancestor_slug = get_term_field( 'slug', $ancestor_id, 'location-category' );
						if ( $ancestor_slug == $archive_slug ) :
							$location_type = $ancestor_slug;
							break 2;
						endif;
					endforeach;
				endforeach;
			endif;
			$link = str_replace( 'location/%location-category%', $location_single_slugs[$location_type], $link );
		endif;
	endif;
	return $link;
}, 10, 2 );
add_filter( 'rewrite_rules_array', function( $rules ) {
	$location_single_slugs = ['hotel', 'attraction'];
	foreach ( $location_single_slugs as $slug ) :
		$new_rules[$slug . '/(.+)/?$'] = 'index.php?location=$matches[1]';
	endforeach;
	return array_merge( $new_rules, $rules );
} );

/* Hides ACF field in site options */
function cn_hide_acf_fields($field) {
    if (!citynet_is_developer()) {
        return false;
    }
    return $field;
}
add_filter('acf/prepare_field/key=field_5d8fb62a3b1ab', 'cn_hide_acf_fields');
add_filter('acf/prepare_field/key=field_5f17bb6b521d8', 'cn_hide_acf_fields');
add_filter('acf/prepare_field/key=field_5f17bbbc521d9', 'cn_hide_acf_fields');
add_filter('acf/prepare_field/key=field_5f1818359e1f1', 'cn_hide_acf_fields');
add_filter('acf/prepare_field/key=field_5fcf221baf9c0', 'cn_hide_acf_fields');

/* Generate hotel rating */
function generate_stars($rating, $return = false) {
	$output = '<div class="hotel-rating">';
	for ($i = 1; $i <= $rating; $i++) { $output .= '<i class="fa fa-star"></i>'; }
	for ($i = 1; $i <= (5 - $rating); $i++) { $output .= '<i class="fa fa-star-o"></i>'; }
	$output .= '</div>';
	if ($return) :
        return $output;
	else :
		echo $output;
	endif;
}

/* Detect language */
function is_fa() {
	return (get_locale() == 'fa_IR')? true : false;
}

/* Detect active tab and content */
function active_tab() {
	global $first_tab;
	if (!$first_tab) {
		echo 'class="active show"';
		$first_tab = true;
	}
}

function active_content() {
	global $first_content;
	if (!$first_content) {
		echo 'active show';
		$first_content = true;
	}
}

//Returns continent name by continent id
function get_continent_name($continent) {
	$continent_name = null;
	switch ($continent) {
		case 1718:
		//case 1728:
			$continent_name = 'oceania'; break;
		case 1719:
		//case 1727:
			$continent_name = 'africa'; break;
		case 1720:
		//case 1726:
			$continent_name = 'america'; break;
		case 1721:
		//case 1725:
			$continent_name = 'europe'; break;
		case 1722:
		//case 1724:
			$continent_name = 'asia'; break;
	}
	return $continent_name;
}

/* Generate continent link by continent id */
function generate_continent($continent) {
    echo '<a href="' . get_the_permalink($continent) . '">' . __(ucfirst(get_continent_name($continent)), 'citynet') . '</a>';
}

/* Generate video player by quality ('high', 'medium', 'low' or it's exact index name) */
function generate_video_player($video_qualities, $quality = 'medium', $auto_play = false, $time = null, $echo = true) {
    $selected_quality = $quality;
    if (in_array($quality, ['high', 'medium', 'low'])) :
        switch ($quality) :
            case 'high':
	            end($video_qualities);
	            $selected_quality = key($video_qualities);
	            reset($video_qualities);
                break;
	        case 'medium':
	            $medium_index = ceil(count($video_qualities) / 2) - 1;
	            $loop_counter = 0;
	            foreach ($video_qualities as $quality_index => $quality_link) :
                    if ($loop_counter == $medium_index) :
	                    $selected_quality = $quality_index;
	                    break;
                    endif;
                    $loop_counter++;
                endforeach;
		        reset($video_qualities);
		        break;
	        case 'low':
		        reset($video_qualities);
		        $selected_quality = key($video_qualities);
		        break;
        endswitch;
    endif;
    $html = '<div class="citynet-aparat-video">';
    $html .= '<video src="' . $video_qualities[$selected_quality] . '" class="w-100"' . ($auto_play? ' autoplay' : '') . ' controls></video>';
    $html .= '<div class="row"><div class="' . ($time? 'col-6 ' : 'col-12 ') . (is_rtl()? 'text-right' : 'text-left') . '"><select class="qualities">';
	foreach ($video_qualities as $quality_name => $quality_link) :
        $html .= '<option value="' . $quality_link . '"' . (($quality_name == $selected_quality)? ' selected' : '') . '>' . $quality_name . '</option>';
	endforeach;
	$html .= '</select></div>';
	if ($time) :
		$html .= '<div class="col-6 ' . (is_rtl()? 'text-left' : 'text-right') . '">' . __('Video Time', 'citynet') . ': ' . $time . '</div>';
    endif;
	$html .= '</div></div>';
    if ($echo) echo $html; else return $html;
}

/* Generate live local clock by UTC time zone */
function generate_live_local_clock($time_zone) {
	list($hour_offset, $minute_offset) = explode(':', $time_zone);
	$hour_offset = (int)$hour_offset;
	$minute_offset = $minute_offset? (int)$minute_offset : 0;
	wp_localize_script('general-custom', 'placeData', array(
		'hour_offset' => $hour_offset,
		'min_offset'  => $minute_offset
	)); ?>
    <span id="citynet-live-local-clock"></span><?php
}

/* Detect if date has expired */
function has_expired($expire_date) {
	$today = (int)parsidate('Ymd', 'now', 'eng');
    $expire_date = citynet_is_jalali_date($expire_date)? (int)str_replace('-', '', $expire_date) : (int)parsidate('Ymd', $expire_date, 'eng');
	return ($expire_date < $today);
}

/* Generate photo gallery */
function generate_lightbox_gallery($gallery) {
	$gallery_type = get_field('gallery-type', 'option');
	$gallery_view_type = get_field('gallery-view-type', 'option');
	echo '<div id="image-gallery" class="row half-gutters image-gallery ' . $gallery_view_type . '">';
	if ($gallery_view_type == 'with-slider') :
		$finish_index = (count($gallery) >= 10)? 8 : 9;
	endif;
	foreach ($gallery as $loop_index => $image) :
		$photo_extra_classes = [];
		if ($gallery_view_type == 'with-slider') {
			$photo_extra_classes[] = ($loop_index < $finish_index)? 'gallery-image-item col-4 col-md-3 mb-3 col-lg-4' : 'gallery-image-item d-none';
			if ($loop_index == 0) $photo_extra_classes[] = 'active';
		} else {
			$photo_extra_classes[] = 'gallery-image-item col-4 col-md-3 mb-3 col-lg-2';
		} ?>
		<a href="<?= $image['url']; ?>" title="<?= $image['title']; ?>" data-index="<?= $loop_index; ?>"<?php if ($gallery_type == 'simple') echo ' rel="image-gallery"'; ?> class="<?= implode(' ', $photo_extra_classes); ?>"
			<?php if ($gallery_view_type == 'with-slider' && $loop_index < $finish_index) echo ' style="background-image: url(' . wp_get_attachment_image_url($image['ID'], 'thumbnail') . ');"'; ?>>
			<?= wp_get_attachment_image($image['ID'], 'thumbnail', false, ['class' => 'w-100' . ($gallery_view_type == 'without-slider'? '' : ' d-none')]); ?>
		</a>
	<?php endforeach;
	if ($gallery_view_type == 'with-slider' && count($gallery) >= 10) : ?>
		<div class="col-4 <?= is_rtl()? 'pr-0' : 'pl-0'; ?> col-md-3 mb-3 col-lg-4">
			<span class="load-more-photos"><?= '+'. (count($gallery) - 8); ?></span>
		</div>
	<?php endif;
	echo '</div>';
}

function generate_lightbox_gallery_slider($gallery) {
	echo '<ul id="image-gallery-slider" class="p-0 m-0">';
	foreach ($gallery as $loop_index => $image) : ?>
        <li data-cn-index="<?= $loop_index; ?>" class="slick-slide">
			<?= wp_get_attachment_image($image['ID'], 'image-gallery-slider', false, ['title' => $image['title'], 'class' => 'w-100']);
			$photo_title = $image['title'];
			if ($photo_title) :
				echo '<span class="description">' . $image['title'] . '</span>';
			endif; ?>
		</li>
	<?php endforeach;
	echo '</ul>';
}

function value_to_text($option) {
	$options_label = [
		'airport_welcome' => 'Airport welcome service',
		'wifi' => 'Wi-Fi',
		'women_hair_salon' => 'Women hair salon',
		'men_barbershop' => 'Men barbershop',
		'elevator' => 'Elevator',
		'alarm' => 'Wake-up alarm',
		'emergency_power' => 'Emergency power',
		'parking' => 'Parking',
		'taxi_in_hotel' => 'Taxi service in hotel',
		'multipurpose_halls' => 'Multipurpose halls',
		'airport_transportation' => 'Airport transportation',
		'turkish_bath' => 'Turkish bath',
		'luggage' => 'Luggage service',
		'postal_services' => 'Postal services',
		'city_tour' => 'City tour',
		'photography_services' => 'Photography services',
		'exchange' => 'Exchange',
		'laundry' => 'Laundry',
		'atm' => 'ATM',
		'pharmacy' => 'Pharmacy',
		'clinic' => 'Clinic',
		'medical_services' => 'Medical services',
		'travel_services_office' => 'Travel services office',
		'room_service_24' => '24 hours room service',
		'reception_24' => '24 hours reception',
		'private_beach' => 'Private beach',
		'conference_room' => 'Conference room',
		'nightly_entertainment' => 'Nightly entertainment',
		'shrine_service' => 'Shrine service',
		'buffet_breakfast' => 'Buffet breakfast',
		'breakfast_in_room' => 'Breakfast in room',
		'lunch_in_room' => 'Lunch in room',
		'dinner_in_room' => 'Dinner in room',
		'safe_box' => 'Safe box',
		'shop_in_hotel' => 'Shop in hotel',
		'landscape' => 'Landscape',
		'cafe_net' => 'Cafe net',
		'car_rental' => 'Car rental',
		'lobby' => 'Lobby',
		'lobby_services' => 'Lobby services',
		'lobby_entertainment' => 'Lobby entertainment',
		'translator' => 'Translator for guests',
		'close_to_beach' => 'Close to beach',
		'close_to_airport' => 'Close to airport',
		'close_to_shrine' => 'Close to shrine',
		'prayer_room' => 'Prayer room',
		'air_conditioning' => 'Air conditioning',
		'towel_slippers' => 'Towel and slippers for everyone',
		'coffee_shop_in_room' => 'Coffee shop in room service',
		'closet_with_hangers' => 'Closet with hangers',
		'full_fridge' => 'Full fridge',
		'hairdryer' => 'Hairdryer',
		'fire_sensor' => 'Fire sensor',
		'library_in_room' => 'Library in room',
		'toothbrush_toothpaste_soap' => 'Toothbrush, toothpaste and soap',
		'children_playroom' => 'Children playroom',
		'children_park' => 'Children park',
		'horse_riding' => 'Horse riding',
		'outdoor_swimming_pool' => 'Outdoor swimming pool',
		'indoor_swimming_pool' => 'Indoor swimming pool',
		'boat_dock' => 'Boat dock',
		'squash' => 'Squash',
		'bowling' => 'Bowling',
		'pool' => 'Pool',
		'parasail' => 'Parasail',
		'water_park' => 'Water park',
		'pedicure' => 'Pedicure',
		'tableـtennis' => 'Table tennis',
		'jet_ski' => 'Jet ski',
		'jacuzzi' => 'Jacuzzi',
		'dart' => 'Dart',
		'rafting' => 'Rafting',
		'tennis_court' => 'Tennis court',
		'football_field' => 'Football field',
		'gym' => 'Gym',
		'sports_hall' => 'Sports hall',
		'sauna' => 'Sauna',
		'diving' => 'Diving',
		'karaoke' => 'Karaoke',
		'yoga_classes' => 'Yoga classes',
		'massage' => 'Massage',
		'manicure' => 'Manicure',
		'fishing' => 'Fishing',
		'sports_recreation_complex' => 'Sports and recreation complex',
		'spa_wellness_center' => 'Spa and wellness center',
		'mini_golf' => 'Mini golf',
		'restaurant' => 'Restaurant',
		'traditional_restaurant' => 'Traditional restaurant',
		'traditional_cafe' => 'Traditional cafe',
		'coffee_shop' => 'Coffee shop',
		'buffet_lunch_dinner' => 'Buffet lunch or dinner',
		'terrace' => 'Terrace',
		'satellite' => 'Satellite',
		'wc_in_corridor' => 'WC in corridor',
		'house_keeping_services' => 'House keeping services',
		'newspaper' => 'Newspaper'
	];
	_e($options_label[$option], 'citynet');
}

/* Generate automatic menus */
define("PPP", 10); // DEFAULT POSTS PER PAGE IN AUTO MENU
if(citynet_option('auto_menu') == 'on') {
	add_filter('wp_nav_menu_items', 'citynet_auto_menu', 10, 2);
	function citynet_auto_menu($items, $args)
	{
		$home_url = esc_url(home_url('/'));
		if($args->theme_location == 'primary') {
			$home_link = '<li class="menu-item menu-item-home home"><a href="' . $home_url . '">' . generate_menu_icon('home') . __('Home', 'citynet') . '</a></li>';
			$items = generate_locations_menu() . $items;
			$items = generate_tours_menu() . $items;
			$items = generate_destinations_menu() . $items;
			$items = $home_link . $items;
			return $items;
		}
		return $items;
	}
}

/* Generate destinations menu */
function generate_destinations_menu()
{
	if (is_fa()) {
		$args = array(
			'post_type' => 'country',
			'posts_per_page' => PPP,
			'orderby'   => 'meta_value_num date',
			'meta_key'  => 'priority',
			'meta_query' => array(
				'relation'=>'AND',
				array(
					'key' => 'menus',
					'value' => 'destinations',
					'compare' => 'LIKE'
				),
				array(
					'key'     => 'priority',
					'value'   => array(1,10000),
					'compare' => 'BETWEEN',
					'type' => 'NUMERIC'
				),
			)
		);
		$countries = get_posts($args);
		if($countries) {
			$items = '<li class="menu-item menu-item-has-children"><a href="' . get_post_type_archive_link("country") . '">' . generate_menu_icon('destination') . __('Destinations', 'citynet') . '</a><ul class="sub-menu">';
			foreach($countries as $country){
				$items .= generate_cities_sub_menu_in_destinations_menu($country);
			}
			$items .= '</ul></li>';
			return $items;
		}
	} else {
		$iran = get_page_by_path('iran', OBJECT, 'country');
		$args = array(
			'post_type' => 'city',
			'posts_per_page' => PPP,
			'orderby'   => 'meta_value_num date',
			'meta_key'  => 'priority',
			'meta_query' => array(
				'relation'=>'AND',
				array(
					'key' => 'menus',
					'value' => 'destinations',
					'compare' => 'LIKE'
				),
				array(
					'key'     => 'priority',
					'value'   => array(1,10000),
					'compare' => 'BETWEEN',
					'type' => 'NUMERIC'
				),
			)
		);
		$cities = get_posts($args);
		if($cities) {
			$items = '<li class="menu-item menu-item-has-children"><a href="' . esc_url(get_permalink($iran->ID)) . '">' . generate_menu_icon('destination') . __('Destinations', 'citynet') . '</a><ul class="sub-menu">';
			foreach($cities as $city){
				$items .= '<li class="menu-item"><a href="' . esc_url(get_permalink($city->ID)) . '">' . $city->post_title . '</a>';
				$items .= '</li>';
			}
			$items .= '</ul></li>';
			return $items;
		}
	}
}

function generate_cities_sub_menu_in_destinations_menu($country)
{
	$args = array(
		'post_type' => 'city',
		'posts_per_page' => PPP,
		'orderby'   => 'meta_value_num date',
		'meta_key'  => 'priority',
		'meta_query' => array(
			'relation'=>'AND',
			array(
				'key' => 'country',
				'value' => $country->ID,
				'compare' => '='
			),
			array(
				'key' => 'menus',
				'value' => 'destinations',
				'compare' => 'LIKE'
			),
			array(
				'key'     => 'priority',
				'value'   => array(1,10000),
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC'
			),
		)
	);
	$cities = get_posts($args);
	$items = '<li class="' . generate_menu_class($cities) . '"><a href="' . esc_url(get_permalink($country->ID)) . '">' . $country->post_title . '</a>';
	if($cities) {
		$items .= '<ul class="sub-menu">';
		foreach($cities as $city){
			$items .= '<li class="menu-item"><a href="'. esc_url(get_permalink($city->ID)) .'">' . $city->post_title . '</a></li>';
		}
		$items .= '</ul>';
	}
	$items .= '</li>';
	return $items;
}

/* Generate locations menu */
function generate_locations_menu()
{
	if (citynet_option('based_on') == 'categories') {
		return generate_categories_menu('location-category');
	} elseif (citynet_option('based_on') == 'destinations') {
		if (is_fa()) {
			return generate_countries_in_menu('locations');
		} else {
			return generate_cities_in_menu('locations');
		}
	}
}

/* Generate tours menu */
function generate_tours_menu()
{
	if (is_fa()) {
		$tour_type = 'tours';
		$taxonomy = 'tour-category';
	} else {
		$tour_type = 'irantours';
		$taxonomy = 'irantour-category';
	}
	if (citynet_option('based_on') == 'categories') {
		return generate_categories_menu($taxonomy);
	} elseif (citynet_option('based_on') == 'destinations') {
		if (is_fa()) {
			return generate_countries_in_menu($tour_type);
		} else {
			return generate_cities_in_menu($tour_type);
		}
	}
}

/* Generate countries in menu */
function generate_countries_in_menu($type)
{
	$post_type = rtrim($type, 's');
	$args = array(
		'post_type' => 'country',
		'posts_per_page' => PPP,
		'orderby'   => 'meta_value_num date',
		'meta_key'  => 'priority',
		'meta_query' => array(
			'relation'=>'AND',
			array(
				'key' => 'menus',
				'value' => $type,
				'compare' => 'LIKE'
			),
			array(
				'key'     => 'priority',
				'value'   => array(1,10000),
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC'
			),
		)
	);
	$countries = get_posts($args);
	if($countries) {
		$items = '<li class="menu-item menu-item-has-children"><a href="' . get_post_type_archive_link($post_type) . '">' . generate_menu_icon($post_type) . generate_menu_label($type, '') . '</a><ul class="sub-menu">';
		foreach($countries as $country){
			$items .= generate_cities_sub_menu($country, $type);
		}
		$items .= '</ul></li>';
		return $items;
	}
}

/*Generate cities in menu */
function generate_cities_in_menu($type)
{
	$post_type = rtrim($type, 's');
	$args = array(
		'post_type' => 'city',
		'posts_per_page' => PPP,
		'orderby'   => 'meta_value_num date',
		'meta_key'  => 'priority',
		'meta_query' => array(
			'relation'=>'AND',
			array(
				'key' => 'menus',
				'value' => $type,
				'compare' => 'LIKE'
			),
			array(
				'key'     => 'priority',
				'value'   => array(1,10000),
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC'
			),
		)
	);
	$cities = get_posts($args);
	if($cities) {
		$prefix = '';
		if (is_fa()) {
			$prefix = ' of ';
		}
		$items = '<li class="menu-item menu-item-has-children"><a href="' . get_post_type_archive_link($post_type) . '">' . generate_menu_icon($post_type) . generate_menu_label($type, $prefix) . '</a><ul class="sub-menu">';
		foreach($cities as $city){
			$items .= generate_posts_sub_menu($city, $type);
		}
		$items .= '</ul></li>';
		return $items;
	}
}

/* Generate categories menu */
function generate_categories_menu($taxonomy)
{
	$post_type = str_replace('-category', '', $taxonomy);
	$terms = get_terms($taxonomy, array('parent' => 0));
	if ($terms) {
		$items = '<li class="menu-item menu-item-has-children"><a href="' . get_post_type_archive_link($post_type) . '">' . generate_menu_icon($post_type) . generate_menu_label($post_type . 's', '') . '</a><ul class="sub-menu">';
		foreach ($terms as $term) {
			if (get_term_children($term->term_id, $taxonomy)) {
				$child_terms = get_terms($taxonomy, array('parent' => $term->term_id));
				$items .= '<li class="' . generate_menu_class($child_terms) . '"><a href="' . esc_url(get_term_link($term->term_id)) . '">' . $term->name . '</a>';
				$items .= generate_subcategories_menu($term, $taxonomy);
				$items .= '</li>';
			} else {
				$items .= generate_subcategory_posts($term, $taxonomy);
			}
		}
		$items .= '</ul></li>';
		return $items;
	}
}

/* Generate subcategories menu */
function generate_subcategories_menu($parent_term, $taxonomy)
{
	$terms = get_terms($taxonomy, array('parent' => $parent_term->term_id));
	if ($terms) {
		$items = '<ul class="sub-menu">';
		foreach ($terms as $term) {
			if (get_term_children($term->term_id, $taxonomy)) {
				$child_terms = get_terms($taxonomy, array('parent' => $term->term_id));
				$items .= '<li class="' . generate_menu_class($child_terms) . '"><a href="' . esc_url(get_term_link($term->term_id)) . '">' . $term->name . '</a>';
				$items .= generate_subcategories_menu($term, $taxonomy);
				$items .= '</li>';
			} else {
				$items .= generate_subcategory_posts($term, $taxonomy);
			}
		}
		$items .= '</ul>';
		return $items;
	}
}

/* Generate subcategory posts */
function generate_subcategory_posts($parent_term, $taxonomy)
{
	$post_type = str_replace('-category', '', $taxonomy);
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => PPP,
		'orderby'   => 'meta_value_num date',
		'meta_key'  => 'priority',
		'meta_query' => array(
			'relation'=>'AND',
			array(
				'key' => 'in_menu',
				'value' => true,
				'compare' => '='
			),
			array(
				'key'     => 'priority',
				'value'   => array(1,10000),
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC'
			),
		),
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'id',
				'terms' => $parent_term->term_id
			)
		)
	);
	$posts = get_posts($args);
	$items = '<li class="' . generate_menu_class($posts) . '"><a href="' . esc_url(get_term_link($parent_term->term_id)) . '">' . $parent_term->name . '</a>';
	if ($posts) {
		$items .= '<ul class="sub-menu">';
		foreach ($posts as $post) {
			$items .= '<li class="menu-item"><a href="' . esc_url(get_permalink($post->ID)) . '">' . $post->post_title . '</a></li>';
		}
		$items .= '</ul>';
	}
	$items .= '</li>';
	return $items;
}

/* Generate cities sub menu */
function generate_cities_sub_menu($country, $type)
{
	$post_type = rtrim($type, 's');
	$args = array(
		'post_type' => 'city',
		'posts_per_page' => PPP,
		'orderby'   => 'meta_value_num date',
		'meta_key'  => 'priority',
		'meta_query' => array(
			'relation'=>'AND',
			array(
				'key' => 'country',
				'value' => $country->ID,
				'compare' => '='
			),
			array(
				'key' => 'menus',
				'value' => $type,
				'compare' => 'LIKE'
			),
			array(
				'key'     => 'priority',
				'value'   => array(1,10000),
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC'
			),
		)
	);
	$cities = get_posts($args);
	$items = '<li class="' . generate_menu_class($cities) . '"><a href="' . get_post_type_archive_link($post_type) . '?country_id=' . $country->ID . '">' . generate_menu_label($type, ' of ') . $country->post_title . '</a>';
	if($cities) {
		$items .= '<ul class="sub-menu">';
		foreach($cities as $city){
			$items .= generate_posts_sub_menu($city, $type);
		}
		$items .= '</ul>';
	}
	$items .= '</li>';
	return $items;
}

/* Generate posts sub menu */
function generate_posts_sub_menu($city, $type)
{
	$key = 'city';
	$compare = '=';
	$city_id = $city->ID;
	if ($type == 'tours' || $type == 'irantours') {
		$key = 'cities';
		$compare = 'LIKE';
		$city_id = '"' . $city->ID . '"';
	}
	$post_type = rtrim($type, 's');
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => PPP,
		'orderby'   => 'meta_value_num date',
		'meta_key'  => 'priority',
		'meta_query' => array(
			'relation'=>'AND',
			array(
				'key' => $key,
				'value' => $city_id,
				'compare' => $compare
			),
			array(
				'key' => 'in_menu',
				'value' => true,
				'compare' => '='
			),
			array(
				'key'     => 'priority',
				'value'   => array(1,10000),
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC'
			),
		)
	);
	$posts = get_posts($args);
	$items = '<li class="' . generate_menu_class($posts) . '"><a href="' . get_post_type_archive_link($post_type) . '?city_id=' . $city->ID . '">' . generate_menu_label($type, ' of ') . $city->post_title . '</a>';
	if ($posts) {
		$items .= '<ul class="sub-menu">';
		foreach ($posts as $post) {
			$title = $post->post_title;
			$items .= '<li class="menu-item"><a href="' . esc_url(get_permalink($post->ID)) . '">' . $title . '</a></li>';
		}
		$items .= '</ul>';
	}
	$items .= '</li>';
	return $items;
}

/* Generate cities sub menu label */
function generate_menu_label($type, $postfix)
{
	switch ($type) {
		case 'locations':
			return __('Locations', 'citynet') . ' ';
			break;
		case 'tours':
			return __('Tours' . $postfix, 'citynet');
			break;
		case 'irantours':
			return __('Tours' . $postfix, 'citynet');
			break;
	}
}

/* Generate menu class */
function generate_menu_class($condition) {
	return $condition? 'menu-item menu-item-has-children' : 'menu-item';
}

/* Generate menu icon */
function generate_menu_icon($type) {
	include_once(ABSPATH . 'wp-admin/includes/plugin.php'); // include plugins path for checking if "Menu Icons" plugin is activated
	if (is_plugin_active('menu-icons/menu-icons.php')) {
		switch ($type) {
			case 'home':
				return '<i class="fa fa-home" aria-hidden="true"></i>';
				break;
			case 'destination':
				return '<i class="fa fa-globe" aria-hidden="true"></i>';
				break;
			case 'location':
				return '<i class="fa fa-map-marker" aria-hidden="true"></i>';
				break;
			case 'tour':
				return '<i class="fa fa-suitcase" aria-hidden="true"></i>';
				break;
			case 'irantour':
				return '<i class="fa fa-suitcase" aria-hidden="true"></i>';
				break;
		}
	}
}

/* Tour search */
add_action('wp_ajax_nopriv_get_cities', 'get_cities');
add_action('wp_ajax_get_cities', 'get_cities');
function get_cities()
{
	$nonce = $_POST['nonce'];
	if (!wp_verify_nonce($nonce, 'cnNonce'))
		die ('Not allowed.');


	$cities = get_posts(array(
		'post_type' => 'city',
		'orderby' => 'meta_value_num date',
		'meta_key' => 'priority',
		'nopaging' => true,
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key' => 'country',
				'value' => $_POST['id'],
				'compare' => '='
			)
		)
	));

	if ($cities) {
		wp_send_json($cities);
	} else {
		wp_send_json(false);
	}

}

/* ACF Google Maps API key */
function my_acf_google_map_api($api)
{
	$api['key'] = 'AIzaSyBkOSLQime293r98OZF4YTBuESIVEwWbj8';
	return $api;
}

//add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
//wp_deregister_script( 'googlemaps-api' );
//wp_register_script("googlemaps-api", "//maps.googleapis.com/maps/api/js?key=AIzaSyBkOSLQime293r98OZF4YTBuESIVEwWbj8&v=3&libraries=places",array(),'3',false);

add_filter('flexmap_google_maps_api_args', 'force_flexmap_map_language');
function force_flexmap_map_language($args)
{
	$args['language'] = get_locale();
	return $args;
}

/* Change default text translations */
add_filter('gettext', 'mw_translate_words_array');
add_filter('ngettext', 'mw_translate_words_array');
function mw_translate_words_array( $translated )
{
	$words = array(
		'پاسخ دهید' => 'ارسال دیدگاه',
	);
	$translated = str_ireplace(  array_keys($words),  $words,  $translated );
	return $translated;
}

/* Remove url from comment form */
add_filter('comment_form_default_fields', function($fields) {
	unset($fields['url']);
	return $fields;
});

//add SVG to allowed file uploads
add_action('upload_mines', function($file_types) {
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);
	return $file_types;
});

/* Allow editors to edit menus */
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );

// Force Menu Icons plugin to use theme's font awesome
add_filter('icon_picker_icon_type_stylesheet_uri', function($stylesheet_uri, $icon_type_id, $icon_type) {
	if ('fa' === $icon_type_id) {
		$file_address = citynet_cdn_or_local_resource('cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', 'css/font-awesome.min.css');
		$stylesheet_uri = sprintf(
			$file_address,
			$icon_type->version
		);
	}
	return $stylesheet_uri;
}, 10, 3);

// Add bootstrap css classes to wp tinymce
add_filter('tiny_mce_before_init', function($settings) {
	$styles = array(
		array(
			'title' => 'None',
			'value' => ''
		),
		array(
			'title' => 'Table',
			'value' => 'table',
		),
		array(
			'title' => 'Striped',
			'value' => 'table table-striped table-hover',
		),
		array(
			'title' => 'Bordered',
			'value' => 'table table-bordered table-hover',
		),
	);
	$settings['table_class_list'] = json_encode($styles);
	return $settings;
});

/* Adds parent name to object name in post objects fields */
function cn_acf_add_parent_name_to_object_fields($title, $post) {
	$parent_type = [
		'country' => 'continent',
		'state' => 'country',
		'city' => 'country'
	];
	$parent_post = get_post_meta($post->ID, $parent_type[$post->post_type], true);
	if ($parent_post) $title .= ' (' . get_the_title($parent_post) . ')';
	return $title;
};
foreach ([
	'field_5d352ff91bc69', /* State's country */
	'field_5624bca97ecc1', /* City's country */
	'field_5d6d57f0b3c2d', /* City's state */
	'field_5624c25edc0c9', /* Location's country */
	'field_5624c287dc0ca', /* Location's city */ ] as $field_key) :
	add_filter('acf/fields/post_object/result/key=' . $field_key, 'cn_acf_add_parent_name_to_object_fields', 10, 4);
endforeach;

/* Add user role to body class */
add_filter('admin_body_class', function($classes) {
	global $current_user;
	$user_role = array_shift($current_user->roles);
	$classes .= 'role-' . $user_role;
	return $classes;
});

//Adds custom columns and content to wp admin posts tables - with bellow hooks
function cn_posts_table_columns($columns) {
	global $post_type;
	unset($columns['date']);
	$columns = ['cn-post-thumb' => 'تصویر'] + $columns;
	if ($post_type == 'country') $columns['cn-continent'] = 'قاره';
	if (in_array($post_type, ['state', 'city', 'location'])) $columns['cn-country'] = 'کشور';
	if ($post_type == 'city') $columns['cn-state'] = 'ایالت/استان';
	if ($post_type == 'location') $columns['cn-city'] = 'شهر';
	if (in_array($post_type, ['tour', 'hotelpackage'])) $columns['cn-countries'] = 'کشورهای مورد بازدید';
	if (in_array($post_type, ['tour', 'irantour', 'hotelpackage'])) :
		$columns['cn-cities'] = 'شهرهای مورد بازدید';
		$columns['cn-' . $post_type . '-status'] = ($post_type == 'hotelpackage')? 'وضعیت پکیج اقامت' : 'وضعیت تور';
	endif;
	$columns['cn-date'] = 'تاریخ';
	return $columns;
}
add_filter('manage_posts_columns', 'cn_posts_table_columns');
add_filter('manage_pages_columns', 'cn_posts_table_columns');
function cn_posts_custom_column_content($column, $id) {
	if ($column == 'cn-post-thumb') {
		echo '<a href="' . get_edit_post_link() . '">';
		if (get_the_post_thumbnail()) {
			the_post_thumbnail([60, 60]);
		} else {
			$default_thumb_id = get_field(is_fa()? 'default_thumb' : 'default_thumb_en', 'option');
			echo wp_get_attachment_image($default_thumb_id, [60, 60]);
		}
		echo '</a>';
	}
	switch ($column) {
		case 'cn-continent':
			$continent = get_field('continent');
			if ($continent && !is_object($continent)) $continent = get_post($continent);
			echo $continent? '<a href="' . get_edit_post_link($continent) . '" title="ویرایش قاره">' . $continent->post_title . '</a>' : '—';
			break;
		case 'cn-country':
			$country = get_field('country');
			if ($country && !is_object($country)) $country = get_post($country);
			echo $country? '<a href="' . get_edit_post_link($country) . '" title="ویرایش کشور">' . $country->post_title . '</a>' : '—';
			break;
		case 'cn-state':
			$state = get_field('state');
			if ($state && !is_object($state)) $state = get_post($state);
			echo $state? '<a href="' . get_edit_post_link($state) . '" title="ویرایش ایالت/استان">' . $state->post_title . '</a>' : '—';
			break;
		case 'cn-city':
			$city = get_field('city');
			if ($city && !is_object($city)) $city = get_post($city);
			echo $city? '<a href="' . get_edit_post_link($city) . '" title="ویرایش شهر">' . $city->post_title . '</a>' : '—';
			break;
		case 'cn-countries':
			$countries = get_field('countries');
			if ($countries) {
				$countries_links = [];
				foreach ($countries as $country) {
					$countries_links[] = '<a href="' . get_edit_post_link($country) . '" title="ویرایش کشور">' . $country->post_title . '</a>';
				}
				echo implode(__(', ', 'citynet'), $countries_links);
			} else {
				echo '—';
			}
			break;
		case 'cn-cities':
			$cities = get_field('cities');
			if ($cities) {
				$cities_links = [];
				foreach ($cities as $city) {
					$cities_links[] = '<a href="' . get_edit_post_link($city) . '" title="ویرایش شهر">' . $city->post_title . '</a>';
				}
				echo implode(__(', ', 'citynet'), $cities_links);
			} else {
				echo '—';
			}
			break;
		case 'cn-tour-status':
			echo citynet_tour_has_expired()? '<span style="color: #ff0000;">منقضی شده</span>' : '<span style="color: #00CE07;">در دسترس</span>';
			break;
		case 'cn-irantour-status':
			$expire_date = get_field('expire_date');
			$expire_date_year = explode('-', $expire_date)[0];
			$preview_expire_date = ($expire_date_year >= 2000)? parsidate('Y/m/d', $expire_date) : str_replace('-', '/', mk_tr_num($expire_date, 'fa'));
			echo has_expired($expire_date)? '<span style="color: #ff0000;">منقضی شده در<br>' . $preview_expire_date . '</span>' : '<span style="color: #00CE07;">در دسترس تا<br>' . $preview_expire_date . '</span>';
			break;
		case 'cn-hotelpackage-status':
			echo citynet_hotelpackage_has_expired()? '<span style="color: #ff0000;">منقضی شده</span>' : '<span style="color: #00CE07;">در دسترس</span>';
			break;
		case 'cn-date':
			$gregorian_post_date = get_the_date('Y/m/d');
			$jalali_post_date = parsidate('Y/m/d', $gregorian_post_date);
			echo get_post_status_object(get_post_status())->label . '<br><abbr title="' . $gregorian_post_date . '">' . $jalali_post_date . '</abbr>';
			break;
	}
}
add_action('manage_posts_custom_column', 'cn_posts_custom_column_content', 10, 2);
add_action('manage_pages_custom_column', 'cn_posts_custom_column_content', 10, 2);
function cn_posts_custom_column_register_sortable($columns) {
	$columns['cn-date'] = 'cn-date';
	return $columns;
}
$all_post_type = citynet_get_custom_post_types();
array_push($all_post_type, 'post', 'page');
foreach ($all_post_type as $post_type) {
	add_filter('manage_edit-' . $post_type . '_sortable_columns', 'cn_posts_custom_column_register_sortable');
}
add_filter('request', function($vars) {
	if (is_admin() && $vars['orderby'] && $vars['orderby'] == 'cn-date') :
		$vars = array_merge($vars, ['orderby' => 'date']);
	endif;
	return $vars;
});
//Finish adds custom columns and content to wp admin posts tables - with bellow hooks

//Manages 'citynet_custom_post_types' option in DB that included all citynet's custom post types name
add_action('admin_init', function() {
	$new_custom_post_types = implode(',', get_post_types(['public' => true, '_builtin' => false], 'names'));
	$before_custom_post_types = get_option('citynet_custom_post_types');
	if (!$before_custom_post_types) {
		add_option('citynet_custom_post_types', $new_custom_post_types);
	} elseif ($new_custom_post_types != $before_custom_post_types) {
		update_option('citynet_custom_post_types', $new_custom_post_types);
	}
});

//Returns all citynet custom post types name
function citynet_get_custom_post_types() {
	$citynet_custom_post_types = explode(',', get_option('citynet_custom_post_types'));
	return $citynet_custom_post_types;
}

//Returns an array of must activated plugins
function cn_get_must_activated_plugins() {
	$must_activated_plugins_file = [
		'advanced-custom-fields-pro/acf.php',
		'classic-editor/classic-editor.php',
		'aryo-activity-log/aryo-activity-log.php',
		'contact-form-7/wp-contact-form-7.php',
		'tinymce-advanced/tinymce-advanced.php',
		'contact-form-7-to-database-extension/contact-form-7-db.php'
	];
	return $must_activated_plugins_file;
}

//Returns true if all must activated plugins are active, or array of disabled names
function cn_check_must_activated_plugins() {
	$disabled_plugins_name = [];
	foreach (cn_get_must_activated_plugins() as $plugin_file) :
		if (!is_plugin_active($plugin_file)) :
			$temp_name = explode('/', $plugin_file)[1];
			$temp_name = str_replace('.php', '', $temp_name);
			$temp_name = str_replace('-', ' ', $temp_name);
			$disabled_plugins_name[] = ucwords($temp_name);
		endif;
	endforeach;
	return $disabled_plugins_name? $disabled_plugins_name : true;
}

//Edits plugins actions (included deactivation link)
add_filter('plugin_action_links', function($actions, $plugin_file) {
	//citynet_print_r($plugin_file);

	if (array_key_exists('deactivate', $actions) && in_array($plugin_file, cn_get_must_activated_plugins())) :
		if (!citynet_is_developer()) :
			unset($actions['deactivate']);
		endif;
		$actions['cn_must_activated'] = '<a style="font-weight: bold; color: red;">ضروری</a>';
	endif;

	return $actions;
}, 10, 4);

//Changes author links from username to nickname - with 2 bellow hooks
add_filter('author_link', function($link, $author_id, $author_nicename) {
	$author_nickname = get_user_meta($author_id, 'nickname', true);
	if ($author_nickname) {
		$link = str_replace($author_nicename, $author_nickname, $link);
	}
	return $link;
}, 10, 3);
add_filter('request', function($query_vars) {
	if (array_key_exists('author_name', $query_vars)) {
		global $wpdb;
		$author_id = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM {$wpdb->usermeta} WHERE meta_key='nickname' AND meta_value = %s", $query_vars['author_name']));
		if ($author_id) {
			$query_vars['author'] = $author_id;
			unset($query_vars['author_name']);
		}
	}
	return $query_vars;
});

//Filters (sanitize) "contact form 7" data & add jalali submitted date to submitted data
add_filter('wpcf7_posted_data', function($posted_data) {
	foreach ($posted_data as $data_name => $data_value) {
		$posted_data[$data_name] = mk_tr_num($posted_data[$data_name]);
		$posted_data[$data_name] = sanitize_text_field($posted_data[$data_name]);
	}
	$iran_date = new DateTime(null, new DateTimeZone('Asia/Tehran'));
	$jalali_date = parsidate('Y/m/d H:i:s', $iran_date->format('Y-m-d H:i:s'), 'eng');
	$posted_data['cn_submit_date'] = $jalali_date;
	return $posted_data;
}, 10, 1);

//Adds hint text for post's thumbnail in admin area
add_filter('admin_post_thumbnail_html', function($content, $post_id) {
	$size = '250x150';
	$caption = '<p>سایز ' . $size . ' پیکسل باشد</p>';
	return $caption . $content;
}, 10, 2);

//Returns user browser name in one of the two string format (main name or code format)
function citynet_get_browser_name($code_format = false) {
	$browsers_list = [
		'is_winIE'  => 'Windows Internet Explorer',
		'is_IE'     => 'Internet Explorer',
		'is_iphone' => 'iPhone Safari',
		'is_chrome' => 'Google Chrome',
		'is_safari' => 'Safari',
		'is_NS4'    => 'Netscape 4',
		'is_opera'  => 'Opera',
		'is_macIE'  => 'Mac Internet Explorer',
		'is_gecko'  => 'Firefox',
		'is_lynx'   => 'Lynx',
		'is_edge'   => 'Microsoft Edge'
	];
	$detected_browser = null;
	foreach ($browsers_list as $browser_code => $browser_name) {
		if ($GLOBALS[$browser_code]) {
			$detected_browser = $browser_name;
			break;
		}
	}
	if (!$detected_browser) {
		$other_browsers = ['Android', 'Kindle', 'BlackBerry', 'Opera Mini', 'Opera Mobi'];
		foreach ($other_browsers as $browser_name) {
			if (strpos($_SERVER['HTTP_USER_AGENT'], $browser_name) !== false) {
				$detected_browser = $browser_name;
				break;
			}
		}
	}
	if (!$detected_browser) $detected_browser = 'Unknown';
	return $code_format? str_replace(' ', '-', strtolower($detected_browser)) : $detected_browser;
}

//Converts all numbers in string to price format and returns it
function citynet_string_to_price($price_string) {
	$filtered_price = strtr($price_string, ['.' => '', '/' => '', ',' => '', '،' => '']);
	$converted_string = preg_replace_callback("|(\d+)|", function ($matches) {
		return number_format($matches[1]);
	}, $filtered_price);
	return is_rtl()? mk_tr_num($converted_string, 'fa') : $converted_string;
}

//Returns an array included all countries ('object' or 'id') that has any item (state, city, location, media) in site
function citynet_get_countries_has_item($item_post_type, $output_type = 'object') {
	$countries_has_item = [];
	$items_args = citynet_generate_args($item_post_type);
	$items_args['fields'] = 'ids';
	$all_items = get_posts($items_args);
	if ($all_items) :
		foreach ($all_items as $item) :
            if ($item_post_type == 'tour') :

                $tour_countries = get_field('countries', $item);
	            if ($tour_countries) :
                    foreach ($tour_countries as $country) :
	                    if (!in_array($country->ID, wp_list_pluck($countries_has_item, 'ID'))) :
		                    $countries_has_item[] = $country;
	                    endif;
                    endforeach;
                endif;

            elseif (in_array($item_post_type, ['media', 'post'])) :

                $item_related_places = get_field('related-places', $item);
                if ($item_related_places) :
                    foreach ($item_related_places as $place) :
                        $country = null;
                        if ($place->post_type == 'country') :
                            $country = $place;
                        elseif ($place->post_type != 'continent') :
	                        $country = get_field('country', $place->ID);
                        endif;
                        if ($country) :
	                        if (!is_object($country)) { $country = get_post($country); }
                            if (!in_array($country->ID, wp_list_pluck($countries_has_item, 'ID'))) :
                                $countries_has_item[] = $country;
                            endif;
                        endif;
                    endforeach;
                endif;

            elseif ($item_post_type != 'irantour') :

	            $item_country = get_field('country', $item);
	            if ($item_country) :
		            if (!is_object($item_country)) $item_country = get_post($item_country);
		            if (!in_array($item_country->ID, wp_list_pluck($countries_has_item, 'ID'))) $countries_has_item[] = $item_country;
	            endif;

            endif;
		endforeach;
	endif;
	return ($output_type == 'object')? $countries_has_item : wp_list_pluck($countries_has_item, 'ID');
}

//Returns an array included all continents ('object' or 'id') that has any item (country, state, city, location, media, post) in site
function citynet_get_continents_has_item($item_post_type, $output_type = 'object', $countries_has_item = []) {
	$continents_has_item = $countries = [];
	if ($item_post_type == 'country') :
		$countries_args = citynet_generate_args('country');
		$countries = get_posts($countries_args);
	else :
		if ($countries_has_item) :
			if (is_object($countries_has_item[0])) :
				$countries = $countries_has_item;
			else :
				foreach ($countries_has_item as $country) :
					$countries[] = get_post($country);
				endforeach;
			endif;
		else :
			$countries = citynet_get_countries_has_item($item_post_type);
		endif;
	endif;
	if ($countries) :
		foreach ($countries as $country) :
			$country_continent_id = get_field('continent', $country->ID);
	        if ($country_continent_id) :
                if (!in_array($country_continent_id, wp_list_pluck($continents_has_item, 'ID'))) $continents_has_item[] = get_post($country_continent_id);
                if (count($continents_has_item) == 5) break;
            endif;
		endforeach;
	endif;
	if (in_array($item_post_type, ['media', 'post'])) :
        $continents_args = citynet_generate_args('continent');
		$continents_args['fields'] = 'ids';
	    $continents = get_posts($continents_args);
	    if ($continents) :
            foreach ($continents as $continent_id) :
                if (citynet_get_place_related_items($item_post_type, $continent_id)) :
	                if (!in_array($continent_id, wp_list_pluck($continents_has_item, 'ID'))) $continents_has_item[] = get_post($continent_id);
	                if (count($continents_has_item) == 5) break;
                endif;
            endforeach;
        endif;
    endif;
	return ($output_type == 'object')? $continents_has_item : wp_list_pluck($continents_has_item, 'ID');
}

//Returns an array included all states ('object' or 'id') that has any item (location, media, post, tour, irantour) in site
function citynet_get_states_has_item($item_post_type, $output_type = 'object') {
	$states_has_item = [];
	if (in_array($item_post_type, ['media', 'post'])) :

		$items_args = citynet_generate_args($item_post_type);
		$items_args['fields'] = 'ids';
		$all_items = get_posts($items_args);
		if ($all_items) :
			foreach ($all_items as $item) :
				$related_places = get_field('related-places', $item);
				if ($related_places) :
					foreach ($related_places as $place) :
						$state = null;
						if ($place->post_type == 'state') :
							$state = $place;
                        elseif ($place->post_type == 'city') :
							$state = get_field('state', $place->ID);
						endif;
						if ($state) :
							if (!is_object($state)) { $state = get_post($state); }
							if (!in_array($state->ID, wp_list_pluck($states_has_item, 'ID'))) :
								$states_has_item[] = $state;
							endif;
						endif;
					endforeach;
				endif;
			endforeach;
		endif;

    elseif (in_array($item_post_type, ['tour', 'irantour'])) :

	    $items_args = citynet_generate_args($item_post_type);
	    $items_args['fields'] = 'ids';
	    $all_items = get_posts($items_args);
	    if ($all_items) :
		    foreach ($all_items as $item) :
			    $tour_cities = get_field('cities', $item);
			    if ($tour_cities) :
				    foreach ($tour_cities as $city) :
                        $city_state = get_field('state', $city->ID);
					    if ($city_state && !in_array($city_state, wp_list_pluck($states_has_item, 'ID'))) :
						    $states_has_item[] = get_post($city_state);
					    endif;
				    endforeach;
			    endif;
            endforeach;
	    endif;

    else :

	    $states_args = citynet_generate_args('state');
	    $states_args['fields'] = 'ids';
	    $all_states = get_posts($states_args);
	    if ($all_states) :
		    foreach ($all_states as $state) :
			    $state_items = citynet_get_state_related_items($item_post_type, $state);
			    if ($state_items) :
				    $states_has_item[] = get_post($state);
			    endif;
		    endforeach;
	    endif;

    endif;
	return ($output_type == 'object')? $states_has_item : wp_list_pluck($states_has_item, 'ID');
}

//Returns an array included all cities ('object' or 'id') that has any item (location, post, tour, irantour) in site
function citynet_get_cities_has_item($item_post_type, $output_type = 'object') {
	$cities_has_item = [];
	$items_args = citynet_generate_args($item_post_type);
	$items_args['fields'] = 'ids';
	$all_items = get_posts($items_args);
	if ($all_items) :
		foreach ($all_items as $item) :
            if (in_array($item_post_type, ['tour', 'irantour'])) :

	            $tour_cities = get_field('cities', $item);
	            if ($tour_cities) :
		            foreach ($tour_cities as $city) :
			            if (!in_array($city->ID, wp_list_pluck($cities_has_item, 'ID'))) :
				            $cities_has_item[] = get_post($city);
			            endif;
		            endforeach;
	            endif;

			elseif (in_array($item_post_type, ['media', 'post'])) :

				$item_related_places = get_field('related-places', $item);
				if ($item_related_places) :
					foreach ($item_related_places as $place) :
						$city = null;
						if ($place->post_type == 'city') :
							$city = $place;
						endif;
						if ($city) :
							if (!is_object($city)) { $city = get_post($city); }
							if (!in_array($city->ID, wp_list_pluck($cities_has_item, 'ID'))) :
								$cities_has_item[] = $city;
							endif;
						endif;
					endforeach;
				endif;

			else :

				$item_city = get_field('city', $item);
				if ($item_city) :
					if (!is_object($item_city)) $item_city = get_post($item_city);
					if (!in_array($item_city->ID, wp_list_pluck($cities_has_item, 'ID'))) $cities_has_item[] = $item_city;
				endif;

            endif;
		endforeach;
	endif;
	return ($output_type == 'object')? $cities_has_item : wp_list_pluck($cities_has_item, 'ID');
}

//Returns an array included all states ('object' or 'id') that has any city in site
function citynet_get_states_has_city($output_type = 'object') {
	$states_has_city = [];
	$cities_args = citynet_generate_args('city');
	$cities_args['fields'] = 'ids';
	$all_cities = get_posts($cities_args);
	if ($all_cities) :
		foreach ($all_cities as $city) :
			$city_state = get_post(get_field('state', $city));
			if ($city_state && !in_array($city_state->ID, wp_list_pluck($states_has_city, 'ID'))) $states_has_city[] = $city_state;
		endforeach;
	endif;
	return ($output_type == 'object')? $states_has_city : wp_list_pluck($states_has_city, 'ID');
}

//Returns related items for selected post by base_id - null = current post
function citynet_get_related_items($items_post_type, $base_id = null, $output_type = 'object', $count = 'all', $offset = 0) {
    $base_post_id = $base_post_type = null;
    if (!$base_id) :
        global $post;
        $base_post_id = $post->ID;
        $base_post_type = $post->post_type;
    else :
        $base_post_id = $base_id;
        $base_post_type = get_post_type($base_id);
	endif;

	if ( in_array( $items_post_type, ['tour', 'irantour'] ) ) :
		switch ( $base_post_type ) :
			case 'country':
				$related_items = citynet_get_country_tours( $base_post_id, $count, $offset );
				break;
			case 'state' :
				$related_items = citynet_get_state_tours( $base_post_id, $count, $offset );
				break;
			case 'city' :
				$related_items = citynet_get_city_tours( $items_post_type, $base_post_id, $count, $offset );
				break;
		endswitch;
	elseif ( $items_post_type == 'hotelpackage' ) :
		switch ( $base_post_type ) :
			case 'country':
				$related_items = citynet_get_country_hotelpackages( $base_post_id, $count, $offset );
				break;
			case 'state' :
				$related_items = citynet_get_state_hotelpackages( $base_post_id, $count, $offset );
				break;
			case 'city' :
				$related_items = citynet_get_city_hotelpackages( $base_post_id, $count, $offset );
				break;
		endswitch;
	elseif ($items_post_type == 'location' && $base_post_type == 'state') :
        $related_items = citynet_get_state_related_items($items_post_type, $base_post_id, $count, $offset);
    elseif (in_array($items_post_type, ['media', 'post'])) :
        $related_items = citynet_get_place_related_items($items_post_type, $base_post_id, $count, $offset);
    else :
	    $related_items_condition = [$base_post_type, '=', $base_post_id];
	    $orderby = in_array($items_post_type, ['post', 'continent', 'state'])? 'date' : 'priority';
	    $items_args = citynet_generate_args($items_post_type, ($count == 'all')? -1 : $count, $offset, [], false, $orderby, [$related_items_condition]);
	    $related_items = get_posts($items_args);
	endif;
	return ($output_type == 'object')? $related_items : wp_list_pluck($related_items, 'ID');
}

//Returns country's related tours object
function citynet_get_country_tours($country_id, $count = 'all', $offset = 0) {
    $related_tours = [];
	if (is_fa()) {
		$all_tours_args = citynet_generate_args('tour', -1, 0, [], false, 'priority');
        $all_tours = get_posts($all_tours_args);
        if ($all_tours) {
			$matched_tours_count = 0;
            foreach ($all_tours as $tour) {
				$tour_countries_id = wp_list_pluck(get_field('countries', $tour->ID), 'ID');
                foreach ($tour_countries_id as $tour_country_id) {
                    if ($tour_country_id == $country_id && !in_array($tour->ID, wp_list_pluck($related_tours, 'ID'))) {
						$matched_tours_count++;
						if ($offset == 0 || $matched_tours_count > $offset) $related_tours[] = $tour;
                        break;
                    }
				}
				if ($count != 'all' && count($related_tours) == $count) break;
            }
        }
	} else {
		$all_tours_args = citynet_generate_args('irantour', ($count == 'all')? -1 : $count, $offset, [], false, 'priority');
		$related_tours = get_posts($all_tours_args);
    }
	return $related_tours;
}

//Returns country's related hotelpackages object
function citynet_get_country_hotelpackages($country_id, $count = 'all', $offset = 0) {
    $related_hotelpackages = [];
	$all_hotelpackages_args = citynet_generate_args('hotelpackage', -1, 0, [], false, 'priority');
	$all_hotelpackages = get_posts($all_hotelpackages_args);
	if ($all_hotelpackages) {
		$matched_hotelpackages_count = 0;
		foreach ($all_hotelpackages as $hotelpackage) {
			$hotelpackage_countries_id = wp_list_pluck(get_field('countries', $hotelpackage->ID), 'ID');
			foreach ($hotelpackage_countries_id as $hotelpackage_country_id) {
				if ($hotelpackage_country_id == $country_id && !in_array($hotelpackage->ID, wp_list_pluck($related_hotelpackages, 'ID'))) {
					$matched_hotelpackages_count++;
					if ($offset == 0 || $matched_hotelpackages_count > $offset) $related_hotelpackages[] = $hotelpackage;
					break;
				}
			}
			if ($count != 'all' && count($related_hotelpackages) == $count) break;
		}
	}
	return $related_hotelpackages;
}

//Returns state's related tours object
function citynet_get_state_tours($state_id, $count = 'all', $offset = 0) {
    $related_tours = [];
    $tour_type = is_fa()? 'tour' : 'irantour';
	$all_tours_args = citynet_generate_args($tour_type, -1, 0, [], false, 'priority');
	$state_related_cities_id = citynet_get_related_items('city', $state_id, 'id');
	$all_tours = get_posts($all_tours_args);
	if ($all_tours) {
		$matched_tours_count = 0;
		foreach ($all_tours as $tour) {
			$tour_cities_id = wp_list_pluck(get_field('cities', $tour->ID), 'ID');
			foreach ($tour_cities_id as $tour_city_id) {
				if (in_array($tour_city_id, $state_related_cities_id) && !in_array($tour->ID, wp_list_pluck($related_tours, 'ID'))) {
					$matched_tours_count++;
					if ($offset == 0 || $matched_tours_count > $offset) $related_tours[] = $tour;
					break;
				}
			}
			if ($count != 'all' && count($related_tours) == $count) break;
		}
	}
	return $related_tours;
}

//Returns state's related hotelpackages object
function citynet_get_state_hotelpackages($state_id, $count = 'all', $offset = 0) {
    $related_hotelpackages = [];
	$all_hotelpackages_args = citynet_generate_args('hotelpackage', -1, 0, [], false, 'priority');
	$state_related_cities_id = citynet_get_related_items('city', $state_id, 'id');
	$all_hotelpackages = get_posts($all_hotelpackages_args);
	if ($all_hotelpackages) {
		$matched_hotelpackages_count = 0;
		foreach ($all_hotelpackages as $hotelpackage) {
			$hotelpackage_cities_id = wp_list_pluck(get_field('cities', $hotelpackage->ID), 'ID');
			foreach ($hotelpackage_cities_id as $hotelpackage_city_id) {
				if (in_array($hotelpackage_city_id, $state_related_cities_id) && !in_array($hotelpackage->ID, wp_list_pluck($related_hotelpackages, 'ID'))) {
					$matched_hotelpackages_count++;
					if ($offset == 0 || $matched_hotelpackages_count > $offset) $related_hotelpackages[] = $hotelpackage;
					break;
				}
			}
			if ($count != 'all' && count($related_hotelpackages) == $count) break;
		}
	}
	return $related_hotelpackages;
}

//Returns city's related items (tour, irantour) as object
function citynet_get_city_tours($items_post_type, $city_id, $count = 'all', $offset = 0) {
    $related_tours = [];
    $tours_args = citynet_generate_args($items_post_type, -1, 0, [], false, 'priority');
    $tours_args['fields'] = 'ids';
    $all_tours = get_posts($tours_args);
	if ($all_tours) :
		$matched_tours_count = 0;
        foreach ($all_tours as $tour) :
            $tour_cities = get_field('cities', $tour);
            if ($tour_cities) :
				if (in_array($city_id, wp_list_pluck($tour_cities, 'ID'))) :
					$matched_tours_count++;
                    if ($offset == 0 || $matched_tours_count > $offset) $related_tours[] = get_post($tour);
                endif;
			endif;
			if ($count != 'all' && count($related_tours) == $count) break;
        endforeach;
    endif;
    return $related_tours;
}

//Returns city's related hotelpackages as object
function citynet_get_city_hotelpackages($city_id, $count = 'all', $offset = 0) {
    $related_hotelpackages = [];
    $hotelpackages_args = citynet_generate_args('hotelpackage', -1, 0, [], false, 'priority');
    $hotelpackages_args['fields'] = 'ids';
    $all_hotelpackages = get_posts($hotelpackages_args);
	if ($all_hotelpackages) :
		$matched_hotelpackages_count = 0;
        foreach ($all_hotelpackages as $hotelpackage) :
            $hotelpackage_cities = get_field('cities', $hotelpackage);
            if ($hotelpackage_cities) :
				if (in_array($city_id, wp_list_pluck($hotelpackage_cities, 'ID'))) :
					$matched_hotelpackages_count++;
                    if ($offset == 0 || $matched_hotelpackages_count > $offset) $related_hotelpackages[] = get_post($hotelpackage);
                endif;
			endif;
			if ($count != 'all' && count($related_hotelpackages) == $count) break;
        endforeach;
    endif;
    return $related_hotelpackages;
}

//Returns state's related items (location) as object
function citynet_get_state_related_items($items_post_type, $state_id, $count = 'all', $offset = 0) {
    $related_items = [];
	$related_cities = citynet_get_related_items('city', $state_id, 'object');
	foreach (wp_list_pluck($related_cities, 'ID') as $city_id) :
		$new_items = citynet_get_related_items($items_post_type, $city_id, 'object', $count);
		for ($i = 1; $i <= $offset; $i++) :
			array_shift($new_items);
			$offset--;
		endfor;
		$related_items += $new_items;
		$count -= count($new_items);
		if ($count == 0) break;
    endforeach;
	return $related_items;
}

//Returns place's related items (media, post) as object
function citynet_get_place_related_items($items_post_type, $base_place_id = null, $count = 'all', $offset = 0) {
    if (!$base_place_id) :
        global $post;
        $base_place_id = $post->ID;
    endif;
	$related_items = [];
    $items_args = citynet_generate_args($items_post_type);
	$items_args['fields'] = 'ids';
    $all_items = get_posts($items_args);
	if ($all_items) :
		$matched_items_count = 0;
        foreach ($all_items as $item_id) :
            $related_places = get_field('related-places', $item_id);
            if ($related_places) :
                foreach ($related_places as $place) :
					if ($place->ID == $base_place_id && !in_array($item_id, wp_list_pluck($related_items, 'ID'))) :
						$matched_items_count++;
	                    if ($offset == 0 || $matched_items_count > $offset) $related_items[] = get_post($item_id);
                        break;
                    endif;
				endforeach;
				if ($count != 'all' && count($related_items) == $count) break;
            endif;
        endforeach;
    endif;
    return $related_items;
}

//Returns user device type
function citynet_get_device_type() {
	require_once('mobile-detect.php');
	$device = new Mobile_Detect;
	$device_type = 'mobile';
	if ($device->isTablet()) {
		$device_type = 'tablet';
	} elseif (!$device->isMobile()) {
		$device_type = 'computer';
	}
	return $device_type;
}

//Checks if current device is selected type (one string or array) of ['mobile', 'tablet', 'computer'] or not
function citynet_is_device_types($types) {
	if (is_array($types)) {
		return in_array(citynet_get_device_type(), $types);
	} elseif (is_string($types)) {
		return (citynet_get_device_type() == $types);
	}
}

//Adds custom classes to body tag
add_filter('body_class', function($classes) {
	$classes[] = 'language-' . strtolower(get_bloginfo('language'));
	$classes[] = 'device-' . citynet_get_device_type();
	$classes[] = 'browser-' . citynet_get_browser_name(true);
	$classes[] = 'protocol-' . citynet_get_protocol();
	$classes[] = 'host-' . (citynet_is_localhost()? 'offline' : 'online');
	$classes[] = citynet_is_panel_pages()? 'page-template-app-templates' : '';
	return $classes;
});

//Stops access to wordpress extra APIs for guest people
add_filter('rest_endpoints', function($endpoints){
	if (!is_user_logged_in()) {
		if (isset($endpoints['/wp/v2/users'])) {
			unset($endpoints['/wp/v2/users']);
		}
		if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
			unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
		}
		if (isset($endpoints['/wp/v2/posts'])) {
			unset($endpoints['/wp/v2/posts']);
		}
		if (isset($endpoints['/wp/v2/posts/(?P<id>[\d]+)'])) {
			unset($endpoints['/wp/v2/posts/(?P<id>[\d]+)']);
		}
		if (isset($endpoints['/wp/v2/pages'])) {
			unset($endpoints['/wp/v2/pages']);
		}
		if (isset($endpoints['/wp/v2/pages/(?P<id>[\d]+)'])) {
			unset($endpoints['/wp/v2/pages/(?P<id>[\d]+)']);
		}
	}
	return $endpoints;
});

//Shows same message for wrong submitted username or password
add_filter('login_errors', function() {
	return __('Username or password is wrong!', 'citynet');
});

//Hides wordpress version from front side
add_filter('the_generator', function() {
	return '';
});

//Changes wordpress login forms logo
add_action('login_enqueue_scripts', function() {
	$logo_address = wp_get_attachment_image_url( citynet_option( 'logo' ), 'full' ); ?>
    <style type="text/css">
    body.login div#login h1 a {
        background-image: url(<?= $logo_address; ?>);
        background-size: unset;
        width: <?= getimagesize($logo_address)[0] . 'px'; ?>;
        height: <?= getimagesize($logo_address)[1] . 'px'; ?>;
    }
    </style><?php
});

//Changes wordpress login forms logo's link
add_filter('login_headerurl', function() {
	return home_url();
});

//Changes wordpress login forms logo's title
add_filter('login_headertext', function() {
	return get_option('blogname');
});

//Returns site's protocol
function citynet_get_protocol() {
	return is_ssl()? 'https' : 'http';
}

//Checks a url is accessible or not
function citynet_url_is_accessible($url) {
	// $timeout = 10;
	// $ch = curl_init();
	// curl_setopt ($ch, CURLOPT_URL, $url);
	// curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	// curl_setopt ($ch, CURLOPT_TIMEOUT, $timeout);
	// $http_respond = curl_exec($ch);
	// $http_respond = trim(strip_tags($http_respond));
	// $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	// return in_array($http_code, ['200', '302']);
	// curl_close($ch);
	return true;
}

//Returns accessible address for site resources
function citynet_cdn_or_local_resource($cdn, $local) {
	$cdn_address = citynet_get_protocol() . '://' . $cdn;
	if (citynet_is_localhost()) {
		return get_template_directory_uri() . '/' . $local;
	} else {
		return citynet_url_is_accessible($cdn_address)? $cdn_address : get_template_directory_uri() . '/' . $local;
	}
}



//Returns is server on localhost or not
function citynet_is_localhost() {
	$local_addresses = ['127.0.0.1', '::1'];
	return in_array($_SERVER['REMOTE_ADDR'], $local_addresses);
}

//Returns is site's server for citynet or not
function citynet_is_our_server() {
	$citynet_servers = ['185.2.12.131', '185.105.185.149'];
	return in_array( $_SERVER['SERVER_ADDR'], $citynet_servers );
}

//Returns current site's domain
function citynet_get_domain() {
	$site_domain = $_SERVER['SERVER_NAME'];
	if ( substr( $site_domain, 0, 4 ) == 'www.' ) :
		$site_domain = substr( $site_domain, 4 );
	endif;
	return $site_domain;
}

//Manage columns of location-category taxonomy's terms list - by 2 bellow hooks
add_filter( 'manage_edit-location-category_columns', function( $columns ) {
	$columns['citynet-secured'] = 'محافظت';
	return $columns;
} );
add_filter( 'manage_location-category_custom_column', function( $content, $column_id, $term_id ) {
	if ( $column_id == 'citynet-secured' ) :
		$content = get_term_meta( $term_id, 'secure-term', true )? 'محافظت شده' : '—';
	endif;
	return $content;
}, 10, 3 );

//Remove edit, fast edit & delete actions for secured terms of location-category taxonomy's terms list
add_action( 'location-category_row_actions', function( $actions, $term ) {
	$args = [
		'taxonomy'	 => 'location-category',
		'meta_key'	 => 'secure-term',
		'meta_value' => true,
		'hide_empty' => false,
		'fields'	 => 'slugs'
	];
	$secured_terms = get_terms( $args );
    if( !citynet_is_developer() && in_array( $term->slug, $secured_terms ) ) :
        unset( $actions['edit'] );
        unset( $actions['inline hide-if-no-js'] );
        unset( $actions['delete'] );
	endif;
    return $actions;
}, 10, 2 );

//Returns all social networks information as array
function citynet_get_all_social_networks( $featured = false ) {
	$response = [];
	$social_networks = citynet_repeater( 'social-networks', ['sn-type', 'sn-url', 'sn-featured'], 'option' );

	if ( $social_networks ) :
		$socials_different_icon = ['facebook' => 'facebook-f', 'telegram' => 'paper-plane', 'aparat' => 'film', 'pinterest' => 'pinterest-p'];

		foreach ( $social_networks as $social ) :
			$is_social_featured = $social['sn-featured'];
			if ( ! $featured || ( $featured && $is_social_featured ) ) :
				$social_id = $social['sn-type'];
				$social_title = ucfirst( $social_id );
				$social_icon = isset( $socials_different_icon[$social_id] )? $socials_different_icon[$social_id] : $social_id;
				$response[$social_id] = ['icon' => $social_icon , 'title' => $social_title, 'address' => $social['sn-url'], 'featured' => $is_social_featured];
			endif;
		endforeach;
	endif;

	return $response;
}

//Generate html of all defined social networks and echo it
function citynet_generate_social_networks($ul_id = null, $ul_classes = [], $li_classes = [], $featured = false) {
	$social_networks = citynet_get_all_social_networks($featured);
	$html = '';
	if ($social_networks) {
		$html = '<ul';
		if ($ul_id) $html .= ' id="' . $ul_id . '"';

		if (is_string($ul_classes)) $ul_classes = explode(' ', $ul_classes);
		array_unshift($ul_classes, 'social-networks');
		$html .= ' class="' . implode(' ', array_unique($ul_classes)) . '">';

		if (is_string($li_classes)) $li_classes = explode(' ', $li_classes);
		foreach ($social_networks as $social_id => $social) {
			$this_li_classes = array_merge(['social', $social_id, $social['featured']? 'featured' : 'normal'], $li_classes);
			$html .= '<li class=" mx-2 ' . implode(' ', array_unique($this_li_classes)) . '">';
			$html .= '<a href="' . $social['address'] . '" title="' . $social['title'] . '" target="_blank" rel="external nofollow"><i class="fa fa-' . $social['icon'] . '"></i></a>';
			$html .= '</li>';
		}

		$html .= '</ul>';
	}
	echo $html;
}

//An ajax hook for return related cities info of selected countries in ACF field 'countries' - calls in admin.js
function citynet_cities_of_selected_countries_ajax_request() {
	if (isset($_REQUEST)) {
		$selected_countries = array_map('intval', $_REQUEST['countriesID']);
		$selected_cities_info = [];
		$args = [
			'post_type' => 'city',
			'nopaging'  => true,
			'posts_per_page' => -1,
			'meta_query' => [
				['key' => 'country', 'compare' => '=']
			]
		];
		foreach ($selected_countries as $country_id) {
			$args['meta_query'][0]['value'] = $country_id;
			$selected_cities = get_posts($args);
			if ($selected_cities) {
				foreach ($selected_cities as $city) {
					$selected_cities_info[] = ['id' => $city->ID, 'title' => $city->post_title, 'country-id' => $country_id];
				}
			}
		}
		echo json_encode($selected_cities_info);
	}
	die();
}
add_action('wp_ajax_citynet_cities_of_selected_countries_ajax_request', 'citynet_cities_of_selected_countries_ajax_request');

//Checks is current user from Citynet group or not
function citynet_is_developer() {
	$is_citynet_developer = false;
	if (is_user_logged_in()) {
		$current_user = wp_get_current_user();
		$len = strlen('@citynet.ir');
		if (substr($current_user->user_email, -$len) === '@citynet.ir') $is_citynet_developer = true;
	}
	return $is_citynet_developer;
}

//Adds wp alarms on each page you want
add_action('admin_notices', function() {
	global $pagenow;
	if ($pagenow == 'edit.php' && get_post_type() == 'continent') {
		echo '<div class="notice notice-warning is-dismissible">
             <p>بنا به دلایل فنی، تنها کارکنان گروه سیتی نت قادر به حذف و اضافه قاره هستند! شما کاربر عزیز از کارکنان سیتی نت: <b>' . (citynet_is_developer()? 'هستید' : 'نمی باشید') . '</b></p>
        </div>';
	}

	if ($pagenow == 'edit-tags.php' && isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'location-category') {
		echo '<div class="notice notice-warning is-dismissible">
             <p>بنا به دلایل فنی، تنها کارکنان گروه سیتی نت قادر به ایجاد، ویرایش و حذف گروه محافظت شده هستند! شما کاربر عزیز از کارکنان سیتی نت: <b>' . (citynet_is_developer()? 'هستید' : 'نمی باشید') . '</b></p>
        </div>';
	}

	if ($pagenow == 'plugins.php') {
		echo '<div class="notice notice-warning is-dismissible">
             <p>بنا به دلایل فنی، تنها کارکنان گروه سیتی نت قادر به غیر فعال سازی افزونه های <span style="font-weight: bold; color: red;">ضروری</span> هستند! شما کاربر عزیز از کارکنان سیتی نت: <b>' . (citynet_is_developer()? 'هستید' : 'نمی باشید') . '</b></p>
        </div>';
	}

	$mu_plugins_check = cn_check_must_activated_plugins();
	if (is_array($mu_plugins_check)) : //At least one of the must activated plugins is disabled
		$list_html = '<ol><li>' . implode('</li><li>', $mu_plugins_check) . '</li></ol>';
		echo '<div class="notice notice-error">
             <p>افزونه های لیست شده زیر از افزونه های <span style="font-weight: bold; color: red;">ضروری</span> هستند که هم اکنون غیر فعال و یا در دسترس نیستند. لطفا هرچه سریعتر آنها را فعال نمایید. <a href="' . admin_url('plugins.php') . '">صفحه افزونه ها</a>
             </p>' . $list_html . '
        </div>';
	endif;
});

//Returns built wp_query args based on your needs
function citynet_generate_args($post_type = 'post', $posts_per_page = -1, $offset = 0, $terms = [], $featured = false, $orderby = 'date', $extra_meta = [], $force_taxonomy = null) {
	$args = [
		'post_type' => $post_type,
		'posts_per_page' => $posts_per_page
	];
	//nopaging & offset
	if ($posts_per_page == -1) {
		$args['nopaging'] = true;
	} elseif ($offset > 0) {
		$args['offset'] = $offset;
	}
	//terms
	if (count($terms) > 0) {
		$args['tax_query'] = [];
		$terms_id = $terms_slug = [];
		foreach ($terms as $term_handle) {
			if (is_string($term_handle)) {
				$terms_slug[] = $term_handle;
			} elseif (is_integer($term_handle)) {
				$terms_id[] = $term_handle;
			}
		}
		$taxonomy = null;
		if ($force_taxonomy) :
			$taxonomy = $force_taxonomy;
		else :
			$taxonomy = ($post_type == 'post')? 'category' : $post_type . '-category';
		endif;
		if (count($terms_slug) > 0) {
			$args['tax_query'][] = ['taxonomy' => $taxonomy, 'field' => 'slug', 'terms' => $terms_slug];
		}
		if (count($terms_id) > 0) {
			$args['tax_query'][] = ['taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $terms_id];
		}
		if (count($args['tax_query']) > 1) {
			$args['tax_query'] = ['relation' => 'OR'] + $args['tax_query'];
        }
	}
	//featured
	if ($featured) {
		$args['meta_query'] = [
			['key' => 'featured', 'compare' => '=', 'value' => true]
		];
	}
	//orderby - (date, random, priority)
	if ($orderby != 'date' && in_array($orderby, ['random', 'priority'])) {
		if ($orderby == 'priority') {
			$args['orderby'] = 'meta_value_num date';
			$args['meta_key'] = 'priority';
		} else {
			$args['orderby'] = 'rand';
		}
	}
	//extra meta(s) - each meta's info must passed in this format: array($key, $compare, $value, [$type])
    if (count($extra_meta) > 0) {
	    if (!isset($args['meta_query'])) $args['meta_query'] = []; //check featured
	    foreach ($extra_meta as $meta_info) {
	        $new_meta_info = ['key' => $meta_info[0], 'compare' => $meta_info[1], 'value' => $meta_info[2]];
	        if (count($meta_info) == 4) $new_meta_info['type'] = $meta_info[3];
		    $args['meta_query'][] = $new_meta_info;
        }
        if (count($args['meta_query']) > 1) {
	        $args['meta_query'] = ['relation' => 'AND'] + $args['meta_query'];
        }
	}
	//check disable option (just for tour post type)
    if ($post_type == 'tour') {
	    if (!isset($args['meta_query'])) $args['meta_query'] = []; //check prev meta queries
		$args['meta_query'][] = [
			'relation' => 'OR',
			['key' => 'disabled', 'compare' => '=', 'value' => 0],
			['key' => 'disabled', 'compare' => 'NOT EXISTS']
		];
        if (count($args['meta_query']) > 1) {
	        $args['meta_query'] = ['relation' => 'AND'] + $args['meta_query'];
        }
    }
	return $args;
}

//Checks a date is jalali or not - based on date's year number
function citynet_is_jalali_date($date) {
    $separator = substr($date, 4, 1);
    $year = (int)explode($separator, $date)[0];
    return $year < 2000;
}

//Returns two dates differences as days numbers
function citynet_get_dates_day_diff($date1, $date2) {
    $date1_final = citynet_is_jalali_date($date1)? gregdate('Y-m-d', $date1) : $date1;
    $date2_final = citynet_is_jalali_date($date2)? gregdate('Y-m-d', $date2) : $date2;
	$start = new DateTime($date1_final);
	$end  = new DateTime($date2_final);
	$diff = $start->diff($end);
	return (int)$diff->format('%a');
}

//Returns post's top banner info
function citynet_post_get_banner($post_id = null, $check_default = true, $value = 'id', $device = null) {
	if (!$post_id) :
        global $post;
        $post_id = $post->ID;
	endif;

	$response = null;
	$checked_tabs = (get_post_type($post_id) == 'tour')? citynet_tour_get_tabs($post_id) : citynet_hotelpackage_get_tabs($post_id);
	if (in_array('additional', $checked_tabs)) :
		if ($device) :
			$banner_id = get_field(($device == 'mobile')? 'top-image-mobile' : 'top-image', $post_id);
			if (!$banner_id && $check_default) :
				$banner_id = get_field(($device == 'mobile')? 'default_single_top_image_mobile' : 'default_single_top_image', 'option');
			endif;
			$response['value'] = ($value == 'id')? $banner_id : wp_get_attachment_image_url($banner_id, 'full');
			$response['title'] = get_the_title($banner_id);
		else :
			foreach (['mobile', 'desktop'] as $device_type) :
				$response[$device_type] = citynet_post_get_banner($post_id, $check_default, $value, $device_type);
			endforeach;
		endif;
	endif;
	return $response;
}

//Returns tour top notice info
function citynet_get_tour_notice($tour_id = null) {
	if (!$tour_id) :
        global $post;
        $tour_id = $post->ID;
	endif;

	$notice = null;
	if (in_array('additional', citynet_tour_get_tabs($tour_id))) :
		$notice_text = get_field('notice-text', $tour_id);
		if ($notice_text) :
			$notice['text'] = $notice_text;
			$notice['type'] = get_field('notice-type', $tour_id);
		endif;
	endif;
	return $notice;
}

//Returns hotel-package top notice info
function citynet_get_hotelpackage_notice($post_id = null) {
	if (!$post_id) :
        global $post;
        $post_id = $post->ID;
	endif;

	$notice = null;
	if (in_array('additional', citynet_hotelpackage_get_tabs($post_id))) :
		$notice_text = get_field('notice-text', $post_id);
		if ($notice_text) :
			$notice['text'] = $notice_text;
			$notice['type'] = get_field('notice-type', $post_id);
		endif;
	endif;
	return $notice;
}

//Returns tour's hotels table type for mobile
function citynet_get_tour_hotels_mobile_tables_type($tour_id = null) {
	if (!$tour_id) :
        global $post;
        $tour_id = $post->ID;
	endif;

	$tables_type = get_field('tour-tables-type', $tour_id);
	if ($tables_type == 'default') $tables_type = get_field('tour-tables-type', 'option');
	return $tables_type;
}

//Returns hotel-package's hotels table type for mobile
function citynet_get_hotelpackage_stays_mobile_tables_type($post_id = null) {
	if (!$post_id) :
        global $post;
        $post_id = $post->ID;
	endif;

	$tables_type = get_field('hotelpackage-tables-type', $post_id);
	if ($tables_type == 'default') $tables_type = get_field('hotelpackage-tables-type', 'option');
	return $tables_type;
}

//Returns all checked tabs of tour
function citynet_tour_get_tabs( $tour_id = null ) {
	if ( !$tour_id ) :
        global $post;
        $tour_id = $post->ID;
	endif;

	$checked_tabs = [];
	if ( get_post_type( $tour_id ) == 'tour' ) :
		$checked_tabs = get_field( 'tour-details-data-entry', $tour_id );
	endif;

	return $checked_tabs;
}

//Returns all checked tabs of hotel-package
function citynet_hotelpackage_get_tabs( $post_id = null ) {
	if ( !$post_id ) :
        global $post;
        $post_id = $post->ID;
	endif;

	$checked_tabs = [];
	if ( get_post_type( $post_id ) == 'hotelpackage' ) :
		$checked_tabs = get_field( 'hotelpackage-details-data-entry', $post_id );
	endif;

	return $checked_tabs;
}

//Checks that tour has selected tab or not
function citynet_tour_has_tab($tour_id = null, $tab_name) {
    if (!$tour_id) :
        global $post;
        $tour_id = $post->ID;
    endif;

    if (get_post_type($tour_id) == 'tour') :
        $checked_tabs = citynet_tour_get_tabs($tour_id);
        if ($checked_tabs) :
            return in_array($tab_name, $checked_tabs);
        endif;
    endif;
    return false;
}

//Checks that hotel-package has selected tab or not
function citynet_hotelpackage_has_tab($post_id = null, $tab_name) {
    if (!$post_id) :
        global $post;
        $post_id = $post->ID;
    endif;

    if (get_post_type($post_id) == 'hotelpackage') :
        $checked_tabs = citynet_hotelpackage_get_tabs($post_id);
        if ($checked_tabs) :
            return in_array($tab_name, $checked_tabs);
        endif;
    endif;
    return false;
}

//Checks all prices is iranian or not
function citynet_is_all_prices_iranian($info, $view_mode) {
	$check = true;
	if ($view_mode == 'mobile-table-by-table') :

		foreach ($info as $price_column) :
			foreach ($price_column as $prices) :
				foreach ($prices as $price_unit => $price_info) :
					if (!in_array($price_unit, ['rial', 'toman', 'thousand-tomans'])) :
						$check = false;
						break 3;
					endif;
				endforeach;
			endforeach;
		endforeach;

	elseif ($view_mode == 'one-table') :

		foreach ($info as $package_hotels_row) :
			foreach ($package_hotels_row['price-columns'] as $price_column) :
				foreach ($price_column as $prices) :
					foreach ($prices as $price_unit => $price_info) :
						if (!in_array($price_unit, ['rial', 'toman', 'thousand-tomans'])) :
							$check = false;
							break 4;
						endif;
					endforeach;
				endforeach;
			endforeach;
		endforeach;

	endif;
	return $check;
}

//Returns tour's origin
function citynet_get_tour_origin($tour_id = null) {
	if (!$tour_id) :
        global $post;
        $tour_id = $post->ID;
	endif;
	
	return get_field('origin-city-is-default', $tour_id)? get_field('tour-default-city', 'option') : get_field('origin-custom-city', $tour_id);
}

//Returns hotel-package's origin
function citynet_get_hotelpackage_origin($post_id = null) {
	if (!$post_id) :
        global $post;
        $post_id = $post->ID;
	endif;
	
	return get_field('origin-city-is-default', $post_id)? get_field('hotelpackage-default-city', 'option') : get_field('origin-custom-city', $post_id);
}

//Returns an array of tour's tools for specified type - 'necessary', 'suggested'
function citynet_get_tour_tools($tools_type, $tour_id = null) {
    $tools = [];
    if (!$tour_id) :
        global $post;
        $tour_id = $post->ID;
    endif;

    $tools_field_name = $tools_type . '-tools';
    $tour_tools_is_available = (get_post_type($tour_id) == 'tour' && citynet_tour_has_tab($tour_id, 'special') && have_rows($tools_field_name, $tour_id));

    if ($tour_tools_is_available) :
        $tour_tools = get_field($tools_field_name, $tour_id);
        $tools['posts_ids'] = $tour_tools['post-select'];
        if ($tour_tools['text']) :
            $temp = str_replace("\r\n", '', $tour_tools['text']);
            $tools['strings'] = explode("<br />", $temp);
            foreach ($tools['strings'] as $string_index => $string) :
                if (!$string) unset($tools['strings'][$string_index]);
            endforeach;
        else :
            $tools['strings'] = false;
        endif;
    endif;

    return $tools;
}

//Returns an array of hotel-package's tools for specified type - 'necessary', 'suggested'
function citynet_get_hotelpackage_tools($tools_type, $post_id = null) {
    $tools = [];
    if (!$post_id) :
        global $post;
        $post_id = $post->ID;
    endif;

    $tools_field_name = $tools_type . '-tools';
    $hotelpackage_tools_is_available = (get_post_type($post_id) == 'hotelpackage' && citynet_hotelpackage_has_tab($post_id, 'special') && have_rows($tools_field_name, $post_id));

    if ($hotelpackage_tools_is_available) :
        $hotelpackage_tools = get_field($tools_field_name, $post_id);
        $tools['posts_ids'] = $hotelpackage_tools['post-select'];
        if ($hotelpackage_tools['text']) :
            $temp = str_replace("\r\n", '', $hotelpackage_tools['text']);
            $tools['strings'] = explode("<br />", $temp);
            foreach ($tools['strings'] as $string_index => $string) :
                if (!$string) unset($tools['strings'][$string_index]);
            endforeach;
        else :
            $tools['strings'] = false;
        endif;
    endif;

    return $tools;
}

//Returns an array of reception and stay table
function citynet_get_tour_reception_table($tour_id = null) {
    $info = [];
    if (!$tour_id) :
        global $post;
        $tour_id = $post->ID;
    endif;

    $tour_reception_table_is_available = (get_post_type($tour_id) == 'tour' && citynet_tour_has_tab($tour_id, 'special') && have_rows('reception-table', $tour_id));

    if ($tour_reception_table_is_available) :

        $reception_table = get_field('reception-table', $tour_id);
        $we_word = get_field('reception-we-word', $tour_id);
        if (!$we_word) $we_word = __('We', 'citynet');
        $you_word = get_field('reception-you-word', $tour_id);
        if (!$you_word) $you_word = __('You', 'citynet');

        foreach ($reception_table as $day_index => $day_info) :
            $day_number = $day_index + 1;
            foreach (['breakfast', 'lunch', 'dinner'] as $meal) :
                $info[$day_number][$meal] = [
                    'place' => $day_info[$meal . '-place']? __(ucfirst($day_info[$meal . '-place']), 'citynet') : '-',
                    'host' => $day_info[$meal . '-host']? ${$day_info[$meal . '-host'] . '_word'} : '-',
                    'host-id' => $day_info[$meal . '-host']? $day_info[$meal . '-host'] : null
                ];
            endforeach;
            $info[$day_number]['stay'] = [
                'place' => $day_info['stay-place']? __(ucfirst($day_info['stay-place']), 'citynet') : '-',
                'description' => $day_info['stay-description']? $day_info['stay-description'] : '-'
            ];
        endforeach;

    endif;

    return $info;
}

//Returns an array of reception and stay table
function citynet_get_hotelpackage_reception_table($post_id = null) {
    $info = [];
    if (!$post_id) :
        global $post;
        $post_id = $post->ID;
    endif;

    $hotelpackage_reception_table_is_available = (get_post_type($post_id) == 'hotelpackage' && citynet_hotelpackage_has_tab($post_id, 'special') && have_rows('reception-table', $post_id));

    if ($hotelpackage_reception_table_is_available) :

        $reception_table = get_field('reception-table', $post_id);
        $we_word = get_field('reception-we-word', $post_id);
        if (!$we_word) $we_word = __('We', 'citynet');
        $you_word = get_field('reception-you-word', $post_id);
        if (!$you_word) $you_word = __('You', 'citynet');

        foreach ($reception_table as $day_index => $day_info) :
            $day_number = $day_index + 1;
            foreach (['breakfast', 'lunch', 'dinner'] as $meal) :
                $info[$day_number][$meal] = [
                    'place' => $day_info[$meal . '-place']? __(ucfirst($day_info[$meal . '-place']), 'citynet') : '-',
                    'host' => $day_info[$meal . '-host']? ${$day_info[$meal . '-host'] . '_word'} : '-',
                    'host-id' => $day_info[$meal . '-host']? $day_info[$meal . '-host'] : null
                ];
            endforeach;
            $info[$day_number]['stay'] = [
                'place' => $day_info['stay-place']? __(ucfirst($day_info['stay-place']), 'citynet') : '-',
                'description' => $day_info['stay-description']? $day_info['stay-description'] : '-'
            ];
        endforeach;

    endif;

    return $info;
}

//Returns a string array of reception and stay table's reports
function citynet_get_reception_reports($post_id = null) {
    $reports = [];
    $reports_counts = [];
    if (!$post_id) :
        global $post;
        $post_id = $post->ID;
    endif;

    $reception_table = (get_post_type($post_id) == 'tour')? citynet_get_tour_reception_table($post_id) : citynet_get_hotelpackage_reception_table($post_id);

    if ($reception_table) :
        foreach ($reception_table as $day_info) :
            foreach (['breakfast', 'lunch', 'dinner'] as $meal) :
                $day_meal_host = $day_info[$meal]['host'];
				if ($day_meal_host != '-') :
					if (!isset($reports_counts['hosts'])) $reports_counts['hosts'] = [];
					if (!isset($reports_counts['hosts'][$day_meal_host])) $reports_counts['hosts'][$day_meal_host] = [];
					if (!isset($reports_counts['hosts'][$day_meal_host][$meal])) $reports_counts['hosts'][$day_meal_host][$meal] = 0;
					if (!isset($reports_counts['hosts'][$day_meal_host]['total'])) $reports_counts['hosts'][$day_meal_host]['total'] = 0;
                    $reports_counts['hosts'][$day_meal_host][$meal]++;
                    $reports_counts['hosts'][$day_meal_host]['total']++;
                endif;
            endforeach;
			$day_stay_place = $day_info['stay']['place'];
			if ($day_stay_place != '-') :
				if (!isset($reports_counts['stays'])) $reports_counts['stays'] = [];
				if (!isset($reports_counts['stays'][$day_stay_place])) $reports_counts['stays'][$day_stay_place] = 0;
				$reports_counts['stays'][$day_stay_place]++;
			endif;
        endforeach;

        if ($reports_counts['stays']) :
            $stays_strings = [];
            foreach ($reports_counts['stays'] as $stay_place_name => $stay_place_value) :
                $stays_strings[] = $stay_place_value . ' ' . __('Night', 'citynet') . ' ' . $stay_place_name;
            endforeach;
            $reports[__('Stays', 'citynet')] = implode(__(', ', 'citynet'), $stays_strings);
        endif;

        if ($reports_counts['hosts']) :
            foreach ($reports_counts['hosts'] as $host => $receptions_values) :
                $reports[$host] = 'کلا ' . $reports_counts['hosts'][$host]['total'] . ' ' . __('Meal', 'citynet') . ' شامل: ';
                $meals_strings = [];
                foreach (['breakfast', 'lunch', 'dinner'] as $meal) :
                    if (isset($reports_counts['hosts'][$host][$meal])) :
                        $meals_strings[] = $reports_counts['hosts'][$host][$meal] . ' ' . __('Meal', 'citynet') . ' ' . __(ucfirst($meal), 'citynet');
                    endif;
                endforeach;
                $reports[$host] .= implode(__(', ', 'citynet'), $meals_strings);
            endforeach;
        endif;
    endif;

    return $reports;
}

//Adds handle name to all initialized scripts
add_filter('script_loader_tag', function($tag, $handle) {
	return str_replace('<script', sprintf('<script handle="%1$s"', esc_attr($handle)), $tag);
}, 10, 3);

//Adds handle name to all initialized styles
add_filter('style_loader_tag', function($tag, $handle) {
	return str_replace('<link', sprintf('<link handle="%1$s"', esc_attr($handle)), $tag);
}, 10, 3);

//Returns all prices unit as rial
function citynet_get_equality_prices() {
	$dynamic_prices = ['rial' => 1, 'toman' => 10, 'thousand-tomans' => 10000];

	$prices_info = get_field('tour-dynamic-prices', 'option');
	if ($prices_info) :
		foreach ($prices_info as $price) :
			$dynamic_prices[$price['price-unit']] = (int)$price['price-rial'];
		endforeach;
	endif;

	return $dynamic_prices;
}

//Converts and returns all prices in one Rials value
function citynet_get_price_as_rials($prices_list) {
    if (!is_array($prices_list)) $prices_list = json_decode($prices_list, true);
    $equality_prices = citynet_get_equality_prices();
    $rials = 0;
    if ($prices_list) :
        foreach ($prices_list as $price_id => $price_value) :
            $rials += $price_value * $equality_prices[$price_id];
        endforeach;
    endif;
    return $rials;
}

//Checks validation for national code
function citynet_national_code_validate($national_code) {
	$response = null;
	$digits = array_map('intval', str_split($national_code));
	if (count($digits) != 10) :
		$response = false;
	else :
		$control_digit = array_pop($digits);
		$digit_place = 10;
		$sum = 0;
		foreach ($digits as $digit) :
			$sum += $digit * $digit_place;
			$digit_place--;
		endforeach;
        $remaining = fmod($sum, 11);
        $response = (($remaining < 2 && $control_digit == $remaining) || ($remaining >= 2 && $control_digit == (11 - $remaining)));
    endif;
	return $response;
}

//Checks all of tour's packages validation dates to ditermine this tour has expired or not
function citynet_tour_has_expired($tour_id = null) {
	if (!$tour_id) :
		global $post;
		$tour_id = $post->ID;
	endif;

	$tour_expired = null;
	$tour_dates_table_is_available = (get_post_type($tour_id) == 'tour' && citynet_tour_has_tab($tour_id, 'reservation') && have_rows('holding-dates', $tour_id));
	if ($tour_dates_table_is_available) :
		$tour_packages_info = get_field('holding-dates', $tour_id);
		if ($tour_packages_info) :
			$packages_validation_dates = wp_list_pluck($tour_packages_info, 'hd-package-validation-date');
			$tour_expired = true;
			foreach ($packages_validation_dates as $date) :
				if (!has_expired($date)) :
					$tour_expired = false;
					break;
				endif;
			endforeach;
		endif;
	endif;
	return $tour_expired;
}

//Checks all of hotel-package's packages validation dates to ditermine this hotel-package has expired or not
function citynet_hotelpackage_has_expired($post_id = null) {
	if (!$post_id) :
		global $post;
		$post_id = $post->ID;
	endif;

	$hotelpackage_expired = null;
	$hotelpackage_dates_table_is_available = (get_post_type($post_id) == 'hotelpackage' && citynet_hotelpackage_has_tab($post_id, 'reservation') && have_rows('holding-dates', $post_id));
	if ($hotelpackage_dates_table_is_available) :
		$hotelpackage_packages_info = get_field('holding-dates', $post_id);
		if ($hotelpackage_packages_info) :
			$packages_validation_dates = wp_list_pluck($hotelpackage_packages_info, 'hd-package-validation-date');
			$hotelpackage_expired = true;
			foreach ($packages_validation_dates as $date) :
				if (!has_expired($date)) :
					$hotelpackage_expired = false;
					break;
				endif;
			endforeach;
		endif;
	endif;
	return $hotelpackage_expired;
}

//An ajax hook for update tour's dynamic currencies prices as rials - calls in general-custom.js
function citynet_tour_prices_update_ajax_request() {
    if (isset($_REQUEST)) {
        $response = [];
        $prices_info = json_decode(stripslashes($_REQUEST['pricesInfo']), true);
        foreach ($prices_info as $price_info) {
            $response[] = [
                'number' => $price_info['number'],
                'value' => $price_info['prices']? mk_tr_num(number_format(citynet_get_price_as_rials($price_info['prices'])), 'fa') . ' ریال' : null,
                'extraNightValue' => $price_info['extraNight']? mk_tr_num(number_format(citynet_get_price_as_rials($price_info['extraNight'])), 'fa') . ' ریال' : null
            ];
        }
        echo json_encode($response);
    }
    die();
}
add_action('wp_ajax_citynet_tour_prices_update_ajax_request', 'citynet_tour_prices_update_ajax_request');
add_action('wp_ajax_nopriv_citynet_tour_prices_update_ajax_request', 'citynet_tour_prices_update_ajax_request');

//An ajax hook for update hotel-package's dynamic currencies prices as rials - calls in general-custom.js
function citynet_hotelpackage_prices_update_ajax_request() {
    if (isset($_REQUEST)) {
        $response = [];
        $prices_info = json_decode(stripslashes($_REQUEST['pricesInfo']), true);
        foreach ($prices_info as $price_info) {
            $response[] = [
                'number' => $price_info['number'],
                'value' => $price_info['prices']? mk_tr_num(number_format(citynet_get_price_as_rials($price_info['prices'])), 'fa') . ' ریال' : null,
                'extraNightValue' => $price_info['extraNight']? mk_tr_num(number_format(citynet_get_price_as_rials($price_info['extraNight'])), 'fa') . ' ریال' : null
            ];
        }
        echo json_encode($response);
    }
    die();
}
add_action('wp_ajax_citynet_hotelpackage_prices_update_ajax_request', 'citynet_hotelpackage_prices_update_ajax_request');
add_action('wp_ajax_nopriv_citynet_hotelpackage_prices_update_ajax_request', 'citynet_hotelpackage_prices_update_ajax_request');

//Adds custom link item to post types admin menu
add_action('admin_menu', function() {
	global $submenu;
	$args = ['has_archive' => true, '_builtin' => false];
	$post_types = get_post_types($args, 'names');
	foreach ($post_types as $post_type) :
		$submenu['edit.php?post_type=' . $post_type][] = ['مشاهده آرشیو', 'manage_options', get_post_type_archive_link($post_type)];
    endforeach;
	$submenu['edit.php'][] = ['مشاهده آرشیو', 'manage_options', get_post_type_archive_link('post')];
});

//Manage items in admin top bar
add_action( 'wp_before_admin_bar_render', function() {
	global $wp_admin_bar;
	$blog_archive_node = $wp_admin_bar->get_node( 'archive' );
	if( $blog_archive_node ) :
		$wp_admin_bar->remove_menu( 'archive' );
	endif;

	if ( is_admin() ) :
		$args = ['has_archive' => true, '_builtin' => false];
		$post_types = ['post'] + get_post_types( $args, 'names' );
		foreach ( $post_types as $post_type ) :
			$archive_link = get_post_type_archive_link( $post_type );
			if ( $archive_link ) :
				$wp_admin_bar->add_menu( [
					'id'	 => 'citynet-' . $post_type . '-archive',
					'title'	 => 'آرشیو ' . get_post_type_object( $post_type )->labels->name,
					'parent' => 'site-name',
					'href'	 => $archive_link
				] );
			endif;
		endforeach;
	endif;
} );

//Returns Random string in specified length
function citynet_random_string( $length = 10 ) {
    $chars = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $chars_length = strlen( $chars );
    $result = '';
    for ( $i = 0; $i < $length; $i++ ) :
        $result .= $chars[mt_rand( 0, $chars_length - 1 )];
	endfor;
    return $result;
}

//Remove extra meta boxes in admin area's dashboard
add_action( 'wp_dashboard_setup', function() {
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'themeisle', 'dashboard', 'side' );
} );

//Add custom post type's published post's count to dashboard's glance items widget
add_filter( 'dashboard_glance_items', function ( $items = [] ) {
	$args = ['_builtin' => false, 'public' => true];
    $post_types = get_post_types( $args, 'names' );
    foreach ( $post_types as $post_type ) :
        $num_posts = wp_count_posts( $post_type );
        if ( $num_posts ) :
            $published = intval( $num_posts->publish );
            $post_type_object = get_post_type_object( $post_type );
            $text = $published . ' ' . $post_type_object->labels->singular_name;
            if ( current_user_can( $post_type_object->cap->edit_posts ) ) :
                $items[] = sprintf( '<a class="%1$s-count" href="edit.php?post_type=%1$s">%2$s</a>', $post_type, $text ) . "\n";
            else :
                $items[] = sprintf( '<span class="%1$s-count">%2$s</span>', $post_type, $text ) . "\n";
			endif;
        endif;
    endforeach;
	return $items;
}, 10, 2 );

//Add an ACF's location rule for show custom fields groups in all of sub-categories - by 3 bellow hooks
add_filter( 'acf/location/rule_types', function( $choices ) {
	if ( !isset($choices['سیتی نت']) ) $choices['سیتی نت'] = [];
	if ( !isset( $choices['سیتی نت']['citynet_secured_location-category'] ) ) :
		$choices['سیتی نت']['citynet_secured_location-category'] = 'گروه مکان محفوظ';
	endif;
	return $choices;
} );
add_filter( 'acf/location/rule_values/citynet_secured_location-category', function( $choices ) {
	$args = [
		'taxonomy'	 => 'location-category',
		'meta_key'	 => 'secure-term',
		'meta_value' => true,
		'hide_empty' => false
	];
	$location_categories = get_terms( $args );
	foreach ( $location_categories as $term ) :
		$choices[$term->term_id] = $term->name;
	endforeach;
	return $choices;
} );
add_filter( 'acf/location/rule_match/citynet_secured_location-category', function( $matched, $rule, $options ) {
	$rule_term_id = (int)$rule['value'];
	if ( $options['ajax'] ) :
		$checked_terms = array_map( 'intval', $options['post_terms']['location-category'] );
	else :
		$args = [
			'hide_empty' => false,
			'fields'	 => 'ids'
		];
		$checked_terms = wp_get_post_terms( intval( $options['post_id'] ), 'location-category', $args );
	endif;
	$matched = false;
	if ( in_array( $rule_term_id, $checked_terms ) ) :
		$matched = true;
	else :
		foreach ( $checked_terms as $term_id ) :
			$ancestors = get_ancestors( $term_id, 'location-category', 'taxonomy' );
			if ( in_array( $rule_term_id, $ancestors ) ) :
				$matched = true;
				break;
			endif;
		endforeach;
	endif;
	if ( $rule['operator'] == '!=' ) $matched = !$matched;
	return $matched;
}, 10, 3 );

//Adds tour's custom fields to tour's rest api
/*function add_tour_custom_fields_to_api($tour) {
    $tour_id = $tour['ID'];
	$custom_fields = [
		'countries' => wp_list_pluck(get_field('countries', $tour_id), 'ID'),
		'cities' => wp_list_pluck(get_field('cities', $tour_id), 'ID'),
	];
	return $custom_fields;
}
register_rest_field('tour', 'custom-fields', ['get_callback' => 'add_tour_custom_fields_to_api']);*/



//Defines custom api with custom data as response
add_action('rest_api_init', function() {
	register_rest_route('citynet-api/v1', '/get-tour-info/', [
		'methods' => 'GET',
		'callback' => 'citynet_api_get_tour_info'
	]);
});
function citynet_api_get_tour_info($parameter) {
	$tour_id = $parameter['tour-id'];
	$buy_type = get_field('buy-type', $tour_id);
    $response = [
		'status' => 'success',
		'info' => [
			'title' => [
				'main' => get_the_title($tour_id),
				'long' => get_field('long_title', $tour_id),
				'english' => get_field('title-en', $tour_id)
			],
			'expired' => citynet_tour_has_expired($tour_id),
			'buy-type' => $buy_type,
			'sold-out' => ($buy_type == 'without-buy')? null : citynet_is_tour_sold_out($tour_id),
			'banner' => citynet_post_get_banner($tour_id, false, 'address'),
			'notice' => citynet_get_tour_notice($tour_id),
			'tabs' => citynet_tour_get_tabs($tour_id),
			'hotels-defined' => get_field('hotels-defined', $tour_id),
			'optional-info' => get_field('hotels-table-optional-info', $tour_id),
			'hotels-table-titles' => citynet_get_tour_hotels_table_titles($tour_id),
			'price-columns-count' => get_field('price-columns-count', $tour_id),
			'default-thumbnail' => wp_get_attachment_image_url(get_field('default_thumb', 'option'), 'full'),
			'tables-type' => citynet_get_tour_hotels_mobile_tables_type($tour_id),
			'packages' => citynet_get_tour_package_full_info($tour_id),
		]
	];
	return $response;
}



//Generates customize url in wordpress - with 3 bellow hooks
/*function citynet_panel_new_pages(){
	add_rewrite_rule('tours/تور-خارجی' ,'index.php?tour-page-id=1663' ,'top');
	//add_rewrite_rule('^user/([^/]*)?','index.php?user=$matches[1]','top');
	flush_rewrite_rules();
}
add_action('init' , 'citynet_panel_new_pages', 10, 0);
function citynet_pnp_add_query_vars($vars){
	$vars[] = 'tour-page-id';
	//$vars[] = 'user';
	return $vars;
}
add_filter('query_vars' , 'citynet_pnp_add_query_vars');
function citynet_check_request($query) {
	if ($query->query_vars['tour-page-id']) {
	//if ($query->query_vars['user']) {
        //set_query_var('tour-page-id', $query->query_vars['tour-page-id']);
		include get_template_directory() . '/visa.php';
		exit();
	}
}
add_action('parse_request' , 'citynet_check_request');*/

//Generates beauty print_r
function citynet_print_r($var) {
	echo '<pre dir="ltr" style="text-align: left">' . print_r($var, true) . '</pre>';
}

//generates curl request and return response as json
function citynet_curl_request($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	$response = curl_exec($ch);
	curl_close($ch);
	return json_decode($response, true);
}

//returns converted seconds to time in string or array format
function citynet_seconds_to_time($seconds, $return_string = true) {
    $time_parts = [];

    $hours = floor($seconds / 3600);
    if (!$return_string || $hours) $time_parts['hours'] = $hours;
    if ($hours) $seconds -= $hours * 3600;

    $minutes = floor($seconds / 60);
    $time_parts['minutes'] = $minutes;
    if ($minutes) $seconds -= $minutes * 60;

    $time_parts['seconds'] = $seconds;

    if ($return_string) :
        foreach ($time_parts as $part_name => $part_value) :
            $time_parts[$part_name] = str_pad($part_value, 2, '0', STR_PAD_LEFT);
        endforeach;
        return implode(':', $time_parts);
    else :
        return $time_parts;
    endif;
}

//returns aparat video info in array format
function citynet_get_aparat_video_info($video_uid) {
    $aparat_result = citynet_curl_request('https://www.aparat.com/etc/api/video/videohash/' . $video_uid);
    if ($aparat_result['video']['duration']) :
        $aparat_result = $aparat_result['video'];
        $video_info = [
            'title' => $aparat_result['title'],
            'user' => $aparat_result['username'],
            'username' => $aparat_result['sender_name'],
            'visit' => $aparat_result['visit_cnt'],
            'like' => $aparat_result['like_cnt'],
            'description' => $aparat_result['description'],
            'time' => citynet_seconds_to_time($aparat_result['duration']),
            'persian-date' => $aparat_result['sdate'],
            'gregorian-date' => substr($aparat_result['create_date'], 0, 10)
        ];

        $aprat_url = 'https://www.aparat.com/v/' . $video_uid;
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($curl, CURLOPT_HEADER, false);
	    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($curl, CURLOPT_URL, $aprat_url);
	    curl_setopt($curl, CURLOPT_REFERER, $aprat_url);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	    $str = curl_exec($curl);
	    curl_close($curl);
	    $html_base = new simple_html_dom();
	    $html_base->load($str);

        $qualities_list = [];
	    $response_links = $html_base->find('.download-dropdown .menu-item-link');
	    foreach ($response_links as $link) :
		    $attr_quality_name = 'aria-label';
		    $index = str_replace('با کیفیت ', '', $link->find('a')[0]->$attr_quality_name);
		    $qualities_list[$index] = $link->find('a')[0]->href;
	    endforeach;
        if ($qualities_list) :
            $video_info['qualities'] = $qualities_list;
        endif;

	    $html_base->clear();
	    unset($html_base);
    else :
        $video_info = null;
    endif;
    return $video_info;
}

//defines a shortcode to generate video player from aparat video
add_shortcode('cn-aparat-video', function($atts) {
	$shortcode_info = shortcode_atts(['uid' => null, 'quality' => 'normal'], $atts);
	$temp_html = '';
	if ($shortcode_info['uid']) :
		$video = citynet_get_aparat_video_info($shortcode_info['uid']);
		$temp_html = generate_video_player($video['qualities'], $shortcode_info['quality'], false, $video['time'], false);
	endif;
	return $temp_html;
});

//defines a shortcode to return site tel
add_shortcode('cn-site-tel', function() {
	return '<span class="cn-site-tel">' . get_field('tel', 'option') . '</span>';
});

//defines a shortcode to return site mobile
add_shortcode('cn-site-mobile', function() {
	return '<span class="cn-site-mobile">' . get_field('front-mobile', 'option') . '</span>';
});

//defines a shortcode to return site email
add_shortcode('cn-site-email', function($atts) {
	$has_cta = in_array(shortcode_atts(['cta' => 'yes'], $atts)['cta'], ['yes', 'true']);
	$site_email = get_field('email', 'option');
	return ($has_cta)? '<a href="mailto:' . antispambot($site_email) . '" class="cn-site-email">' . antispambot($site_email) . '</a>' : '<span class="cn-site-email">' . antispambot($site_email) . '</span>';
});

//handles ajax load by place
function citynet_ajax_load_by_place() {
    if ( isset( $_REQUEST ) ) :
        $offset = (int)$_REQUEST['offset'];
        $place_id = (int)$_REQUEST['placeID'];
        $post_type = $_REQUEST['postType'];
        $objects = citynet_get_related_items( $post_type, $place_id, 'object', 8, $offset );
        echo cn_get_posts_box_in_ajax_requests( $objects );
    endif;
    die();
}
add_action( 'wp_ajax_citynet_ajax_load_by_place', 'citynet_ajax_load_by_place' );
add_action( 'wp_ajax_nopriv_citynet_ajax_load_by_place', 'citynet_ajax_load_by_place' );

//handles ajax load on archives
function cn_ajax_load_posts_in_archive() {
    if ( isset( $_REQUEST ) ) :     
		$post_type = $_REQUEST['postType'];
		$limit = get_option( 'posts_per_page' );
		$offset = ( (int)$_REQUEST['page'] - 1 ) * $limit;
		$terms_groups = json_decode( stripslashes( $_REQUEST['terms'] ), true );
		$taxonomy = $terms_groups? key( $terms_groups ) : null;
		$terms = $terms_groups? $terms_groups[$taxonomy] : [];
		$orderby = ( $post_type == 'post' )? 'date' : 'priority';
		
		$args = citynet_generate_args( $post_type, $limit, $offset, $terms, false, $orderby, [], $taxonomy );
		$objects_query = new WP_Query( $args );
		if ( $objects_query->found_posts > 0 ) :
			$result = [
				'posts' => cn_get_posts_box_in_ajax_requests( $objects_query->posts ),
				'pages' => $objects_query->max_num_pages
			];
		else :
			ob_start();
			get_template_part( 'template-parts/content', 'none' );
			$not_any_post_html = ob_get_clean();
			$result = [
				'not-posts-html' => $not_any_post_html
			];
		endif;
		$result['match-query'] = $objects_query->found_posts;

		echo json_encode( $result );
    endif;
    die();
}
add_action( 'wp_ajax_cn_ajax_load_posts_in_archive', 'cn_ajax_load_posts_in_archive' );
add_action( 'wp_ajax_nopriv_cn_ajax_load_posts_in_archive', 'cn_ajax_load_posts_in_archive' );

//Returns all post types box info in ajax requests
function cn_get_posts_box_in_ajax_requests( $objects ) {
    $result = [];
	if ( $objects ) :
		foreach ( $objects as $post_object ) :
			$GLOBALS['post'] = $post_object;
			global $post;
			setup_postdata( $post );
			ob_start();
			get_template_part( 'template-parts/content', 'box' );
			$box_html = ob_get_clean();
			$result[] = $box_html;
		endforeach;
		wp_reset_postdata();
    endif;
    return $result;
}

//applies some changes in wordpress default query in some status
add_action('pre_get_posts', function($query) {
    if (!is_admin()) :
		if (($query->is_post_type_archive('tour') || ($query->is_tax() && get_taxonomy(get_queried_object()->taxonomy)->object_type[0] == 'tour')) && $query->is_main_query()) {
			$query->set('meta_query', [
				'relation' => 'OR',
				['key' => 'disabled', 'compare' => '=', 'value' => 0],
				['key' => 'disabled', 'compare' => 'NOT EXISTS']
			]);
		}
    endif;
});

// Customize order of admin menu items
function cn_custom_menu_order($menu_ord) {
	if (!$menu_ord) {
		return true;
	}

	return [
		'index.php',                  // Dashboard
		'edit.php?post_type=page',    // Pages
		'edit.php',                   // Posts
		'edit.php?post_type=continent', // Continent
		'edit.php?post_type=country',  // Country
		'edit.php?post_type=state',  // State
		'edit.php?post_type=city',  // City
		'edit.php?post_type=location',  // Loction
		'edit.php?post_type=tour',  // Tour
		'edit.php?post_type=hotelpackage',  // Hotel Package
		'edit.php?post_type=irantour',  // Iran Tour
		'edit.php?post_type=media',  // Media

		'separator1',

		'upload.php',           // Media
		'users.php',            // Users
		'edit-comments.php',    // Comments
		'theme-settings',       // admin.php?page=theme-settings
		'options-general.php',  // Settings
		'tools.php',            // Tools
		'themes.php',           // Appearance
		'price-settings',       // admin.php?page=price-settings
		'plugins.php',          // Plugins

		'separator2',

		'edit.php?post_type=acf-field-group',
		'wpcf7',                // admin.php?page=wpcf7
		'CF7DBPluginSubmissions',                // Contact Form Data Base
		'maintenance',                // Maintenance
		'activity_log_page',                // Activity Log Page
	];
}
add_filter('custom_menu_order', 'cn_custom_menu_order');
add_filter('menu_order', 'cn_custom_menu_order');

//Change wordpress signature text in admin panel
add_filter('admin_footer_text', function() {
	echo 'طراحی و پشتیبانی: ' . '<a href="http://citynet.ir" target="_blank" style="text-decoration: none;">سیتی نت</a>' . ' - با استفاده از: ' . '<a href="https://wordpress.org/" target="_blank" style="text-decoration: none;">وردپرس</a>';
});

//Returns country info as array - based on country's 2 char code
function citynet_get_country_info($country_code) {
	$url = get_template_directory_uri() . '/js/front/countries-information.json';
	$countries_info = citynet_curl_request($url);

	$country_code = strtoupper($country_code);
	$country = null;
	$country_info = [];

	foreach ($countries_info as $item) :
		if ($item['alpha2Code'] == $country_code) :
			$country = $item;
			break;
		endif;
	endforeach;

	if ($country) :
		$country_info = [
			'name' => $country['name'],
			'name-native' => $country['nativeName'],
			'name-fa' => $country['translations']['fa'],
			'continent' => $country['region'],
			'capital' => $country['capital'],
			'phone-code' => count($country['callingCodes']) == 1? $country['callingCodes'][0] : $country['callingCodes'],
			'lang-code' => $country['languages'][0]['iso639_1'],
			'currency-code' => $country['currencies'][0]['code'],
			'iso2-code' => $country['alpha2Code'],
			'iso3-code' => $country['alpha3Code'],
			'numeric-code' => (int)$country['numericCode']
		];
	endif;

	return $country_info? $country_info : false;
}

//Returns Iran's states cities name as array - based on state's persian name
function citynet_get_iran_state_cities($state_name_fa) {
	$url = get_template_directory_uri() . '/js/front/iran-provinces-cities.json';
	$states_info = citynet_curl_request($url);

	$state = null;
	$state_cities = [];

	foreach ($states_info as $item) :
		if ($item['name'] == $state_name_fa) :
			$state = $item;
			break;
		endif;
	endforeach;

	if ($state) :
		foreach ($state['Cities'] as $city) :
			$state_cities[] = $city['name'];
		endforeach;
	endif;

	return $state_cities? $state_cities : false;
}

//Print MySQL queries number at end of document (HTML commented)
function cn_mysql_queries() {
	echo '<!-- ' . get_num_queries() . ' queries in ';
	timer_stop( 1 );
	echo ' seconds.-->';
}
add_action ( 'wp_footer', 'cn_mysql_queries', 999 );
add_action ( 'wp_after_admin_bar_render', 'cn_mysql_queries', 999 );

//Returns ACF simple fields values
function citynet_field( $field, $post_id = null ) {
	$result = false;

	if ( $post_id == 'option' ) :
		$result = citynet_option( $field );
	else :
		if ( ! $post_id ) :
			global $post;
			$post_id = $post->ID;
		endif;
		$result = get_post_meta( $post_id, $field, true );
	endif;

	return $result;
}

//Returns ACF repeater fields values
function citynet_repeater( $field, $subfields, $post_id = null ) {
	$rows = false;
	$result = [];

	if ( $post_id == 'option' ) :
		$rows = (int) citynet_option( $field );
	else :
		if ( ! $post_id ) :
			global $post;
			$post_id = $post->ID;
		endif;
		$rows = (int) get_post_meta( $post_id, $field, true );
	endif;
	
	if ( $rows ) :
		for ( $row_index = 0; $row_index < $rows; $row_index++ ) :	
			foreach ( $subfields as $subfield ) :
				$subfield_key = $field . '_' . $row_index . '_' . $subfield;
				$value = ( $post_id == 'option' )? citynet_option( $subfield_key ) : get_post_meta( $post_id, $subfield_key, true );
				$result[$row_index][$subfield] = $value;
			endforeach;
		endfor;
	endif;

	return $result;
}

//Build tel links
function citynet_tel_link( $tel_number, $before = '', $after = '', $class = [], $echo = true ) {
	$tel_number = mk_tr_num( $tel_number );
	$anchor_text = is_fa()? mk_tr_num( str_replace( '+98', '0', $tel_number ), 'fa' ) : $tel_number;
	$anchor_text = $before . $anchor_text . $after;

	$classes = '';
	if ( $class && ( is_array( $class ) || is_string( $class ) ) ) :
		$classes = ' class="' . ( is_array( $class )? implode( ' ', $class ) : $class ) . '"';
	endif;

	$result = '<a href="tel:' . $tel_number . '"' . $classes . '>' . $anchor_text . '</a>';
	if ( $echo ) echo $result; else return $result;
}

function citynet_option( $field ) {
    return get_option( 'options_' . $field );
}