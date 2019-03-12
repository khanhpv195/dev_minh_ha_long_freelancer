<?php
/**
 * Service Section Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_service( $wp_customize ) {

    global $lawyer_landing_page_options_posts, $lawyer_landing_page_options_pages;
    
    /** services Section */
    $wp_customize->add_section(
        'lawyer_landing_page_services_settings',
        array(
            'title'    => __( 'Services Section', 'lawyer-landing-page' ),
            'priority' => 40,
            'panel'    => 'lawyer_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable services Section */
    $wp_customize->add_setting(
        'ed_service_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_service_section',
        array(
            'label'   => __( 'Enable Services Section', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_services_settings',
            'type'    => 'checkbox',
        )
    );

     /** service page */
    $wp_customize->add_setting(
        'service_section_page',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'service_section_page',
        array(
            'label'   => __( 'Select Page', 'lawyer-landing-page' ),
            'description' => __( 'Title, description and featured image of selected page will display as section title, description and background image.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_services_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_pages,
        )
    );
    
    /** Post One */
    $wp_customize->add_setting(
        'services_post_one',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'services_post_one',
        array(
            'label'   => __( 'Select Post/Page One', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_services_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_posts,
        )
    );

    /** Post two */
    $wp_customize->add_setting(
        'services_post_two',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'services_post_two',
        array(
            'label'   => __( 'Select Post/Page Two', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_services_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_posts,
        )
    );
           
    /** Post Three */
    $wp_customize->add_setting(
        'services_post_three',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'services_post_three',
        array(
            'label'   => __( 'Select Post/Page Three', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_services_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_posts,
        )
    );
    
}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_service' );