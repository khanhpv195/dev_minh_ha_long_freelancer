<?php
/**
 * Header Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_header( $wp_customize ) {

    /** Phone Number Section */
    $wp_customize->add_section(
        'lawyer_landing_page_header_setting',
        array(
            'title'      => __( 'Header Settings', 'lawyer-landing-page' ),
            'priority'   => 20,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Search form */
    $wp_customize->add_setting(
        'ed_search',
        array(
            'default'           => '1',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_search',
        array(
            'label'       => __( 'Enable Search Form', 'lawyer-landing-page' ),
            'description' => __( 'Check to enable Search Form in the header.', 'lawyer-landing-page' ),
            'section'     => 'lawyer_landing_page_header_setting',
            'type'        => 'checkbox',
        )
    );
    
    /** Phone Number  */
    $wp_customize->add_setting(
        'phone',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'phone',
        array(
            'label'   => __( 'Phone Number', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_header_setting',
            'type'    => 'text',
        )
    );
    
}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_header' );