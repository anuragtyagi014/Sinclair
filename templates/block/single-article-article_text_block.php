<section class="btm-cont-single">
    <div class="container for-padding">
        <div class="single-pro-cont">
            <?php 
            $article_text = get_sub_field('article_text_block');
            if($article_text){
                foreach($article_text as $article_text_row){
                    echo $article_text_row['case_study_text_input'];
                }
            }
            ?>
        </div>
    </div>
</section>