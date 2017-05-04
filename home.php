<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * This template is used when the Frontpage display is set to static page
 * This template is what gets used for the page that the user assigns
 * to the blog
 * 
 * @package Karma
 */
get_header();


?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        
        <div class="row">
            <div class="col-sm-12">
                <h1 class="entry-title"><?php single_post_title(); ?></h1>
            </div>
            
            <div class="frontpage-blog homepage-page-content col-sm-12">
                
                <?php if (have_posts()) : ?>

                    <?php if (is_home() && !is_front_page()) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>

                    
                    <div class="karma-blog-content">

                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('template-parts/content-blog', get_post_format()); ?>

                    <?php endwhile; ?>
                        
                    </div>
                
                    <div class="karma-pagination">
                        <?php the_posts_pagination(); ?>
                    </div>

                <?php else : ?>

                    <?php get_template_part('template-parts/content', 'none'); ?>

                <?php endif; ?>

            </div>


        </div>
    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer();