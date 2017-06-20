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
    
        $wp_customize->add_setting( 'karma_theme_color', array (
            'default'               => '#4cef9e',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_hex_color',
        ) );

        $wp_customize->add_control( 
            new WP_Customize_Color_Control( $wp_customize, 'karma_theme_color', array(
                'label'      => __( 'Theme primary color', 'karma' ),
                'section'    => 'color',
                'settings'   => 'karma_theme_color',
            ) ) 
        );

        $wp_customize->add_setting( 'karma_theme_color_hover', array (
            'default'               => '#37ef93',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_hex_color',
        ) );

        $wp_customize->add_control( 
            new WP_Customize_Color_Control( $wp_customize, 'karma_theme_color_hover', array(
                'label'      => __( 'Hover color', 'karma' ),
                'section'    => 'color',
                'settings'   => 'karma_theme_color_hover',
            ) ) 
        );

        
    $wp_customize->add_section( 'font', array (
        'title'                 => __( 'Fonts', 'karma' ),
        'panel'                 => 'appearance',
    ) );

        $wp_customize->add_setting( 'header_font', array (
            'default'               => 'Oswald, sans-serif',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_font'
        ) );

        $wp_customize->add_control( 'header_font', array(
            'type'                  => 'select',
            'section'               => 'font',
            'label'                 => __( 'Headers Font', 'karma' ),
            'description'           => __( 'Applies to the slider header, callouts headers, post page & widget titles etc..', 'karma' ),
            'choices'               => karma_fonts()

        ) );

        $wp_customize->add_setting( 'theme_font', array (
            'default'               => 'Lato, sans-serif',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_font'
        ) );

        $wp_customize->add_control( 'theme_font', array(
            'type'                  => 'select',
            'section'               => 'font',
            'label'                 => __( 'General font for the site body', 'karma' ),
            'choices'               => karma_fonts()

        ) );


        $wp_customize->add_setting( 'menu_font_size', array (
            'default'               => '14px',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_font_size'
        ) );

        $wp_customize->add_control( 'menu_font_size', array(
            'type'                  => 'select',
            'section'               => 'font',
            'label'                 => __( 'Menu Font Size', 'karma' ),
            'choices'               => karma_font_sizes()

        ) );

        $wp_customize->add_setting( 'theme_font_size', array (
            'default'               => '16px',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_font_size'
        ) );

        $wp_customize->add_control( 'theme_font_size', array(
            'type'                  => 'select',
            'section'               => 'font',
            'label'                 => __( 'Content Font Size', 'karma' ),
            'choices'               => karma_font_sizes()

        ) );
