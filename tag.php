<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <article class="page type-page">
      <header class="entry-header">
        <h1 class="entry-title"><?php single_tag_title(); ?></h1>
      </header>

      <div class="entry-content">
        <div class="wp-container-3 wp-block-columns">
          <div class="wp-container-1 wp-block-column">
            <h1><?php single_tag_title(); ?></h1>
            <?php echo tag_description(); ?>
          </div>
        </div>

        <?php if (have_posts()) :  ?>
          <div class="pt-cv-wrapper">
            <div class="pt-cv-view pt-cv-grid pt-cv-colsys" id="pt-cv-view-c2e8163sfe">
              <div data-id="pt-cv-page-1" class="pt-cv-page" data-cvc="3">
                <?php while (have_posts()) : the_post(); global $post; ?>
                  <div class="col-md-4 col-sm-6 col-xs-12 pt-cv-content-item pt-cv-1-col">
                    <div class="pt-cv-ifield">
                      <a href="<?php echo get_permalink(); ?>" class="_self pt-cv-href-thumbnail pt-cv-thumb-default" target="_self">
                        <?php echo get_the_post_thumbnail($post, '640x430', array('class' => 'pt-cv-thumbnail')); ?>
                      </a>
                      <h2 class="pt-cv-title">
                        <a href="<?php echo get_permalink(); ?>" class="_self" target="_self"><?php the_title(); ?></a>
                      </h2>
                      <div class="pt-cv-content">
                        <?php the_excerpt($post); ?>
                        <a href="<?php echo get_permalink(); ?>" class="_self pt-cv-readmore btn btn-success" target="_self">Read More</a>
                      </div>
                      <div class="pt-cv-meta-fields">
                        <span class="entry-date"> 
                          <time datetime="2022-04-23T11:33:51+00:00"><?php echo get_the_date('F j, Y'); ?></time>
                        </span> / 
                        <span class="terms"> 
                          <?php
                            $terms = [];
                            $categories = wp_get_post_categories($post->ID);
                            $tags = wp_get_post_tags($post->ID);

                            if (is_array($tags) && count($tags) > 0) {
                              foreach($tags as $tag) {
                                array_push($terms, '<a href="'.get_tag_link($tag->term_id).'" title="'.$tag->slug.'" class="pt-cv-tax-'.$tag->slug.'">'.$tag->name.'</a>');
                              }
                            }

                            if (is_array($categories) && count($categories) > 0) {
                              foreach($categories as $category) {
                                $tmp_category = get_term_by('id', $category, 'category');

                                if ($tmp_category->slug === 'uncategorized')
                                  continue;

                                array_push($terms, '<a href="'.get_term_link($tmp_category->term_id).'" title="'.$tmp_category->slug.'" class="pt-cv-tax-'.$tmp_category->slug.'">'.$tmp_category->name.'</a>');
                              }
                            }

                            echo implode(', ', $terms);
                          ?>
                        </span>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          </div>

        <?php endif; ?>
      </div>
    </article>

  </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>