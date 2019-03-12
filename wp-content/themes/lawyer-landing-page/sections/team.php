<?php
/**
 * Team Section.
 *
 * @package Lawyer_Landing_Page
 */       
       
$section_title   = get_theme_mod( 'team_section_page' );
$post_one        = get_theme_mod( 'team_post_one' );
$post_two        = get_theme_mod( 'team_post_two' );
$post_three      = get_theme_mod( 'team_post_three' );
$post_four       = get_theme_mod( 'team_post_four' );

$posts = array( $post_one, $post_two, $post_three, $post_four );
$posts = array_diff( array_unique( $posts ), array('') );
     
if( $section_title || $posts ){
?>
    
<section class="team">    
    <div class="container">
				
        <?php 
        
            lawyer_landing_page_get_section_header( $section_title );
            
			$qry = new WP_Query( array( 
                'post_type'           => array( 'post', 'page' ),
                'posts_per_page'      => -1,
                'post__in'            => $posts,
                'orderby'             => 'post__in',
                'ignore_sticky_posts' => true
            ) );

			if( $posts && $qry->have_posts()){ ?>
				<div class="row">
				<?php 
                while( $qry->have_posts() ){ 
				    $qry->the_post(); ?>
					<div class="col">
					   <div class="img-holder">
	                        <?php 
	                        if( has_post_thumbnail() ){
	                            the_post_thumbnail( 'lawyer-landing-page-team', array( 'itemprop' => 'image' ) );
	                        }
	                        else{ ?>
	                            <img src="<?php echo get_template_directory_uri(); ?>/images/no-preview.png" itemprop="image">   
	                        <?php } ?>
							<div class="text-holder">
								<?php the_content(); ?>
							</div>
						</div>
						<strong class="name"><?php the_title(); ?></strong>	
                        <?php if( has_excerpt() ){ ?>
                            <span class="designation"><?php the_excerpt(); ?></span>
                        <?php } ?>
					</div>
				<?php } 
                wp_reset_postdata();
                ?>		
				</div>
			<?php 
            } 
        ?>
    </div>
</section>

<?php
}