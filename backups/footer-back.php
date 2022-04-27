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
    <footer id="colophon" class="site-footer site-width-wrapper">
        <div class="site-width footer-container">
            <div class="footer-logo-wrapper">
                <a href="/" class="footer-logo__link">
                    <?php if($img = getFooterLogoSrc()){ ?>
                        <img class="footer-logo__img" src="<?=$img[0]?>" alt="Logo">
                    <?php } ?>
                </a>
            </div>
            <div class="footer-right-wrapper">
                <?=wp_nav_menu(['menu' => 'Header Menu', 'container_class' => 'menu-footer-menu']);?>
                <div class="footer-app-link-wrapper">
                    <a href="https://app.taalhammer.com/" class="app-link">Start right now</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<div class="overlay"></div>
<?php wp_footer(); ?>
</body>
</html>
