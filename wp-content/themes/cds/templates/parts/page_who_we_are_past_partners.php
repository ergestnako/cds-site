<?php

//Who We Are Partners

if(empty($post_id)) $post_id = $post->ID;

//Get the past_partners
$past_partners = get_post_meta($post_id,'cds_core_past_partner_group',true);

if(!empty($past_partners)):


//Introduce the Past Partners ?>

<section class="supporters" style="background: url('<?php echo cds_get_image_url($page_prefix.'past_partners_bg_id','full'); ?>') no-repeat center center; background-size: cover; background-attachment: fixed;">
  <div class="supporters-wrapper">
    <div class="supporters-container">
      <div class="supporters-header">
        <h2 class="supporters-title"><?php cds_meta('past_partners_title'); ?></h2>
        <p class="supporters-text"><?php cds_meta('past_partners_caption'); ?></p>
      </div>
      <div class="supporters-box">
        <?php
  //Loop through the  Past Partners
  $index = 0;
  foreach($past_partners as $past_partner ):

	$past_partner_single = $past_partners[$index];

	//Display the given  Past Partners
	$past_partner_name = $past_partner_single['name']; //The Partner's Name
	$past_partner_link = $past_partner_single['link']; //The Partner's Link

	?>
        <a href="<?php echo $past_partner_link; ?>" class="supporters-name"><?php echo($past_partner_name); ?></a>
        <?php

	$index++;
  endforeach; ?>
        <div class="sponsors-btn-container"> <a href="<?php the_permalink(cds_get_meta('past_partner_link')); ?>" class="btn-outline">
          <div class="btn-content">
            <h5 class="btn-text icon-arrow">
              <?php cds_meta('past_partner_cta'); ?>
            </h5>
          </div>
          </a> <a href="<?php the_permalink(cds_get_meta('past_partner_more_link')); ?>" class="btn-text icon-plus">
          <?php cds_meta('past_partner_more_cta'); ?>
          </a> </div>
      </div>
    </div>
  </div>
</section>
<?php
endif; ?>
