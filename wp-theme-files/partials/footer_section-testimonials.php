<?php
/**
 * ACF flexible content field
 * used in footer.php
 */
?>

<?php
  $testimonials = get_field('testimonials', 'option');
  if($testimonials): ?>
    <section id="testimonials">
      <div class="container">
        <h2 class="cursive"><?php echo esc_html('Testimonials', 'robinsonplumbing'); ?></h2>
        <div id="testimonials-carousel" class="carousel slide carousel-heights" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php $i = 0; foreach($testimonials as $testimonial): ?>
              <li data-target="#testimonials-carousel" data-slide-to="<?php echo $i; ?>"<?php if($i == 0){ echo ' class="active"'; } ?>></li>
            <?php $i++; endforeach; reset($testimonials); ?>
          </ol>

          <div class="carousel-inner">
            <?php $t = 0; foreach($testimonials as $testimonial): ?>
              <div class="carousel-item<?php if($t == 0){ echo ' active'; } ?>">
                <?php echo wp_kses_post($testimonial['testimonial']); ?>
                <span class="testimonial-author">- <?php echo esc_html($testimonial['testimonial_author']); ?></span>
              </div>
            <?php $t++; endforeach; ?>
          </div>
        </div>
      </div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/speech-bubble-full-width.png" class="speech-bubble" alt="" />
    </section>
<?php endif; ?>