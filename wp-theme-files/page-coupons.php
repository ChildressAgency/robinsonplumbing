<?php get_header(); ?>

<?php get_template_part('partials/content', 'main_section'); ?>

<?php if(have_rows($coupons)): ?>
  <section id="coupons">
    <div class="container">
      <div class="coupons d-flex flex-wrap justify-content-around align-items-stretch">
        <?php while(have_rows($coupons)): the_row(); ?>

          <?php get_template_part('partials/loop_item', 'coupon'); ?>
          
        <?php endwhile; ?>
  
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer();