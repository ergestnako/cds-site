<section class="footer">
  <div class="footer-wrapper">
    <div class="footer-container">
      <div class="footer-box">
        <h5 class="footer-title">Contact Us</h5>
        <?php cds_footer_menu('cds_footer_main_nav'); ?>
      </div>
      <div class="footer-logo-box">
        <div class="footer-logo"></div>
      </div>
      <div class="footer-box">
        <h5 class="footer-title">Policies</h5>
        <?php cds_footer_menu('cds_footer_main_nav_right'); ?>
      </div>
      <div class="footer-closing-box">
        <p class="footer-address"><?php echo get_option('cds_footer_address'); ?></p>
        <p class="footer-phone"><?php echo get_option('cds_footer_phone'); ?></p>
        <p class="footer-copyright"><?php echo get_option('cds_footer_copyright'); ?></p>
      </div>
    </div>
  </div>
</section>
<?php wp_footer(); ?>
</body></html>
