<?php

add_filter( 'themerain_meta_boxes', function() {

	// Portfolio Settings
	$sections[] = array(
		'title'    => esc_html__( 'Portfolio Settings', 'themerain' ),
		'id'       => 'portfolio',
		'screen'   => array( 'page' ),
		'template' => 'templates/template-portfolio.php',
		'fields'   => array(
			array(
				'label'    => esc_html__( 'Displayed categories', 'themerain' ),
				'id'       => 'themerain_portfolio_categories',
				'desc'     => esc_html__( 'Choose which of portfolio categories you want to include.', 'themerain' ),
				'type'     => 'taxonomy'
			),
			array(
				'label'    => esc_html__( 'Projects per page', 'themerain' ),
				'id'       => 'themerain_portfolio_per_page',
				'desc'     => esc_html__( 'Use "-1" if you want to display all of your projects on the page.', 'themerain' ),
				'std'      => '-1',
				'type'     => 'range',
				'range'    => array( '-1', '60', '1' )
			),
			array(
				'label'    => esc_html__( 'Style', 'themerain' ),
				'id'       => 'themerain_portfolio_style',
				'std'      => 'grid',
				'type'     => 'group',
				'choices'  => array(
					'slider'   => esc_html__( 'Slider', 'themerain' ),
					'carousel' => esc_html__( 'Carousel', 'themerain' ),
					'covers'   => esc_html__( 'Covers', 'themerain' ),
					'grid'     => esc_html__( 'Grid', 'themerain' )
				)
			)
		)
	);

	// Blog Settings
	$sections[] = array(
		'title'    => esc_html__( 'Blog Settings', 'themerain' ),
		'id'       => 'blog',
		'screen'   => array( 'page' ),
		'template' => 'templates/template-blog.php',
		'fields'   => array(
			array(
				'label'    => esc_html__( 'Displayed categories', 'themerain' ),
				'id'       => 'themerain_blog_cats',
				'desc'     => esc_html__( 'Choose which of blog categories you want to include.', 'themerain' ),
				'type'     => 'taxonomy',
				'taxonomy' => 'category'
			),
			array(
				'label'    => esc_html__( 'Style', 'themerain' ),
				'id'       => 'themerain_blog_style',
				'std'      => 'list',
				'type'     => 'group',
				'choices'  => array(
					'list'  => esc_html__( 'List', 'themerain' ),
					'grid'  => esc_html__( 'Grid', 'themerain' ),
					'split' => esc_html__( 'Split', 'themerain' ),
					'wide'  => esc_html__( 'Wide', 'themerain' )
				)
			)
		)
	);

	// Post Settings
	$sections[] = array(
		'title'    => esc_html__( 'Post Settings', 'themerain' ),
		'id'       => 'post',
		'screen'   => array( 'post' ),
		'fields'   => array(
			array(
				'label'    => esc_html__( 'Featured', 'themerain' ),
				'id'       => 'themerain_post_featured',
				'type'     => 'toggle'
			)
		)
	);

	// Project Settings
	$sections[] = array(
		'title'    => esc_html__( 'Project Settings', 'themerain' ),
		'id'       => 'project',
		'screen'   => array( 'project' ),
		'fields'   => array(
			array(
				'label'    => esc_html__( 'Video thumbnail (.mp4)', 'themerain' ),
				'id'       => 'themerain_project_thumbnail_video',
				'desc'     => esc_html__( 'If present, the Featured Image will be used as a video poster.', 'themerain' ),
				'type'     => 'media',
				'media'    => 'video'
			),
			array(
				'label'    => esc_html__( 'Secondary thumbnail', 'themerain' ),
				'id'       => 'themerain_project_thumbnail_secondary',
				'type'     => 'media'
			),
			array(
				'label'    => esc_html__( 'Link thumbnail to', 'themerain' ),
				'id'       => 'themerain_project_link_type',
				'std'      => 'default',
				'type'     => 'select',
				'choices'  => array(
					'default' => esc_html__( 'This Project (Default)', 'themerain' ),
					'image'   => esc_html__( 'Image', 'themerain' ),
					'video'   => esc_html__( 'Video', 'themerain' ),
					'url'     => esc_html__( 'External URL', 'themerain' ),
					'none'    => esc_html__( 'No URL', 'themerain' )
				),
			),
			array(
				'label'    => esc_html__( 'Image', 'themerain' ),
				'id'       => 'themerain_project_link_image',
				'type'     => 'media',
				'cond'     => [ 'themerain_project_link_type', 'image' ]
			),
			array(
				'label'    => esc_html__( 'Video URL', 'themerain' ),
				'id'       => 'themerain_project_link_video',
				'desc'     => esc_html__( 'For example: https://vimeo.com/XXXXX or https://youtube.com/watch?v=XXXXX', 'themerain' ),
				'type'     => 'url',
				'cond'     => [ 'themerain_project_link_type', 'video' ]
			),
			array(
				'label'    => esc_html__( 'URL', 'themerain' ),
				'id'       => 'themerain_project_link_url',
				'type'     => 'url',
				'cond'     => [ 'themerain_project_link_type', 'url' ]
			),
			array(
				'label'    => esc_html__( 'Unique portfolio page', 'themerain' ),
				'id'       => 'themerain_project_unique_page',
				'desc'     => esc_html__( 'If you\'re using multiple portfolios, please choose the portfolio page where this project is included.', 'themerain' ),
				'type'     => 'pages'
			)
		)
	);

	// Hero Settings
	$sections[] = array(
		'title'    => esc_html__( 'Hero Settings', 'themerain' ),
		'id'       => 'hero',
		'screen'   => array( 'project', 'page' ),
		'fields'   => array(
			array(
				'label'    => esc_html__( 'Enable fullscreen', 'themerain' ),
				'id'       => 'themerain_hero_full',
				'type'     => 'toggle'
			),
			array(
				'label'    => esc_html__( 'Fixed background', 'themerain' ),
				'id'       => 'themerain_hero_fixed',
				'type'     => 'toggle'
			),
			array(
				'label'    => esc_html__( 'Hero image', 'themerain' ),
				'id'       => 'themerain_hero_image',
				'type'     => 'media'
			),
			array(
				'label'    => esc_html__( 'Hero video (mp4)', 'themerain' ),
				'id'       => 'themerain_hero_video',
				'desc'     => esc_html__( 'If present, the background image will be used as a video poster.', 'themerain' ),
				'type'     => 'media',
				'media'    => 'video'
			),
			array(
				'label'    => esc_html__( 'Media opacity', 'themerain' ),
				'id'       => 'themerain_hero_opacity',
				'std'      => '100',
				'type'     => 'range',
				'output'   => [ ':root', '--hero-opacity' ]
			),
			array(
				'label'    => esc_html__( 'Media opacity (after scroll)', 'themerain' ),
				'id'       => 'themerain_hero_opacity_scroll',
				'std'      => '0',
				'type'     => 'range',
				'output'   => [ '.site-hero.has-scrolled', '--hero-opacity' ],
				'cond'     => [ 'themerain_hero_fixed', '1' ],
			),
			array(
				'label'    => esc_html__( 'Hero title', 'themerain' ),
				'id'       => 'themerain_hero_title',
				'desc'     => esc_html__( 'Replaces the default title of the page.', 'themerain' ),
				'type'     => 'textarea'
			),
			array(
				'label'    => esc_html__( 'Hero subtitle', 'themerain' ),
				'id'       => 'themerain_hero_subtitle',
				'type'     => 'textarea'
			),
			array(
				'label'    => esc_html__( 'Hide title', 'themerain' ),
				'id'       => 'themerain_hero_hide_title',
				'type'     => 'toggle'
			),
			array(
				'label'    => esc_html__( 'Title size', 'themerain' ),
				'id'       => 'themerain_hero_title_size',
				'std'      => 'large',
				'type'     => 'group',
				'choices'  => array(
					'small'  => 'S',
					'medium' => 'M',
					'large'  => 'L',
					'huge'   => 'XL'
				)
			),
			array(
				'label'    => esc_html__( 'Title width', 'themerain' ),
				'id'       => 'themerain_hero_title_width',
				'std'      => 'normal',
				'type'     => 'group',
				'choices'  => array(
					'normal' => esc_html__( 'Normal', 'themerain' ),
					'full'   => esc_html__( 'Full', 'themerain' )
				)
			),
			array(
				'label'    => esc_html__( 'Title alignment', 'themerain' ),
				'id'       => 'themerain_hero_title_alignment',
				'std'      => 'center',
				'type'     => 'group',
				'choices'  => array(
					'left'   => esc_html__( 'Left', 'themerain' ),
					'center' => esc_html__( 'Center', 'themerain' ),
					'right'  => esc_html__( 'Right', 'themerain' )
				)
			),
			array(
				'label'    => esc_html__( 'Title position', 'themerain' ),
				'id'       => 'themerain_hero_title_position',
				'std'      => 'center',
				'type'     => 'group',
				'choices'  => array(
					'center' => esc_html__( 'Center', 'themerain' ),
					'bottom' => esc_html__( 'Bottom', 'themerain' )
				)
			),
			array(
				'label'    => esc_html__( 'Hero skin', 'themerain' ),
				'id'       => 'themerain_hero_scheme',
				'std'      => 'global',
				'type'     => 'select',
				'cond'     => [ 'themerain_hero_fixed', '0' ],
				'choices'  => array(
					'global' => esc_html__( 'Use page settings', 'themerain' ),
					'light'  => esc_html__( 'Light', 'themerain' ),
					'dark'   => esc_html__( 'Dark', 'themerain' )
				)
			),
			array(
				'label'    => esc_html__( 'Hero text color', 'themerain' ),
				'id'       => 'themerain_hero_text_color',
				'type'     => 'color',
				'output'   => [ '.hero-normal .site-hero, .hero-normal .header--colored', '--text-color' ],
				'cond'     => [ 'themerain_hero_fixed', '0' ]
			),
			array(
				'label'    => esc_html__( 'Hero background color', 'themerain' ),
				'id'       => 'themerain_hero_bg_color',
				'type'     => 'color',
				'output'   => [ '.hero-normal .site-hero, .hero-normal .header--colored', '--bg-color' ],
				'cond'     => [ 'themerain_hero_fixed', '0' ]
			)
		)
	);

	// Styling Settings
	$sections[] = array(
		'title'    => esc_html__( 'Styling', 'themerain' ),
		'id'       => 'styling',
		'screen'   => array( 'post', 'project', 'page' ),
		'fields'   => array(
			array(
				'label'    => esc_html__( 'Color scheme', 'themerain' ),
				'id'       => 'themerain_page_color',
				'std'      => 'global',
				'type'     => 'select',
				'choices'  => array(
					'global' => esc_html__( 'Use global settings', 'themerain' ),
					'light'  => esc_html__( 'Light', 'themerain' ),
					'dark'   => esc_html__( 'Dark', 'themerain' )
				)
			),
			array(
				'label'    => esc_html__( 'Text color', 'themerain' ),
				'id'       => 'themerain_page_text_color',
				'type'     => 'color',
				'output'   => [ '.has-custom-color', '--text-color' ]
			),
			array(
				'label'    => esc_html__( 'Background color', 'themerain' ),
				'id'       => 'themerain_page_bg_color',
				'type'     => 'color',
				'output'   => [ '.has-custom-color', '--bg-color' ]
			)
		)
	);

	return $sections;
} );
