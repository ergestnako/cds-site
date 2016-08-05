<?php 

// Template Part: Page Hero

// Allow Page Title overrides for General Template content
if(empty($hero_title)):
	$hero_title = cds_get_meta('hero_title');
	if(empty($hero_title)) $hero_title = get_the_title();
 endif;
 
 $hero_caption = cds_get_meta('hero_caption');

?>
<section class="hero" <?php cds_bg_image( $GLOBALS['page_prefix'].'hero_bg_id'); ?>>
  <div class="hero-overlay"></div>
  <div class="hero-wrapper ">
    <div class="hero-container row center-xs middle-xs between-sm start-sm">
      <div class="hero-box col-xs-12 col-md-7">
        <h1 class="hero-title"><?php echo($hero_title); ?></h1>
        <p class="hero-text"> <?php echo($hero_caption); ?> </p>
      </div>
    </div>
  </div>
</section>
