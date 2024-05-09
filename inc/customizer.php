<?php

add_filter( 'themerain_customizer', function() {

	// General
	$sections[] = array(
		'label'    => esc_html__( 'General', 'themerain' ),
		'controls' => array(
			array(
				'label'    => esc_html__( 'Enable AJAX', 'themerain' ),
				'id'       => 'enable_ajax',
				'std'      => 1,
				'type'     => 'checkbox'
			),
			array(
				'label'    => esc_html__( 'Navigation Subtitle', 'themerain' ),
				'id'       => 'navigation_subtitle',
				'std'      => esc_html__( 'Next Up', 'themerain' ),
				'type'     => 'text'
			)
		)
	);

	// Header
	$sections[] = array(
		'label'    => esc_html__( 'Header', 'themerain' ),
		'controls' => array(
			array(
				'label'    => esc_html__( 'Logo Dark', 'themerain' ),
				'id'       => 'themerain_logo',
				'type'     => 'image'
			),
			array(
				'label'    => esc_html__( 'Logo Light', 'themerain' ),
				'id'       => 'themerain_logo_light',
				'type'     => 'image'
			),
			array(
				'label'    => esc_html__( 'Logo Image Width (px)', 'themerain' ),
				'id'       => 'themerain_logo_width',
				'type'     => 'number'
			),
			array(
				'label'    => esc_html__( 'Logo SVG', 'themerain' ),
				'id'       => 'themerain_logo_svg',
				'type'     => 'textarea'
			),
			array(
				'label'    => 'Twitter',
				'id'       => 'themerain_social_twitter',
				'type'     => 'text'
			),
			array(
				'label'    => 'Facebook',
				'id'       => 'themerain_social_facebook',
				'type'     => 'text'
			),
			array(
				'label'    => 'YouTube',
				'id'       => 'themerain_social_youtube',
				'type'     => 'text'
			),
			array(
				'label'    => 'Instagram',
				'id'       => 'themerain_social_instagram',
				'type'     => 'text'
			),
			array(
				'label'    => 'Behance',
				'id'       => 'themerain_social_behance',
				'type'     => 'text'
			),
			array(
				'label'    => 'Dribbble',
				'id'       => 'themerain_social_dribbble',
				'type'     => 'text'
			),
			array(
				'label'    => 'Vimeo',
				'id'       => 'themerain_social_vimeo',
				'type'     => 'text'
			),
			array(
				'label'    => 'Telegram',
				'id'       => 'social_telegram',
				'type'     => 'text'
			),
			array(
				'label'    => 'TikTok',
				'id'       => 'social_tiktok',
				'type'     => 'text'
			),
			array(
				'label'    => 'Pinterest',
				'id'       => 'themerain_social_pinterest',
				'type'     => 'text'
			),
			array(
				'label'    => 'LinkedIn',
				'id'       => 'themerain_social_linkedin',
				'type'     => 'text'
			),
			array(
				'label'    => 'VK',
				'id'       => 'themerain_social_vk',
				'type'     => 'text'
			),
			array(
				'label'    => 'Spotify',
				'id'       => 'themerain_social_spotify',
				'type'     => 'text'
			)
		)
	);

	// Footer
	$sections[] = array(
		'label'    => esc_html__( 'Footer', 'themerain' ),
		'controls' => array(
			array(
				'label'    => esc_html__( 'First Column', 'themerain' ),
				'id'       => 'themerain_footer_1',
				'type'     => 'textarea'
			),
			array(
				'label'    => esc_html__( 'Second Column', 'themerain' ),
				'id'       => 'themerain_footer_2',
				'type'     => 'textarea'
			)
		)
	);

	// Blog
	$sections[] = array(
		'label'    => esc_html__( 'Blog', 'themerain' ),
		'controls' => array(
			array(
				'label'    => esc_html__( 'Default style', 'themerain' ),
				'id'       => 'blog_default_style',
				'type'     => 'select',
				'std'      => 'list',
				'choices'  => array(
					'list'   => esc_html__( 'List', 'themerain' ),
					'grid'   => esc_html__( 'Grid', 'themerain' ),
					'split'  => esc_html__( 'Split', 'themerain' ),
					'wide'   => esc_html__( 'Wide', 'themerain' )
				)
			),
			array(
				'label'    => esc_html__( 'Archive style', 'themerain' ),
				'id'       => 'archive_style',
				'type'     => 'select',
				'std'      => 'list',
				'choices'  => array(
					'list'  => esc_html__( 'List', 'themerain' ),
					'grid'  => esc_html__( 'Grid', 'themerain' ),
					'split' => esc_html__( 'Split', 'themerain' ),
					'wide'  => esc_html__( 'Wide', 'themerain' )
				)
			)
		)
	);

	// Portfolio
	$sections[] = array(
		'label'    => esc_html__( 'Portfolio', 'themerain' ),
		'controls' => array(
			array(
				'label'    => esc_html__( 'Slider navigation', 'themerain' ),
				'id'       => 'portfolio_slider_nav',
				'type'     => 'select',
				'std'      => 'none',
				'choices'  => array(
					'none'      => esc_html__( 'None', 'themerain' ),
					'dots'      => esc_html__( 'Dots', 'themerain' ),
					'scrollbar' => esc_html__( 'Scrollbar', 'themerain' )
				)
			),
			array(
				'label'    => esc_html__( 'Video autoplay', 'themerain' ),
				'id'       => 'enable_video_autoplay',
				'type'     => 'checkbox'
			)
		)
	);

	// Colors
	$sections[] = array(
		'label'    => esc_html__( 'Colors', 'themerain' ),
		'controls' => array(
			array(
				'label'    => esc_html__( 'Global Color Scheme', 'themerain' ),
				'id'       => 'global_scheme',
				'type'     => 'select',
				'std'      => 'light',
				'choices'  => array(
					'light' => esc_html__( 'Light', 'themerain' ),
					'dark'  => esc_html__( 'Dark', 'themerain' )
				)
			),
			array(
				'label'    => esc_html__( 'Text color', 'themerain' ),
				'id'       => 'global_text_color',
				'type'     => 'color',
				'output'   => [ ':root', '--text-color' ]
			),
			array(
				'label'    => esc_html__( 'Background color', 'themerain' ),
				'id'       => 'global_bg_color',
				'type'     => 'color',
				'output'   => [ ':root', '--bg-color' ]
			)
		)
	);

	// Typography
	$sections[] = array(
		'label'    => esc_html__( 'Typography', 'themerain' ),
		'controls' => array(
			array(
				'label'    => esc_html__( 'Primary Font', 'themerain' ),
				'id'       => 'themerain_primary_font',
				'type'     => 'fonts',
				'std'      => 'default',
				'output'   => [ ':root', '--font-primary' ],
				'choices'  => array(
					'default' => 'Inter'
				)
			),
			array(
				'label'    => esc_html__( 'Secondary Font', 'themerain' ),
				'id'       => 'themerain_secondary_font',
				'type'     => 'fonts',
				'std'      => 'default',
				'output'   => [ ':root', '--font-secondary' ],
				'choices'  => array(
					'default' => 'Inter'
				)
			)
		)
	);

	return $sections;
} );
