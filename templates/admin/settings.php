<?php
if (!defined('ABSPATH')) {
  exit;
}
?>

<div class="wrap">
  <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

  <form method="post" action="options.php">
    <?php
    settings_fields('headless_settings');
    do_settings_sections('headless_settings');
    ?>

    <table class="form-table">
      <tr>
        <th scope="row">
          <label for="frontend_url"><?php _e('URL Frontend', 'wp-starter-headless'); ?></label>
        </th>
        <td>
          <input type="url" name="frontend_url" id="frontend_url"
            value="<?php echo esc_attr(get_option('frontend_url', 'http://localhost:3000')); ?>" class="regular-text">
          <p class="description">
            <?php _e('URL de votre application Next.js', 'wp-starter-headless'); ?>
          </p>
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="api_cache_duration"><?php _e('Durée du Cache API', 'wp-starter-headless'); ?></label>
        </th>
        <td>
          <input type="number" name="api_cache_duration" id="api_cache_duration"
            value="<?php echo esc_attr(get_option('api_cache_duration', '300')); ?>" class="small-text">
          <p class="description">
            <?php _e('Durée en secondes', 'wp-starter-headless'); ?>
          </p>
        </td>
      </tr>
    </table>

    <?php submit_button(); ?>
  </form>
</div>