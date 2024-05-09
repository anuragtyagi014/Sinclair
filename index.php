<?php

get_header();

if ( is_archive() || is_search() ) {
	$style = get_theme_mod( 'archive_style', 'list' );
} else {
	$style = get_theme_mod( 'blog_default_style', 'list' );
}

if ( have_posts() ) {

	echo '<div class="area blog-area ' . esc_attr( $style ) . '">';
		while ( have_posts() ) :
			the_post();
			set_query_var( 'blog_style', $style );

			get_template_part( 'template-parts/content' );
		endwhile;
	echo '</div>';

	themerain_loadmore( array(
		'post_type'    => 'post',
		'count'        => get_option( 'posts_per_page' ),
		'current_page' => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
		'max_pages'    => $wp_query->max_num_pages,
		'style'        => $style,
		'cats'         => get_query_var( 'cat' )
	) );

}

get_footer();
