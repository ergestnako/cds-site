<?php 

//How It Works Audience Page CTA

?>
<section class="cta_contact">
  <div class="cta_contact-wrapper">
    <div class="cta_contact-container row">
      <div class="cta_contact-content">
        <h1 class="cta_contact-title">
          <?php cds_meta('join_title'); ?>
        </h1>
        <p class="cta_contact-text">
          <?php cds_meta('join_excerpt'); ?>
        </p>
        <div class="cta_contact-btn"> <a href="<?php the_permalink(cds_get_meta('join_link')); ?>" class="btn">
          <div class="btn-content">
            <h5 class="btn-text">
              <?php cds_meta('join_cta'); ?>
            </h5>
          </div>
          </a> </div>
      </div>
    </div>
  </div>
</section>
