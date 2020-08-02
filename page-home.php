<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<main id="main">

  <?php
    $hero = get_field('background');
    $full_hero = $hero['url'];
  ?>
  <div class="hero flex items-end justify-end w-full bg-gray-500 bg-cover bg-fixed" style="background-image: url('<?php echo esc_url($full_hero); ?>');">
    <div class="container">
      <div class="ml-auto max-w-xl py-6 px-4 md:pl-20 md:pr-10 text-right text-white bg-transparent-black">
        <h1 class="h2 text-gray-100 mb-4"><?php echo esc_html(get_field('tagline'))?></h1>
        <?php wp2k_link( get_field('link'), '', true ); ?>
      </div>
    </div>
  </div> 

  <div class="py-20 bg-gray-100">
    <div class="container text-center">
      <h2 class="h2 mb-2 text-primary font-light"><?php echo esc_html(get_field('s1_heading')); ?></h2>
      <p class="max-w-lg mx-auto"><?php echo esc_html(get_field('s1_copy')); ?></p>
    </div>
  </div>

  <div class="pt-12 pb-32 bg-gray-200">
    <div class="text-center">
      <h3 class="h3 mb-2"><?php echo esc_html(get_field('s2_heading')); ?></h3>
      <p class="max-w-lg mx-auto mb-10"><?php echo esc_html(get_field('s2_copy')); ?></p>
    </div>
    <div class="container">
      <div class="flex flex-wrap justify-center inner-container mb-12">
          <?php 
          
            $query = new WP_Query([
              'post_type' => 'floorplan',
              'posts_per_page' => 3
            ]);

            if($query->have_posts()): while($query->have_posts()): $query->the_post();
              echo '<div class="column w-full sm:w-1/2 lg:w-1/3 mb-8 md:mb-0">';
              get_template_part('template-parts/floorplan', 'card'); 
              echo '</div>';
            endwhile; endif;

            wp_reset_postdata();

            ?>
      </div>
      <div class="text-center">
        <?php wp2k_link( get_field('s2_cta'), 'button' ); ?>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="flex flex-wrap -mx-4">

      <div class="w-full order-last lg:order-first lg:w-1/2 py-24 px-16 lg:py-48 lg:px-30">
        <h5 class="text-primary-light inline-block uppercase pb-3 text-sm tracking-widest border-b-2 border-primary mb-8"><?php echo esc_html(get_field('s3_label')); ?></h5>
        <div class="h2 mb-8"><?php echo esc_html(get_field('s3_heading')); ?></div>
        <p class="mb-10"><?php echo esc_html(get_field('s3_copy')); ?></p>
        <?php wp2k_link(get_field('s3_link'), 'button'); ?>
      </div>

      <div class="w-full order-first lg:order-last lg:w-1/2 lg:-mt-12 lg:px-4">
        <?php wp2k_image(get_field('s3_image'), 'object-cover h-full w-full', 'large') ?>
      </div>

    </div>
  </div>

  <div class="container mb-20">
    <div class="flex flex-wrap -mx-4">
      <div class="w-full lg:w-1/2 lg:-mt-12 lg:px-4">
        <?php wp2k_image(get_field('s4_image'), 'object-cover h-full w-full', 'large')?>
      </div>
      <div class="w-full lg:w-1/2 py-24 px-16 lg:py-48 lg:px-30">
        <h5 class="text-primary-light inline-block uppercase pb-3 text-sm tracking-widest border-b-2 border-primary mb-8"><?php echo esc_html(get_field('s4_label')); ?></h5>
        <div class="h2 mb-8"><?php echo esc_html(get_field('s4_heading')); ?></div>
        <p class="mb-10"><?php echo esc_html(get_field('s4_copy')); ?></p>
        <?php wp2k_link(get_field('s4_link'), 'button'); ?>
      </div>
    </div>
  </div>


</main>

<?php get_footer();
