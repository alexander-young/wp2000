<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<main id="main">

  <div class="container">
    <select name="sort" id="floorplan_sorting">
      <option selected value="date">Newset</option>
      <option value="title">Name</option>
    </select>
  </div>

  <div class="container flex flex-wrap py-32" id="floorplan_archive_loop">
    <?php
      
      if( have_posts() ): while( have_posts() ): the_post();
        get_template_part('template-parts/floorplan-card');
      endwhile; endif;  
    
    ?>
  </div>

</main>

<?php get_footer();
