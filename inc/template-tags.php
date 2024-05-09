<?php

/**
 * Logo
 */
function themerain_logo() {
	$logo = get_theme_mod( 'themerain_logo' );
	$logo_light = get_theme_mod( 'themerain_logo_light' );
	$logo_svg = get_theme_mod( 'themerain_logo_svg' );
	$logo_width = get_theme_mod( 'themerain_logo_width' );
	$width = ( $logo_width ) ? ' style="max-width: ' . esc_attr( $logo_width ) . 'px;"' : '';
	$kses_defaults = wp_kses_allowed_html( 'post' );
	$svg_args = array(
		'svg' => array(
			'class' => true,
			'aria-hidden' => true,
			'aria-labelledby' => true,
			'role' => true,
			'xmlns' => true,
			'width' => true,
			'height' => true,
			'viewbox' => true,
		),
		'g' => array( 'fill' => true ),
		'title' => array( 'title' => true ),
		'path' => array( 'd' => true, 'fill' => true ),
	);
	$allowed = array_merge( $kses_defaults, $svg_args );

	echo '<div class="site-logo">';
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
			if ( $logo || $logo_light ) {
				if ( $logo ) echo '<img class="logo-dark" src="' . esc_url( $logo ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '"' . $width . '>';
				if ( $logo_light ) echo '<img class="logo-light" src="' . esc_url( $logo_light ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '"' . $width . '>';
			} elseif ( $logo_svg ) {
				echo wp_kses( $logo_svg, $allowed );
			} else {
				echo esc_html( get_bloginfo( 'name' ) );
			}
		echo '</a>';
	echo '</div>';
}

/**
 * Menu
 */
function themerain_menu() {
	echo '<div class="site-menu-wrap">';
		if ( has_nav_menu( 'primary' ) ) {
			echo '<nav class="site-menu">';
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container' => false,
						'depth' => 2
					)
				);
			echo '</nav>';
		}

		themerain_social();
	echo '</div>';

	echo '<div class="menu-toggle"><span></span><span></span></div>';
}

/**
 * Social
 */
function themerain_social() {
	$twitter = get_theme_mod( 'themerain_social_twitter' );
	$facebook = get_theme_mod( 'themerain_social_facebook' );
	$youtube = get_theme_mod( 'themerain_social_youtube' );
	$instagram = get_theme_mod( 'themerain_social_instagram' );
	$behance = get_theme_mod( 'themerain_social_behance' );
	$dribbble = get_theme_mod( 'themerain_social_dribbble' );
	$vimeo = get_theme_mod( 'themerain_social_vimeo' );
	$telegram = get_theme_mod( 'social_telegram' );
	$tiktok = get_theme_mod( 'social_tiktok' );
	$pinterest = get_theme_mod( 'themerain_social_pinterest' );
	$linkedin = get_theme_mod( 'themerain_social_linkedin' );
	$vk = get_theme_mod( 'themerain_social_vk' );
	$spotify = get_theme_mod( 'themerain_social_spotify' );

	echo '<div class="site-social">';
		if ( $twitter ) echo '<a href="' . esc_url( $twitter ) . '" target="_blank">' . themerain_get_svg( 'twitter' ) . '</a>';
		if ( $facebook ) echo '<a href="' . esc_url( $facebook ) . '" target="_blank">' . themerain_get_svg( 'facebook' ) . '</a>';
		if ( $youtube ) echo '<a href="' . esc_url( $youtube ) . '" target="_blank">' . themerain_get_svg( 'youtube' ) . '</a>';
		if ( $instagram ) echo '<a href="' . esc_url( $instagram ) . '" target="_blank">' . themerain_get_svg( 'instagram' ) . '</a>';
		if ( $behance ) echo '<a href="' . esc_url( $behance ) . '" target="_blank">' . themerain_get_svg( 'behance' ) . '</a>';
		if ( $dribbble ) echo '<a href="' . esc_url( $dribbble ) . '" target="_blank">' . themerain_get_svg( 'dribbble' ) . '</a>';
		if ( $vimeo ) echo '<a href="' . esc_url( $vimeo ) . '" target="_blank">' . themerain_get_svg( 'vimeo' ) . '</a>';
		if ( $telegram ) echo '<a href="' . esc_url( $telegram ) . '" target="_blank">' . themerain_get_svg( 'telegram' ) . '</a>';
		if ( $tiktok ) echo '<a href="' . esc_url( $tiktok ) . '" target="_blank">' . themerain_get_svg( 'tiktok' ) . '</a>';
		if ( $pinterest ) echo '<a href="' . esc_url( $pinterest ) . '" target="_blank">' . themerain_get_svg( 'pinterest' ) . '</a>';
		if ( $linkedin ) echo '<a href="' . esc_url( $linkedin ) . '" target="_blank">' . themerain_get_svg( 'linkedin' ) . '</a>';
		if ( $vk ) echo '<a href="' . esc_url( $vk ) . '" target="_blank">' . themerain_get_svg( 'vk' ) . '</a>';
		if ( $spotify ) echo '<a href="' . esc_url( $spotify ) . '" target="_blank">' . themerain_get_svg( 'spotify' ) . '</a>';
	echo '</div>';
}

/**
 * Load more
 */
function themerain_loadmore( $args ) {
	$args = wp_parse_args( $args, [
		'post_type'    => '',
		'count'        => '',
		'current_page' => '',
		'max_pages'    => '',
		'style'        => '',
		'cats'         => ''
	] );

	$link  = get_next_posts_link();
	$data  = ' data-type="' . esc_attr( $args['post_type'] ) . '"';
	$data .= ' data-ppp="' . esc_attr( $args['count'] ) . '"';
	$data .= ' data-cpage="' . esc_attr( $args['current_page'] ) . '"';
	$data .= ' data-pages="' . esc_attr( $args['max_pages'] ) . '"';
	$data .= ' data-style="' . esc_attr( $args['style'] ) . '"';
	if ( $args['cats'] ) $data .= ' data-cats="' . esc_attr( $args['cats'] ) . '"';

	if ( ( $args['max_pages'] > 1 ) && ( $args['current_page'] < $args['max_pages'] ) ) {
		echo '<div class="load-more"' . $data . '><span>' . esc_html__( 'Load More', 'themerain' ) . '</span></div>';
	}
}

/**
 * ThemeRain Image
 */
function themerain_get_image( $id ) {
	$html  = '';
	$attr  = array();
	$image = wp_get_attachment_image_src( $id, 'full' );

	if ( $image ) {
		$attr['data-src'] = $image[0];
		$attr['class']    = 'lazyload';
		$attr['alt']      = trim( strip_tags( get_post_meta( $id, '_wp_attachment_image_alt', true ) ) );

		$srcset = wp_get_attachment_image_srcset( $id, 'full' );
		if ( $srcset ) {
			$attr['data-srcset'] = $srcset;
		}

		$attr = array_map( 'esc_attr', $attr );

		$html = '<img';
		foreach ( $attr as $name => $value ) {
			$html .= " $name=" . '"' . $value . '"';
		}
		$html .= ' />';
	}

	return $html;
}
