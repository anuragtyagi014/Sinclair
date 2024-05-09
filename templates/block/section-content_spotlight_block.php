<?php $class = get_sub_field('image_location_'); ?>
<section class="image-with-cont <?= ($class == 'Right Image') ? 'left-image-flip' : ''; ?>">
<div class="container">
<?php 
$cta = get_sub_field('cta_button');
$headingdata = get_sub_field('headingdata');
$sectionbg   = get_sub_field('text_section_background');

?>
<div class="row">
<?php 
$post = get_sub_field('select_content_source');
if(!empty($post)){
foreach($post as $postrow){		
$postid = $postrow->ID;
$secbgcolor = (!empty(get_sub_field('section_background'))) ? get_sub_field('section_background') : '#fffff';
$sectextcolur = (!empty(get_sub_field('section_text_color'))) ? get_sub_field('section_text_color') : '#fffff';
$sectextcolor = ($sectionbg ==1) ? $sectextcolur : '#000';
?>
<div class="col-md-6 left content-are" style="background-color:<?= ($sectionbg ==1) ? $secbgcolor : '#fff'; ?>">
<div class="left-cont-are">
<?php if($headingdata ==1){ ?>
<h6 style="color:<?= $sectextcolor; ?>"><?=  (!empty(get_sub_field('heading_post_type'))) ? get_sub_field('heading_post_type') : $postrow->post_type; ?></h6>
<?php } ?>
<?php if($headingdata ==1){ ?> 
<h1 style="color:<?= $sectextcolor; ?>"><?= (!empty(get_sub_field('heading_override_'))) ? get_sub_field('heading_override_') : 'Add Your Post Heading'; ?></h1>
<?php }else{ ?>
<h1 style="color:<?= $sectextcolor; ?>"><?= $postrow->post_title; ?></h1>
<?php }
$cont = $postrow->post_content;
$fixcont = implode(' ', array_slice(explode(' ', $cont), 0, 10));
if($headingdata == 1){ ?>
<p style="color:<?= $sectextcolor; ?>"><?= (!empty(get_sub_field('standfirst_h2_override'))) ? get_sub_field('standfirst_h2_override') : 'Add Your Post Content'; ?></p>
<?php } else{ ?>
<p style="color:<?= $sectextcolor; ?>"><?= $fixcont; ?></p>
<?php }
if($cta ==1){ ?>
<a href="<?= (!empty(get_sub_field('cta_destination'))) ? get_sub_field('cta_destination') : '#'; ?>" class="pg-btn" style="color:<?= $sectextcolor; ?>"><?= (!empty(get_sub_field('cta_text'))) ? get_sub_field('cta_text') : 'Learn More'; ?></a>
<?php } else { ?>
<a href="<?= get_the_permalink($postid); ?>" class="pg-btn" style="color:<?= $sectextcolor; ?>">Learn More</a>
<?php } ?>
</div>
</div>
<?php 
$featuredimage = get_sub_field('feature_image_override');
//echo $featuredimage;
if( $featuredimage == 1 ){
$imageurl = get_sub_field('add_feature_image');
if(!empty($imageurl)){
?>
<div class="col-md-6 right" style="background-image:url('<?= $imageurl; ?>')">
<div class="right-img-are spacer">
</div>
</div>
<?php }else{ ?>
<div class="col-md-6 right" style="background-color:<?= (!empty(get_sub_field('content_feature_background'))) ? get_sub_field('content_feature_background') : '#d9d9d9'; ?>;">
<div class="right-img-are spacer">
</div>
</div>
<?php }
} else {
if (has_post_thumbnail($postid)){
	$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'single-post-thumbnail');
?>
<div class="col-md-6 right" style="background-image:url('<?= $image_url[0]; ?>')">
<div class="right-img-are spacer">
</div>
</div>
<?php } else { ?>
<div class="col-md-6 right" style="background-color:<?= (!empty(get_sub_field('content_feature_background'))) ? get_sub_field('content_feature_background') : '#d9d9d9'; ?>;">
<div class="right-img-are spacer">
</div>
</div>
<?php }
	} 
}
	wp_reset_postdata();
	  } 
?>
</div>
</div>
</section>





