<div id="karma-features">

    <div class="overlay-before"></div>
    
    <div class="container">
        
        <?php if ( is_active_sidebar( 'sidebar-features' ) ) : ?>

            <div class="row text-center">
                <?php dynamic_sidebar( 'sidebar-features' ); ?>
            </div>
        
        <?php endif; ?>

        <?php
        
        $posts = get_theme_mod( 'karma_homepage_feature', array( null, null, null, null ) );
        $icons = get_theme_mod( 'karma_homepage_feature_icon', array( 'fa fa-desktop', 'fa fa-desktop', 'fa fa-desktop', 'fa fa-desktop' ) );
        $ctr = 0;

        ?>
        
        <div class="row">
        
            <?php for ( $i = 0; $i <= 3; $i++ ) : ?>

                <?php if ( !isset( $posts[ $i ] ) || $posts[ $i ] == 0 ) : ?>

                    <div class="col-sm-3 karma-feature">

                        <div class="feature-wrapper">
                            <div class="icon-wrap">
                                <span class="<?php echo isset( $icons[ $i ] ) ? esc_attr( $icons[ $i ] ) : 'fa fa-desktop'; ?>"></span>
                            </div>
                        </div>

                        <h3 class="feature-title"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></h3>    

                    </div>

                <?php else : ?>

                    <div class="col-sm-3 karma-feature">

                        <div class="feature-wrapper">
 
                            <a href="<?php echo esc_url( get_the_permalink( $posts[ $i ] ) ); ?>">
                                <div class="icon-wrap">
                                    <span class="<?php echo isset( $icons[ $i ] ) ? esc_attr( $icons[ $i ] ) : 'fa fa-desktop'; ?>"></span>
                                </div>
                            </a>

                            <h3 class="feature-title">
                                <a href="<?php echo esc_url( get_the_permalink( $posts[ $i ] ) ); ?>">
                                    <?php echo esc_html( get_the_title( $posts[ $i ] ) ); ?>
                                </a>
                            </h3>    

                        </div>

                    </div>

                <?php endif; ?>

            <?php endfor; ?>
            
        </div>
        
    </div>
    
    <div class="overlay-after"></div>
    
</div>