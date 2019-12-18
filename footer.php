<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

</div><!-- #page we need this extra closing tag here -->

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

