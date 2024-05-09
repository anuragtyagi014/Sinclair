<?php 
$spotlight = get_sub_field('contentspotlight');
if($spotlight){
foreach($spotlight as $spotlightcontent){
$class = $spotlightcontent['image_location_']; ?>
<section class="image-with-cont <?= ($class == 'Right Image') ? 'left-image-flip' : ''; ?>">
<div class="container">
<?php 
$cta = $spotlightcontent['cta_button'];
$headingdata = $spotlightcontent['headingdata'];
$sectionbg   = $spotlightcontent['text_section_background'];
?>
<div class="row">
<?php 
$post = $spotlightcontent['select_content_source'];
if(!empty($post)){
foreach($post as $postrow){		
$postid = $postrow->ID;
$secbgcolor = (!empty($spotlightcontent['section_background'])) ? $spotlightcontent['section_background'] : '#fffff';
$sectextcolur = (!empty($spotlightcontent['section_text_color'])) ? $spotlightcontent['section_text_color'] : '#fffff';
$sectextcolor = ($sectionbg ==1) ? $sectextcolur : '#000';
?>

<div class="col-md-6 left content-are" style="background-color:<?= ($sectionbg ==1) ? $secbgcolor : '#fff'; ?>">
<div class="left-cont-are">
<?php if($headingdata ==1) { ?>
<h6 style="color:<?= $sectextcolor; ?>"><?= (!empty($spotlightcontent['heading_post_type'])) ? $spotlightcontent['heading_post_type'] : $postrow->post_type; ?></h6>
<?php } ?>
<?php if($headingdata ==1){ ?> 
<h1 style="color:<?= $sectextcolor; ?>"><?= (!empty($spotlightcontent['heading_override_'])) ? $spotlightcontent['heading_override_'] : $postrow->post_title; ?></h1>
<?php }else{ ?>
<h1 style="color:<?= $sectextcolor; ?>"><?= $postrow->post_title; ?></h1>
<?php }
$cont = $postrow->post_content;
$fixcont = implode(' ', array_slice(explode(' ', $cont), 0, 10));
if($headingdata == 1){ ?>
<p style="color:<?= $sectextcolor; ?>"><?= (!empty($spotlightcontent['standfirst_h2_override'])) ? $spotlightcontent['standfirst_h2_override'] : 'Add Your Post Content'; ?></p>
<?php } else{ ?>
<p style="color:<?= $sectextcolor; ?>"><?= $fixcont; ?></p>
<?php }
if($cta ==1){ ?>
<a href="<?= (!empty($spotlightcontent['cta_destination'])) ? $spotlightcontent['cta_destination'] : '#'; ?>" class="pg-btn" style="color:<?= $sectextcolor; ?>"><?= (!empty($spotlightcontent['cta_text'])) ? $spotlightcontent['cta_text'] : 'Learn More'; ?></a>
<?php } else { ?>
<a href="<?= get_the_permalink($postid); ?>" class="pg-btn" style="color:<?= $sectextcolor; ?>">Learn More</a>
<?php } ?>
</div>
</div>
<?php 
$featuredimage = $spotlightcontent['feature_image_override'];
//echo $featuredimage;
if( $featuredimage == 1 ){
$imageurl = $spotlightcontent['add_feature_image'];
if(!empty($imageurl)){
?>
<div class="col-md-6 right" style="background-image:url('<?= $imageurl; ?>')" >
<div class="right-img-are spacer">
</div>
</div>
<?php }else{ ?>
<div class="col-md-6 right" style="background-color:<?= (!empty($spotlightcontent['content_feature_background'])) ? $spotlightcontent['content_feature_background'] : '#d9d9d9'; ?>;">
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
<div class="col-md-6 right" style="background-color:<?= (!empty($spotlightcontent['content_feature_background'])) ? $spotlightcontent['content_feature_background'] : '#d9d9d9'; ?>;">
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
<?php } } ?>





