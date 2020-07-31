<?php 

function wp2k_scripts() {

  wp_enqueue_style( 'wp2k-style', get_stylesheet_directory_uri() . '/assets/dist/main.css' );
  wp_enqueue_style( 'wp2k-icons', 'https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css' );
  
  wp_enqueue_style( 'gfont', 'https://fonts.googleapis.com/css?family=Lato:300,400&display=swap' );
  
  wp_deregister_script('jquery');

  wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', [], '2.1.0', true);  
  wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/assets/dist/main.bundle.js', [ 'jquery' ], '1.0.0', true );
  
}
add_action('wp_enqueue_scripts', 'wp2k_scripts');
