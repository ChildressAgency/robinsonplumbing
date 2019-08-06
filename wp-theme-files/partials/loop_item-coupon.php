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