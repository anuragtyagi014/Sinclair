<?php 
$backgroundtype = get_sub_field('background_type');
$backgroundimage = get_sub_field('background_image');
$backgroundcolor = get_sub_field('background_color');
$text_color = get_sub_field('text_color');
$feature_title = get_sub_field('feature_title');
$feature_description = get_sub_field('feature_description');
$cta_link = get_sub_field('cta_link');
?>
<section class="image-with-cont full-content-design <?= ($backgroundtype == 1) ? 'back-img' : ''; ?>" style =<?= ($backgroundtype == 1) ? 'background-image:url("'.$backgroundimage.'")' : 'background-color:'.$backgroundcolor.''; ?> >
<div class="container">
<div class="row">
<div class="col-md-12 left content-are">
<div class="left-cont-are">
<h1 style="color:<?= (!empty($text_color)) ? $text_color : '#000'; ?>"><?= (!empty($feature_title)) ? $feature_title : ''; ?></h1>
<p style="color:<?= (!empty($text_color)) ?  $text_color : '#000'; ?>"><?= (!empty($feature_description)) ? $feature_description : ''; ?></p>
<?php 
if(!empty($cta_link)){
        foreach($cta_link as $cta_Item){
?>
<a <?= (!empty($cta_Item['cta_url'])) ? 'href="'.$cta_Item['cta_url'].'"' : ''; ?> class="pg-btn" style="color:<?= (!empty($text_color)) ? $text_color : '#000'; ?>"><?= $cta_Item['cta_text']; ?></a>
<?php } } ?>
</div>
</div>
</div>
</div>
</section>