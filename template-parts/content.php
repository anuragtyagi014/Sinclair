<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single() ) : ?>

		<header class="entry-header">
			<?php the_title( '<h1>', '</h1>' ); ?>

			<div class="entry-meta">
				<span><?php echo esc_html( get_the_date() ); ?></span>
				<span><?php the_category( '<span></span>' ); ?></span>
			</div>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<div class="post-footer">
			<div class="post-tags">
				<?php the_tags( '', ' ' ); ?>
			</div>
		</div>

	<?php else : ?>

		<?php
		$style = get_query_var( 'blog_style' );

		if ( has_post_thumbnail() && 'list' !== $style ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			$thumbnail_ratio = $thumbnail[1] / $thumbnail[2];
			$thumbnail_size = ( $thumbnail_ratio < 1 ) ? 'size-tall' : 'size-wide';
			?>

			<div class="post-thumbnail <?php echo esc_attr( $thumbnail_size ); ?>">
				<div class="post-thumbnail-inner">
					<a href="<?php the_permalink(); ?>">
						<?php echo themerain_get_image( get_post_thumbnail_id() ); ?>
					</a>
				</div>
			</div>
		<?php } ?>

		<div class="post-caption">
			<div class="post-meta">
				<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
					<div class="post-sticky"><?php esc_html_e( 'Featured', 'themerain' ); ?></div>
				<?php } ?>
				<div class="post-category"><?php the_category( ' <span>&mdash;</span> ' ); ?></div>
			</div>

			<?php the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

			<?php if ( 'list' !== $style ) { ?>
				<div class="post-excerpt">
					<?php the_excerpt(); ?>
				</div>
			<?php } ?>

			<div class="post-footer">
				<div class="post-time">
					<?php echo esc_html( get_the_date() ); ?>
				</div>
			</div>
		</div>

	<?php endif; ?>

</article>
