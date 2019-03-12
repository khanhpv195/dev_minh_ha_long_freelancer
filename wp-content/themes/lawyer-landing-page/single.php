<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lawyer_Landing_Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
    		while ( have_posts() ) : the_post();
    
    			get_template_part( 'template-parts/content', 'single' );
    
    			/**
                 * After post content
                 * 
                 * @hooked lawyer_landing_page_post_author  - 10 
                */
                do_action( 'lawyer_landing_page_after_post_content' );
                
                lawyer_landing_page_pagination(); //Pagination
    
    			/**
                 * Comments
                 * 
                 * @hooked lawyer_landing_page_get_comment_section 
                */
                do_action( 'lawyer_landing_page_comment' );   
    
    		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
