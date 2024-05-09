<?php /* Template Name: Parent Category Page tamplate */ ?>

<?php get_header(); 
$pageid = get_the_ID();
?>


<section>
    <div class="page_title">
        <div class="container">
            <h1 class="ttl"><?= get_the_title($pageid); ?> </h1>
        </div>
    </div>
</section>
<section>

        <div class="main_sec_wid">

                <div class="con_para_all">
                    <div class="container sml-container">
                        <?= get_the_content($pageid); ?>
                    </div>

                </div>

                <div class="main_serv_con">
                    <div class="container sml-container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="serv_box_main">
                                    <div class="serv_img">
                                        <img src="https://sinclair.design/wp-content/uploads/2023/03/308x173-5.png" alt="">
                                    </div>
                                    <div class="serv_con_all">
                                        <h2><a href="#">Branding</a></h2>
                                        <p>Differentiate in a crowded market.</p>
                                        <div class="btn_lern">
                                            <a href="#">Lern more </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="serv_box_main">
                                    <div class="serv_img">
                                        <img src="https://sinclair.design/wp-content/uploads/2023/03/308x173-5.png" alt="">
                                    </div>
                                    <div class="serv_con_all">
                                        <h2><a href="#">CONTENT & CREATIVE</a></h2>
                                        <p>Stand out and better resonate with customers.</p>
                                        <div class="btn_lern">
                                            <a href="#">Lern more </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="serv_box_main">
                                    <div class="serv_img">
                                        <img src="https://sinclair.design/wp-content/uploads/2023/03/308x173-5.png" alt="">
                                    </div>
                                    <div class="serv_con_all">
                                        <h2><a href="#">Digital</a></h2>
                                        <p>Convert prospects to customers, faster.</p>
                                        <div class="btn_lern">
                                            <a href="#">Lern more </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="fe_project_sec">
                    <div class="container sml-container">
                         <div class="sec_heading_main">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Featured Projects</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php 
                           $args = [
                                'post_type' => 'project',
                                'orderby' => 'ID',
                                'order'   => 'DESC',
                                'post_status' => 'publish',
                                'posts_per_page' => 3,
                                'orderby' => 'RAND',
                                'meta_query' => array(
                                            array(
                                                'key'       => 'featured',
                                                'value'     => 'Yes',
                                                'compare'   => 'LIKE'
                                            )
                                        )
                            ];
                            $query = new WP_Query($args);
                            if($query->have_posts()){
                            while($query->have_posts()){
                            $query->the_post();
                            $id = get_the_ID();
                                                      ?>
                           
                            <div class="col-lg-4 col-md-4">
                                <div class="pro_main_box">
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
                                  </a>
                                </div>
                            </div>
                            <?php 
                                }
                                    }
                                wp_reset_postdata();
                                ?>                       

                        </div>
                    </div>
                </div>

                 <div class="contact_new_for_page">
                    <div class="container sml-container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                <div class="contact_cont">
                                    <h2>Contact Us</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. mollis dictumst, aenean non.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. mollis dictumst, aenean non.</p>

                                </div>
                            </div>

                             <div class="col-lg-7 col-md-7">
                                <div class="contact_cont_form">
                                    <?php echo do_shortcode('[contact-form-7 id="1254" title="Contact Form Main"]'); ?>
                                   <!--  <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 for_fon">
                                                <div class="input_box">
                                                    <label for="fname">Enter your first name</label>
                                                    <input type="text" id="fname" name="fname" placeholder="Your name">
                                                 </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 for_fon">
                                                <div class="input_box">
                                                     <label for="lname">Enter your last name</label>
                                                     <input type="text" id="lname" name="lname" placeholder="Your name">
                                                 </div>
                                              
                                            </div>   
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 for_fon_w">
                                                <div class="input_box option_sel_main">
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Project Type</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                      </select>
                                                      <label for="floatingSelect" class="select_label">Select a project type from the list</label>
                                                </div>
                                            </div>
                                        </div>


                                         <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="input_box option_sel_main">
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Yes book a call</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                      </select>
                                                      <label for="floatingSelect" class="select_label">Would you like to book an obligation free 15 minute discovery call?</label>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="input_box">
                                                   <label for="message">Provide any initial background of your project</label>
                                                    <textarea id="message" name="message" placeholder="Notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="send_btn_page">
                                                        <input type="submit" value="Send enquiry">
                                                    </div>
                                                </div>
                                            </div>
                                    </form>  -->
                                </div>
                            </div>


                        </div>
            </div>
        </div>
</section>



<?php get_footer(); ?>