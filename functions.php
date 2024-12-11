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

// Autoloader
spl_autoload_register(function ($class) {
  // Préfixe du namespace du projet
  $prefix = 'WP_Headless\\';
  $base_dir = get_template_directory() . '/inc/';

  // Vérifie si la classe utilise le namespace du projet
  $len = strlen($prefix);
  if (strncmp($prefix, $class, $len) !== 0) {
    return;
  }

  // Récupère le nom relatif de la classe
  $relative_class = substr($class, $len);

  // Remplace les namespace separators par des directory separators
  $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

  // Si le fichier existe, on le charge
  if (file_exists($file)) {
    require $file;
  }
});

// Initialisation du thème
if (class_exists('WP_Headless\\Core\\Init')) {
  new WP_Headless\Core\Init();
}
