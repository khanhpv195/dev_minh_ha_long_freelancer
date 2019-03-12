<?php
/**
 * FAQ Section.
 *
 * @package Lawyer_Landing_Page
 */
  
$section_title   = get_theme_mod( 'faq_section_page' );
$faq_cat         = get_theme_mod( 'faq_section_cat' );
     
if( $section_title || $faq_cat ){
?>

<section class="faq">
   <div class="container">
				
    <?php 
    	
        lawyer_landing_page_get_section_header( $section_title );
        
        if( $faq_cat ){
			
            $qry = new WP_Query( array(
    				'posts_per_page'      => -1,
    				'post_type'           => 'post',
    				'ignore_sticky_posts' => true,
    				'cat'                 => $faq_cat
    			));

			if( $qry->have_posts() ){  ?>
				<div class="row rara-masonry">
				<?php 
                    while( $qry->have_posts() ){  
    				    $qry->the_post(); ?>
    				    <div class="col">
    						<strong class="question"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?> </a></strong>
                            <?php 
                                if ( has_excerpt() ){
                                    the_excerpt();
                                }else{
                                    the_content();
                                }
                            ?>
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