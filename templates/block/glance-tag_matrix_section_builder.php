<?php 
    $id = get_the_ID();
    //echo $id;
    $tag_matrix= get_sub_field('tag_matrix');
    if(!empty($tag_matrix)){
        foreach($tag_matrix as $tag_matrix_item){
        $client_tag = $tag_matrix_item['client_tag']
?>
<li class="sidebar-item">
            <div class="side-item-bx btm">
                <div class="side-item-bx-in">
                <h4>CLIENT</h4>
                <ul class="side-btns">
                    <?php 
                    if(!empty($client_tag)){
                        foreach($client_tag as $client_post){
                            $clientId = $client_post->ID;
                    ?>
                    <li class="side-btns-item">
                        <a href="<?= get_the_permalink($clientId); ?>"><?= get_the_title($clientId); ?></a>
                    </li>
                <?php } } ?>
                </ul>
                </div>
                <div class="side-item-bx-in">
                <h4>SERVICES</h4>
                <ul class="side-btns">
                    <?php 
                         $service = $tag_matrix_item['services_tag'];
                    if(!empty($service)){
                        foreach($service as $service_post){
                            $serviceId = $service_post->ID;
                    ?>
                    <li class="side-btns-item">
                        <a href="<?= get_the_permalink($serviceId); ?>"><?= get_the_title($serviceId); ?></a>
                    </li>
                <?php } } ?>
                    
                </ul>
                </div>
                <div class="side-item-bx-in">
                <h4>MARKET</h4>
                <ul class="side-btns">
                    <?php 
                         $market = wp_get_post_terms($id, 'Markets');//$tag_matrix_item['market_tag'];
                    if(!empty($market)){
                        foreach($market as $market_post){
                            // echo "<pre>";
                            // print_r($market_post);
                           //$marketId = $market_post->ID;
                    ?>
                    <li class="side-btns-item">
                        <a href="<?= get_term_link($market_post->slug, 'Markets') ?>"><?= $market_post->name; ?></a>
                    </li>
                <?php } } ?>
                </ul>
                </div>
            </div>
        </li>
<?php     
        }
    } ?>