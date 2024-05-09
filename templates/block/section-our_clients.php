<section class="client-sec <?= (!empty(get_sub_field('section_class'))) ? get_sub_field('section_class') : 'no-additional'; ?>">
    <div class="container">
        <div class="row">
                <div class="col-md-12 client-in">
                    <div class="sec-head">
                        <?php 
                        $title = get_sub_field('override_default_title');
                        if($title == 1){
                        ?>
                        <h2><?= (!empty(get_sub_field('Updated_title'))) ? get_sub_field('Updated_title') : 'Our Clients'; ?></h2>
                    <?php }else{ ?>
                        <h2>Our Clients</h2>
                    <?php } ?>
                    </div>
                    <div class="client-logo">
                        <ul>
                            <?php 
                            $logo = get_sub_field('our_partner');
                            if(!empty($logo)){
                                foreach($logo as $logo_item){ 
                                    // echo "<pre>";
                                    // print_r($logo_item);
                                    ?>
                                <li><a href="<?= esc_url($logo_item['our_partner_url']); ?>"><img src="<?= esc_url($logo_item['our_partner_logo']); ?>"></a></li>
                              <?php  }
                            }
                            ?>
                           
                        </ul>
                    </div>
                </div>

            </div>
    </div>
</section>