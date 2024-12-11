<?php

/**
 * Search endpoint
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

function wp_starter_headless_register_search_endpoint()
{
  register_rest_route('wp-headless/v1', '/search', array(
    'methods' => 'GET',
    'callback' => 'wp_starter_headless_search',
    'permission_callback' => '__return_true'
  ));
}
add_action('rest_api_init', 'wp_starter_headless_register_search_endpoint');

function wp_starter_headless_search($request)
{
  $query = sanitize_text_field($request->get_param('query'));
  $args = array(
    's' => $query,
    'post_type' => 'any',
    'post_status' => 'publish',
    'posts_per_page' => 10
  );

  $search_results = new WP_Query($args);
  $data = array();

  if ($search_results->have_posts()) {
    while ($search_results->have_posts()) {
      $search_results->the_post();
      $data[] = array(
        'id' => get_the_ID(),
        'title' => get_the_title(),
        'excerpt' => get_the_excerpt(),
        'url' => get_permalink()
      );
    }
  }

  wp_reset_postdata();
  return rest_ensure_response($data);
}
