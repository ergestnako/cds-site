<?php

//Register Metaboxes for Individual Sponsors

function cds_sponsor_single_meta() {
 $prefix = 'cds_sponsor_single_';
 
 $preview = new_cmb2_box( array(
    'id'            => $prefix.'preview',
    'title'         => __( 'Sponsor Card', 'cmb2' ),
    'object_types'  => array('cds_sponsor_single'),
    'context'       => 'normal',
    'show_names'    => true
  ));
  
 $preview->add_field(array(
    'id'    => $prefix . 'headshot',
    'name'  => __( 'Sponsor Headshot', 'cmb2' ),
    'type'  => 'file',
  ));
  $preview->add_field(array(
    'id'    => $prefix . 'affiliation',
    'name'  => __( 'Affiliation', 'cmb2' ),
	'desc'  => __( 'Displays on Active Congress Members only. Ex: D - New York', 'cmb2' ),
    'type'  => 'textarea_small',
  ));
  $preview->add_field(array(
    'id'    => $prefix . 'title',
    'name'  => __( 'Sponsor Title', 'cmb2' ),
	'desc'  => __( 'Displays on Partner Testimonials Only. Ex: Chief of Staff', 'cmb2' ),
    'type'  => 'textarea_small',
  ));
  $preview->add_field(array(
    'id'    => $prefix . 'link',
    'name'  => __( 'Sponsor URL', 'cmb2' ),
	'desc'  => __( 'Ex: http://www.house.gov', 'cmb2' ),
    'type'  => 'text_url',
  ));
 }

add_action('cmb2_init', 'cds_sponsor_single_meta');

?>