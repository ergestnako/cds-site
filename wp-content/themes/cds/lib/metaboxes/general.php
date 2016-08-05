<?php

// Register Metaboxes for a General Page
function cds_general_meta() {
  $prefix = 'cds_general_';

  // Set up a hero section for these pages
  cds_hero_meta($prefix,'general'); //No call to action
  
  // Set up a call to action footer for these pages
  cds_cta_meta($prefix,'general');
}

add_action('cmb2_init', 'cds_general_meta');

?>