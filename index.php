<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<main id="main">


  <div class="container">
    <div class="inner-container mb-6">
      <div class="column">
        <h1 class="h1 pb-4 mb-12 border-b-2">Blog</h1>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="inner-container flex">
      <div class="column w-full md:w-2/3">
        <div class="inner-container flex flex-wrap">
          <?php
          if (have_posts()) : while (have_posts()) : the_post();
          ?>
            <div class="w-full sm:w-1/2 mb-10 column">
              <?php 
              if (has_post_thumbnail()) {
                // $imgObj = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                // $src = $imgObj[0];
                $src = 'https://via.placeholder.com/400x200';
              } else {
                $src = 'https://via.placeholder.com/400x200';
              }
              ?>
              <img src="<?php echo $src; ?>" class="object-cover w-full" />
              <?php the_title(); ?>
            </div>
          <?php
          endwhile;
          endif;
          ?>
        </div>
      </div>
      <div class="column w-full md:w-1/3">
          <?php get_sidebar(); ?>
      </div>
    </div>
  </div>


  <div class="container">
    <?php get_template_part('template-parts/loop/pagination'); ?>
  </div>


</main>

<?php get_footer();
