<?php
$image = get_field('image');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section id="about" class="teachers-section about-section first_block"
    style="background-color: <?php echo get_field('background_color');?>">
    <!-- -->
    <div class="index-banner-container siteMal-width"
        style="background-color: <?php echo get_field('background_color');?>">
        <div class="index-banner-wrapper">
            <div class="index-banner__text-wrapper index-banner__text-wrapper-teachers">
                <div class="text__main text__main--black">
                    <span class="text__main--first-row"><?php echo get_field('first_row_text');?></span>
                    <span class="text-second-row"><?php echo get_field('second_row_text');?></span>
                </div>
                <div class="text__sub-text text__sub-text--teachers">
                    <span><?php echo get_field('sub_text');?></span>
                </div>
                <div class="text__add-link">
                    <?php 
                $website_link =get_field('website_link');
                $app_link =get_field('application_link');
                ?>
                    <?php if (is_user_logged_in()) {?>
                    <a href="<?php echo $app_link['url'];?>"
                        class="app-link app-link--teachers"><?php echo $app_link['title'];?></a>
                    <?php } else { ?>
                    <a href="<?php echo $website_link['url'];?>"
                        class="app-link app-link--teachers"><?php echo $app_link['title'];?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="index-banner__image-wrapper index-banner__image-wrapper--teachers">
                <img class="index-banner__image" src="<?php echo $image['url'];?>" alt="">
            </div>
        </div>
    </div>
</section>