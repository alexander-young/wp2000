<?php

namespace WP2K;

class Helpers {
  
  public static function format_house_price( $price ){
    return '$' . number_format( (int) $price);
  }

}