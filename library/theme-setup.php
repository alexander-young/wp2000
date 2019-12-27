<?php

function wp2k_theme_setup(){

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	register_nav_menus([
		'main_menu' => 'Primary',
	]);

	add_image_size('full-width', 1280, 9999, false);

}
add_action('after_setup_theme', 'wp2k_theme_setup' );
