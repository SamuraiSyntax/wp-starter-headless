<?php

/**
 * Admin customizations
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Add admin notice for headless mode
 */
function wp_starter_headless_admin_notice()
{
?>
  <div class="notice notice-info">
    <p><?php _e('Ce site fonctionne en mode headless. Le frontend est géré par Next.js.', 'wp-starter-headless'); ?></p>
  </div>
<?php
}
add_action('admin_notices', 'wp_starter_headless_admin_notice');

/**
 * Customize admin footer text
 */
function wp_starter_headless_admin_footer_text($text)
{
  return __('Site propulsé par WordPress Headless', 'wp-starter-headless');
}
add_filter('admin_footer_text', 'wp_starter_headless_admin_footer_text');

/**
 * Add custom admin menu items
 */
function wp_starter_headless_admin_menu()
{
  add_menu_page(
    __('Headless Settings', 'wp-starter-headless'),
    __('Headless', 'wp-starter-headless'),
    'manage_options',
    'headless-settings',
    'wp_starter_headless_settings_page',
    'dashicons-rest-api',
    100
  );
}
add_action('admin_menu', 'wp_starter_headless_admin_menu');

/**
 * Render settings page
 */
function wp_starter_headless_settings_page()
{
?>
  <div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <p><?php _e('Configuration de votre site WordPress headless.', 'wp-starter-headless'); ?></p>
    <!-- Add your settings form here -->
  </div>
<?php
}
