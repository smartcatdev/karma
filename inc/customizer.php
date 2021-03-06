<?php


function karma_customize_register( $wp_customize ) {

    require get_template_directory() . '/inc/customizer/logo-menu.php';
    require get_template_directory() . '/inc/customizer/frontpage.php';
    require get_template_directory() . '/inc/customizer/appearance.php';
    require get_template_directory() . '/inc/customizer/footer.php';
    require get_template_directory() . '/inc/customizer/jumbotron.php';
    
    class KarmaCustomizerPanel extends WP_Customize_Control {

        public function render_content() { ?>
            
            <p>
                <a target="_BLANK" href="http://karma.smartcatdev.wpengine.com/" class="button-primary"><?php _e( 'Live demo', 'karma' ); ?></a>
            </p>

            <p>
                <?php _e( 'Karma allows you to easily create a frontpage, blog page, e-commerce shop page, and it also includes templates allowing you to customize where the sidebars are located', 'karma' ); ?>
            </p>
            <p>
                <?php _e( 'The <b>Frontpage</b> section includes customization options for your Frontpage. You can select a post, page or WooCommerce product to be featured in the main jumbotron. There are 3 sections that allow you to feature your pages, posts or products.', 'karma' ); ?>
            </p>
            <p>
                <?php _e( 'You can select if you want your homepage to show the Blog or the Frontpage from <b> Frontpage -> Static Front Page</b>', 'karma' ); ?>
            </p>
            <h4>
                <?php _e( 'Enjoy this free theme! If you have any recommendations, comments or suggestions please leave us a comment on our', 'karma' ); ?>
                <a href="https://www.facebook.com/SmartcatDesign/" target="_BLANK"><?php _e( 'Facebook page', 'karma' ); ?></a>
            </h4>
        <?php }

    }
    
    
    // *********************************************
    // ****************** General ******************
    // *********************************************
    
    $wp_customize->add_section('karma_demo', array(
        'title'     => __( 'Theme Demo & Instructions', 'karma'),
        'priority'  => 0.5,
    ));
    
	$wp_customize->add_setting( 'karma_demo_details', array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
            new KarmaCustomizerPanel(
            $wp_customize,
            'karma_demo',
                array(
                    'label'     => __('Karma Demo','karma'),
                    'section'   => 'karma_demo',
                    'settings'  => 'karma_demo_details',
                )
            )
	);
   
    
    $wp_customize->get_setting( 'blogname' )->transport             = 'refresh';
    $wp_customize->get_setting( 'blogdescription' )->transport      = 'refresh';
//    $wp_customize->get_section( 'header_image' )->title = __( 'Header ' );
    $wp_customize->get_section( 'header_image' )->panel = 'header';

    

    
}

add_action( 'customize_register', 'karma_customize_register' );




/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function karma_customize_enqueue() {
    
    wp_enqueue_script( 'karma-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
    
}
add_action( 'customize_controls_enqueue_scripts', 'karma_customize_enqueue' );

function karma_customize_preview_js() {
    wp_enqueue_script( 'karma_customizer', get_template_directory_uri() . '/js/customizer.js', array ( 'customize-preview' ), KARMA_VERSION, true );
}

add_action( 'customize_preview_init', 'karma_customize_preview_js' );


function karma_icons(){
    
    return array( 
        'fa fa-clock' => __( 'Select One', 'karma'), 
        'fa fa-500px' => __( ' 500px', 'karma'), 
        'fa fa-amazon' => __( ' amazon', 'karma'), 
        'fa fa-balance-scale' => __( ' balance-scale', 'karma'), 'fa fa-battery-0' => __( ' battery-0', 'karma'), 'fa fa-battery-1' => __( ' battery-1', 'karma'), 'fa fa-battery-2' => __( ' battery-2', 'karma'), 'fa fa-battery-3' => __( ' battery-3', 'karma'), 'fa fa-battery-4' => __( ' battery-4', 'karma'), 'fa fa-battery-empty' => __( ' battery-empty', 'karma'), 'fa fa-battery-full' => __( ' battery-full', 'karma'), 'fa fa-battery-half' => __( ' battery-half', 'karma'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'karma'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'karma'), 'fa fa-black-tie' => __( ' black-tie', 'karma'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'karma'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'karma'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'karma'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'karma'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'karma'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'karma'), 'fa fa-chrome' => __( ' chrome', 'karma'), 'fa fa-clone' => __( ' clone', 'karma'), 'fa fa-commenting' => __( ' commenting', 'karma'), 'fa fa-commenting-o' => __( ' commenting-o', 'karma'), 'fa fa-contao' => __( ' contao', 'karma'), 'fa fa-creative-commons' => __( ' creative-commons', 'karma'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'karma'), 'fa fa-firefox' => __( ' firefox', 'karma'), 'fa fa-fonticons' => __( ' fonticons', 'karma'), 'fa fa-genderless' => __( ' genderless', 'karma'), 'fa fa-get-pocket' => __( ' get-pocket', 'karma'), 'fa fa-gg' => __( ' gg', 'karma'), 'fa fa-gg-circle' => __( ' gg-circle', 'karma'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'karma'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'karma'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'karma'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'karma'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'karma'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'karma'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'karma'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'karma'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'karma'), 'fa fa-hourglass' => __( ' hourglass', 'karma'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'karma'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'karma'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'karma'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'karma'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'karma'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'karma'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'karma'), 'fa fa-houzz' => __( ' houzz', 'karma'), 'fa fa-i-cursor' => __( ' i-cursor', 'karma'), 'fa fa-industry' => __( ' industry', 'karma'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'karma'), 'fa fa-map' => __( ' map', 'karma'), 'fa fa-map-o' => __( ' map-o', 'karma'), 'fa fa-map-pin' => __( ' map-pin', 'karma'), 'fa fa-map-signs' => __( ' map-signs', 'karma'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'karma'), 'fa fa-object-group' => __( ' object-group', 'karma'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'karma'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'karma'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'karma'), 'fa fa-opencart' => __( ' opencart', 'karma'), 'fa fa-opera' => __( ' opera', 'karma'), 'fa fa-optin-monster' => __( ' optin-monster', 'karma'), 'fa fa-registered' => __( ' registered', 'karma'), 'fa fa-safari' => __( ' safari', 'karma'), 'fa fa-sticky-note' => __( ' sticky-note', 'karma'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'karma'), 'fa fa-television' => __( ' television', 'karma'), 'fa fa-trademark' => __( ' trademark', 'karma'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'karma'), 'fa fa-tv' => __( ' tv', 'karma'), 'fa fa-vimeo' => __( ' vimeo', 'karma'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'karma'), 'fa fa-y-combinator' => __( ' y-combinator', 'karma'), 'fa fa-yc' => __( ' yc', 'karma'), 'fa fa-adjust' => __( ' adjust', 'karma'), 'fa fa-anchor' => __( ' anchor', 'karma'), 'fa fa-archive' => __( ' archive', 'karma'), 'fa fa-area-chart' => __( ' area-chart', 'karma'), 'fa fa-arrows' => __( ' arrows', 'karma'), 'fa fa-arrows-h' => __( ' arrows-h', 'karma'), 'fa fa-arrows-v' => __( ' arrows-v', 'karma'), 'fa fa-asterisk' => __( ' asterisk', 'karma'), 'fa fa-at' => __( ' at', 'karma'), 'fa fa-automobile' => __( ' automobile', 'karma'), 'fa fa-balance-scale' => __( ' balance-scale', 'karma'), 'fa fa-ban' => __( ' ban', 'karma'), 'fa fa-bank' => __( ' bank', 'karma'), 'fa fa-bar-chart' => __( ' bar-chart', 'karma'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'karma'), 'fa fa-barcode' => __( ' barcode', 'karma'), 'fa fa-bars' => __( ' bars', 'karma'), 'fa fa-battery-0' => __( ' battery-0', 'karma'), 'fa fa-battery-1' => __( ' battery-1', 'karma'), 'fa fa-battery-2' => __( ' battery-2', 'karma'), 'fa fa-battery-3' => __( ' battery-3', 'karma'), 'fa fa-battery-4' => __( ' battery-4', 'karma'), 'fa fa-battery-empty' => __( ' battery-empty', 'karma'), 'fa fa-battery-full' => __( ' battery-full', 'karma'), 'fa fa-battery-half' => __( ' battery-half', 'karma'), 'fa fa-battery-quarter' => __( ' battery-quarter', 'karma'), 'fa fa-battery-three-quarters' => __( ' battery-three-quarters', 'karma'), 'fa fa-bed' => __( ' bed', 'karma'), 'fa fa-beer' => __( ' beer', 'karma'), 'fa fa-bell' => __( ' bell', 'karma'), 'fa fa-bell-o' => __( ' bell-o', 'karma'), 'fa fa-bell-slash' => __( ' bell-slash', 'karma'), 'fa fa-bell-slash-o' => __( ' bell-slash-o', 'karma'), 'fa fa-bicycle' => __( ' bicycle', 'karma'), 'fa fa-binoculars' => __( ' binoculars', 'karma'), 'fa fa-birthday-cake' => __( ' birthday-cake', 'karma'), 'fa fa-bolt' => __( ' bolt', 'karma'), 'fa fa-bomb' => __( ' bomb', 'karma'), 'fa fa-book' => __( ' book', 'karma'), 'fa fa-bookmark' => __( ' bookmark', 'karma'), 'fa fa-bookmark-o' => __( ' bookmark-o', 'karma'), 'fa fa-briefcase' => __( ' briefcase', 'karma'), 'fa fa-bug' => __( ' bug', 'karma'), 'fa fa-building' => __( ' building', 'karma'), 'fa fa-building-o' => __( ' building-o', 'karma'), 'fa fa-bullhorn' => __( ' bullhorn', 'karma'), 'fa fa-bullseye' => __( ' bullseye', 'karma'), 'fa fa-bus' => __( ' bus', 'karma'), 'fa fa-cab' => __( ' cab', 'karma'), 'fa fa-calculator' => __( ' calculator', 'karma'), 'fa fa-calendar' => __( ' calendar', 'karma'), 'fa fa-calendar-check-o' => __( ' calendar-check-o', 'karma'), 'fa fa-calendar-minus-o' => __( ' calendar-minus-o', 'karma'), 'fa fa-calendar-o' => __( ' calendar-o', 'karma'), 'fa fa-calendar-plus-o' => __( ' calendar-plus-o', 'karma'), 'fa fa-calendar-times-o' => __( ' calendar-times-o', 'karma'), 'fa fa-camera' => __( ' camera', 'karma'), 'fa fa-camera-retro' => __( ' camera-retro', 'karma'), 'fa fa-car' => __( ' car', 'karma'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'karma'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'karma'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'karma'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'karma'), 'fa fa-cart-arrow-down' => __( ' cart-arrow-down', 'karma'), 'fa fa-cart-plus' => __( ' cart-plus', 'karma'), 'fa fa-cc' => __( ' cc', 'karma'), 'fa fa-certificate' => __( ' certificate', 'karma'), 'fa fa-check' => __( ' check', 'karma'), 'fa fa-check-circle' => __( ' check-circle', 'karma'), 'fa fa-check-circle-o' => __( ' check-circle-o', 'karma'), 'fa fa-check-square' => __( ' check-square', 'karma'), 'fa fa-check-square-o' => __( ' check-square-o', 'karma'), 'fa fa-child' => __( ' child', 'karma'), 'fa fa-circle' => __( ' circle', 'karma'), 'fa fa-circle-o' => __( ' circle-o', 'karma'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'karma'), 'fa fa-circle-thin' => __( ' circle-thin', 'karma'), 'fa fa-clock-o' => __( ' clock-o', 'karma'), 'fa fa-clone' => __( ' clone', 'karma'), 'fa fa-close' => __( ' close', 'karma'), 'fa fa-cloud' => __( ' cloud', 'karma'), 'fa fa-cloud-download' => __( ' cloud-download', 'karma'), 'fa fa-cloud-upload' => __( ' cloud-upload', 'karma'), 'fa fa-code' => __( ' code', 'karma'), 'fa fa-code-fork' => __( ' code-fork', 'karma'), 'fa fa-coffee' => __( ' coffee', 'karma'), 'fa fa-cog' => __( ' cog', 'karma'), 'fa fa-cogs' => __( ' cogs', 'karma'), 'fa fa-comment' => __( ' comment', 'karma'), 'fa fa-comment-o' => __( ' comment-o', 'karma'), 'fa fa-commenting' => __( ' commenting', 'karma'), 'fa fa-commenting-o' => __( ' commenting-o', 'karma'), 'fa fa-comments' => __( ' comments', 'karma'), 'fa fa-comments-o' => __( ' comments-o', 'karma'), 'fa fa-compass' => __( ' compass', 'karma'), 'fa fa-copyright' => __( ' copyright', 'karma'), 'fa fa-creative-commons' => __( ' creative-commons', 'karma'), 'fa fa-credit-card' => __( ' credit-card', 'karma'), 'fa fa-crop' => __( ' crop', 'karma'), 'fa fa-crosshairs' => __( ' crosshairs', 'karma'), 'fa fa-cube' => __( ' cube', 'karma'), 'fa fa-cubes' => __( ' cubes', 'karma'), 'fa fa-cutlery' => __( ' cutlery', 'karma'), 'fa fa-dashboard' => __( ' dashboard', 'karma'), 'fa fa-database' => __( ' database', 'karma'), 'fa fa-desktop' => __( ' desktop', 'karma'), 'fa fa-diamond' => __( ' diamond', 'karma'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'karma'), 'fa fa-download' => __( ' download', 'karma'), 'fa fa-edit' => __( ' edit', 'karma'), 'fa fa-ellipsis-h' => __( ' ellipsis-h', 'karma'), 'fa fa-ellipsis-v' => __( ' ellipsis-v', 'karma'), 'fa fa-envelope' => __( ' envelope', 'karma'), 'fa fa-envelope-o' => __( ' envelope-o', 'karma'), 'fa fa-envelope-square' => __( ' envelope-square', 'karma'), 'fa fa-eraser' => __( ' eraser', 'karma'), 'fa fa-exchange' => __( ' exchange', 'karma'), 'fa fa-exclamation' => __( ' exclamation', 'karma'), 'fa fa-exclamation-circle' => __( ' exclamation-circle', 'karma'), 'fa fa-exclamation-triangle' => __( ' exclamation-triangle', 'karma'), 'fa fa-external-link' => __( ' external-link', 'karma'), 'fa fa-external-link-square' => __( ' external-link-square', 'karma'), 'fa fa-eye' => __( ' eye', 'karma'), 'fa fa-eye-slash' => __( ' eye-slash', 'karma'), 'fa fa-eyedropper' => __( ' eyedropper', 'karma'), 'fa fa-fax' => __( ' fax', 'karma'), 'fa fa-feed' => __( ' feed', 'karma'), 'fa fa-female' => __( ' female', 'karma'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'karma'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'karma'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'karma'), 'fa fa-file-code-o' => __( ' file-code-o', 'karma'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'karma'), 'fa fa-file-image-o' => __( ' file-image-o', 'karma'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'karma'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'karma'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'karma'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'karma'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'karma'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'karma'), 'fa fa-file-video-o' => __( ' file-video-o', 'karma'), 'fa fa-file-word-o' => __( ' file-word-o', 'karma'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'karma'), 'fa fa-film' => __( ' film', 'karma'), 'fa fa-filter' => __( ' filter', 'karma'), 'fa fa-fire' => __( ' fire', 'karma'), 'fa fa-fire-extinguisher' => __( ' fire-extinguisher', 'karma'), 'fa fa-flag' => __( ' flag', 'karma'), 'fa fa-flag-checkered' => __( ' flag-checkered', 'karma'), 'fa fa-flag-o' => __( ' flag-o', 'karma'), 'fa fa-flash' => __( ' flash', 'karma'), 'fa fa-flask' => __( ' flask', 'karma'), 'fa fa-folder' => __( ' folder', 'karma'), 'fa fa-folder-o' => __( ' folder-o', 'karma'), 'fa fa-folder-open' => __( ' folder-open', 'karma'), 'fa fa-folder-open-o' => __( ' folder-open-o', 'karma'), 'fa fa-frown-o' => __( ' frown-o', 'karma'), 'fa fa-futbol-o' => __( ' futbol-o', 'karma'), 'fa fa-gamepad' => __( ' gamepad', 'karma'), 'fa fa-gavel' => __( ' gavel', 'karma'), 'fa fa-gear' => __( ' gear', 'karma'), 'fa fa-gears' => __( ' gears', 'karma'), 'fa fa-gift' => __( ' gift', 'karma'), 'fa fa-glass' => __( ' glass', 'karma'), 'fa fa-globe' => __( ' globe', 'karma'), 'fa fa-graduation-cap' => __( ' graduation-cap', 'karma'), 'fa fa-group' => __( ' group', 'karma'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'karma'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'karma'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'karma'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'karma'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'karma'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'karma'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'karma'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'karma'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'karma'), 'fa fa-hdd-o' => __( ' hdd-o', 'karma'), 'fa fa-headphones' => __( ' headphones', 'karma'), 'fa fa-heart' => __( ' heart', 'karma'), 'fa fa-heart-o' => __( ' heart-o', 'karma'), 'fa fa-heartbeat' => __( ' heartbeat', 'karma'), 'fa fa-history' => __( ' history', 'karma'), 'fa fa-home' => __( ' home', 'karma'), 'fa fa-hotel' => __( ' hotel', 'karma'), 'fa fa-hourglass' => __( ' hourglass', 'karma'), 'fa fa-hourglass-1' => __( ' hourglass-1', 'karma'), 'fa fa-hourglass-2' => __( ' hourglass-2', 'karma'), 'fa fa-hourglass-3' => __( ' hourglass-3', 'karma'), 'fa fa-hourglass-end' => __( ' hourglass-end', 'karma'), 'fa fa-hourglass-half' => __( ' hourglass-half', 'karma'), 'fa fa-hourglass-o' => __( ' hourglass-o', 'karma'), 'fa fa-hourglass-start' => __( ' hourglass-start', 'karma'), 'fa fa-i-cursor' => __( ' i-cursor', 'karma'), 'fa fa-image' => __( ' image', 'karma'), 'fa fa-inbox' => __( ' inbox', 'karma'), 'fa fa-industry' => __( ' industry', 'karma'), 'fa fa-info' => __( ' info', 'karma'), 'fa fa-info-circle' => __( ' info-circle', 'karma'), 'fa fa-institution' => __( ' institution', 'karma'), 'fa fa-key' => __( ' key', 'karma'), 'fa fa-keyboard-o' => __( ' keyboard-o', 'karma'), 'fa fa-language' => __( ' language', 'karma'), 'fa fa-laptop' => __( ' laptop', 'karma'), 'fa fa-leaf' => __( ' leaf', 'karma'), 'fa fa-legal' => __( ' legal', 'karma'), 'fa fa-lemon-o' => __( ' lemon-o', 'karma'), 'fa fa-level-down' => __( ' level-down', 'karma'), 'fa fa-level-up' => __( ' level-up', 'karma'), 'fa fa-life-bouy' => __( ' life-bouy', 'karma'), 'fa fa-life-buoy' => __( ' life-buoy', 'karma'), 'fa fa-life-ring' => __( ' life-ring', 'karma'), 'fa fa-life-saver' => __( ' life-saver', 'karma'), 'fa fa-lightbulb-o' => __( ' lightbulb-o', 'karma'), 'fa fa-line-chart' => __( ' line-chart', 'karma'), 'fa fa-location-arrow' => __( ' location-arrow', 'karma'), 'fa fa-lock' => __( ' lock', 'karma'), 'fa fa-magic' => __( ' magic', 'karma'), 'fa fa-magnet' => __( ' magnet', 'karma'), 'fa fa-mail-forward' => __( ' mail-forward', 'karma'), 'fa fa-mail-reply' => __( ' mail-reply', 'karma'), 'fa fa-mail-reply-all' => __( ' mail-reply-all', 'karma'), 'fa fa-male' => __( ' male', 'karma'), 'fa fa-map' => __( ' map', 'karma'), 'fa fa-map-marker' => __( ' map-marker', 'karma'), 'fa fa-map-o' => __( ' map-o', 'karma'), 'fa fa-map-pin' => __( ' map-pin', 'karma'), 'fa fa-map-signs' => __( ' map-signs', 'karma'), 'fa fa-meh-o' => __( ' meh-o', 'karma'), 'fa fa-microphone' => __( ' microphone', 'karma'), 'fa fa-microphone-slash' => __( ' microphone-slash', 'karma'), 'fa fa-minus' => __( ' minus', 'karma'), 'fa fa-minus-circle' => __( ' minus-circle', 'karma'), 'fa fa-minus-square' => __( ' minus-square', 'karma'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'karma'), 'fa fa-mobile' => __( ' mobile', 'karma'), 'fa fa-mobile-phone' => __( ' mobile-phone', 'karma'), 'fa fa-money' => __( ' money', 'karma'), 'fa fa-moon-o' => __( ' moon-o', 'karma'), 'fa fa-mortar-board' => __( ' mortar-board', 'karma'), 'fa fa-motorcycle' => __( ' motorcycle', 'karma'), 'fa fa-mouse-pointer' => __( ' mouse-pointer', 'karma'), 'fa fa-music' => __( ' music', 'karma'), 'fa fa-navicon' => __( ' navicon', 'karma'), 'fa fa-newspaper-o' => __( ' newspaper-o', 'karma'), 'fa fa-object-group' => __( ' object-group', 'karma'), 'fa fa-object-ungroup' => __( ' object-ungroup', 'karma'), 'fa fa-paint-brush' => __( ' paint-brush', 'karma'), 'fa fa-paper-plane' => __( ' paper-plane', 'karma'), 'fa fa-paper-plane-o' => __( ' paper-plane-o', 'karma'), 'fa fa-paw' => __( ' paw', 'karma'), 'fa fa-pencil' => __( ' pencil', 'karma'), 'fa fa-pencil-square' => __( ' pencil-square', 'karma'), 'fa fa-pencil-square-o' => __( ' pencil-square-o', 'karma'), 'fa fa-phone' => __( ' phone', 'karma'), 'fa fa-phone-square' => __( ' phone-square', 'karma'), 'fa fa-photo' => __( ' photo', 'karma'), 'fa fa-picture-o' => __( ' picture-o', 'karma'), 'fa fa-pie-chart' => __( ' pie-chart', 'karma'), 'fa fa-plane' => __( ' plane', 'karma'), 'fa fa-plug' => __( ' plug', 'karma'), 'fa fa-plus' => __( ' plus', 'karma'), 'fa fa-plus-circle' => __( ' plus-circle', 'karma'), 'fa fa-plus-square' => __( ' plus-square', 'karma'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'karma'), 'fa fa-power-off' => __( ' power-off', 'karma'), 'fa fa-print' => __( ' print', 'karma'), 'fa fa-puzzle-piece' => __( ' puzzle-piece', 'karma'), 'fa fa-qrcode' => __( ' qrcode', 'karma'), 'fa fa-question' => __( ' question', 'karma'), 'fa fa-question-circle' => __( ' question-circle', 'karma'), 'fa fa-quote-left' => __( ' quote-left', 'karma'), 'fa fa-quote-right' => __( ' quote-right', 'karma'), 'fa fa-random' => __( ' random', 'karma'), 'fa fa-recycle' => __( ' recycle', 'karma'), 'fa fa-refresh' => __( ' refresh', 'karma'), 'fa fa-registered' => __( ' registered', 'karma'), 'fa fa-remove' => __( ' remove', 'karma'), 'fa fa-reorder' => __( ' reorder', 'karma'), 'fa fa-reply' => __( ' reply', 'karma'), 'fa fa-reply-all' => __( ' reply-all', 'karma'), 'fa fa-retweet' => __( ' retweet', 'karma'), 'fa fa-road' => __( ' road', 'karma'), 'fa fa-rocket' => __( ' rocket', 'karma'), 'fa fa-rss' => __( ' rss', 'karma'), 'fa fa-rss-square' => __( ' rss-square', 'karma'), 'fa fa-search' => __( ' search', 'karma'), 'fa fa-search-minus' => __( ' search-minus', 'karma'), 'fa fa-search-plus' => __( ' search-plus', 'karma'), 'fa fa-send' => __( ' send', 'karma'), 'fa fa-send-o' => __( ' send-o', 'karma'), 'fa fa-server' => __( ' server', 'karma'), 'fa fa-share' => __( ' share', 'karma'), 'fa fa-share-alt' => __( ' share-alt', 'karma'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'karma'), 'fa fa-share-square' => __( ' share-square', 'karma'), 'fa fa-share-square-o' => __( ' share-square-o', 'karma'), 'fa fa-shield' => __( ' shield', 'karma'), 'fa fa-ship' => __( ' ship', 'karma'), 'fa fa-shopping-cart' => __( ' shopping-cart', 'karma'), 'fa fa-sign-in' => __( ' sign-in', 'karma'), 'fa fa-sign-out' => __( ' sign-out', 'karma'), 'fa fa-signal' => __( ' signal', 'karma'), 'fa fa-sitemap' => __( ' sitemap', 'karma'), 'fa fa-sliders' => __( ' sliders', 'karma'), 'fa fa-smile-o' => __( ' smile-o', 'karma'), 'fa fa-soccer-ball-o' => __( ' soccer-ball-o', 'karma'), 'fa fa-sort' => __( ' sort', 'karma'), 'fa fa-sort-alpha-asc' => __( ' sort-alpha-asc', 'karma'), 'fa fa-sort-alpha-desc' => __( ' sort-alpha-desc', 'karma'), 'fa fa-sort-amount-asc' => __( ' sort-amount-asc', 'karma'), 'fa fa-sort-amount-desc' => __( ' sort-amount-desc', 'karma'), 'fa fa-sort-asc' => __( ' sort-asc', 'karma'), 'fa fa-sort-desc' => __( ' sort-desc', 'karma'), 'fa fa-sort-down' => __( ' sort-down', 'karma'), 'fa fa-sort-numeric-asc' => __( ' sort-numeric-asc', 'karma'), 'fa fa-sort-numeric-desc' => __( ' sort-numeric-desc', 'karma'), 'fa fa-sort-up' => __( ' sort-up', 'karma'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'karma'), 'fa fa-spinner' => __( ' spinner', 'karma'), 'fa fa-spoon' => __( ' spoon', 'karma'), 'fa fa-square' => __( ' square', 'karma'), 'fa fa-square-o' => __( ' square-o', 'karma'), 'fa fa-star' => __( ' star', 'karma'), 'fa fa-star-half' => __( ' star-half', 'karma'), 'fa fa-star-half-empty' => __( ' star-half-empty', 'karma'), 'fa fa-star-half-full' => __( ' star-half-full', 'karma'), 'fa fa-star-half-o' => __( ' star-half-o', 'karma'), 'fa fa-star-o' => __( ' star-o', 'karma'), 'fa fa-sticky-note' => __( ' sticky-note', 'karma'), 'fa fa-sticky-note-o' => __( ' sticky-note-o', 'karma'), 'fa fa-street-view' => __( ' street-view', 'karma'), 'fa fa-suitcase' => __( ' suitcase', 'karma'), 'fa fa-sun-o' => __( ' sun-o', 'karma'), 'fa fa-support' => __( ' support', 'karma'), 'fa fa-tablet' => __( ' tablet', 'karma'), 'fa fa-tachometer' => __( ' tachometer', 'karma'), 'fa fa-tag' => __( ' tag', 'karma'), 'fa fa-tags' => __( ' tags', 'karma'), 'fa fa-tasks' => __( ' tasks', 'karma'), 'fa fa-taxi' => __( ' taxi', 'karma'), 'fa fa-television' => __( ' television', 'karma'), 'fa fa-terminal' => __( ' terminal', 'karma'), 'fa fa-thumb-tack' => __( ' thumb-tack', 'karma'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'karma'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'karma'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'karma'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'karma'), 'fa fa-ticket' => __( ' ticket', 'karma'), 'fa fa-times' => __( ' times', 'karma'), 'fa fa-times-circle' => __( ' times-circle', 'karma'), 'fa fa-times-circle-o' => __( ' times-circle-o', 'karma'), 'fa fa-tint' => __( ' tint', 'karma'), 'fa fa-toggle-down' => __( ' toggle-down', 'karma'), 'fa fa-toggle-left' => __( ' toggle-left', 'karma'), 'fa fa-toggle-off' => __( ' toggle-off', 'karma'), 'fa fa-toggle-on' => __( ' toggle-on', 'karma'), 'fa fa-toggle-right' => __( ' toggle-right', 'karma'), 'fa fa-toggle-up' => __( ' toggle-up', 'karma'), 'fa fa-trademark' => __( ' trademark', 'karma'), 'fa fa-trash' => __( ' trash', 'karma'), 'fa fa-trash-o' => __( ' trash-o', 'karma'), 'fa fa-tree' => __( ' tree', 'karma'), 'fa fa-trophy' => __( ' trophy', 'karma'), 'fa fa-truck' => __( ' truck', 'karma'), 'fa fa-tty' => __( ' tty', 'karma'), 'fa fa-tv' => __( ' tv', 'karma'), 'fa fa-umbrella' => __( ' umbrella', 'karma'), 'fa fa-university' => __( ' university', 'karma'), 'fa fa-unlock' => __( ' unlock', 'karma'), 'fa fa-unlock-alt' => __( ' unlock-alt', 'karma'), 'fa fa-unsorted' => __( ' unsorted', 'karma'), 'fa fa-upload' => __( ' upload', 'karma'), 'fa fa-user' => __( ' user', 'karma'), 'fa fa-user-plus' => __( ' user-plus', 'karma'), 'fa fa-user-secret' => __( ' user-secret', 'karma'), 'fa fa-user-times' => __( ' user-times', 'karma'), 'fa fa-users' => __( ' users', 'karma'), 'fa fa-video-camera' => __( ' video-camera', 'karma'), 'fa fa-volume-down' => __( ' volume-down', 'karma'), 'fa fa-volume-off' => __( ' volume-off', 'karma'), 'fa fa-volume-up' => __( ' volume-up', 'karma'), 'fa fa-warning' => __( ' warning', 'karma'), 'fa fa-wheelchair' => __( ' wheelchair', 'karma'), 'fa fa-wifi' => __( ' wifi', 'karma'), 'fa fa-wrench' => __( ' wrench', 'karma'), 'fa fa-hand-grab-o' => __( ' hand-grab-o', 'karma'), 'fa fa-hand-lizard-o' => __( ' hand-lizard-o', 'karma'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'karma'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'karma'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'karma'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'karma'), 'fa fa-hand-paper-o' => __( ' hand-paper-o', 'karma'), 'fa fa-hand-peace-o' => __( ' hand-peace-o', 'karma'), 'fa fa-hand-pointer-o' => __( ' hand-pointer-o', 'karma'), 'fa fa-hand-rock-o' => __( ' hand-rock-o', 'karma'), 'fa fa-hand-scissors-o' => __( ' hand-scissors-o', 'karma'), 'fa fa-hand-spock-o' => __( ' hand-spock-o', 'karma'), 'fa fa-hand-stop-o' => __( ' hand-stop-o', 'karma'), 'fa fa-thumbs-down' => __( ' thumbs-down', 'karma'), 'fa fa-thumbs-o-down' => __( ' thumbs-o-down', 'karma'), 'fa fa-thumbs-o-up' => __( ' thumbs-o-up', 'karma'), 'fa fa-thumbs-up' => __( ' thumbs-up', 'karma'), 'fa fa-ambulance' => __( ' ambulance', 'karma'), 'fa fa-automobile' => __( ' automobile', 'karma'), 'fa fa-bicycle' => __( ' bicycle', 'karma'), 'fa fa-bus' => __( ' bus', 'karma'), 'fa fa-cab' => __( ' cab', 'karma'), 'fa fa-car' => __( ' car', 'karma'), 'fa fa-fighter-jet' => __( ' fighter-jet', 'karma'), 'fa fa-motorcycle' => __( ' motorcycle', 'karma'), 'fa fa-plane' => __( ' plane', 'karma'), 'fa fa-rocket' => __( ' rocket', 'karma'), 'fa fa-ship' => __( ' ship', 'karma'), 'fa fa-space-shuttle' => __( ' space-shuttle', 'karma'), 'fa fa-subway' => __( ' subway', 'karma'), 'fa fa-taxi' => __( ' taxi', 'karma'), 'fa fa-train' => __( ' train', 'karma'), 'fa fa-truck' => __( ' truck', 'karma'), 'fa fa-wheelchair' => __( ' wheelchair', 'karma'), 'fa fa-genderless' => __( ' genderless', 'karma'), 'fa fa-intersex' => __( ' intersex', 'karma'), 'fa fa-mars' => __( ' mars', 'karma'), 'fa fa-mars-double' => __( ' mars-double', 'karma'), 'fa fa-mars-stroke' => __( ' mars-stroke', 'karma'), 'fa fa-mars-stroke-h' => __( ' mars-stroke-h', 'karma'), 'fa fa-mars-stroke-v' => __( ' mars-stroke-v', 'karma'), 'fa fa-mercury' => __( ' mercury', 'karma'), 'fa fa-neuter' => __( ' neuter', 'karma'), 'fa fa-transgender' => __( ' transgender', 'karma'), 'fa fa-transgender-alt' => __( ' transgender-alt', 'karma'), 'fa fa-venus' => __( ' venus', 'karma'), 'fa fa-venus-double' => __( ' venus-double', 'karma'), 'fa fa-venus-mars' => __( ' venus-mars', 'karma'), 'fa fa-file' => __( ' file', 'karma'), 'fa fa-file-archive-o' => __( ' file-archive-o', 'karma'), 'fa fa-file-audio-o' => __( ' file-audio-o', 'karma'), 'fa fa-file-code-o' => __( ' file-code-o', 'karma'), 'fa fa-file-excel-o' => __( ' file-excel-o', 'karma'), 'fa fa-file-image-o' => __( ' file-image-o', 'karma'), 'fa fa-file-movie-o' => __( ' file-movie-o', 'karma'), 'fa fa-file-o' => __( ' file-o', 'karma'), 'fa fa-file-pdf-o' => __( ' file-pdf-o', 'karma'), 'fa fa-file-photo-o' => __( ' file-photo-o', 'karma'), 'fa fa-file-picture-o' => __( ' file-picture-o', 'karma'), 'fa fa-file-powerpoint-o' => __( ' file-powerpoint-o', 'karma'), 'fa fa-file-sound-o' => __( ' file-sound-o', 'karma'), 'fa fa-file-text' => __( ' file-text', 'karma'), 'fa fa-file-text-o' => __( ' file-text-o', 'karma'), 'fa fa-file-video-o' => __( ' file-video-o', 'karma'), 'fa fa-file-word-o' => __( ' file-word-o', 'karma'), 'fa fa-file-zip-o' => __( ' file-zip-o', 'karma'), 'fa fa-circle-o-notch' => __( ' circle-o-notch', 'karma'), 'fa fa-cog' => __( ' cog', 'karma'), 'fa fa-gear' => __( ' gear', 'karma'), 'fa fa-refresh' => __( ' refresh', 'karma'), 'fa fa-spinner' => __( ' spinner', 'karma'), 'fa fa-check-square' => __( ' check-square', 'karma'), 'fa fa-check-square-o' => __( ' check-square-o', 'karma'), 'fa fa-circle' => __( ' circle', 'karma'), 'fa fa-circle-o' => __( ' circle-o', 'karma'), 'fa fa-dot-circle-o' => __( ' dot-circle-o', 'karma'), 'fa fa-minus-square' => __( ' minus-square', 'karma'), 'fa fa-minus-square-o' => __( ' minus-square-o', 'karma'), 'fa fa-plus-square' => __( ' plus-square', 'karma'), 'fa fa-plus-square-o' => __( ' plus-square-o', 'karma'), 'fa fa-square' => __( ' square', 'karma'), 'fa fa-square-o' => __( ' square-o', 'karma'), 'fa fa-cc-amex' => __( ' cc-amex', 'karma'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'karma'), 'fa fa-cc-discover' => __( ' cc-discover', 'karma'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'karma'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'karma'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'karma'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'karma'), 'fa fa-cc-visa' => __( ' cc-visa', 'karma'), 'fa fa-credit-card' => __( ' credit-card', 'karma'), 'fa fa-google-wallet' => __( ' google-wallet', 'karma'), 'fa fa-paypal' => __( ' paypal', 'karma'), 'fa fa-area-chart' => __( ' area-chart', 'karma'), 'fa fa-bar-chart' => __( ' bar-chart', 'karma'), 'fa fa-bar-chart-o' => __( ' bar-chart-o', 'karma'), 'fa fa-line-chart' => __( ' line-chart', 'karma'), 'fa fa-pie-chart' => __( ' pie-chart', 'karma'), 'fa fa-bitcoin' => __( ' bitcoin', 'karma'), 'fa fa-btc' => __( ' btc', 'karma'), 'fa fa-cny' => __( ' cny', 'karma'), 'fa fa-dollar' => __( ' dollar', 'karma'), 'fa fa-eur' => __( ' eur', 'karma'), 'fa fa-euro' => __( ' euro', 'karma'), 'fa fa-gbp' => __( ' gbp', 'karma'), 'fa fa-gg' => __( ' gg', 'karma'), 'fa fa-gg-circle' => __( ' gg-circle', 'karma'), 'fa fa-ils' => __( ' ils', 'karma'), 'fa fa-inr' => __( ' inr', 'karma'), 'fa fa-jpy' => __( ' jpy', 'karma'), 'fa fa-krw' => __( ' krw', 'karma'), 'fa fa-money' => __( ' money', 'karma'), 'fa fa-rmb' => __( ' rmb', 'karma'), 'fa fa-rouble' => __( ' rouble', 'karma'), 'fa fa-rub' => __( ' rub', 'karma'), 'fa fa-ruble' => __( ' ruble', 'karma'), 'fa fa-rupee' => __( ' rupee', 'karma'), 'fa fa-shekel' => __( ' shekel', 'karma'), 'fa fa-sheqel' => __( ' sheqel', 'karma'), 'fa fa-try' => __( ' try', 'karma'), 'fa fa-turkish-lira' => __( ' turkish-lira', 'karma'), 'fa fa-usd' => __( ' usd', 'karma'), 'fa fa-won' => __( ' won', 'karma'), 'fa fa-yen' => __( ' yen', 'karma'), 'fa fa-align-center' => __( ' align-center', 'karma'), 'fa fa-align-justify' => __( ' align-justify', 'karma'), 'fa fa-align-left' => __( ' align-left', 'karma'), 'fa fa-align-right' => __( ' align-right', 'karma'), 'fa fa-bold' => __( ' bold', 'karma'), 'fa fa-chain' => __( ' chain', 'karma'), 'fa fa-chain-broken' => __( ' chain-broken', 'karma'), 'fa fa-clipboard' => __( ' clipboard', 'karma'), 'fa fa-columns' => __( ' columns', 'karma'), 'fa fa-copy' => __( ' copy', 'karma'), 'fa fa-cut' => __( ' cut', 'karma'), 'fa fa-dedent' => __( ' dedent', 'karma'), 'fa fa-eraser' => __( ' eraser', 'karma'), 'fa fa-file' => __( ' file', 'karma'), 'fa fa-file-o' => __( ' file-o', 'karma'), 'fa fa-file-text' => __( ' file-text', 'karma'), 'fa fa-file-text-o' => __( ' file-text-o', 'karma'), 'fa fa-files-o' => __( ' files-o', 'karma'), 'fa fa-floppy-o' => __( ' floppy-o', 'karma'), 'fa fa-font' => __( ' font', 'karma'), 'fa fa-header' => __( ' header', 'karma'), 'fa fa-indent' => __( ' indent', 'karma'), 'fa fa-italic' => __( ' italic', 'karma'), 'fa fa-link' => __( ' link', 'karma'), 'fa fa-list' => __( ' list', 'karma'), 'fa fa-list-alt' => __( ' list-alt', 'karma'), 'fa fa-list-ol' => __( ' list-ol', 'karma'), 'fa fa-list-ul' => __( ' list-ul', 'karma'), 'fa fa-outdent' => __( ' outdent', 'karma'), 'fa fa-paperclip' => __( ' paperclip', 'karma'), 'fa fa-paragraph' => __( ' paragraph', 'karma'), 'fa fa-paste' => __( ' paste', 'karma'), 'fa fa-repeat' => __( ' repeat', 'karma'), 'fa fa-rotate-left' => __( ' rotate-left', 'karma'), 'fa fa-rotate-right' => __( ' rotate-right', 'karma'), 'fa fa-save' => __( ' save', 'karma'), 'fa fa-scissors' => __( ' scissors', 'karma'), 'fa fa-strikethrough' => __( ' strikethrough', 'karma'), 'fa fa-subscript' => __( ' subscript', 'karma'), 'fa fa-superscript' => __( ' superscript', 'karma'), 'fa fa-table' => __( ' table', 'karma'), 'fa fa-text-height' => __( ' text-height', 'karma'), 'fa fa-text-width' => __( ' text-width', 'karma'), 'fa fa-th' => __( ' th', 'karma'), 'fa fa-th-large' => __( ' th-large', 'karma'), 'fa fa-th-list' => __( ' th-list', 'karma'), 'fa fa-underline' => __( ' underline', 'karma'), 'fa fa-undo' => __( ' undo', 'karma'), 'fa fa-unlink' => __( ' unlink', 'karma'), 'fa fa-angle-double-down' => __( ' angle-double-down', 'karma'), 'fa fa-angle-double-left' => __( ' angle-double-left', 'karma'), 'fa fa-angle-double-right' => __( ' angle-double-right', 'karma'), 'fa fa-angle-double-up' => __( ' angle-double-up', 'karma'), 'fa fa-angle-down' => __( ' angle-down', 'karma'), 'fa fa-angle-left' => __( ' angle-left', 'karma'), 'fa fa-angle-right' => __( ' angle-right', 'karma'), 'fa fa-angle-up' => __( ' angle-up', 'karma'), 'fa fa-arrow-circle-down' => __( ' arrow-circle-down', 'karma'), 'fa fa-arrow-circle-left' => __( ' arrow-circle-left', 'karma'), 'fa fa-arrow-circle-o-down' => __( ' arrow-circle-o-down', 'karma'), 'fa fa-arrow-circle-o-left' => __( ' arrow-circle-o-left', 'karma'), 'fa fa-arrow-circle-o-right' => __( ' arrow-circle-o-right', 'karma'), 'fa fa-arrow-circle-o-up' => __( ' arrow-circle-o-up', 'karma'), 'fa fa-arrow-circle-right' => __( ' arrow-circle-right', 'karma'), 'fa fa-arrow-circle-up' => __( ' arrow-circle-up', 'karma'), 'fa fa-arrow-down' => __( ' arrow-down', 'karma'), 'fa fa-arrow-left' => __( ' arrow-left', 'karma'), 'fa fa-arrow-right' => __( ' arrow-right', 'karma'), 'fa fa-arrow-up' => __( ' arrow-up', 'karma'), 'fa fa-arrows' => __( ' arrows', 'karma'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'karma'), 'fa fa-arrows-h' => __( ' arrows-h', 'karma'), 'fa fa-arrows-v' => __( ' arrows-v', 'karma'), 'fa fa-caret-down' => __( ' caret-down', 'karma'), 'fa fa-caret-left' => __( ' caret-left', 'karma'), 'fa fa-caret-right' => __( ' caret-right', 'karma'), 'fa fa-caret-square-o-down' => __( ' caret-square-o-down', 'karma'), 'fa fa-caret-square-o-left' => __( ' caret-square-o-left', 'karma'), 'fa fa-caret-square-o-right' => __( ' caret-square-o-right', 'karma'), 'fa fa-caret-square-o-up' => __( ' caret-square-o-up', 'karma'), 'fa fa-caret-up' => __( ' caret-up', 'karma'), 'fa fa-chevron-circle-down' => __( ' chevron-circle-down', 'karma'), 'fa fa-chevron-circle-left' => __( ' chevron-circle-left', 'karma'), 'fa fa-chevron-circle-right' => __( ' chevron-circle-right', 'karma'), 'fa fa-chevron-circle-up' => __( ' chevron-circle-up', 'karma'), 'fa fa-chevron-down' => __( ' chevron-down', 'karma'), 'fa fa-chevron-left' => __( ' chevron-left', 'karma'), 'fa fa-chevron-right' => __( ' chevron-right', 'karma'), 'fa fa-chevron-up' => __( ' chevron-up', 'karma'), 'fa fa-exchange' => __( ' exchange', 'karma'), 'fa fa-hand-o-down' => __( ' hand-o-down', 'karma'), 'fa fa-hand-o-left' => __( ' hand-o-left', 'karma'), 'fa fa-hand-o-right' => __( ' hand-o-right', 'karma'), 'fa fa-hand-o-up' => __( ' hand-o-up', 'karma'), 'fa fa-long-arrow-down' => __( ' long-arrow-down', 'karma'), 'fa fa-long-arrow-left' => __( ' long-arrow-left', 'karma'), 'fa fa-long-arrow-right' => __( ' long-arrow-right', 'karma'), 'fa fa-long-arrow-up' => __( ' long-arrow-up', 'karma'), 'fa fa-toggle-down' => __( ' toggle-down', 'karma'), 'fa fa-toggle-left' => __( ' toggle-left', 'karma'), 'fa fa-toggle-right' => __( ' toggle-right', 'karma'), 'fa fa-toggle-up' => __( ' toggle-up', 'karma'), 'fa fa-arrows-alt' => __( ' arrows-alt', 'karma'), 'fa fa-backward' => __( ' backward', 'karma'), 'fa fa-compress' => __( ' compress', 'karma'), 'fa fa-eject' => __( ' eject', 'karma'), 'fa fa-expand' => __( ' expand', 'karma'), 'fa fa-fast-backward' => __( ' fast-backward', 'karma'), 'fa fa-fast-forward' => __( ' fast-forward', 'karma'), 'fa fa-forward' => __( ' forward', 'karma'), 'fa fa-pause' => __( ' pause', 'karma'), 'fa fa-play' => __( ' play', 'karma'), 'fa fa-play-circle' => __( ' play-circle', 'karma'), 'fa fa-play-circle-o' => __( ' play-circle-o', 'karma'), 'fa fa-random' => __( ' random', 'karma'), 'fa fa-step-backward' => __( ' step-backward', 'karma'), 'fa fa-step-forward' => __( ' step-forward', 'karma'), 'fa fa-stop' => __( ' stop', 'karma'), 'fa fa-youtube-play' => __( ' youtube-play', 'karma'), 'fa fa-500px' => __( ' 500px', 'karma'), 'fa fa-adn' => __( ' adn', 'karma'), 'fa fa-amazon' => __( ' amazon', 'karma'), 'fa fa-android' => __( ' android', 'karma'), 'fa fa-angellist' => __( ' angellist', 'karma'), 'fa fa-apple' => __( ' apple', 'karma'), 'fa fa-behance' => __( ' behance', 'karma'), 'fa fa-behance-square' => __( ' behance-square', 'karma'), 'fa fa-bitbucket' => __( ' bitbucket', 'karma'), 'fa fa-bitbucket-square' => __( ' bitbucket-square', 'karma'), 'fa fa-bitcoin' => __( ' bitcoin', 'karma'), 'fa fa-black-tie' => __( ' black-tie', 'karma'), 'fa fa-btc' => __( ' btc', 'karma'), 'fa fa-buysellads' => __( ' buysellads', 'karma'), 'fa fa-cc-amex' => __( ' cc-amex', 'karma'), 'fa fa-cc-diners-club' => __( ' cc-diners-club', 'karma'), 'fa fa-cc-discover' => __( ' cc-discover', 'karma'), 'fa fa-cc-jcb' => __( ' cc-jcb', 'karma'), 'fa fa-cc-mastercard' => __( ' cc-mastercard', 'karma'), 'fa fa-cc-paypal' => __( ' cc-paypal', 'karma'), 'fa fa-cc-stripe' => __( ' cc-stripe', 'karma'), 'fa fa-cc-visa' => __( ' cc-visa', 'karma'), 'fa fa-chrome' => __( ' chrome', 'karma'), 'fa fa-codepen' => __( ' codepen', 'karma'), 'fa fa-connectdevelop' => __( ' connectdevelop', 'karma'), 'fa fa-contao' => __( ' contao', 'karma'), 'fa fa-css3' => __( ' css3', 'karma'), 'fa fa-dashcube' => __( ' dashcube', 'karma'), 'fa fa-delicious' => __( ' delicious', 'karma'), 'fa fa-deviantart' => __( ' deviantart', 'karma'), 'fa fa-digg' => __( ' digg', 'karma'), 'fa fa-dribbble' => __( ' dribbble', 'karma'), 'fa fa-dropbox' => __( ' dropbox', 'karma'), 'fa fa-drupal' => __( ' drupal', 'karma'), 'fa fa-empire' => __( ' empire', 'karma'), 'fa fa-expeditedssl' => __( ' expeditedssl', 'karma'), 'fa fa-facebook' => __( ' facebook', 'karma'), 'fa fa-facebook-f' => __( ' facebook-f', 'karma'), 'fa fa-facebook-official' => __( ' facebook-official', 'karma'), 'fa fa-facebook-square' => __( ' facebook-square', 'karma'), 'fa fa-firefox' => __( ' firefox', 'karma'), 'fa fa-flickr' => __( ' flickr', 'karma'), 'fa fa-fonticons' => __( ' fonticons', 'karma'), 'fa fa-forumbee' => __( ' forumbee', 'karma'), 'fa fa-foursquare' => __( ' foursquare', 'karma'), 'fa fa-ge' => __( ' ge', 'karma'), 'fa fa-get-pocket' => __( ' get-pocket', 'karma'), 'fa fa-gg' => __( ' gg', 'karma'), 'fa fa-gg-circle' => __( ' gg-circle', 'karma'), 'fa fa-git' => __( ' git', 'karma'), 'fa fa-git-square' => __( ' git-square', 'karma'), 'fa fa-github' => __( ' github', 'karma'), 'fa fa-github-alt' => __( ' github-alt', 'karma'), 'fa fa-github-square' => __( ' github-square', 'karma'), 'fa fa-gittip' => __( ' gittip', 'karma'), 'fa fa-google' => __( ' google', 'karma'), 'fa fa-google-plus' => __( ' google-plus', 'karma'), 'fa fa-google-plus-square' => __( ' google-plus-square', 'karma'), 'fa fa-google-wallet' => __( ' google-wallet', 'karma'), 'fa fa-gratipay' => __( ' gratipay', 'karma'), 'fa fa-hacker-news' => __( ' hacker-news', 'karma'), 'fa fa-houzz' => __( ' houzz', 'karma'), 'fa fa-html5' => __( ' html5', 'karma'), 'fa fa-instagram' => __( ' instagram', 'karma'), 'fa fa-internet-explorer' => __( ' internet-explorer', 'karma'), 'fa fa-ioxhost' => __( ' ioxhost', 'karma'), 'fa fa-joomla' => __( ' joomla', 'karma'), 'fa fa-jsfiddle' => __( ' jsfiddle', 'karma'), 'fa fa-lastfm' => __( ' lastfm', 'karma'), 'fa fa-lastfm-square' => __( ' lastfm-square', 'karma'), 'fa fa-leanpub' => __( ' leanpub', 'karma'), 'fa fa-linkedin' => __( ' linkedin', 'karma'), 'fa fa-linkedin-square' => __( ' linkedin-square', 'karma'), 'fa fa-linux' => __( ' linux', 'karma'), 'fa fa-maxcdn' => __( ' maxcdn', 'karma'), 'fa fa-meanpath' => __( ' meanpath', 'karma'), 'fa fa-medium' => __( ' medium', 'karma'), 'fa fa-odnoklassniki' => __( ' odnoklassniki', 'karma'), 'fa fa-odnoklassniki-square' => __( ' odnoklassniki-square', 'karma'), 'fa fa-opencart' => __( ' opencart', 'karma'), 'fa fa-openid' => __( ' openid', 'karma'), 'fa fa-opera' => __( ' opera', 'karma'), 'fa fa-optin-monster' => __( ' optin-monster', 'karma'), 'fa fa-pagelines' => __( ' pagelines', 'karma'), 'fa fa-paypal' => __( ' paypal', 'karma'), 'fa fa-pied-piper' => __( ' pied-piper', 'karma'), 'fa fa-pied-piper-alt' => __( ' pied-piper-alt', 'karma'), 'fa fa-pinterest' => __( ' pinterest', 'karma'), 'fa fa-pinterest-p' => __( ' pinterest-p', 'karma'), 'fa fa-pinterest-square' => __( ' pinterest-square', 'karma'), 'fa fa-qq' => __( ' qq', 'karma'), 'fa fa-ra' => __( ' ra', 'karma'), 'fa fa-rebel' => __( ' rebel', 'karma'), 'fa fa-reddit' => __( ' reddit', 'karma'), 'fa fa-reddit-square' => __( ' reddit-square', 'karma'), 'fa fa-renren' => __( ' renren', 'karma'), 'fa fa-safari' => __( ' safari', 'karma'), 'fa fa-sellsy' => __( ' sellsy', 'karma'), 'fa fa-share-alt' => __( ' share-alt', 'karma'), 'fa fa-share-alt-square' => __( ' share-alt-square', 'karma'), 'fa fa-shirtsinbulk' => __( ' shirtsinbulk', 'karma'), 'fa fa-simplybuilt' => __( ' simplybuilt', 'karma'), 'fa fa-skyatlas' => __( ' skyatlas', 'karma'), 'fa fa-skype' => __( ' skype', 'karma'), 'fa fa-slack' => __( ' slack', 'karma'), 'fa fa-slideshare' => __( ' slideshare', 'karma'), 'fa fa-soundcloud' => __( ' soundcloud', 'karma'), 'fa fa-spotify' => __( ' spotify', 'karma'), 'fa fa-stack-exchange' => __( ' stack-exchange', 'karma'), 'fa fa-stack-overflow' => __( ' stack-overflow', 'karma'), 'fa fa-steam' => __( ' steam', 'karma'), 'fa fa-steam-square' => __( ' steam-square', 'karma'), 'fa fa-stumbleupon' => __( ' stumbleupon', 'karma'), 'fa fa-stumbleupon-circle' => __( ' stumbleupon-circle', 'karma'), 'fa fa-tencent-weibo' => __( ' tencent-weibo', 'karma'), 'fa fa-trello' => __( ' trello', 'karma'), 'fa fa-tripadvisor' => __( ' tripadvisor', 'karma'), 'fa fa-tumblr' => __( ' tumblr', 'karma'), 'fa fa-tumblr-square' => __( ' tumblr-square', 'karma'), 'fa fa-twitch' => __( ' twitch', 'karma'), 'fa fa-twitter' => __( ' twitter', 'karma'), 'fa fa-twitter-square' => __( ' twitter-square', 'karma'), 'fa fa-viacoin' => __( ' viacoin', 'karma'), 'fa fa-vimeo' => __( ' vimeo', 'karma'), 'fa fa-vimeo-square' => __( ' vimeo-square', 'karma'), 'fa fa-vine' => __( ' vine', 'karma'), 'fa fa-vk' => __( ' vk', 'karma'), 'fa fa-wechat' => __( ' wechat', 'karma'), 'fa fa-weibo' => __( ' weibo', 'karma'), 'fa fa-weixin' => __( ' weixin', 'karma'), 'fa fa-whatsapp' => __( ' whatsapp', 'karma'), 'fa fa-wikipedia-w' => __( ' wikipedia-w', 'karma'), 'fa fa-windows' => __( ' windows', 'karma'), 'fa fa-wordpress' => __( ' wordpress', 'karma'), 'fa fa-xing' => __( ' xing', 'karma'), 'fa fa-xing-square' => __( ' xing-square', 'karma'), 'fa fa-y-combinator' => __( ' y-combinator', 'karma'), 'fa fa-y-combinator-square' => __( ' y-combinator-square', 'karma'), 'fa fa-yahoo' => __( ' yahoo', 'karma'), 'fa fa-yc' => __( ' yc', 'karma'), 'fa fa-yc-square' => __( ' yc-square', 'karma'), 'fa fa-yelp' => __( ' yelp', 'karma'), 'fa fa-youtube' => __( ' youtube', 'karma'), 'fa fa-youtube-play' => __( ' youtube-play', 'karma'), 'fa fa-youtube-square' => __( ' youtube-square', 'karma'), 'fa fa-ambulance' => __( ' ambulance', 'karma'), 'fa fa-h-square' => __( ' h-square', 'karma'), 'fa fa-heart' => __( ' heart', 'karma'), 'fa fa-heart-o' => __( ' heart-o', 'karma'), 'fa fa-heartbeat' => __( ' heartbeat', 'karma'), 'fa fa-hospital-o' => __( ' hospital-o', 'karma'), 'fa fa-medkit' => __( ' medkit', 'karma'), 'fa fa-plus-square' => __( ' plus-square', 'karma'), 'fa fa-stethoscope' => __( ' stethoscope', 'karma'), 'fa fa-user-md' => __( ' user-md', 'karma'), 'fa fa-wheelchair' => __( ' wheelchair', 'karma') );
    
}

   function karma_slider_transition_sanitize($input) {
      $valid_keys = array(
        'true' => __('Fade', 'karma'),
        'false' => __('Slide', 'karma'),
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   
   
   function karma_radio_sanitize_enabledisable($input) {
      $valid_keys = array(
        'enable'=>__('Enable', 'karma'),
        'disable'=>__('Disable', 'karma')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   
   function karma_radio_sanitize_yesno($input) {
    $valid_keys = array(
      'yes'=>__('Yes', 'karma'),
      'no'=>__('No', 'karma')
      );
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
 }
   
   function karma_radio_sanitize_onoff($input) {
    $valid_keys = array(
      'on'=>__('On', 'karma'),
      'off'=>__('Off', 'karma')
      );
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
 }
   
// checkbox sanitization
function karma_checkbox_sanitize($input) {
   if ( $input == 1 ) {
      return 1;
   } else {
      return '';
   }
}

function karma_all_posts_array( $add_empty_item = false ) {

    $posts = get_posts( array(
        'post_type'        => array( 'post', 'page' ),
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'             => 'ASC',
    ));

    $posts_array = array();
    
    if ( $add_empty_item ) :
        $posts_array[] = __( 'Please select a post', 'karma' );
    endif;

    foreach ( $posts as $post ) :

        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;

    endforeach;

    return $posts_array;

}

function karma_sanitize_product_count( $input ) {
    $valid_keys = Karma_Options::karma_product_count_list();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
}

function karma_sanitize_icon( $input ) {
    $valid_keys = karma_icons();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
}

function karma_sanitize_post( $input ) {
    $valid_keys = karma_all_posts_array();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }
}

function karma_sanitize_font( $input ){
    $valid_keys = Karma_Options::karma_fonts();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }    
}

function karma_sanitize_font_size( $input ){
    $valid_keys = Karma_Options::font_sizes();
    if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
   } else {
     return '';
   }    
}

function karma_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function karma_sanitize_integer( $input ) {
    return intval( $input );
}

function karma_sanitize( $input ) {
    return $input;
}

function karma_sanatize_color( $input, $setting ) {
    // Ensure input is a slug
    $input = sanitize_key( $input );
    
    // Get list of choices from the control
    // associated with the setting
    $choices = $setting->manager->get_control( $setting->id )->choices;
    // If the input is a valid key, return it;
    // otherwise, return the default
    $keys = array_map( 'sanitize_hex_color_no_hash', array_keys( $choices ) );
    
    return ( in_array( $input, $keys ) ? $input : $setting->default );
}

function karma_sanitize_bool( $input ) {
    if ( $input == true ) :
        return $input;
    elseif( $input == false ) :    
        return $input;
    endif;
}