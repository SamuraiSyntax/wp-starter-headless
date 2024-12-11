<?php

/**
 * JWT Authentication functionality
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Add JWT auth headers
 */
function wp_starter_headless_add_cors_headers()
{
  header('Access-Control-Allow-Headers: Authorization, Content-Type, X-WP-Nonce');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
  header('Access-Control-Allow-Credentials: true');
}
add_action('init', 'wp_starter_headless_add_cors_headers');

/**
 * Handle JWT auth errors
 */
function wp_starter_headless_handle_jwt_auth_errors($errors, $user)
{
  $error_data = array();

  if (is_wp_error($errors)) {
    $error_data['code'] = $errors->get_error_code();
    $error_data['message'] = $errors->get_error_message();
  }

  return $error_data;
}
add_filter('jwt_auth_token_before_dispatch', 'wp_starter_headless_handle_jwt_auth_errors', 10, 2);
