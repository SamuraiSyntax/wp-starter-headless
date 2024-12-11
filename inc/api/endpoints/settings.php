<?php

/**
 * Global settings endpoint
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

function wp_starter_headless_register_settings_endpoint()
{
  register_rest_route('wp-headless/v1', '/settings', array(
    'methods' => 'GET',
    'callback' => 'wp_starter_headless_get_settings',
    'permission_callback' => '__return_true'
  ));
}
add_action('rest_api_init', 'wp_starter_headless_register_settings_endpoint');

function wp_starter_headless_get_settings()
{
  $settings = array(
    'site_name' => get_bloginfo('name'),
    'site_description' => get_bloginfo('description'),
    'frontend_url' => get_option('frontend_url')
  );

  return rest_ensure_response($settings);
}
