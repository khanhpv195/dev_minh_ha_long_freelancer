<?php 
/**
 * Footer Option.
 *
 * @package Lawyer Landing Page
 */
 
function lawyer_landing_page_customize_footer_settings( $wp_customize ) {

 /** Footer Section */
    $wp_customize->add_section(
        'lawyer_landing_page_footer_section',
        array(
            'title' => __( 'Footer Settings', 'lawyer-landing-page' ),
            'priority' => 70,
        )
    );
    
    /** Copyright Text */
    $wp_customize->add_setting(
        'lawyer_landing_page_footer_copyright_text',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'lawyer_landing_page_footer_copyright_text',
        array(
            'label' => __( 'Copyright Info', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_footer_section',
            'type' => 'textarea',
        )
    );

}

add_action( 'customize_register', 'lawyer_landing_page_customize_footer_settings' );