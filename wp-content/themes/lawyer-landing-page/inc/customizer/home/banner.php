<?php
/**
 * Banner Section Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_banner( $wp_customize ) {

    /** Banner Setting*/
    $wp_customize->add_section(
        'lawyer_landing_page_banner_settings',
        array(
            'title'    => __( 'Banner Section', 'lawyer-landing-page' ),            
            'priority' => 10,            
            'panel'    => 'lawyer_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable banner Section */
    $wp_customize->add_setting(
        'ed_banner_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_banner_section',
        array(
            'label'   => __( 'Enable Banner Section', 'lawyer-landing-page' ),
            'description' => __( 'Check to enable banner on the front page. The featured image and content of Static Front Page will be displayed in the banner section. To add or edit the content of Static Front Page, go to Dashboard >> Pages > All Pages  and edit the page with Front Page template.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_banner_settings',
            'type'    => 'checkbox',
        )
    );

    /** Drop Down of CF7 only if plugin enabled */
    if( lawyer_landing_page_is_cf7_activated() ){
        
        /** Banner Form */
        $wp_customize->add_setting(
            'banner_form',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
            )
        );
        
        $wp_customize->add_control(
            'banner_form',
            array(
                'label'       => __( 'Banner Form', 'lawyer-landing-page' ),
                'description' => __( 'Copy and paste the shortcode of the form from the contact form 7.', 'lawyer-landing-page' ),
                'section'     => 'lawyer_landing_page_banner_settings',
                'type'        => 'text',
            )
        );
        
    }
     
}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_banner' );