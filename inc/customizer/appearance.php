<?php

$wp_customize->add_panel( 'appearance', array (
    'title'                 => __( 'Appearance', 'karma' ),
    'description'           => __( 'Customize your site colros, fonts and other appearance settings', 'karma' ),
    'priority'              => 10
) );
    

    
    $wp_customize->add_section( 'color', array (
        'title'                 => __( 'Skin Color', 'karma' ),
        'panel'                 => 'appearance',
    ) );
    
        $wp_customize->add_setting( Karma_Options::$theme_color, array (
            'default'               => Karma_Options::$theme_color_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_hex_color',
        ) );

        $wp_customize->add_control( 
            new WP_Customize_Color_Control( $wp_customize, Karma_Options::$theme_color, array(
                'label'      => __( 'Theme primary color', 'karma' ),
                'section'    => 'color',
                'settings'   => Karma_Options::$theme_color,
            ) ) 
        );

        $wp_customize->add_setting( Karma_Options::$hover_color, array (
            'default'               => Karma_Options::$hover_color_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_hex_color',
        ) );

        $wp_customize->add_control( 
            new WP_Customize_Color_Control( $wp_customize, Karma_Options::$hover_color, array(
                'label'      => __( 'Hover color', 'karma' ),
                'section'    => 'color',
                'settings'   => Karma_Options::$hover_color,
            ) ) 
        );

        
    $wp_customize->add_section( 'font', array (
        'title'                 => __( 'Fonts', 'karma' ),
        'panel'                 => 'appearance',
    ) );

        $wp_customize->add_setting( Karma_Options::$header_font, array (
            'default'               => Karma_Options::$header_font_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_font'
        ) );

        $wp_customize->add_control( Karma_Options::$header_font, array(
            'type'                  => 'select',
            'section'               => 'font',
            'label'                 => __( 'Headers Font', 'karma' ),
            'description'           => __( 'Applies to the slider header, callouts headers, post page & widget titles etc..', 'karma' ),
            'choices'               => Karma_Options::karma_fonts()

        ) );

        $wp_customize->add_setting( Karma_Options::$theme_font, array (
            'default'               => Karma_Options::$theme_font_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_font'
        ) );

        $wp_customize->add_control( Karma_Options::$theme_font, array(
            'type'                  => 'select',
            'section'               => 'font',
            'label'                 => __( 'General font for the site body', 'karma' ),
            'choices'               => Karma_Options::karma_fonts()

        ) );


        $wp_customize->add_setting( Karma_Options::$menu_font_size, array (
            'default'               => Karma_Options::$menu_font_size_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_font_size'
        ) );

        $wp_customize->add_control( Karma_Options::$menu_font_size, array(
            'type'                  => 'select',
            'section'               => 'font',
            'label'                 => __( 'Menu Font Size', 'karma' ),
            'choices'               => Karma_Options::font_sizes()

        ) );

        $wp_customize->add_setting( Karma_Options::$theme_font_size, array (
            'default'               => Karma_Options::$theme_font_size_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_font_size'
        ) );

        $wp_customize->add_control( Karma_Options::$theme_font_size, array(
            'type'                  => 'select',
            'section'               => 'font',
            'label'                 => __( 'Content Font Size', 'karma' ),
            'choices'               => Karma_Options::font_sizes()

        ) );
