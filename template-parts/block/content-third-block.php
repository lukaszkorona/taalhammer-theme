<?php
/**
 * Block Name: Third block
 *
 * This is the template that displays the third-block block.
 */

// get image field (array)


// create id attribute for specific styling
$id = '' . $block['id'];
$image = get_field('image');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section class="countries-section">
    <div class="index-countries-container siteMal-width">
        <div class="index-countries-wrapper">
            <a href="<?=get_field('flague_link')['url'];?>" class="lang-top ">
                <div class="countries__box countries__box-top <?php if(!get_field('flague_link')['url']):?>lang-top-dis<?php endif;?>">
                    <div class="countries__box-left">
                        <img src="<?php echo get_field('flague')['url'];?>"
                            alt="<?php echo get_field('flague')['alt'];?>">
                    </div>
                    <div class="countries__box-right">
                        <div class="countries-head__text countries-head__text--desktop"><?php echo get_field('title');?>
                            <br>
                            <span class="countries-title-span"><?php echo get_field('sub_text');?></span>
                        </div>
                    </div>
                </div>
            </a>
            <div class="countries__box--bottom">

                <div class="countries__bottom-title"><?php echo get_field('title_2');?></div>


                <div class="countries__content-wrapper">
                    <?php if ( have_rows( 'flags_2') ) :  ?>
                    <div class="wp-block-group">
                        <div class="wp-block-group__inner-container">
                            <?php while ( have_rows( 'flags_2') ) : the_row(); ?>
                            <?php $link_image = get_sub_field('link_image');?>
                            <a
                                href="<?=(isset($link_image['url']) ? $link_image['url'] : '#');?>"
                                target="<?=(isset($link_image['target']) ? $link_image['target'] : '_self');?>"
                                class="lang-block <?php if(!$link_image):?>lang-block-dis<?php endif;?>"
                            >
                                <figure class="wp-block-image">
                                    <?php $flag_image = get_sub_field('flag_image'); ?>
                                    <img src="<?php echo (isset($flag_image['url']) ? $flag_image['url'] : '');?>" alt="">
                                    <figcaption><?php echo get_sub_field('flag_name');?></figcaption>
                                </figure>
                            </a>
                            <?php endwhile;?>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo get_field('image')['url'];?>" alt="<?php echo get_field('image')['alt'];?>" class="lang-image">
</section>