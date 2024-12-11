<?php

/**
 * Admin notices
 *
 * @package WP_Starter_Headless
 */

if (!defined('ABSPATH')) {
  exit;
}

function wp_starter_headless_admin_notices()
{
?>
  <div class="notice notice-info">
    <p><?php _e('Ce site fonctionne en mode headless. Le frontend est géré par Next.js.', 'wp-starter-headless'); ?></p>
  </div>
<?php
}
add_action('admin_notices', 'wp_starter_headless_admin_notices');
