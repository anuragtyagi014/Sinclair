<?php

/**
 * This theme requires WordPress 5.3 or later.
 */

require_once 'inc/acf-global-contents.php';

if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Sets up theme defaults and registers support for various WordPress features
 */
function themerain_setup() {
	load_theme_textdomain( 'themerain', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'themerain' ) );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		)
	);
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	// Add custom editor font sizes.
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Normal', 'themerain' ),
			'size' => 14,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Medium', 'themerain' ),
			'size' => 18,
			'slug' => 'medium'
		),
		array(
			'name' => esc_html__( 'Large', 'themerain' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'themerain' ),
			'size' => 32,
			'slug' => 'huge'
		)
	) );
}
add_action( 'after_setup_theme', 'themerain_setup' );

/**
 * Set content-width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1400;
}

/**
 * Enqueues Scripts and Styles.
 */
function themerain_enqueue_scripts() {
	// Enqueue styles
	wp_enqueue_style( 'themerain-style', get_theme_file_uri( '/assets/css/main.css' ) );
	wp_enqueue_style('custom-style-css', get_theme_file_uri( '/assets/css/custom.css' ), array(), rand(1.0, 100.0) );


	// Enqueue scripts
	wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'gsap', get_theme_file_uri( '/assets/js/gsap.min.js' ), array(), null, true );
	wp_enqueue_script( 'scroll-trigger', get_theme_file_uri( '/assets/js/scrolltrigger.min.js' ), array(), null, true );
	wp_enqueue_script( 'lazysizes', get_theme_file_uri( '/assets/js/lazysizes.min.js' ), array(), null, true );
	wp_enqueue_script( 'ls-unveilhooks', get_theme_file_uri( '/assets/js/ls.unveilhooks.min.js' ), array(), null, true );
	wp_enqueue_script( 'swup', get_theme_file_uri( '/assets/js/swup.min.js' ), array(), null, true );
	wp_enqueue_script( 'swup-body-class-plugin', get_theme_file_uri( '/assets/js/SwupBodyClassPlugin.min.js' ), array(), null, true );
	wp_enqueue_script( 'swup-head-plugin', get_theme_file_uri( '/assets/js/SwupHeadPlugin.min.js' ), array(), null, true );
	wp_enqueue_script( 'swup-scroll-plugin', get_theme_file_uri( '/assets/js/SwupScrollPlugin.min.js' ), array(), null, true );
	wp_enqueue_script( 'themerain-functions', get_theme_file_uri( '/assets/js/functions.js' ), array(), rand( 1,100), null, true );

	// Localize scripts
	wp_localize_script( 'themerain-functions', 'themerain', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'themerain-nonce' )
	) );
}
add_action( 'wp_enqueue_scripts', 'themerain_enqueue_scripts' );

/**
 * Enqueue Block Editor Styles.
 */
function themerain_block_editor_styles() {
	wp_enqueue_style( 'themerain-style-editor', get_theme_file_uri( '/assets/css/editor.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'themerain_block_editor_styles', 1, 1 );

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';

// Customizer.
require get_template_directory() . '/inc/customizer.php';

// Meta boxes.
require get_template_directory() . '/inc/meta-boxes.php';

// SVG icons.
require get_template_directory() . '/inc/svg-icons.php';

// Plugins.
require get_template_directory() . '/inc/plugins.php';

// Demo import.
require get_template_directory() . '/inc/demo.php';


//Register custom post for projects
add_action('init', 'codeflies_our_service_post');
function codeflies_our_service_post(){

	$labels = array(
		'name' => __('Services'),
		'singular_name' => __('Service'),
		'menu_name'   =>  __('Services'),
		'all_items' => __('All Services'),
		'view_item' => __('View Service'),
		'add_new_item' =>__('Add Service'),
		'add_new' =>   __('Add Service'),
		'edit_item' => __('Edit Service'),
		'update_item' => __('Update Service'),
		'search_items' =>  __('Search Service'),
		'not_found' => __('Not Found'),
		'not_found_in_trash'  =>  __('Not found in Trash')

	);
	$args = array(
			'label' => __('Services'),
			'description' => __('Best Our Service'),
			'labels'   => 	$labels,
			'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'comments'),
			'public'  =>  true,
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar'  => true,
			'has_archive'  => true,
			'can_export'  => true,
			'exclude_from_search'  => false,
			'yarpp_support'  => true,
			'publicly_queryable' => true,
			'capability_type'  => 'page'

	);
register_post_type('services', $args);
}

add_action('init', 'codeflies_our_project_texonomy');

function codeflies_our_project_texonomy(){
	
register_taxonomy('Markets',array('case-study'), array(
    'hierarchical' => true,
    'labels' => array('name'=>'Markets', 'singular_name' => 'Market', 'search_items'=> 'Search Markets', 'menu_name' => 'All Markets', 'add_new_item' => 'Add New Market','not_found' => 'No New Market Found'),
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'markets' )
  ));
register_taxonomy('Services',array('case-study'), array(
    'hierarchical' => true,
    'labels' => array('name'=>'Service', 'singular_name' => 'Service', 'search_items'=> 'Search Service', 'menu_name' => 'All Services', 'add_new_item' => 'Add New Service','not_found' => 'No New Service Found'),
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'service' )
  ));
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts(){
    $offset = $_POST['offset'];
    $args = array(
    	'post_type' => 'case-study',
        'orderby' => 'ID',
        'order'   => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'paged' => $offset
               
    );
   $query = new WP_Query($args);
               if($query->have_posts()){
                while($query->have_posts()){
                    $query->the_post();
                    $id = get_the_ID();
                    //echo $id;
                    ?>
<div class="project-bx">
    <a href="<?= get_the_permalink(); ?>">
        <?php
               if(has_post_thumbnail($id)){
                $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
                ?>
        <img src="<?php echo $img[0]; ?>" class="main-image" alt="<?php the_title(); ?>">
        <?php }else { ?>
        <img src="<?= get_site_url(); ?>/wp-content/uploads/2023/03/Hong-Kong-Zhuhai-Macao-Bridge-cshutterstock.jpg"
            class="main-image">
        <?php } ?>
        <div class="project__content project__content--overlay">
            <?php 
                    $mar = wp_get_post_terms($id, 'Markets');
                    $total_cat=[];
                    foreach($mar as $rowItems){
                      $total_cat[]=$rowItems->name;
                    }
                    
                    ?>
            <h5 class="project__footnote project__footnote--alt">
                <?= !empty($total_cat) ? implode(',',$total_cat) : '';?></h5>
            <h4 class="project__title"><?= get_the_title(); ?></h4>
            <?php 
                    $ser = wp_get_post_terms($id, 'Services');
                    $total_ser=[];
                    foreach($ser as $rowSer){
                      $total_ser[]=$rowSer->name;
                    }                   
                    ?>
            <h5 class="project__label">

                <?= !empty($total_ser) ? implode(',',$total_ser) : '';?>
                </span>
            </h5>
        </div>
    </a>
</div>
<?php 
        }
            }
      wp_die();
}

add_action('wp_ajax_load_more_posts_taxonomy', 'load_more_posts_taxonomy');
add_action('wp_ajax_nopriv_load_more_posts_taxonomy', 'load_more_posts_taxonomy');

function load_more_posts_taxonomy(){
    $offset1 = $_POST['offset'];
    $category = $_POST['category'];
    $slug = $_POST['slug'];
    //echo $category;
    $args1 = [
                'post_type' => 'case-study',
                'orderby' => 'ID',
                'order'   => 'DESC',
                'post_status' => 'publish',
               	'posts_per_page' => 2,
       			'paged' => $offset1,               
                'tax_query'  => array(
                        array(
                                    'taxonomy' => $category,
                                    'field' => 'slug',
                                    'terms' => $slug
                      ),
                      ),
            ];
   $query1 = new WP_Query($args1);
   // echo "<pre>";
   // print_r($query1);
               if($query1->have_posts()){
                while($query1->have_posts()){
                    $query1->the_post();
                    $id = get_the_ID();
                    //echo $id;
                    ?>
<div class="project-bx">
    <a href="<?= get_the_permalink(); ?>">
        <?php
               if(has_post_thumbnail($id)){
                $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
                ?>
        <img src="<?php echo $img[0]; ?>" class="main-image" alt="<?php the_title(); ?>">
        <?php }else { ?>
        <img src="<?= get_site_url(); ?>/wp-content/uploads/2023/03/Hong-Kong-Zhuhai-Macao-Bridge-cshutterstock.jpg"
            class="main-image">
        <?php } ?>
        <div class="project__content project__content--overlay">
            <?php 
                    $mar = wp_get_post_terms($id, 'Markets');
                    $total_cat=[];
                    foreach($mar as $rowItems){
                      $total_cat[]=$rowItems->name;
                    }
                    
                    ?>
            <h5 class="project__footnote project__footnote--alt">
                <?= !empty($total_cat) ? implode(',',$total_cat) : '';?></h5>
            <h4 class="project__title"><?= get_the_title(); ?></h4>
            <?php 
                    $ser = wp_get_post_terms($id, 'Services');
                    $total_ser=[];
                    foreach($ser as $rowSer){
                      $total_ser[]=$rowSer->name;
                    }                   
                    ?>
            <h5 class="project__label">

                <?= !empty($total_ser) ? implode(',',$total_ser) : '';?>
                </span>
            </h5>
        </div>
    </a>
</div>
<?php 
        }
            }
      wp_die();
}
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(
        array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    )
);
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer Builder',
        'parent_slug'   => 'theme-general-settings',
    ));
    
}
add_action('wp_ajax_nopriv_service_market_filter', 'service_market_filter');
add_action('wp_ajax_service_market_filter', 'service_market_filter');
function service_market_filter(){
    $slug = $_POST['slug'];
    $taxonomy = $_POST['taxonomy'];
    $html = '';
    $data = ['relation' => 'AND'];
    if(!empty($slug)){
        $data[] = [
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $slug,
        ];
    }
     if(!empty($taxonomy)){
        $data[] = [
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $slug,
        ];
    }
$query = new WP_Query(
        [
            'post_type' => 'case-study',
            'posts_per_page' => -1, 
            'post_status'  => 'publish',
            'tax_query'   => $data,
        ]
);
if($query->have_posts()){
    while($query->have_posts()){
        $query->the_post();
        $id = get_the_ID();
        $img ="";
        if(has_post_thumbnail($id)){
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
        $img = $image[0];
        }else{
        $imgPath=site_url("/wp-content/uploads/2023/03/Hong-Kong-Zhuhai-Macao-Bridge-cshutterstock.jpg");
        $img = $imgPath;
        }
        $mar = wp_get_post_terms($id, 'Markets');
                    $total_cat=[];
                    foreach($mar as $rowItems){
                      $total_cat[]= $rowItems->name;
                    } 
        $market =!empty($total_cat) ? implode(',',$total_cat) : ""; 
         $ser = wp_get_post_terms($id, 'Services');
                    $total_ser=[];
                    foreach($ser as $rowSer){
                      $total_ser[]= $rowSer->name;
                    } 
          $service=!empty($total_ser) ? implode(',',$total_ser) : "";                     

          $html .= '<div class="project-bx">';
          $html .= '<a href="'. get_the_permalink(). '">';
          $html .= '<img src="'.$img.'" class="main-image" alt="'.get_the_title().'">';
          $html .= '<div class="project__content project__content--overlay">';
          $html .= '<h5 class="project__footnote project__footnote--alt">'.$market.'</h5>';
          $html .= '<h4 class="project__title">'.get_the_title().'</h4>';
          $html .= '<h5 class="project__label">'.$service.'</h5>';
          $html .= '</div>';
          $html .= '</a>';
          $html .= '</div>';
    }
    wp_reset_query();       
    }
    else{
        $html = 'There is No Post Found';
    }
 wp_send_json_success($html, 200);
 wp_die();
}
add_action('wp_ajax_nopriv_article_postdata_filter', 'article_postdata_filter');
add_action('wp_ajax_article_postdata_filter', 'article_postdata_filter');
function article_postdata_filter(){
   $brand_slug = $_POST['brand_slug'];
   $content_slug = $_POST['content_slug'];
   $digital_slug = $_POST['digital_slug'];
   $brand_tax = $_POST['brand_tax'];
   $content_tax = $_POST['content_tax'];
   $digital_tax = $_POST['digital_tax'];
   $article="";
   $query = ['relation' => 'AND'];
   if(!empty($brand_slug)){
            $query[] = [
                    'taxonomy' => $brand_tax,
                    'field' => 'slug',
                    'terms' => $brand_slug
                ];
            }
    if(!empty($content_slug)){
            $query[] = [
                    'taxonomy' => $content_tax,
                    'field' => 'slug',
                    'terms' => $content_slug
                ];
            }
    if(!empty($digital_slug)){
            $query[] = [
                    'taxonomy' => $digital_tax,
                    'field' => 'slug',
                    'terms' => $digital_slug
                ];
            }
    $args = [
            'post_type' => 'article',
            'posts_per_page' => -1, 
            'post_status'  => 'publish',
            'tax_query'   => $query
        ];
$query = new WP_Query($args);
  $article .= '<div class="container">';
  $article .= '<div class="row">';
        if($query->have_posts()) {
         while ($query->have_posts()) {
          $query->the_post();
          $post_id = get_the_ID();
          $img ="";
            if(has_post_thumbnail($post_id)){
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'single-post-thumbnail');
            $img = $image[0];
            }else{
            $imgPath=site_url("/wp-content/uploads/2023/06/Post-type-feature-image-16_9-crop.png");
            $img = $imgPath;
            }
           $article .= '<div class="col-md-4">
                <div class="related-bx">
                    <div class="related-img">';
                $article .= '<img src="'.$img.'" class="main-image" alt="'.get_the_title().'">';
                $article .= '<h5>'.get_post_type($post_id).'</h5>';
                $article .= '</div>';
                $article .= '<div class="related-cont">';
                $article .= '<h2>'.get_the_title().'</h2>';
                $article .= '<p>'.get_the_excerpt().'</p>';
                $article .= '<a href="'.get_the_permalink().'" class="pg-btn">Read Case Study</a>';
                $article .= '</div>';
                $article .= '</div>';
                $article .= '</div>';
        }
        wp_reset_postdata();
      }else{
        $article = 'There is No Post Found';
    }
     $article .= '</div>';
     $article .= '</div>';
     wp_send_json_success($article, 200); 
wp_die();
}