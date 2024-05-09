<?php 
		$featuredata = get_sub_field('select_content'); 
		if(!empty($featuredata)){
		foreach($featuredata as $featureRow){
?>
<section class="related-content-sec">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="sec-head">
	<?php 
	$title = $featureRow['override_default_title'];
	if($title == 1){
	?>
<h2><?= (!empty($featureRow['new_section_title'])) ? $featureRow['new_section_title'] : 'Related Content'; ?></h2>
<?php }else{ ?>
	<h2>Related Content</h2>
<?php } ?>
</div>
</div>
<?php 
$relatedpost = $featureRow['select_content_for_viewing'];
if(!empty($relatedpost)){
	foreach($relatedpost as $relatedpstrow){
		$id = $relatedpstrow->ID;
?>
<div class="col-md-4">
<div class="related-bx">
<div class="related-img">
	<?php 
	if(has_post_thumbnail($id)){
		$imageurl = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
	?>
	<img src="<?= $imageurl[0]; ?>">
	<?php } else{	?>
<img src="https://sinclair.design/wp-content/uploads/2023/06/Post-type-feature-image-16_9-crop.png">
<?php } ?>
<h5><?= get_post_type($id) ?></h5>
</div>
<div class="related-cont">
<h2><?= get_the_title($id); ?></h2>
<?php $postcontent = $relatedpstrow->post_content; 
//echo $postcontent;
$excerptcontent = implode(' ', array_slice(explode(' ', $postcontent), 0, 25));
?>
<p><?= $excerptcontent; ?> </p>
<a href="<?= get_the_permalink($id); ?>" class="pg-btn">Read <?= get_post_type($id) ?></a> 
</div>
</div>
</div>
<?php } } ?>
</div>
</div>
</section>
<?php 
	} 
		}
?>