<?php

if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
    
    <?php
                if ( is_active_sidebar( 'sidebar-footer' ) ) {
                    dynamic_sidebar( 'sidebar-footer' );
                }elseif( current_user_can ( 'edit_theme_options' ) ){ ?>
                <h2> <?php _e( 'This is the Footer Widget - You can place any widgets here from Appearance - Widgets. You can also hide this or change the image from Customizer - Footer', 'karma' ); ?></h2>
                <?php }else {
                    the_widget('WP_Widget_Recent_Posts');
                }
    ?>
</div><!-- #secondary -->
