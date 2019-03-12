<?php
/**
 * Template Hooks
 *
 * @package Lawyer_Landing_Page
 */

/**
 * Doctype
 * 
 * @see lawyer_landing_page_doctype_cb
*/
add_action( 'lawyer_landing_page_doctype', 'lawyer_landing_page_doctype_cb' );

/**
 * Before wp_head
 * 
 * @see lawyer_landing_page_head
*/
add_action( 'lawyer_landing_page_before_wp_head', 'lawyer_landing_page_head' );

/**
 * Before Header
 * 
 * @see lawyer_landing_page_page_start - 20
*/
add_action( 'lawyer_landing_page_before_header', 'lawyer_landing_page_page_start', 20 );

/**
 * Lawyer_Landing_Page Header
 * 
 * @see lawyer_landing_page_header_start  - 20
 * @see lawyer_landing_page_header_top    - 30
 * @see lawyer_landing_page_header_bottom - 40
 * @see lawyer_landing_page_header_end    - 100 
*/
add_action( 'lawyer_landing_page_header', 'lawyer_landing_page_header_start', 20 );
add_action( 'lawyer_landing_page_header', 'lawyer_landing_page_header_top', 30 );
add_action( 'lawyer_landing_page_header', 'lawyer_landing_page_header_bottom', 40 );
add_action( 'lawyer_landing_page_header', 'lawyer_landing_page_header_end', 100 );

/**
 * Before Content
 * 
 * @see lawyer_landing_page_pg_header - 20
*/
add_action( 'lawyer_landing_page_before_content', 'lawyer_landing_page_pg_header', 20 );

/**
 * Lawyer_Landing_Page Content
 * 
 * @see lawyer_landing_page_content_start
*/
add_action( 'lawyer_landing_page_content', 'lawyer_landing_page_content_start' );

/** Content HOOKS goes here */

/**
 * Before Page entry content
 * 
 * @see lawyer_landing_page_page_content_image
*/
add_action( 'lawyer_landing_page_before_page_entry_content', 'lawyer_landing_page_page_content_image' );

/**
 * Before Post entry content
 * 
 * @see lawyer_landing_page_post_content_image - 10
 * @see lawyer_landing_page_post_entry_header  - 20
*/
add_action( 'lawyer_landing_page_before_post_entry_content', 'lawyer_landing_page_post_content_image', 10 );
add_action( 'lawyer_landing_page_before_post_entry_content', 'lawyer_landing_page_post_entry_header', 20 );



/**
 * After post content
 * 
 * @see lawyer_landing_page_post_author - 20
*/
add_action( 'lawyer_landing_page_after_post_content', 'lawyer_landing_page_post_author', 20 );

/**
 * Comment
 * 
 * @see lawyer_landing_page_get_comment_section 
*/
add_action( 'lawyer_landing_page_comment', 'lawyer_landing_page_get_comment_section' );





/** Content HOOKS goes here */

/**
 * After Content
 * 
 * @see lawyer_landing_page_content_end - 20
*/
add_action( 'lawyer_landing_page_after_content', 'lawyer_landing_page_content_end', 20 );

/**
 * Before Footer
 * @see lawyer_landing_page_bottom_ad - 10
 * @see lawyer_landing_page_slider    - 20
*/
add_action( 'lawyer_landing_page_before_footer', 'lawyer_landing_page_bottom_ad', 10 );
add_action( 'lawyer_landing_page_before_footer', 'lawyer_landing_page_slider', 20 );

/**
 * Numinous Footer
 * 
 * @see lawyer_landing_page_footer_start  - 20
 * @see lawyer_landing_page_footer_top    - 30
 * @see lawyer_landing_page_footer_bottom - 40
 * @see lawyer_landing_page_footer_end    - 50
*/
add_action( 'lawyer_landing_page_footer', 'lawyer_landing_page_footer_start', 20 );
add_action( 'lawyer_landing_page_footer', 'lawyer_landing_page_footer_top', 30 );
add_action( 'lawyer_landing_page_footer', 'lawyer_landing_page_footer_bottom', 40 );
add_action( 'lawyer_landing_page_footer', 'lawyer_landing_page_footer_end', 50 );

/**
 * After Footer
 * 
 * @see lawyer_landing_page_page_end - 20
*/
add_action( 'lawyer_landing_page_after_footer', 'lawyer_landing_page_page_end', 20 );