<?php
/**
 * Template Name: Blog
 */

get_header();

$style = themerain_meta( 'blog_style' );
$count = get_option( 'posts_per_page' );
$cats  = themerain_meta( 'blog_cats' );
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => $count,
	'paged'          => $paged
);

if ( $cats ) {
	$args['tax_query'] = array( array( 'taxonomy' => 'category', 'terms' => $cats ) );
}

$query = new WP_Query( $args );

echo '<div class="area blog-area ' . esc_attr( $style ) . '">';
	while ( $query->have_posts() ) :
		$query->the_post();
		set_query_var( 'blog_style', $style );

		get_template_part( 'template-parts/content' );
	endwhile;
echo '</div>';

themerain_loadmore( array(
	'post_type'    => 'post',
	'count'        => $count,
	'current_page' => $paged,
	'max_pages'    => $query->max_num_pages,
	'style'        => $style,
	'cats'         => ( is_array( $cats ) ) ? implode( ',', $cats ) : ''
) );

wp_reset_postdata();

get_footer();
