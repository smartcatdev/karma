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

        
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
