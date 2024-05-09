<?php 
/* Template Name: Case Study */ 
get_header(); 
$filtter = get_field('filtter_manage');
?>

<style type="text/css">
    .project-bx {
    overflow: hidden;
}
</style>
<section class="brd-crmb <?= ($filtter==1) ? 'filter_disable' : ''; ?>">
    <div class="container">
        <div class=" bread-crumb-inn">
            <div class="filter-new">
                <div class="drop-bx for-ser">
                    <span class="slct-text"><span class="input-are" value="">Choose by Service</span> <span
                            class="cross">+</span></span>
                    <ul class="drop-items drop-1-it">
                        <?php 
                            $service = get_terms([
                                    'taxonomy' => 'Services',
                                    'orderby' => 'name',
                                    'order'   => 'DESC',
                                    'hide_empty' => false
                                     ]);
                            foreach($service as $service_item){
                    ?>
                        <li slug="<?=  $service_item->slug; ?>" taxonomy="<?= $service_item->taxonomy; ?>"
                            name="<?= $service_item->name; ?>"><?= $service_item->name; ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="drop-bx for-market">
                    <span class="slct-text"><span class="input-are">Choose by Market</span> <span
                            class="cross">+</span></span>
                    <ul class="drop-items drop-2-it">
                        <?php 
                        $market = get_terms([
                                'taxonomy' => 'Markets',
                                'orderby' => 'name',
                                'order'   => 'DESC',
                                'hide_empty' => false
                                 ]);
                        foreach($market as $market_item){
                        // echo "<pre>";
                        // print_r($market_item);
                    ?>
                        <li slug="<?=  $market_item->slug; ?>" taxonomy="<?= $market_item->taxonomy; ?>"
                            name="<?= $market_item->name; ?>"><?= $market_item->name; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="projects-listing <?= ($filtter==1) ? 'filter_disable' : ''; ?>">
    <div class="container" id="projects_list">
        <div class="projects-inn-lst">
            <?php 
        $paged = (!empty(get_query_var('paged'))) ? get_query_var('paged') : 1;
            $args = [
                'post_type' => 'case-study',
                'orderby' => 'ID',
                'order'   => 'DESC',
                'post_status' => 'publish',
                'paged'=>$paged,
                'posts_per_page' => -1
            ];
            $query = new WP_Query($args);
            $numberOfPosts=$query->found_posts;
            if($query->have_posts()){
                while($query->have_posts()){
                    $query->the_post();
                    $id = get_the_ID();
                    //echo $id;
                    ?>
            <div class="project-bx"   data-aos="fade-up" data-aos-duration="1000">
                <a href="<?= get_the_permalink(); ?>">
                    <?php
               if(has_post_thumbnail($id)){
                $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
                ?>
                    <img src="<?php echo $img[0]; ?>" class="main-image" alt="<?php the_title(); ?>">
                    <?php }else { ?>
                    <img src="<?= get_site_url(); ?>/wp-content/uploads/2023/03/Hong-Kong-Zhuhai-Macao-Bridge-cshutterstock.jpg"
                        class="main-image">
                    <?php } ?>
                    <div class="project__content project__content--overlay" data-aos="fade-up" data-aos-duration="1500">
                    <h5 class="project__footnote project__footnote--alt">
                        <?php 
                    $mar = wp_get_post_terms($id, 'Markets');
                   
                    foreach($mar as $rowItems){ ?>
                    
                    <span> <?= !empty($rowItems->name) ? $rowItems->name : '';?></span>
                   
                   <?php }                    
                    ?>
                    </h5>
                       
                        <h4 class="project__title">
                            <?= get_the_title(); ?>
                        </h4>
                        <h5 class="project__label">
                        <?php 
                    $ser = wp_get_post_terms($id, 'Services');
                    //$total_ser=[];
                    foreach($ser as $rowSer){ ?>
                     <span> <?= $rowSer->name; ?></span>
                    <?php }                   
                    ?>
                        
                            
                            
                        </h5>
                    </div>
                </a>
            </div>
            <?php 
        }
            }
        wp_reset_postdata();
        ?>
        </div>
        <div class="load-more-container load-more-container--hub">
            <a href="javascript:void(0)" class="cta__text load_more" value="<?= $paged+1;?>"
                total="<?= ceil($numberOfPosts/2);?>">Load More <span class="cta__icon icon icon-plus"
                    style="background-image: none;"><svg id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 40.6 40.6">
                        <style>
                        .st0 {
                            fill: none;
                            stroke: #343434;
                            stroke-linecap: square;
                            stroke-linejoin: bevel
                        }

                        .st1 {
                            opacity: .9
                        }
                        </style>
                        <g id="SPRINT-2----PROJECT-HUB">
                            <g id="Project-Hub-default" transform="translate(-305 -281)">
                                <g id="madlib" transform="translate(305 121)">
                                    <g id="switch-to-service" transform="translate(1 158)">
                                        <g id="Buttons_x2F_Links_x2F_Expand" transform="translate(0 3)">
                                            <g id="Group-4">
                                                <circle id="Oval" class="st0" cx="19.3" cy="19.3" r="19.5"></circle>
                                            </g>
                                            <g id="Icons_x2F_Misc_x2F_Plus" transform="translate(7 7)" class="st1">
                                                <g id="Group" transform="translate(8 8)">
                                                    <path id="Line" class="st0" d="M.5 4.3h8.3"></path>
                                                    <path id="Line-Copy" class="st0" d="M4.8 8.8V0"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
                </span></a>
        </div>
    </div>
</section>
<?php 
$featuredata = get_field('select_content'); 
if(!empty($featuredata)){
foreach($featuredata as $featureRow){
?>
<section class="related-content-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sec-head">
                    <?php 
    $title = $featureRow['override_default_title'];
    if($title == 1){
    ?>
                    <h2><?= (!empty($featureRow['new_section_title'])) ? $featureRow['new_section_title'] : 'Related Content'; ?>
                    </h2>
                    <?php }else{ ?>
                    <h2>Related Content</h2>
                    <?php } ?>
                </div>
            </div>
            <?php 
$relatedpost = $featureRow['select_content_for_viewing'];
if(!empty($relatedpost)){
    foreach($relatedpost as $relatedpstrow){
        $id = $relatedpstrow->ID;
?>
            <div class="col-md-4">
                <div class="related-bx">
                    <div class="related-img">
                        <?php 
    if(has_post_thumbnail($id)){
        $imageurl = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
    ?>
                        <img src="<?= $imageurl[0]; ?>">
                        <?php } else{   ?>
                        <img
                            src="https://sinclair.design/wp-content/uploads/2023/06/Post-type-feature-image-16_9-crop.png">
                        <?php } ?>
                        <h5><?= get_post_type($id) ?></h5>
                    </div>
                    <div class="related-cont">
                        <h2><?= get_the_title($id); ?></h2>
                        <?php $postcontent = $relatedpstrow->post_content; 
//echo $postcontent;
$excerptcontent = implode(' ', array_slice(explode(' ', $postcontent), 0, 25));
?>
                        <p><?= $excerptcontent; ?> </p>
                        <a href="<?= get_the_permalink($id); ?>" class="pg-btn">Read <?= get_post_type($id) ?></a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>
<?php 
    } 
        }
?>
<?php 
get_footer(); ?>