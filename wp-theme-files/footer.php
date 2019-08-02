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
            <h4>BROWSE OUR WEBSITE</h4>
            <ul id="footer-nav">
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Specials & Discounts</a></li>
              <li><a href="#">Our Services</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4>CONTACT INFORMATION</h4>
            <p>Robinson Plumbing<br />Phone: 540-972-9952</p>
            <h4>HOURS OF OPERATION</h4>
            <p>Mon - Fri: 9:00 am - 5:00pm<br />Sat - Sun: Appointment Only</p>
          </div>
          <div class="col-md-4">
            <h4>STAY CONNECTED</h4>
            <div class="social">
              <a href="#" target="_blank"><i class="fab fa-facebook"></i><span class="sr-only">Facebook</span></a>
              <a href="#" target="_blank"><i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>
              <a href="#" target="_blank"><i class="fab fa-instagram"></i><span class="sr-only">Instagram</span></a>
            </div>
            <h4 class="mt-4">For Emergencies Call</h4>
            <p class="emergency-phone">540-972-9952</p>
          </div>
        </div>
      </div>
    </div>
    <div id="colophon">
      <p>&copy; Robinson Plumbing</p>
      <p>Content, including images, displayed on this website is protected by copyright laws. Downloading, republication, retransmission or reproduction of content on this website is strictly prohibited.</p>
      <p><a href="#">Terms of Use</a>&nbsp;|&nbsp;<a href="#">Privacy Policy</a></p>
      <p>Website created by <a href="https://childressagency.com" target="_blank">The Childress Agency</a></p>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>