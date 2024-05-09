<?php

$style     = get_query_var( 'portfolio_style' );
$secondary = themerain_meta( 'project_thumbnail_secondary' );
$video     = themerain_meta( 'project_thumbnail_video' );
$poster    = '';
$classes   = '';
$enable_autoplay = get_theme_mod( 'enable_video_autoplay' );
$autoplay        = ( 'slider' === $style || $enable_autoplay ) ? ' data-autoplay' : '';

$url       = get_the_permalink();
$url_type  = themerain_meta( 'project_link_type' );
$url_data  = '';

if ( 'image' === $url_type ) {
	$url      = wp_get_attachment_url( themerain_meta( 'project_link_image' ) );
	$url_data = ' data-fancybox data-no-swup';
} elseif ( 'video' === $url_type ) {
	$url      = themerain_meta( 'project_link_video' );
	$url_data = ' data-fancybox data-no-swup';
} elseif ( 'url' === $url_type ) {
	$url      = themerain_meta( 'project_link_url' );
}

if ( $video && 'slider' !== $style ) {
	$classes .= ' has-video';
}

if ( $video && ! $enable_autoplay && 'slider' !== $style ) {
	$classes .= ' has-hover-video';
}

if ( $secondary && ! $video ) {
	$classes .= ' has-secondary-thumbnail';
}

?>

<div <?php post_class( esc_attr( $classes ) ); ?>>
	<div class="project-thumbnail">
		<div class="project-thumbnail-inner"<?php if ( 'slider' === $style ) echo 'data-swiper-parallax="25%"'; ?>>
			<?php
			if ( $video ) {

				if ( has_post_thumbnail() ) {
					$poster = ' data-poster="' . esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '"';
				}

				echo '<video class="lazyload" src="' . esc_url( wp_get_attachment_url( $video ) ) . '"' . $poster . ' preload="none" muted loop playsinline webkit-playsinline' . $autoplay . '></video>';

				if ( ! $enable_autoplay && has_post_thumbnail() && ( 'grid' === $style || 'carousel' === $style ) ) {
					echo themerain_get_image( get_post_thumbnail_id() );
				}

			} elseif ( has_post_thumbnail() ) {

				echo themerain_get_image( get_post_thumbnail_id() );

				if ( $secondary ) {
					echo '<div class="project-thumbnail-secondary">';
						echo themerain_get_image( $secondary );
					echo '</div>';
				}

			}
			?>
		</div>
	</div>

	<div class="project-caption">
		<?php
		if ( 'none' === $url_type ) {
			the_title( '<h3' . ( 'slider' === $style ? ' data-swiper-parallax="20%"' : '' ) . '><span>', '</span></h3>' );
		} else {
			the_title( '<h3' . ( 'slider' === $style ? ' data-swiper-parallax="20%"' : '' ) . '><a href="' . esc_url( $url ) . '"' . esc_attr( $url_data ) . '><span>', '</span></a></h3>' );
		}

		if ( has_excerpt() ) the_excerpt();
		?>
	</div>
</div>
