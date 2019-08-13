<?php
/**
 * Create post types
 */
if(!defined('ABSPATH')){ exit; }

function robinsonplumbing_create_post_types(){
  $services_labels = array(
    'name' => esc_html_X('Services', 'post type name', 'robinsonplumbing'),
    'singular_name' => esc_html_x('Service', 'post type singular name', 'robinsonplumbing'),
    'menu_name' => esc_html_x('Services', 'post type menu name', 'robinsonplumbing'),
    'add_new_item' => esc_html__('Add New Service', 'robinsonplumbing'),
    'search_items' => esc_html__('Search Services', 'robinsonplumbing'),
    'edit_item' => esc_html__('Edit Service', 'robinsonplumbing'),
    'view_item' => esc_html__('View Service', 'robinsonplumbing'),
    'all_items' => esc_html__('All Services', 'robinsonplumbing'),
    'new_item' => esc_html__('New Service', 'robinsonplumbing'),
    'not_found' => esc_html__('No Services Found', 'robinsonplumbing')
  );
  $services_args = array(
    'labels' => $services_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-hammer',
    'query_var' => 'services',
    'has_archive' => false,
    'show_in_rest' => true,
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
      'custom-fields',
      'revisions'
    )
    );
    register_post_type('services', $services_args);
}