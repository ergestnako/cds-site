<?php

//Shared Metabox Functions and Settings

//Page-specific metaboxes are located in /lib/metaboxes/

//Sets up Custom fields for a landing page hero
function cds_hero_meta($prefix,$template,$cta = false){

  $hero = new_cmb2_box( array(
    'id'            => $prefix.'hero',
    'title'         => __( 'Page Hero', 'cmb2' ),
    'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/'.$template.'.php'),
    'context'       => 'normal',
    'show_names'    => true,
    'closed'        => true,
  ));
  
  $prefix = $prefix.'hero_';
  
  $hero->add_field(array(
    'id'    => $prefix . 'title',
    'name'  => __( 'Hero Title', 'cmb2' ),
    'type'  => 'wysiwyg',
  ));
  $hero->add_field(array(
    'id'    => $prefix . 'caption',
    'name'  => __( 'Hero Caption', 'cmb2' ),
    'type'  => 'textarea_small',
  ));
  if($cta){
	  $hero->add_field(array(
		'id'    => $prefix . 'cta',
		'name'  => __( 'Hero Call to Action Text', 'cmb2' ),
		'type'  => 'text',
		'default' => 'Read On'
	  ));
  }
  $hero->add_field(array(
    'id'    => $prefix . 'bg',
    'name'  => __( 'Hero Background Image', 'cmb2' ),
    'type'  => 'file',
  ));
}


//Sets up Custom fields for an Intro Section on a page
function cds_intro_meta($prefix,$template,$label, $html = true, $caption = true, $image = false){

  $intro = new_cmb2_box( array(
    'id'            => $prefix.'intro',
    'title'         => __( $label .' Intro', 'cmb2' ),
    'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/'.$template.'.php'),
    'context'       => 'normal',
    'show_names'    => true,
    'closed'        => true,
  ));
  if($image) {
	  $intro->add_field(array(
		'id'    => $prefix . 'thumbnail',
		'name'  => __(  $label .' Thumbnail', 'cmb2' ),
		'type'  =>  'file'
	  ));
  }
  $intro->add_field(array(
    'id'    => $prefix . 'title',
    'name'  => __(  $label .' Title', 'cmb2' ),
    'type'  => 'textarea_small',
  ));
  
  if($html) {
	  $caption_type = 'wysiwyg';
	  $options_array = array(
        'media_buttons' => false, // show insert/upload button(s)
	  );
  } else {
	  $caption_type = 'textarea_small';
      $options_array = array();
  }
  if($caption) {
	  $intro->add_field(array(
		'id'    => $prefix . 'caption',
		'name'  => __(  $label .' Caption', 'cmb2' ),
		'type'  =>  $caption_type,
		'options' => $options_array
	  ));
  }

}



//Sets up Custom fields for a Landing Page CTA block
function cds_cta_meta($prefix,$template){
	cds_cta_meta_helper($prefix.'cta_primary_',$template,'Primary',true); //Use a photo
	cds_cta_meta_helper($prefix.'cta_secondary_',$template,'Secondary');  
}

function cds_cta_meta_helper($prefix,$template,$label, $photo = false) {
	$cta = new_cmb2_box( array(
    'id'            => $prefix,
    'title'         => __( $label . ' CTA', 'cmb2' ),
    'object_types'  => array('page'),
    'show_on'       => array('key' => 'page-template', 'value' => 'templates/'.$template.'.php'),
    'context'       => 'normal',
    'show_names'    => true,
    'closed'        => true,
  ));
  
  
  $cta->add_field(array(
    'id'    => $prefix . 'title',
    'name'  => __( $label . '  Title', 'cmb2' ),
    'type'  => 'textarea_small',
  ));
  
  if($photo) {
	 $cta->add_field(array(
    'id'    => $prefix . 'thumbnail',
    'name'  => __( $label . ' Thumbnail', 'cmb2' ),
	'description' => 'A preview image to go with this CTA',
    'type'  => 'file'
  )); 
  }  
  $cta->add_field(array(
    'id'    => $prefix . 'cta',
    'name'  => __( $label . ' Link Text', 'cmb2' ),
    'type'  => 'text',
    'default' => 'Learn More'
  ));
  $cta->add_field(array(
    'id'    => $prefix . 'link',
    'name'  => __( $label . ' Link URL', 'cmb2' ),
    'type'  => 'text_url'
  ));    
}


//Display value of a Custom field
function cds_meta($meta_field, $short = true) {
	if($short == true){ //if we're not overriding the page_prefix, amend the meta field
		$meta_field = $GLOBALS['page_prefix'].$meta_field ;
	}	
	echo nl2br(get_post_meta( get_the_ID(), $meta_field, true )); 
}

//Get value of a Custom field
function cds_get_meta($meta_field, $short = true) {
	if($short == true){ //if we're not overriding the page_prefix, amend the meta field
		$meta_field = $GLOBALS['page_prefix'].$meta_field ;
	}
	return nl2br(get_post_meta( get_the_ID(), $meta_field, true )); 
}

//Displays value of a Custom field, processed for Paragraph tags and Shortcodes
function cds_wp_meta($meta_field, $short = true) {
	global $wp_embed;
	
	if($short == true){ //if we're not overriding the page_prefix, amend the meta field
		$meta_field = $GLOBALS['page_prefix'].$meta_field ;
	}
	$meta_field = get_post_meta( get_the_ID(), $meta_field, true );
	
	$meta_field = $wp_embed->autoembed( $meta_field );
    $meta_field = $wp_embed->run_shortcode( $meta_field );
    $meta_field = do_shortcode( $meta_field );
    $meta_field = wpautop( $meta_field );
	
	echo ($meta_field); 
}

//Get value of a Custom field, processed for Paragraph tags and Shortcodes
function cds_get_wp_meta($meta_field, $short = true) {
	global $wp_embed;
	
	if($short == true){ //if we're not overriding the page_prefix, amend the meta field
		$meta_field = $GLOBALS['page_prefix'].$meta_field ;
	}
	$meta_field = get_post_meta( get_the_ID(), $meta_field, true );
	
	$meta_field = $wp_embed->autoembed( $meta_field );
    $meta_field = $wp_embed->run_shortcode( $meta_field );
    $meta_field = do_shortcode( $meta_field );
    $meta_field = wpautop( $meta_field );
	
	return ($meta_field); 
}


// Sets a background image if there is one specified.
// We prefer the image ID and not the uploaded image URL,
// because it allows us to locate WordPress's resized versions  
  function cds_bg_image($image_id, $scroll = 'scroll', $post_id = NULL) {
	
	//Allow a global override  
	if(!empty( $GLOBALS['hero_bg_url'])){
		 $image = $GLOBALS['hero_bg_url']; 
	} else {
		$image = cds_get_image_url($image_id,'large');
	}
	
	//if we can't find an image, try to use WP featured image instead
    if (empty($image)) {
		$image = get_the_post_thumbnail_url($post_id);
    }
	if(empty($image)){
		global $post;
		$image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
	  }

	$url = "background: url('".$image."') center center no-repeat " . $scroll . "; ";
    $props = "background-size: cover;";
    echo('style="'.$url.$props.'"');
  }
  
  // Get the URL to a particular image within a post, based on a metafield
  // We prefer the image ID and not the uploaded image URL,
  // because it allows us to locate WordPress's resized versions  
  function cds_get_image_url($image_id,$size = 'thumbnail', $post_id = NULL) {

	   if(empty($post_id)) $post_id =  get_the_ID(); //if no post id is specified, default to the post ID global

	   $image = get_post_meta( $post_id, $image_id, true ); //get the image from the metabox plugin

	   if(!($image)) {
		  return false;
		}
	   $image_backup = $image;
	   $image = image_downsize($image,$size); //find the resized version
	   $image = $image[0]; // return the first result

	    // if there's no appropiately sized available image, revert back to the last known URL
		if(!($image)) {
		  $image = $image_backup;
		}
	   return $image;
   }

  // Get the Wordpress Attachment ID based on an image's url. 
  // used to find alternate wordpress image sizes based on uploaded urls in custom metaboxes  
  function cds_get_attachment_id_from_src ($image_src) {

		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
		$id = $wpdb->get_var($query);
		return $id;

	}

/**
* Retrieve a custom post given its title, without knowing what the post type is
*
* @uses $wpdb
*
* @param string $post_title Page title
* @param string $output Optional. Output type. OBJECT, ARRAY_N, or ARRAY_A.
* @return mixed
*/
function get_custom_post_by_title($page_title, $output = OBJECT) {
	
    global $wpdb;
        $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s", $page_title));
        if ( $post )
            return get_post($post, $output);

    return null;
}

 ?>