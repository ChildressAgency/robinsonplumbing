<?php
/**
 * ACF flexible content field
 * used in footer.php
 */
?>

<?php if(have_rows('services_areas', 'option')): ?>
  <section id="service-areas" class="gradient-background">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/virginia.png" class="virginia d-none d-md-block" alt="Virginia" />
    <div class="container">
      <div class="row">
        <div class="col-md-6 marker-side d-none d-md-block">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/map-pin.png" class="" alt="" />
        </div>
        <div class="col-md-6">
          <h4><?php echo esc_html__('Proudly Serving:', 'robinsonplumbing'); ?></h4>
          <ul class="list-inline">
            <?php while(have_rows('service_areas', 'option')): the_row(); ?>
              <li><?php echo esc_html(get_sub_field('service_area')); ?></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>