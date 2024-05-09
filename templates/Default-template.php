<?php
/**
 * Template Name: Default page Template */
 

get_header();

if(!empty($_GET['s'])){
$category=explode('/', explode('blog_category/', $_SERVER['REQUEST_URI'])['1'])['0'];

$paged = (get_query_var('paged')) ? get_query_var('paged'): 1;
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
	'posts_per_page' => 12,
	'search_title'=>$_GET['s']
    );
$postObject=new WP_Query($args);
?>
<section class="blog-post-section-with-sidebar">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="blog-post-are">
					<?php 
					$query = new WP_Query($args);
					
					if($postObject->have_posts()){
						while($postObject->have_posts()):
							$postObject->the_post();
					?>
					<div class="blog-post-bx">
						<div class="img-wrapp">
						<?php 
							if(has_post_thumbnail()):
								$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
						?>
							<img src="<?= $image[0] ?>" alt="<?= the_title(); ?>">
						<?php endif; ?>
						</div>
						<div class="cont-wrapp">
							<?php $cat = get_the_terms($post->ID, 'blog_category');
							foreach($cat as $cd){
							 ?>
							<h4 class="categ"><?= $cd->name; ?></h4>
						<?php } ?>
							<h3><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<ul class="date">
							<?php $tags = get_the_tags($post->ID);?>
								<li><?= get_the_author($post->ID); ?></li>
								<li><?= get_the_date(); ?></li>
							</ul>
							<p><?= get_the_excerpt(); ?></p>

							<a href="<?= get_the_permalink(); ?>" class="theme_btn theme_btn-primary"><?php echo _e('READ MORE', 'Link11'); ?></a>

						</div>
					</div>
					<?php 
						endwhile;
						wp_reset_postdata();
						}
						else{
							?>
							<div class="blog-post-bx"><div class="side-bar-bx"><center><h3><?php echo _e('There are no related blogs', 'Link11'); ?></h3></center></div></div>
							<?php
						}
					?>
					<div class="pagination">
						<?php 
						$total_page = $query->max_num_pages;
						echo paginate_links(['total' =>$total_page,'current'=> $paged,'prev_text'=>'Previous', 'next_text' => 'Next' ]);
						?>
					</div>

				</div>
			</div>

			<div class="col-lg-4">
				<div class="side-bar">
					<div class="side-bar-bx">
						<h3><?php echo _e('Search', 'Link11'); ?></h3>
						<div class="search-are">
						<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
					    </div>
					</div>

					<div class="side-bar-bx">
						<h3><?php echo _e('Categories', 'Link11'); ?></h3>
						<?php 
							$acat = get_terms([
							    'taxonomy' => 'blog_category',
							    'hide_empty' => false,
							]);
							foreach($acat as $cate){
									 $term_link = get_term_link( $cate );
						    ?>
						<ul>
							
							<li><a href="<?= $term_link; ?>"><?= $cate->name; ?></a></li>
							<?php } ?>						
						</ul>
					</div>   
<div class="side-bar-bx">
						<h3><?php echo _e('Recent Posts', 'Link11'); ?></h3>
						<ul>
							<?php 
							$args_post = array(
							'post_type'         => 'post', // post type
							'posts_per_page'    => 5, // number of post items
							'order'				=> 'desc',
							'post_status'		=> 'publish',
							'orderby'			=> 'rand'
							);
								$query = new WP_Query($args_post);
								if($query->have_posts()):
									while($query->have_posts()):
									$query->the_post();
							?>
							<li>
								<a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></li>

						<?php endwhile;
								endif;
						 ?>
							
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>	
<?php	
}
?>
<?php
if(is_single()){
	get_website_contents();
	get_website_home_builder();
	if ( have_posts() ) {
		//get_template_part( 'template-parts/partials/related-news' );
	}
}else{
	get_website_contents();
	get_website_home_builder();	
}
get_footer();
?>