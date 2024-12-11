<?php

/**
 * WP Starter Headless functions
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

// Constants
define('WP_HEADLESS_VERSION', '1.0.0');
define('WP_HEADLESS_PATH', get_template_directory());
define('WP_HEADLESS_URL', get_template_directory_uri());
define('FRONTEND_URL', get_option('frontend_url', 'http://localhost:3000'));
// Autoloader
spl_autoload_register(function ($class) {
  $prefix = 'WP_Headless\\';
  $base_dir = get_template_directory() . '/inc/';

  $len = strlen($prefix);
  if (strncmp($prefix, $class, $len) !== 0) {
    return;
  }

  $relative_class = substr($class, $len);
  $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';

  if (file_exists($file)) {
    require $file;
  }
});

// Initialisation
if (class_exists('WP_Headless\\Core\\Init')) {
  new WP_Headless\Core\Init();
}
