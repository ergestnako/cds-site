<?php

//Wordpress Admin Panel Modifications

//Restructure Tab Order
  function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
      'index.php', // Dashboard
	  'edit.php?post_type=cds_problem_single', // Problem Cards 
	  'edit.php?post_type=cds_sponsor_single', // Problem Sponsors 
      'edit.php?post_type=page', // Pages 
	  'admin.php?page=wpcf7', // Contact Forms
      'edit.php', // Posts
      'upload.php', // Media
      'edit-comments.php', // Comments
      'themes.php', // Appearance
      'plugins.php', // Plugins
      'users.php', // Users
      'tools.php', // Tools
      'options-general.php', // Settings
    );
  }

  add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
  add_filter('menu_order', 'custom_menu_order');

// Allow SVG uploads
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

?>