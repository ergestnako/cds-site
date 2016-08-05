<?php
/**
 * Template Name: How It Works Audience
 *
 */
  get_header(); 
  $page_prefix = 'cds_how_it_works_single_';
?>
<?php include('parts/page_hero.php'); ?>
        <section class="main">
            <div class="main-wrapper">
                <div class="main-container row">
                    <?php include('parts/page_how_it_works_single_features.php'); ?>
                </div>
            </div>
        </section>

<?php include('parts/page_how_it_works_single_cta.php'); ?>

<?php include('parts/page_cta.php'); ?>

<?php get_footer(); ?>