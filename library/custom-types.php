<?php

function floorplan_post_type() {
    register_post_type( 'floorplan', [
      'public' => true,
      'label' => 'Floorplans',
      'menu_icon' => 'dashicons-layout',
    ] );
}
add_action( 'init', 'floorplan_post_type' );