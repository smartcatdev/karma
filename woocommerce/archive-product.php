<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' );
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main karma-store-page" role="main">


<!--        <div id="karma-page-jumbotron" class="table-display">
            <div id="karma-jumbo-js"></div>

            <div class="cell-display">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <header class="entry-header centered">
                                <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                                    <h1 class="entry-title"><?php esc_attr( woocommerce_page_title() ); ?></h1>
                                <?php endif; ?>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        
        
        <div class="container">
            <div class="row">

                <?php get_sidebar('shop'); ?>

                <div class="karma-blog-content col-sm-<?php echo is_active_sidebar( 'sidebar-shop' ) ? 9 : 12 ?>">

                    <?php do_action( 'woocommerce_before_main_content' ); ?>

                    <header class="woocommerce-products-header">

                        <?php do_action( 'woocommerce_archive_description' ); ?>

                    </header>

                    <?php if ( have_posts() ) : ?>

                        <?php do_action( 'woocommerce_before_shop_loop' ); ?>

                        <?php woocommerce_product_loop_start(); ?>

                        <?php woocommerce_product_subcategories(); ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php do_action( 'woocommerce_shop_loop' ); ?>

                            <?php wc_get_template_part( 'content', 'product' ); ?>

                        <?php endwhile; // end of the loop. ?>

                        <?php woocommerce_product_loop_end(); ?>

                        <?php do_action( 'woocommerce_after_shop_loop' ); ?>

                    <?php elseif ( !woocommerce_product_subcategories( array ( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                        <?php do_action( 'woocommerce_no_products_found' ); ?>

                    <?php endif; ?>

                    <?php do_action( 'woocommerce_after_main_content' ); ?>

                </div>

            </div>
        </div>
        
    </main>
    
</div>


<?php get_footer( 'shop' ); ?>
