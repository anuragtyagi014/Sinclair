 <div class="sidebar-are">
    <h2><?= (!empty(get_field('glance_heading'))) ? get_field('glance_heading') : 'AT A GLANCE'; ?> </h2>
    <ul class="sidebar-list">
    <?php 
    $stat_qualifier = get_sub_field('stat_qualifier_and_quantifier');
    if(!empty($stat_qualifier)){
        foreach($stat_qualifier as $stat_item){ ?>
        <li class="sidebar-item">
            <div class="side-item-bx">
                <h4><?= $stat_item['at_a_glance_stat_qualifier']; ?></h4>
                <h6><?= $stat_item['at_a_glance_stat_qualifie']; ?></h6>
            </div>
        </li>
       <?php }
    }
   ?>