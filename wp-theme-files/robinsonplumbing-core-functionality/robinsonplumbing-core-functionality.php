<?php
/**
 * Plugin Name: robinsonplumbinginc.com Core Functionality
 * Description: This contains all your site's core functionality so that it is theme independent. <strong>It should always be activated.</strong>
 * Author: The Childress Agency
 * Author URI: https://childressagency.com
 * Version: 1.0
 * Text Domain: robinsonplumbing
 */
if(!defined('ABSPATH')){ exit; }

define('ROBINSONPLUMBING_PLUGIN_DIR', dirname(__FILE__));
define('ROBINSONPLUMBING_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Load ACF if not already loaded
 */
if(!class_exists('acf')){
  require_once ROBINSONPLUMBING_PLUGIN_DIR . '/vendors/advanced-custom-fields-pro/acf.php';
  add_filter('acf/settings/path', 'robinsonplumbing_acf_settings_path');
  add_filter('acf/settings/dir', 'robinsonplumbing_acf_settings_dir');
}

function robinsonplumbing_acf_settings_path($path){
  $path = plugin_dir_path(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $path;
}

function robinsonplumbing_acf_settings_dir($dir){
  $dir = plugin_dir_url(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $dir;
}

add_action('plugins_loaded', 'robinsonplumbing_load_textdomain');
function robinsonplumbing_load_textdomain(){
  load_plugin_textdomain('robinsonplumbing', false, basename(ROBINSONPLUMBING_PLUGIN_DIR) . '/languages');
}

require_once ROBINSONPLUMBING_PLUGIN_DIR . '/includes/robinsonplumbing-create-post-types.php';
add_action('init', 'robinsonplumbing_create_post_types');

add_action('acf/init', 'robinsonplumbing_acf_options_page');
function robinsonplumbing_acf_options_page(){
  acf_add_options_page(array(
    'page_title' => esc_html__('General Settings', 'robinsonplumbing'),
    'menu_title' => esc_html__('General Settings', 'robinsonplumbing'),
    'menu_slug' => 'general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));

  acf_add_options_page(array(
    'page_title' => esc_html__('Footer Sections Settings', 'robinsonplumbing'),
    'menu_title' => esc_html__('Footer Sections Settings', 'robinsonplumbing'),
    'menu_slug' => 'footer-sections-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}

add_filter('block_categories', 'robinsonplumbing_custom_block_category', 10, 2);
function robinsonplumbing_custom_block_category($categories, $post){
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'custom-blocks',
        'title' => esc_html__('Custom Blocks', 'robinsonplumbing'),
        'icon' => 'wordpress'
      )
    )
  );
}

add_action('acf/init', 'robinsonplumbing_register_blocks');
function robinsonplumbing_register_blocks(){
  if(function_exists('acf_register_block_type')){
    acf_register_block_type(array(
      'name' => 'image_carousel',
      'title' => esc_html__('Image Carousel', 'robinsonplumbing'),
      'description' => esc_html__('An image carousel for the Services pages.'),
      'post_types' => array('services'),
      'category' => 'custom-blocks',
      'mode' => 'edit',
      'align' => 'full',
      'render_template' => ROBINSONPLUMBING_PLUGIN_DIR . '/blocks/image_carousel.php',
      'enqueue_style' => ROBINSONPLUMBING_PLUGIN_DIR . '/blocks/image_carousel.css'
    ));

    acf_register_block_type(array(
      'name' => 'skewed_image',
      'title' => esc_html__('Skewed Image', 'robinsonplumbing'),
      'description' => esc_html__('Show skewed image with shadow', 'robinsonplumbing'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => ROBINSONPLUMBING_PLUGIN_DIR . '/blocks/skewed_image.php',
      'enqueue_style' => ROBINSONPLUMBING_PLUGIN_DIR . '/blocks/skewed_image.css'
    ));

    acf_register_block_type(array(
      'name' => 'main_button',
      'title' => esc_html__('Main Button Style', 'robinsonplumbing'),
      'description' => esc_html__('Button with Main Styling', 'robinsonplumbing'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => ROBINSONPLUMBING_PLUGIN_DIR . '/blocks/main_button.php',
      'enqueue_style' => ROBINSONPLUMBING_PLUGIN_DIR . '/blocks/main_button.css'
    ));
  }
}