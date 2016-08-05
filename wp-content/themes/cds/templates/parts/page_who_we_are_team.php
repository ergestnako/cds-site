<?php 

//Who We Are Core Team 

if(empty($post_id)) $post_id = $post->ID;

//Get the team members
$team_members = get_post_meta($post_id,'cds_core_team_group',true); 

if(!empty($team_members)): 

//Introduce the team ?>

<section class="team">
  <div class="team-wrapper">
    <div class="team-container">
      <h2 class="team-title"><?php cds_meta('team_title'); ?></h2>
      <div class="team-card-container">
        <?php
  //Loop through the team members
  $index = 0;
  foreach($team_members as $team_member ): 
  	
	$team_member_single = $team_members[$index];	

	//Display the given team member
	$team_member_name = $team_member_single['name']; //The Team Member's Title/Position
	$team_member_title = $team_member_single['title']; //The Team Member's Title/Position
	
	//Get the headshot directly because of how CMB2 Group Fields Work
	$team_member_thumbnail = image_downsize($team_member_single['thumbnail_id'],'large')[0]; 
	
	?>
        <div class="team-card">
          <div class="team-card-image" style="background: url(' <?php echo($team_member_thumbnail); ?>') no-repeat center center; background-size: cover;"></div>
          <div class="team-card-content">
            <h4 class="team-card-name"> <?php echo($team_member_name); ?></h4>
            <h5 class="team-card-position"><?php echo($team_member_title); ?></h5>
          </div>
        </div>
        <?php
	
	$index++;
  endforeach; ?>
      </div>
      <div class="team-expand"> <a href="<?php the_permalink(cds_get_meta('team_link')); ?>" class="btn">
        <div class="btn-content">
          <h5 class="btn-text">
            <?php cds_meta('team_cta'); ?>
          </h5>
        </div>
        </a> </div>
    </div>
  </div>
</section>
<?php
   
endif; 

?>
