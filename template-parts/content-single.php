<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karma
 */
?>

<div class="container">
    <div class="row">

        <?php

        if ( is_active_sidebar( 'sidebar-left' ) && karma_has_left_sidebar( get_the_ID() ) ) :
            get_sidebar('left');
        endif;

        ?>

        <div class="col-sm-<?php echo esc_attr( karma_main_width( get_the_ID() ) ); ?> karma-post-container">

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <div class="entry-meta">
                        <div class="meta-detail">

                            <div class="post-category">
                                <?php karma_post_category(); ?>
                            </div>
                            
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
                
                <div class="author"><?php echo karma_posted_on(); ?></div>

                <?php the_post_navigation(); ?>



            </article><!-- #post-## -->

            <?php if (comments_open() || get_comments_number()) : ?>
            <div class="karma-comments-section">
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                
                    comments_template();
                    
                ?>    
            </div>
            <?php endif; ?>


        </div>

        <?php

        if ( is_active_sidebar( 'sidebar-right' ) && karma_has_right_sidebar( get_the_ID() ) ) :
            get_sidebar('right');
        endif;

        ?>

    </div>
</div>