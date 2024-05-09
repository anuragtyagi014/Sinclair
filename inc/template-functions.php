<?php

/**
 * ThemeRain meta
 */
function themerain_meta( $field, $id = null ) {
	if ( ( is_archive() || is_search() || is_404() ) && null === $id ) {
		return;
	}

	$field    = 'themerain_' . $field;
	$field_id = $id ? $id : ( ( is_home() && ! is_front_page() ) ? get_option( 'page_for_posts' ) : get_the_id() );

	return get_post_meta( $field_id, $field, true );
}

/**
 * Set default title depending on the page.
 */
function themerain_set_page_title() {

	$titles          = [];
	$title           = '';
	$subtitle        = '';
	$custom_title    = themerain_meta( 'hero_title' );
	$custom_subtitle = themerain_meta( 'hero_subtitle' );

	if ( is_archive() ) {

		$title = get_the_archive_title();

	} elseif ( is_search() ) {

		$title    = '&ldquo;' . get_search_query() . '&rdquo;';
		$subtitle = esc_html__( 'Search', 'themerain' );

		global $wp_query;

		if ( 0 === $wp_query->found_posts ) {
			$title    = esc_html__( 'Nothing Found', 'themerain' );
			$subtitle = esc_html__( 'Please try searching again with some different keywords.', 'themerain' );
		}

	} elseif ( is_404() ) {

		$title    = esc_html__( '404', 'themerain' );
		$subtitle = esc_html__( 'Sorry, we couldn\'t find what you\'re looking for.', 'themerain' );

	} else {

		$page_id  = ( is_home() && ! is_front_page() ) ? get_option( 'page_for_posts' ) : '';
		$title    = ( $custom_title ) ? $custom_title : get_the_title( $page_id );
		$subtitle = ( $custom_subtitle ) ? $custom_subtitle : '';

	}

	$titles[0] = $title;
	$titles[1] = $subtitle;

	return $titles;
}

/**
 * Adds custom classes to the array of body classes.
 */
function themerain_body_classes( $classes ) {
	$enable_ajax     = get_theme_mod( 'enable_ajax', 1 );
	$portfolio_style = themerain_meta( 'portfolio_style' );
	$global_scheme   = get_theme_mod( 'global_scheme' );
	$page_scheme     = themerain_meta( 'page_color' );
	$page_color_text = themerain_meta( 'page_text_color' );
	$page_color_bg   = themerain_meta( 'page_bg_color' );
	$hero_scheme     = themerain_meta( 'hero_scheme' );
	$hero_hide       = themerain_meta( 'hero_hide_title' );
	$hero_fixed      = themerain_meta( 'hero_fixed' );

	if ( $enable_ajax && ! is_customize_preview() ) {
		$classes[] = 'swup-enabled';
	}

	if ( ! $enable_ajax ) {
		$classes[] = 'no-ajax';
	}

	if ( ( 'dark' === $global_scheme && 'light' !== $page_scheme ) || 'dark' === $page_scheme ) {
		$classes[] = 'scheme-dark';
	}

	if ( $page_color_text || $page_color_bg ) {
		$classes[] = 'has-custom-color';
	}

	if ( is_singular( 'post' ) || ( is_home() && is_front_page() ) || 'covers' === $portfolio_style ) {
		$classes[] = 'no-hero';
	}

	if ( 'dark' === $hero_scheme && ! $hero_fixed ) {
		$classes[] = 'has-dark-hero';
	}

	if ( 'light' === $hero_scheme && ! $hero_fixed ) {
		$classes[] = 'has-light-hero';
	}

	if ( ! $hero_fixed && ! $hero_hide ) {
		$classes[] = 'hero-normal';
	}

	if ( $hero_hide ) {
		$classes[] = 'no-title';
	}

	if ( $portfolio_style && is_page_template( 'templates/template-portfolio.php' ) ) {
		$classes[] = 'portfolio-' . esc_attr( $portfolio_style );
	}

	return $classes;
}
add_filter( 'body_class', 'themerain_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 */
function themerain_post_classes( $classes ) {
	if ( get_the_content() ) {
		$classes[] = 'has-content';
	}

	if ( themerain_meta( 'post_featured', get_the_ID() ) ) {
		$classes[] = 'featured';
	}

	return $classes;
}
add_filter( 'post_class', 'themerain_post_classes' );

/**
 * Adds submenu toggle.
 */
function themerain_submenu_toggle( $output, $item, $depth, $args ) {
	if ( 0 === $depth && in_array( 'menu-item-has-children', $item->classes, true ) ) {
		$output .= '<span class="dropdown-toggle"></span>';
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'themerain_submenu_toggle', 10, 4 );

/**
 * Adds custom class to menu.
 */
function themerain_nav_menu_css_class( $classes, $item, $args, $depth ) {
	if ( 0 === $depth && in_array( 'current-menu-ancestor', $classes ) ) {
		$classes[] = 'submenu-open';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'themerain_nav_menu_css_class', 10, 4 );

/**
 * Change the excerpt more string
 */
function themerain_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'themerain_excerpt_more' );

/**
 * Change the excerpt length
 */
function themerain_excerpt_length( $length ) {
	$style = get_query_var( 'blog_style' );

	if ( 'split' === $style || 'wide' === $style ) {
		return 50;
	}

	return 15;
}
add_filter( 'excerpt_length', 'themerain_excerpt_length', 999 );

/**
 * Modify the comment form input fields.
 */
function themerain_comment_form_fields( $fields ) {
	$fields['author'] = str_replace( 'name="author"', 'placeholder="' . esc_attr__( 'Name', 'themerain' ) . '" name="author"', $fields['author'] );
	$fields['email'] = str_replace( 'name="email"', 'placeholder="' . esc_attr__( 'Email', 'themerain' ) . '" name="email"', $fields['email'] );

	unset( $fields['url'] );
	unset( $fields['cookies'] );

	return $fields;
}
add_filter( 'comment_form_default_fields', 'themerain_comment_form_fields' );

/**
 * Customize the comment form comment field.
 */
function themerain_comment_form_field_comment( $fields ) {
	$fields['comment_field'] = str_replace( 'name="comment"', 'name="comment" rows="5"', $fields['comment_field'] );

	return $fields;
}
add_filter( 'comment_form_defaults', 'themerain_comment_form_field_comment' );

/**
 * Exclude pages and projects from search.
 */
function themerain_search_filter( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( $query->is_search ) {
			$query->set( 'post_type', 'post' );
		}
	}
}
add_filter( 'pre_get_posts', 'themerain_search_filter' );

/**
 * Custom comment display.
 */
function themerain_list_comments( $comment, $args, $depth ) {
	?>
	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">

	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php echo get_avatar( $comment, 160 ); ?>

		<div class="comment-content">
			<div class="comment-header">
				<b class="fn"><?php echo get_comment_author_link(); ?></b>
				<div class="comment-meta commentmetadata">
					<div><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo human_time_diff( strtotime( $comment->comment_date ), current_time( 'timestamp', 1 ) ) . ' ' . esc_html__( 'ago', 'themerain' ); ?></a></div>
					<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
				</div>
			</div>

			<?php if ( $comment->comment_approved == '0' ) { ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'themerain' ); ?></em><br/>
			<?php } ?>

			<div class="comment-text entry-content">
				<?php comment_text(); ?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Filter the archive title.
 */
function themerain_filter_archive_title( $title ) {
	return preg_replace( '/^\w+: /', '', $title );
}
add_filter( 'get_the_archive_title', 'themerain_filter_archive_title' );

/**
 * Ajax load more.
 */
function themerain_loadmore_handler() {
	if ( ! wp_verify_nonce( $_POST['nonce'], 'themerain-nonce' ) ) {
		die();
	}

	$type  = sanitize_text_field( $_POST['type'] );
	$style = sanitize_text_field( $_POST['style'] );
	$cats  = sanitize_text_field( $_POST['cats'] );
	$ppp   = sanitize_text_field( $_POST['ppp'] );
	$cpage = sanitize_text_field( $_POST['cpage'] );

	$args['post_type']      = $type;
	$args['posts_per_page'] = $ppp;
	$args['paged']          = $cpage + 1;
	$args['post_status']    = 'publish';

	if ( $cats && 'post' === $type ) {
		$args['cat'] = $cats;
	}

	if ( $cats && 'project' === $type ) {
		$args['tax_query'] = array( array(
			'taxonomy' => 'project-category',
			'terms'    => explode( ',', $cats )
		) );
	}

	$query = new WP_Query( $args );

	while ( $query->have_posts() ) :
		$query->the_post();

		if ( 'post' === $type ) {
			set_query_var( 'blog_style', $style );
			get_template_part( 'template-parts/content' );
		} elseif ( 'project' === $type ) {
			set_query_var( 'portfolio_style', $style );
			get_template_part( 'template-parts/content', 'project' );
		}
	endwhile;

	die;
}
add_action( 'wp_ajax_themerain_loadmore', 'themerain_loadmore_handler' );
add_action( 'wp_ajax_nopriv_themerain_loadmore', 'themerain_loadmore_handler' );
