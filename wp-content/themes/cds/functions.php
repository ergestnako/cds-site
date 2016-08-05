<?php
// Core functions and customizations
// Enqueue Scripts and Assets
function cds_assets() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri());
    wp_enqueue_script( 'smooth-scroll', get_stylesheet_directory_uri() . '/lib/scripts/smooth-scroll.min.js', '', '1.0', true );
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/lib/scripts/main.js', array('jquery'), '3.0', true );	

}
add_action( 'wp_enqueue_scripts', 'cds_assets' );
// Enable Site Title
function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );
//Enable featured images on posts
add_theme_support( 'post-thumbnails' );
// Enable Custom Menus
require_once('lib/config/menus.php');
// Enable Admin Settings
require_once('lib/settings.php');
// Enable Custom Fields (Metaboxes)
require_once('lib/config/metaboxes.php');
// Enable Specific Metaboxes
require_once('lib/metaboxes/home.php');
require_once('lib/metaboxes/problem_single.php');
require_once('lib/metaboxes/sponsor_single.php');
require_once('lib/metaboxes/how_it_works.php');
require_once('lib/metaboxes/how_it_works_single.php');
require_once('lib/metaboxes/who_we_are.php');
require_once('lib/metaboxes/contact.php');
require_once('lib/metaboxes/general.php');
// Enable Custom Posts
require_once('lib/config/taxonomy.php');
// Prevent Editor on Certain Pages
require_once('lib/config/admin.php');
// Hide editor on specific pages.
 add_action( 'admin_head', 'hide_editor' );
function hide_editor() {
  global $pagenow;
  if( !( 'post.php' == $pagenow ) ) return;
  global $post;
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  // Hide the editor on certain pages
  $template_file = get_post_meta( $post_id, '_wp_page_template', true );
  if(in_array($template_file, array(
  		'templates/home.php',
		'templates/how_it_works.php',
		'templates/how_it_works_single.php',
		'templates/who_we_are.php',
		))){
    remove_post_type_support('page', 'editor');
  }
  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);
  if($template_file == 'my-page-template.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
}
?>
