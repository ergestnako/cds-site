<?php

// Header and Footer Menus

// Register custom header menus
function register_cds_menus() {
  register_nav_menus(
    array(
      'cds_header_main_nav' => __( 'Main Menu' ),
	  'cds_header_more_nav' => __( 'More Menu' ),
	  'cds_footer_main_nav' => __('Footer Contact Us Menu'),
  	  'cds_footer_main_nav_right' => __('Footer Contact Us Policies')
    )
  );
}
add_action( 'init', 'register_cds_menus' );

//Display custom header menus
function cds_menu($theme_location) {
	$menuParameters =  array(
		'theme_location' => $theme_location,
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu-content',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
	);
	wp_nav_menu($menuParameters);
}

//Display custom header menus
function cds_footer_menu($theme_location) {
	$menuParameters =  array(
		'theme_location' => $theme_location,
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
        'items_wrap'      => '%3$s',		
        'depth'           => 0,
		'walker'          => new Description_Walker
	);
	wp_nav_menu($menuParameters);
}

//Custom menu classes
class Description_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes = empty($item->classes) ? array () : (array) $item->classes;
		$classes = reset($classes); //just keep the custom class
		$class_names = 'class="'. $classes . ' footer-link-item"';
        !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = "<a $attributes $class_names>"
        . $args->link_before
        . $title
        . '</a>';
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
	function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0) 
    {
        $output; //prevent WP from adding unnecessary LI closing tags
    }
}

?>