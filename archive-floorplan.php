<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

?>

<main id="main">

  <div class="container">
    <div class="inner-container">
      <div class="column">
        <h1 class="h1 pb-4 mb-4 border-b-2">Our Floor Plans</h1>
      </div>
    </div>
    <form class="inner-container flex flex-wrap mb-12">
      <div class="column mr-4 flex flex-wrap items-center">
        <label class="uppercase text-sm mr-2 font-bold">Sort By:</label>
        <div class="relative">
          <select name="orderby" id="archive-orderby" class="px-2 pb-1 pr-8 border-0 border-b-2">
            <option value="date" <?php echo selected( (isset($_GET['orderby']) && $_GET['orderby'] === 'date' )); ?>>Newset</option>
            <option value="title" <?php echo selected((isset($_GET['orderby']) && $_GET['orderby'] === 'title')); ?>>Name</option>
          </select>
          <?php select_arrow(); ?>
        </div>
        <input type="hidden" name="order" value="<?php echo (isset($_GET['order'] ) && $_GET['order'] == 'ASC') ? 'ASC' : 'DESC';  ?>" id="archive-order" />
      </div>
      <div class="column flex flex-wrap items-center">
        <div class="uppercase text-sm mr-4 font-bold">Home Type:</div>
        <?php
          $floorplan = new \WP2K\Floorplan();
          $home_types = $floorplan->get_floorplan_types();
          foreach($home_types as $type) {
            ?>
            <label class="inline-checkbox">
            <input type="checkbox"  name="home_type[]" <?php checked( (isset($_GET['home_type']) && in_array($type['slug'], $_GET['home_type'])) ) ?> value="<?php echo $type['slug']; ?>" />
            <span class="leading-none"><?php echo $type['name']; ?></span>
            </label>
            <?php
          }
        ?>
      </div>
      <div class="column">
        <button type="submit" class="button small">Apply</button>
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
