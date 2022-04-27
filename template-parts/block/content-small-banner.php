<?php
/**
 * Block Name: Small banner
 *
 * This is the template that displays the small-banner block.
 */


// create id attribute for specific styling
$id = '' . $block['id'];
$text = get_field('text');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<section class="small-banner-section" id="small-banner-<?php echo $id; ?>">
  <h2>
    <?php echo $text; ?>
  </h2>
</section>