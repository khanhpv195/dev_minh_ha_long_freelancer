<?php
/**
 * Widgets
 *
 * @package Lawyer_Landing_Page
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lawyer_landing_page_widgets_init() {
	
    $sidebars = array(
        'sidebar'   => array(
            'name'        => esc_html__( 'Right Sidebar', 'lawyer-landing-page' ),
            'id'          => 'right-sidebar', 
            'description' => esc_html__( 'Add widgets here.', 'lawyer-landing-page' ),
        ),        
        'footer-one'=> array(
            'name'        => esc_html__( 'Footer One', 'lawyer-landing-page' ),
            'id'          => 'footer-one', 
            'description' => esc_html__( 'Add footer one widgets.', 'lawyer-landing-page' ),
        ),
        'footer-two'=> array(
            'name'        => esc_html__( 'Footer Two', 'lawyer-landing-page' ),
            'id'          => 'footer-two', 
            'description' => esc_html__( 'Add footer two widgets.', 'lawyer-landing-page' ),
        ),
        'footer-three'=> array(
            'name'        => esc_html__( 'Footer Three', 'lawyer-landing-page' ),
            'id'          => 'footer-three', 
            'description' => esc_html__( 'Add footer three widgets.', 'lawyer-landing-page' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => $sidebar['name'],
    		'id'            => $sidebar['id'],
    		'description'   => $sidebar['description'],
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>',
    	) );
    }
    
}
add_action( 'widgets_init', 'lawyer_landing_page_widgets_init' );

/**
 * Recent Post Widget
*/
require get_template_directory() . '/inc/widgets/widget-recent-post.php';

/**
 * Popular Post Widget
*/
require get_template_directory() . '/inc/widgets/widget-popular-post.php';

/**
 * Social Link Widget
*/
require get_template_directory() . '/inc/widgets/widget-social-links.php';

/**
 * Featured Post Widget
*/
require get_template_directory() . '/inc/widgets/widget-featured-post.php';