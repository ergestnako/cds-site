<?php
/**
 * Template Name: Home
 *
 */

  $page_prefix = 'cds_home_';

// Home Page Hero is located in header.php
   get_header();
?>
<section class="callout" id="problems-intro">
  <div class="callout-wrapper">
    <div class="callout-container row middle-xs">
      <h2 class="callout-title col-xs-12 col-sm">
        <?php cds_meta('problems_title'); ?>
      </h2>
      <p class="callout-text col-xs-12 col-sm">
        <?php cds_meta('problems_caption'); ?>
      </p>
    </div>
  </div>
</section>
<?php include('parts/page_home_problem_list.php'); ?>
<section class="testimonial">
  <div class="testimonial-wrapper">
    <div class="testimonial-container-header row middle-xs center-xs">
      <h2 class="testimonial-title col-xs-12">
        <?php cds_meta('testimonials_title'); ?>
      </h2>
      <p class="testimonial-text col-xs-12">
        <?php cds_meta('testimonials_caption'); ?>
      </p>
    </div>
    <div class="testimonial-container row">
      <?php include('parts/page_home_testimonials.php'); ?>
    </div>
  </div>
</section>
<?php include('parts/page_cta.php'); ?>
<?php get_footer(); ?>
