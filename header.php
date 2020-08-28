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

<body <?php body_class('font-body text-lg leading-relaxed text-gray-700'); ?>>

<div class="site" id="page">

	<div class="w-full shadow-md py-3">

		<div class="container flex justify-between lg:justify-end py-2 text-gray-800 text-sm lg:text-base">
			<a href="tel:<?php echo get_option('wp2k_header_phone');?>" class="inline-block mr-8"><i class="text-primary las la-phone"></i> <?php echo get_option('wp2k_header_phone');?></a>
			<a href="mailto:<?php echo get_option('wp2k_header_email'); ?>"><i class="hidden text-primary sm:inline-block las la-envelope"></i> <?php echo get_option('wp2k_header_email'); ?></a>
		</div>

		<div class="container">
			<div class="inner-container flex items-center justify-between relative">

				<h2 class="column"><a href="/">LOGO GOES HERE</a></h2>

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

	<?php if (!is_front_page() && function_exists('yoast_breadcrumb')): ?>
	<div class="container mt-10">
		<div class="inner-container">
				<div class="column">
					<?php
						yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
					?>
				</div>
		</div>
	</div>
	<?php endif; ?>
