<?php
/**
 * Social Link Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_social( $wp_customize ) {

    /** Social Settings */
    $wp_customize->add_section(
        'lawyer_landing_page_social_settings',
        array(
            'title'       => __( 'Social Settings', 'lawyer-landing-page' ),
            'description' => __( 'Leave blank if you do not want to show the social link.', 'lawyer-landing-page' ),
            'priority'    => 50,
            'capability'  => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Social in Header */
    $wp_customize->add_setting(
        'ed_social',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_social',
        array(
            'label'   => __( 'Enable Social Links', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Facebook */
    $wp_customize->add_setting(
        'facebook',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'facebook',
        array(
            'label'   => __( 'Facebook', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type'    => 'text',
        )
    );
    
    
    /** Twitter */
    $wp_customize->add_setting(
        'twitter',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'twitter',
        array(
            'label'   => __( 'Twitter', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type'    => 'text',
        )
    );
    
    /** Google Plus */
    $wp_customize->add_setting(
        'google_plus',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'google_plus',
        array(
            'label'   => __( 'Google Plus', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type'    => 'text',
        )
    );
    
    /** LinkedIn */
    $wp_customize->add_setting(
        'linkedin',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'linkedin',
        array(
            'label'   => __( 'LinkedIn', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type'    => 'text',
        )
    );
    
    /** Pinterest */
    $wp_customize->add_setting(
        'pinterest',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'pinterest',
        array(
            'label'   => __( 'Pinterest', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type'    => 'text',
        )
    );
    
    /** Instagram */
    $wp_customize->add_setting(
        'instagram',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'instagram',
        array(
            'label'   => __( 'Instagram', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type'    => 'text',
        )
    );
    
    /** YouTube */
    $wp_customize->add_setting(
        'youtube',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'youtube',
        array(
            'label'   => __( 'YouTube', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type'    => 'text',
        )
    );


    /** Ok */
    $wp_customize->add_setting(
        'ok',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'ok',
        array(
            'label' => __( 'OK', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type' => 'text',
        )
    );
    /** Vk */
    $wp_customize->add_setting(
        'vk',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'vk',
        array(
            'label' => __( 'VK', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type' => 'text',
        )
    );

    /** Xing */
    $wp_customize->add_setting(
        'xing',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'xing',
        array(
            'label' => __( 'Xing', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_social_settings',
            'type' => 'text',
        )
    );
    
}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_social' );