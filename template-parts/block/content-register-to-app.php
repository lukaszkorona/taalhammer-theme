<?php
/**
 * Block Name: Register to the app
 *
 * This is the template that displays the register-to-app block.
 */


// create id attribute for specific styling
$id = '' . $block['id'];
$title = get_field('title');
$columns = get_field('columns');
$button = get_field('button');

$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<!-- <pre style="padding: 20px; background: #555; color: #00ff00; font-size: 2rem;">
  <?php //echo print_r($columns); ?>
</pre> -->

<section class="register-to-app-section" id="register-to-app-section-<?php echo $id; ?>">
  <h2 class="has-text-align-center home-header-3">
    <?php echo $title; ?>
  </h2>
  <div class="wp-block-columns" id="home-page-feature-triplet">
    <?php foreach($columns as $column) : ?>
    <div class="wp-block-column">
      <div class="icon">
        <img src="<?php echo $column['icon']; ?>" alt="<?php echo $column['title']; ?>">
      </div>
      <h3 class="title"><?php echo $column['title']; ?></h3>
      <p class="description"><?php echo $column['description']; ?></p>
    </div>
    <?php endforeach; ?>
  </div>
  <div style="text-align:center">
    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="register-button">
      <?php echo $button['title']; ?>
    </a>
  </div>
</section>