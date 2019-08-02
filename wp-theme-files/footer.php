<?php
  if(have_rows('footer_sections')){
    while(have_rows('footer_sections')){
      the_row();

      $section_type = get_row_layout();

      switch($section_type){
        case 'service_areas':
          get_template_part('partials/footer_section', 'service_areas');
          break;

        case 'certifications':
          get_template_part('partials/footer_section', 'certifications');
          break;

        case 'services_list':
          get_template_part('partials/footer_section', 'services_list');
          break;

        case 'featured_coupons':
          get_template_part('partials/footer_section', 'featured_coupons');
          break;

        case 'testimonials':
          get_template_part('partials/footer_section', 'testimonials');
          break;
      }
    }
  }
?>
  </main>

  <footer id="footer">
    <div id="footer-upper">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h4><?php echo esc_html__('BROWSE OUR WEBSITE', 'robinsonplumbing'); ?></h4>
            <?php
              $footer_nav_args = array(
                'theme_location' => 'footer-nav',
                'menu' => '',
                'container' => '',
                'menu_id' => 'footer-nav',
                'menu_class' => '',
                'echo' => true,
                'fallback_cb' => 'robinsonplumbing_footer_fallback_menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 1
              );
              wp_nav_menu($footer_nav_args);
            ?>
          </div>
          <div class="col-md-4">
            <h4><?php echo esc_html__('CONTACT INFORMATION', 'robinsonplumbing'); ?></h4>
            <p><?php echo esc_html(bloginfo('name')); ?><br /><?php echo esc_html__('Phone:', 'robinsonplumbing'); ?> <?php echo esc_html(get_field('main_phone_number', 'option')); ?></p>
            <h4><?php echo esc_html__('HOURS OF OPERATION', 'robinsonplumbing'); ?></h4>
            <?php echo wp_kses_post(get_field('hours_of_operation', 'option')); ?>
          </div>
          <div class="col-md-4">
            <h4><?php echo esc_html__('STAY CONNECTED', 'robinsonplumbing'); ?></h4>
            <div class="social">
              <?php
                $facebook = get_field('facebook', 'option');
                $twitter = get_field('twitter', 'option');
                $instagram = get_field('instagram', 'option');

                if($facebook): ?>
                  <a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fab fa-facebook"></i><span class="sr-only">Facebook</span></a>
              <?php endif; if($twitter): ?>
                <a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>
              <?php endif; if($instagram): ?>
                <a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fab fa-instagram"></i><span class="sr-only">Instagram</span></a>
              <?php endif; ?>
            </div>
            <h4 class="mt-4"><?php echo esc_html__('For Emergencies Call', 'robinsonplumbing'); ?></h4>
            <p class="emergency-phone"><?php echo esc_html(get_field('emergency_phone', 'option')); ?></p>
          </div>
        </div>
      </div>
    </div>
    <div id="colophon">
      <p>&copy; <?php echo esc_html(bloginfo('name')); ?></p>
      <?php 
        $copyright_statement = get_field('copyright_statement', 'option'); 
        if($copyright_statement){
          echo wp_kses_post($copyright_statement);
        }
      ?>
      <p><a href="<?php echo esc_url(home_url('terms-of-use')); ?>"><?php echo esc_html__('Terms of Use', 'robinsonplumbing'); ?></a>&nbsp;|&nbsp;<a href="<?php echo esc_url(home_url('privacy-policy')); ?>"><?php echo esc_html__('Privacy Policy', 'robinsonplumbing'); ?></a></p>
      <p>Website created by <a href="https://childressagency.com" target="_blank">The Childress Agency</a></p>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>