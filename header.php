<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Karma
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        
        <div id="karma-fs-overlay" class="noshow">
            
            <div class="row">
                
                <?php karma_get_mobile_nav(); ?>
       
            </div>
            
        </div>
        
        <div id="menu-toggle-trigger">
            <i class="fa fa-bars" style="color: rgb(255, 255, 255);"></i>
        </div>
        
        <div id="page" class="hfeed site <?php echo has_post_thumbnail() ? 'has-thumb' : ''; ?>">

            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'karma'); ?></a>
            
            <header id="masthead" class="site-header" role="banner">

                <div id="karma-header" class="<?php echo is_front_page() ? 'frontpage' : ''; ?>">

                    <div class="header-inner">

                        <div class="row">

                            <div class="karma-branding col-sm-3">

                                <!-- Logo start -->    
                                <div id="karma-logo" class="<?php echo function_exists( 'has_custom_logo' ) && has_custom_logo() ? 'show' : 'hidden'; ?>">

                                    <?php the_custom_logo(); ?>

                                </div>
                                <!-- Logo end -->
                                
                                
                                <h1 class="site-title <?php echo ! function_exists( 'has_custom_logo' ) || ! has_custom_logo() ? 'show' : 'hidden'; ?>">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                </h1>

                                <p class="site-description <?php echo ! function_exists( 'has_custom_logo' ) || ! has_custom_logo() ? 'show' : 'hidden'; ?>">
                                    <?php bloginfo('description'); ?>
                                </p>

                                <?php //endif; ?>

                            </div>

                            <div class="karma-header-menu col-sm-9">

                                <?php //if( class_exists( 'WooCommerce' ) ) : ?>
                                
                                    <div class="karma-mobile-cart">

                                        <a class="karma-cart" href="<?php echo edd_get_checkout_uri(); ?>">
                                                Cart (<span class="header-cart edd-cart-quantity"><?php echo edd_get_cart_quantity(); ?></span>)
                                        </a>
                                        
                                    </div>
                                
                                <?php // endif; ?>
                                
                                <nav id="site-navigation" class="main-navigation" role="navigation">
                                    
                                    <?php karma_get_main_nav(); ?>


                                </nav><!-- #site-navigation -->

                                
                            </div>

                        </div>
                    </div>
                </div>

            </header><!-- #masthead -->

            <div id="content" class="site-content">
