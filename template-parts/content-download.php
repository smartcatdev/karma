<?php
/**
 * Template part for displaying single product from EDD
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karma
 */
?>
<div class="row">
    
    <div class="col-sm-9 karma-post-container">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <div class="entry-meta">
                    <div class="meta-detail">
                        
                        <div class="post-category">
                            <?php karma_post_category(); ?>
                        </div>
                        
                        <?php the_title('<h1 class="text-left entry-title">', '</h1>'); ?>
                        
                        <!--<div><span class="fa fa-calendar"></span> </div>-->

                        <div class="author"><?php echo get_the_author() ? esc_html( get_the_author() ) . ' . ' : ''; ?><?php echo karma_posted_on(); ?></div>
                        
                        <div class="single-post-thumbnail">
                        <?php 
                        if( has_post_thumbnail() ) :
                            the_post_thumbnail( 'large' );
                        endif;
                        
                        ?>                            
                        </div>

                    </div>

                </div><!-- .entry-meta -->

            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'karma'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <?php karma_post_tags(); ?>
            
            <?php the_post_navigation(); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        </article><!-- #post-## -->

    </div>
    
    <div class="col-sm-3" id="karma-sidebar">
        <div id="secondary" class="widget-area" role="complementary">
            <aside class="widget">
                <?php if ( function_exists( 'edd_price' ) ) { ?>
                
                    <div class="price">
                        <?php
                        if ( edd_has_variable_prices( get_the_ID() ) ) {
                            edd_price( get_the_ID() );
                        } else {
                            edd_price( get_the_ID() );
                        }
                        ?>
                    </div>
                    <div class="buttons">
                        <div class="product-buttons">
                            <?php if ( ! edd_has_variable_prices( get_the_ID() ) ) { ?>
                                <?php echo edd_get_purchase_link( get_the_ID(), 'Add to Cart', 'button' ); ?>
                            <?php }else {
                                
                                edd_append_purchase_link( get_the_ID() );
                            } ?>                                                
                        </div>

                    </div><!--end .product-buttons-->
                <?php } ?>
                
                
            </aside>
        </div><!-- #secondary -->
    </div>

</div>