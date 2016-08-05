<?php 

//Who We Are Metrics

//If the Metrics are set to Visible
if(cds_get_meta('metric_visible') == 'visible'):

?>

<section class="stats">
  <div class="stats-wrapper">
    <div class="stats-overlay"></div>
    <div class="stats-container row between-xs">
      <div class="stats-box">
        <?php
	 //Get up to 4 smaller metrics first
	 for($index = 2; $index <= 5; $index++): 
	 	$metric_prefix = 'metric_' . $index; ?>
        <div class="stats-item">
          <h1 class="stats-item-number">
            <?php cds_meta( $metric_prefix . '_title');?>
          </h1>
          <h5 class="stats-item-label">
            <?php cds_meta( $metric_prefix . '_caption');?>
          </h5>
        </div>
        <?php
	 endfor;  ?>
      </div>
      <?php	 //Display bigger metric ?>
      <div class="stats-box-lg">
        <h1 class="stats-number">
          <?php cds_meta('metric_1_title'); ?>
        </h1>
        <h5 class="stats-label">
          <?php cds_meta('metric_1_caption'); ?>
        </h5>
      </div>
    </div>
  </div>
</section>
<?php
 endif;
 ?>
