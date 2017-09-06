<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karma
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main karma-page" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content', 'page'); ?>

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
