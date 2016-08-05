<?php
/**
 * Template Name: How It Works
 *
 */
  get_header(); 
  $page_prefix = 'cds_how_it_works_';
?>
<?php include('parts/page_hero.php'); ?>
<section class="callout">
  <div class="callout-wrapper">
    <div class="callout-container row middle-xs center-xs between-md">
      <div class="callout-box col-xs-12 col-md start-md">
        <h2 class="callout-title">
          <?php cds_meta('excerpt_title'); ?>
        </h2>
        <div class="callout-asterisk"></div>
      </div>
      <div class="callout-text col-xs-12 col-md-6 start-xs">
        <?php cds_wp_meta('excerpt_caption'); //Allow for paragraphs, etc ?>
      </div>
    </div>
  </div>
</section>
<section class="interactive">
  <div class="interactive-wrapper">
    <embed src="<?php echo get_template_directory_uri(); ?>/lib/images/svgs/how-it-works.svg" type="image/svg+xml"/>
  </div>
</section>
<section class="rebuild">
  <div class="rebuild-wrapper">
    <div class="rebuild-container-header col-xs-12 center-xs">
      <h2 class="rebuild-title">
        <?php cds_meta('audience_title'); ?>
      </h2>
      <p class="rebuild-text">
        <?php cds_meta('audience_caption'); ?>
      </p>
    </div>
    <div class="rebuild-container row">
      <?php include('parts/page_how_it_works_audiences.php'); ?>
    </div>
  </div>
</section>
<?php include('parts/page_cta.php'); ?>
<?php get_footer(); ?>
