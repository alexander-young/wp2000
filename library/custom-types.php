<?php

function floorplan_post_type() {
    register_post_type( 'floorplan', [
      'public' => true,
      'publicly_queryable' => true,
      'has_archive' => true,
      'rewrite' => [
        'slug' => 'floorplans',
        'with_front' => false
      ],
      'label' => 'Floorplans',
      'menu_icon' => 'dashicons-layout'
    ] );
}
add_action( 'init', 'floorplan_post_type' );

function add_custom_taxonomies(){

  register_taxonomy('home_type', 'floorplan', [
    'hierarchical' => true,
    'labels' => [
      'name' => 'Home Types',
      'singular_name' => 'Home Type'
    ],
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'home-type'),
  ]);

  register_taxonomy('home_feature', 'floorplan', [
    'hierarchical' => false,
    'labels' => [
      'name' => 'Home Features',
      'singular_name' => 'Home Feature'
    ],
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'show_admin_column' => false,
    'query_var' => false,
    'rewrite' => array('slug' => 'home-feature'),
  ]);

}
add_action('init', 'add_custom_taxonomies', 0);