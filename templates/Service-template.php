<?php
/**
 * Template Name: Service page Template */
get_header();
if(is_single()){
	get_website_service_builder();
	if ( have_posts() ) {
		//get_template_part( 'template-parts/partials/related-news' );
	}
}else{	
	get_website_service_builder();
}
get_footer();
?>