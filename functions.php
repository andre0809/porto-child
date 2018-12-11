<?php

add_action('wp_enqueue_scripts', 'porto_child_css', 1001);
 
// Load CSS
function porto_child_css() {
    // porto child theme styles
    wp_deregister_style( 'styles-child' );
    wp_register_style( 'styles-child', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'styles-child' );

    if (is_rtl()) {
        wp_deregister_style( 'styles-child-rtl' );
        wp_register_style( 'styles-child-rtl', get_stylesheet_directory_uri() . '/style_rtl.css' );
        wp_enqueue_style( 'styles-child-rtl' );
    }
    if ( function_exists( 'woocommerce_product_search' ) ) {
        echo woocommerce_product_search( array( 'limit' => 20 ) );
  }
  function porto_child_wps_search_form() {
    $form = '';
    if ( class_exists( 'WooCommerce_Product_Search_Field' ) && method_exists( 'WooCommerce_Product_Search_Field', 'get_product_search_form' ) ) {
        $form = WooCommerce_Product_Search_Field::get_product_search_form( '' );
    }
    if ( strlen( $form ) === 0 ) {
        $form = woocommerce_product_search( array( 'floating' => false, 'dynamic_focus' => false ) );
    }
    echo $form;
}
}
