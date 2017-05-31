<?php

/**
 * 
 * Karma WordPress Theme
 * 
 * This file contains most of the work done by Karma
 * It's pretty straight forward, feel free to edit if you're comfortable with basic PHP
 * 
 * If you got here, thank you for using this theme ! Hack away at it as you see fit.
 * Please take a minute to leave us a review on WordPress.org
 * 
 * 
 */


function karma_scripts() {

    wp_enqueue_style('karma-style', get_stylesheet_uri());

    wp_enqueue_script('karma-navigation', get_template_directory_uri() . '/js/navigation.js', array(), KARMA_VERSION, true);

    wp_enqueue_script('karma-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), KARMA_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    $fonts = karma_fonts();
    
    if( array_key_exists ( get_theme_mod('header_font', 'Oswald, sans-serif'), $fonts ) ) :
        wp_enqueue_style('karma-font-header', '//fonts.googleapis.com/css?family=' . $fonts[get_theme_mod('header_font', 'Oswald, sans-serif')], array(), KARMA_VERSION );
    endif;
    
    if( array_key_exists ( get_theme_mod('theme_font', 'Lato, sans-serif'), $fonts ) ) :
        wp_enqueue_style('karma-font-general', '//fonts.googleapis.com/css?family=' . $fonts[get_theme_mod('theme_font', 'Lato, sans-serif')], array(), KARMA_VERSION );
    endif;
    

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), KARMA_VERSION);
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/inc/css/bootstrap-theme.min.css', array(), KARMA_VERSION);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), KARMA_VERSION);
    wp_enqueue_style('karma-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), KARMA_VERSION);
    wp_enqueue_style('animate', get_template_directory_uri() . '/inc/css/animate.css', array(), KARMA_VERSION);
    wp_enqueue_style('slicknav', get_template_directory_uri() . '/inc/css/slicknav.min.css', array(), KARMA_VERSION);
    
    wp_enqueue_script('jquery-sticky', get_template_directory_uri() . '/inc/js/scrollme.min.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('jquery-sticky', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('jquery-particles', get_template_directory_uri() . '/inc/js/particle.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/inc/js/easing.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('jquery-slicknav', get_template_directory_uri() . '/inc/js/slicknav.min.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('jquery-wow', get_template_directory_uri() . '/inc/js/wow.min.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('karma-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery', 'jquery-ui-core', 'jquery-masonry'), KARMA_VERSION);
    
    $localized_array = array(
        'particlesLocation'     => get_template_directory_uri() . '/inc/js/particles.json'
    );
    
    wp_localize_script( 'karma-script', 'karmaObj', $localized_array );
    
}

add_action('wp_enqueue_scripts', 'karma_scripts');

function karma_widgets_init() {


    
    register_sidebar(array(
        'name' => esc_html__('Fontpage Features Widget', 'karma'),
        'id' => 'sidebar-features',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Frontpage Call to Action', 'karma'),
        'id' => 'sidebar-cta',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-12">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Frontpage Shop', 'karma'),
        'id' => 'sidebar-fp-shop',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-12">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Right Sidebar', 'karma'),
        'id' => 'sidebar-right',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Left Sidebar', 'karma'),
        'id' => 'sidebar-left',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar ( EDD )', 'karma'),
        'id' => 'sidebar-shop',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));




    register_sidebar(array(
        'name' => esc_html__('Footer', 'karma'),
        'id' => 'sidebar-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-4">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

//    register_sidebar(array(
//        'name' => esc_html__('Top B - Homepage widget', 'karma'),
//        'id' => 'sidebar-homepage',
//        'description' => '',
//        'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-12">',
//        'after_widget' => '</aside>',
//        'before_title' => '<h2 class="widget-title">',
//        'after_title' => '</h2>',
//    ));
}

add_action('widgets_init', 'karma_widgets_init');



function karma_do_left_sidebar( $args ) {
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'none' ) :
        return;
    endif;
    
    if( $args[0] == 'frontpage' && get_theme_mod('home_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'page' && get_theme_mod('page_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'single' && get_theme_mod('single_sidebar') == 'off' )
        return;
    
    
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'left' ) :
        
        echo '<div class="col-sm-4" id="karma-sidebar">' .
        get_sidebar('right') . '</div>';
        
    endif;
    
    
}
add_action('karma-sidebar-left', 'karma_do_left_sidebar');

function karma_do_right_sidebar( $args ) {
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'none' ) :
        return;
    endif;
    
    if( $args[0] == 'frontpage' && get_theme_mod('home_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'page' && get_theme_mod('page_sidebar') == 'off' )
        return;
    
    if( $args[0] == 'single' && get_theme_mod('single_sidebar') == 'off' )
        return;
    
    
    
    if( get_theme_mod( 'sidebar_location', 'right' ) == 'right' ) :
        
        echo '<div class="col-sm-4" id="karma-sidebar">';
    
        get_sidebar('right');
        
        echo '</div>';
        
    endif;
    
    
}
add_action('karma-sidebar-right', 'karma_do_right_sidebar');

function karma_main_width(){
    
    $width = 12;
    
    if( is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right') ) :
        
        $width = 6;
        
    elseif( is_active_sidebar('sidebar-left') || is_active_sidebar('sidebar-right') ) :
        $width = 9;
    else:
        $width = 12;
    endif;
    
    
    return $width;
}


function karma_customize_nav( $items, $args ) {

    if( $args->theme_location != 'primary' ) :
        return $items;
    endif;
    
    if( get_theme_mod('header_search_bool', 'on' ) == 'on' ) :
        $items .= '<li class="menu-item"><a class="karma-search" href="#search" role="button" data-toggle="modal"><span class="fa fa-search"></span></a></li>';
    endif;
    
    if( class_exists( 'Easy_Digital_Downloads' ) && get_theme_mod('header_cart_bool', 'on' ) == 'on' ) :
        $items .= '<li><a class="karma-cart" href="' . esc_url( edd_get_checkout_uri() ) . '"><span class="fa fa-shopping-cart"></span> ' . esc_attr( EDD()->cart->subtotal() ) . '</a></li>';
    endif;
    
    
    
    return $items;
}

add_filter('wp_nav_menu_items', 'karma_customize_nav', 10, 2);


function karma_custom_css() {
    
    $theme_color = esc_attr( get_theme_mod('karma_theme_color', '#4cef9e' ) );
    $theme_color_rgba = karma_hex2rgb( $theme_color );
    $hover_color = esc_attr( get_theme_mod('karma_theme_color_hover', '#37ef93' ) );
    $hover_color_rgba = karma_hex2rgb( $hover_color );
    
    ?>
    <style type="text/css">


        body{
            font-size: <?php echo esc_attr( get_theme_mod( 'theme_font_size', '16px') ); ?>;
        }
        
        body,
        #karma-features .karma-feature h3.feature-title{
            font-family: <?php echo esc_attr( get_theme_mod( 'theme_font', 'Lato, sans-serif' ) ); ?>;
        }
        
        h1,h2,h3,h4,h5,h6,.slide2-header,.slide1-header,.karma-title, .widget-title,.entry-title, .product_title{
            font-family: <?php echo esc_attr( get_theme_mod('header_font', 'Oswald, sans-serif' ) ); ?>;
        }
        
        ul.karma-nav > li.menu-item a{
            font-size: <?php echo esc_attr( get_theme_mod('menu_font_size', '14px' ) ); ?>;
        }
        
        #karma-sidebar .edd-submit.button {
            background: <?php echo $theme_color; ?> !important;
            color: #fff !important;
            border: 2px solid <?php echo $hover_color; ?> !important;
        }
        
        #karma-sidebar .edd-submit.button:hover{
            background: <?php echo $hover_color; ?> !important;
        }
        
        #karma-featured-post #slide1,
        #karma-featured-post #slide1 .slide-vert-wrapper{
            height: <?php echo intval( get_theme_mod('karma_jumbotron_height', 650 ) ); ?>px;
        }
        
        #masthead.site-header,
        #karma-header .slicknav_menu{
            background-color: <?php echo esc_attr( get_theme_mod('karma_header_bg_color', '#f9f9f9' ) ); ?>;
        }

        
        a,a:visited,
        ul.karma-nav > li > ul li.current-menu-item > a,
        .woocommerce .woocommerce-message:before,
        #karma-social a
        {
            color: <?php echo $theme_color; ?>;
        }

        a:hover,
        a:focus,
        .site-info a:hover,
        ul.karma-nav ul li a:hover,
        #karma-social a:hover{
            color: <?php echo $hover_color; ?>;
        }
        
        /**
        ul.karma-nav > li.menu-item.current-menu-item a,
        ul.karma-nav > li.menu-item.current-menu-parent a,
        ul.karma-nav > li.menu-item a:hover{

            border-bottom: 2px solid <?php //echo $hover_color; ?>;

        }
        */
        
        .button,
        button,
        .edd-product-inner .product-buttons a,
        input[type="button"], 
        input[type="submit"],
        .woocommerce button.button.alt, 
        .woocommerce input.button.alt,
        .woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt,
        .woocommerce ul.products li.product .button,
        .button.wc-backward,
        #karma-featured-post #karma-social a:hover{
            border: 2px solid <?php echo $theme_color; ?> !important;
            color: <?php echo $theme_color; ?> !important;
            
        }

        button:hover, 
        input[type="button"]:hover, 
        input[type="submit"]:hover,
        .karma-button.primary:hover,
        .button.wc-backward:hover,
        .woocommerce ul.products li.product .button:hover,
        .woocommerce button.button.alt:hover, 
        .woocommerce input.button.alt:hover,
        .woocommerce #respond input#submit.alt:hover, 
        .woocommerce a.button.alt:hover{
            background: <?php echo $hover_color; ?> !important;
        }

        .entry-meta .fa,
        .karma-blog-post,
        #karma-featured,
        .woocommerce span.onsale,
        .entry-meta .post-category a,
        #karma-features .karma-feature:hover .icon-wrap,
        #karma-features h2:before,
        #karma-homepage-shop h2:before{
            background: <?php echo $theme_color; ?>;
        }
        
        .karma-blog-post{
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-size: cover;
        }
        
        .woocommerce .woocommerce-message{
            border-top-color: <?php echo $theme_color; ?>;
        }


        .main-navigation .karma-cart,
        .karma-mobile-cart .karma-cart{
            transition: 0.25s all ease-in-out;
            -moz-transition: 0.25s all ease-in-out;
            -webkit-transition: 0.25s all ease-in-out;
            top: -5px;
        }


        #karma-featured,
        .woocommerce span.onsale{
            color: #fff;
        }
        #karma-featured .fa{
            color: #fff;
        }

        .scroll-top:hover {
            background: <?php echo $hover_color; ?>;
        }
        
        .woocommerce ul.products li.product a img{
            border-bottom: 7px solid <?php echo $theme_color; ?>;
        }
        
        #karma-featured-post #slide1 {
            background: <?php echo $theme_color; ?>
        }

        
    </style>
    <?php
}

add_action('wp_head', 'karma_custom_css');



function karma_jumbotron() { ?>
    
    <div id="karma-featured-post">
        
        <?php
        if( get_theme_mod( 'karma_social_featured', 'on' ) == 'on' ) :
            karma_social_icons(); 
        endif;
        ?>
        
        <div id="karma-slider" class="hero">
            
            <?php $post_id = get_theme_mod( 'karma_the_featured_post', 1 ); ?>
            
            <?php if( $post_id ) : ?>
                
            <div id="slide1">
                <div id="karma-jumbo-js"></div>
                <div class="overlay"></div>
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
                                    <?php echo esc_attr( get_theme_mod( 'karma_the_featured_post_button', __( 'Continue reading', 'karma' )  ) ); ?>
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
            <?php endif; ?>
            
        </div>
    </div>


    <div class="clear"></div>
    
<?php }

function karma_homepage_features() { ?>
   
    
    <div id="karma-features">
        
        <div class="overlay-before"></div>
        <div class="container">
            <div class="row text-center">
                <?php
                    if ( is_active_sidebar( 'sidebar-features' ) ) {
                        dynamic_sidebar( 'sidebar-features' );
                    }?>                
            </div>

            
            <?php 
            $posts = get_theme_mod( 'karma_homepage_feature', array( null, null, null, null ) );
            $icons = get_theme_mod( 'karma_homepage_feature_icon', array( 'fa fa-desktop' ) );
            $ctr = 0;
            
            for( $i = 0; $i <= 3; $i++ ) :
                
                if( ! isset( $posts[ $i ] ) ) : ?>
                
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
                                <span class="<?php echo isset( $icons[$i] ) ? esc_attr( $icons[$i] ) : 'fa fa-desktop'; ?>"></span>
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
    </div>
    
    
    
<?php }


function karma_homepage_shop() { 
    
    $products = new WP_Query (array(
        'post_type'         => 'download',
        'post_status'       => 'publish',
        'posts_per_page'    => get_theme_mod( 'homepage_products_count', 6 ),
        'order_by'          => get_theme_mod( 'homepage_products_order', 'date' ),
    ) );
    
    if( ! $products->have_posts() ) {
        return;
    }
    
    ?>
    
    <div id="karma-homepage-shop">
        
        <div class="container">
            
            <div class="row text-center">
                <?php
                    if ( is_active_sidebar( 'sidebar-fp-shop' ) ) {
                        dynamic_sidebar( 'sidebar-fp-shop' );
                    } 
                ?>                
            </div>
            
            <?php $i = 0; ?>
            <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <div class="col-md-4 col-sm-6 col-xs-12 edd-product <?php echo $i%3==0 ? ' first' : '';?>">
                        <div class="edd-product-inner">
                            <div class="product-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'product-image' ); ?>
                                    <?php else : ?>
                                        <div class="edd-product-icon">
                                            <span class="fa fa-download"></span>
                                        </div>
                                    <?php endif; ?>
                                </a>
                                <?php if ( function_exists( 'edd_price' ) ) { ?>
                                    <div class="product-buttons animated fadeIn">
                                        <div class="product-buttons-inner">
                                            <?php if ( ! edd_has_variable_prices( get_the_ID() ) ) { ?>
                                                <?php echo edd_get_purchase_link( get_the_ID(), 'Add to Cart', 'button' ); ?>
                                            <?php } ?>
                                            <a href="<?php the_permalink(); ?>"><?php _e( 'Product details', 'karma' ); ?></a>                                                
                                        </div>

                                    </div><!--end .product-buttons-->
                                <?php } ?>
                            </div>
                            <div class="product-details">

                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="product-title"><?php the_title(); ?></h3>
                                </a>

                                <?php if ( function_exists( 'edd_price' ) ) { ?>
                                    <div class="product-price">
                                        <?php
                                        if ( edd_has_variable_prices( get_the_ID() ) ) {
                                            echo 'Starting at: ';
                                            edd_price( get_the_ID() );
                                        } else {
                                            edd_price( get_the_ID() );
                                        }
                                        ?>
                                    </div><!--end .product-price-->
                                <?php } ?>

                            </div>
                        </div>
                    </div><!--end .product-->
                    <?php $i+=1; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            
        </div>
        
    </div>
    
    
<?php }

function karma_render_homepage() { 
    
    if( get_theme_mod( 'karma_the_featured_post_toggle', 'on' ) == 'on' ) :
    
        karma_jumbotron();
    
    endif;
    
    if( get_theme_mod( 'homepage_features_toggle', 'on' ) == 'on' ) :
    
        karma_homepage_features();
    
    endif;
    
    
    
    if( get_theme_mod( 'homepage_shop_toggle', 'on' ) == 'on' && class_exists( 'Easy_Digital_Downloads' ) ) :
    
        karma_homepage_shop();
    
    endif;
    
    
    
    ?>
    
    <?php $post_id = get_theme_mod( 'karma_the_featured_post2', 1 ); ?>
    <?php $the_post = $post_id ? get_post( $post_id ) : null; ?>
    
    <!--
    <?php if( $the_post && get_theme_mod('karma_the_featured_post2_toggle', 'on' ) == 'on' ) : ?>
    <div id="karma-topa">
        
        <div class="row text-center">
            <div class="col-sm-12">
                
                <h3 class="heading"><?php echo esc_html( $the_post->post_title ); ?></h3>
                
                <p class="description">
                    <?php echo esc_html( wp_trim_words( $the_post->post_content, 40 ) ); ?>
                </p>
                
            </div>            
        </div>
        
        <div class="row text-center">
            <div class="col-sm-12">
                <a href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>"><?php echo get_the_post_thumbnail( $post_id ); ?></a>
            </div>
        </div>        

    </div>
    
    <div class="clear"></div>
    <?php endif; ?>
    
    -->
    
    
    <!--
    <?php if( get_theme_mod('homepage_widget_bool', 'on' ) == 'on' ) : ?>
        <div id="karma-topb">
            <?php get_sidebar('homepage'); ?>
        </div>
    <?php endif; ?>
    -->
    

    
    <?php
}

add_action( 'karma_homepage', 'karma_render_homepage' );


function karma_get_post_thumb( $post_id ) {
    
    if( $post_id == 'nopost' ) :
        return get_template_directory_uri() . '/inc/images/karma1.jpg';
    endif;
    
    if( has_post_thumbnail( $post_id ) ) :
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
        return $img[0];
    endif;
    
}


function karma_render_footer(){ ?>
        
    
    <?php if( get_theme_mod( 'footer_cta_toggle', 'on' ) == 'on') : ?>

    <div id="karma-cta">
        <div class="row">
            <?php
                if ( is_active_sidebar( 'sidebar-cta' ) ) {
                    dynamic_sidebar( 'sidebar-cta' );
                }elseif( current_user_can ( 'edit_theme_options' ) ){ ?>
                <h2> <?php _e( 'This is the CTA Widget - You can place any widgets here from Appearance - Widgets. You can also hide this or change the image from Customizer - Footer', 'karma' ); ?></h2>
            <?php } ?>
        </div>
    </div>
    
    
    <?php endif; ?>
    
    <?php if( get_theme_mod( 'footer_background_toggle', 'on' ) == 'on') : ?>
    
    <div class="karma-footer">
        <div>
            <div class="row">
                <?php get_sidebar('footer'); ?>
            </div>            
        </div>

        
    </div>
    
    <div class="clear"></div>
    
    <?php endif; ?>
    
    <div class="site-info">
        
        <div class="row">
            
            <div class="karma-copyright">
                <?php echo esc_html( get_theme_mod( 'copyright_text', get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
            </div>
            <?php 
            if( get_theme_mod( 'karma_social_footer', 'on' ) == 'on' ) :
                karma_social_icons(); 
            endif;
            ?>
            
            <div class="payment-icons">

                <?php if ( get_theme_mod( 'karma_include_cc_visa', false ) ) : ?>
                    <i class="fa fa-cc-visa"></i>
                <?php endif; ?>

                <?php if ( get_theme_mod( 'karma_include_cc_mastercard', false ) ) : ?>
                    <i class="fa fa-cc-mastercard"></i>
                <?php endif; ?>

                <?php if ( get_theme_mod( 'karma_include_cc_amex', false ) ) : ?>
                    <i class="fa fa-cc-amex"></i>
                <?php endif; ?>

                <?php if ( get_theme_mod( 'karma_include_cc_paypal', false ) ) : ?>
                    <i class="fa fa-cc-paypal"></i>
                <?php endif; ?>

            </div>
            
            <hr>

            <a href="https://smartcatdesign.net" rel="designer" style="display: block !important" class="rel">
                <?php printf( esc_html__( 'Designed by %s', 'karma' ), 'Smartcat' ); ?> 
                <img src="<?php echo get_template_directory_uri() . '/inc/images/cat_logo_mini.png'?>"/>
            </a>
            
        </div>
        
        <div class="scroll-top alignright">
            <span class="fa fa-chevron-up"></span>
        </div>
        

        
    </div><!-- .site-info -->
    
    
<?php }
add_action( 'karma_footer', 'karma_render_footer' );

function karma_hex2rgb( $hex ) {
    $hex = str_replace( "#", "", $hex );

    if ( strlen( $hex ) == 3 ) {
        $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
        $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
        $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
    } else {
        $r = hexdec( substr( $hex, 0, 2 ) );
        $g = hexdec( substr( $hex, 2, 2 ) );
        $b = hexdec( substr( $hex, 4, 2 ) );
    }
    $rgb = array ( $r, $g, $b );
    //return implode(",", $rgb); // returns the rgb values separated by commas
    return $rgb; // returns an array with the rgb values
}

function karma_social_icons() { ?>

    <div id="karma-social">

        <?php if( get_theme_mod( 'facebook_url', '' ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'facebook_url', '' ) ); ?>" target="_BLANK" class="karma-facebook">
            <span class="fa fa-facebook"></span>
        </a>
        <?php endif; ?>


        <?php if( get_theme_mod( 'gplus_url', '' ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'gplus_url', '' ) ); ?>" target="_BLANK" class="karma-gplus">
            <span class="fa fa-google-plus"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( 'instagram_url', '' ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'instagram_url', '' ) ); ?>" target="_BLANK" class="karma-instagram">
            <span class="fa fa-instagram"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( 'linkedin_url', '' ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'linkedin_url', '' ) ); ?>" target="_BLANK" class="karma-linkedin">
            <span class="fa fa-linkedin"></span>
        </a>
        <?php endif; ?>


        <?php if( get_theme_mod( 'pinterest_url', '' ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'pinterest_url', '' ) ); ?>" target="_BLANK" class="karma-pinterest">
            <span class="fa fa-pinterest"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( 'twitter_url', '' ) ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'twitter_url', '' ) ); ?>" target="_BLANK" class="karma-twitter">
            <span class="fa fa-twitter"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( 'vimeo_url', '' ) ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vimeo_url', '' ) ); ?>" target="_BLANK" class="karma-vimeo">
            <span class="fa fa-vimeo"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( 'spotify_url', '' ) ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'spotify_url', '' ) ); ?>" target="_BLANK" class="karma-spotify">
            <span class="fa fa-spotify"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( 'apple_url', '' ) ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'apple_url', '' ) ); ?>" target="_BLANK" class="karma-apple">
            <span class="fa fa-apple"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( 'github_url', '' ) ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'github_url', '' ) ); ?>" target="_BLANK" class="karma-github">
            <span class="fa fa-github"></span>
        </a>
        <?php endif; ?>


        <?php if( get_theme_mod( 'vine_url', '' ) ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vine_url', '' ) ); ?>" target="_BLANK" class="karma-vine">
            <span class="fa fa-vine"></span>
        </a>
        <?php endif; ?>

    </div>
    
<?php }

function karma_get_main_nav() {
    
    if( has_nav_menu( 'primary' ) ) :

        $menu = wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_id' => 'primary-menu',
            'menu_class' => 'karma-nav',
        ));
    else :

        if( current_user_can( 'edit_theme_options' ) ) :
            echo '<div id="karma-add-menu"><a class="karma-cart" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . __( 'Add a Primary Menu', 'karma' ) . '</a></div>';
        endif;
    endif;
    
}

function karma_get_mobile_nav() {
    
    if( has_nav_menu( 'mobile' ) ) :

        $menu = wp_nav_menu(array(
            'theme_location' => 'mobile',
            'menu_id' => 'mobile-menu',
            'menu_class' => 'karma-mobile-nav animated',
        ));
    elseif( has_nav_menu( 'primary' ) ) :

        $menu = wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_id' => 'mobile-menu',
            'menu_class' => 'karma-mobile-nav animated',
        ));
    else :

        if( current_user_can( 'edit_theme_options' ) ) :
            echo '<div id="karma-add-menu"><a class="karma-cart" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . __( 'Add a Primary Menu', 'karma' ) . '</a></div>';
        endif;
    endif;
    
}