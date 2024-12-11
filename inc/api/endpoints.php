<?php

/**
 * Custom REST API endpoints
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Register custom REST API endpoints
 */
function wp_starter_headless_register_endpoints()
{
  // Register posts endpoint
  register_rest_route('wp-headless/v1', '/posts', array(
    'methods' => 'GET',
    'callback' => 'wp_starter_headless_get_posts',
    'permission_callback' => '__return_true'
  ));

  // Register pages endpoint
  register_rest_route('wp-headless/v1', '/pages', array(
    'methods' => 'GET',
    'callback' => 'wp_starter_headless_get_pages',
    'permission_callback' => '__return_true'
  ));

  // Register menus endpoint
  register_rest_route('wp-headless/v1', '/menus', array(
    'methods' => 'GET',
    'callback' => 'wp_starter_headless_get_menus',
    'permission_callback' => '__return_true'
  ));
}
add_action('rest_api_init', 'wp_starter_headless_register_endpoints');

/**
 * Get posts with custom fields
 */
function wp_starter_headless_get_posts($request)
{
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'post_status' => 'publish'
  );

  $posts = get_posts($args);
  $data = array();

  foreach ($posts as $post) {
    $data[] = array(
      'id' => $post->ID,
      'title' => $post->post_title,
      'content' => $post->post_content,
      'slug' => $post->post_name,
      'featured_image' => get_the_post_thumbnail_url($post->ID, 'full'),
      'excerpt' => $post->post_excerpt,
      'date' => $post->post_date
    );
  }

  return rest_ensure_response($data);
}

/**
 * Get pages with custom fields
 */
function wp_starter_headless_get_pages($request)
{
  $args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'post_status' => 'publish'
  );

  $pages = get_posts($args);
  $data = array();

  foreach ($pages as $page) {
    $data[] = array(
      'id' => $page->ID,
      'title' => $page->post_title,
      'content' => $page->post_content,
      'slug' => $page->post_name,
      'featured_image' => get_the_post_thumbnail_url($page->ID, 'full')
    );
  }

  return rest_ensure_response($data);
}

/**
 * Get menus
 */
function wp_starter_headless_get_menus($request)
{
  $menus = get_terms('nav_menu', array('hide_empty' => true));
  $data = array();

  foreach ($menus as $menu) {
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $data[$menu->slug] = array(
      'id' => $menu->term_id,
      'name' => $menu->name,
      'items' => $menu_items
    );
  }

  return rest_ensure_response($data);
}
