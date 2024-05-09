<!-- <video loop muted autoplay width="500" height="500">
    <source src="https://sinclair.design/wp-content/uploads/2024/05/sinclair-homepageheader-reel-10-1.mp4" type="video/mp4">
</video>  -->

<?php
$embedimage = get_sub_field('override_feature_image');
if ($embedimage == 1) {
    $imageurl = get_sub_field('add_new_feature_image_path');
?>
    <section class="home-page-main page_title for-back-remove" style="background-image:url('<?= esc_url($imageurl['url']); ?>')">
    <?php  } else { ?>
        <section class="home-page-main page_title for-back-remove" style="background-color:<?= (!empty(get_sub_field('content_background_colour'))) ? get_sub_field('content_background_colour') : '#d9d9d9'; ?>;">
        <?php
    }?>
   

        <div class="local-video-main">
            <video loop muted autoplay width="500" height="500" playsinline>
    <source src="https://sinclair.design/wp-content/uploads/2024/05/sinclair-homepageheader-reel-10-1.mp4" type="video/mp4">
</video>
        </div>
        <div class="for-mobile-back <?= (get_sub_field('embed_feature_video') == 1) ? 'video-enabled' : '';  ?>" <?php if ($embedimage == 1) {$mobileimage = get_sub_field('add_new_feature_image_for_mobile'); ?>style="background-image:url('<?= esc_url($mobileimage['url']); ?>')" <?php } ?>>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 lft-cnt <?= (get_sub_field('embed_feature_video') == 1) ? 'text-color' : '';  ?>">
                        <div class="left-main-cont">
                            <h6><?= (!empty(get_sub_field('homepage_cta_attribution'))) ? get_sub_field('homepage_cta_attribution') : ''; ?></h6>
                            <h1><?= (!empty(get_sub_field('homepage_headline'))) ? get_sub_field('homepage_headline') : ''; ?></h1>
                            <div class="dis-crip">
                                <p><?= (!empty(get_sub_field('homepage_standfirst'))) ? get_sub_field('homepage_standfirst') : ''; ?> </p>
                            </div>
                            <?php
                            $btn = get_sub_field('homepage_standfirst_button');
                            if ($btn) { ?>
                                <a href="<?= esc_url($btn['url']); ?>" class="pg-btn"><?= esc_html($btn['title']); ?></a>
                            <?php }
                            ?>


                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mobile-spacer"></div>
                    </div>
                </div>
            </div>
        </div>

        </section>

       