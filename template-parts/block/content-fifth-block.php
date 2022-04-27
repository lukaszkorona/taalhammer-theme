<?php
/**
 * Block Name: Fifth block
 *
 * This is the template that displays the fifth-block block.
 */

// get image field (array)


// create id attribute for specific styling
$id = 'advantage' . $block['id'];
$image = get_field('image');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section class="listen-section" id="advantage">
    <div class="index-listen-container siteMal-width">
        <div class="index-listen-wrapper">
            <div class="index-listen__image-wrapper">
                <img class="index-listen__image" src="<?php echo $image['url'];?>" alt="">
            </div>
            <div class="index-listen__text-wrapper">
                <div class="text__main">
                    <p><?php echo get_field('title');?></p>
                </div>
                <div class="index-listen__image-wrapper mobile">
                    <img class="index-listen__image" src="<?php echo $image['url'];?>" alt="">
                </div>
                <div class="text__sub-text">
                    <?php echo get_field('paragraph_1');?>
                    <?php if ( have_rows( 'icons_1') ) :  ?>
                    <div class="wp-block-group">
                        <div class="wp-block-group__inner-container">
                            <?php while ( have_rows( 'icons_1') ) : the_row(); ?>
                            <figure class="wp-block-image"><img src="<?php echo get_sub_field('icon')['url'];?>" alt="">
                            </figure>
                            <?php endwhile;?>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php echo get_field('paragraph_2');?>
                    <?php if ( have_rows( 'icons_2') ) :  ?>
                    <div class="wp-block-group">
                        <div class="wp-block-group__inner-container">
                            <?php while ( have_rows( 'icons_2') ) : the_row(); ?>
                            <figure class="wp-block-image"><img src="<?php echo get_sub_field('icon_2')['url'];?>"
                                    alt=""></figure>
                            <?php endwhile;?>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                <div class="text__add-link text-add-link--listen">
                    <?php 
                $website_link =get_field('website_link');
                $app_link =get_field('application_link');
                ?>
                    <?php if (is_user_logged_in()) {?>
                    <a href="<?php echo $app_link['url'];?>"
                        class="app-link app-link--listen"><?php echo $app_link['title'];?></a>
                    <?php } else { ?>
                    <a href="<?php echo $website_link['url'];?>"
                        class="app-link app-link--listen"><?php echo $app_link['title'];?></a>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>