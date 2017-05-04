<?php
/**
 * Template Name: Page with Right Sidebar
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main karma-page" role="main">

        <?php while (have_posts()) : the_post(); ?>


            <?php if (get_post_thumbnail_id($post->ID)) : ?>
                <div id="karma-page-jumbotron" class="parallax-window table-display" data-parallax="scroll" style="background-image: url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($post->ID))); ?>)">
                    <div class="overlay"></div>

                    <div class="cell-display">
                        <div class="row">
                            <div class="col-sm-12">
                                <header class="entry-header">
                                    <?php karma_entry_footer(); ?>
                                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                </header><!-- .entry-header -->                
                            </div>
                        </div>
                    </div>



                </div>
            <?php endif; ?>

            <div class="row">

                <div class="col-sm-9">

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



                        <div class="entry-content">

                            <?php if (!get_post_thumbnail_id($post->ID)) : ?>

                                <header class="entry-header">
                                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                </header><!-- .entry-header -->

                            <?php endif; ?>


                            <?php the_content(); ?>
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'karma'),
                                'after' => '</div>',
                            ));
                            ?>
                        </div><!-- .entry-content -->

                        <footer class="entry-footer">
                            <?php
                            edit_post_link(
                                    sprintf(
                                            /* translators: %s: Name of current post */
                                            esc_html__('Edit %s', 'karma'), the_title('<span class="screen-reader-text">"', '"</span>', false)
                                    ), '<span class="edit-link">', '</span>'
                            );
                            ?>
                        </footer><!-- .entry-footer -->



                    </article><!-- #post-## -->
                </div>

                <?php get_sidebar('right'); ?>

            </div>

            <div class="row">
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>            
            </div>


        <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->




</div><!-- #primary -->


<?php get_footer(); ?>
