<?php
/**
 * ACF flexible field
 * used in footer.php
 */
?>

<?php
  $services = new WP_Query(array(
    'post_type' => 'services',
    'post_status' => 'publish',
    'posts_per_page' => -1
  ));

  if($services->have_posts()): ?>
    <section id="hp-services">
      <div class="container">
        <h2><?php echo esc_html__('Plumbing Services Include', 'robinsonplumbing'); ?></h2>
        <ul class="droplets">
          <?php while($services->have_posts()): $services->the_post(); ?>
            <li><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        <p class="text-center">
          <a href="<?php echo esc_url(home_url('services')); ?>" class="btn-main"><?php echo esc_html__('Services', 'robinsonplumbing'); ?></a>
        </p>
      </div>
    </section>
<?php endif; ?>