<?php

/**
 * API Cache functionality
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Cache API responses
 */
function wp_starter_headless_cache_api_response($response, $handler, $request)
{
  if (strpos($request->get_route(), 'wp-headless/v1') === false) {
    return $response;
  }

  $cache_key = 'wp_headless_' . md5($request->get_route() . serialize($request->get_params()));
  $cache_time = 5 * MINUTE_IN_SECONDS;

  set_transient($cache_key, $response, $cache_time);

  return $response;
}
add_filter('rest_pre_dispatch', 'wp_starter_headless_cache_api_response', 10, 3);

/**
 * Clear API cache on post update
 */
function wp_starter_headless_clear_api_cache($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  delete_transient('wp_headless_posts');
  delete_transient('wp_headless_pages');
}
add_action('save_post', 'wp_starter_headless_clear_api_cache');
