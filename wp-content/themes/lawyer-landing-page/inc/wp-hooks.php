<?php
/**
 * WordPress Hooks
 *
 * @package Lawyer_Landing_Page
 */

/**
 * @see lawyer_landing_page_setup
*/
add_action( 'after_setup_theme', 'lawyer_landing_page_setup' );

/**
 * @see lawyer_landing_page_content_width
*/
add_action( 'after_setup_theme', 'lawyer_landing_page_content_width', 0 );

/**
 * @see lawyer_landing_page_template_redirect_content_width
*/
add_action( 'template_redirect', 'lawyer_landing_page_template_redirect_content_width' );

/**
 * @see lawyer_landing_page_scripts
*/
add_action( 'wp_enqueue_scripts', 'lawyer_landing_page_scripts' );

/**
 * @see lawyer_landing_page_body_classes
*/
add_filter( 'body_class', 'lawyer_landing_page_body_classes' );

/**
 * @see lawyer_landing_page_category_transient_flusher
*/
add_action( 'edit_category', 'lawyer_landing_page_category_transient_flusher' );
add_action( 'save_post',     'lawyer_landing_page_category_transient_flusher' );

/**
 * @see lawyer_landing_page_change_comment_form_default_fields
 * @see lawyer_landing_page_change_comment_form_defaults
*/
add_filter( 'comment_form_default_fields', 'lawyer_landing_page_change_comment_form_default_fields' );
add_filter( 'comment_form_defaults', 'lawyer_landing_page_change_comment_form_defaults' );

/**
 * @see lawyer_landing_page_excerpt_more
 * @see lawyer_landing_page_excerpt_length
*/
add_filter( 'excerpt_more', 'lawyer_landing_page_excerpt_more' );
add_filter( 'excerpt_length', 'lawyer_landing_page_excerpt_length', 999 );

/**
* @see lawyer_landing_page_register_required_plugins
*/
add_action( 'tgmpa_register', 'lawyer_landing_page_register_required_plugins' );