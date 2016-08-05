<?php 

//Contact Template Sidebar

?>
<div class="main-featured-container">
  <?php

if(empty($post_id)) $post_id = $post->ID;

//Get the partners
$contact_methods = get_post_meta($post_id,'cds_contact_methods_group',true); 

if(!empty($contact_methods)): 
  //Loop through the contact methods
  $index = 0;
  foreach($contact_methods as $contact_method ): 
  	
	$contact_method_single = $contact_methods[$index];	

	//Display the given contact method


	$contact_method_title = $contact_method_single['title']; //The CTA Link
	$contact_method_caption = $contact_method_single['caption']; //The Caption
	
	//processed through WP because of how CMB2 stores group fields
	$meta_field = $wp_embed->autoembed( $contact_method_caption );
    $contact_method_caption = $wp_embed->run_shortcode( $contact_method_caption );
    $contact_method_caption = do_shortcode( $contact_method_caption );
    $contact_method_caption = wpautop( $contact_method_caption );
	
	$contact_method_phone = $contact_method_single['phone']; //The Phone Number (Optional)
	$contact_method_email = $contact_method_single['email']; //The Email Address (Optional)
	$contact_method_cta = $contact_method_single['cta']; //The CTA Label (Optional)
	$contact_method_link = $contact_method_single['link']; //The CTA Link
		
	?>
  <div class="main-featured-box">
    <h3 class="main-featured-header"><?php echo($contact_method_title); ?></h3>
    <div class="main-featured-text"><?php echo($contact_method_caption); ?> </div>
    <?php if(!empty($contact_method_phone)): ?>
    <p class="main-featured-text phone"><?php echo($contact_method_phone); ?></p>
    <?php endif; ?>
    <?php if(!empty($contact_method_email)): ?>
    <p class="main-featured-text mail"><a href="mailto:<?php echo($contact_method_email); ?>"><?php echo($contact_method_email); ?></a></p>
    <?php endif; ?>
    <?php if(!empty($contact_method_cta)): ?>
    <a href="<?php echo $contact_method_link; ?>" class="main-featured-cta"><?php echo($contact_method_cta); ?></a>
    <?php endif; ?>
  </div>
  <?php
	
	$index++;
  endforeach; 
endif; 

 ?>
</div>
