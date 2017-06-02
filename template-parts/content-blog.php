<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karma
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('karma-blog-post'); ?>>
    
    <div class="post-panel-content">
        
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            
            <div class="post-content">
                
                <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
                    <?php
                    if( has_post_thumbnail() ) :
                        the_post_thumbnail( 'large' );
                    endif;
                    ?>
                </a>
            
            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta karma-author-date">
                    <div class="meta-detail">
                        <span class="author"><?php echo get_the_author() ? '<span class="fa fa-user"></span> ' . esc_attr( get_the_author() ) : ' '; ?></span>
                        <span><span class="fa fa-calendar"></span> <?php echo karma_posted_on(); ?></span>
                    </div>

                </div><!-- .entry-meta -->
            <?php endif; ?>
                
                <?php the_excerpt(); ?>
            </div>
            
            
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php // echo wp_trim_words(get_the_content(), 50); ?>

            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'karma'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            
        </footer><!-- .entry-footer -->
    </div>
    
    
</article><!-- #post-## -->
