<?php
/**
 * Block Name: Hero section
 *
 * This is the template that displays the first-block block.
 */

// get image field (array)


// create id attribute for specific styling
$id = 'about' . $block['id'];


// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section id="about" class=" about-section first_block"
    style="background-color: <?php echo get_field('background_color');?>">
    <!-- -->
        <?php if (have_rows('slide')): $i=0;?>
            <?php while(have_rows('slide')): the_row();?>
            <div class="index-banner-wrapper item">
                <?php $image = get_sub_field('image');?>
                <div class="index-banner__text-wrapper">
                    <div class="text__main">
                        <span><?php echo get_sub_field('first_row_text');?></span>
                        <span><?php echo get_sub_field('second_row_text');?></span>
                    </div>
                    <div class="text__sub-text">
                        <span><?php echo get_sub_field('sub_text');?></span>
                    </div>
                    <div class="text__add-link">
                        <?php
                $website_link =get_field('website_link');
                $app_link =get_field('application_link');
                ?>
                        <?php if (is_user_logged_in()) {?>
                        <a href="<?php echo $app_link['url'];?>"
                            class="app-link app-link--yellow"><?php echo $app_link['title'];?></a>
                        <?php } else { ?>
                        <a href="<?php echo $website_link['url'];?>"
                            class="app-link app-link--yellow"><?php echo $app_link['title'];?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="index-banner__image-wrapper">
                    <img class="index-banner__image" src="<?php echo $image['url'];?>" alt="">
                </div>
            </div>

            <?php $i++;endwhile;?>
        <?php endif;?>
</section>