<?php
/**
 * BreadCrumb Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_breadcrumb( $wp_customize ) {

    /** BreadCrumb Settings */
    $wp_customize->add_section(
        'lawyer_landing_page_breadcrumb_settings',
        array(
            'title'      => __( 'Breadcrumb Settings', 'lawyer-landing-page' ),
            'priority'   => 40,
            'capability' => 'edit_theme_options',
        )
    );

    /** Enable/Disable BreadCrumb */
    $wp_customize->add_setting(
        'ed_breadcrumb',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_breadcrumb',
        array(
            'label'   => __( 'Enable/Disable Breadcrumb', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_breadcrumb_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Show/Hide Current */
    $wp_customize->add_setting(
        'ed_current',
        array(
            'default'           => '1',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_current',
        array(
            'label'   => __( 'Show current', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_breadcrumb_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Home Text */
    $wp_customize->add_setting(
        'breadcrumb_home_text',
        array(
            'default'           => __( 'Home', 'lawyer-landing-page' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'breadcrumb_home_text',
        array(
            'label'   => __( 'Breadcrumb Home Text', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_breadcrumb_settings',
            'type'    => 'text',
        )
    );
    
    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'breadcrumb_separator',
        array(
            'default'           => __( '/', 'lawyer-landing-page' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'breadcrumb_separator',
        array(
            'label'   => __( 'Breadcrumb Separator', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_breadcrumb_settings',
            'type'    => 'text',
        )
    );
    /** BreadCrumb Settings Ends */
    
}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_breadcrumb' );