<?php get_header(); ?>
  <?php 
    $hero_img = get_field('hero_background_image');
    $hero_img_url = $hero_img['url'];
  ?>
  <section id="hero" class="hp-hero d-flex align-items-center" style="background-image:url(<?php echo esc_url($hero_img_url); ?>); <?php echo esc_attr(get_field('hero_background_image_css')); ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="hero-caption">
            <h1><?php echo esc_html(get_field('hero_section_title')); ?></h1>
            <p class="cursive"><?php echo esc_html(get_field('hero_section_subtitle')); ?></p>
            <p><?php echo esc_html(get_field('hero_section_caption')); ?></p>
            <?php
              $hero_button = get_field('hero_section_button');
              if($hero_button): ?>
                <a href="<?php echo esc_url($hero_button['url']); ?>" class="btn-main btn-alt mt-4"><?php echo esc_html($hero_button['title']); ?></a>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-7 d-flex justify-content-center align-items-center">
          <?php $main_phone = get_field('main_phone_number', 'option'); ?>
          <a href="tel:<?php echo esc_url($main_phone); ?>" class="btn-callnow"><span><?php echo esc_html__('Call Now', 'robinsonplumbing'); ?></span><?php echo esc_html($main_phone); ?></a>
        </div>
      </div>
    </div>
    <div class="gradient-overlay"></div>
  </section>

  <?php get_template_part('partials/content', 'main_section'); ?>
<?php get_footer();