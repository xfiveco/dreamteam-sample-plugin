<?php
/**
 * Register custom taxonomies
 *
 * @package Dreamteam
 */
namespace Dreamteam;

class RegisterTaxonomies {
  /**
   * Run actions
   */
  public function run() {
    add_action('init', array( $this, 'register_position_taxonomy'));
  }

  /**
   * Register Position Taxonomy
   *
   * @access public
   * @return void
   */
  public function register_position_taxonomy() {
    register_taxonomy('position', 'team', array(
      'hierarchical' => true,
      'show_tagcloud' => false,
      'labels' => array(
        'name' => _x( 'Positions', 'taxonomy general name' ),
        'singular_name' => _x( 'Position', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Positions' ),
        'all_items' => __( 'All Positions' ),
        'parent_item' => __( 'Parent Position' ),
        'parent_item_colon' => __( 'Parent Position:' ),
        'edit_item' => __( 'Edit Position' ),
        'update_item' => __( 'Update Position' ),
        'add_new_item' => __( 'Add New Position' ),
        'new_item_name' => __( 'New Position Name' ),
        'menu_name' => __( 'Positions' ),
      )
    ));
  }
}
