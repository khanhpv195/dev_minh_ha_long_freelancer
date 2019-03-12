<?php
/**
 * About Section Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_about( $wp_customize ) {

    global $lawyer_landing_page_options_posts, $lawyer_landing_page_options_pages;
    
    /** about Section */
    $wp_customize->add_section(
        'lawyer_landing_page_about_settings',
        array(
            'title'    => __( 'About Section', 'lawyer-landing-page' ),
            'priority' => 20,
            'panel'    => 'lawyer_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable about Section */
    $wp_customize->add_setting(
        'ed_about_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_about_section',
        array(
            'label'   => __( 'Enable About Section', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_about_settings',
            'type'    => 'checkbox',
        )
    );

    /** about page */
    $wp_customize->add_setting(
        'about_section_page',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'about_section_page',
        array(
            'label'   => __( 'Select Page', 'lawyer-landing-page' ),
            'description' => __( 'Title and description of selected page will display as section title and description.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_about_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_pages,
        )
    );
    

    /** Select About Post */
    $wp_customize->add_setting(
        'about_post',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'about_post',
        array(
            'label'   => __( 'Select About Post/Page', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_about_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_posts,
        )
    );
    
}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_about' );