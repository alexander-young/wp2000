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
        <a href="/">Browse Floorplans <i class="las la-arrow-right"></i></a>
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
      <div class="flex flex-wrap -mx-2 mb-12">
        <?php 
        
          $query = new WP_Query([
            'post_type' => 'floorplan',
            'posts_per_page' => 3
          ]);

          if($query->have_posts()): while($query->have_posts()): $query->the_post();
            get_template_part('template-parts/floorplan', 'card'); 
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

      <div class="w-full order-last md:order-first md:w-1/2 py-24 px-16 md:py-48 md:px-30">
        <h5 class="text-primary-light inline-block uppercase pb-3 text-sm tracking-widest border-b-2 border-primary mb-8">Full-Service Design</h5>
        <div class="h2 mb-8">Custom Interior Design</div>
        <p class="mb-10">Take your design to the next level with Miya Interiors’ full-service design process. Your space is an extension of who you are, why not design it through-and-through? Miya Interiors collaborates with you every step of the way to make your space 100% you.</p>
        <a href="/" class="button">Learn More</a>
      </div>

      <div class="w-full order-first md:order-last md:w-1/2 md:-mt-12 md:px-4">
        <img src="https://images.unsplash.com/photo-1556912172-45b7abe8b7e1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=780&q=80" class="object-cover h-full w-full" />
      </div>

    </div>
  </div>

  <div class="container mb-20">
    <div class="flex flex-wrap -mx-4">
      <div class="w-full md:w-1/2 md:-mt-12 md:px-4">
        <img src="https://images.pexels.com/photos/1070872/pexels-photo-1070872.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="object-cover h-full w-full" />
      </div>
      <div class="w-full md:w-1/2 py-24 px-16 md:py-48 md:px-30">
        <h5 class="text-primary-light inline-block uppercase pb-3 text-sm tracking-widest border-b-2 border-primary mb-8">Full-Service Design</h5>
        <div class="h2 mb-8">Visualize Your Space</div>
        <p class="mb-10">Take your design to the next level with Miya Interiors’ full-service design process. Your space is an extension of who you are, why not design it through-and-through? Miya Interiors collaborates with you every step of the way to make your space 100% you.</p>
        <a href="/" class="button">Learn More</a>
      </div>
    </div>
  </div>

  <div class="w-full relative bg-cover bg-center px-8" style="background-image: url('https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=1&h=650&w=1940);">
    <div class="absolute inset-0 bg-gradient-black"></div>
    <div class="w-full max-w-2xl mx-auto relative bg-gray-100 text-center py-12 md:py-14 -bottom-16 shadow-2xl">
      <h4 class="h2 mb-4">Ready To Start?</h4>
      <p class="mb-8 px-8 max-w-xl mx-auto">Take your design to the next level with Miya Interiors’ full-service design process. Your space is an extension of who you are, why not design it through-and-through?</p>
      <a href="/" class="button">Contact Us <i class="las la-arrow-right"></i></a>
    </div>
  </div>


</main>

<?php get_footer();
