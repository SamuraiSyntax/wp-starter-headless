<?php

namespace WP_Headless\Api\Endpoints;

use WP_Headless\Api\REST_Controller;

class Posts extends REST_Controller
{
  public function register_routes(): void
  {
    register_rest_route($this->namespace, '/posts', [
      [
        'methods' => 'GET',
        'callback' => [$this, 'get_posts'],
        'permission_callback' => '__return_true',
      ]
    ]);

    register_rest_route($this->namespace, '/posts/(?P<id>\d+)', [
      [
        'methods' => 'GET',
        'callback' => [$this, 'get_post'],
        'permission_callback' => '__return_true',
        'args' => [
          'id' => [
            'required' => true,
            'validate_callback' => function ($param) {
              return is_numeric($param);
            }
          ]
        ]
      ]
    ]);
  }

  public function get_posts($request)
  {
    $args = [
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 10,
    ];

    $posts = get_posts($args);

    if (empty($posts)) {
      return $this->error('Aucun article trouvé', 404);
    }

    $data = [];
    foreach ($posts as $post) {
      $data[] = $this->prepare_post_response($post);
    }

    return $this->success($data);
  }

  public function get_post($request)
  {
    $post = get_post($request['id']);

    if (!$post || $post->post_status !== 'publish') {
      return $this->error('Article non trouvé', 404);
    }

    return $this->success($this->prepare_post_response($post));
  }

  private function prepare_post_response($post)
  {
    $featured_image = get_the_post_thumbnail_url($post->ID, 'full');

    return [
      'id' => $post->ID,
      'title' => [
        'rendered' => get_the_title($post)
      ],
      'content' => [
        'rendered' => apply_filters('the_content', $post->post_content)
      ],
      'excerpt' => [
        'rendered' => get_the_excerpt($post)
      ],
      'slug' => $post->post_name,
      'date' => get_the_date('c', $post),
      'modified' => get_the_modified_date('c', $post),
      'featured_image' => $featured_image ? $featured_image : null,
      'categories' => wp_get_post_categories($post->ID, ['fields' => 'all']),
      'author' => [
        'id' => $post->post_author,
        'name' => get_the_author_meta('display_name', $post->post_author)
      ]
    ];
  }
}
