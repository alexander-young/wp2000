<?php

function wp2k_theme_setup(){

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	register_nav_menus([
		'main_menu' => 'Primary',
	]);

	register_sidebar([
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'before_widget' => '<div class="border-b-2 px-4 pt-4 pb-8 mb-4">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="h3 text-primary-light mb-2">',
		'after_title' => '</h3>',
	]);

	add_theme_support('yoast-seo-breadcrumbs');

	add_image_size('full-width', 1280, 9999, false);

}
add_action('after_setup_theme', 'wp2k_theme_setup' );
