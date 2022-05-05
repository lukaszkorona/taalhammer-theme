<?php
/**
 * Block Name: Second block
 *
 * This is the template that displays the second-block block.
 */

// get image field (array)


// create id attribute for specific styling
$id = '' . $block['id'];
$image = get_field('image');
$title = get_field('main_text');
$top_left = get_field('top_left');
$top_right = get_field('top_right');
$bottom_left = get_field('bottom_left');
$bottom_right = get_field('bottom_right');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section class=" learning-section">
    <div class="learning-head__text"><?php echo get_field('section_title');?></div>
    <div class="learning-wrapper">
        <h2 class="about-title"><?=$title;?></h2>
        <div class="about-image">
            <div class="point-left">
                <div class="about-tl point"><?=$top_left;?></div>
                <div class="about-bl point"><?=$bottom_left;?></div>
            </div>
            <div class="point-right">
                <div class="about-tr point"><?=$top_right;?></div>
                <div class="about-br point"><?=$bottom_right;?></div>
            </div>
            <img src="<?=$image['url'];?>" alt="<?=$image['alt'];?>">
        </div>
    </div>
    </div>
</section>