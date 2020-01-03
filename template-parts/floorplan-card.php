<?php
  $post_id = get_the_ID();
  $floorplan = new \WP2K\Floorplan($post_id);
?>

<div class="shadow-md">

  <div class="relative">

    <img src="<?php echo get_field('featured_image')['sizes']['medium_large']; ?>" class="object-cover h-56 w-full" />

    <div class="absolute flex flex-col justify-end bg-gradient-black px-4 py-3 inset-0">
      <div class="text-gray-400 text-xs uppercase mb-0 tracking-widest leading-tight">starting at:</div>
      <div class="text-gray-100 text-2xl leading-tight"><?php echo $floorplan->format_floorplan_price( get_post_meta( $post_id, 'starting_price', true ) ); ?></div>
    </div>

  </div>

  <div class="flex items-center bg-gray-100 px-4 pt-4 pb-2">
    <div>
      <div class="font-thin text-primary-light text-2xl">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </div>
      <?php $floorplan->display_floorplan_meta( $post_id ); ?>
    </div>
  </div>

  <hr/>

  <div class="px-4 p-2">
    <?php $floorplan->display_floorplan_features( $post_id ); ?>
  </div>

</div>