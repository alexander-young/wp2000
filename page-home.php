<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<main id="main">

  <div class="hero flex items-end justify-end w-full bg-gray-500 bg-cover bg-fixed" style="background-image: url('https://images.pexels.com/photos/2029715/pexels-photo-2029715.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=1150&w=1640');">
    <div class="container">
      <div class="ml-auto max-w-xl py-6 px-4 md:pl-20 md:pr-10 text-right text-white bg-transparent-black">
        <h1 class="h2 text-gray-100 mb-4">Your Dream Home Awaits</h1>
        <a href="<?= home_url('/floorplans'); ?>">Browse Floorplans <i class="las la-arrow-right"></i></a>
      </div>
    </div>
  </div> 

  <div class="py-20 bg-gray-100">
    <div class="container text-center">
      <h2 class="h2 mb-2 text-primary font-light">Find your perfect floorplan</h2>
      <p class="max-w-lg mx-auto">As an award winning Utah homebuilder, with communities across Salt Lake and Utah Counties, we’re here to welcome you home.</p>
    </div>
  </div>

  <div class="pt-12 pb-32 bg-gray-200">
    <div class="text-center">
      <h3 class="h3 mb-2">Latest Floorplans</h3>
      <p class="max-w-lg mx-auto mb-10">As an award winning Utah homebuilder, with communities across Salt Lake and Utah Counties, we’re here to welcome you home.</p>
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

            ?>
      </div>
      <div class="text-center">
        <a href="<?php echo get_post_type_archive_link('floorplan')?>" class="button">See All Floorplans</a>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="flex flex-wrap -mx-4">

      <div class="w-full order-last lg:order-first lg:w-1/2 py-24 px-16 lg:py-48 lg:px-30">
        <h5 class="text-primary-light inline-block uppercase pb-3 text-sm tracking-widest border-b-2 border-primary mb-8">Full-Service Design</h5>
        <div class="h2 mb-8">Custom Interior Design</div>
        <p class="mb-10">Take your design to the next level with Miya Interiors’ full-service design process. Your space is an extension of who you are, why not design it through-and-through? Miya Interiors collaborates with you every step of the way to make your space 100% you.</p>
        <a href="/" class="button">Learn More</a>
      </div>

      <div class="w-full order-first lg:order-last lg:w-1/2 lg:-mt-12 lg:px-4">
        <img src="https://images.unsplash.com/photo-1556912172-45b7abe8b7e1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=780&q=80" class="object-cover h-full w-full" />
      </div>

    </div>
  </div>

  <div class="container mb-20">
    <div class="flex flex-wrap -mx-4">
      <div class="w-full lg:w-1/2 lg:-mt-12 lg:px-4">
        <img src="https://images.pexels.com/photos/1070872/pexels-photo-1070872.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="object-cover h-full w-full" />
      </div>
      <div class="w-full lg:w-1/2 py-24 px-16 lg:py-48 lg:px-30">
        <h5 class="text-primary-light inline-block uppercase pb-3 text-sm tracking-widest border-b-2 border-primary mb-8">Full-Service Design</h5>
        <div class="h2 mb-8">Visualize Your Space</div>
        <p class="mb-10">Take your design to the next level with Miya Interiors’ full-service design process. Your space is an extension of who you are, why not design it through-and-through? Miya Interiors collaborates with you every step of the way to make your space 100% you.</p>
        <a href="<?= home_url('/contact'); ?>" class="button">Learn More</a>
      </div>
    </div>
  </div>


</main>

<?php get_footer();
