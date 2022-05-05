<?php
/**
 * Block Name: Sixth block
 *
 * This is the template that displays the sixth-block block.
 */

// get image field (array)


// create id attribute for specific styling
$id = '' . $block['id'];
$image = get_field('image');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section class="siteMal-width statistics-section" id="statistics">
    <div class="index-statistics-container">
        <div class="statistics-image-wrapper">
            <div class="statistics-text-wrapper">
                <div class="statistics-text--head statistics-text--head-mobile"><?php echo get_field('content');?></div>
                <img src="<?php echo $image['url'];?>" alt="">
                <?php if ( have_rows( 'information') ) :  ?>
                <div class="statistics-text--stat-container">
                    <?php while ( have_rows( 'information') ) : the_row(); ?>
                    <div class="statistics-text--stat-wrapper"
                        style="background-image:url(<?php echo get_sub_field('bg_image')['url'];?>)">

                        <span class="statistics-text--stat"><?php echo get_sub_field('stat');?></span>
                        <span class="statistics-text--caption"><?php echo get_sub_field('text');?></span>

                    </div>
                    <?php endwhile;?>
                </div>
                <?php endif;?>
            </div>
        </div>
        <div class=" statistics-text-container">
            <div class="statistics-text--head statistics-text--head-desktop"><?php echo get_field('content');?></div>
            <p class="statistics-text--sub"><?php echo get_field('information_text',false,false);?></p>
            <div class="text__add-link text__add-link--nomargin">
                <?php 
                $website_link =get_field('website_link');
                $app_link =get_field('application_link');
                ?>
                <?php if (is_user_logged_in()) {?>
                <a href="<?php echo $app_link['url'];?>"
                    class="app-link app-link-stats"><?php echo $app_link['title'];?></a>
                <?php } else { ?>
                <a href="<?php echo $website_link['url'];?>"
                    class="app-link app-link-stats"><?php echo $app_link['title'];?></a>
                <?php } ?>
            </div>

        </div>

    </div>
</section>