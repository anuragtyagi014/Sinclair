<?php

//Silence is golden.
?>
<div class="side-item-bx-in">
    <h4>TOPICS</h4>
    <ul class="side-btns">
    <?php 
    $stat_qualifier = get_sub_field('stat_qualifier_and_quantifier');
    if($stat_qualifier){
    	foreach($stat_qualifier as $stat_qualifier_row){ ?>
    	<li class="side-btns-item">
            <a href="<?= $stat_qualifier_row['at_a_glance_stat_qualifier']; ?>"><?= $stat_qualifier_row['at_a_glance_stat_qualifi']; ?></a>
        </li>
    <?php }
    }
    ?>
    </ul>
    </div>
</div>
</li>
</ul>