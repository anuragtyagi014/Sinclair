<section class="left-title-sec">
<div class="container for-padding">
	<?php 
	$servicesolution = get_sub_field('services_solutions_block');
	if($servicesolution){
		foreach($servicesolution as $servicesolutionitem){

	?>
<div class="row">
<div class="col-md-4">
<div class="lft-title">
<h1><?= $servicesolutionitem['solutions_heading']; ?></h1>
	<?php 
		if(!empty($servicesolutionitem['cta_downloadable_file'])){
	?> 
<div><a href="<?= $servicesolutionitem['cta_downloadable_file']; ?>" class="pg-btn"><?= $servicesolutionitem['solutions_cta_text']; ?></a></div>
<?php } 
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