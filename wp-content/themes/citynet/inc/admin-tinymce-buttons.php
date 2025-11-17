<?php
add_action('after_setup_theme', function() {
	add_action('init', function() {
		if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) return;
		if (get_user_option('rich_editing') !== 'true') return;

		add_filter('mce_external_plugins', function($plugin_array) {
			$plugin_array['citynet_admin_tinymce_buttons'] = get_stylesheet_directory_uri() . '/js/admin-tinymce-buttons.js';
			return $plugin_array;
		});

		add_filter('mce_buttons', function($buttons) {
			array_push($buttons, 'cn_aparat_video', 'cn_site_tel', 'cn_site_mobile', 'cn_site_email');
			return $buttons;
		});
    });
});