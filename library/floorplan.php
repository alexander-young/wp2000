<?php

namespace WP2K;

// change this Floorplan class and pass $post_id to constructor

class Floorplan {

  protected $post_id;

  public function __construct( $post_id = false ){
    $this->post_id = $post_id;
  }

  public function get_floorplan_images() {

    $images = [];

    $featured_image = get_field('featured_image');

    if($featured_image){
      $images[] = $featured_image;
    }

    for ($i=1; $i <= 4; $i++) { 
      $image = get_field('interior_' . $i);
      if($image){
        $images[] = $image;
      }
    }

    return $images;

  }

  public function get_floorplan_types(){

    $terms = get_terms([
      'taxonomy' => 'home_type',
      'hide_empty' => false
    ]);

    $results = array_map(function( $home_type ){
      return [
        'slug' => $home_type->slug,
        'name' => $home_type->name
      ];
    }, $terms);

    return $results;
    
  }

  public function format_floorplan_price( $price ){
    return '$' . number_format( (int) $price);
  }

  public function display_floorplan_features(){
    ?>
      <ul class="flex flex-wrap text-base text-gray-600">
      <?php
      $features = get_the_terms($this->post_id, 'home_feature');
      if (!empty($features)) {
        foreach ($features as $feature) {
          echo '<li class="mr-4 justify-around whitespace-no-wrap"><i class="las la-check mr-1 text-primary"></i>' . $feature->name . '</li>';
        }
      }
      ?>
      </ul>
    <?php
  }

  public function display_floorplan_meta(){
    ?>
    <ul class="text-gray-600 dot-separated">
      <li class="inline-block mr-1"><?php echo get_post_meta($this->post_id, 'beds', true); ?> beds</li>
      <li class="inline-block mr-1"><?php echo get_post_meta($this->post_id, 'baths', true); ?> baths</li>
      <li class="inline-block"><?php echo get_post_meta($this->post_id, 'square_footage', true); ?> sqft</li>
    </ul>
    <?php
  }

}