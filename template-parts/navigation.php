<?php

$subtitle    = get_theme_mod( 'navigation_subtitle', esc_html__( 'Next Up', 'themerain' ) );
$post_type   = get_post_type();
$unique_page = themerain_meta( 'project_unique_page' );
$IDs         = array();

$args = array(
	'post_type'      => $post_type,
	'posts_per_page' => -1
);

if ( 'project' === $post_type ) {
	$args['meta_query'] = array(
		array(
			'key'   => 'themerain_project_link_type',
			'value' => 'default'
		)
	);

	if ( $unique_page ) {
		$args['meta_query'][] = array(
			'key'   => 'themerain_project_unique_page',
			'value' => $unique_page
		);
	}
}

$query = new WP_Query( $args );

while ( $query->have_posts() ) : $query->the_post();
	array_push( $IDs, $post->ID);
endwhile;

wp_reset_postdata();

$current = array_search( get_the_ID(), $IDs );

if ( $current + 1 < sizeof( $IDs ) ) {
	$nextID = $IDs[$current + 1];
}

if ( ! isset( $nextID ) ) {
	$nextID = $IDs[0];
}

?>

<nav class="entry-navigation <?php echo esc_attr( $post_type ); ?>">
	<?php if ( $subtitle ) { ?>
		<p><?php echo esc_html( $subtitle ); ?></p>
	<?php } ?>

	<a href="<?php echo esc_url( get_permalink( $nextID ) ); ?>">
		<?php echo esc_html( get_the_title( $nextID ) ); ?>
	</a>
</nav>
