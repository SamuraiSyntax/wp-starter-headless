<?php

namespace WP_Headless\Api;

abstract class REST_Controller
{
  protected $namespace = 'wp-headless/v1';

  public function __construct()
  {
    add_action('rest_api_init', [$this, 'register_routes']);
  }

  abstract public function register_routes();

  protected function success($data = null, $status = 200)
  {
    return new \WP_REST_Response($data, $status);
  }

  protected function error($message, $status = 400)
  {
    return new \WP_Error(
      'wp_headless_error',
      $message,
      ['status' => $status]
    );
  }
}
