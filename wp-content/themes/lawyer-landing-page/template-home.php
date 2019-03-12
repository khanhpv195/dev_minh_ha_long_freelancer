<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lawyer Landing Page
 */

get_header();
    
    global $lawyer_landing_page_sections;
    
    foreach( $lawyer_landing_page_sections as $section ){ 
        if( get_theme_mod( 'ed_' . $section . '_section' ) == 1 ){
            get_template_part( 'sections/' . esc_attr( $section ) );
        } 
    }
        
get_footer();