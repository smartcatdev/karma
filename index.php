<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karma
 */
get_header();
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main karma-blog-page" role="main">


        <div id="karma-page-jumbotron" class="table-display">
            <div id="karma-jumbo-js"></div>

            <div class="cell-display">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <header class="entry-header centered">
                                <?php single_post_title('<h1 class="entry-title">', '</h1>'); ?>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="container">
            <div class="row">

                <?php
                if ( karma_has_left_sidebar( get_the_ID() ) ) :
                    get_sidebar( 'left' );
                endif;
                ?>

                <div class="karma-blog-content col-sm-<?php echo esc_attr( karma_main_width( get_the_ID() ) ); ?>">
                    <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php get_template_part( 'template-parts/content-blog', get_post_format() ); ?>

                        <?php endwhile; ?>

                    <?php else : ?>

                        <?php get_template_part( 'template-parts/content', 'none' ); ?>

                    <?php endif; ?>
                </div>

                <?php
                if ( karma_has_right_sidebar( get_the_ID() ) ) :
                    get_sidebar( 'right' );
                endif;
                ?>

            </div>
        </div>
        <div class="clear"></div>
        <div class="karma-pagination">
            <?php the_posts_pagination(); ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>
