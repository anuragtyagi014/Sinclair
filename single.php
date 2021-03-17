<?php
get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content' );

	get_template_part( 'template-parts/navigation' );

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile;

get_footer();
