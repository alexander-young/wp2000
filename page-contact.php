<?php

/*
 * Template Name: Contact
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<main id="main">

  <div class="container">

    <div class="inner-container">
      <h1 class="column h1 pb-4 mb-12 border-b-2">
        <?php the_title(); ?>
      </h1>
    </div>

    <div class="inner-container prose prose-xl">
      <div class="column w-full">
        <?php the_content(); ?>
      </div>
    </div>

    <div class="inner-container flex flex-wrap">
      <div class="column w-full md:w-2/3 mb-8 sm:mb-0">
        <?php echo do_shortcode('[contact_form]'); ?>
      </div>
      <div class="column w-full md:w-1/3 prose">
        <div class="h4 border-b-2 mb-1">Address:</div>
        <p translate="no">
          <span class="font-bold">WP2K Homes</span><br>
          1234 Evergreen Terrace<br>
          Salt Lake City, Utah 84010
        </p>
        <div class="h4 border-b-2 mb-1">Hours of Operation:</div>
        <table class="w-auto">
          <tr><th>Monday</th><td>9am - 5pm</td></tr>
          <tr><th>Tuesday</th><td>9am - 5pm</td></tr>
          <tr><th>Wednesday</th><td>9am - 5pm</td></tr>
          <tr><th>Thursday</th><td>9am - 5pm</td></tr>
          <tr><th>Friday</th><td>9am - 5pm</td></tr>
          <tr><th>Saturday</th><td>Closed</td></tr>
          <tr><th>Sunday</th><td>Closed</td></tr>
        </table>
      </div>
    </div>

  </div>

</main>

<?php get_footer();
