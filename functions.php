<?php

function wp2k_scripts() {

	wp_enqueue_style( 'wp21-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'wp21_scripts' );