<?php

/**
 * Taxonomies endpoint
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

function wp_starter_headless_register_taxonomies_endpoint()
{
  register_rest_route('wp-headless/v1', '/taxonomies', array(
    'methods' => 'GET',
    'callback' => 'wp_starter_headless_get_taxonomies',
    'permission_callback' => '__return_true'
  ));
}
add_action('rest_api_init', 'wp_starter_headless_register_taxonomies_endpoint');

function wp_starter_headless_get_taxonomies()
{
  $taxonomies = get_taxonomies(array('public' => true), 'objects');
  $data = array();

  foreach ($taxonomies as $taxonomy) {
    $data[] = array(
      'name' => $taxonomy->name,
      'label' => $taxonomy->label,
      'hierarchical' => $taxonomy->hierarchical
    );
  }

  return rest_ensure_response($data);
}
