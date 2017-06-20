<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main karma-single-product" role="main">
        
        
        <div id="karma-page-jumbotron" class="table-display">
            <div id="karma-jumbo-js"></div>

            <div class="cell-display">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <header class="entry-header centered">
                                <?php karma_entry_footer(); ?>
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="container">
            <div class="row">
                <div class="col-sm-8 karma-post-container">


                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php

                        if ( !defined( 'ABSPATH' ) ) {
                            exit; // Exit if accessed directly
                        }
                        ?>

                        <?php

                        do_action( 'woocommerce_before_single_product' );

                        if ( post_password_required() ) {
                            echo get_the_password_form();
                            return;
                        }
                        ?>

                        <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php do_action( 'woocommerce_before_main_content' ); ?>

                            <?php do_action( 'woocommerce_before_single_product_summary' ); ?>

                            <div class="summary entry-summary">

                            <?php do_action( 'woocommerce_single_product_summary' ); ?>

                            </div><!-- .summary -->

                            <?php do_action( 'woocommerce_after_single_product_summary' ); ?>

                            </div><!-- #product-<?php the_ID(); ?> -->

                            <?php do_action( 'woocommerce_after_single_product' ); ?>


                    <?php endwhile; // end of the loop.  ?>

                    <?php do_action( 'woocommerce_after_main_content' ); ?>
                </div>

                <?php get_sidebar('shop'); ?>

            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
    

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
