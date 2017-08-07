<?php
/**
 * Template name: EDD - Store page
 */
if ( is_tax( 'download_category' ) || is_tax( 'download_tag' ) ) :
    $the_query = $wp_query;
else :
    $args = array (
        'post_type' => 'download',
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1
    );

    $the_query = new WP_Query( $args );
endif;

get_header();
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main karma-store-page" role="main">

        <div class="container">
            <div class="row">

                <?php get_sidebar( 'shop' ); ?>

                <div class="karma-blog-content col-sm-<?php echo is_active_sidebar( 'sidebar-shop' ) ? 9 : 12 ?>">

                    <div class="col-sm-12">
                        
                        
                        
                    </div>
                    
                    <?php if ( $the_query->have_posts() ) : ?>

                        <?php $i = 0; ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                            <div class="col-md-4 col-sm-6 col-xs-12 edd-product <?php echo $i % 3 == 0 ? ' first' : ''; ?>">
                                <div class="edd-product-inner">
                                    <div class="product-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'product-image' ); ?>
                                            <?php else : ?>
                                                <div class="edd-product-icon">
                                                    <span class="fa fa-download"></span>
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                        <?php if ( function_exists( 'edd_price' ) ) { ?>
                                            <div class="product-buttons animated fadeIn">
                                                <div class="product-buttons-inner">
                                                    <?php if ( !edd_has_variable_prices( get_the_ID() ) ) { ?>
                                                        <?php echo edd_get_purchase_link( get_the_ID(), 'Add to Cart', 'button' ); ?>
                                                    <?php } ?>
                                                    <a href="<?php the_permalink(); ?>"><?php _e( 'Product details', 'karma' ); ?></a>                                                
                                                </div>

                                            </div><!--end .product-buttons-->
                                        <?php } ?>
                                    </div>
                                    <div class="product-details">

                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="product-title"><?php the_title(); ?></h3>
                                        </a>

                                        <?php if ( function_exists( 'edd_price' ) ) { ?>
                                            <div class="product-price">
                                                <?php
                                                if ( edd_has_variable_prices( get_the_ID() ) ) {
                                                    echo 'Starting at: ';
                                                    edd_price( get_the_ID() );
                                                } else {
                                                    edd_price( get_the_ID() );
                                                }
                                                ?>
                                            </div><!--end .product-price-->
                                        <?php } ?>

                                    </div>
                                </div>
                            </div><!--end .product-->
                            <?php $i += 1; ?>
                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>

                        <?php get_template_part( 'template-parts/content', 'none' ); ?>

                    <?php endif; ?>

                </div>



            </div>
        </div>
        <div class="clear"></div>

        <div class="karma-pagination">
            <div>
                <div class="pagination-links"> 
                    <?php
                    previous_posts_link( 'Load previous' );
                    next_posts_link( 'Load more', $the_query->max_num_pages );
                    ?>
                </div>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>
