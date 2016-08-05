<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1., user-scalable=no" />
<?php wp_head(); ?>
</head>
<body <?php body_class($body_class); ?>>
<?php

// On Homepage, show a special header
if(is_front_page()):?>
<section class="hero" <?php cds_bg_image( $GLOBALS[ 'page_prefix']. 'hero_bg_id'); ?>>
    <div class="hero-overlay"></div>
    <div class="hero-wrapper">
        <div class="hero-container row center-xs middle-xs between-sm start-sm">
            <div class="hero-box col-xs-12 col-sm-6 center-xs">
                <div class="hero-logo"></div>
            </div>
            <div class="hero-box col-xs-12 col-sm-4 col-md-5 bottom-xs">
                <h1 class="hero-title"><?php cds_meta('hero_title'); ?></h1>
                <p class="hero-subtitle">
                    <?php cds_meta('hero_caption'); ?>
                </p>
                <a data-scroll href="#problems-intro" class="hero-cta">
                    <?php cds_meta('hero_cta'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="header">
    <div class="header-wrapper">
        <div class="header-container row">
            <div class="header-content">
                <a href="<?php echo get_site_url(); ?>" class="header-logo"></a>
                <div class="header-menu-btn">Menu</div>
            </div>
            <nav class="menu">
                <?php cds_menu('cds_header_main_nav');  ?>
                <div class="menu-more">
                    <div class="menu-more-label">More</div>
                    <?php cds_menu('cds_header_more_nav'); ?>
                </div>
            </nav>
        </div>
    </div>
</section>
