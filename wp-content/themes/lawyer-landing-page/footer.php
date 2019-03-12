<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lawyer_Landing_Page
 */

    /**
     * After Content
     * 
     * @hooked lawyer_landing_page_content_end - 20
    */
    do_action( 'lawyer_landing_page_after_content' );
    
    /**
     * Numinous Footer
     * 
     * @hooked lawyer_landing_page_footer_start  - 20
     * @hooked lawyer_landing_page_footer_top    - 30
     * @hooked lawyer_landing_page_footer_bottom - 40
     * @hooked lawyer_landing_page_footer_end    - 50
    */
    do_action( 'lawyer_landing_page_footer' );
    
    /**
     * After Footer
     * 
     * @hooked lawyer_landing_page_page_end - 20
    */
    do_action( 'lawyer_landing_page_after_footer' );
   
    wp_footer(); ?>

</body>
</html>