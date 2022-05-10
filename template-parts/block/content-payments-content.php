<?php

/**
 * Block Name: Payments
 */
$id = '' . $block['id'];

$see_details = get_field('see_details');
$upgrade = get_field('upgrade');
$start_my_free_trial = get_field('start_my_free_trial');
$monthly_label = get_field('monthly_label');
$lifetime_label = get_field('lifetime_label');

?>
<div class="payments-content">
  <div class="container">
    <div class="payments-content-nav">
      <div class="payments-content-nav__item">
        <a class="active" data-type="monthly" href="javascript:void(0)"><?php echo $monthly_label; ?></a>
      </div>
      <div class="payments-content-nav__item">
        <a data-type="life" href="javascript:void(0)"><?php echo $lifetime_label; ?></a>
      </div>
      <svg class="desktop" width="103" height="113" viewBox="0 0 103 113" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M77.5815 51.6552C92.3198 33.8283 97.6055 16.4885 99.5108 0.81897L102.489 1.18109C100.528 17.3073 95.0637 35.2175 79.8936 53.5667C65.1618 71.3857 41.3455 89.5363 2.89747 106.903L1.71643 104.145C39.8564 86.9101 63.2328 69.0107 77.5815 51.6552Z" fill="#006DFF"></path>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.8372 86.5384C9.64441 86.7247 10.1478 87.5301 9.96149 88.3373C8.75854 93.5501 6.49962 98.7939 4.72213 102.92C4.22999 104.062 3.77475 105.119 3.38905 106.066C3.07648 106.833 2.20116 107.202 1.43396 106.889C0.666762 106.577 0.298206 105.701 0.610769 104.934C1.03509 103.893 1.51941 102.767 2.03194 101.576C3.79982 97.4686 5.90338 92.5808 7.03832 87.6627C7.2246 86.8555 8.02998 86.3522 8.8372 86.5384Z" fill="#006DFF"></path>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.499878 106C0.499878 105.172 1.17145 104.5 1.99988 104.5C4.03798 104.5 7.12672 105.336 9.91548 106.413C12.689 107.485 15.5724 108.951 17.0605 110.439C17.6463 111.025 17.6463 111.975 17.0605 112.561C16.4748 113.146 15.525 113.146 14.9392 112.561C13.9274 111.549 11.5608 110.265 8.83428 109.212C6.12303 108.164 3.46178 107.5 1.99988 107.5C1.17145 107.5 0.499878 106.828 0.499878 106Z" fill="#006DFF"></path>
      </svg>
      <svg class="mobile" width="88" height="97" viewBox="0 0 88 97" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M52.2888 68.7193C52.5405 67.93 53.3844 67.4942 54.1737 67.746C59.2705 69.3715 64.3118 72.052 68.2787 74.1612C69.377 74.7451 70.393 75.2853 71.305 75.7472C72.044 76.1215 72.3397 77.0241 71.9654 77.7631C71.5911 78.5022 70.6886 78.7979 69.9495 78.4236C68.9462 77.9154 67.8643 77.3406 66.7194 76.7324C62.77 74.6342 58.0708 72.1377 53.2621 70.6041C52.4729 70.3524 52.0371 69.5085 52.2888 68.7193Z" fill="#006DFF"></path>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M71.0025 78.6214C70.1769 78.5536 69.5625 77.8293 69.6303 77.0036C69.7971 74.9724 70.8829 71.9624 72.185 69.2712C73.48 66.5946 75.1773 63.8409 76.7823 62.4795C77.414 61.9437 78.3606 62.0214 78.8965 62.6531C79.4323 63.2849 79.3546 64.2315 78.7229 64.7674C77.6316 65.693 76.1585 67.9466 74.8855 70.5777C73.6196 73.1942 72.7399 75.7921 72.6203 77.2491C72.5525 78.0748 71.8282 78.6891 71.0025 78.6214Z" fill="#006DFF"></path>
        <path d="M70.2157 74.3908C58.6878 44.5521 26.733 22.8092 2.48792 27.2293" stroke="#006DFF" stroke-width="3" stroke-linecap="round"></path>
      </svg>
    </div>
    <div class="payments-content-items payments-monthly">
      <?php
        $i = 0;
        while(have_rows('monthly-payment-options')) : the_row(); $i++;
      ?>
        <div class="payments-content-item <?php echo ($i == 2 ? 'border' : ''); ?>">
          <div class="payments-content-item__card">
            <h3><?php the_sub_field('title'); ?></h3>
            <div class="payments-content-item__card-text">
              <p><?php the_sub_field('subtitle'); ?></p>
            </div>
            <div class="payments-content-item__card-cost cc-desktop">
              <div class="price"><?php the_sub_field('price'); ?></div><!--10 <span>€ / month</span>-->
            </div>
            <div class="login_class payments-content-item__card-link this">
              <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo home_url(); ?>/membership-account/membership-checkout/?level=<?php the_sub_field('level'); ?>" 
                  class="pmpro_btn"><?php echo $upgrade; ?></a>
              <?php else: ?>
                <a href="<?php echo home_url(); ?>/wp-login.php" class="pmpro_btn"><?php echo $start_my_free_trial; ?></a>
              <?php endif; ?>
            </div>
            <div class="payments-content-item__card-cost cc-mobile">
              <div class="price"><?php the_sub_field('price'); ?></div><!--10 <span>€ / month</span>-->
            </div>
          </div>
          <div class="payments-content-item__link">
            <button><?php echo $see_details; ?> <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.65686 7.65686L4.24265 6.24265L9.8995 0.585792L11.3137 2.00001L5.65686 7.65686Z" fill="#212121"></path>
                <path d="M5.65686 7.65686L5.72205e-06 2.00001L1.41422 0.585793L7.07107 6.24265L5.65686 7.65686Z" fill="#212121"></path>
              </svg>
            </button>
          </div>
          <div class="payments-content-item__list">
            <ul>
              <?php
                while(have_rows('list')) {
                  the_row();
                  echo '<li>'.get_sub_field('text').'</li>';
                }
              ?>
            </ul>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

    <div style="display:none" class="payments-content-items payments-life ">
      <?php
        $i = 0;
        while(have_rows('lifetime-payment-options')) : the_row(); $i++;
      ?>
        <div class="payments-content-item <?php echo ($i == 2 ? 'border' : ''); ?>">
          <div class="payments-content-item__card">
            <h3><?php the_sub_field('title'); ?></h3>
            <div class="payments-content-item__card-text">
              <p><?php the_sub_field('subtitle'); ?></p>
            </div>
            <div class="payments-content-item__card-cost cc-desktop">
              <div class="price"><?php the_sub_field('price'); ?></div>
              <div class="text">
                <p><?php the_sub_field('price_text'); ?></p>
              </div>
            </div>
            <div class="login_class payments-content-item__card-link this">
              <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo home_url(); ?>/membership-account/membership-checkout/?level=<?php the_sub_field('level'); ?>" 
                  class="pmpro_btn"><?php echo $upgrade; ?></a>
              <?php else: ?>
                <a href="<?php echo home_url(); ?>/wp-login.php" class="pmpro_btn"><?php echo $start_my_free_trial; ?></a>
              <?php endif; ?>
            </div>
            <div class="payments-content-item__card-cost cc-mobile">
              <div class="price"><?php the_sub_field('price'); ?></div>
              <div class="text">
                <p><?php the_sub_field('price_text'); ?></p>
              </div>
            </div>
          </div>
          <div class="payments-content-item__link">
            <button><?php echo $see_details; ?> <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.65686 7.65686L4.24265 6.24265L9.8995 0.585792L11.3137 2.00001L5.65686 7.65686Z" fill="#212121"></path>
                <path d="M5.65686 7.65686L5.72205e-06 2.00001L1.41422 0.585793L7.07107 6.24265L5.65686 7.65686Z" fill="#212121"></path>
              </svg>
            </button>
          </div>
          <div class="payments-content-item__list">
            <ul>
              <?php
                while(have_rows('list')) {
                  the_row();
                  echo '<li>'.get_sub_field('text').'</li>';
                }
              ?>
            </ul>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

  </div>
</div>