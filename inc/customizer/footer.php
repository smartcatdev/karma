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
        $wp_customize->add_setting( 'karma_include_cc_visa', array (
            'default' => false,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize_checkbox',
        ) );
        $wp_customize->add_control( 'karma_include_cc_visa', array (
            'type' => 'checkbox',
            'section' => 'payment_methods',
            'label' => __( 'Display Visa Icon?', 'karma' ),
        ) );

        // Payment Icons - MasterCard
        $wp_customize->add_setting( 'karma_include_cc_mastercard', array (
            'default' => false,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize_checkbox',
        ) );
        $wp_customize->add_control( 'karma_include_cc_mastercard', array (
            'type' => 'checkbox',
            'section' => 'payment_methods',
            'label' => __( 'Display MasterCard Icon?', 'karma' ),
        ) );

        // Payment Icons - American Express
        $wp_customize->add_setting( 'karma_include_cc_amex', array (
            'default' => false,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize_checkbox',
        ) );
        $wp_customize->add_control( 'karma_include_cc_amex', array (
            'type' => 'checkbox',
            'section' => 'payment_methods',
            'label' => __( 'Display American Express Icon?', 'karma' ),
        ) );

        // Payment Icons - PayPal
        $wp_customize->add_setting( 'karma_include_cc_paypal', array (
            'default' => false,
            'transport' => 'refresh',
            'sanitize_callback' => 'karma_sanitize_checkbox',
        ) );
        $wp_customize->add_control( 'karma_include_cc_paypal', array (
            'type' => 'checkbox',
            'section' => 'payment_methods',
            'label' => __( 'Display PayPal Icon?', 'karma' ),
        ) );

    $wp_customize->add_section( 'footer_text', array (
        'title' => __( 'Copyright Text', 'karma' ),
        'panel' => 'footer',
    ) );

        $wp_customize->add_setting( 'copyright_text', array (
            'default' => get_bloginfo( 'name' ) . ' ' . date_i18n( __( 'Y', 'karma' ) ),
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'copyright_text', array (
            'type' => 'text',
            'section' => 'footer_text',
            'label' => __( 'Copyright Text', 'karma' )
        ) );


    $wp_customize->add_section( 'social_links', array (
        'title'                 => __( 'Social Icons & Links', 'karma' ),
        'panel'                 => 'footer'
    ) );

        $wp_customize->add_setting( 'facebook_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'facebook_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Facebook URL', 'karma' )

        ) );

        $wp_customize->add_setting( 'gplus_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'gplus_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Google Plus URL', 'karma' )

        ) );

        $wp_customize->add_setting( 'instagram_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'instagram_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Instagram URL', 'karma' )

        ) );

        $wp_customize->add_setting( 'linkedin_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'linkedin_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Linkedin URL', 'karma' )

        ) );

        $wp_customize->add_setting( 'pinterest_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'pinterest_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Pinterest URL', 'karma' )

        ) );

        $wp_customize->add_setting( 'twitter_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'twitter_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Twitter URL', 'karma' )

        ) );

        $wp_customize->add_setting( 'vimeo_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'vimeo_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Vimeo URL', 'karma' )

        ) );

        $wp_customize->add_setting( 'spotify_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'spotify_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Spotify URL', 'karma' )
        ) );

        $wp_customize->add_setting( 'apple_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'apple_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Apple URL', 'karma' )
        ) );

        $wp_customize->add_setting( 'github_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'github_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'GitHub URL', 'karma' )
        ) );

        $wp_customize->add_setting( 'vine_url', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw'
        ) );

        $wp_customize->add_control( 'vine_url', array(
            'type'                  => 'text',
            'section'               => 'social_links',
            'label'                 => __( 'Vine URL', 'karma' )
        ) );
