<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<main id="main">


  <div class="container">
    <div class="inner-container p-24">
      <div class="column  text-center">
        <h1 class="h1 pb-4 mb-6 border-b-2">404</h1>
        <p class="mb-8">Looks like we couldn't find what you were looking for.</p>
        <a href="<?= home_url('/floorplans'); ?>" class="button">Browse Floorplans</a>
        <a href="<?= home_url(); ?>" class="button">Head Home</a>
      </div>
    </div>
  </div>



</main>

<?php get_footer();
