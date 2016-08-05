<?php 

//Audience List on How it Works

//Loop through up to 3 audiences in this version   
for($index = 0; $index < 3; $index++):

  //Get the basic audience information
  $audience_prefix = 'cds_how_it_works_audience_' . ($index + 1) . '_'; 
  $audience_title = cds_get_meta( $audience_prefix.'title',false); //The Audience Name
  $audience_excerpt = cds_get_meta( $audience_prefix.'excerpt',false); //The Excerpt
  $audience_thumbnail = cds_get_image_url($audience_prefix.'thumbnail_id','large');
  $audience_link = get_permalink($audience_id);
  
  ?>

<a href="<?php echo($audience_link); ?>" class="rebuild-card">
<div class="rebuild-card-image" style="background: url('<?php echo($audience_thumbnail);?>') no-repeat center center;
                        background-size: cover;"></div>
<div class="rebuild-card-content">
  <h6 class="rebuild-card-tagline">For</h6>
  <h2 class="rebuild-card-title"> <?php echo($audience_title); ?></h2>
  <p class="rebuild-card-text"> <?php echo($audience_excerpt); ?></p>
</div>
</a>
<?php

endfor;

//Display the last, fallback audience
$audience_excerpt = cds_get_meta( 'cds_how_it_works_audience_4_cta',false); //The Excerpt
$audience_id = cds_get_meta( 'cds_how_it_works_audience_4_link',false); //The Excerpt
$audience_link = get_permalink($audience_id);

?>
<a href="<?php echo($audience_link); ?>" class="rebuild-cta"><?php echo($audience_excerpt); ?></a>  