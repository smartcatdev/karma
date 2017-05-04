<?php
/**
 * Template part for displaying single posts.
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
            <header class="entry-header">
                <div class="entry-meta">
                    <div class="meta-detail">
                        
                        <div class="post-category">
                            <?php karma_post_category(); ?>
                        </div>
                        
                        <?php the_title('<h1 class="text-left entry-title">', '</h1>'); ?>
                        
                        <!--<div><span class="fa fa-calendar"></span> </div>-->

                        <div class="author"><?php echo get_the_author() ? esc_html( get_the_author() ) . ' . ' : ''; ?><?php echo karma_posted_on(); ?></div>
                        
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
            
            <?php the_post_navigation(); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        </article><!-- #post-## -->

    </div>
    
    <?php get_sidebar('right'); ?>

</div>