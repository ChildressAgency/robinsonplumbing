<?php get_header(); ?>

<?php get_template_part('partials/content', 'main_section'); ?>

<?php
  $services = new WP_Query(array(
    'post_type' => 'services',
    'post_status' => 'publish', 
    'posts_per_page' => -1
  ));

  if($services->have_posts()): ?>

    <section id="services-loop">
      <div class="container">
        <h2 class="text-center"><?php echo esc_html__('OUR SERVICES', 'robinsonplumbing'); ?></h2>
        <div class="services d-flex flex-wrap justify-content-center">
          <?php while($services->have_posts()): $services->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="service"><?php the_title(); ?></a>
          <?php endwhile; ?>
        </div>
      </div>
    </section>

<?php endif; wp_reset_postdata(); ?>

<?php get_footer();