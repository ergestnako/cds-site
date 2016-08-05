<?php 

// Template Part: Page CTA

// Only show the CTA if there's at minimum a title
$cta_primary_title = cds_get_meta('cta_primary_title');

if(!empty($cta_primary_title)): ?>
<section class="cta">
  <div class="cta-wrapper">
    <div class="cta-container row"> <a href="<?php cds_meta('cta_primary_cta_link'); ?>" class="cta-card-lg">
      <div class="cta-card-image" style="background: url('<?php echo cds_get_image_url($page_prefix.'cta_primary_thumbnail_id','large'); ?>') no-repeat center center; background-size: cover;"></div>
      <div class="cta-card-content">
        <h3 class="cta-card-title">
           <?php echo($cta_primary_title); ?>
        </h3>
        <h5 class="cta-card-cta">
          <?php cds_meta('cta_primary_cta'); ?>
        </h5>
      </div>
      </a> <a href="<?php cds_meta('cta_secondary_cta_link'); ?>" class="cta-card-sm">
      <div class="cta-card-content">
        <h3 class="cta-card-title">
          <?php cds_meta('cta_secondary_title'); ?>
        </h3>
        <h5 class="cta-card-cta">
          <?php cds_meta('cta_secondary_cta'); ?>
        </h5>
      </div>
      </a> </div>
  </div>
</section>
<?php endif; ?>