<?php
/**
 * Banner Section.
 *
 * @package Lawyer_Landing_Page
 */

while ( have_posts() ) : the_post();
    
if( has_post_thumbnail() ){
    $banner_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lawyer-landing-page-banner' );
    $style = ' style="background: url(' . esc_url( $banner_image[0] ) . '); background-size: cover; background-position: center;"';    
}else{
    $style = '';
}

$banner_form  = get_theme_mod( 'banner_form' );

if( has_post_thumbnail() ){
?>

<section class="banner"<?php echo $style; ?>>
	<div class="container">
		
        <div class="text">			
			<h2 class="title"><?php the_title(); ?></h2>
            <?php the_content(); ?>
		</div>
		
        <?php        
            if( lawyer_landing_page_is_cf7_activated() && $banner_form ){
                echo do_shortcode( wp_kses_post( $banner_form ) );    
            }
        ?>
        
	</div>
</section>

<?php
}

endwhile;