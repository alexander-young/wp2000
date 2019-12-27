<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<main id="main" class="">

  <div class="container">

    <div class="inner-container flex flex-col md:justify-center md:items-center mb-16 md:mb-32">
      <div class="column mb-4 lg:mr-6">
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="column text-primary text-base uppercase tracking-widest">
        <a href="#" class="mr-6" download><i class="las la-lg la-download"></i>Download Floor Plan</a>
        <a href="#" class="" download><i class="las la-lg la-question"></i>Request Info</a>
      </div>
    </div>

    <div class="inner-container">
      <div class="column">
        <img src="<?php echo get_field('featured_image')['sizes']['full-width']; ?>" />
      </div>
    </div>

    <div class="inner-container flex flex-wrap py-12 md:py-24 border-b-2 mb-24">

      <div class="column w-full mb-6 md:mb-0 md:w-1/2">
        <h4 class="mb-2 text-gray-800">Why we love <?php the_title(); ?></h4>
        Enim commodo aliquip nostrud mollit officia Lorem culpa irure do ex enim. Adipisicing consequat elit anim eu dolore nisi amet. Cillum est minim do do mollit laborum dolor eiusmod est eu est.
      </div>

      <div class="column w-full md:w-1/2">

        <div class="mb-6">
          <div class="h4 mb-2 text-gray-800">Features</div>
          <?php \WP2K\Helpers::display_floorplan_features( get_the_ID() ); ?>
        </div>
        
        <div class="mb-6">
          <div class="h4 mb-2 text-gray-800">Floorplan Type</div>
          <?php // \WP2K\Helpers::display_floorplan_meta( get_the_ID() ); ?>
          <div class="text-base text-gray-600"><i class="las la-home text-primary mr-1"></i>Single Family</div>
        </div>

        <div class="h4 mb-2 text-gray-800">Other Numbers</div>
        <?php \WP2K\Helpers::display_floorplan_meta( get_the_ID() ); ?>


      </div>

    </div>


    <div class="inner-container">
        <h3 class="h2 column text-primary text-center mb-12">You might also like...</h3>
        <!-- https://wordpress.stackexchange.com/questions/326497/how-to-display-related-posts-based-on-number-of-taxonomy-terms-matched -->

        <div class="flex flex-wrap justify-center">
        <?php 

        $query = new WP_Query([
          'post_type' => 'floorplan',
          'posts_per_page' => 3
        ]);

        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        echo '<div class="column w-full sm:w-1/2 lg:w-1/3 mb-8 lg:mb-0">';
        get_template_part('template-parts/floorplan', 'card');
        echo '</div>';
        endwhile;
        endif;

        ?>
    </div>

  </div>

</main>

<?php get_footer();
