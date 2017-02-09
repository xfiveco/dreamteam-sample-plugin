<?php
/**
 * Optimize JavaScript
 *
 * @package Dreamteam
 */
namespace Dreamteam;

class OptimizeJavaScript {

  /**
   * Run actions and filters
   */
  public function run() {
    add_action('wp_enqueue_scripts', array($this, 'dequeue_scripts'));
    add_filter('script_loader_tag', array($this, 'defer_scripts'));
    add_filter('wp_print_scripts', array($this, 'remove_unnecessary_scripts'), 100);
    add_filter('rest_enabled', array($this, 'return_false'));
    add_filter('rest_jsonp_enabled', array($this, 'return_false'));
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
    remove_action('wp_head', 'wp_generator');
  }

  /**
   * Dequeue scripts
   */
  public function dequeue_scripts() {
    wp_dequeue_script('picturefill');
  }

  /**
   * Defer scripts
   * @param  string $tag Script tag
   * @return string      Script tag
   */
  public function defer_scripts($tag) {
    if (is_admin()) {
      return $tag;
    }
    return str_replace( ' src', ' defer="defer" src', $tag );
  }

  /**
   * Remove scripts
   */
  public function remove_unnecessary_scripts() {
    wp_deregister_script('jquery');
    wp_deregister_script('wp-embed');
  }

  public function return_false() {
    return false;
  }
}
