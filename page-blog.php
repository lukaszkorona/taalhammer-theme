<?php
/**
 *   * Template name: Page Blog
 */
get_header();
?>
<section class="blog siteMal-width">
    <div class="blog-inner">
        <div class="index-editor-container">
            <?php
             $category = get_field('post_type');
                    $args = array(
                        'cat' => $category[0],
                    );
            $akt_query = new WP_Query($args);
            if($akt_query->have_posts()): $i = 0;?>
            <div class="blog-wrapper">

                <?php while($akt_query->have_posts()): $akt_query->the_post(); ?>

                <div class="blog-items">
                    <div class="blog-item<?php if(($i%2==1)&&($i!=0)) echo '-img';else echo ' padding-right';?>">
                        <?php if(($i%2!=1)||($i==0)){?>
                        <a href="<?php the_permalink();?>">
                            <h2 class="news-title"><?php the_title();?></h2>
                        </a>
                        <div class="news-excerpt"><?php the_excerpt();?></div>
                        <?php } else{ ?>
                        <a href="<?php the_permalink();?>">
                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->post_id),'full')[0]; ?>"
                                alt="">
                        </a>
                        <?php };?>
                    </div>
                    <div class="blog-item<?php if(($i%2!=1)||($i==0)) echo '-img';else echo ' padding-left';?>">
                        <?php if(($i%2==1)&&($i!=0)){?>
                        <a href="<?php the_permalink();?>">
                            <h2 class="news-title"><?php the_title();?></h2>
                        </a>
                        <div class="news-excerpt"><?php the_excerpt();?></div>
                        <?php } else{ ?>
                        <a href="<?php the_permalink();?>">
                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->post_id),'full')[0]; ?>"
                                alt=""></a>
                        <?php } ;?>

                    </div>

                </div>
                <div class="blog-separator">
                    <div class="separator"></div>
                </div>

                <?php $i++; endwhile;?>
            </div>
            <?php  endif; 
            wp_reset_postdata();?>
            <?php if($akt_query->have_posts()): $i = 0;?>
            <div class="blog-wrapper-mobile">

                <?php while($akt_query->have_posts()): $akt_query->the_post(); ?>

                <div class="blog-items <?php if(($i%2==1)&&($i!=0)) echo 'reverse';?>">
                    <div class="blog-item<?php if(($i%2==1)&&($i!=0)) echo '-img';else echo ' padding-right';?>">
                        <?php if(($i%2!=1)||($i==0)){?>
                        <a href="<?php the_permalink();?>">
                            <h2 class="news-title"><?php the_title();?></h2>
                        </a>
                        <a href="<?php the_permalink();?>">
                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->post_id),'full')[0]; ?>"
                                alt="">
                        </a>
                        <?php } else{ ?>

                        <div class="news-excerpt"><?php the_excerpt();?></div>
                        <?php };?>
                    </div>
                    <div class="blog-item<?php if(($i%2!=1)||($i==0)) echo '-img';else echo ' padding-left';?>">
                        <?php if(($i%2==1)&&($i!=0)){?>
                        <a href="<?php the_permalink();?>">
                            <h2 class="news-title"><?php the_title();?></h2>
                        </a>

                        <a href="<?php the_permalink();?>">
                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->post_id),'full')[0]; ?>"
                                alt=""></a>
                        <?php } else{ ?>
                        <div class="news-excerpt"><?php the_excerpt();?></div>
                        <?php } ;?>

                    </div>

                </div>
                <div class="blog-separator">
                    <div class="separator"></div>
                </div>

                <?php $i++; endwhile;?>
            </div>
            <?php  endif; 
            wp_reset_postdata();?>
        </div>
    </div>
</section>
<?php get_footer();?>