<?php get_header(); ?>
<main id="main">
  <div class="container">
    <article class="entry-content">
      <?php 
        if(have_posts()){
          while(have_posts()){
            the_post();
            the_content();
          }
        }
      ?>
    </article>
  </div>
</main>

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