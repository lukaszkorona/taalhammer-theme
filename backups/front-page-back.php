<?php
/**
 * @package TaalHammer
 */
get_header();
$first_block = get_block('first_block');
$second_block = get_block('second_block');
$third_block = get_block('third_block');
$fourth_block = get_block('fourth_block');
$fifth_block = get_block('fifth_block');
$sixth_block = get_block('sixth_block');
$seventh_block = get_block('seventh_block');
?>
    <?php if($first_block){ ?>
    <section class="site-width about-section" id="about">
        <div class="index-banner-container" style="background-color: <?=get_post_meta($first_block->ID, 'back_color', true)?>">
            <div class="index-banner-wrapper">
                <div class="index-banner__text-wrapper">
                    <div class="text__main">
                        <span><?=get_post_meta($first_block->ID, 'first_row', true)?></span>
                        <span class="text-align-right"><?=get_post_meta($first_block->ID, 'second_row', true)?></span>
                    </div>
                    <div class="text__sub-text">
                        <span><?=get_post_meta($first_block->ID, 'sub_text', true)?></span>
                    </div>
                    <div class="text__add-link">
                        <a href="https://app.taalhammer.com/" class="app-link app-link--yellow">Start learning</a>
                    </div>
                </div>
                <div class="index-banner__image-wrapper">
                    <img class="index-banner__image" src="<?=get_the_post_thumbnail_url( $first_block->ID, 'full' );?>" alt="">
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if($second_block){ ?>
    <section class="site-width learning-section">
        <div class="index-learning-container">
            <div class="learning-head__text"><?=get_post_meta($second_block->ID, 'sectionTitle', true)?></div>
            <div class="learning__content-wrapper">
                <div class="learning__gif-wrapper">
                    <img src="<?=get_the_post_thumbnail_url( $second_block->ID, 'full' );?>" alt="" class="learning__gif">
                </div>
                <div class="learning__content">
                    <div class="learning__content--text"><?=get_post_meta($second_block->ID, 'sectionHead', true)?></div>
                    <div class="learning__content--subtext"><?=get_post_meta($second_block->ID, 'sectionText', true)?></div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if($third_block){
        $content = $third_block->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
    ?>
    <section class="countries-section">
        <div class="index-countries-container site-width">
            <div class="index-countries-wrapper">
                <p class="countries-head__text"><?=get_the_title($third_block->ID)?></p>
                <div class="countries__content-wrapper">
                    <?=$content?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if($fourth_block){ ?>
    <section class="site-width editor-section" id="how_it_works">
        <div class="index-editor-container">
            <p class="editor-head__text"><b><?=get_the_title($fourth_block->ID)?></b></p>
            <div class="editor__content-wrapper">
                <div class="editor__gif-wrapper">
                    <img src="<?=$theme_path?>/assets/images/GIF/window.gif" alt="" class="editor__gif">
                </div>
                <div class="editor__content">
                    <div class="editor__content--header"><?=get_post_meta($fourth_block->ID, 'sectionTextTitle1', true)?></div>
                    <div class="editor__content--text"><?=get_post_meta($fourth_block->ID, 'sectionText1', true)?></div>
                    <div class="editor__content--header"><?=get_post_meta($fourth_block->ID, 'sectionTextTitle2', true)?></div>
                    <div class="editor__content--text"><?=get_post_meta($fourth_block->ID, 'sectionText2', true)?></div>
                    <div class="editor__socials">
                        <div class="social__youtube social__item">
                            <img src="<?=$theme_path?>/assets/images/Small_icon/png/Icon_youtube.png" alt="">
                        </div>
                        <div class="social__v social__item">
                            <img src="<?=$theme_path?>/assets/images/Small_icon/png/v.png" alt="">
                        </div>
                        <div class="social__volume social__item">
                            <img src="<?=$theme_path?>/assets/images/Small_icon/png/Group.png" alt="">
                        </div>
                        <a href="https://app.taalhammer.com/" class="app-link">Start learning</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if($fifth_block){
        $content = $fifth_block->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
    ?>
    <section class="listen-section" id="advantage">
        <div class="index-listen-container site-width">
            <div class="index-listen-wrapper">
                <div class="index-listen__text-wrapper">
                    <div class="text__main">
                        <p><?=get_the_title($fifth_block->ID)?></p>
                    </div>
                    <div class="text__sub-text">
                        <p><?=$content?></p>
                    </div>
                </div>
                <div class="index-listen__image-wrapper">
                    <img class="index-listen__image" src="<?=get_the_post_thumbnail_url( $fifth_block->ID, 'full' );?>" alt="">
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if($sixth_block){
        $content = $sixth_block->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $stat = get_post_meta($sixth_block->ID, 'stat', true);
        $stat = json_decode($stat);
    ?>
    <section class="site-width statistics-section" id="statistics">
        <div class="index-statistics-container">
            <div class="statistics-text-container">
                <div class="statistics-text-wrapper">
                    <div class="statistics-text--head"><?=$content?></div>
                    <p class="statistics-text--sub"><?=get_post_meta($sixth_block->ID, 'sub_text', true)?></p>
                    <div class="statistics-text--stat-container">
                        <div class="statistics-text--stat-wrapper">
                            <?php if(is_object($stat) && isset($stat->stat_1) && $stat->stat_1 != ''){ ?>
                                <span class="statistics-text--stat"><?=$stat->stat_1?></span>
                            <?php } ?>
                            <?php if(is_object($stat) && isset($stat->text_1) && $stat->text_1 != ''){ ?>
                                <span class="statistics-text--caption"><?=$stat->text_1?></span>
                            <?php } ?>
                        </div>
                        <div class="statistics-text--stat-wrapper">
                            <?php if(is_object($stat) && isset($stat->stat_2) && $stat->stat_2 != ''){ ?>
                                <span class="statistics-text--stat"><?=$stat->stat_2?></span>
                            <?php } ?>
                            <?php if(is_object($stat) && isset($stat->text_2) && $stat->text_2 != ''){ ?>
                                <span class="statistics-text--caption"><?=$stat->text_2?></span>
                            <?php } ?>
                        </div>
                        <div class="statistics-text--stat-wrapper">
                            <?php if(is_object($stat) && isset($stat->stat_3) && $stat->stat_3 != ''){ ?>
                                <span class="statistics-text--stat"><?=$stat->stat_3?></span>
                            <?php } ?>
                            <?php if(is_object($stat) && isset($stat->text_3) && $stat->text_3 != ''){ ?>
                                <span class="statistics-text--caption"><?=$stat->text_3?></span>
                            <?php } ?>
                        </div>
                        <div class="statistics-text--stat-wrapper">
                            <?php if(is_object($stat) && isset($stat->stat_4) && $stat->stat_4 != ''){ ?>
                                <span class="statistics-text--stat"><?=$stat->stat_4?></span>
                            <?php } ?>
                            <?php if(is_object($stat) && isset($stat->text_4) && $stat->text_4 != ''){ ?>
                                <span class="statistics-text--caption"><?=$stat->text_4?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statistics-image-wrapper">
                <img src="<?=get_the_post_thumbnail_url( $sixth_block->ID, 'full' );?>" alt="">
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if($seventh_block){ ?>
    <section class="site-width final-section">
        <div class="final-section-container">
            <p class="final__head"><?=get_the_title($seventh_block->ID)?></p>
            <div class="index-final-container">
                <div class="final-image-wrapper">
                    <img src="<?=get_the_post_thumbnail_url( $seventh_block->ID, 'full' );?>" alt="">
                </div>
                <div class="final-text-container">
                    <p class="final__text"><?=get_post_meta($seventh_block->ID, 'main_text', true)?></p>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
<?php
get_footer();
