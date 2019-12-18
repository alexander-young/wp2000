<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="bg-white antialiased">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class('font-body text-lg leading-relaxed'); ?>>

<div class="site" id="page">

	<div class="w-full shadow-lg py-3">

		<div class="w-full max-w-6xl mx-auto flex justify-between">

			<img src="<?= get_stylesheet_directory_uri() ?> /assets/dist/img/logo.svg" />

			<nav>

					<?php wp_nav_menu([
						'theme_location' => 'main_menu',
						'container_class' => 'py-2',
					]); ?>

			</nav>

		</div>

	</div>
