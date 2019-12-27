<?php

namespace WP2K;

class Helpers {
  
  public static function format_floorplan_price( $price ){
    return '$' . number_format( (int) $price);
  }

  public static function display_floorplan_features( $post_id ){
    ?>
      <ul class="flex flex-wrap text-base text-gray-600">
      <?php
      $features = get_the_terms($post_id, 'home_feature');
      if (!empty($features)) {
        foreach ($features as $feature) {
          echo '<li class="mr-4 justify-around whitespace-no-wrap"><i class="las la-check mr-1 text-primary"></i>' . $feature->name . '</li>';
        }
      }
      ?>
      </ul>
    <?php
  }

  public static function display_floorplan_meta( $post_id ){
    ?>
    <ul class="text-gray-600 dot-separated">
      <li class="inline-block mr-1"><?php echo get_post_meta($post_id, 'beds', true); ?> beds</li>
      <li class="inline-block mr-1"><?php echo get_post_meta($post_id, 'baths', true); ?> baths</li>
      <li class="inline-block"><?php echo get_post_meta($post_id, 'square_footage', true); ?> sqft</li>
    </ul>
    <?php
  }

}