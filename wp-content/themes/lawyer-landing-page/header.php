<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lawyer_Landing_Page
 */

/**
     * Doctype Hook
     * 
     * @hooked lawyer_landing_page_doctype_cb
    */
    do_action( 'lawyer_landing_page_doctype' );
?>
<head itemscope itemtype="http://schema.org/WebSite">

<?php 
    
    /**
     * Before wp_head
     * 
     * @hooked lawyer_landing_page_head
    */
    do_action( 'lawyer_landing_page_before_wp_head' );
    
    wp_head(); 

?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php
    /**
     * Before Header
     * 
     * @hooked lawyer_landing_page_page_start - 20 
    */
    do_action( 'lawyer_landing_page_before_header' );
    
    /**
     * Lawyer_Landing_Page Header
     * 
     * @hooked lawyer_landing_page_header_start  - 20
     * @hooked lawyer_landing_page_header_top    - 30
     * @hooked lawyer_landing_page_header_bottom - 40
     * @hooked lawyer_landing_page_header_end    - 100    
    */
    do_action( 'lawyer_landing_page_header' );
    
    /**
     * Before Content
     * 
     * @hooked lawyer_landing_page_pg_header - 20
    */
    do_action( 'lawyer_landing_page_before_content' );
    
    /**
     * Lawyer_Landing_Page Content
     * 
     * @hooked lawyer_landing_page_content_start
    */
    do_action( 'lawyer_landing_page_content' );