<?php

// Register Metaboxes for How It Works
function cds_how_it_works_meta() {
  $prefix = 'cds_how_it_works_';

 // Set up a hero section for these pages
 cds_hero_meta($prefix,'how_it_works'); //No call to action
 
 //Introduce the How It Works Diagram
 cds_intro_meta($prefix.'excerpt_','how_it_works','How It Works',true);
 
 //Introduce the Audiences
 cds_intro_meta($prefix.'audience_','how_it_works','Audiences', true);
 
 //For this version of the site, we only support 3 audiences on the How It Works page, but could be expanded in future versions
 $audience_1 = cds_audience_meta_helper($prefix.'audience_',1);
 $audience_2 = cds_audience_meta_helper($prefix.'audience_',2);
 $audience_3 = cds_audience_meta_helper($prefix.'audience_',3);

 //Set up a catch-all audience for everyone else
 $audience_4 = new_cmb2_box( array(
    'id'            => $prefix . 'audience_4',
    'title'         => __( 'Audience Option #4', 'cmb2' ),
    'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/how_it_works.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
 ));
 $audience_4->add_field(array(
	'id'    => $prefix . 'audience_4_cta',
	'name'  => __( 'Audience 4 Call to Action', 'cmb2' ),
	'desc'  => __( 'Ex: Let us help.', 'cmb2' ),
	'type'  => 'text'
 ));
 $audience_4->add_field(array(
	'id'    => $prefix . 'audience_4_link',
	'name'  => __( 'Audience 4 Link', 'cmb2' ),
	'desc'  => __( 'Specify a page for this sentence to point to.', 'cmb2' ),
	'type'        => 'post_search_text',
    'post_type'   => 'page'
 )); 
 
 //Set up a call to action footer for these pages
 cds_cta_meta($prefix,'how_it_works');
}

add_action('cmb2_init', 'cds_how_it_works_meta');

//Helps set up metadata for individual audience content.
function cds_audience_meta_helper($prefix,$index){
	
 $audience = new_cmb2_box( array(
    'id'            => $prefix . $index,
    'title'         => __( 'Audience Card #' . $index, 'cmb2' ),
    'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/how_it_works.php'),
    'context'       => 'normal',
    'show_names'    => true,
	'closed'        => true
 ));
 
 $prefix.= $index .'_';
 
 $audience->add_field(array(
	'id'    => $prefix . 'title',
	'name'  => __( 'Audience Name', 'cmb2' ),
	'desc'  => __( 'Ex: Federal Government Insiders', 'cmb2' ),
	'type'  => 'text'
 ));
 $audience->add_field(array(
	'id'    => $prefix . 'excerpt',
	'name'  => __( 'Audience Excerpt', 'cmb2' ),
	'desc'  => __( 'Caption this audience.', 'cmb2' ),
	'type'  => 'textarea_small'
 ));
  $audience->add_field(array(
	'id'    => $prefix . 'thumbnail',
	'name'  => __( 'Audience Card Thumbnail', 'cmb2' ),
	'description' => 'A preview image to go with this audience',
	'type'  => 'file'
 ));
 $audience->add_field(array(
	'id'    => $prefix . 'link',
	'name'  => __( 'Audience Link', 'cmb2' ),
	'desc'  => __( 'Specify a page for this card to point to.', 'cmb2' ),
	'type'        => 'post_search_text',
    'post_type'   => 'page',
    'select_behavior' => 'replace'
 ));
 return $audience;	
}

?>