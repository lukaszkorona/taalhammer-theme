<?php
/**
 * Block Name: icons section
 *
 * This is the template that displays the second-block block.
 */

// get image field (array)


// create id attribute for specific styling
$id = '' . $block['id'];$id = '' . $block['id'];
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section class=" icons-section">
    <div class="icons-inner">
        <div class="container">
            <div class="icons-text">
                <h2 class="icons-title"><?=get_field('icons_title');?></h2>
                <div class="icons-subtitle"><?=get_field('icons_subtitle');?></div>
            </div>
            <?php if(have_rows('icons')):?>
            <div class="icons-wrapper">
                <?php while(have_rows('icons')):the_row();?>
                <?php 
                    $icon = get_sub_field('icon');
                    $name = get_sub_field('name');
                    $editor = get_sub_field('editor');
                ?>
                <div class="icons-box">
                    <div class="icons-img"><img src="<?=$icon['url'];?>" alt="<?=$icon['alt'];?>"></div>
                    <div class="icons-name"><?=$name;?></div>
                    <?php if($editor):?><div class="icons-desc"><?=$editor;?></div><?php endif;?>
                </div>
                <?php endwhile;?>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>