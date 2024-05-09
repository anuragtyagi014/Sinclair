<?php 
$full_width_image = get_sub_field('full_width_image');
if($full_width_image){
        foreach($full_width_image as $full_width_image_row){ ?>
<section class="full-img-single">
        <style>
                .image-caption {
                            text-align: center;
                        }
        </style>
        <img src="<?= $full_width_image_row['full_width_image']; ?>">
        <div class="image-caption"><?= $full_width_image_row['image_caption']; ?></div>
</section>
     <?php   }
}
?>