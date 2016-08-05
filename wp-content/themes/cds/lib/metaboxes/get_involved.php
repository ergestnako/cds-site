<?php

// Register Metaboxes for the Get Involved Page
function cds_get_involved_meta() {
  $prefix = 'cds_get_involved_';

  // Set up a hero section for these pages
  cds_hero_meta($prefix,'get_involved'); //No call to action

  // Set up a call to action footer for these pages
  cds_cta_meta($prefix,'get_involved');
}

add_action('cmb2_init', 'cds_get_involved_meta');



?>