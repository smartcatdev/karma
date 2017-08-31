<?php
/**
 * Karma functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Karma
 */

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

if ( ! function_exists( 'karma_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function karma_setup() {
    
    
        if( !defined( 'KARMA_VERSION' ) ) :
            define('KARMA_VERSION', '1.0.0');
        endif;
        
	load_theme_textdomain( 'karma', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
        add_theme_support('woocommerce');
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo' );
        

	add_theme_support( 'custom-header', apply_filters( 'karma_custom_header_args', array(
		'default-image'         => '',
                'header-text'           => false,
		'default-text-color'    => false,
		'width'                 => 1200,
		'height'                => 300,
		'flex-height'           => true,
		'wp-head-callback'      => '',
	) ) );
        
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'karma' ),
		'mobile' => esc_html__( 'Mobile Menu', 'karma' ),
		'footer' => esc_html__( 'Footer Menu', 'karma' ),
            
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'caption',
	) );


        
}
endif; // karma_setup
add_action( 'after_setup_theme', 'karma_setup' );

function karma_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'karma_content_width', 1170 );
}
add_action( 'after_setup_theme', 'karma_content_width', 0 );


require get_template_directory() . '/inc/karma/Karma_Defaults.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/karma/karma.php';

require get_template_directory() . '/inc/tgm.php';
