<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <?php wp_head(); ?>
  <title><?php echo esc_html(bloginfo('name')); ?></title>
</head>

<body <?php body_class(); ?>>
  <header id="header">
    <div id="masthead">
      <div class="container d-none d-lg-flex justify-content-center">
        <?php if(have_rows('phone_numbers', 'option')): ?>
          <div class="contacts-container d-flex">
            <?php while(have_rows('phone_numbers', 'option')): the_row(); ?>
              <p class="phone">
                <?php the_sub_field('location'); ?>
                <a href="tel:<?php the_sub_field('phone_number'); ?>"><?php the_sub_field('phone_number'); ?></a>
              </p>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
        <p class="quote-review align-self-center ml-auto">
          <a href="<?php echo esc_url(home_url('contact-us')); ?>"><?php echo esc_html__('Get a Quote', 'robinsonplumbing'); ?></a>&nbsp;|&nbsp;<a href="<?php echo esc_url(get_field('review_link', 'option')); ?>"><?php echo esc_html__('Leave a Review', 'robinsonplumbing'); ?></a>
        </p>
      </div>
    </div>

    <nav id="header-nav" class="navbar navbar-light navbar-expand-lg">
      <div class="container">
        <a href="<?php echo esc_url(home_url()); ?>" class="navbar-brand" aria-label="<?php echo esc_attr(bloginfo('name')); ?>">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.jpg" class="img-fluid" alt="<?php echo esc_attr(bloginfo('name')); ?>" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle Navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <?php 
          $header_nav_args = array(
            'theme_location' => 'header-nav',
            'menu' => '',
            'container' => 'div',
            'container_id' => 'navbar',
            'container_class' => 'collapse navbar-collapse',
            'menu_id' => '',
            'menu_class' => 'navbar-nav ml-auto',
            'echo' => true,
            'fallback_cb' => 'robinsonplumbing_header_fallback_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new WP_Bootstrap_NavWalker()
          );
          wo_nav_menu($header_nav_args);
        ?>
        
      </div>
    </nav>
  </header>
