<?php
/**
 * The header for our theme
 *
 *
 *
 * @package WordPress
 * @subpackage Vizov
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	 <header id="masthead" class="<?='site-header'?> site-width">
        <div class="header-logo-wrapper">
            <a href="/" class="header-logo__link">
                <?php if($img = getHeaderLogoSrc()){ ?>
                <img class="header-logo__img" src="<?=$img?>" alt="Logo">
                <?php } ?>
            </a>
        </div>
         <div class="header-right-wrapper">
            <?=wp_nav_menu(['menu' => 'Header Menu', 'container_class' => 'menu-header-menu']);?>
            <div class="header-app-link-wrapper">
                 <a href="https://app.taalhammer.com/" class="app-link">Start right now</a>
            </div>
         </div>
         <div class="burger-wrapper">
             <span class="burger"></span>
         </div>
         <div class="header-mobile">
            <div class="header-mobile__top">
                <div class="header-logo-wrapper">
                    <a href="/" class="header-logo__link">
                        <?php if($img = getHeaderLogoSrc()){ ?>
                        <img class="header-logo__img" src="<?=$img?>" alt="Logo">
                        <?php } ?>
                    </a>
                </div>
                 <div class="close-wrapper">
                     <span class="close"></span>
                 </div>
             </div>
             <div class="mobile-menu-wrapper">
                 <?=wp_nav_menu(['menu' => 'Header Menu', 'container_class' => 'mobile-header-menu']);?>
                 <div class="header-app-link-wrapper">
                     <a href="https://app.taalhammer.com/" class="app-link app-link--yellow">Start right now</a>
                 </div>
             </div>
         </div>
	</header>
	<div id="content" class="site-content">
