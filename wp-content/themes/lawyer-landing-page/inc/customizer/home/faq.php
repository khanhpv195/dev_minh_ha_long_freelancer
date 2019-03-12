<?php
/**
 * FAQ Section Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_faq( $wp_customize ) {

    global $lawyer_landing_page_option_categories, $lawyer_landing_page_options_pages;
    
    /** FAQ Section */
    $wp_customize->add_section(
        'lawyer_landing_page_faq_settings',
        array(
            'title'    => __( 'FAQ Section', 'lawyer-landing-page' ),
            'priority' => 80,
            'panel'    => 'lawyer_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable FAQ Section */
    $wp_customize->add_setting(
        'ed_faq_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_faq_section',
        array(
            'label'   => __( 'Enable FAQ Section', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_faq_settings',
            'type'    => 'checkbox',
        )
    );

     /** faq page */
    $wp_customize->add_setting(
        'faq_section_page',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'faq_section_page',
        array(
            'label'   => __( 'Select Page', 'lawyer-landing-page' ),
            'description' => __( 'Title and description of selected page will display as section title and description.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_faq_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_pages,
        )
    );
    

    /** select category */
    $wp_customize-> add_setting(
        'faq_section_cat',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        ));
    
    $wp_customize->add_control(
        'faq_section_cat',
        array(
            'label'   => __( 'Choose Category', 'lawyer-landing-page' ),
            'description' => __( 'Posts that have the selected category will be displayed in the FAQ section.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_faq_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_option_categories,
        ));

}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_faq' );