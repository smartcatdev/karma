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

        if( !function_exists( 'karma_pro_init' )) :
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
        endif;
        $wp_customize->add_setting( Karma_Options::$featured_post_toggle, array (
                'default'               => Karma_Options::$featured_post_toggle_default,
                'transport'             => 'refresh',
                'sanitize_callback'     => 'karma_radio_sanitize_onoff'
            ) );

           $wp_customize->add_control( Karma_Options::$featured_post_toggle, array(
                'label'         => __( 'Display Jumbotron on Homepage ?', 'karma' ),
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
