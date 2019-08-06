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

<?php if(have_rows('phone_numbers', 'option')): ?>
  <section id="phone-numbers">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-around">
        <?php while(have_rows('phone_numbers', 'option')): the_row(); ?>
          <a href="tel:<?php the_sub_field('phone_number'); ?>" class="phone-location"><span><?php the_sub_field('location'); ?></span><?php the_sub_field('phone_number'); ?></a>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<section id="contact-form">
  <div class="container">
    <div class="contact-form">
      <h2><?php echo esc_html__('GET A QUOTE', 'robinsonplumbing'); ?></h2>
      <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
    </div>
  </div>
</section>

<?php get_footer();