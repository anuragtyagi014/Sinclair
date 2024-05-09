<?php 
$full_width_image = get_sub_field('full_width_image');
if($full_width_image){
        foreach($full_width_image as $full_width_image_row){ ?>
<section class="full-img-single">
        <img src="<?= $full_width_image_row['full_width_image']; ?>">
</section>
     <?php   }
}
?>
