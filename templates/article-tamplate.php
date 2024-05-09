<?php /* Template Name: Article Page */ ?>

<?php get_header(); ?>


<section class="brd-crmb">
    <div class="container for-padding">
        <div class=" bread-crumb-inn">
            <div class="filter-new">
                <div class="drop-bx for-ser">
                    <span class="slct-text"><span class="input-are" id="branding">Choose Branding</span> <span
                            class="cross">+</span></span>
                        <ul class="drop-items drop-filter">
                            <?php 
                            $branding = get_terms([
                                    'taxonomy' => 'branding',
                                    'orderby' => 'name',
                                    'order'   => 'DESC',
                                    'hide_empty' => false
                                     ]);
                        foreach($branding as $branding_item){
                    ?>
                         <li slug="<?=  $branding_item->slug; ?>" taxonomy ="<?= $branding_item->taxonomy; ?>" name ="<?= $branding_item->name; ?>"><?= $branding_item->name; ?></li>
                        <?php } ?>
                        
                    </ul>
                </div>

                <div class="drop-bx for-ser">
                    <span class="slct-text"><span class="input-are" id="content">Choose Content</span> <span
                            class="cross">+</span></span>
                    <ul class="drop-items drop-filter1">
                        <?php 
                            $content = get_terms([
                                    'taxonomy' => 'content',
                                    'orderby' => 'name',
                                    'order'   => 'DESC',
                                    'hide_empty' => false
                                     ]);
                        foreach($content as $content_item){
                    ?>
                         <li slug="<?=  $content_item->slug; ?>" taxonomy ="<?= $content_item->taxonomy; ?>" name ="<?= $content_item->name; ?>"><?= $content_item->name; ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="drop-bx for-market">
                    <span class="slct-text"><span class="input-are" id="digital_design">Choose Digital Design </span> <span
                            class="cross">+</span></span>
                    <ul class="drop-items drop-filter2">
                        <?php 
                            $digital = get_terms([
                                    'taxonomy' => 'digital-design',
                                    'orderby' => 'name',
                                    'order'   => 'DESC',
                                    'hide_empty' => false
                                     ]);
                        foreach($digital as $digital_item){
                    ?>
                         <li slug="<?=  $digital_item->slug; ?>" taxonomy ="<?= $digital_item->taxonomy; ?>" name ="<?= $digital_item->name; ?>"><?= $digital_item->name; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="related-content-sec" id ="article_list">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sec-head">
                    <h2>Digital Design</h2>
                </div>
            </div>
<?php 
     $taxonomy = 'digital-design'; // this is the name of the taxonomy
     $terms = get_terms($taxonomy);
     $args = array(
        'post_type' => 'article',
        'post_status' => 'publish',
        'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => wp_list_pluck($terms,'slug')
                    )
                )
        );
     $my_query = new WP_Query( $args );
     // echo "<pre>";
     // print_r($my_query);
     
     if($my_query->have_posts()) {
         while ($my_query->have_posts()) {
          $my_query->the_post();
          $post_id = get_the_ID();
          ?>
          <div class="col-md-4">
                <div class="related-bx">
                    <div class="related-img">
                        <?php
               if(has_post_thumbnail($post_id)){
                $img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'single-post-thumbnail');
                ?>
                    <img src="<?php echo $img[0]; ?>" class="main-image" alt="<?php the_title(); ?>">
                    <?php }else { ?>
                    <img src="<?= get_site_url(); ?>/wp-content/uploads/2023/06/Post-type-feature-image-16_9-crop.png"
                        class="main-image">
                    <?php } ?>
                        <h5><?= get_post_type($post_id); ?></h5>
                    </div>
                    <div class="related-cont">
                        <h2><?= get_the_title(); ?></h2>
                        <p><?= get_the_excerpt(); ?></p>
                        <a href="<?= get_the_permalink(); ?>" class="pg-btn">Read Case Study</a>
                    </div>
                </div>
            </div>
      <?php  }
      }
      wp_reset_postdata();
?>
        </div>
   
        <div class="row">
            <div class="col-md-12">
                <div class="sec-head">
                    <h2>Content</h2>
                </div>
            </div>
            <?php 
     $taxonomy1 = 'content'; // this is the name of the taxonomy
     $terms1 = get_terms($taxonomy1);
     $args1 = array(
        'post_type' => 'article',
        'post_status' => 'publish',
        'orderby'   =>'ID',
        'order' => 'ASC',
        'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy1,
                        'field' => 'slug',
                        'terms' => wp_list_pluck($terms1,'slug')
                    )
                )
        );
     $query = new WP_Query( $args1 );
     // echo "<pre>";
     // print_r($query);
     if($query->have_posts()) {
         while ($query->have_posts()) {
          $query->the_post();
          $p_id = get_the_ID();
          ?>
          <div class="col-md-4">
                <div class="related-bx">
                    <div class="related-img">
                        <?php
               if(has_post_thumbnail($p_id)){
                $img = wp_get_attachment_image_src(get_post_thumbnail_id($p_id), 'single-post-thumbnail');
                ?>
                    <img src="<?php echo $img[0]; ?>" class="main-image" alt="<?php the_title(); ?>">
                    <?php }else { ?>
                    <img src="<?= get_site_url(); ?>/wp-content/uploads/2023/06/Post-type-feature-image-16_9-crop.png"
                        class="main-image">
                    <?php } ?>
                        <h5><?= get_post_type($p_id); ?></h5>
                    </div>
                    <div class="related-cont">
                        <h2><?= get_the_title(); ?></h2>
                        <p><?= get_the_excerpt(); ?></p>
                        <a href="<?= get_the_permalink(); ?>" class="pg-btn">Read Case Study</a>
                    </div>
                </div>
            </div>
      <?php  }
      }
      wp_reset_postdata();
?>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="sec-head">
                    <h2>Branding</h2>
                </div>
            </div>

            <?php 
     $taxonomy2 = 'branding'; // this is the name of the taxonomy
     $terms2 = get_terms($taxonomy2);
     $args2 = array(
        'post_type' => 'article',
        'post_status' => 'publish',
        'orderby'   =>'ID',
        'order' => 'ASC',
        'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy2,
                        'field' => 'slug',
                        'terms' => wp_list_pluck($terms2,'slug')
                    )
                )
        );
     $query1 = new WP_Query( $args2 );
     // echo "<pre>";
     // print_r($query);
     if($query1->have_posts()) {
         while ($query1->have_posts()) {
          $query1->the_post();
          $po_id = get_the_ID();
          ?>
          <div class="col-md-4">
                <div class="related-bx">
                    <div class="related-img">
                        <?php
               if(has_post_thumbnail($po_id)){
                $img = wp_get_attachment_image_src(get_post_thumbnail_id($po_id), 'single-post-thumbnail');
                ?>
                    <img src="<?php echo $img[0]; ?>" class="main-image" alt="<?php the_title(); ?>">
                    <?php }else { ?>
                    <img src="<?= get_site_url(); ?>/wp-content/uploads/2023/06/Post-type-feature-image-16_9-crop.png"
                        class="main-image">
                    <?php } ?>
                        <h5><?= get_post_type($po_id); ?></h5>
                    </div>
                    <div class="related-cont">
                        <h2><?= get_the_title(); ?></h2>
                        <p><?= get_the_excerpt(); ?></p>
                        <a href="<?= get_the_permalink(); ?>" class="pg-btn">Read Case Study</a>
                    </div>
                </div>
            </div>
      <?php  }
      }
      wp_reset_postdata();
?>
        </div>
    </div>
</section>



<?php get_footer(); ?>