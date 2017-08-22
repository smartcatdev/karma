<div id="karma-features">

    <div class="overlay-before"></div>
    <div class="container">
        <div class="row text-center">
            <?php
            if ( is_active_sidebar( 'sidebar-features' ) ) {
                dynamic_sidebar( 'sidebar-features' );
            }
            ?>                
        </div>


        <?php
        $posts = get_theme_mod( Karma_Options::$homepage_feature, Karma_Options::$homepage_feature_default /*array ( null, null, null, null )*/ );
        $icons = get_theme_mod( Karma_Options::$homepage_feature_icon, Karma_Options::$homepage_feature_icon_default /*array ( 'fa fa-desktop' ) */);
        $ctr = 0;

        for ( $i = 0; $i <= 3; $i++ ) :

            if ( !isset( $posts[ $i ] ) ) :
                ?>

                <div class="col-sm-3 karma-feature">
                    <div class="feature-wrapper">
                        <span class="fa fa-desktop"></span>
                    </div>
                    <h3 class="feature-title"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></h3>    
                </div>
            </div>



    <?php else : ?>
            <div class="col-sm-3 karma-feature ">
                <div class="feature-wrapper">
                    <a href="<?php echo esc_url( get_the_permalink( $posts[ $i ] ) ); ?>">
                        <div class="icon-wrap">
                            <span class="<?php echo isset( $icons[ $i ] ) ? esc_attr( $icons[ $i ] ) : 'fa fa-desktop'; ?>"></span>
                        </div>
                    </a>
                    <h3 class="feature-title">
                        <a href="<?php echo esc_url( get_the_permalink( $posts[ $i ] ) ); ?>">
        <?php echo esc_attr( get_the_title( $posts[ $i ] ) ); ?>
                        </a>
                    </h3>                        
                </div>
            </div>

        <?php endif; ?>

<?php endfor; ?>
</div>
<div class="overlay-after"></div>