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

// Autoloader simple
function wp_headless_autoloader($class)
{
  // Convertir le namespace en chemin de fichier
  $class_path = str_replace('WP_Headless\\', '', $class);
  $class_path = str_replace('\\', '/', $class_path);

  $file = WP_HEADLESS_PATH . '/inc/' . $class_path . '.php';

  if (file_exists($file)) {
    require_once $file;
  }
}
spl_autoload_register('wp_headless_autoloader');

// Initialize theme
require_once WP_HEADLESS_PATH . '/inc/Core/Init.php';
