<?php

// Register Metaboxes for Home
function cds_home_meta() {
  $prefix = 'cds_home_';

 // Set up a hero section for these pages
 cds_hero_meta($prefix,'home',true); //Use a Call to Action 
 
 //Introduce the Problems Board
 cds_intro_meta($prefix.'problems_','home','Problems',true);
 
 //Problems Display Settings
 $prefix = 'cds_problem_';
 
 $ps_preview = new_cmb2_box( array(
    'id'            => $prefix.'problem_list_setting',
    'title'         => __( 'Problem List Display Settings', 'cmb2' ),
    'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/home.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
 ));
 $ps_preview->add_field(array(
	'id'    => $prefix . 'primary_cta_caption',
	'name'  => __( 'Primary Call to Action Caption', 'cmb2' ),
	'desc'  => __( 'Appears on the back of each card. Ex: Feeling the Pain?', 'cmb2' ),
	'type'  => 'text',
 ));
 $ps_preview->add_field(array(
	'id'    => $prefix . 'primary_cta_caption',
	'name'  => __( 'Primary Call to Action Button', 'cmb2' ),
	'desc'  => __( 'Appears on a button for each card. Ex: Endorse Solution', 'cmb2' ),
	'type'  => 'text',
 ));
 $ps_preview->add_field(array(
	'id'    => $prefix . 'repo_cta',
	'name'  => __( 'Git Repo Call to Action', 'cmb2' ),
	'desc'  => __( 'Appears on the Git buttons. Ex: View Repo', 'cmb2' ),
	'type'  => 'text',
 ));
 $ps_preview->add_field(array(
	'id'    => $prefix . 'form_cta',
	'name'  => __( 'Get Involved Call to Action', 'cmb2' ),
	'desc'  => __( 'Appears on the Get Involved buttons. Ex: Get Involved', 'cmb2' ),
	'type'  => 'text',
 ));
 $ps_preview->add_field(array(
	'id'    => $prefix . 'twitter_cta',
	'name'  => __( 'Twitter Call to Action', 'cmb2' ),
	'desc'  => __( 'Appears on the Tweet buttons. Ex: Tweet', 'cmb2' ),
	'type'  => 'text',
 ));
 
 $prefix = 'cds_home_'; //Reset the prefix
 
 //Set up repeatable Features
 $feature = new_cmb2_box( array(
    'id'            => $prefix.'features',
    'title'         => __( 'Featured Cards', 'cmb2' ),
	'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/home.php'),
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
	  'name' => 'Feature Link',
	  'description' => 'Specify where this feature should go',
	  'id'   => 'link',
	  'type' => 'text_url',
  )); 
  $feature->add_group_field( $feature_id, array(
	  'name' => 'Feature Thumbnail',
	  'description' => 'A preview image to go with this feature',
	  'id'   => 'thumbnail',
	  'type' => 'file',
  )); 
 
 //Introduce the Testimonials
 cds_intro_meta($prefix.'testimonials_','home','Testimonials', true);
 
 //Partner Testimonials
 
 //For this version of the site, we only support 2 testimonials on the front page, but could be expanded in future versions
 $testimonial_1 = cds_testimonial_meta_helper($prefix.'testimonial_',1);
 $testimonial_2 = cds_testimonial_meta_helper($prefix.'testimonial_',2); 
 
 //Set up a call to action footer for these pages
 cds_cta_meta($prefix,'home');
}

add_action('cmb2_init', 'cds_home_meta');

//Helps set up metadata for individual testimonial content.
function cds_testimonial_meta_helper($prefix,$index){
	
 $testimonial = new_cmb2_box( array(
    'id'            => $prefix . $index,
    'title'         => __( 'Testimonial #' . $index, 'cmb2' ),
    'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/home.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
 ));
 
 $prefix.= $index .'_';
 
 $testimonial->add_field(array(
	'id'    => $prefix . 'excerpt',
	'name'  => __( 'Testimonial text', 'cmb2' ),
	'desc'  => __( 'Tip: Do not include opening or closing quotes.', 'cmb2' ),
	'type'  => 'textarea_small'
 ));
 $testimonial->add_field( array(
    'name'        => __( 'Related Sponsor' ),
    'id'          => $prefix.'sponsor',
	'desc' 		  => __( 'Click the Search Icon to search Sponsors. Only the first sponsor listed will be used.', 'cmb2' ),
    'type'        => 'post_search_text',
    'post_type'   => 'cds_sponsor_single',
    'select_behavior' => 'replace', // Will replace any selection with selection from modal. Default is 'add'
 ));
 $testimonial->add_field(array(
	'id'    => $prefix . 'link',
	'name'  => __( 'Related Link', 'cmb2' ),
	'desc'  => __( 'Specify a link for this testimonial to point to.', 'cmb2' ),
	'type'  => 'text_url'
 ));
 return $testimonial;	
}

?>