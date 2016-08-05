<?php 

//Testmonial List on Home Page 

//Loop through up to 2 testimonials in this version   
for($index = 0; $index < 2; $index++):

  //Get the basic testimonial information
  $testimonial_prefix = 'cds_home_testimonial_' . ($index + 1) . '_'; 
  $testimonial_excerpt = cds_get_meta( $testimonial_prefix.'excerpt',false); //The Excerpt
  $testimonial_link = cds_get_meta( $testimonial_prefix.'link',false); //The Link
  
  //Find the related sponsor
  $sponsor_id = cds_get_meta($testimonial_prefix.'sponsor',false);
  $post_type = 'cds_sponsor_single';
  
  //If there are any featured sponsors for this testimonial, get their data
  if(!empty($sponsor_id)):
	$sponsor_id = explode(',',$sponsor_id);
	 
	//Limit to the first sponsors
	$sponsor_id = array_slice($sponsor_id, 0, 1);
	
	//Loop through the sponsors
	foreach($sponsor_id as $sponsor ): 	
	  $post = get_post($sponsor);
	  
	  setup_postdata($post);
  
	  $sponsor_thumbnail = cds_get_image_url( $post_type.'_headshot_id','medium'); //The Sponsor's Headshot
	  $sponsor_name = get_the_title(); //The Sponsor's Name
	  $sponsor_title = cds_get_meta($post_type.'_title',false); //The Sponsor's Position  ?> 
     <a href="<?php echo($testimonial_link); ?>" class="testimonial-card">
        <h4 class="testimonial-card-text">&ldquo;<?php echo($testimonial_excerpt); ?>&rdquo;</h4>
        <div class="testimonial-person middle-xs">
          <div class="person-pic" style="background: url('<?php echo($sponsor_thumbnail); ?>') no-repeat center center;
                                    background-size: cover;"></div>
          <div class="person-details">
            <h4 class="person-name"><?php echo($sponsor_name); ?></h4>
            <p class="person-title"><?php echo($sponsor_title); ?></p>
          </div>
        </div>
        <div class="testimonial-card-cta">Read More</div>
      </a>
<?php  
	wp_reset_postdata();	
	endforeach;
  endif; 
endfor;
?> 