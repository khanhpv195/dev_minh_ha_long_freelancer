<?php
/**
 * Practice Section.
 *
 * @package Lawyer_Landing_Page
 */     
     
$section_title   = get_theme_mod( 'pratice_section_page' );
$post_one        = get_theme_mod( 'practice_post_one' );
$post_two        = get_theme_mod( 'practice_post_two' );
$post_three      = get_theme_mod( 'practice_post_three' );
$post_four       = get_theme_mod( 'practice_post_four' );

$posts = array( $post_one, $post_two, $post_three, $post_four );
$posts = array_diff( array_unique( $posts ), array('') );

if( $section_title || $posts ){
?>

<section class="practice-area">
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
            
			if( $posts && $qry->have_posts() ){ ?>
				<div class="row">
				<?php 
                while( $qry->have_posts() ){ 
                    $qry->the_post(); ?>
					<div class="col">
						<div class="box">
				            <?php if( has_post_thumbnail() ){ ?>
							<div class="icon-holder">
							     <?php the_post_thumbnail( 'lawyer-landing-page-practice', array( 'itemprop' => 'image' ) ); ?>
							</div>
                            <?php } ?>
							<div class="text-holder">
								<h3 class="sub-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                                <?php 
									if( has_excerpt() ){
										the_excerpt();
									}else{
										the_content();
									}
								?>
							</div>
						</div>
					</div>
                    <?php 
                }
                wp_reset_postdata(); ?>
				</div>
                <?php 
            }
			?>
    </div>
</section>

<?php
}