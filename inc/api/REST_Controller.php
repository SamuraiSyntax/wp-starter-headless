<?php

namespace WP_Headless\API;

class REST_Controller
{
  private $namespace = 'wp-headless/v1';

  public function __construct()
  {
    add_action('rest_api_init', [$this, 'register_routes']);
  }

  public function register_routes()
  {
    // Posts endpoint
    register_rest_route($this->namespace, '/posts', [
      'methods' => 'GET',
      'callback' => [$this, 'get_posts'],
      'permission_callback' => '__return_true'
    ]);

    // Pages endpoint
    register_rest_route($this->namespace, '/pages', [
      'methods' => 'GET',
      'callback' => [$this, 'get_pages'],
      'permission_callback' => '__return_true'
    ]);

    // Search endpoint
    register_rest_route($this->namespace, '/search', [
      'methods' => 'GET',
      'callback' => [$this, 'search'],
      'permission_callback' => '__return_true'
    ]);
  }

  public function get_posts($request)
  {
    $args = [
      'post_type' => 'post',
      'posts_per_page' => 10,
      'paged' => $request->get_param('page') ?? 1
    ];

    $query = new \WP_Query($args);
    return rest_ensure_response($this->format_posts($query->posts));
  }

  public function get_pages($request)
  {
    // Similar to get_posts but for pages
  }

  public function search($request)
  {
    // Search implementation
  }

  private function format_posts($posts)
  {
    return array_map(function ($post) {
      return [
        'id' => $post->ID,
        'title' => get_the_title($post),
        'content' => get_the_content(null, false, $post),
        'excerpt' => get_the_excerpt($post),
        'slug' => $post->post_name,
        'date' => get_the_date('c', $post),
        'modified' => get_the_modified_date('c', $post),
        'featured_image' => get_the_post_thumbnail_url($post, 'full')
      ];
    }, $posts);
  }
}
