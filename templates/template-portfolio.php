<?php
/**
 * Template Name: Portfolio
 */

get_header();

$style = themerain_meta( 'portfolio_style' );
$count = themerain_meta( 'portfolio_per_page' );
$cats  = themerain_meta( 'portfolio_categories' );
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );

$args = array(
	'post_type'      => 'project',
	'posts_per_page' => $count,
	'paged'          => $paged
);

if ( $cats ) {
	$args['tax_query'] = array( array( 'taxonomy' => 'project-category', 'terms' => $cats ) );
}

$query = new WP_Query( $args );

echo '<div class="area portfolio-area ' . esc_attr( $style ) . '">';
	if ( 'slider' === $style || 'carousel' === $style ) echo '<div class="swiper-container">';
	if ( 'slider' === $style || 'carousel' === $style ) echo '<div class="swiper-wrapper">';

	while ( $query->have_posts() ) :
		$query->the_post();
		set_query_var( 'portfolio_style', $style );

		if ( 'slider' === $style || 'carousel' === $style ) echo '<div class="swiper-slide">';
		get_template_part( 'template-parts/content', 'project' );
		if ( 'slider' === $style || 'carousel' === $style ) echo '</div>';
	endwhile;

	if ( 'slider' === $style || 'carousel' === $style ) echo '</div>';
	if ( 'slider' === $style && 'slider' === $style && 'dots' === get_theme_mod( 'portfolio_slider_nav', 'none' ) ) echo '<div class="swiper-pagination"></div>';
	if ( 'carousel' === $style || ( 'slider' === $style && 'scrollbar' === get_theme_mod( 'portfolio_slider_nav', 'none' ) ) ) echo '<div class="swiper-scrollbar"></div>';
	if ( 'slider' === $style || 'carousel' === $style ) echo '</div>';
echo '</div>';

if ( 'grid' === $style ) {
	themerain_loadmore( array(
		'post_type'    => 'project',
		'count'        => $count,
		'current_page' => $paged,
		'max_pages'    => $query->max_num_pages,
		'style'        => $style,
		'cats'         => ( is_array( $cats ) ) ? implode( ',', $cats ) : ''
	) );
}

wp_reset_postdata();

get_footer();
