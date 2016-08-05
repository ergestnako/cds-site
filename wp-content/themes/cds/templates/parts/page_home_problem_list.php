<?php

//Problem List on Home Page

//Defaults
$content_list_type = 'cds_problem_single';

//Common labels for each Problem Card
$primary_cta_caption =  cds_get_meta( 'cds_problem_primary_cta_caption',false);
$secondary_cta_caption = cds_get_meta( 'cds_problem_secondary_cta_caption',false);
$repo_cta = cds_get_meta( 'cds_problem_repo_cta',false);
$form_cta = cds_get_meta( 'cds_problem_form_cta',false);
$twitter_cta = cds_get_meta( 'cds_problem_twitter_cta',false);

//Get the list of Featured cards
$features = get_post_meta($post->ID,'cds_feature_group',true);

//Get the list of Problems
$content_list_args = array(
	'post_type'   => $content_list_type,
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby'     => 'menu_order',
	'order'       => 'ASC'
);

//Define a limit of problems to show on the home page
$p_limit = 2;

$loop = new WP_Query( $content_list_args );

//If there are any problems on the board, display them
if ( $loop->have_posts() ) :
	?>

<section class="problems">
  <div class="problems-wrapper">
    <?php

	$p_index = 0; //Track the number of problems
	$p_total = $loop->post_count - 1; //Total number of problems
	$f_index = 0; //Track how many featured cards have been displayed

	while ( $loop->have_posts() ) : $loop->the_post();

	$card_title = get_the_title();

	   //Start the card row
	   if(!($p_index & 1)): //Bit-check for even/odd

			$row_class = '';
			$end_cap_class = '';

			//determine if card row is visible by default
			if($p_index + 1 > $p_limit ) $row_class = 'hidden'; ?>
    <div class="problems-container row <?php echo($row_class); ?>">
      <div class="problems-endcap-container">
      	<?php
		//if the card row only has one problem, prevent the endcap background from showing
		if($p_index != $p_total):  ?>
          <div class="problems-endcap"></div>
        <?php endif; ?>
      </div>
      <div class="problems-card-container">
        <?php
	   endif;  ?>
        <div class="problems-card between-xs">
          <div class="problems-card-box">
            <h2 class="problems-card-title">
              <?php echo($card_title);?>
            </h2>
            <div class="problems-card-info">
              <h5 class="problems-card-category">
                <?php
                $post_categories = '';
			  	
                foreach((get_the_category()) as $category):
					 $post_categories .= $category->cat_name . ', ';
				endforeach;
                
                $post_categories = trim($post_categories, ', ');                
                
                echo $post_categories;
			   ?>
              </h5>
              <h5 class="problems-card-status">
                <?php

			  //Get the related Problem Status
			  $post_terms = get_the_terms(get_the_ID(), 'cds_problem_status');

			  if(!(empty($post_terms))):
				  foreach ( $post_terms as $term ):
						echo($term->name);
				  endforeach;
			  endif; ?>
              </h5>
            </div>
          </div>
          <div class="problems-card-box">
              <?php

		   // Get the Excerpt
		   $post_excerpt =  cds_get_meta( $content_list_type.'_excerpt',false);

		   // Get list of related links
		   $repo_link = cds_get_meta( $content_list_type.'_git_link',false);
		   $form_link =  cds_get_meta( $content_list_type.'_form_link',false);
           $twitter_excerpt = cds_get_meta( $content_list_type.'_twitter_excerpt',false);
		   $twitter_hashtag = cds_get_meta( $content_list_type.'_twitter_hashtag',false);

		   // Get list of project sponsors
		   $sponsor_ids = cds_get_meta($content_list_type.'_sponsors',false);
		   $post_type = 'cds_sponsor_single';


		   //If there are any featured sponsors for this problem, display them
		   if(!empty($sponsor_ids)): ?>

            <h5 class="problems-card-subtitle">Sponsors</h5>
            <div class="problems-card-supporters">
            <?php
			  $sponsor_ids = explode(',',$sponsor_ids);

			  //Limit to first two sponsors
			  $sponsor_ids = array_slice($sponsor_ids, 0, 2);

			  //Loop through the sponsors
			  foreach($sponsor_ids as $sponsor_id ):
				$post = get_post($sponsor_id);

				setup_postdata($post);

				$sponsor_thumbnail = cds_get_image_url( $post_type.'_headshot_id','medium'); //The Sponsor's Headshot
				$sponsor_title = cds_get_meta($post_type.'_title',false); //The Sponsor's Position
				$sponsor_url =   cds_get_meta($post_type.'_link',false); //Link to the Sponsor's Website (Optional)

				?>
              <a href="<?php echo($sponsor_url); ?>" class="supporter-box">
              <div class="supporter-pic" style="background: url('<?php echo($sponsor_thumbnail); ?>') no-repeat center center;
                                                background-size: cover;"></div>
              <div class="supporter-name">
                <?php the_title(); //The Sponsor's Name ?>
              </div>
              </a>
              <?php
				wp_reset_postdata();
			  endforeach; ?>
              </div>
			<?php
			endif; ?>
          </div>
          <div class="problems-card-back">
              <div class="problems-card-box">
                  <h2 class="problems-card-title"><?php echo($card_title);?></h2>
              </div>
              <div class="problems-card-box">
                  <p class="problems-card-text"><?php echo($post_excerpt);?></p>
              </div>
              <div class="problems-btn-container">
                  <div class="btn-cta">
                      <span class="btn">
                          <div class="btn-content">
                              <h5 class="btn-text"><?php echo($primary_cta_caption); ?></h5>
                          </div>
                      </span>
                  </div>
                  <div class="problems-btn-box">
                  <?php 
                  
                    if(!empty($repo_link)): ?>
                      <a href="<?php echo($repo_link); ?>" class="btn-outline">
                          <div class="btn-content">
                              <h5 class="btn-text icon-github"><?php echo($repo_cta); ?></h5>
                          </div>
                      </a><?php 
                    endif; 
                    if(!empty($form_link)): ?>
                      <a href="<?php echo($form_link); ?>" class="btn-outline">
                          <div class="btn-content">
                              <h5 class="btn-text icon-involved"><?php echo($form_cta); ?></h5>
                          </div>
                      </a><?php
                    endif; 
                    if(!empty($twitter_excerpt)): ?>
                      <a href="https://twitter.com/intent/tweet?text=<?php echo($twitter_excerpt); ?>&url=<?php echo urlencode(get_site_url()); //URL encoded per Twitter guidelines ?>&hashtags=<?php echo($twitter_hashtag); ?>" class="btn-outline">
                          <div class="btn-content">
                              <h5 class="btn-text icon-twitter"><?php echo($twitter_cta); ?></h5>
                          </div>
                      </a><?php 
                    endif;  ?>
                  </div>
              </div>
          </div>
        </div>
        <?php

	   //End the card row if it's an even post, OR if we've displayed the last post possible
	   if(($p_index & 1) || $p_index == $p_total): ?>
      </div>
      <?php

	  if($p_index == $p_total): ?>

      <?php endif; ?>
      <?php
		   //Display a feature card in the right column, after every second problem
	   		cds_featured_card($f_index,$features);
			?>
    </div>
    <?php

			$f_index++;
	   endif;

	   $p_index++;
	endwhile;
	wp_reset_query(); 
      
    //If there's overflow, provide a Show More button
    
    if($p_total > $p_limit):?>
        <div class="problems-expand expandable"> <a href="#" class="btn">
            <div class="btn-content">
                <h5 class="btn-text">Show More Problems</h5>
            </div>
            </a> </div>
    <?php endif; ?>
    </div>
    </div>
  </div>
</section>
<?php

endif;

//Displays a featured card
//requires an index of which card to feature and an array of features
function cds_featured_card($index, $features) {

	$feature_single = $features[$index];
	//Always display container, to prevent flexbox from collapsing ?>
    <div class="problems-featured-container">
    <?php

	//If there's a featured card available, display it
	if(isset($feature_single)):
		$feature_title = $feature_single['title']; //The Card Title
		$feature_excerpt = $feature_single['excerpt']; //The Card Excerpt
		$feature_link = $feature_single['link']; //The URL the Card should link to
		$feature_thumbnail = $feature_single['thumbnail']; //The Thumbnail image attached to the Card
		?>
<a href="<?php echo($feature_link); ?>" class="problems-featured">
<div class="problems-featured-content">
  <h3 class="problems-featured-title"><?php echo($feature_title); ?></h3>
  <p class="problems-featured-text"> <?php echo($feature_excerpt); ?></p>
  <p class="problems-featured-cta">Learn More</p>
</div>
<div class="problems-featured-image" style="background: url('<?php echo($feature_thumbnail); ?>') no-repeat center center;
                        background-size: cover;"></div>
</a>
<?php
	endif; ?>
    </div>
<?php
}

?>
