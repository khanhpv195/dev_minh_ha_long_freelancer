<?php    
/**
 * Testimonial Section.
 *
 * @package Lawyer_Landing_Page
 */

$section_title   = get_theme_mod( 'testimonial_section_page' );
$testimonial_cat = get_theme_mod( 'testimonials_section_cat' );

if( $section_title || $testimonial_cat ){        
?>

<section class="testimonial">
    <div class="container">
				
        <?php 
        
            lawyer_landing_page_get_section_header( $section_title );
            
            if( $testimonial_cat ){
                
    			$qry = new WP_Query( array(
    				'posts_per_page'      => -1,
    				'post_type'           => 'post',
    				'ignore_sticky_posts' => true,
    				'cat'                 => $testimonial_cat
    			));
    
    			if( $qry->have_posts() ){ ?>
    				<div class="testimonial-content">      					
                    <?php 
                        while( $qry->have_posts() ){
                            $qry->the_post();
                            if( $qry->current_post == 0 ){ ?>
    					    	<div class="testimonial-holder">
    					    		<?php the_content(); ?>
    					    	</div>
                            <?php
                            } 
                        }
                        rewind_posts(); 
                    ?>
    				</div>
                    
    				<div class="testimonial-slider owl-carousel">
    					<?php 
                            while( $qry->have_posts() ){
                                $qry->the_post(); ?>
        				    	<div id="testimonial-<?php the_ID(); ?>" class="testimonial-slide<?php if( $qry->current_post == 0 ) echo ' testimonial-active'; ?>">
        				      		<?php if( has_post_thumbnail() ) { 
                                        the_post_thumbnail( 'lawyer-landing-page-testimonial', array( 'itemprop' => 'image' ) ); 
                                    }else{ ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/testimonial-fallback.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" itemprop="image" />        
                                    <?php } ?>
        				      		<strong class="name"><?php the_title(); ?></strong>
        				      		<?php if( has_excerpt() ){ ?>
                                        <span class="designation"><?php the_excerpt(); ?></span>
                                    <?php } ?>
        				    	</div>
    				        <?php 
                            }
                            wp_reset_postdata(); 
                        ?>
    				</div>
    			<?php 
                }
			}
        ?>
    </div>
</section>   
            
<?php
}            