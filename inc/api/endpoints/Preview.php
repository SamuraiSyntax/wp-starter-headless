<?php

namespace WP_Headless\API\Endpoints;

class Preview
{
  public function __construct()
  {
    add_action('rest_api_init', [$this, 'register_endpoints']);
  }

  public function register_endpoints()
  {
    register_rest_route('wp-headless/v1', '/preview/verify', [
      'methods' => 'GET',
      'callback' => [$this, 'verify_preview_token'],
      'permission_callback' => '__return_true',
      'args' => [
        'id' => [
          'required' => true,
          'type' => 'integer',
        ],
        'token' => [
          'required' => true,
          'type' => 'string',
        ]
      ]
    ]);
  }

  public function verify_preview_token($request)
  {
    $post_id = $request->get_param('id');
    $token = $request->get_param('token');

    if (!wp_verify_nonce($token, 'preview_' . $post_id)) {
      return new \WP_Error(
        'invalid_token',
        'Token de preview invalide',
        ['status' => 403]
      );
    }

    $post = get_post($post_id);
    if (!$post || $post->post_status !== 'draft') {
      return new \WP_Error(
        'invalid_post',
        'Article invalide ou non trouvé',
        ['status' => 404]
      );
    }

    return rest_ensure_response([
      'id' => $post->ID,
      'title' => $post->post_title,
      'content' => $post->post_content,
      'excerpt' => $post->post_excerpt,
      'slug' => $post->post_name,
      'status' => $post->post_status,
      'type' => $post->post_type,
      'modified' => $post->post_modified,
    ]);
  }
}
