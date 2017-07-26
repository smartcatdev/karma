<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karma
 */
?>

<!--<div id="karma-page-jumbotron" class="table-display">
    <div id="karma-jumbo-js"></div>

    <div class="cell-display">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <header class="entry-header centered">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="container">
    <div class="row">

        <?php

        if( karma_has_left_sidebar( get_the_ID() ) ) :
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
</div>