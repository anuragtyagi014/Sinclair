<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
$slug = get_query_var('term');
$taxonomy = get_query_var('taxonomy');
//echo $slug;
?>



<section class="brd-crmb custom-taxonomy single-list filter-disable">
    <div class="container">
        <div class=" bread-crumb-inn">
            <div class="ttl-are">
                <h2>Case Study</h2>
                <a href="javascript:void(0);" class="label--toggle">
                    <span class="label--cta__inner">Filter</span>
                    <span class="icon icon-arrow" style="background-image: none;"><svg width="8" height="5" viewBox="0 0 8 5" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 1L4 4 0 1" stroke="#000" fill="none" opacity=".9"></path>
                        </svg>
                    </span>
                </a>
            </div>
            <div class="filter-new">
                <div class="drop-bx for-ser">
                    <span class="slct-text"><span class="input-are" value="">Choose by Service</span> <span class="cross">+</span></span>
                    <ul class="drop-items">
                        <li value="https://sinclair.design/projects/"> All Services</li>
                        <?php
                        $service = get_terms([
                            'taxonomy' => 'Services',
                            'orderby' => 'name',
                            'order'   => 'DESC',
                            'hide_empty' => false
                        ]);
                        foreach ($service as $service_item) {
                        ?>
                            <li value="<?= get_term_link($service_item->term_id); ?>"><?= $service_item->name; ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="drop-bx for-market">
                    <span class="slct-text"><span class="input-are">Choose by Market</span> <span class="cross">+</span></span>
                    <ul class="drop-items">
                        <li value="https://sinclair.design/projects/"> All Market</li>
                        <?php
                        $market = get_terms([
                            'taxonomy' => 'Markets',
                            'orderby' => 'name',
                            'order'   => 'DESC',
                            'hide_empty' => false
                        ]);
                        foreach ($market as $market_item) {
                        ?>
                            <li value="<?= get_term_link($market_item->term_id); ?>"><?= $market_item->name; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="projects-listing custom-taxonomy filter-disable">
    <div class="container">
        <div class="projects-inn-lst">
            <?php

            $paged = (!empty(get_query_var('paged'))) ? get_query_var('paged') : 1;
            $per_page = 2;
            $args = [
                'post_type' => 'case-study',
                'orderby' => 'ID',
                'order'   => 'DESC',
                'post_status' => 'publish',
                'paged' => $paged,
                'posts_per_page' => $per_page,
                'tax_query'  => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $slug
                    ),
                ),
            ];
            $query = new WP_Query($args);
            $numberOfPosts = $query->found_posts;
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $id = get_the_ID();
                    //echo $id;
            ?>
                    <div class="project-bx">
                        <a href="<?= get_the_permalink(); ?>">
                            <?php
                            if (has_post_thumbnail($id)) {
                                $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'single-post-thumbnail');
                            ?>
                                <img src="<?php echo $img[0]; ?>" class="main-image" alt="<?php the_title(); ?>">
                            <?php } else { ?>
                                <img src="<?= get_site_url(); ?>/wp-content/uploads/2023/03/Hong-Kong-Zhuhai-Macao-Bridge-cshutterstock.jpg" class="main-image">
                            <?php } ?>
                            <div class="project__content project__content--overlay">
                                <?php
                                $mar = wp_get_post_terms($id, 'Markets');
                                $total_cat = [];
                                foreach ($mar as $rowItems) {
                                    $total_cat[] = $rowItems->name;
                                }

                                ?>
                                <h5 class="project__footnote project__footnote--alt"><?= !empty($total_cat) ? implode(',', $total_cat) : ''; ?></h5>
                                <h4 class="project__title"><?= get_the_title(); ?></h4>
                                <?php
                                $ser = wp_get_post_terms($id, 'Services');
                                $total_ser = [];
                                foreach ($ser as $rowSer) {
                                    $total_ser[] = $rowSer->name;
                                }
                                ?>
                                <h5 class="project__label">

                                    <?= !empty($total_ser) ? implode(',', $total_ser) : ''; ?>
                                    </span>
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
        <?php
        if ($numberOfPosts > $per_page) {
        ?>
            <div class="load-more-container load-more-container--hub">
                <a href="javascript:void(0)" class="cta__text load_more1 second" slug="<?= $slug; ?>" value="<?= $paged + 1; ?>" total="<?= ceil($numberOfPosts / 2); ?> " taxonomy="<?= $taxonomy; ?>">Load More <span class="cta__icon icon icon-plus" style="background-image: none;"><svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40.6 40.6">
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
        <?php
        }
        ?>
    </div>
</section>


<?php get_footer(); ?>