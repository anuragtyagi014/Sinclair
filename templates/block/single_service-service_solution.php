<section class="download-list-sec">
    <div class="container for-padding">
        <div class="row">
        <?php 
        $service_solution = get_sub_field('services_solutions_block');
        // echo "<pre>";
        // print_r($service_solution);
        if(!empty($service_solution)){
            foreach($service_solution as $service_solution_row){
                // echo "<pre>";
                // print_r($service_solution_row['thumbnail']);
        ?>
            <div class="col-md-4">
                <div class="download-bx">
                    <div class="download-img">
                <img src="<?= $service_solution_row['thumbnail']['url']; ?>" alt="<?= $service_solution_row['thumbnail']['title']; ?>">
                    </div>
                    <div class="download-cont">
                        <h2><?= $service_solution_row['solutions_heading']; ?></h2>
                        <p><?= $service_solution_row['solutions_paragraph']; ?></p>
                        <?php 
                            if(!empty($service_solution_row['solutions_cta_link'])){
                                $ctalink = $service_solution_row['solutions_cta_link'];
                                foreach($ctalink as $ctaItem){
                               if(!empty($ctaItem['cta_link'])){                               
                        ?>                    
                <a href="<?= $ctaItem['cta_link']; ?>" class="pg-btn "><?= $ctaItem['cta_text']; ?></a>           
                    <?php }else{ ?>
                        <a class="pg-btn btn-decoration-none"><?= $ctaItem['cta_text']; ?></a>
                    <?php }
                       }
                     }
                       ?> 
                    </div>
                </div>
            </div>
        <?php 
         }
           } 
        ?>
        </div>
    </div>
</section>