<?php
/**
 * Promotional Section Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_promotional( $wp_customize ) {
    
    global $lawyer_landing_page_options_pages;
    /** promotional Section */
    $wp_customize->add_section(
        'lawyer_landing_page_promotional_settings',
        array(
            'title' => __( 'Promotional Section', 'lawyer-landing-page' ),
            'priority' => 60,
            'panel' => 'lawyer_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable promotional Section */
    $wp_customize->add_setting(
        'ed_promotional_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_promotional_section',
        array(
            'label'   => __( 'Enable Promotional Section', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_promotional_settings',
            'type'    => 'checkbox',
        )
    );

      /** promotional page */
    $wp_customize->add_setting(
        'promotional_section_page',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'promotional_section_page',
        array(
            'label'   => __( 'Select Page', 'lawyer-landing-page' ),
            'description' => __( 'Title and description of selected page will display as section title and description.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_promotional_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_pages,
        )
    );
    

    /** Button Label */
    $wp_customize->add_setting(
        'promotional_section_button_label',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'promotional_section_button_label',
        array(
            'label' => __( 'CTA Button Label', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_promotional_settings',
            'type' => 'text',
        )
    );
    
    /** Button Link */
    $wp_customize->add_setting(
        'promotional_section_button_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'promotional_section_button_link',
        array(
            'label'   => __( 'CTA Button Link', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_promotional_settings',
            'type'    => 'text',
        )
    );
    
}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_promotional' );