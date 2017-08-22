<?php

$wp_customize->add_panel( 'footer', array (
    'title' => __( 'Footer', 'karma' ),
    'description' => __( 'Customize the site footer', 'karma' ),
    'priority' => 10
) );


    $wp_customize->add_section( 'payment_methods', array (
        'title' => __( 'Payment Methods', 'karma' ),
        'panel' => 'footer',
    ) );

        // Payment Icons - Visa
        $wp_customize->add_setting( Karma_Options::$visa_display, array (
            'default' => Karma_Options::$visa_display_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize_checkbox',
        ) );
        $wp_customize->add_control( Karma_Options::$visa_display, array (
            'type' => 'checkbox',
            'section' => 'payment_methods',
            'label' => __( 'Display Visa Icon?', 'karma' ),
        ) );

        // Payment Icons - MasterCard
        $wp_customize->add_setting( Karma_Options::$mastercard_display, array (
            'default' => Karma_Options::$mastercard_display_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize_checkbox',
        ) );
        $wp_customize->add_control( Karma_Options::$mastercard_display, array (
            'type' => 'checkbox',
            'section' => 'payment_methods',
            'label' => __( 'Display MasterCard Icon?', 'karma' ),
        ) );

        // Payment Icons - American Express
        $wp_customize->add_setting( Karma_Options::$amex_display, array (
            'default' => Karma_Options::$amex_display_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize_checkbox',
        ) );
        $wp_customize->add_control( Karma_Options::$amex_display, array (
            'type' => 'checkbox',
            'section' => 'payment_methods',
            'label' => __( 'Display American Express Icon?', 'karma' ),
        ) );

       // Payment Icons - Paypal
        $wp_customize->add_setting( Karma_Options::$paypal_display, array (
            'default' => Karma_Options::$paypal_display_default,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize_checkbox',
        ) );
        $wp_customize->add_control( Karma_Options::$paypal_display, array (
            'type' => 'checkbox',
            'section' => 'payment_methods',
            'label' => __( 'Display Paypal Icon?', 'karma' ),
        ) );

    $wp_customize->add_section( 'footer_text', array (
        'title' => __( 'Copyright Text', 'karma' ),
        'panel' => 'footer',
    ) );

        $wp_customize->add_setting( Karma_Options::$copyright_text, array (
            'default' => get_bloginfo( 'name' ) . ' ' . date_i18n( __( 'Y', 'karma' ) ),
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( Karma_Options::$copyright_text, array (
            'type' => 'text',
            'section' => 'footer_text',
            'label' => __( 'Copyright Text', 'karma' )
        ) );


    $wp_customize->add_section( 'social_links', array (
        'title'                 => __( 'Social Icons & Links', 'karma' ),
        'panel'                 => 'footer'
    ) );

        $wp_customize->add_setting( Karma_Options::$facebook_url, array (
            'default'               => Karma_Options::$facebook_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$facebook_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Facebook URL', 'karma' )

        ) );

        $wp_customize->add_setting( Karma_Options::$gplus_url, array (
            'default'               => Karma_Options::$gplus_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$gplus_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Google Plus URL', 'karma' )

        ) );

        $wp_customize->add_setting( Karma_Options::$instagram_url, array (
            'default'               => Karma_Options::$instagram_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$instagram_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Instagram URL', 'karma' )

        ) );

        $wp_customize->add_setting( Karma_Options::$linkedin_url, array (
            'default'               => Karma_Options::$linkedin_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$linkedin_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Linkedin URL', 'karma' )

        ) );

        $wp_customize->add_setting( Karma_Options::$pinterest_url, array (
            'default'               => Karma_Options::$pinterest_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$pinterest_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Pinterest URL', 'karma' )

        ) );

        $wp_customize->add_setting( Karma_Options::$twitter_url, array (
            'default'               => Karma_Options::$twitter_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$twitter_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Twitter URL', 'karma' )

        ) );

        $wp_customize->add_setting( Karma_Options::$vimeo_url, array (
            'default'               => Karma_Options::$vimeo_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$vimeo_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Vimeo URL', 'karma' )

        ) );

        $wp_customize->add_setting( Karma_Options::$spotify_url, array (
            'default'               => Karma_Options::$spotify_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$spotify_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Spotify URL', 'karma' )
        ) );

        $wp_customize->add_setting( Karma_Options::$apple_url, array (
            'default'               => Karma_Options::$apple_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$apple_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Apple URL', 'karma' )
        ) );

        $wp_customize->add_setting( Karma_Options::$github_url, array (
            'default'               => Karma_Options::$github_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$github_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'GitHub URL', 'karma' )
        ) );

        $wp_customize->add_setting( Karma_Options::$vine_url, array (
            'default'               => Karma_Options::$vine_url_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( Karma_Options::$vine_url, array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Vine URL', 'karma' )
        ) );
