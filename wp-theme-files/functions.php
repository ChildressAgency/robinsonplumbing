<?php
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'robinsonplumbing_scripts');
function robinsonplumbing_scripts(){
  wp_register_script(
    'bootstrap-popper',
    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'bootstrap-scripts',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
    array('jquery', 'bootstrap-popper'),
    '',
    true
  );

  wp_register_script(
    'robinsonplumbing-scripts',
    get_stylesheet_directory_uri() . '/js/custom-scripts.min.js',
    array('jquery', 'bootstrap-scripts'),
    '',
    true
  );

  wp_enqueue_script('bootstrap-popper');
  wp_enqueue_script('bootstrap-scripts');
  wp_enqueue_script('robinsonplumbing-scripts');
}

add_filter('script_loader_tag', 'robinsonplumbing_add_script_meta', 10, 2);
function robinsonplumbing_add_script_meta($tag, $handle){
  switch($handle){
    case 'jquery':
      $tag = str_replace('></script>', ' integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-popper':
      $tag = str_replace('></script>', ' integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-scripts':
      $tag = str_replace('></script>', ' integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>', $tag);
      break;
  }

  return $tag;
}

add_action('wp_enqueue_scripts', 'robinsonplumbing_styles');
function robinsonplumbing_styles(){
  wp_register_style(
    'google-fonts',
    'https://fonts.googleapis.com/css?family=Courgette|Montserrat:400,700,900|Oswald:400,700&display=swap'
  );

  wp_register_style(
    'fontawesome',
    'https://use.fontawesome.com/releases/v5.6.3/css/all.css'
  );

  wp_register_style(
    'robinsonplumbing-css',
    get_stylesheet_directory_uri() . '/style.css'
  );

  wp_enqueue_style('google-fonts');
  wp_enqueue_style('fontawesome');
  wp_enqueue_style('robinsonplumbing-css');
}

add_filter('style_loader_tag', 'robinsonplumbing_add_css_meta', 10, 2);
function robinsonplumbing_add_css_meta($link, $handle){
  switch($handle){
    case 'fontawesome':
      $link = str_replace('/>', ' integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">', $link);
      break;
  }

  return $link;
}

add_action('after_setup_theme', 'robinsonplumbing_setup');
function robinsonplumbing_setup(){
  add_theme_support('post-thumbnails');
  //set_post_thumbnail_size(320, 320);

  register_nav_menus(array(
    'header-nav' => 'Header Navigation',
    'footer-nav' => 'Footer Navigation',
  ));

  load_theme_textdomain('robinsonplumbing', get_stylesheet_directory_uri() . '/languages');
}

require_once dirname(__FILE__) . '/includes/class-wp-bootstrap-navwalker.php';

function robinsonplumbing_header_fallback_menu(){ ?>
  <div id="navbar" class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item<?php if(is_page('about-us')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('about-us')); ?>" class="nav-link"><?php echo esc_html__('About Us', 'robinsonplumbing'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('coupons')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('coupons')); ?>" class="nav-link"><?php echo esc_html__('Specials and Discounts', 'robinsonplumbing'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('our-services')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('our-services')); ?>" class="nav-link"><?php echo esc_html__('Our Services', 'robinsonplumbing'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('contact-us')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('contact-us')); ?>" class="nav-link"><?php echo esc_html__('Contact Us', 'robinsonplumbing'); ?></a>
      </li>
    </ul>
  </div>
<?php }

function robinsonplumbing_footer_fallback_menu(){ ?>
  <ul id="footer-nav">
    <li><a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html__('Home', 'robinsonplumbing'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('about-us')); ?>"><?php echo esc_html__('About Us', 'robinsonplumbing'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('coupons')); ?>"><?php echo esc_html__('Specials & Discounts', 'robinsonplumbing'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('our-services')); ?>"><?php echo esc_html__('Our Services', 'robinsonplumbing'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('contact-us')); ?>"><?php echo esc_html__('Contact Us', 'robinsonplumbing'); ?></a></li>
  </ul>
<?php }