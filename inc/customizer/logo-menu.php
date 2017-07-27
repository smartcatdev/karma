<?php
    
$wp_customize->add_panel( 'logo', array (
    'title' => __( 'Logo & Menu bar', 'karma' ),
    'description' => __( 'set the logo image, site title, description and site icon favicon', 'karma' ),
    'priority' => 10
) );

    
    $wp_customize->get_section('title_tagline')->title = __( 'Logo & Title', 'karma' );
    $wp_customize->get_section('title_tagline')->panel = 'logo';


        $wp_customize->add_setting( 'custom_logo_height', array (
            'default'               => 70,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_integer',
        ) );
        $wp_customize->add_control( 'custom_logo_height', array(
            'type'                  => 'number',
            'section'               => 'title_tagline',
            'label'                 => __( 'Custom Logo Height', 'karma' ),
            'description'           => __( 'Set in pixels. Width will automatically maintain the image aspect ratio.', 'karma' ),
            'input_attrs'           => array(
                'min' => 20,
                'max' => 200,
                'step' => 5,
        ) ) );

        $wp_customize->add_setting( 'mobile_logo_height', array (
            'default'               => 70,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_integer',
        ) );
        $wp_customize->add_control( 'mobile_logo_height', array(
            'type'                  => 'number',
            'section'               => 'title_tagline',
            'label'                 => __( 'Mobile Logo Height', 'karma' ),
            'input_attrs'           => array(
                'min' => 20,
                'max' => 200,
                'step' => 5,
        ) ) );
    
    $wp_customize->add_section( 'karma_header_cart', array (
        'title'                 => __( 'Shopping cart', 'karma' ),
        'Description'           => __( 'This setting works if you have WooCommerce active', 'karma' ),
        'panel'                 => 'logo',
    ) );

        $wp_customize->add_setting( 'header_cart_bool', array (
            'default'               => 'on',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_radio_sanitize_onoff'
        ) );

       $wp_customize->add_control( 'header_cart_bool', array(
            'label'   => __( 'Display shopping cart ?', 'karma' ),
            'description'   => __( 'The shopping cart will only show up if you have WooCommerce or Easy Digital Downloads installed and activated', 'karma' ),
            'section' => 'karma_header_cart',
            'type'    => 'radio',
            'choices'    => array(
                'on'    => __( 'Yes', 'karma' ),
                'off'    => __( 'No', 'karma' )
            )
        ));
