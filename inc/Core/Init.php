<?php

namespace WP_Headless\Core;

use WP_Headless\Api\REST_Controller; // Changé de API à Api
use WP_Headless\Api\Endpoints\Posts;
use WP_Headless\Api\Endpoints\Preview;

class Init
{
  public function __construct()
  {
    $this->init_classes();
  }

  private function init_classes()
  {
    new Posts();
    new Preview();
  }
}
