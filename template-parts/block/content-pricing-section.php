<?php
/**
 * Block Name: pricing section
 *
 * This is the template that displays the second-block block.
 */

// get image field (array)

if(!empty(get_current_user_id() )):
	global $wpdb;
	$prefix = $wpdb->prefix;
	$user_id= get_current_user_id();
	$tab = $prefix."pmpro_memberships_users";
	$status = $wpdb->get_var("SELECT status FROM $tab WHERE user_id = $user_id ORDER BY ID DESC LIMIT 1");
		if(!empty($status)):
			if($status !== 'active'):
			?>
				<div class="__trial-expired">
					<p>
					<?= __('Your trial period has expired. Please choose one of the plans to continue learning.','taalhammer-payments');  ?>
					</p>
				</div>
				<?php
			endif;
		endif;
	endif;
// create id attribute for specific styling
$id = '' . $block['id'];$id = '' . $block['id'];
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$title = get_field('tytul');
$obrazek = get_field('obrazek');
$edytor_pricing = get_field('edytor_pricing');
?>
<section class=" pricing-section">
   <div class="pricing-section-inner">
       <div class="container">
           <h1 class="pricing-title"><?=$title;?></h1>
           <div class="pricing-wrapper">
               <div class="pricing-left">
                   <img src="<?=$obrazek['url'];?>" alt="" class="pricing-image">
               </div>
               <div class="pricing-right">
                   <div class="pricing-edytor"><?=$edytor_pricing;?></div>
               </div>
           </div>
       </div>
   </div>
</section>