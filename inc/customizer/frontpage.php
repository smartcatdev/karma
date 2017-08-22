<?php

$wp_customize->add_panel( 'homepage', array (
    'title'                 => __( 'Frontpage', 'karma' ),
    'description'           => __( 'Customize the appearance of your homepage', 'karma' ),
    'priority'              => 10
) );

    $wp_customize->add_section( 'homepage_features', array (
        'title'                 => __( 'Features', 'karma' ),
        'panel'                 => 'homepage',
        'priority'              => 2
    ) );
    
    
        $wp_customize->add_setting( Karma_Options::$features_toggle, array (
            'default'               => Karma_Options::$features_toggle_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_radio_sanitize_onoff'
        ) );

       $wp_customize->add_control( Karma_Options::$features_toggle, array(
            'label'         => __( 'Display the features ?', 'karma' ),
            'description'   => __( 'This section shows up if you have the Static Front Page set to "A static page" in customizer -> Frontpage -> Static Front Page', 'karma' ),
            'section' => 'homepage_features',
            'type'    => 'radio',
            'choices'    => array(
                'on'    => __( 'Yes', 'karma' ),
                'off'    => __( 'No', 'karma' )
            )
        ));
    
        for( $i = 0; $i <= 3; $i++ ) :
       
        $wp_customize->add_setting( 'karma_homepage_feature[' . $i . ']', array (
            'default'               => 1,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_post',
        ) );
        $wp_customize->add_control( 'karma_homepage_feature[' . $i . ']', array(
            'type'                  => 'select',
            'section'               => 'homepage_features',
            'label'                 => sprintf( __( 'Feature #%s: Select a page or post', 'karma' ), $i+1 ),
            'description'           => __( 'This is a list of your posts & pages. The feature will link directly to your selection. The title of your post will be the feature name.', 'karma' ),
            'choices'               => karma_all_posts_array(),
        ) );
    
        $wp_customize->add_setting( 'karma_homepage_feature_icon[' . $i . ']', array (
            'default'               => 'fa fa-desktop',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_sanitize_icon',
        ) );
        $wp_customize->add_control( 'karma_homepage_feature_icon[' . $i . ']', array(
            'type'                  => 'select',
            'section'               => 'homepage_features',
            'label'                 => __( 'Select the icon', 'karma' ),
            'choices'               => karma_icons(),
        ) );

        endfor;

    if( class_exists( 'Easy_Digital_Downloads' ) ) :
        
    $wp_customize->add_section( 'homepage_products', array (
        'title'                 => __( 'Products', 'karma' ),
        'panel'                 => 'homepage',
        'priority'              => 3,
    ) );
       
        // Frontpage products only enabled if EDD is installed & active
        if( class_exists( 'Easy_Digital_Downloads' ) ) :

            $wp_customize->add_setting( Karma_Options::$products_toggle, array (
                'default'               => Karma_Options::$products_toggle_default,
                'transport'             => 'refresh',
                'sanitize_callback'     => 'karma_radio_sanitize_onoff'
            ) );

           $wp_customize->add_control( Karma_Options::$products_toggle, array(
                'label'         => __( 'Display Products on Homepage ?', 'karma' ),
                'section' => 'homepage_products',
                'type'    => 'radio',
                'choices'    => array(
                    'on'    => __( 'Yes', 'karma' ),
                    'off'    => __( 'No', 'karma' )
                )
            ));

            $wp_customize->add_setting( Karma_Options::$products_count, array (
                'default'               => Karma_Options::$products_count_default,
                'transport'             => 'refresh',
                'sanitize_callback'     => 'karma_sanitize_product_count'
            ) );

            $wp_customize->add_control(  Karma_Options::$products_count, array(
                'type'                  => 'select',
                'section'               => 'homepage_products',
                'label'                 => __( 'Product count', 'karma' ),
                'description'           => __( 'How many products do you want to show ?', 'karma' ),
                'choices'               => Karma_Options::karma_product_count_list()

            ) );
        endif;
        
    endif;
        
    $wp_customize->add_section( 'homepage_content', array (
        'title'                 => __( 'Page content', 'karma' ),
        'panel'                 => 'homepage',
        'priority'                 => 4,
    ) );
    
        $wp_customize->add_setting( Karma_Options::$homepage_content_toggle, array (
            'default'               => Karma_Options::$homepage_content_toggle_default,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'karma_radio_sanitize_onoff'
        ) );

       $wp_customize->add_control( Karma_Options::$homepage_content_toggle, array(
            'label'         => __( 'Display Homepage page content ?', 'karma' ),
            'section' => 'homepage_content',
            'type'    => 'radio',
            'choices'    => array(
                'on'    => __( 'Yes', 'karma' ),
                'off'    => __( 'No', 'karma' )
            )
        ));
    
       
    $wp_customize->get_section( 'static_front_page' )->panel = 'homepage';