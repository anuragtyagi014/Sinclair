<?php

/**
 * Display upgrade notice on theme switch
 */
function themerain_bc_switch_theme() {
	add_action( 'admin_notices', 'themerain_bc_upgrade_notice' );
}
add_action( 'after_switch_theme', 'themerain_bc_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch
 */
function themerain_bc_upgrade_notice() {
	echo '<div class="error"><p>';
	printf(
		esc_html__( 'This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'themerain' ),
		esc_html( $GLOBALS['wp_version'] )
	);
	echo '</p></div>';
}

/**
 * Prevents the Customizer from being loaded
 */
function themerain_bc_customize() {
	wp_die(
		sprintf(
			esc_html__( 'This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'themerain' ),
			esc_html( $GLOBALS['wp_version'] )
		),
		'',
		array( 'back_link' => true )
	);
}
add_action( 'load-customize.php', 'themerain_bc_customize' );

/**
 * Prevents the Theme Preview from being loaded
 */
function themerain_bc_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die(
			sprintf(
				esc_html__( 'This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'themerain' ),
				esc_html( $GLOBALS['wp_version'] )
			)
		);
	}
}
add_action( 'template_redirect', 'themerain_bc_preview' );
