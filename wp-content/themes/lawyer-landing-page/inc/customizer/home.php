<?php
/**
 * Home Page Theme Option.
 *
 * @package Lawyer_Landing_Page
 */

function lawyer_landing_page_customize_register_home( $wp_customize ) {
    
    /** Home Page Settings */
    $wp_customize->add_panel( 
        'lawyer_landing_page_home_page_settings',
         array(
            'priority'    => 30,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Home Page Settings', 'lawyer-landing-page' ),
            'description' => __( 'Customize Home Page Settings', 'lawyer-landing-page' ),
        ) 
    );

}
add_action( 'customize_register', 'lawyer_landing_page_customize_register_home' );