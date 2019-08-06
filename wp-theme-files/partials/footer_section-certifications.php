<?php
/**
 * ACF flexible content
 * used in footer.php
 */
?>

<?php if(have_rows('certifications', 'option')): ?>
  <section id="certifications">
    <div class="container">
      <h2><?php echo esc_html__('Certifications', 'robinsonplumbing'); ?></h2>
      <div class="row">
        <?php $i = 0; while(have_rows('certifications', 'option')): the_row(); ?>
          <?php if($i % 2 == 0){ echo '<div class="clearfix"></div>'; } ?>

            <div class="col-md-6">
              <div class="cert-card">
                <div class="cert-img">
                  <div class="img-skewed-small">
                    <?php $certification_image = get_sub_field('certification_image'); ?>
                    <img src="<?php echo esc_url($certification_image['url']); ?>" class="" alt="<?php echo esc_attr($certification_image['alt']); ?>" />
                  </div>
                </div>
                <h3><?php echo esc_html(get_sub_field('certification')); ?></h3>
                <?php echo wp_kses_post(get_sub_field('certification_description')); ?>
              </div>
            </div>
        
        <?php $i++; endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>