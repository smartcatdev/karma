<?php
/**
 * Template name: EDD Downloads
 */
get_header();


$args = array (
    'post_type' => 'download',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1
);

$the_query = new WP_Query( $args );
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main karma-page" role="main">

        <?php if ( $the_query->have_posts() ) : ?>

            <?php if ( is_home() && !is_front_page() ) : ?>

                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

            <?php endif; ?>
                
            <div class="sidebar-container col-sm-3">

                <?php get_sidebar(); ?>

            </div>

            <div class="col-sm-6">

                <div class="juno-blog-content">

                    <div id="masonry-blog-wrapper">

                        <div class="grid-sizer"></div>
                        <div class="gutter-sizer"></div>

                        <?php /* Start the Loop */ ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                            <?php get_template_part( 'template-parts/content', 'blog' ); ?>

                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                    </div>

                    <div class="col-sm-12">
                        <div>
                            <div class="pagination-links"> 
                                <?php the_posts_pagination( array ( 'mid_size' => 1 ) ); ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
            <div class="sidebar-container col-sm-3">

                <?php get_sidebar(); ?>

            
            </div>

        <?php else : ?>

                

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
        
        <?php
        previous_posts_link( 'Older Posts' );
        next_posts_link( 'Newer Posts', $the_query->max_num_pages );
        ?>
        

    </main><!-- #main -->




</div><!-- #primary -->


<?php get_footer(); ?>