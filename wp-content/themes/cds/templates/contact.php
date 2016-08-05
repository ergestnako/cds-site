<?php
/**
 * Template Name: Contact
 *
 */
  get_header(); 
  $page_prefix = 'cds_contact_';
  
  // Allow Page Title overrides for General Template content
	if(empty($hero_title)):
		$hero_title = cds_get_meta('hero_title');
		if(empty($hero_title)) $hero_title = get_the_title();
	 endif;
	 
	 $hero_caption = cds_get_meta('hero_caption');
?>

<section class="main">
  <div class="main-wrapper">
    <div class="main-container">
      <div class="main-header">
        <h1 class="main-title"><?php echo($hero_title); ?></h1>
        <p class="main-text"><?php echo($hero_caption); ?></p>
      </div>
      <div class="main-grid">
        <?php include('parts/page_contact_sidebar.php'); ?>
        <div class="main-form-container">
          <div class="form-card">
            <?php if (have_posts()) :  //The contact form
					while (have_posts()) : the_post();
					 the_content(); 
					endwhile;
				  endif;	?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('parts/page_cta.php'); ?>
<?php get_footer(); ?>
