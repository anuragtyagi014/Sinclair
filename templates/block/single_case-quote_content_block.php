<section class="gallery-btm-cont">
    <div class="container for-padding">
        <?php 
        $quote_content_block_builder = get_sub_field('quote_content_block_builder');
        if($quote_content_block_builder){
            foreach($quote_content_block_builder as $quote_content){  ?>
        <div class="single-pro-cont">
        <div class="quote-cont">
           <img src="https://sinclair.design/wp-content/uploads/2023/06/quote.png">
            <h2><?= $quote_content['quoted_person_heading']; ?></h2>
            <h4><?= $quote_content['quoted_person_subtitle']; ?></h4>
           </div>
            <?= $quote_content['quote_paragraph']; ?>
        </div>
    <?php }
        }
        ?>
        
    </div>
</section>