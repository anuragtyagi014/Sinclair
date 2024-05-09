<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
$artid = get_the_ID();
$image = "";
if (has_post_thumbnail()) {
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($artid), 'single-post-thumbnail');
}
?>


<section class="case-study-single-main" style="background-image: url('<?= (!empty($image)) ? $image[0] : site_url() . '/wp-content/uploads/2023/03/Hong-Kong-Zhuhai-Macao-Bridge-cshutterstock.jpg' ?>');">
    <div class="bann-single-are">
        <?php
        $title = get_field('article_title');
        $subtitle = get_field('article_standfirst');
        ?>
        <h1><?= (!empty($title)) ? $title : get_the_title(); ?></h1>
        <p><?= (!empty($subtitle)) ? $subtitle : get_the_excerpt(); ?></p>
    </div>
</section>
<section class="single-bann-btm">
    <div class="container for-padding">
        <div class="row-in">
            <div class="sidebar-are">
                <h2><?= (!empty(get_field('glance_heading'))) ? get_field('glance_heading') : ''; ?></h2>
                <?php get_website_article_glance_builder(); ?>
            </div>
            <?php
            $case_accomplishments = get_field('case_study_accomplishments', $artid);
            if ($case_accomplishments) {
                foreach ($case_accomplishments as $case_item) {
            ?>
                    <div class="single-pro-cont">
                        <?= $case_item['project_snapshot_field']; ?>

                        <div class="project-summury article-summyry">
                            <div class="summry-head">
                                <h2><?= $case_item['accomplishments_heading']; ?></h2>
                                <h4><?= $case_item['accomplishments_sub_heading']; ?></h4>
                                <ul>
                                    <?php
                                    $listitem = $case_item['accomplishment_block'];
                                    foreach ($listitem as $listrow) {
                                    ?>
                                        <li><?= $listrow['accomplishment_qualifier']; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
            <div class="sidebar-right">
                <div class="author">
                    <div class="author-image">
                        <?php
                        $author_id = $post->post_author;
                        echo get_avatar($author_id, 100);
                        ?>
                    </div>
                    <div class="author-cont">
                        <h4><?= get_author_name($author_id); ?></h4>
                        <p>Published on <?= get_the_date('d/m/Y'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_website_article_builder_block();
?>
<?php
$featuredata = get_field('select_content', $artid);
if (!empty($featuredata)) {
    foreach ($featuredata as $featureRow) {
?>
        <section class="related-content-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sec-head">
                            <?php
                            $title = $featureRow['override_default_title'];
                            if ($title == 1) {
                            ?>
                                <h2><?= (!empty($featureRow['new_section_title'])) ? $featureRow['new_section_title'] : 'Related Content'; ?></h2>
                            <?php } else { ?>
                                <h2>Related Content</h2>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    $relatedpost = $featureRow['select_content_for_viewing'];
                    if (!empty($relatedpost)) {
                        foreach ($relatedpost as $relatedpstrow) {
                            $id = $relatedpstrow->ID;
                    ?>
                            <div class="col-md-4">
                                <div class="related-bx">
                                    <div class="related-img">
                                        <?php
                                        if (has_post_thumbnail($id)) {
                                            $imageurl = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
                                        ?>
                                            <img src="<?= $imageurl[0]; ?>">
                                        <?php } else {   ?>
                                            <img src="https://sinclair.design/wp-content/uploads/2023/06/Post-type-feature-image-16_9-crop.png">
                                        <?php } ?>
                                        <h5><?= get_post_type($id) ?></h5>
                                    </div>
                                    <div class="related-cont">
                                        <h2><?= get_the_title($id); ?></h2>
                                        <?php $postcontent = $relatedpstrow->post_content;
                                        //echo $postcontent;
                                        $excerptcontent = implode(' ', array_slice(explode(' ', $postcontent), 0, 25));
                                        ?>
                                        <p><?= $excerptcontent; ?>... </p>
                                        <a href="<?= get_the_permalink($id); ?>" class="pg-btn">Read <?= get_post_type($id) ?></a>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </section>
<?php
    }
}
get_footer();
?>