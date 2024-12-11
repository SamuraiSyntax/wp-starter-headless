<?php

/**
 * The main template file
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header(); ?>

<main id="main" class="site-main">
  <h1><?php _e('Bienvenue sur WP Starter Headless', 'wp-starter-headless'); ?></h1>
  <p><?php _e('Ce thème est conçu pour être utilisé avec une architecture headless.', 'wp-starter-headless'); ?></p>
  <p><?php _e('Le frontend est géré par une application Next.js.', 'wp-starter-headless'); ?></p>
</main>

<?php get_footer();
