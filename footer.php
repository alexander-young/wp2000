<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

</div><!-- #page we need this extra closing tag here -->
  
  <div class="w-full relative bg-cover bg-center px-8"
  <?php 
    if(is_numeric($attach_id = get_option('wp2k_footer_background'))){
      $footer_bg = wp_get_attachment_image_src($attach_id, 'large');
      ?>
      style="background-image: url('<?php echo $footer_bg[0]; ?>');"
      <?php
    }
  ?>
  >
    <div class="absolute inset-0 bg-gradient-black"></div>
    <div class="w-full max-w-2xl mx-auto relative bg-gray-100 text-center py-12 md:py-14 -bottom-16 shadow-2xl">
      <h4 class="h2 mb-4"><?php echo get_option('wp2k_footer_heading'); ?></h4>
      <p class="mb-8 px-8 max-w-xl mx-auto"><?php echo get_option('wp2k_footer_copy'); ?></p>
      <a href="<?= home_url(get_option(' wp2k_footer_button_link ')); ?>" class="button"><?php echo get_option('wp2k_footer_button_text'); ?> <i class="las la-arrow-right"></i></a>
    </div>
  </div>

<div class="pt-32 pb-16 text-gray-100 bg-gray-800 text-center">
  <ul class="mb-4">
    <li class="inline-block"><i class="lab la-lg la-facebook-f"></i></li>
    <li class="inline-block"><i class="lab la-lg la-twitter"></i></li>
    <li class="inline-block"><i class="lab la-lg la-instagram"></i></li>
    <li class="inline-block"><i class="lab la-lg la-youtube"></i></li>
    <li class="inline-block"><i class="lab la-lg la-pinterest"></i></li>
  </ul>
  <nav class="text-xs text-gray-100">
    <a href="/" class="inline-block mr-2 uppercase">floorplans</a>
    <a href="/" class="inline-block mr-2 uppercase">blog</a>
    <a href="/" class="inline-block mr-2 uppercase">about</a>
    <a href="/" class="inline-block mr-2 uppercase">contact</a>
  </nav>
</div>

<div class="py-4 bg-gray-900 text-gray-400 text-xs text-center">
  Copyright &copy; <?= date('Y'); ?> WP2K Homes
</div>

<?php wp_footer(); ?>

</body>

</html>

