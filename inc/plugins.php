<?php

require get_template_directory() . '/inc/classes/class-tgm-plugin-activation.php';

/**
 * Add required plugins.
 */
add_action( 'tgmpa_register', function() {

	$plugins = array(
		array(
			'name'     => 'ThemeRain Core',
			'slug'     => 'themerain-core',
			'required' => true
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false
		),
		array(
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => false
		),
		array(
			'name'     => 'Envato Market',
			'slug'     => 'envato-market',
			'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'required' => false
		)
	);

	tgmpa( $plugins, [ 'is_automatic' => true ] );
} );
