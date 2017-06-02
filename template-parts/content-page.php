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
    
    <?php
        
    if( karma_has_left_sidebar( get_the_ID() ) ) :
        get_sidebar('left');
    endif;
    
    ?>
    
    <div class="col-sm-<?php echo esc_attr( karma_main_width( get_the_ID() ) ); ?> karma-post-container">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
        
        <div class="karma-comments-section">
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>    

        </div>
        
    </div>

    <?php
        
    if( karma_has_right_sidebar( get_the_ID() ) ) :
        get_sidebar('right');
    endif;
    
    ?>

</div>

