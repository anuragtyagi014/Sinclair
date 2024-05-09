<?php

$portfolio_style = themerain_meta( 'portfolio_style' );

if ( is_singular( 'post' ) || ( is_home() && is_front_page() ) || 'slider' === $portfolio_style || 'carousel' === $portfolio_style || 'covers' === $portfolio_style ) {
	return;
}

$hide_title = themerain_meta( 'hero_hide_title' );
$titles     = themerain_set_page_title();
$title      = $titles[0];
$subtitle   = $titles[1];
$image      = themerain_meta( 'hero_image' );
$video      = themerain_meta( 'hero_video' );
$classes[]  = 'site-hero';

if ( themerain_meta( 'hero_full' ) || is_404() ) {
	$classes[] = 'height-full';
}
if ( themerain_meta( 'hero_fixed' ) ) {
	$classes[] = 'style-fixed';
}
if ( ! themerain_meta( 'hero_fixed' ) ) {
	$classes[] = 'parallax-img';
}
if ( 'full' === themerain_meta( 'hero_title_width' ) ) {
	$classes[] = 'width-full';
}
if ( 'left' === themerain_meta( 'hero_title_alignment' ) ) {
	$classes[] = 'aligment-left';
}
if ( 'right' === themerain_meta( 'hero_title_alignment' ) ) {
	$classes[] = 'aligment-right';
}
if ( 'bottom' === themerain_meta( 'hero_title_position' ) ) {
	$classes[] = 'position-bottom';
}
if ( ! themerain_meta( 'hero_hide_title' ) ) {
	$classes[] = 'title-' . themerain_meta( 'hero_title_size' );
}

$classes = join( ' ', $classes );

?>

<div class="<?php echo esc_attr( $classes ); ?>">
	<?php if ( ! $hide_title ) { ?>
		<div class="hero-caption">
			<?php if ( $title ) { ?>
				<h1 class="hero-title"><?php echo nl2br( wp_kses_post( $title ) ); ?></h1>
			<?php } ?>

			<?php if ( $subtitle ) { ?>
				<p class="hero-subtitle"><?php echo nl2br( wp_kses_post( $subtitle ) ); ?></p>
			<?php } ?>
		</div>
	<?php } ?>

	<?php
	if ( $image || $video ) {
		echo '<div class="hero-media">';
			if ( $video ) {

				$poster = ( $image ) ? ' poster="' . esc_url( wp_get_attachment_url( $image ) ) . '"' : '';
				echo '<video src="' . esc_url( wp_get_attachment_url( $video ) ) . '"' . $poster . ' muted loop playsinline webkit-playsinline autoplay></video>';

			} elseif ( $image ) {

				echo themerain_get_image( $image );

			}
		echo '</div>';
	}
	?>
</div>
