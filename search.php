<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Karma
 */
get_header();
?>


<div id="primary" class="content-area">

    <main id="main" class="site-main karma-blog-page" role="main">
        
        <div class="container">
            
            <div class="row">

                <?php get_sidebar('left'); ?>

                <div class="karma-blog-content col-sm-<?php echo 6; ?>">
                    <?php if (have_posts()) : ?>

                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <?php get_template_part('template-parts/content-blog', get_post_format()); ?>

                        <?php endwhile; ?>

                    <?php else : ?>

                        <?php get_template_part('template-parts/content', 'none'); ?>

                    <?php endif; ?>
                </div>

                <?php get_sidebar('right'); ?>

            </div>
            <div class="clear"></div>
            <div class="karma-pagination">
                <?php echo the_posts_pagination(); ?>
            </div>

        </div>
        
    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>