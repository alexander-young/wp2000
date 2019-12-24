<?php

// dont forget to flush the rewrite
function add_api_endpoints() {
	add_rewrite_tag( '%api_floorplan_sort%', '([a-z]+)' );
	add_rewrite_rule( 'api/floorplan_sorting/([a-z]+)/?', 'index.php?api_floorplan_sort=$matches[1]', 'top' );
}
add_action( 'init', 'add_api_endpoints' );

function do_floorplan_sorting() {
	global $wp_query;

	$orderby = $wp_query->get( 'api_floorplan_sort' );

	if ( ! empty( $orderby ) ) {
    ob_start();

    $arguments = [
      'post_type' => 'floorplan',
    ];

    if( $orderby === 'title' ){
      $arguments['orderby'] = 'name';
      $arguments['order'] = 'ASC';
    }

    $query = new WP_Query($arguments);

    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
      get_template_part('template-parts/floorplan', 'card');
    endwhile; endif;

    $response = ob_get_clean();

    wp_send_json( $response );
    
	}
}
add_action( 'template_redirect', 'do_floorplan_sorting' );