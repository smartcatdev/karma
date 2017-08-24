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
        
        if( ! function_exists( 'karma_pro_init') ) :
            // Color Choice Family
            $wp_customize->add_setting( Karma_Options::$theme_color, array (
                'default'               => '4cef9e',
                'transport'             => 'refresh',
                'sanitize_callback'     => 'karma_sanatize_color'
            ) );
            $wp_customize->add_control( Karma_Options::$theme_color, array(
                'type'                  => 'select',
                'section'               => 'color',
                'label'                 => __( 'Site Skin Color', 'karma' ),
                'description'           => __( 'Select the color of the theme', 'karma' ),
                'choices'               => array(
                    '4cef9e' => 'Green',
                    '178dc4' => 'Blue',
                ),
            ) );        
        endif; 
        
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
