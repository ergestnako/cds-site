<?php

//Register Metaboxes for Individual Problems

function cds_problem_single_meta() {
 $prefix = 'cds_problem_single_';
 
 $preview = new_cmb2_box( array(
    'id'            => $prefix.'preview',
    'title'         => __( 'Problem Card', 'cmb2' ),
    'object_types'  => array('cds_problem_single'),
    'context'       => 'normal',
    'show_names'    => true
  ));
  
  $preview->add_field(array(
    'id'    => $prefix . 'excerpt',
    'name'  => __( 'Problem Excerpt', 'cmb2' ),
	'desc'  => __( 'A brief description of the problem', 'cmb2' ),
    'type'  => 'textarea_small',
  ));
  $preview->add_field( array(
    'name'        => __( 'Sponsors' ),
    'id'          => $prefix.'sponsors',
	'desc' 		  => __( 'Click the Search Icon to search Sponsors. List the WordPress IDs, separated by commas, in order for first to last.', 'cmb2' ),
    'type'        => 'post_search_text',
    'post_type'   => 'cds_sponsor_single',
    'select_behavior' => 'add', // Will replace any selection with selection from modal. Default is 'add'
  ));
  $preview->add_field(array(
    'id'    => $prefix . 'git_link',
    'name'  => __( 'Git Repo URL', 'cmb2' ),
	'desc'  => __( 'Optional (leave any optional field blank to hide that field.) Ex: http://www.github.org', 'cmb2' ),
    'type'  => 'text_url',
  ));
  $preview->add_field(array(
    'id'    => $prefix . 'form_link',
    'name'  => __( 'Get Involved URL', 'cmb2' ),
	'desc'  => __( 'Optional. Ex: http://www.google.com', 'cmb2' ),
    'type'  => 'text_url',
  ));
    $preview->add_field(array(
    'id'    => $prefix . 'twitter_excerpt',
    'name'  => __( 'Twitter Excerpt', 'cmb2' ),
	'desc'  => __( 'Optional. Pre-populates the tweet. Ex: I support Simplifying the Capitol Flag Program!', 'cmb2' ),
    'type'  => 'text',
  ));
  $preview->add_field(array(
    'id'    => $prefix . 'twitter_hashtag',
    'name'  => __( 'Twitter Hashtag', 'cmb2' ),
	'desc'  => __( 'Optional, comma separated. Do not use #. Ex: cds,congress', 'cmb2' ),
    'type'  => 'text',
  ));
 }

add_action('cmb2_init', 'cds_problem_single_meta');

?>