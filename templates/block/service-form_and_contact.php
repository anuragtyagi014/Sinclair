<?php 
$form = get_sub_field('contact_us_block');
if($form){
    foreach($form as $formdata){

?>
<section>
 <div class="contact_new_for_page">
        <div class="container sml-container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sec-head">
                        <h2><?= (!empty($formdata['h2_form_heading'])) ? $formdata['h2_form_heading'] : 'Contact Us'; ?></h2>
                       <p><?= (!empty($formdata['form_paragraph'])) ? $formdata['form_paragraph'] : ''; ?></p>
                    </div>
                </div>
                 <div class="col-md-8">
                    <div class="contact_cont_form">
                        <?php 
                        $contactform = $formdata['form_finder'];
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
<?php     
    }
}
?>