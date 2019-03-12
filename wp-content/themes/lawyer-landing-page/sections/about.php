<?php  
/**
 * About Us Section.
 *
 * @package Lawyer_Landing_Page
 */
    
    
$section_title   = get_theme_mod( 'about_section_page' );
$about_post      = get_theme_mod( 'about_post' );

$qry = new WP_Query( array( 'post_type' => array( 'post', 'page' ), 
                            'p'  => $about_post )
 );

if( $section_title || $about_post ){      
?>

<section class="about">
    <div class="container">
            
        <?php 
        
        lawyer_landing_page_get_section_header( $section_title );
			
        if( $about_post && $qry->have_posts() ) {
            while( $qry->have_posts() ){
                $qry->the_post();?>
				<div class="row">
				<?php if( has_post_thumbnail() ){ ?>
					<div class="img-holder">
					   <a href="<?php the_permalink(); ?>">
					        <?php the_post_thumbnail( 'lawyer-landing-page-about', array( 'itemprop' => 'image' ) ); ?>
					   </a>
					</div>
					<?php } ?>
					<div class="text-holder">
						<h3 class="sub-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php 
							if( has_excerpt() ){
								the_excerpt();
							}else{
								the_content();
							}
						?>
					</div>
				</div>

            <?php 

            }
            wp_reset_postdata(); 
        }
        ?>
    </div>
</section>

<?php
}