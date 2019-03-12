<?php
/**
 * Testimonial Section Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_testimonial( $wp_customize ) {
    
    global $lawyer_landing_page_option_categories, $lawyer_landing_page_options_pages;
    
    /** testimonials Section */
    $wp_customize->add_section(
        'lawyer_landing_page_testimonials_settings',
        array(
            'title'    => __( 'Testimonials Section', 'lawyer-landing-page' ),
            'priority' => 50,
            'panel'    => 'lawyer_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable testimonials Section */
    $wp_customize->add_setting(
        'ed_testimonial_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_testimonial_section',
        array(
            'label'   => __( 'Enable Testimonials Section', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_testimonials_settings',
            'type'    => 'checkbox',
        )
    );

     /** testimonial page */
    $wp_customize->add_setting(
        'testimonial_section_page',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'testimonial_section_page',
        array(
            'label'   => __( 'Select Page', 'lawyer-landing-page' ),
            'description' => __( 'Title and description of selected page will display as section title and description.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_testimonials_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_pages,
        )
    );
    
    /** select category */
    $wp_customize-> add_setting(
        'testimonials_section_cat',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        ));
    
    $wp_customize->add_control(
        'testimonials_section_cat',
        array(
            'label'   => __( 'Choose Category', 'lawyer-landing-page' ),
            'description' => __( 'Posts that have the selected category will be displayed in the testimonial section.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_testimonials_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_option_categories,
        ));
     
}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_testimonial' );