<?php
/**
 * Team Section Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_team( $wp_customize ) {
    
    global $lawyer_landing_page_options_posts, $lawyer_landing_page_options_pages;
    
    /** Team Section */
    $wp_customize->add_section(
        'lawyer_landing_page_team_settings',
        array(
            'title'    => __( 'Team Section', 'lawyer-landing-page' ),
            'priority' => 70,
            'panel'    => 'lawyer_landing_page_home_page_settings',
        )
    );
    
    /** Enable/Disable our_team Section */
    $wp_customize->add_setting(
        'ed_team_section',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_team_section',
        array(
            'label'   => __( 'Enable Team Section', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_team_settings',
            'type'    => 'checkbox',
        )
    );

     /** team page */
    $wp_customize->add_setting(
        'team_section_page',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'team_section_page',
        array(
            'label'   => __( 'Select Page', 'lawyer-landing-page' ),
            'description' => __( 'Title and description of selected page will display as section title and description.', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_team_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_pages,
        )
    );
    
    
    /** Post One */
    $wp_customize->add_setting(
        'team_post_one',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'team_post_one',
        array(
            'label'   => __( 'Select Post/Page One', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_team_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_posts,
        )
    );

    /** Post Two */
    $wp_customize->add_setting(
        'team_post_two',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'team_post_two',
        array(
            'label'   => __( 'Select Post/Page Two', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_team_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_posts,
        )
    );

    /** Post three */
    $wp_customize->add_setting(
        'team_post_three',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'team_post_three',
        array(
            'label'   => __( 'Select Post/Page Three', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_team_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_posts,
        )
    );

    /** Post four */
    $wp_customize->add_setting(
        'team_post_four',
        array(
            'default'           => '',
            'sanitize_callback' => 'lawyer_landing_page_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'team_post_four',
        array(
            'label'   => __( 'Select Post/Page Four', 'lawyer-landing-page' ),
            'section' => 'lawyer_landing_page_team_settings',
            'type'    => 'select',
            'choices' => $lawyer_landing_page_options_posts,
        )
    );
        
}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_team' );