<?php

// Register Metaboxes for How It Works Audiences Pages
function cds_how_it_works_single_meta() {
  $prefix = 'cds_how_it_works_single_';

  // Set up a hero section for these pages
  cds_hero_meta($prefix,'how_it_works_single'); //No call to action
 
  // Set up repeatable feature cards
   $feature = new_cmb2_box( array(
    'id'            => $prefix.'features',
    'title'         => __( 'Featured Cards', 'cmb2' ),
	'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/how_it_works_single.php'),
    'context'       => 'normal',
    'show_names'    => true
  ));
  
  $feature_id = $feature->add_field( array(
	'id'          => 'cds_feature_group',
	'type'        => 'group',
	'description' => __( 'Manage featured cards', 'cmb2' ),
	'options'     => array(
		'group_title'   => __( 'Feature Card {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'    => __( 'Add Another Feature', 'cmb2' ),
		'remove_button' => __( 'Remove Feature', 'cmb2' ),
		'sortable'      => true, // beta
		'closed'     => true, // true to have the groups closed by default
	),
  ));
  $feature->add_group_field( $feature_id, array(
	  'name' => 'Feature Title',
	  'id'   => 'title',
	  'type' => 'text',
  ));
  $feature->add_group_field( $feature_id, array(
	  'name' => 'Feature Excerpt',
	  'description' => 'Write a short excerpt for this feature',
	  'id'   => 'excerpt',
	  'type' => 'textarea_small',
  )); 
  $feature->add_group_field( $feature_id, array(
	  'name' => 'Feature Thumbnail',
	  'description' => 'A preview image to go with this feature',
	  'id'   => 'thumbnail',
	  'type' => 'file',
  )); 
   $feature->add_group_field( $feature_id, array(
	  'name' => 'Feature Link',
	  'id'   => 'link',
	  'description' => 'Optional. Specify a page for this card to point to.',
	  'type'        => 'post_search_text',
	  'post_type'   => 'page'
  )); 
  
  // Set up a special call to action footer
  $cta_single= new_cmb2_box( array(
    'id'            => 'cds_how_it_works_single_join_cta',
    'title'         => __( 'Join CTA', 'cmb2' ),
    'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/how_it_works_single.php'),
    'context'       => 'normal',
    'show_names'    => true,
    'closed'        => true,
  ));
  
  $prefix.= 'join_';
  
  $cta_single->add_field(array(
    'id'    => $prefix . 'title',
    'name'  => __( 'CTA Title', 'cmb2' ),
    'type'  => 'textarea_small',
  ));
  $cta_single->add_field(array(
    'id'    => $prefix . 'excerpt',
    'name'  => __( 'CTA Excerpt', 'cmb2' ),
    'type'  => 'textarea_small',
  ));
  $cta_single->add_field(array(
    'id'    => $prefix . 'cta',
    'name'  => __( 'CTA Link Text', 'cmb2' ),
    'type'  => 'text',
    'default' => 'Apply Now'
  ));
  $cta_single->add_field(array(
	'id'    => $prefix . 'link',
	'name'  => __( 'CTA Link Page', 'cmb2' ),
	'desc'  => __( 'Specify a page for this CTA to point to.', 'cmb2' ),
	'type'        => 'post_search_text',
    'post_type'   => 'page'
 ));
  
  // Reset the prefix
  $prefix = 'cds_how_it_works_single_';  

  // Set up a call to action footer for these pages
  cds_cta_meta($prefix,'how_it_works_single');
}

add_action('cmb2_init', 'cds_how_it_works_single_meta');



?>