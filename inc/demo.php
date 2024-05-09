<?php

/**
 * Import demo data.
 */
function themerain_import_files() {
	return array(
		array(
			'import_file_name'           => 'Demo Import',
			'import_file_url'            => 'https://themerain.com/dummy/scena/demo.xml',
			'import_customizer_file_url' => 'https://themerain.com/dummy/scena/customizer.dat'
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'themerain_import_files' );

/**
 * After import setup.
 */
function themerain_after_import() {
	$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
		)
	);

  $front_page_id = get_page_by_title( 'Work - Slider' );
  $blog_page_id  = get_page_by_title( 'Blog - List' );

	update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'themerain_after_import' );
