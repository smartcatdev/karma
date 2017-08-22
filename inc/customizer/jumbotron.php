<?php 
$wp_customize->add_panel( 'jumbotron', array (
    'title'                 => __( 'Jumbotron', 'karma' ),
    'priority'              => 10
) );
    $wp_customize->add_section( 'homepage_jumbotron', array (
        'title'                 => __( 'Jumbotron Post', 'karma' ),
        'panel'                 => 'jumbotron',
        'priority'              => 1
    ) );
    
        $wp_customize->add_setting( Karma_Options::$featured_post, array (
            'default'               => Karma_Options::$featured_post_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_post',
        ) );
        $wp_customize->add_control( Karma_Options::$featured_post, array(
            'type'                  => 'select',
            'section'               => 'homepage_jumbotron',
            'priority' => 0,
            'label'                 => __( 'Select the Featured Post', 'karma' ),
            'description'           => __( 'Select a post, page or one of your WooCommerce products to be featured on the Frontpage. To edit the text that shows up, go to the post and edit it directly.', 'karma' ),
            'choices'               => karma_all_posts_array(),
        ) );

        $wp_customize->add_setting( Karma_Options::$jumbotron_height, array (
            'default'               => Karma_Options::$jumbotron_height_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_integer',
        ) );
        $wp_customize->add_control( Karma_Options::$jumbotron_height, array(
            'type'                  => 'number',
            'section'               => 'homepage_jumbotron',
            'priority' => 0,
            'label'                 => __( 'Height of Featured Post section', 'karma' ),
            'input_attrs'           => array(
                'min' => 300,
                'max' => 1000,
                'step' => 50,
        ) ) );
//        karma_the_featured_post_toggle
        $wp_customize->add_setting( Karma_Options::$featured_post_toggle, array (
                'default'               => Karma_Options::$featured_post_toggle_default,
                'transport'             => 'refresh',
                'sanitize_callback'     => 'karma_radio_sanitize_onoff'
            ) );

           $wp_customize->add_control( Karma_Options::$featured_post_toggle, array(
                'label'         => __( 'Display Products on Homepage ?', 'karma' ),
                'section' => 'homepage_jumbotron',
                'type'    => 'radio',
                'choices'    => array(
                    'on'    => __( 'Yes', 'karma' ),
                    'off'    => __( 'No', 'karma' )
                )
            ));

        $wp_customize->add_setting( Karma_Options::$featured_post_button, array (
            'default'               => Karma_Options::$featured_post_button_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( Karma_Options::$featured_post_button, array(
            'type'                  => 'text',
            'section'               => 'homepage_jumbotron',
            'label'                 => __( 'Button Text', 'karma' ),
            'priority' => 0,
        ) );
        
        // Slides
    for( $i = 0; $i < 5; $i++ ) :

    $wp_customize->add_section( 'jumbotron_slide[' . $i . ']', array (
        'title'                 => __( 'Slide #' . ( $i + 1 ), 'karma' ),
        'panel'                 => 'jumbotron',
    ) );
        
        
        $wp_customize->add_setting( 'jumbotron_slide_image[' . $i . ']', array (
            'default'               => get_template_directory_uri() . '/inc/images/jumbotron.jpg',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'jumbotron_slide_image[' . $i . ']', array (
            'label' =>              __( 'Slide image', 'karma' ),
            'section'               => 'jumbotron_slide[' . $i . ']',
            'mime_type'             => 'image',
            'settings'              => 'jumbotron_slide_image[' . $i . ']',      
        ) ) );
        
        $wp_customize->add_setting( 'jumbotron_slide_text[' . $i . ']', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'jumbotron_slide_text[' . $i . ']', array(
            'type'                  => 'text',
            'section'               => 'jumbotron_slide[' . $i . ']',
            'label'                 => __( 'Slide text', 'karma' )
        ) );
        
        $wp_customize->add_setting( 'jumbotron_slide_textarea[' . $i . ']', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'jumbotron_slide_textarea[' . $i . ']', array(
            'type'                  => 'textarea',
            'section'               => 'jumbotron_slide[' . $i . ']',
            'label'                 => __( 'Slide text area', 'karma' )
        ) );
        
        $wp_customize->add_setting( 'jumbotron_slide_url[' . $i . ']', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'jumbotron_slide_url[' . $i . ']', array(
            'type'                  => 'text',
            'section'               => 'jumbotron_slide[' . $i . ']',
            'label'                 => __( 'Slide link URL', 'karma' ),
        ) );
        
        $wp_customize->add_setting( 'jumbotron_slide_button[' . $i . ']', array (
            'default'               => __( '', 'karma' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'jumbotron_slide_button[' . $i . ']', array(
            'type'                  => 'text',
            'section'               => 'jumbotron_slide[' . $i . ']',
            'label'                 => __( 'Button text', 'karma' )
        ) );
        
    endfor; //END OF LOOP ++++++++++++++++++++++++++++++++++++++++++++++++++++++
    
    $wp_customize->add_section( 'jumbotron_settings', array (
        'title'                 => __( 'Settings', 'karma' ),
        'priority'              => 1,
        'panel'                 => 'jumbotron'

    ) );
    
        $wp_customize->add_setting( Karma_Options::$jumbotron_static_slider, array (
            'default'               => Karma_Options::$jumbotron_static_slider_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_radio_sanitize_onoff'
        ) );

       $wp_customize->add_control( Karma_Options::$jumbotron_static_slider, array(
            'label'         => __( 'Display the static post or slider (5 slides) ?', 'karma' ),
            'section' => 'jumbotron_settings',
            'type'    => 'radio',
            'choices'    => array(
                'on'    => __( 'Static', 'karma' ),
                'off'    => __( 'Slider', 'karma' )
            )   
        ));
    
        $wp_customize->add_setting( Karma_Options::$jumbotron_slider_height, array (
            'default'               => Karma_Options::$jumbotron_slider_height_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_integer',
        ) );
        $wp_customize->add_control( Karma_Options::$jumbotron_slider_height, array(
            'type'                  => 'number',
            'section'               => 'jumbotron_settings',
            'label'                 => __( 'Jumbotron height', 'karma' ),
            'description'                 => __( 'Set the desired height of the jumbotron in percentage of the full height of the screen', 'karma' ),
            'input_attrs'           => array(
                'min' => 10,
                'max' => 100,
                'step' => 10,
        ) ) );
    
        $wp_customize->add_setting( Karma_Options::$jumbotron_mobile_height, array (
            'default'               => Karma_Options::$jumbotron_mobile_height_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_integer',
        ) );
        $wp_customize->add_control( Karma_Options::$jumbotron_mobile_height, array(
            'type'                  => 'number',
            'section'               => 'jumbotron_settings',
            'label'                 => __( 'Jumbotron height on Mobile device', 'karma' ),
            'description'                 => __( 'Set the desired height of the jumbotron for mobile devices', 'karma' ),
            'input_attrs'           => array(
                'min' => 10,
                'max' => 100,
                'step' => 10,
        ) ) );
    
        $wp_customize->add_setting( Karma_Options::$jumbotron_tablet_height, array (
            'default'               => Karma_Options::$jumbotron_tablet_height_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_integer',
        ) );
        $wp_customize->add_control( Karma_Options::$jumbotron_tablet_height, array(
            'type'                  => 'number',
            'section'               => 'jumbotron_settings',
            'label'                 => __( 'Jumbotron height on tablets', 'karma' ),
            'description'                 => __( 'Set the desired height of the jumbotron for tablet devices', 'karma' ),
            'input_attrs'           => array(
                'min' => 10,
                'max' => 100,
                'step' => 10,
        ) ) );

        $wp_customize->add_setting( Karma_Options::$jumbotron_slide_timer, array(
            'default' => Karma_Options::$jumbotron_slide_timer_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize'
        ));

        $wp_customize->add_control( Karma_Options::$jumbotron_slide_timer, array(
            'label' => __('Slide Delay', 'karma'),
            'section' => 'jumbotron_settings',
            'type' => 'select',
            'choices' => array(
                '2000' => __('2 Seconds', 'karma'),
                '3000' => __('3 Seconds', 'karma'),
                '4000' => __('4 Seconds', 'karma'),
                '5000' => __('5 Seconds', 'karma'),
                '6000' => __('6 Seconds', 'karma'),
                '10000' => __('10 Seconds', 'karma'),
            )
        ));

        $wp_customize->add_setting( Karma_Options::$jumbotron_transition_timer, array(
            'default' => Karma_Options::$jumbotron_transition_timer_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize'
        ));

        $wp_customize->add_control( Karma_Options::$jumbotron_transition_timer, array(
            'label' => __('Slide transition speed', 'karma'),
            'section' => 'jumbotron_settings',
            'type' => 'select',
            'choices' => array(
                '500' => __('1/2 Second', 'karma'),
                '1000' => __('1 Second', 'karma'),
                '1500' => __('1.5 Seconds', 'karma'),
                '2000' => __('2 Seconds', 'karma'),
                '2500' => __('2.5 Seconds', 'karma'),
                '3000' => __('3 Seconds', 'karma'),
                '5000' => __('5 Seconds', 'karma'),
            )
        ));

        $wp_customize->add_setting( Karma_Options::$jumbotron_transition, array(
            'default' => Karma_Options::$jumbotron_transition_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize'
        ));

        $wp_customize->add_control( Karma_Options::$jumbotron_transition, array(
            'label' => __('Slide Transition Effect', 'karma'),
            'section' => 'jumbotron_settings',
            'type' => 'select',
            'choices' => array(
                'simpleFade'            => __( 'Fade', 'juno' ),
                'scrollLeft'            => __( 'Scroll Left', 'juno' ),
                'scrollRight'           => __( 'Scroll Right', 'juno' ),
                'scrollTop'             => __( 'Scroll Top', 'juno' ),
                'scrollBottom'          => __( 'Scroll Bottom', 'juno' ),
                'mosaic'                => __( 'Mosaic', 'juno' ),
                'stampede'              => __( 'Stampede', 'juno' ),
                'curtainSliceLeft'      => __( 'Curtain Slice Left', 'juno' ),
                'curtainSliceRight'     => __( 'Curtain Slice Right', 'juno' ),
            )
        ));

        $wp_customize->add_setting( Karma_Options::$jumbotron_navigation, array(
            'default' => Karma_Options::$jumbotron_navigation_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize'
        ));

        $wp_customize->add_control( Karma_Options::$jumbotron_navigation, array(
            'label' => __('Slider Next/Previous Buttons', 'karma'),
            'section' => 'jumbotron_settings',
            'type' => 'select',
            'choices' => array(
                true => __('Show', 'karma'),
                false => __('Hide', 'karma'),
            )
        ));

        $wp_customize->add_setting( Karma_Options::$jumbotron_pagination, array(
            'default' => Karma_Options::$jumbotron_pagination_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize'
        ));

        $wp_customize->add_control( Karma_Options::$jumbotron_pagination, array(
            'label' => __('Slider pagination', 'karma'),
            'section' => 'jumbotron_settings',
            'type' => 'select',
            'choices' => array(
                true => __('Show', 'karma'),
                false => __('Hide', 'karma'),
            )
        ));

        $wp_customize->add_setting( Karma_Options::$jumbotron_hover, array(
            'default' => Karma_Options::$jumbotron_hover_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize'
        ));

        $wp_customize->add_control( Karma_Options::$jumbotron_hover, array(
            'label' => __('Slider pause on hover', 'karma'),
            'section' => 'jumbotron_settings',
            'type' => 'select',
            'choices' => array(
                true => __('Yes', 'karma'),
                false => __('No', 'karma'),
            )
        ));

        $wp_customize->add_setting( Karma_Options::$jumbotron_loader, array(
            'default' => 'bar',
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize'
        ));

        $wp_customize->add_control( Karma_Options::$jumbotron_loader_default, array(
            'label' => __('Slider loader', 'karma'),
            'section' => 'jumbotron_settings',
            'type' => 'select',
            'choices' => array(
                false => __('None', 'karma'),
                'bar' => __('Bar', 'karma'),
                'pie' => __('Pie', 'karma'),
            )
        ));

        $wp_customize->add_setting( Karma_Options::$jumbotron_text_color, array(
            'default' => Karma_Options::$jumbotron_text_color_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize'
        ));

        $wp_customize->add_control( 
            new WP_Customize_Color_Control( 
            $wp_customize, 
            Karma_Options::$jumbotron_text_color, 
            array(
                'label'      => __( 'Jumbotron Text Color', 'karma' ),
                'section'    => 'jumbotron_settings',
                'settings'   => 'slide_text_color',
        ) ) );
