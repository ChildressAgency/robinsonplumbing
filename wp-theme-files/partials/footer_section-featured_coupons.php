<?php
/**
 * ACF flexible content field
 * used in footer.php
 */
?>

<?php
  $coupons_page = get_page_by_path('coupons');
  $coupons_page_id = $coupons_page->ID;

  if(have_rows('coupons', $coupons_page_id)): ?>
    <section id="hp-coupons">
      <div class="container">
        <div class="section-intro">
          <?php echo wp_kses_post(get_field('coupons_section_intro', 'option')); ?>
        </div>

        <div class="coupons d-flex flex-wrap justify-content-around align-items-stretch">
          <?php while(have_rows('coupons', $coupons_page_id)): the_row(); ?>

            <?php
              if(get_sub_field('featured_coupon')){
                get_template_part('partials/loop_item', 'coupon'); 
              }
            ?>

          <?php endwhile; ?>
        </div>
      </div>
    </section>
<?php endif; ?>