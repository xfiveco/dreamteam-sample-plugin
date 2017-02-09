<?php
/**
 * Alter Media settings
 *
 * @package Dreamteam
 */
namespace Dreamteam;

class AlterMedia {

  /**
   * Run actions and filters
   */
  public function run() {
    add_action('after_setup_theme', array($this, 'default_media_setting'));
    add_filter('image_size_names_choose', array($this, 'custom_image_sizes'));
    add_action('upload_mimes', array($this, 'cc_mime_types'));
    add_action('jpeg_quality', array($this, 'custom_jpeg_quality'));
    add_filter('embed_oembed_html', array($this, 'custom_oembed_filter'), 10, 4);
    add_filter('option_use_smilies', '__return_false');
  }

  /**
   * Default settings when adding or editing post images
   */
  public function default_media_setting() {
    update_option('image_default_align', 'center');
    update_option('image_default_link_type', 'none');
    update_option('image_default_size', 'large');
  }

  /**
   * Add custom image sizes option to WP admin
   * @param  array $sizes Default sizes
   * @return array        Updated sizes
   */
  public function custom_image_sizes($sizes) {
    return array_merge($sizes, array(
      'small' => __( 'Small' ),
    ));
  }

  /**
   * Allowing additional image types
   * @param  array $mimes mime types
   * @return array        extended mime types
   */
  function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }

  /**
   * Sets custom JPG quality when resizing images
   * @return number JPG Quality
   */
  public function custom_jpeg_quality() {
    return 80;
  }

  /**
   * Custom container for content videos
   */
  function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="c-video">' . $html . '</div>';
    return $return;
  }

  /**
   * Allows to use standard WP method for getting attachments
   * @param  [string] $src  Attachment src
   * @param  [number] $id   Attachment ID
   * @return [string]       Attachment URL
   */
  public function get_attachment($src, $id) {
    return wp_get_attachment_image_src($id, $size)[0];
  }
}
