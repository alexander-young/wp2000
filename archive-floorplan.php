<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

?>

<main id="main">

  <div class="container">
    <div class="inner-container mb-6">
      <div class="column">
        <h1 class="h1 pb-4 mb-12 border-b-2">Our Floor Plans</h1>
        <div class="inline-block align-middle uppercase text-sm mr-2">Sort By:</div>
        <select name="sort" class="inline-block align-middle" id="floorplan_sorting">
          <option value="date" <?php echo selected( $_GET['orderby'], 'date'); ?>>Newset</option>
          <option value="title" <?php echo selected( $_GET['orderby'], 'title'); ?>>Name</option>
        </select>
      </div>
    </div>
    <div class="inner-container flex flex-wrap" id="floorplan_archive_loop">
      <?php
        if( have_posts() ): while( have_posts() ): the_post();
          echo '<div class="w-full sm:w-1/2 md:w-1/3 mb-10 column">';
          get_template_part('template-parts/floorplan-card');
          echo '</div>';
        endwhile; endif;  
      ?>
    </div>
    <?php get_template_part('template-parts/loop/pagination'); ?>
  </div>

</main>

<?php get_footer();
