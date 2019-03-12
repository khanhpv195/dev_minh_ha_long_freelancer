<?php
/**
 * Blog Section Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_blog( $wp_customize ) {
    
    global $lawyer_landing_page_options_pages;
    /** Blog Section */
    $wp_customize->add_section(
        'lawyer_landing_page_blog_settings',
        array(
            'title'    => __( 'Blog Section', 'lawyer-landing-page' ),
            'priority' => 90,
            'panel'    => 'lawyer_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable blog Section */
    $wp_customize->add_setting(
        'ed_blog_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_blog_section',
        array(
            'label'   => __( 'Enable Blog Section', 'lawyer-landing-page' ),
            'description' => __( 'Display latest post in blog section', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_blog_settings',
            'type'    => 'checkbox',
        )
    );

     /** Blog page */
    $wp_customize->add_setting(
        'blog_section_page',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'blog_section_page',
        array(
            'label'   => __( 'Select Page', 'lawyer-landing-page' ),
            'description' => __( 'Title and description of selected page will display as section title and description.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_blog_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_pages,
        )
    );
    


}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_blog' );