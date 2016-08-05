<?php
/**
 * Template Name: Who We Are
 *
 */
  get_header(); 
  $page_prefix = 'cds_who_we_are_';
?>
<?php include('parts/page_who_we_are_hero.php'); ?>
<section class="callout">
  <div class="callout-wrapper">
    <div class="callout-container row middle-xs center-xs between-md">
      <div class="callout-box col-xs-12 col-md start-md">
        <h2 class="callout-title">
          <?php cds_meta('mission_title'); ?>
        </h2>
        <div class="callout-asterisk"></div>
      </div>
      <div class="callout-text col-xs-12 col-md-6 start-xs">
        <?php cds_wp_meta('mission_caption'); //Allow for paragraphs, etc ?>
      </div>
    </div>
  </div>
</section>
<?php include('parts/page_who_we_are_metrics.php'); //Show Metrics ?>
<section class="info">
  <div class="info-wrapper">
    <div class="info-container">
      <div class="info-image"  style="background: url('<?php echo(cds_get_image_url($page_prefix.'philosophy_thumbnail_id','large'));?>') no-repeat center center;
        background-size: cover;"></div>
      <div class="info-content">
        <h2 class="info-title"><?php cds_meta('philosophy_title'); ?></h2>
        <div class="info-text">
          <?php cds_wp_meta('philosophy_caption'); //Allow for paragraphs, etc ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('parts/page_who_we_are_team.php'); //Show Core Team ?>
<?php include('parts/page_who_we_are_congress.php'); //Show Congress Members ?>
<?php include('parts/page_who_we_are_partners.php'); //Show Partners ?>
<?php include('parts/page_who_we_are_past_partners.php'); //Show Past Partners ?>
<?php include('parts/page_cta.php'); ?>
<?php get_footer(); ?>
