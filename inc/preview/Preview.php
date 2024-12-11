<?php

namespace WP_Headless\Preview;

class Preview
{
  public function __construct()
  {
    add_action('template_redirect', [$this, 'handle_preview']);
    add_filter('preview_post_link', [$this, 'filter_preview_url'], 10, 2);
  }

  public function handle_preview()
  {
    if (!is_preview()) {
      return;
    }

    $post = get_post();
    if (!$post) {
      return;
    }

    $preview_url = $this->get_frontend_preview_url($post);
    wp_redirect($preview_url);
    exit;
  }

  public function filter_preview_url($preview_link, $post)
  {
    return $this->get_frontend_preview_url($post);
  }

  private function get_frontend_preview_url($post)
  {
    $frontend_url = get_option('frontend_url', 'http://localhost:3000');
    $preview_token = $this->generate_preview_token($post);

    return sprintf(
      '%s/api/preview?slug=%s&id=%d&token=%s',
      untrailingslashit($frontend_url),
      $post->post_name,
      $post->ID,
      $preview_token
    );
  }

  private function generate_preview_token($post)
  {
    return wp_create_nonce('preview_' . $post->ID);
  }
}
