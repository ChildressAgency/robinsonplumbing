<?php
/**
 * ACF flexible content field
 * used in footer.php
 */
?>

<?php
  $coupons_page = get_page_by_path('coupons');
  $coupons_page_id = $coupons_page->ID;

  if(have_rows('coupons', $coupons_page_id)): ?>
    <section id="hp-coupons">
      <div class="container">
        <div class="section-intro">
          <?php echo wp_kses_post(get_field('coupons_section_intro')); ?>
        </div>

        <div class="coupons d-flex flex-wrap justify-content-around align-items-stretch">
          <?php while(have_rows('coupons', $coupons_page_id)): the_row(); ?>
            <?php
              $coupon_img_url = get_stylesheet_directory_uri() . '/images/plumber-fixing-water-heater.jpg';
              if(get_sub_field('coupon_image')){
                $coupon_img = get_sub_field('coupon_image');
                $coupon_img_url = $coupon_img['url'];
              }
            ?>
            <a href="#" class="coupon" style="background-image:url(<?php echo esc_url($coupon_img_url); ?>);">
              <div class="coupon-body d-flex flex-column justify-content-center">
                <h4><?php echo esc_html(get_sub_field('coupon_title')); ?></h4>
                <span class="coupon-price"><?php echo esc_html(get_sub_field('coupon_value')); ?></span>
                <p><?php echo wp_kses_post(get_sub_field('coupon_description')); ?></p>
              </div>
                <div class="light-overlay d-print-none"></div>
              <div class="coupon-footer">
                <p><?php echo esc_html__('Get Coupon', 'robinsonplumbing'); ?></p>
              </div>
              <div class="coupon-print-footer">
                <p>Robinson Plumbing - <?php echo esc_html(get_sub_field('coupon_location')); ?><br /><?php echo esc_html(get_sub_field('coupon_location_phone_number')); ?></p>
              </div>
            </a>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
<?php endif; ?>