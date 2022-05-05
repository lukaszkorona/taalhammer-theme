<?php
/**
 * Block Name: Fourth block
 *
 * This is the template that displays the fourth-block block.
 */

// get image field (array)


// create id attribute for specific styling
$id = 'how_it_works' . $block['id'];
$image = get_field('image');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section class=" editor-section" id="how_it_works">
    <div class="index-editor-container">

        <div class="editor__content-wrapper">


            <div class="video" style="background-image:url(<?php echo get_field('phone_img')['url'];?>)">
                <?php echo get_field('video');?></div>
            <div class="editor__socials">
                <?php 
                        $website_link =get_field('website_link');
                        $app_link =get_field('application_link');
                    ?>
                <div class="social__youtube social__item">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Small_icon/png/yt.png" alt="">
                </div>
                <div class="social__v social__item">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Small_icon/png/vm.png" alt="">
                </div>
                <div class="social__volume social__item">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Small_icon/png/s.png" alt="">
                </div>
                <div class="social__lang social__item">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Small_icon/png/lang.png" alt="">
                </div>
            
            </div>
            <div class="editor-button">
            <?php if (is_user_logged_in()) {?>
                <a href="<?php echo $app_link['url'];?>"
                    class="app-link app-link--hiw"><?php echo $app_link['title'];?></a>
                <?php } else { ?>
                <a href="<?php echo $website_link['url'];?>"
                    class="app-link app-link--hiw"><?php echo $app_link['title'];?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>