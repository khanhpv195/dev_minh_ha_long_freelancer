<?php
/**
 * Service Section.
 *
 * @package Lawyer_Landing_Page
 */
  
$section_title   = get_theme_mod( 'service_section_page' );
$post_one        = get_theme_mod( 'services_post_one' );
$post_two        = get_theme_mod( 'services_post_two' );
$post_three      = get_theme_mod( 'services_post_three' );

$posts = array( $post_one, $post_two, $post_three );
$posts = array_diff( array_unique( $posts ), array('') );

if( $section_title || $posts ){
    $service_query = new WP_Query( array(           
        'p' => $section_title,
        'post_type' => 'page'
    ) );   
    if( $section_title && $service_query->have_posts() ){ 
        while( $service_query->have_posts() ){ $service_query->the_post();
            if( has_post_thumbnail() ){
                $service_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lawyer-landing-page-banner' );
                $style = ' style="background: url(' . esc_url( $service_image[0] ) . '); background-size: cover; background-position: center;"';    
            }else{
                $style = '';
            }?>
            <section class="why-us" <?php echo $style; ?>>
        <?php }
        wp_reset_postdata();
    }else{?>
        <section class="why-us">
    <?php }

?>
          
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
            
            if( $posts && $qry->have_posts() ){?>
				<div class="row">
				    <?php 
                    while( $qry->have_posts() ){ 
                        $qry->the_post(); ?>
                        <div class="col">
                            <div class="box">
                                <?php if( has_post_thumbnail() ){ ?>
                                    <div class="icon-holder"><?php the_post_thumbnail( 'lawyer-landing-page-service', array( 'itemprop' => 'image' ) ); ?></div>
                                <?php } ?>
                                <div class="text-holder">
                                <h3 class="sub-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                                <?php 
                                    if ( has_excerpt() ){
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