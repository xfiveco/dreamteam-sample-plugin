<?php
/**
 * Register custom post types
 *
 * @package Dreamteam
 */
namespace Dreamteam;

class RegisterPostTypes {
  /**
    * Run the actions
    */
  public function run() {
    add_action('init', array($this, 'register_team_member_post_type'));
  }

  /**
  * Register Team Member Post Type
  *
  * @access public
  * @return void
  */
  public function register_team_member_post_type() {
    register_post_type( 'team',
      array(
        'labels' => array(
          'name'          => __( 'Team' ),
          'singular_name' => __( 'Team Member' ),
          'all_items'     => __( 'All Team Members' ),
          'add_new'       => __( 'Add Team Member' ),
          'add_new_item'  => __( 'Add New Team Member' ),
          'edit_item'     => __( 'Edit Team Member' ),
        ),
        'exclude_from_search' => false,
        'has_archive'         => true,
        'public'              => true,
        'rewrite'             => true,
        'show_in_nav_menus'   => false,
        'show_ui'             => true,
        'supports'            => array('title', 'editor', 'thumbnail')
      )
    );
  }
}
