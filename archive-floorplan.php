<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

?>

<main id="main">

  <div class="container">
    <div class="inner-container">
      <div class="column">
        <h1 class="h1 pb-4 mb-12 border-b-2">Our Floor Plans</h1>
      </div>
    </div>
    <form class="inner-container flex flex-wrap content-center mb-6" id="floorplan_sorting">
      <div class="column mr-4">
        <div class="inline-block align-middle uppercase text-sm mr-2 font-bold">Sort By:</div>
        <select name="sort" class="inline-block align-middle">
          <option value="date" <?php echo selected( $_GET['orderby'], 'date'); ?>>Newset</option>
          <option value="title" <?php echo selected( $_GET['orderby'], 'title'); ?>>Name</option>
        </select>
      </div>
      <div class="column">
        <div class="inline-block align-middle uppercase text-sm mr-2 font-bold">Home Type:</div>
        <label class="inline-checkbox"><input type="checkbox" <?php checked( in_array('single-family', $_GET['home_type']) , true) ?>  name="home_type[]" value="single-family" />Single Family</label>
        <label class="inline-checkbox"><input type="checkbox" <?php checked(in_array('condo', $_GET['home_type']), true) ?> name="home_type[]" value="condo" />Condo</label>
        <label class="inline-checkbox"><input type="checkbox" <?php checked(in_array('townhome', $_GET['home_type']), true) ?> name="home_type[]" value="townhome" />Townhome</label>
      </div>
      <div class="column">
        <button type="submit" class="button">Apply</button>
      </div>
    </form>
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
