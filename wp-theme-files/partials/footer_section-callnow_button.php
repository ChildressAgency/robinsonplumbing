<?php
/**
 * ACF flexible content
 * used in footer.php and about-us.php
 */
?>

<?php
  $callnow_button_section_title = get_field('callnow_button_section_title', 'option');
  if($callnow_button_section_title): ?>
    <section id="btn-callnow-section" class="gradient-background">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="cursive"><?php echo esc_html($callnow_button_section_title); ?></h2>
            <p class="mt-4"><strong><?php echo esc_html(get_field('callnow_button_section_subtitle')); ?></strong></p>
          </div>
          <div class="col-md-6 d-flex justify-content-center align-items-center">
            <a href="tel:<?php echo esc_url(get_field('main_phone_number')); ?>" class="btn-callnow"><span><?php echo esc_html__('Call Now', 'robinsonplumbing'); ?></span><?php echo esc_html(get_field('main_phone_number')); ?></a>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>