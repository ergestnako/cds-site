<?php 

//How It Works Audience Page List Features

//Get the list of features
$features = get_post_meta($post->ID,'cds_feature_group',true); 

if(!empty($features)):
  //Loop through the features
  $index = 0;
  foreach($features as $feature ): 
  	
	$feature_single = $features[$index];	

	//Display the given feature
	$feature_title = $feature_single['title']; //The Card Title
	$feature_excerpt = $feature_single['excerpt']; //The Card Excerpt
	$feature_thumbnail_id = $feature_single['thumbnail_id']; //The Thumbnail image attached to the Card
	$feature_id = $feature_single['link']; //The Related Page Link
	$feature_link = get_permalink($feature_id);
	
	//Get the headshot directly because of how CMB2 Group Fields Work
  	$feature_thumbnail = image_downsize( $feature_thumbnail_id,'large')[0]; 
	
	?>

<a href="<?php echo($feature_link); ?>" class="main-card">
    <div class="main-card-image" style="background: url('<?php echo($feature_thumbnail); ?>') no-repeat center center; background-size: cover;"></div>
    <div class="main-card-content">
      <h1 class="main-card-number"><?php echo(($index+1)); // The number of the card?></h1>
      <h1 class="main-card-title"><?php echo($feature_title); ?></h1>
      <p class="main-card-text"><?php echo($feature_excerpt); ?></p>
    </div>
</a>
<?php
	$index++;
  endforeach;
endif; 

?>
