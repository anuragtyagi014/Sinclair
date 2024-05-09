<section class="single-gallery-sec">
    <div class="container">
        <?php 
        $fixed_image_grid = get_sub_field('fixed_image_grid');
        if($fixed_image_grid){
            foreach($fixed_image_grid as $fixed_image_grid_row){ 
               $grid_builder= $fixed_image_grid_row['fixed_image_grid_builder'];
                  ?>
            <div class="row">            
            <div class="col-6 left-image">
                <div class="gallery-img">
                    <img src="<?= $grid_builder[0]['url']; ?>">
                </div>
                <div class="gallery-img">
                    <img src="<?= $grid_builder[1]['url']; ?>">
                </div>
            </div>
            <div class="col-6 right-image">
                <div class="gallery-img">
                    <img src="<?= $grid_builder[2]['url']; ?>">
                </div>
            </div>
        </div>
        <?php }
        }
        ?>
        
    </div>
</section>