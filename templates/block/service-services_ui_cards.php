<section class="service-listing">
<div class="container for-padding">
<div class="row">
<?PHP 
$service_ui = get_sub_field('services_ui_block_builder');
if($service_ui){
	foreach($service_ui as $servicedata){
		// echo "<pre>";
		// print_r($servicedata);
		$servicepost = $servicedata['service_ui_relationships'];
		foreach($servicepost as $servicedataitem){
		$servicepostdata = $servicedataitem['select_your_service_to_feature_'];
		foreach($servicepostdata as $serviceitem){
		$serId = $serviceitem->ID;
?>
<div class="col-md-4">
<div class="service-bx">
<div class="service-img">
	<?php 
	if(has_post_thumbnail($serId)){
	$serimage = wp_get_attachment_image_src(get_post_thumbnail_id($serId), 'single-post-thumbnail');	
	?>
<img src="<?= $serimage[0]; ?>">
<?php }else{ ?>
<img src="https://sinclair.design/wp-content/uploads/2023/06/308x173-3.png">
<?php } ?>
</div>
<div class="service-cont">
<h2><?= get_the_title($serId); ?></h2>
<?php 
$sercontent = $serviceitem->post_content;
$serdata = implode(' ', array_slice(explode(' ', $sercontent), 0, 5));
?>
<p><?= $serdata; ?> ...</p>
<a href="<?= get_the_permalink($serId); ?>" class="pg-btn">Learn More</a>
</div>
</div>
</div>
<?php } } } }?>
<!-- <div class="col-md-4">
<div class="service-bx">
<div class="service-img">
<img src="https://sinclair.design/wp-content/uploads/2023/06/308x173-3.png">
</div>
<div class="service-cont">
<h2>Service</h2>
<p>Convert prospects to customers, faster.</p>
<a href="#" class="pg-btn">Learn More</a> 
</div>
</div>
</div>
<div class="col-md-4">
<div class="service-bx">
<div class="service-img">
<img src="https://sinclair.design/wp-content/uploads/2023/06/308x173-3.png">
</div>
<div class="service-cont">
<h2>Service</h2>
<p>Convert prospects to customers, faster.</p>
<a href="#" class="pg-btn">Learn More</a> 
</div>
</div>
</div> -->
</div>
</div>
</div>
</section>