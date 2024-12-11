<?php

namespace WP_Headless\Core;

use WP_Headless\API\REST_Controller;
use WP_Headless\API\Endpoints\Posts;
use WP_Headless\API\Endpoints\Preview;

class Init
{
  public function __construct()
  {
    // Initialize components
    new \WP_Headless\API\REST_Controller();
    new \WP_Headless\Admin\Settings();
    new \WP_Headless\SEO\Manager();

    // Actions
    add_action('init', [$this, 'init_theme']);
    add_action('after_setup_theme', [$this, 'setup_theme']);
  }

  public function init_theme()
  {
    // Theme initialization
  }

  public function setup_theme()
  {
    // Theme setup
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
  }
}

new Init();
