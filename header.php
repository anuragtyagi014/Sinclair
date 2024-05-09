<!doctype html>
<html <?php language_attributes(); ?> class="is-animating">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script> -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="swup">

		<header class="site-header">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<?php themerain_logo(); ?>
					</div>
					<div class="col-6 align-self-center">
						<?php themerain_menu(); ?>
					</div>
				</div>
				<div>
		</header>

		<!-- <?php get_template_part( 'template-parts/hero' ); ?> -->

		<!-- <main class="site-main"> -->