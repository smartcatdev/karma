<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Karma
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main karma-post" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content', 'single'); ?>

        <?php endwhile; // End of the loop. ?>

        <?php $bottom_widget = get_post_meta( get_the_ID(), 'karma_bottom_widget_area', true ); ?>
        
        <?php if ( !empty( $bottom_widget ) && $bottom_widget != 'karma_none' && is_active_sidebar( $bottom_widget ) ): ?>

            <div class="container">

                <div class="row">
                    
                    <div class="col-sm-12">

                        <div class="bottom-widget">
                        
                            <div class="row">

                                <?php dynamic_sidebar( esc_attr( $bottom_widget ) ); ?>

                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>

            </div>

        <?php endif; ?>
        
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
