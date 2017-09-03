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
        
        <?php if ( $bottom_widget != 'karma_none' ): ?>

            <div class="container">

                <div class="row bottom-widget">

                    <?php dynamic_sidebar( esc_attr( $bottom_widget ) ); ?>

                </div>

            </div>

        <?php endif; ?>
        
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
