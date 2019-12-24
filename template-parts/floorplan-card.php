<?php
  $post_id = get_the_ID();
?>

<div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-8">
  <div class="shadow-md">

    <div class="relative">

      <img src="<?php echo get_field('featured_image')['sizes']['medium_large']; ?>" class="object-cover h-56 w-full" />

      <div class="absolute flex flex-col justify-end bg-gradient-black  px-6 py-3 inset-0">
        <div class="text-gray-400 text-xs uppercase mb-0 tracking-widest leading-tight">starting at:</div>
        <div class="text-gray-100 text-2xl leading-tight"><?php echo \WP2K\Helpers::format_house_price( get_post_meta( $post_id, 'starting_price', true ) ); ?></div>
      </div>

    </div>

    <div class="flex items-center bg-gray-100 px-6 pt-4 pb-2">
      <div>
        <div class="font-thin text-primary-light text-2xl"><?php the_title(); ?></div>
        <ul class="text-gray-600">
          <li class="inline-block mr-2"><?php echo get_post_meta( $post_id, 'beds', true ); ?> beds</li>
          <li class="inline-block mr-2"><?php echo get_post_meta( $post_id, 'baths', true ); ?> baths</li>
          <li class="inline-block"><?php echo get_post_meta( $post_id, 'square_footage', true ); ?> sqft</li>
        </ul>
      </div>
      <div class="text-right flex-1">
        <a href="<?php the_permalink(); ?>" class="button self-center">
          <i class="las la-lg la-arrow-right"></i>
          <span class="sr-only">See more about <?php the_title(); ?></span>
        </a>
      </div>
    </div>

    <hr/>

    <div class="px-6 pt-2 pb-4 text-base text-gray-600">
      <strong>Features</strong>
      <ul class="flex flex-wrap">
      <?php
        $features = get_the_terms( $post_id, 'home_feature' );

        if(!empty($features)){

          foreach($features as $feature){
            echo '<li class="mr-4 whitespace-no-wrap"><i class="las la-check mr-1 text-primary"></i>'.$feature->name.'</li>';
          }

        }

      ?>
      </ul>
    </div>

  </div>
</div>