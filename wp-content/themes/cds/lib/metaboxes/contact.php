<?php

// Register Metaboxes for a Contact Page
function cds_contact_meta() {
  $prefix = 'cds_contact_';

  // Set up a hero section for these pages
  cds_hero_meta($prefix,'contact'); //No call to action
  
  // Set up a repeating sidebar for this section
  $contact_method = new_cmb2_box( array(
    'id'            => $prefix.'_methods',
    'title'         => __( 'Contact Methods Sidebar', 'cmb2' ),
	'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/contact.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
  ));
  
  $contact_method_group = $contact_method->add_field( array(
	'id'          => 'cds_contact_methods_group',
	'type'        => 'group',
	'description' => __( 'Manage Contact Methods', 'cmb2' ),
	'options'     => array(
		'group_title'   => __( 'Contact Method {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'    => __( 'Add Another Contact Method', 'cmb2' ),
		'remove_button' => __( 'Remove Contact Method', 'cmb2' ),
		'sortable'      => true, // beta
		'closed'     => true, // true to have the groups closed by default
	),
  ));
  
  $contact_method->add_group_field( $contact_method_group, array(
	  'name' => 'Title',
	  'id'   => 'title',
	  'type' => 'text',
  ));
  $contact_method->add_group_field( $contact_method_group, array(
	  'name' => 'Caption',
	  'id'   => 'caption',
	  'type' => 'wysiwyg',
  ));
  $contact_method->add_group_field( $contact_method_group, array(
	  'name' => 'Phone Number',
	  'id'   => 'phone',
	  'desc' => 'Optional.',
	  'type' => 'text',
  ));
  $contact_method->add_group_field( $contact_method_group, array(
	  'name' => 'Email Address',
	  'id'   => 'email',
	  'desc' => 'Optional.',
	  'type' => 'text',
  ));
  $contact_method->add_group_field( $contact_method_group, array(
	  'name' => 'Call to Action',
	  'id'   => 'cta',
	  'desc' => 'Optional.',
	  'type' => 'text',
  ));
  $contact_method->add_group_field( $contact_method_group, array(
	  'name' => 'Call to Action Link',
	  'id'   => 'link',
	  'desc' => 'Optional.',
	  'type' => 'text',
  ));  
  

  // Set up a call to action footer for these pages
  cds_cta_meta($prefix,'contact');
}

add_action('cmb2_init', 'cds_contact_meta');

?>