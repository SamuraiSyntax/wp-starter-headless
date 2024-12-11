<?php

/**
 * Preview functionality
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Setup preview functionality
 */
function wp_starter_headless_setup_preview()
{
  add_action('template_redirect', 'wp_starter_headless_handle_preview');
}
add_action('init', 'wp_starter_headless_setup_preview');

/**
 * Handle preview requests
 */
function wp_starter_headless_handle_preview()
{
  if (!is_preview()) {
    return;
  }

  // Remplacer get_preview_post() par get_post()
  $post = get_post();
  if (!$post) {
    return;
  }

  $preview_url = get_frontend_preview_url($post);
  wp_redirect($preview_url);
  exit;
}

/**
 * Get frontend preview URL
 */
function get_frontend_preview_url($post)
{
  $frontend_url = defined('FRONTEND_URL') ? FRONTEND_URL : 'http://localhost:3000';
  $preview_token = wp_create_nonce('wp_rest');

  return sprintf(
    '%s/api/preview?secret=%s&slug=%s&id=%s',
    untrailingslashit($frontend_url),
    $preview_token,
    $post->post_name,
    $post->ID
  );
}
