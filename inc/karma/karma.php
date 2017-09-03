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
    
    $fonts = Karma_Options::karma_fonts();
    
    if( array_key_exists ( get_theme_mod( Karma_Options::$header_font, Karma_Options::$header_font_default ), $fonts ) ) :
        wp_enqueue_style('karma-font-header', '//fonts.googleapis.com/css?family=' . $fonts[get_theme_mod( Karma_Options::$header_font, Karma_Options::$header_font_default )], array(), KARMA_VERSION );
    endif;
    
    if( array_key_exists ( get_theme_mod( Karma_Options::$theme_font, Karma_Options::$theme_font_default ), $fonts ) ) :
        wp_enqueue_style('karma-font-general', '//fonts.googleapis.com/css?family=' . $fonts[get_theme_mod( Karma_Options::$theme_font, Karma_Options::$theme_font_default )], array(), KARMA_VERSION );
    endif;
    

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), KARMA_VERSION);
//    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/inc/css/bootstrap-theme.min.css', array(), KARMA_VERSION);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), KARMA_VERSION);
    wp_enqueue_style('karma-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), KARMA_VERSION);
    wp_enqueue_style('animate', get_template_directory_uri() . '/inc/css/animate.css', array(), KARMA_VERSION);
//    wp_enqueue_style('slicknav', get_template_directory_uri() . '/inc/css/slicknav.min.css', array(), KARMA_VERSION);
    
    wp_enqueue_script('jquery-sticky', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('jquery-particles', get_template_directory_uri() . '/inc/js/particle.js', array('jquery'), KARMA_VERSION, true);
//    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/inc/js/easing.js', array('jquery'), KARMA_VERSION, true);
//    wp_enqueue_script('jquery-slicknav', get_template_directory_uri() . '/inc/js/slicknav.min.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('jquery-wow', get_template_directory_uri() . '/inc/js/wow.min.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('jquery-bigslide', get_template_directory_uri() . '/inc/js/bigslide.min.js', array('jquery'), KARMA_VERSION, true);
    wp_enqueue_script('karma-script', get_template_directory_uri() . '/inc/js/script.js', array('jquery', 'jquery-ui-core', 'jquery-masonry'), KARMA_VERSION, true );
    
        
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

function karma_main_width( $post_id ){
    
    $width = 12;
    
    
    if( karma_has_left_sidebar( $post_id ) && karma_has_right_sidebar( $post_id ) ) :
        $width = 6;
    elseif( karma_has_left_sidebar( $post_id ) || karma_has_right_sidebar( $post_id ) ) :
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
    
    if( class_exists( 'Easy_Digital_Downloads' ) && get_theme_mod( Karma_Options::$header_cart_bool, Karma_Options::$header_cart_bool_default ) == 'on' ) :
        $items .= '<li><a class="karma-cart" href="' . esc_url( edd_get_checkout_uri() ) . '"><span class="fa fa-shopping-cart"></span> ' . esc_attr( EDD()->cart->subtotal() ) . '</a></li>';
    endif;
    
    
    
    return $items;
}

add_filter('wp_nav_menu_items', 'karma_customize_nav', 10, 2);


function karma_custom_header() { 
    
    $front = get_option('show_on_front');
    
    if( ( is_front_page() && $front != 'posts' ) || is_page_template( 'templates/frontpage.php' )) {
        return;
    }
    
    ?>
    
    <div id="karma-page-jumbotron" class="table-display">
        <div id="karma-jumbo-js"></div>

        <div class="cell-display">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <header class="entry-header centered">
                            
                            <?php global $post; ?>
                            
                            <?php if( is_archive() ) : ?>
                                
                                <?php the_archive_title('<h1 class="entry-title">', '</h1>'); ?>
                            
                            <?php elseif( is_search() ) : ?>
                            
                                <h1 class="entry-title"><?php printf( esc_html__('Search Results for: %s', 'karma'), '<span>' . get_search_query() . '</span>' ); ?></h1>
                            
                            <?php elseif( is_home() && !is_front_page() ) : ?>
                            
                                <?php single_post_title('<h1 class="entry-title">', '</h1>'); ?>
                                
                            <?php elseif( is_home() ) : ?>

                                <h1 class="entry-title"><?php bloginfo( 'name' ); ?></h1>

                            <?php elseif( is_single() && $post->post_type == 'service' ): ?>
                                    
                                <?php $service_icon = get_post_meta( get_the_ID(), 'karma_service_icon', true ); ?>
                                <h1 class="entry-title"><i class="<?php echo esc_attr( $service_icon ); ?>"></i>   <?php single_post_title()?></h1>
                                
                            <?php else : ?>
                                
                                <?php single_post_title('<h1 class="entry-title">', '</h1>'); ?>
                            
                            <?php endif; ?>
                            
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php }

add_filter( 'get_the_archive_title', function( $title ) {

    if( is_category() ) :
        $title = single_cat_title( '', false );
    elseif( is_tag() ) :
        $title = single_tag_title( '', false );
    elseif( is_author() ) :
        $title = get_the_author();
    else :
        $title = single_cat_title( '', false );
    endif;
    
    return $title;
    
});

function karma_custom_css() {
    
    $theme_color = esc_attr( get_theme_mod( Karma_Options::$theme_color, Karma_Options::$theme_color_default ) );
    
    if ( !function_exists('karma_pro_init') ) :
    
        $theme_color = '#' . $theme_color;
        
    endif;
        
    $theme_color_rgba = karma_hex2rgb( $theme_color );
    
    $logo_height = esc_attr( get_theme_mod( Karma_Options::$custom_logo_height, Karma_Options::$custom_logo_height_default ) );
    $mobile_logo = esc_attr( get_theme_mod( Karma_Options::$mobile_logo_height, Karma_Options::$mobile_logo_height_default ) );
    ?>

    <?php
    
        if ( function_exists( 'karma_pro_init' ) && strpbrk( $theme_color, '#' ) == false ):
                        
            $theme_color = '#' . $theme_color;
            
        endif;
        
    ?>

    <style type="text/css">


        body, p {
            font-size: <?php echo esc_attr( get_theme_mod( Karma_Options::$theme_font_size, Karma_Options::$theme_font_size_default ) ); ?>;
        }
        .site-title > a:hover {
            color: white !important;
        }
        body,
        #karma-features .karma-feature h3.feature-title{
            font-family: <?php echo esc_attr( get_theme_mod( Karma_Options::$theme_font, Karma_Options::$theme_font_default ) ); ?>;
        }
        
        h1,h2,h3,h4,h5,h6,.slide2-header,.slide1-header,.karma-title, .widget-title,.entry-title, .product_title {
            font-family: <?php echo esc_attr( get_theme_mod( Karma_Options::$header_font, Karma_Options::$header_font_default ) ); ?> !important;
        }
        
        ul.karma-nav > li.menu-item a{
            font-size: <?php echo esc_attr( get_theme_mod( Karma_Options::$menu_font_size, Karma_Options::$menu_font_size_default ) ); ?>;
        }
                       
        <?php if ( !function_exists( 'karma_pro_init' ) ) : ?>
        #karma-featured-post #slide1,
        #karma-featured-post #slide1 .slide-vert-wrapper{
            height: <?php echo intval( get_theme_mod(Karma_Options::$jumbotron_height, Karma_Options::$jumbotron_height_default ) ); ?>px;
        }
        <?php endif; ?>
        a,a:visited,
        ul.karma-nav > li > ul li.current-menu-item > a,
        .woocommerce .woocommerce-message:before,
        #karma-social a,
        .entry-meta .fa, .scroll-top {
            color: <?php echo $theme_color; ?>;
        }
        
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
        .karma-button.primary,
        #karma-featured-post #karma-social a:hover{
            border: 2px solid <?php echo $theme_color; ?> !important;
            background: <?php echo $theme_color; ?> !important;
            color: #fff !important;
            outline: none;
            
        }

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
                
        .woocommerce ul.products li.product a img{
            border-bottom: 7px solid <?php echo $theme_color; ?>;
        }
        
        #karma-featured-post #slide1,
        #karma-page-jumbotron{
            background-color: <?php echo $theme_color; ?>;
        }
        
        <?php if( get_header_image() ) : ?>
        
        #karma-page-jumbotron {
            background-image: url( <?php echo esc_url( get_header_image() ); ?> );
        }
        
        <?php endif; ?>
        
        
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="search"]:focus,
        input[type="url"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            box-shadow: 0 0 3px <?php echo $theme_color; ?>;
        }
        
        #karma-logo img {
            max-height: <?php echo $logo_height; ?>px;
        }
        
        @media( max-width: 768px ) {
            #karma-logo img {
                max-height: <?php echo $mobile_logo; ?>px;
            }            
        }

        
    </style>
    <?php
}

add_action('wp_head', 'karma_custom_css');
 
function karma_jumbotron() {
    include_once get_template_directory() . '/template-parts/jumbotron.php';
} 

function karma_homepage_features() {
    include_once get_template_directory() . '/template-parts/features.php';
}


function karma_homepage_shop() { 
    
    $products = new WP_Query (array(
        'post_type'         => 'download',
        'post_status'       => 'publish',
        'posts_per_page'    => get_theme_mod( Karma_Options::$products_count, Karma_Options::$products_count_default ),
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
            
            <?php if ( get_theme_mod( Karma_Options::$products_toggle, Karma_Options::$products_toggle_default ) == 'on' ) : ?>
            
                <?php $i = 0; ?>
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 edd-product <?php echo $i%3==0 ? ' first' : '';?>">
                            <div class="edd-product-inner">
                                <div class="product-image">
                                    <div class="overlay">
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
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail( 'product-image' ); ?>
                                        <?php else : ?>
                                            <div class="edd-product-icon">
                                                <span class="fa fa-download"></span>
                                            </div>
                                        <?php endif; ?>
                                    </a>

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
                        
            <?php endif; ?>
                        
        </div>
        
    </div>
    
    
<?php }

function karma_render_homepage() { 
    
    if( get_theme_mod( Karma_Options::$featured_post_toggle, Karma_Options::$featured_post_toggle_default ) == 'on' ) :
    
        if ( !function_exists( 'karma_pro_init' ) ) :
            karma_jumbotron();
        else:
            karma_pro_jumbotron();
        endif;
            
    endif;
    
    if( get_theme_mod( Karma_Options::$features_toggle, Karma_Options::$features_toggle_default ) == 'on' ) :
    
        karma_homepage_features();
    
    endif;
    
    
    
    if( get_theme_mod( Karma_Options::$homepage_content_toggle, Karma_Options::$homepage_content_toggle_default ) == 'on' && class_exists( 'Easy_Digital_Downloads' ) ) :
    
        karma_homepage_shop();
    
    endif;
    
    
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

    <?php if ( is_active_sidebar( 'sidebar-cta' ) ) : ?>

        <div id="karma-cta">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'sidebar-cta' ); ?>
                </div>
            </div>
        </div>
    
    <?php endif; ?>
    
    <div class="clear"></div>

    
    <div class="site-info karma-footer">
          
        <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
        
        <div class="container">

            <div class="row">
              
                <div class="sidebar-footer">
                    <?php dynamic_sidebar('sidebar-footer'); ?>
                </div>
               
            </div>
            
        </div>
        
        <div class="seperator"></div>
        
        <?php endif; ?>
        
        <div class="container karma-post-footer">
            
            <div class="row">


                <div class="karma-copyright col-sm-6">
                       
                    <?php if ( get_theme_mod( Karma_Options::$visa_display, Karma_Options::$visa_display_default ) ||
                          get_theme_mod( Karma_Options::$mastercard_display, Karma_Options::$mastercard_display_default ) ||
                          get_theme_mod( Karma_Options::$amex_display, Karma_Options::$amex_display_default ) ||
                          get_theme_mod( Karma_Options::$paypal_display, Karma_Options::$paypal_display_default ) ) : ?>
                                        
                        <div class="payment-icons">

                            <?php if ( get_theme_mod( Karma_Options::$visa_display, Karma_Options::$visa_display_default ) ) : ?>
                                <i class="fa fa-cc-visa"></i>
                            <?php endif; ?>

                            <?php if ( get_theme_mod( Karma_Options::$mastercard_display, Karma_Options::$mastercard_display_default ) ) : ?>
                                <i class="fa fa-cc-mastercard"></i>
                            <?php endif; ?>

                            <?php if ( get_theme_mod( Karma_Options::$amex_display, Karma_Options::$amex_display_default ) ) : ?>
                                <i class="fa fa-cc-amex"></i>
                            <?php endif; ?>

                            <?php if ( get_theme_mod( Karma_Options::$paypal_display, Karma_Options::$paypal_display_default ) ) : ?>
                                <i class="fa fa-cc-paypal"></i>
                            <?php endif; ?>

                        </div>
                    
                    <?php endif; ?>
                    <a href="https://smartcatdesign.net" rel="designer" style="display: inline-block !important" class="rel">
                        <?php printf( esc_html__( 'Karma Theme - Designed by ', 'karma' ), 'Smartcat' ); ?> 
                        <img src="<?php echo get_template_directory_uri() . '/inc/images/smartcat.png'?>" style="height: 20px;"/>
                    </a>  
                                        
                </div>
                
                <div class="col-sm-6">
                    <?php karma_social_icons(); ?>
                    <p><?php echo esc_html( get_theme_mod( Karma_Options::$copyright_text, get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?></p>
                </div>

            </div>
            
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

<?php if ( get_theme_mod( Karma_Options::$facebook_url, Karma_Options::$facebook_url_default ) != '' ||
           get_theme_mod( Karma_Options::$gplus_url, Karma_Options::$gplus_url_default ) != '' ||
           get_theme_mod( Karma_Options::$instagram_url, Karma_Options::$instagram_url_default ) != '' ||
           get_theme_mod( Karma_Options::$linkedin_url, Karma_Options::$linkedin_url_default ) != '' ||
           get_theme_mod( Karma_Options::$pinterest_url, Karma_Options::$pinterest_url_default ) != '' ||
           get_theme_mod( Karma_Options::$twitter_url, Karma_Options::$twitter_url_default ) != '' ||
           get_theme_mod( Karma_Options::$vimeo_url, Karma_Options::$vimeo_url_default ) != '' ||
           get_theme_mod( Karma_Options::$spotify_url, Karma_Options::$spotify_url_default ) != '' ||
           get_theme_mod( Karma_Options::$apple_url, Karma_Options::$apple_url_default ) != '' ||
           get_theme_mod( Karma_Options::$github_url, Karma_Options::$github_url_default ) != '' ||
           get_theme_mod( Karma_Options::$vine_url, Karma_Options::$vine_url_default ) != ''
        ) :?>
    
    <div id="karma-social">

        <?php if( get_theme_mod( Karma_Options::$facebook_url, Karma_Options::$facebook_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$facebook_url, Karma_Options::$facebook_url_default ) ); ?>" target="_BLANK" class="karma-facebook">
            <span class="fa fa-facebook"></span>
        </a>
        <?php endif; ?>


        <?php if( get_theme_mod( Karma_Options::$gplus_url, Karma_Options::$gplus_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$gplus_url, Karma_Options::$gplus_url_default ) ); ?>" target="_BLANK" class="karma-gplus">
            <span class="fa fa-google-plus"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( Karma_Options::$instagram_url, Karma_Options::$instagram_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$instagram_url, Karma_Options::$instagram_url_default ) ); ?>" target="_BLANK" class="karma-instagram">
            <span class="fa fa-instagram"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( Karma_Options::$linkedin_url, Karma_Options::$linkedin_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$linkedin_url, Karma_Options::$linkedin_url_default ) ); ?>" target="_BLANK" class="karma-linkedin">
            <span class="fa fa-linkedin"></span>
        </a>
        <?php endif; ?>


        <?php if( get_theme_mod ( Karma_Options::$pinterest_url, Karma_Options::$pinterest_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod ( Karma_Options::$pinterest_url, Karma_Options::$pinterest_url_default ) ); ?>" target="_BLANK" class="karma-pinterest">
            <span class="fa fa-pinterest"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( Karma_Options::$twitter_url, Karma_Options::$twitter_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$twitter_url, Karma_Options::$twitter_url_default ) ); ?>" target="_BLANK" class="karma-twitter">
            <span class="fa fa-twitter"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( Karma_Options::$vimeo_url, Karma_Options::$vimeo_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$vimeo_url, Karma_Options::$vimeo_url_default ) ); ?>" target="_BLANK" class="karma-vimeo">
            <span class="fa fa-vimeo"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( Karma_Options::$spotify_url, Karma_Options::$spotify_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$spotify_url, Karma_Options::$spotify_url_default ) ); ?>" target="_BLANK" class="karma-spotify">
            <span class="fa fa-spotify"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( Karma_Options::$apple_url, Karma_Options::$apple_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$apple_url, Karma_Options::$apple_url_default ) ); ?>" target="_BLANK" class="karma-apple">
            <span class="fa fa-apple"></span>
        </a>
        <?php endif; ?>

        <?php if( get_theme_mod( Karma_Options::$github_url, Karma_Options::$github_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$github_url, Karma_Options::$github_url_default ) ); ?>" target="_BLANK" class="karma-github">
            <span class="fa fa-github"></span>
        </a>
        <?php endif; ?>


        <?php if( get_theme_mod( Karma_Options::$vine_url, Karma_Options::$vine_url_default ) != '' ) : ?>
        <a href="<?php echo esc_url( get_theme_mod( Karma_Options::$vine_url, Karma_Options::$vine_url_default ) ); ?>" target="_BLANK" class="karma-vine">
            <span class="fa fa-vine"></span>
        </a>
        <?php endif; ?>

    </div>
    <?php endif; ?>
    
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

function karma_get_footer_nav() {
    
    if( has_nav_menu( 'footer' ) ) :

        $menu = wp_nav_menu(array(
            'theme_location' => 'footer',
            'menu_id' => 'footer-menu',
            'menu_class' => 'karma-footer-nav',
        ));
    
    endif;
    
}

function karma_get_mobile_nav() {
    
    if( has_nav_menu( 'mobile' ) ) :

        $menu = wp_nav_menu(array(
            'theme_location' => 'mobile',
            'menu_id' => 'mobile-menu',
            'menu_class' => 'karma-mobile-nav',
            'container' => '',
            
        ));
    elseif( has_nav_menu( 'primary' ) ) :

        $menu = wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_id' => 'mobile-menu',
            'menu_class' => 'karma-mobile-nav',
            'container' => '',
        ));
    else :

        if( current_user_can( 'edit_theme_options' ) ) :
            echo '<div id="karma-add-menu"><a class="karma-cart" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . __( 'Add a Primary Menu', 'karma' ) . '</a></div>';
        endif;
    endif;
    
}

function karma_has_left_sidebar( $post_id ) {
    
    $sidebar_location = get_post_meta( $post_id, 'karma_sidebar_location', true ) ? get_post_meta( $post_id, 'karma_sidebar_location', true ) : '';

    
    if( $sidebar_location == 'karma_default' || $sidebar_location == 'karma_left' || $sidebar_location == 'karma_leftright' || $sidebar_location == '' ) :
        
        return true;
    
    endif;
    
    return false;
    
}

function karma_has_right_sidebar( $post_id ) {
    
    $sidebar_location = get_post_meta( $post_id, 'karma_sidebar_location', true ) ? get_post_meta( $post_id, 'karma_sidebar_location', true ) : '';
    
    if( $sidebar_location == 'karma_default' || $sidebar_location == 'karma_right' || $sidebar_location == 'karma_leftright' || $sidebar_location == '' ) :
        
        return true;
    
    endif;
    
    return false;
    
}

function karma_edd_categories() {
    
    $categories = karma_get_edd_categories();
    
    if ( is_tax( 'download_category' ) ) {
    }
    
    if( $categories ) : ?>
        
        <ul id="edd-categories-bar">
    
            <?php wp_list_categories( 'title_li=&taxonomy=download_category&show_count=0&hide_empty=0' ); ?>
           
        </ul>
    <?php endif;
    
}

function karma_get_edd_categories() {
    
    $taxonomy = 'download_category';
    return get_terms( $taxonomy ) ? get_terms( $taxonomy ) : false;
    
}


new Karma_Sidebar_Meta_Box;
class Karma_Sidebar_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    public function init_metabox() {

        add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
        add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

    }

    public function add_metabox() {
        
        if( function_exists( 'karma_pro_init' ) ) {
            
            add_meta_box(
                'karma-sidebar',
                __( 'Sidebar and Widgets', 'karma' ),
                array( $this, 'render_metabox' ),
                array( 'post', 'page', 'service', 'project' ),
                'side',
                'high'
            );
        }else {
            add_meta_box(
                'karma-sidebar',
                __( 'Sidebar and Widgets', 'karma' ),
                array( $this, 'render_metabox' ),
                array( 'post', 'page' ),
                'side',
                'high'
            );            
        }
        

    }
    
    
    public function render_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'karma_nonce_action', 'karma_nonce' );

        // Retrieve an existing value from the database.
        $karma_sidebar_location = get_post_meta( $post->ID, 'karma_sidebar_location', true );
        $karma_bottom_widget_area = get_post_meta( $post->ID, 'karma_bottom_widget_area', true );

        // Set default values.
        if( empty( $karma_sidebar_location ) ) $karma_sidebar_location = '';
        if( empty( $karma_bottom_widget_area ) ) $karma_bottom_widget_area = '';

        // Form fields.
        echo '<table class="form-table">';

        echo '  <tr>';
        echo '      <th><label for="karma_sidebar_location" class="karma_sidebar_location_label">' . __( 'Sidebar Location', 'karma' ) . '</label></th>';
        echo '      <td>';
        echo '          <select id="karma_sidebar_location" name="karma_sidebar_location" class="karma_sidebar_location_field">';
        echo '          <option value="karma_default" ' . esc_attr( selected( $karma_sidebar_location, 'karma_default', false ) ) . '> ' . __( 'Default', 'karma' ) . '</option>';
        echo '          <option value="karma_left" ' . esc_attr( selected( $karma_sidebar_location, 'karma_left', false ) ) . '> ' . __( 'Left Sidebar', 'karma' ) . '</option>';
        echo '          <option value="karma_right" ' . esc_attr( selected( $karma_sidebar_location, 'karma_right', false ) ) . '> ' . __( 'Right Sidebar', 'karma' ) . '</option>';
        echo '          <option value="karma_leftright" ' . esc_attr( selected( $karma_sidebar_location, 'karma_leftright', false ) ) . '> ' . __( 'Left + Right Sidebars', 'karma' ) . '</option>';
        echo '          <option value="karma_none" ' . esc_attr( selected( $karma_sidebar_location, 'karma_none', false ) ) . '> ' . __( 'No Sidebar', 'karma' ) . '</option>';
        echo '          </select>';
        echo '          <p class="description">' . __( 'Do you want to display a sidebar on this post?', 'karma' ) . '</p>';
        echo '      </td>';
        echo '  </tr>';
        echo '  <tr>';
        echo '      <th><label for="karma_bottom_widget_area" class="karma_bottom_widget_area_label">' . __( 'Bottom Widget Area', 'karma' ) . '</label></th>';
        echo '      <td>';
        echo '          <select id="karma_bottom_widget_area" name="karma_bottom_widget_area" class="karma_bottom_widget_area_field">';
        echo '          <option value="karma_none" ' . esc_attr( selected( $karma_bottom_widget_area, 'karma_none', false ) ) . '> ' . __( 'None', 'karma' ) . '</option>';
        echo '          <option value="widget_area_a" ' . esc_attr( selected( $karma_bottom_widget_area, 'widget_area_a', false ) ) . '> ' . __( 'Widget Area A', 'karma' ) . '</option>';
        echo '          <option value="widget_area_b" ' . esc_attr( selected( $karma_bottom_widget_area, 'widget_area_b', false ) ) . '> ' . __( 'Widget Area B', 'karma' ) . '</option>';
        echo '          <option value="widget_area_c" ' . esc_attr( selected( $karma_bottom_widget_area, 'widget_area_c', false ) ) . '> ' . __( 'Widget Area C', 'karma' ) . '</option>';
        echo '          </select>';
        echo '          <p class="description">' . __( 'Which widget area do you want at the bottom?', 'karma' ) . '</p>';
        echo '      </td>';
        echo '  </tr>';

        echo '</table>';

    }

    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name   = isset( $_POST['karma_nonce'] ) ? $_POST['karma_nonce'] : '';
        $nonce_action = 'karma_nonce_action';

        // Check if a nonce is set.
        if ( ! isset( $nonce_name ) )
            return;

        // Check if a nonce is valid.
        if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
            return;

        // Sanitize user input.
        $karma_new_sidebar_location = isset( $_POST[ 'karma_sidebar_location' ] ) ? $_POST[ 'karma_sidebar_location' ] : '';
        $karma_new_bottom_widget_area = isset( $_POST[ 'karma_bottom_widget_area' ] ) ? $_POST[ 'karma_bottom_widget_area' ] : '';
        

        // Update the meta field in the database.
        update_post_meta( $post_id, 'karma_sidebar_location', $karma_new_sidebar_location );
        update_post_meta( $post_id, 'karma_bottom_widget_area', $karma_new_bottom_widget_area );

    }

}
register_sidebar(array(
    'name' => 'Widget Area A',
    'id' => 'widget_area_a',
    'before_widget' => "<div class='col-sm-4'><aside>",
    'after_widget' => '</aside></div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
register_sidebar(array(
    'name' => 'Widget Area B',
    'id' => 'widget_area_b',
    'before_widget' => "<div class='col-sm-4'><aside>",
    'after_widget' => '</aside>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
register_sidebar(array(
    'name' => 'Widget Area C',
    'id' => 'widget_area_c',
    'before_widget' => "<div class='col-sm-4'><aside>",
    'after_widget' => '</aside>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
