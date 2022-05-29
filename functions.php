<?php
/**
 * Slabbed Up functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Slabbed Up

 */

 function slabbedup_scripts() {
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array('jquery'), '5.2.0', true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '5.2.0', 'all' );
    wp_enqueue_style('slabbedup-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all' );
 }

 add_action('wp_enqueue_scripts', 'slabbedup_scripts');

 function slabbedup_config() {
    register_nav_menus(
        array(
            'slabbedup_main_menu' => 'Slabbed Up Main Menu',
            'slabbedup_footer_menu' => 'Slabbed Up Footer Menu',
        )
        );
        add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 255,
			'single_image_width'	=> 255,
			'product_grid' 			=> array(
	            'default_rows'    => 10,
	            'min_rows'        => 5,
	            'max_rows'        => 10,
	            'default_columns' => 1,
	            'min_columns'     => 1,
	            'max_columns'     => 1,				
			)
		) );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		if ( ! isset( $content_width ) ) {
			$content_width = 600;
		}	

  
 }

 add_action( 'after_setup_theme', 'slabbedup_config', 0 );

 if( class_exists( 'WooCommerce' )){
	require get_template_directory() . '/inc/wc-modifications.php';
}