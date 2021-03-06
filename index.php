<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<main id="main">


  <div class="container">
    <div class="inner-container mb-6">
      <div class="column">
        <h1 class="h1 pb-4 mb-12 border-b-2">
          <?php 
          if(is_search()){
            global $wp_query;
            $total_results = $wp_query->found_posts;
            echo 'Found ' . $total_results . ' results for "' . get_search_query() . '"';
          } elseif(is_home()) {
            echo 'Latest News';
          }else{
            the_archive_title();
          }
          ?>
        </h1>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="inner-container flex flex-wrap">
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
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo $src; ?>" class="object-cover w-full" />
              </a>
              <div class="py-4 px-6 border-2">
                <h2 class="h4">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h2>
                <span class="text-sm text-gray-600 italic"><?= get_the_date(); //because the_date only outputs if the previous date was different ?></span>
                <br/>
                <a href="<?php the_permalink(); ?>" class="text-sm text-primary">Read More</a>
              </div>
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
