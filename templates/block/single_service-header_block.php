<?php 
$row = get_sub_field('add_row');
if($row){
foreach($row as $rowItem){
$embedimage = $rowItem['override_feature_image'];
if($embedimage == 1){
$imageurl = $rowItem['featured_image'];
?>
<section class="home-page-main page_title for-back-remove" style="background-image:url('<?= esc_url($imageurl['url']); ?>')">
<?php  }else{ ?>
<section class="home-page-main page_title for-back-remove" style="background-color:<?= (!empty($rowItem['content_background_colour'])) ? $rowItem['content_background_colour'] : '#d9d9d9'; ?>;">       
<?php 
}

?>
<div class="for-mobile-back" <?php if($embedimage == 1){ $mobileimage = $rowItem['feature_image_for_mobile']; ?>style="background-image:url('<?= esc_url($mobileimage['url']); ?>')" <?php } ?>>
<div class="container-fluid">
<?php 
$postData= $rowItem['content_header_Tag'];
if($postData){
foreach($postData as $postItem){
$postId = $postItem->ID;
$textColor= $rowItem['text_background_color'];
?>
<div class="row">
<div class="col-md-6 lft-cnt <?= ($textColor==1) ? 'text_background_color' : ''; ?>">
<div class="left-main-cont">
<?php 
$attribute = $rowItem['cta_attribution'];
if(!empty($attribute)){
?>
<h6><?= $rowItem['cta_attribution']; ?></h6>
<?php }else{ ?>
<h6><?= get_post_type($postId); ?></h6>
<?php } 
$headerTitle = $rowItem['header_title'];
if($headerTitle){
?>
<h1><?= $rowItem['header_title']; ?></h1>
<?php
} else { ?>
<h1><?= get_the_title($postId); ?></h1>
<?php } ?>
<div class="dis-crip">
<?php
$postcontent = $postItem->post_content; 
if($postcontent){
$content = implode(' ', array_slice(explode(' ', $postcontent), 0, 20));
$standfirstParagraph = $rowItem['standfirst_paragraph'];
if($standfirstParagraph){
echo "<p>".$rowItem['standfirst_paragraph']."</p>";
}else{
echo $content .'...';    
}
} 
?>
</div>
<?php 
$button_setting = $rowItem['cta_button'];
if($button_setting==1){
?>
<a href="<?= get_the_permalink($postId); ?>" class="pg-btn">Learn More</a>
<?php } ?>
</div>
</div>
<div class="col-md-6">
<div class="mobile-spacer"></div>
</div>
</div>
<?php } } ?>
</div>
</div>
</section>
<?php } } ?>