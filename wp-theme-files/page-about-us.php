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

<?php get_template_part('partials/footer_section', 'callnow_button'); ?>

<?php
  $family_section_content = get_field('family_section_content');
  if($family_section_content): ?>
    <section id="family">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <?php echo wp_kses_post($family_section_content); ?>
          </div>
          <div class="col-md-6">
            <?php $family_section_img = get_field('family_section_image'); ?>
            <img src="<?php echo esc_url($family_section_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($family_section_img['alt']); ?>" />
          </div>
        </div>
      </div>
    </section>

<?php get_footer();