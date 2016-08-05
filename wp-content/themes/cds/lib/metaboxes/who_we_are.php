<?php

// Register Metaboxes for the Who We Are Page
function cds_who_we_are_meta() {
  $prefix = 'cds_who_we_are_';

  // Set up a hero section for these pages
  cds_hero_meta($prefix,'who_we_are'); //No call to action
 
  //Introduce the mission
  cds_intro_meta($prefix.'mission_','who_we_are','Mission',true);
  
  //Display performance metrics
 $prefix.= 'metric_';
 
 $metrics = new_cmb2_box( array(
    'id'            => $prefix.'s',
    'title'         => __( 'Metrics', 'cmb2' ),
    'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/who_we_are.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
 ));
 
 $metrics->add_field( array(
    'name'          => 'Visible',
	'desc'    		=> 'You can hide this section until you have metrics ready.',
    'id'    		=> $prefix . 'visible',
    'type'          => 'radio_inline',
	'default' 		=> 'invisible',
    'options'       => array(
        'visible' 		=> __( 'Show Metrics on Site', 'cmb2' ),
        'invisible'   	=> __( 'Hide Metrics from Site', 'cmb2' )
    )
 ));
 
 $metrics->add_field(array(
	'id'    => $prefix . '1_title',
	'name'  => __( 'Primary Metric', 'cmb2' ),
	'desc'  => __( 'A big number. Ex: $85,000', 'cmb2' ),
	'type'  => 'text',
 ));
  $metrics->add_field(array(
	'id'    => $prefix . '1_caption',
	'name'  => __( 'Primary Metric Caption', 'cmb2' ),
	'desc'  => __( 'Explain the big number. Ex: Estimated Tax Dollars Saved Since 2015', 'cmb2' ),
	'type'  => 'text',
 ));
 
 //Repeat 4 more metrics
 for($index = 2; $index <= 5; $index++){
	$metrics->add_field(array(
		'id'    => $prefix . $index . '_title',
		'name'  => __( 'Metric #' . $index, 'cmb2' ),
		'desc'  => __( 'A two-digit (or less) number. Ex: 24', 'cmb2' ),
		'type'  => 'text',
	 ));
	  $metrics->add_field(array(
		'id'    =>  $prefix . $index . '_caption',
		'name'  => __( 'Metric #' . $index . ' Caption', 'cmb2' ),
		'desc'  => __( 'Explain this number. Ex: Problems Logged', 'cmb2' ),
		'type'  => 'text',
	 ));
 }
 
  $prefix = 'cds_who_we_are_'; //Reset the prefix
  
  //Introduce the philosophy
  cds_intro_meta($prefix.'philosophy_','who_we_are','Philosophy',true,true,true); //HTML, Has a caption, has an image
  
 //Set up core team
 $team = new_cmb2_box( array(
    'id'            => $prefix.'teams',
    'title'         => __( 'Core Team', 'cmb2' ),
	'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/who_we_are.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
  ));
  
  $team->add_field(array(
	'id'    => $prefix . 'team_title',
	'name'  => __( 'Core Team Headline', 'cmb2' ),
	'desc'  => __( 'Ex: Meet the Team', 'cmb2' ),
	'type'  => 'text',
  )); 
  
  $team_core = $team->add_field( array(
	'id'          => 'cds_core_team_group',
	'type'        => 'group',
	'description' => __( 'Manage team member', 'cmb2' ),
	'options'     => array(
		'group_title'   => __( 'Team Member {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'    => __( 'Add Another Team Member', 'cmb2' ),
		'remove_button' => __( 'Remove Team Member', 'cmb2' ),
		'sortable'      => true, // beta
		'closed'     => true, // true to have the groups closed by default
	),
  ));
  
  $team->add_group_field( $team_core, array(
	  'name' => 'Name',
	  'id'   => 'name',
	  'type' => 'text',
  ));
  $team->add_group_field( $team_core, array(
	  'name' => 'Title',
	  'id'   => 'title',
	  'description' => 'Ex: Founder',	  
	  'type' => 'text',
  ));
  $team->add_group_field( $team_core, array(
	  'name' => 'Headshot',
	  'id'   => 'thumbnail',
	  'type' => 'file',
  )); 
  $team->add_field(array(
	'id'    => $prefix . 'team_cta',
	'name'  => __( 'Core Team Join CTA', 'cmb2' ),
	'desc'  => __( 'Ex: Become Part of the Team', 'cmb2' ),
	'type'  => 'text',
  )); 
  $team->add_field(array(
	'id'    => $prefix . 'team_link',
	'name'  => __( 'Core Team Join Link', 'cmb2' ),
	'desc' 		  => __( 'Specify what page this should link to. Click the Search Icon to search Pages.', 'cmb2' ),
    'type'        => 'post_search_text',
    'post_type'   => 'pages',
    'select_behavior' => 'replace', // Will replace any selection with selection from modal. Default is 'add'
  ));   
  
  //Set up Active Congress Members
  $congress = new_cmb2_box( array(
    'id'            => $prefix.'congress',
    'title'         => __( 'Congress Members', 'cmb2' ),
	'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/who_we_are.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
  ));
  $congress->add_field(array(
	'id'    => $prefix . 'congress_title',
	'name'  => __( 'Congress Members Headline', 'cmb2' ),
	'desc'  => __( 'Ex: Meet our Active Members of Congress', 'cmb2' ),
	'type'  => 'textarea_small',
  ));
  $congress->add_field(array(
	'id'    => $prefix . 'congress_caption',
	'name'  => __( 'Congress Members Caption', 'cmb2' ),
	'desc'  => __( 'A short caption introducing your active members of Congress.', 'cmb2' ),
	'type'  => 'textarea_small',
  ));  
  $congress->add_field(array(
	'id'    => $prefix . 'congress_members',
	'name'  => __( 'Active Members of Congress', 'cmb2' ),
	'desc' 		  => __( 'Specify which Congress Members you want to feature. Click the Search Icon to search and add (Congressional) Sponsors.', 'cmb2' ),
    'type'        => 'post_search_text',
    'post_type'   => 'cds_sponsor_single',
    'select_behavior' => 'add', // Will replace any selection with selection from modal. Default is 'add'
  ));
  $congress->add_field(array(
	'id'    => $prefix . 'congress_cta',
	'name'  => __( 'Congress Join CTA', 'cmb2' ),
	'desc'  => __( 'Ex: Get Involved', 'cmb2' ),
	'type'  => 'text',
  )); 
  $congress->add_field(array(
	'id'    => $prefix . 'congress_link',
	'name'  => __( 'Congress Join Link', 'cmb2' ),
	'desc' 		  => __( 'Specify what page this should link to. Click the Search Icon to search Pages.', 'cmb2' ),
    'type'        => 'post_search_text',
    'post_type'   => 'page',
    'select_behavior' => 'replace', // Will replace any selection with selection from modal. Default is 'add'
  )); 
  
  //Set up Partners
  $partners = new_cmb2_box( array(
    'id'            => $prefix.'partners',
    'title'         => __( 'Partners', 'cmb2' ),
	'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/who_we_are.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
  ));
  
  $partners->add_field(array(
	'id'    => $prefix . 'partners_title',
	'name'  => __( 'Partners Headline', 'cmb2' ),
	'desc'  => __( 'Ex: Meet Our Partnersr', 'cmb2' ),
	'type'  => 'textarea_small',
  )); 
  $partners->add_field(array(
	'id'    => $prefix . 'partners_caption',
	'name'  => __( 'Partners Caption', 'cmb2' ),
	'desc'  => __( 'A short caption introducing your partners.', 'cmb2' ),
	'type'  => 'textarea_small',
  )); 
  
  $team_partners = $partners->add_field( array(
	'id'          => 'cds_core_partner_group',
	'type'        => 'group',
	'description' => __( 'Manage partners', 'cmb2' ),
	'options'     => array(
		'group_title'   => __( 'Partner  {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'    => __( 'Add Another Partner', 'cmb2' ),
		'remove_button' => __( 'Remove Partner', 'cmb2' ),
		'sortable'      => true, // beta
		'closed'     => true, // true to have the groups closed by default
	),
  ));
  $partners->add_group_field( $team_partners, array(
	  'name' => 'Partner Logo',
	  'id'   => 'thumbnail',
	  'type' => 'file',
  )); 
  $partners->add_group_field( $team_partners, array(
	  'name' => 'Partner Link',
	  'id'   => 'link',
	  'desc'  => __( 'Ex: http://www.house.gov', 'cmb2' ),
	  'type' => 'text_url',
  ));
  $partners->add_field(array(
	'id'    => $prefix . 'partner_cta',
	'name'  => __( 'Partner Join CTA', 'cmb2' ),
	'desc'  => __( 'Ex: Get Involved', 'cmb2' ),
	'type'  => 'text',
  )); 
  $partners->add_field(array(
	'id'    => $prefix . 'partner_link',
	'name'  => __( 'Partner Join Link', 'cmb2' ),
	'desc' 		  => __( 'Specify what page this should link to. Click the Search Icon to search Pages.', 'cmb2' ),
    'type'        => 'post_search_text',
    'post_type'   => 'pages',
    'select_behavior' => 'replace', // Will replace any selection with selection from modal. Default is 'add'
  ));
  
  //Set up Past Partners
  $past_partners = new_cmb2_box( array(
    'id'            => $prefix.'past_partners',
    'title'         => __( 'Past Partners', 'cmb2' ),
	'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/who_we_are.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
  ));
  
  $past_partners->add_field(array(
	'id'    => $prefix . 'past_partners_title',
	'name'  => __( 'Past Partners Headline', 'cmb2' ),
	'desc'  => __( 'Ex: Meet Our Past Partnersr', 'cmb2' ),
	'type'  => 'textarea_small',
  )); 
  $past_partners->add_field(array(
	'id'    => $prefix . 'past_partners_caption',
	'name'  => __( 'Past Partners Caption', 'cmb2' ),
	'desc'  => __( 'A short caption introducing your past_partners.', 'cmb2' ),
	'type'  => 'textarea_small',
  )); 
  $past_partners->add_field(array(
	'id'    => $prefix . 'past_partners_bg',
	'name'  => __( 'Past Partners Background', 'cmb2' ),
	'type'  => 'file',
  )); 
  
  $team_past_partners = $past_partners->add_field( array(
	'id'          => 'cds_core_past_partner_group',
	'type'        => 'group',
	'description' => __( 'Manage past_partners', 'cmb2' ),
	'options'     => array(
		'group_title'   => __( 'Past Partner  {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'    => __( 'Add Another Past Partner', 'cmb2' ),
		'remove_button' => __( 'Remove Past Partner', 'cmb2' ),
		'sortable'      => true, // beta
		'closed'     => true, // true to have the groups closed by default
	),
  ));
  $past_partners->add_group_field( $team_past_partners, array(
	  'name' => 'Past Partner Name',
	  'id'   => 'name',
	  'type' => 'text',
  )); 
  $past_partners->add_group_field( $team_past_partners, array(
	  'name' => 'Past Partner Link',
	  'id'   => 'link',
	  'desc'  => __( 'Ex: http://www.house.gov', 'cmb2' ),
	  'type' => 'text_url',
  ));
  $past_partners->add_field(array(
	'id'    => $prefix . 'past_partner_cta',
	'name'  => __( 'Past Partner Join CTA', 'cmb2' ),
	'desc'  => __( 'Ex: Sponsor a Hack', 'cmb2' ),
	'type'  => 'text',
  )); 
  $past_partners->add_field(array(
	'id'    => $prefix . 'past_partner_link',
	'name'  => __( 'Past Partner Join Link', 'cmb2' ),
	'desc' 		  => __( 'Specify what page this should link to. Click the Search Icon to search Pages.', 'cmb2' ),
    'type'        => 'post_search_text',
    'post_type'   => 'pages',
    'select_behavior' => 'replace', // Will replace any selection with selection from modal. Default is 'add'
  ));    
  $past_partners->add_field(array(
	'id'    => $prefix . 'past_partner_more_cta',
	'name'  => __( 'Past Partner See More CTA', 'cmb2' ),
	'desc'  => __( 'Ex: See More Sponsors', 'cmb2' ),
	'type'  => 'text',
  )); 
  $past_partners->add_field(array(
	'id'    => $prefix . 'past_partner_more_link',
	'name'  => __( 'Past Partner See More Link', 'cmb2' ),
	'desc' 		  => __( 'Specify what page this should link to. Click the Search Icon to search Pages.', 'cmb2' ),
    'type'        => 'post_search_text',
    'post_type'   => 'pages',
    'select_behavior' => 'replace', // Will replace any selection with selection from modal. Default is 'add'
  ));      


  // Set up a call to action footer for these pages
  cds_cta_meta($prefix,'who_we_are');
}

add_action('cmb2_init', 'cds_who_we_are_meta');



?>