<section class="left-title-sec">
<div class="container for-padding">
	<?php 
	$servicesolution = get_sub_field('full_services_solutions_block');
	if($servicesolution){
		foreach($servicesolution as $servicesolutionitem){

	?>
<div class="row">
<div class="col-md-4">
<div class="lft-title">
<h1><?= $servicesolutionitem['solutions_heading']; ?></h1>
	<?php 
		if(!empty($servicesolutionitem['solutions_cta_link'])){
			$ctalink = $servicesolutionitem['solutions_cta_link'];
			foreach($ctalink as $ctaItem){
				$cta = $ctaItem['cta_link'];
			
	?> 
<div>
<a href="<?= esc_url($cta['url']); ?>" class="pg-btn"><?= esc_html($cta['title']); ?></a>
</div>
<?php }
 }
	if(!empty($servicesolutionitem['thumbnail'])){
	?>
<div><img src="<?= $servicesolutionitem['thumbnail']; ?>"></div>
<?php } ?>
</div>
</div>
<div class="col-md-8">
<div class="right-txt">
<?= $servicesolutionitem['solutions_paragraph']; ?>
</div>
</div>
</div>
<?php } } ?>
</div>
</section>