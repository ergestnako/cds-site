<?php

// Wordpress Admin Panel General Settings 

//Create site-wide settings for the Footer
$settings = array(
  'footer_address',
  'footer_phone',
  'footer_copyright'
);

// adds settings
add_filter('admin_init', 'cds_settings_page');

function cds_settings_page() {
  global $settings;
  $callback = 'cds_settings_page_cb';
  $page = 'cds_settings';

  add_settings_section( $page, "Footer Settings", NULL, "general" );
  foreach ($settings as $item) {
    $field = "cds_${item}";
    add_settings_field($field, ucfirst( str_replace('_', ' ', $item) ), $callback, 'general', $page, array($field));
    register_setting("general", $field);
  }
}

function cds_settings_page_cb($args) {
  echo '<input class="regular-text" type="text" value="'. get_option($args[0]) .'" name="'. $args[0] .'">';
}

?>
