<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karma
 */
?>


<div class="row">
    
    <?php get_sidebar('left'); ?>
    
    <div class="col-sm-<?php echo esc_attr( karma_main_width() ); ?>">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php karma_entry_footer(); ?>
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

            <div class="entry-content">

                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large' ); ?>
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

