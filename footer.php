<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package WordPress
 * @subpackage Vizov
 * @since 1.0.0
 */
?>
</div>
<footer id="colophon" class="siteMal-footer siteMal-width-wrapper">
    <div class="siteMal-width footer-container">
        <div class="footer-logo-wrapper">
            <a href="/" class="footer-logo__link">
                <?php if($img = getFooterLogoSrc()){ ?>
                <img class="footer-logo__img" src="<?=$img[0]?>" alt="Logo">
                <?php } ?>
            </a>
        </div>
        <div class="footer-right-wrapper">
            <?=wp_nav_menu(['menu' => 'Header Menu', 'container_class' => 'menu-footer-menu']);?>
            <?php 
                   $website_link =get_field('website_link','options');
                   $app_link =get_field('application_link','options');
                   ?>
            <?php if($website_link):?>
            <div class="header-app-link-wrapper header-app-link-wrapper--desktop">
                <?php if (is_user_logged_in()) {?>
                <a href="<?php echo $app_link['url'];?>" class="app-link"><?php echo $website_link['title'];?></a>
                <?php } else { ?>
                <a href="<?php echo $website_link['url'];?>" class="app-link"><?php echo $website_link['title'];?></a>
                <?php } ?>
            </div>
            <?php endif;?>
        </div>
        <div class="header-app-link-wrapper header-app-link-wrapper--mobile">
            <?php if(have_rows('social_icons_footer','options')):?>
            <div class="social-icons-wrapper">
                <?php while(have_rows('social_icons_footer','options')): the_row();?>
                <a href="<?php echo get_sub_field('link')['url'];?>" class="icon-link"><img
                        src="<?php echo get_sub_field('icon')['url'];?>"
                        alt="<?php echo get_sub_field('icon')['alt'];?>"></a>
                <?php endwhile;?>
            </div>
            <?php endif;?>
            <div class="footer-copyrights"><?php echo get_field('copyrights','options');?></div>
        </div>
    </div>
</footer>
</div>
<div class="overlay"></div>
<?php wp_footer(); ?>
</body>

</html>