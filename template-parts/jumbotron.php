<div id="karma-featured-post" class="<?php echo get_theme_mod( Karma_Options::$features_toggle, Karma_Options::$features_toggle_default ) == 'off' ? 'no-features' : ''; ?>">

    <div id="karma-slider" class="hero">
        
        <?php $post_id = get_theme_mod( Karma_Options::$featured_post, Karma_Options::$featured_post_default ); ?>

            <?php if ( $post_id ) : ?>

                <div id="slide1">

                    <div id="karma-jumbo-js"></div>

                    <div class="overlay"></div>

                    <div class="container">

                        <div class="row">

                            <div class="col-sm-6 slide-details">

                                <div class="slide-vert-wrapper">

                                    <div class="slide-vert-inner">

                                        <a href="<?php echo get_the_permalink( $post_id ) ? esc_url( get_the_permalink( $post_id ) ) : null; ?>">
                                            <h2 class="header-text slide1-header animated fadeIn delay1">
                                                <span class="header-inner"><?php echo ( get_the_title( $post_id ) ? esc_attr( get_the_title( $post_id ) ) : '' ); ?></span>
                                            </h2>

                                            <p class="animated fadeIn delay1">
                                                <?php echo esc_html( wp_trim_words( strip_tags( get_post_field( 'post_content', $post_id ) ), 25 ) ); ?>
                                            </p>
                                        </a>

                                        <a href="<?php echo get_the_permalink( $post_id ) ? esc_url( get_the_permalink( $post_id ) ) : null; ?>" 
                                           class="animated fadeIn delay1 karma-jumbotron-button-primary">
                                               <?php echo esc_attr( get_theme_mod( Karma_Options::$featured_post_button, Karma_Options::$featured_post_button_default ) ); ?>
                                        </a>

                                        <?php do_action( 'jumbotron_button' ); ?>

                                    </div>

                                </div>

                            </div>
                            <div class="col-sm-6 ">
                                <div class="slide-vert-wrapper scrollme">
                                    <div class="slide-vert-inner animateme" data-when="span"
                                         data-from="0"
                                         data-to="1"
                                         data-opacity="1"
                                         data-rotatey="180"
                                         data-translatey="-100">
                                             <?php echo get_the_post_thumbnail( $post_id, 'large' ); ?>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            <?php endif; ?>
            
        
    </div>    

</div>

<div class="clear"></div>