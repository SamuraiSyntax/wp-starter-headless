<?php

function wp_starter_headless_register_custom_endpoints()
{
  // Global Settings
  register_rest_route('wp-headless/v1', '/settings', [
    'methods' => 'GET',
    'callback' => 'get_global_settings',
    'permission_callback' => '__return_true'
  ]);

  // Search
  register_rest_route('wp-headless/v1', '/search', [
    'methods' => 'GET',
    'callback' => 'custom_search',
    'permission_callback' => '__return_true'
  ]);

  // Taxonomies
  register_rest_route('wp-headless/v1', '/taxonomies', [
    'methods' => 'GET',
    'callback' => 'get_all_taxonomies',
    'permission_callback' => '__return_true'
  ]);
}

// Sitemap
register_rest_route('wp-headless/v1', '/sitemap', [
  'methods' => 'GET',
  'callback' => 'generate_sitemap',
  'permission_callback' => '__return_true'
]);
