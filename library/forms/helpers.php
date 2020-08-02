<?php 


function select_arrow(){
  ?>
  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
  </div>
  <?php
}

function wp2k_link($link_array = [], $classes = '', $arrow = false){

  if (!empty($link_array) && isset($link_array['url'])) {

    $link_url = $link_array['url'];
    $link_title = $link_array['title'];
    $link_target = $link_array['target'] ? $link_array['target'] : '_self';
    ?>
      <a
        href="<?php echo esc_url($link_url); ?>"
        class="<?php echo esc_attr($classes); ?>"
        target="<?php echo esc_attr($link_target); ?>"
      >
        <?php 
          echo esc_html($link_title);
          if($arrow){
            echo '<i class="las la-arrow-right"></i>';
          }
        ?>
      </a>
    <?php
  }
}

function wp2k_image($image_array = [], $classes = '', $size = 'full'){

  if(!empty($image_array)){
    echo wp_get_attachment_image($image_array['ID'], $size, false, [
      'class' => $classes,
    ]);
  }

}

?>