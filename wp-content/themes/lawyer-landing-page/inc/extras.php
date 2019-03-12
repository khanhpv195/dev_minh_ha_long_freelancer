<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Lawyer_Landing_Page
 */

if( ! function_exists( 'lawyer_landing_page_get_post_meta' ) ) :
/**
 * Post meta info
*/
function lawyer_landing_page_get_post_meta(){
    
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	echo '<div class="entry-meta">';
    
	echo '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>';
    
    
    // Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'lawyer-landing-page' ) );
		if ( $tags_list ) {
			printf( '<span class="tag-links">' . $tags_list . '</span>' ); // WPCS: XSS OK.
		}
        
        /* translators: used between list items, there is a space after the comma */		
        $categories_list = get_the_category_list( esc_html__( ', ', 'lawyer-landing-page' ) );
		if ( $categories_list && lawyer_landing_page_categorized_blog() ) {
		  printf( '<span class="cat-links">' .  $categories_list . '</span>' ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'lawyer-landing-page' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}
    

	echo '<span class="byline"><span class="authors vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>'; // WPCS: XSS OK.
    
    echo '</div>';
}
endif;

if ( ! function_exists( 'lawyer_landing_page_entry_footer' ) ) :
/**
 * Prints edit links
 */
function lawyer_landing_page_entry_footer() {	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'lawyer-landing-page' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function lawyer_landing_page_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'lawyer_landing_page_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'lawyer_landing_page_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so lawyer_landing_page_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so lawyer_landing_page_categorized_blog should return false.
		return false;
	}
}

if( ! function_exists( 'lawyer_landing_page_get_social_links' ) ):
/**
 * Callback for Social Links 
 */
function lawyer_landing_page_get_social_links(){
    $facebook  = get_theme_mod( 'facebook' );
    $twitter   = get_theme_mod( 'twitter' );
    $pinterest = get_theme_mod( 'pinterest' );
    $linkedin  = get_theme_mod( 'linkedin' );
    $gplus     = get_theme_mod( 'google_plus' );
    $instagram = get_theme_mod( 'instagram' );
    $youtube   = get_theme_mod( 'youtube' );
    $ok        = get_theme_mod( 'ok' );
    $vk        = get_theme_mod( 'vk' );
    $xing      = get_theme_mod( 'xing' );

    
    if( $facebook || $twitter || $pinterest || $linkedin || $gplus || $instagram || $youtube || $ok || $vk || $xing ){
    ?>
    <ul class="social-networks">
		<?php if( $facebook ){ ?>
        <li><a href="<?php echo esc_url( $facebook ); ?>" class="fa fa-facebook" target="_blank" title="<?php esc_attr_e( 'Facebook', 'lawyer-landing-page' );?>"></a></li>
		<?php } if( $twitter ){ ?>
        <li><a href="<?php echo esc_url( $twitter ); ?>" class="fa fa-twitter" target="_blank" title="<?php esc_attr_e( 'Twitter', 'lawyer-landing-page' );?>"></a></li>
        <?php } if( $gplus ){ ?>
        <li><a href="<?php echo esc_url( $gplus ); ?>" class="fa fa-google-plus" target="_blank" title="<?php esc_attr_e( 'Google Plus', 'lawyer-landing-page' );?>"></a></li>
        <?php } if( $linkedin ){ ?>
        <li><a href="<?php echo esc_url( $linkedin ); ?>" class="fa fa-linkedin" target="_blank" title="<?php esc_attr_e( 'LinkedIn', 'lawyer-landing-page' );?>"></a></li>
        <?php }  if( $pinterest ){ ?>
        <li><a href="<?php echo esc_url( $pinterest ); ?>" class="fa fa-pinterest" target="_blank" title="<?php esc_attr_e( 'Pinterest', 'lawyer-landing-page' );?>"></a></li>
		<?php }  if( $instagram ){ ?>
        <li><a href="<?php echo esc_url( $instagram ); ?>" class="fa fa-instagram" target="_blank" title="<?php esc_attr_e( 'Instagram', 'lawyer-landing-page' );?>"></a></li>
		<?php } if( $youtube ){ ?>
        <li><a href="<?php echo esc_url( $youtube ); ?>" class="fa fa-youtube" target="_blank" title="<?php esc_attr_e( 'YouTube', 'lawyer-landing-page' );?>"></a></li>
        <?php } if( $ok ){ ?>
        <li><a href="<?php echo esc_url( $ok ); ?>" target="_blank" title="<?php esc_attr_e( 'OK', 'lawyer-landing-page' );?>"><i class="fa fa-odnoklassniki"></i></a></li>
        <?php } if( $vk ){ ?>
        <li><a href="<?php echo esc_url( $vk ); ?>" target="_blank" title="<?php esc_attr_e( 'VK', 'lawyer-landing-page' );?>"><i class="fa fa-vk"></i></a></li>
        <?php } if( $xing ){ ?>
        <li><a href="<?php echo esc_url( $xing ); ?>" target="_blank" title="<?php esc_attr_e( 'Xing', 'lawyer-landing-page' );?>"><i class="fa fa-xing"></i></a></li>
        <?php } ?>
	</ul>
    <?php
    }
}
endif;

if( ! function_exists( 'lawyer_landing_page_breadcrumb' ) ) :
/**
 * Breadcrumb 
*/
function lawyer_landing_page_breadcrumb(){
    
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = esc_html( get_theme_mod( 'breadcrumb_separator', __( '/', 'lawyer-landing-page' ) ) ); // delimiter between crumbs
    $home = esc_html( get_theme_mod( 'breadcrumb_home_text', __( 'Home', 'lawyer-landing-page' ) ) ); // text for the 'Home' link
    $showCurrent = get_theme_mod( 'ed_current', '1' ); // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    
    global $post;
    $homeLink = esc_url( home_url( ) );
    
    if( get_theme_mod( 'ed_breadcrumb' ) ){
        if ( is_front_page() ) {
        
            if ( $showOnHome == 1 ) echo '<div id="crumbs"><a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a></div>';
        
        } else {
        
            echo '<div id="crumbs"><a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
            if ( is_category() ) {
                $thisCat = get_category( get_query_var( 'cat' ), false );
                if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' <span class="separator">' . $delimiter . '</span> ' );
                echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
            
            } elseif( lawyer_landing_page_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
        
                $current_term = $GLOBALS['wp_query']->get_queried_object();
                if( is_product_category() ){
                    $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
            		foreach ( $ancestors as $ancestor ) {
            			$ancestor = get_term( $ancestor, 'product_cat' );    
            			if ( ! is_wp_error( $ancestor ) && $ancestor ) {
            				echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            			}
            		}
                }           
                echo $before . esc_html( $current_term->name ) . $after;
                
            } elseif( lawyer_landing_page_is_woocommerce_activated() && is_shop() ){ //Shop Archive page
                if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
        			return;
        		}
        		$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
        
        		if ( ! $_name ) {
        			$product_post_type = get_post_type_object( 'product' );
        			$_name = $product_post_type->labels->singular_name;
        		}
                echo $before . esc_html( $_name ) . $after;
                
            } elseif ( is_search() ) {
                echo $before . esc_html__( 'Search Results for "', 'lawyer-landing-page' ) . esc_html( get_search_query() ) . esc_html__( '"', 'lawyer-landing-page' ) . $after;
            
            } elseif ( is_day() ) {
                echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'lawyer-landing-page' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'lawyer-landing-page' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo '<a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'lawyer-landing-page' ) ), get_the_time( __( 'm', 'lawyer-landing-page' ) ) ) ) . '">' . esc_html( get_the_time( __( 'F', 'lawyer-landing-page' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo $before . esc_html( get_the_time( __( 'd', 'lawyer-landing-page' ) ) ) . $after;
            
            } elseif ( is_month() ) {
                echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'lawyer-landing-page' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'lawyer-landing-page' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo $before . esc_html( get_the_time( __( 'F', 'lawyer-landing-page' ) ) ) . $after;
            
            } elseif ( is_year() ) {
                echo $before . esc_html( get_the_time( __( 'Y', 'lawyer-landing-page' ) ) ) . $after;
        
            } elseif ( is_single() && !is_attachment() ) {
                
                if( lawyer_landing_page_is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
            		if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
            			$main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
            			$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                        $ancestors = array_reverse( $ancestors );
                		foreach ( $ancestors as $ancestor ) {
                			$ancestor = get_term( $ancestor, 'product_cat' );    
                			if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                				echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                			}
                		}
            			echo ' <a href="' . esc_url( get_term_link( $main_term ) ) . '">' . esc_html( $main_term->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            		}
                    
                    echo $before . esc_html( get_the_title() ) . $after;
                
                } elseif ( get_post_type() != 'post' ) {
                    
                    $post_type = get_post_type_object( get_post_type() );
                    
                    if( $post_type->has_archive == true ){
                       
                        // Add support for a non-standard label of 'archive_title' (special use case).
                       $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                       // Core filter hook.
                       $label = apply_filters( 'post_type_archive_title', $label, $post_type->name );
                       printf( '<a href="%s">%s</a>', esc_url( get_post_type_archive_link( $post_type ) ), $label );
                       echo '<span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
                    }
                    if ( $showCurrent == 1 ){ 
                       
                        echo $before . esc_html( get_the_title() ) . $after;
                    }

                } else {
                    $cat = get_the_category(); 
                    if( $cat ){
                        $cat = $cat[0];
                        $cats = get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                        if ( $showCurrent == 0 ) $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats );
                        echo $cats;
                    }
                    if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
                }
            
            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
                if ( get_query_var('paged') ) {
                    echo '<a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '">' . esc_html( $post_type->label ) . '</a>';
                    if( $showCurrent == 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . sprintf( __('Page %s','lawyer-landing-page'), get_query_var('paged') ) . $after;
                } else {
                    if ( $showCurrent == 1 ) echo $before . esc_html( $post_type->label ) . $after;
                }

            } elseif ( is_attachment() ) {
                $parent = get_post( $post->post_parent );
                $cat = get_the_category( $parent->ID ); 
                if( $cat ){
                    $cat = $cat[0];
                    echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                    echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                if ( $showCurrent == 1 ) echo  $before . esc_html( get_the_title() ) . $after;
            
            } elseif ( is_page() && !$post->post_parent ) {
                if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
        
            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while( $parent_id ){
                    $page = get_post( $parent_id );
                    $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse( $breadcrumbs );
                for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                    echo $breadcrumbs[$i];
                    if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                if ( $showCurrent == 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
            
            } elseif ( is_tag() ) {
                echo $before . esc_html( single_tag_title( '', false ) ) . $after;
            
            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata( $author );
                echo $before . esc_html( $userdata->display_name ) . $after;
            
            } elseif ( is_404() ) {
                echo $before . esc_html__( '404 Error - Page not Found', 'lawyer-landing-page' ) . $after;
            } elseif( is_home() ){
                echo $before;
                single_post_title();
                echo $after;
            }
        
            echo '</div>';
        
        }
    }
}
endif;

if( ! function_exists( 'lawyer_landing_page_pagination' ) ) :
/**
 * Pagination
*/
function lawyer_landing_page_pagination(){
    
    if( is_single() ){
        the_post_navigation();
    }else{
        the_posts_pagination( array(
            'prev_text'          => __( '<', 'lawyer-landing-page' ),
            'next_text'          => __( '>', 'lawyer-landing-page' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lawyer-landing-page' ) . ' </span>',
         ) );
    }
    
}
endif;

/**
 * Return sidebar layouts for pages
*/
function lawyer_landing_page_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'lawyer_landing_page_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'lawyer_landing_page_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

/**
 * Returns Section header
*/
function lawyer_landing_page_get_section_header( $section_title ){
    
    $header_query = new WP_Query( array(             
        'p' => $section_title,
        'post_type' => 'page'
    ));
    
    if( $section_title && $header_query->have_posts() ){ 
        while( $header_query->have_posts() ){ 
            $header_query->the_post(); ?>
    		<header class="header">
    			<?php 
                    the_title( '<h2 class="title">', '</h2>' );
                    if( has_excerpt() ){
                        the_excerpt();
                    }else{
                        the_content();    
                    }                         
                ?>
    		</header>
        <?php   
        }
        wp_reset_postdata();
    }    
}

/**
 * Query Contact Form 7
 */
function lawyer_landing_page_is_cf7_activated() {
	return class_exists( 'WPCF7' ) ? true : false;
}

/**
 * Query WooCommerce activation
 */
function lawyer_landing_page_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}