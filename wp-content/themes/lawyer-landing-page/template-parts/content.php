<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lawyer_Landing_Page
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php 
    /**
     * Before Page entry content
     * 
     * @hooked lawyer_landing_page_post_content_image - 10
     * @hooked lawyer_landing_page_post_entry_header  - 20 
    */
    do_action( 'lawyer_landing_page_before_post_entry_content' );    
    ?>

	<div class="entry-content" itemprop="text">
		<?php
			if( false === get_post_format() ){
                the_excerpt();
            }else{
                the_content( sprintf(
    				/* translators: %s: Name of current post. */
    				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'lawyer-landing-page' ), array( 'span' => array( 'class' => array() ) ) ),
    				the_title( '<span class="screen-reader-text">"', '"</span>', false )
    			) );
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lawyer-landing-page' ),
    				'after'  => '</div>',
    			) );
            }
		?>
	</div><!-- .entry-content -->
     
     
	<footer class="entry-footer">		
        <a href="<?php the_permalink(); ?>" class="btn-readmore"><?php  esc_html_e( 'Read More', 'lawyer-landing-page' );?></a>
        <?php lawyer_landing_page_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->
