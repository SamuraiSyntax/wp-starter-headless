<?php

/**
 * Helper functions
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

function wp_starter_headless_get_option($option_name, $default = '')
{
  return get_option($option_name, $default);
}
