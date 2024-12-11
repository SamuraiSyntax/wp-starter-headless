<?php

/**
 * Header template
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div id="page" class="site">
    <header style="display: none;">
      <h1><?php bloginfo('name'); ?></h1>
    </header>
</body>

</html>