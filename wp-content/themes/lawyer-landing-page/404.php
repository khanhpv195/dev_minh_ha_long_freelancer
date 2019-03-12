<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lawyer_Landing_Page
 */

get_header(); 
?>
	
    <h1><?php  esc_html_e( '404', 'lawyer-landing-page' ); ?></h1>
	
    <h2><?php esc_html_e( 'Sorry, The Page Not Found', 'lawyer-landing-page' ); ?></h2>
	
    <p><?php esc_html_e( 'Can&rsquo;t find what you need? Take a moment and do a search below or start from our', 'lawyer-landing-page' );?> 
	
    <a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo esc_html__( 'Homepage', 'lawyer-landing-page' ); ?></a></p>
    
    <?php get_search_form(); ?>

	
<?php
get_footer();
