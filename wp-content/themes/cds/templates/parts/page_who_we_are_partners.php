<?php 

//Who We Are Partners

if(empty($post_id)) $post_id = $post->ID;

//Get the partners
$partners = get_post_meta($post_id,'cds_core_partner_group',true); 

if(!empty($partners)):


//Introduce the partners ?>

<section class="partners">
  <div class="partners-wrapper">
    <div class="partners-container">
      <div class="partners-header">
        <h2 class="partners-title">
          <?php cds_meta('partners_title'); ?>
        </h2>
        <p class="partners-text">
          <?php cds_meta('partners_caption'); ?>
        </p>
      </div>
      <div class="partners-box">
        <?php
  //Loop through the partners
  $index = 0;
  foreach($partners as $partner ): 
  	
	$partner_single = $partners[$index];	

	//Display the given partner

	//Get the headshot directly because of how CMB2 Group Fields Work
	$partner_thumbnail = image_downsize($partner_single['thumbnail_id'],'thumbnail')[0]; 
	$partner_link = $partner_single['link']; //The Partner's Link
		
	?><a href="<?php echo $partner_link; ?>" class="partners-icon" style="background-image: url('<?php echo($partner_thumbnail); ?>')"></a><?php
	
	$index++;
  endforeach; ?>
        <div class="partners-btn-container"> <a href="<?php the_permalink(cds_get_meta('partners_link')); ?>" class="btn-outline">
          <div class="btn-content">
            <h5 class="btn-text icon-arrow">
              <?php cds_meta('partner_cta'); ?>
            </h5>
          </div>
          </a> </div>
      </div>
    </div>
  </div>
</section>
<?php
endif; 
 ?>
