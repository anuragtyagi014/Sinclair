<section>
 <div class="contact_new_for_page">
        <div class="container sml-container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sec-head">
                        <h2><?= (!empty(get_sub_field('h2_form_heading'))) ? get_sub_field('h2_form_heading') : 'Contact Us'; ?></h2>
                       <p><?= (!empty(get_sub_field('form_paragraph'))) ? get_sub_field('form_paragraph') : ''; ?></p>
                    </div>
                </div>
                 <div class="col-md-8">
                    <div class="contact_cont_form">
                        <?php 
                        $contactform = get_sub_field('form_finder');
                        if($contactform){
                        foreach($contactform as $contactformitem){
                            $formid = $contactformitem->ID;
                            $formtitle = $contactformitem->post_title;
                            echo do_shortcode('[contact-form-7 id="'.$formid.'" title="'.$formtitle.'"]');
                        }
                        wp_reset_postdata();
                    }
                        ?>
                        

                    </div>
                </div>
            </div>
        </div>
</div>
</section>