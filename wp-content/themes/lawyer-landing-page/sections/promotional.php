<?php
/**
 * Promotional Section.
 *
 * @package Lawyer_Landing_Page
 */
 
$section_title   = get_theme_mod( 'promotional_section_page' );
$button_label    = get_theme_mod( 'promotional_section_button_label' );
$button_link     = get_theme_mod( 'promotional_section_button_link' );

if( $section_title ||  $button_label || $button_link ){

	$header_query = new WP_Query( array( 
                
                'p' => $section_title,
                'post_type' => 'page'

                ));
    ?>
     
		<section class="promotional-block">
		    <div class="container">
		    	<div class="holder">
					<?php
					    if( $section_title && $header_query->have_posts() ){ 
                            while( $header_query->have_posts() ){ 
                                $header_query->the_post(); 
				                the_title( '<h2>', '</h2>' );
		                 	    if( has_excerpt() ){
		                 	        the_excerpt();    
		                 	    }else{
                                    the_content();
                                }
                            }
					        wp_reset_postdata();
	                   }

                        if( $button_label && $button_link ) echo '<a href="' . esc_url( $button_link ) . '" class="btn-contact" target="_blank">' . esc_html( $button_label ) . '</a>'; 
		            ?>
				</div>
			</div>
		</section>

<?php
}