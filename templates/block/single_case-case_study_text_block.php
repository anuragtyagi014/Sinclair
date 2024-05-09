
<section class="btm-cont-single">
    <div class="container for-padding">
        <?php 
            $case_study_text_block = get_sub_field('case_study_text_block');
            if($case_study_text_block){
                foreach($case_study_text_block as $case_study_text_block_row){ ?>
            <div class="single-pro-cont">
            <?= $case_study_text_block_row['case_study_text_input']; ?>
        </div>
             <?php 
                }
            }
        ?>
        
    </div>
</section>