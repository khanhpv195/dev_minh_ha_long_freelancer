<?php
/**
 * FAQ Section.
 *
 * @package Lawyer_Landing_Page
 */
 
$section_title   = get_theme_mod( 'blog_section_page' );

$qry = new WP_Query( array( 
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => 3,
            'ignore_sticky_posts' => true
        ) );     

if( $section_title || $qry->have_posts() ){
?>

<section class="blog-section">
    <div class="container">

        <?php
        
            lawyer_landing_page_get_section_header( $section_title );
             
        	if( $qry->have_posts()){
	        ?>
				<div class="row">
				<?php 
                    while( $qry->have_posts() ){ 
                        $qry->the_post(); ?>
    					<article class="post">
        					<?php if( has_post_thumbnail() ){ ?>
        						<a href="<?php the_permalink(); ?>" class="post-thumbnail">
        						   <?php the_post_thumbnail( 'lawyer-landing-page-blog', array( 'itemprop' => 'image' ) ); ?>
        						</a>
        				    <?php }else{ ?>
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/blog-fallback.png' ); ?>" alt="<?php the_title_attribute(); ?>" itemprop="image" />        
                            <?php } ?>
    						<div class="text-holder">
    							<header class="entry-header">
    								<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    								<div class="entry-meta">
    									<span class="posted-on"><a href="<?php the_permalink(); ?>"><time><?php echo esc_html( get_the_date() ); ?></time></a></span>
    								</div>
    							</header>
    							<div class="entry-content">
    							   <?php 
                                        if( has_excerpt() ){
                                            the_excerpt();
                                        }else{
                                            the_content();
                                        }
                                    ?>
    							</div>
    						</div>
    					</article>
				    <?php 
                    }
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