<?php

namespace WP2K;

// change this Floorplan class and pass $post_id to constructor

class Floorplan {

  protected $post_id;

  public function __construct( $post_id ){
    $this->post_id = $post_id;
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