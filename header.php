<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site" id="page">

	<div id="wrapper-navbar">

		<nav class="navbar">

			<div class="container">

				<?php wp_nav_menu(
          array(
            'theme_location' => 'primary',
            'menu_class' => 'navbar-nav',
            'fallback_cb' => '',
            'menu_id' => 'main-menu',
            'depth' => 1,
          )
        ); ?>

			</div>

		</nav>

	</div>
