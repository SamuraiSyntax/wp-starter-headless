<?php

/**
 * Debug utilities
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

function wp_starter_headless_debug_log($message)
{
  if (WP_DEBUG) {
    error_log($message);
  }
}
