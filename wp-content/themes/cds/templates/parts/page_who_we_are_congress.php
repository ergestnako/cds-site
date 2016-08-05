<?php 
//Who We Are Active Congress Members

if(empty($post_id)) $post_id = $post->ID;

//Get congress members
$congress_members = cds_get_meta('congress_members',true); 

$post_type = 'cds_sponsor_single';

//how many congressmembers to reveal initially
$c_limit = 8; 

//If there are any featured congress members, display them
if(!empty($congress_members)):

  //Introduce the congress members ?>

<section class="congress">
  <div class="congress-wrapper">
    <div class="congress-container">
      <div class="congress-header">
        <h2 class="congress-title"><?php cds_meta('congress_title'); ?></h2>
        <p class="congress-text"><?php cds_meta('congress_caption'); ?></p>
      </div>
      <div class="congress-card-container">
        <?php

  $congress_members = explode(',',$congress_members);
  
  $c_index = 0; //the current congressmember
  $c_total = sizeof($congress_members) - 1; //Total number of problems
 
  //Loop through the sponsors
  foreach($congress_members as $congress_member ): 	
	$post = get_post($congress_member);
	
	setup_postdata($post);
  
	$sponsor_thumbnail = cds_get_image_url( $post_type.'_headshot_id','medium'); //The Sponsor's Headshot
	$sponsor_affiliation = cds_get_meta($post_type.'_affiliation',false); //The Sponsor's Position 
	$sponsor_url =   cds_get_meta($post_type.'_link',false); //Link to the Sponsor's Website (Optional) 

	//determine if card row is visible by default 
	$row_class = '';
	if($c_index + 1 > $c_limit ):
		 $row_class = 'hidden';
	endif;
	?>
        <a href="<?php echo($sponsor_url); ?>" class="congress-card <?php echo($row_class) ?>">
        <div class="congress-card-image" style="background: url('<?php echo($sponsor_thumbnail); ?>') no-repeat center center;
                            background-size: cover;"></div>
        <h5 class="congress-card-name">
          <?php the_title(); //The Sponsor's Name ?>
        </h5>
        <p class="congress-card-state"><?php echo($sponsor_affiliation); ?></p>
        </a>
        <?php 
    $c_index++;
	wp_reset_postdata();	
  endforeach; ?>
      </div>
       <?php 
      //If there's overflow, provide a Show More button
      
      if($c_total > $c_limit): ?>
      <div class="congress-btn-container"> <a href="#" class="btn-text icon-arrow-down expandable">See More</a> </div>
      <?php endif; ?> 
      <div class="congress-btn-container"> <a href="<?php the_permalink(cds_get_meta('congress_link')); ?>" class="btn-outline">
        <div class="btn-content">
          <h5 class="btn-text icon-arrow">
            <?php cds_meta('congress_cta'); ?>
          </h5>
        </div>
        </a> </div>
    </div>
  </div>
</section>
<?php
endif; ?>
