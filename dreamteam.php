<?php
/**
 * Plugin Name: Dreamteam
 * Description: Custom functionality plugin for Dreamteam site
 * Version: 0.0.1
 * Author: Xfive
 * Author URI: https://www.xfive.co
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
  die;
}

use Dreamteam\AlterMedia;
use Dreamteam\OptimizeJavaScript;
use Dreamteam\RegisterPostTypes;
use Dreamteam\RegisterTaxonomies;

// Autoload function
spl_autoload_register( 'plugin_autoloader' );

function plugin_autoloader( $class_name ) {
  if ( false !== strpos( $class_name, 'Dreamteam' ) ) {
    $classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
    $class_file = str_replace( '\\', DIRECTORY_SEPARATOR, $class_name ) . '.php';
    require_once $classes_dir . $class_file;
  }
}

// Initiate functionality
add_action( 'plugins_loaded', 'plugin_init' );

function plugin_init() {
  (new AlterMedia)->run();
  (new OptimizeJavaScript)->run();
  (new RegisterPostTypes)->run();
  (new RegisterTaxonomies)->run();
}
