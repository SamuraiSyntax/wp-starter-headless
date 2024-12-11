<?php

namespace WP_Headless\Admin;

class Settings
{
  public function __construct()
  {
    add_action('admin_menu', [$this, 'add_menu']);
    add_action('admin_init', [$this, 'register_settings']);
  }

  public function add_menu()
  {
    add_menu_page(
      __('Headless Settings', 'wp-starter-headless'),
      __('Headless', 'wp-starter-headless'),
      'manage_options',
      'headless-settings',
      [$this, 'render_settings_page'],
      'dashicons-rest-api'
    );
  }

  public function register_settings()
  {
    register_setting('headless_settings', 'frontend_url');
    register_setting('headless_settings', 'api_cache_duration');
    register_setting('headless_settings', 'allowed_origins');
  }

  public function render_settings_page()
  {
    include WP_HEADLESS_PATH . '/templates/admin/settings.php';
  }
}
