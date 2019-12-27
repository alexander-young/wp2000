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

		<div class="container flex justify-between lg:justify-end py-2 text-gray-800 text-sm lg:text-base">
			<a href="tel:123-456-7890" class="inline-block mr-8"><i class="las la-phone"></i> 123.456.7890</a>
			<a href="mailto:me@example.com"><i class="hidden sm:inline-block las la-envelope"></i> me@example.com</a>
		</div>

		<div class="container">
			<div class="inner-container flex items-center justify-between relative">

				<h2 class="column">LOGO GOES HERE</h2>

				<nav class="main-menu hidden lg:block column">
						<?php wp_nav_menu([
							'theme_location' => 'main_menu',
							'container_class' => '',
						]); ?>
				</nav>

				<button class="menu-toggle block lg:hidden column">
					<i class="las la-2x la-bars"></i>
				</button>
			</div>

		</div>

	</div>
