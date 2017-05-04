<div id="karma-homepage-widget" data-parallax="scroll" style="background-image: url(<?php echo esc_url( get_theme_mod( 'homepage_widget_background', get_template_directory_uri() . '/inc/images/people.jpg' ) ); ?>)">

    <div>
        <div class="row">
            <div class="widget-area">
            <?php
                if ( is_active_sidebar( 'sidebar-homepage' ) ) {
                    dynamic_sidebar( 'sidebar-homepage' );
                }elseif( current_user_can ( 'edit_theme_options' ) ){ ?>
                    <h2> <?php _e( 'This is the Top B Homepage Widget - You can place any widgets here from Appearance - Widgets. You can also hide or change the image from Customizer - Frontpage - Top B', 'karma' );?> </h2>
                <?php }else {
                    the_widget('WP_Widget_Recent_Posts');
                }
            ?>

            </div>
        </div>            
    </div>

</div>

