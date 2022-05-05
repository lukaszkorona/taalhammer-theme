<?php
/**
 * Block Name: Seventh block
 *
 * This is the template that displays the seventh-block block.
 */

// get image field (array)


// create id attribute for specific styling
$id = '' . $block['id'];
$image = get_field('image');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section class="siteMal-width final-section">
    <div class="final-section-container">
        <p class="final__head"><?php echo get_field('title');?></p>
        <div class="index-final-container">
            <div class="final-image-wrapper">
                <img src="<?php echo $image['url'];?>" alt="">
            </div>
            <div class="final-text-container">
                <p class="final__text"><?php echo get_field('content',false,false);?></p>
            </div>
        </div>
    </div>
</section>