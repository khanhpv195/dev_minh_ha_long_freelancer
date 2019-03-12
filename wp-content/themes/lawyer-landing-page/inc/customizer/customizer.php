<?php
/**
 * Lawyer Landing Page Theme Customizer.
 *
 * @package Lawyer_Landing_Page
 */

    function lawyer_landing_page_modify_sections( $wp_customize ){
        if ( version_compare( get_bloginfo('version'),'4.9', '>=') ) {
            $wp_customize->get_section( 'static_front_page' )->title = __( 'Static Front Page', 'lawyer-landing-page' );
        }
    }
    add_action( 'customize_register', 'lawyer_landing_page_modify_sections' );

    $lawyer_landing_page_sections = array( 'banner', 'about', 'practice', 'service', 'testimonial', 'promotional', 'team', 'faq', 'blog' );
    
    $lawyer_landing_page_settings = array( 'default', 'header', 'home', 'breadcrumb', 'social', 'footer', 'info', 'demo-content' );


    /* Option list of all post/page */	
    $lawyer_landing_page_options_posts     = array();
    $lawyer_landing_page_options_posts_obj = get_posts( array( 'posts_per_page'=>'-1','post_type'=>array('page','post') ) );
    $lawyer_landing_page_options_posts[''] = __( 'Choose Post/Page', 'lawyer-landing-page' );
    foreach ( $lawyer_landing_page_options_posts_obj as $lawyer_landing_page_posts ) {
    	$lawyer_landing_page_options_posts[$lawyer_landing_page_posts->ID] = $lawyer_landing_page_posts->post_title;
    }

    /* Option list of all page */   
    $lawyer_landing_page_options_pages     = array();
    $lawyer_landing_page_options_pages_obj = get_posts( 'post_type=page&posts_per_page=-1' );
    $lawyer_landing_page_options_pages[''] = __( 'Choose Page', 'lawyer-landing-page' );
    foreach ( $lawyer_landing_page_options_pages_obj as $lawyer_landing_page_pages ) {
        $lawyer_landing_page_options_pages[$lawyer_landing_page_pages->ID] = $lawyer_landing_page_pages->post_title;
    }
    
    /* Option list of all categories */
    $lawyer_landing_page_args = array(
        'type'         => 'post',
	    'orderby'      => 'name',
	    'order'        => 'ASC',
	    'hide_empty'   => 1,
	    'hierarchical' => 1,
	    'taxonomy'     => 'category'
    ); 
    
    $lawyer_landing_page_option_categories     = array();
    $lawyer_landing_page_category_lists        = get_categories( $lawyer_landing_page_args );
    $lawyer_landing_page_option_categories[''] = __( 'Choose Category', 'lawyer-landing-page' );
    foreach( $lawyer_landing_page_category_lists as $lawyer_landing_page_category ){
        $lawyer_landing_page_option_categories[$lawyer_landing_page_category->term_id] = $lawyer_landing_page_category->name;
    }
    

foreach( $lawyer_landing_page_settings as $setting ){
    require get_template_directory() . '/inc/customizer/' . $setting . '.php';
}

foreach( $lawyer_landing_page_sections as $section ){
   require get_template_directory() . '/inc/customizer/home/' . $section . '.php';
}

/**
 * Sanitization Functions
*/

require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lawyer_landing_page_customize_preview_js() {
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'lawyer_landing_page_customizer', get_template_directory_uri() . '/js' . $build . '/customizer' . $suffix . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'lawyer_landing_page_customize_preview_js' );

function lawyer_landing_page_customizer_scripts() {
    wp_enqueue_style( 'lawyer-landing-page-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );
    wp_enqueue_script( 'lawyer-landing-page-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery' ), '20170404', true );
}
add_action( 'customize_controls_enqueue_scripts', 'lawyer_landing_page_customizer_scripts' );