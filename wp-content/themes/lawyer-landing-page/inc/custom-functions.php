<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Lawyer_Landing_Page
 */

if ( ! function_exists( 'lawyer_landing_page_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lawyer_landing_page_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Lawyer Landing Page, use a find and replace
	 * to change 'lawyer-landing-page' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lawyer-landing-page', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

    /** Enable Page Excerpt */
    add_post_type_support( 'page', 'excerpt' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'lawyer-landing-page' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );

    add_theme_support( 'post-formats', array( 'aside', 'status' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lawyer_landing_page_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Custom Image Size
    add_image_size( 'lawyer-landing-page-banner', 1914, 719, true );
    add_image_size( 'lawyer-landing-page-about', 456, 268, true );
    add_image_size( 'lawyer-landing-page-practice', 115, 115, true );
    add_image_size( 'lawyer-landing-page-service', 45, 45, true );
    add_image_size( 'lawyer-landing-page-testimonial', 103, 103, true );
    add_image_size( 'lawyer-landing-page-team', 261, 264, true );
    add_image_size( 'lawyer-landing-page-blog', 361, 250, true );
    add_image_size( 'lawyer-landing-page-with-sidebar', 830, 464, true );
    add_image_size( 'lawyer-landing-page-without-sidebar', 1170, 464, true );    
    add_image_size( 'lawyer-landing-page-featured', 185, 185, true );
    add_image_size( 'lawyer-landing-page-popular', 260, 145, true );
    add_image_size( 'lawyer-landing-page-recent', 78, 78, true );
    
    /** Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );

}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lawyer_landing_page_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lawyer_landing_page_content_width', 830 );
}

/**
* Adjust content_width value according to template.
*
* @return void
*/
function lawyer_landing_page_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = lawyer_landing_page_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1170;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}

}

/**
 * Enqueue scripts and styles.
 */
function lawyer_landing_page_scripts() {
		$args = array(
		  'family' => 'Raleway:400,400italic,600,700,500|Lato',
		);
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/css' . $build . '/font-awesome' . $suffix . '.css' );
	wp_enqueue_style( 'meanmenu', get_template_directory_uri(). '/css' . $build . '/meanmenu' . $suffix . '.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri(). '/css' . $build . '/owl.theme.default' . $suffix . '.css' );
    wp_enqueue_style( 'lawyer-landing-page-google-fonts', add_query_arg( $args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'lawyer-landing-page-style', get_stylesheet_uri(), array(), LAWYER_LANDING_PAGE_THEME_VERSION );
    
    if( lawyer_landing_page_is_woocommerce_activated() )
    wp_enqueue_style( 'lawyer-landing-page-woocommerce-style', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', array(), LAWYER_LANDING_PAGE_THEME_VERSION );
    
    if( is_page_template( 'template-home.php' ) )
    wp_enqueue_script( 'masonry' );
    
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array('jquery'), '2.2.1', true );
    wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/js' . $build . '/jquery.meanmenu' . $suffix . '.js', array('jquery'), '2.0.8', true );
    wp_enqueue_script( 'jquery-nicescroll', get_template_directory_uri() . '/js' . $build . '/jquery.nicescroll' . $suffix . '.js', array('jquery'), '1.6', true );
    wp_enqueue_script( 'lawyer-landing-page-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), LAWYER_LANDING_PAGE_THEME_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
    $array = array(
        'url' => admin_url( 'admin-ajax.php' ),
        'rtl' => is_rtl(),
	);
    
    wp_localize_script( 'lawyer-landing-page-custom', 'llp_data', $array );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lawyer_landing_page_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    
    // Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
		$classes[] = 'custom-background-color';
	}
    
    if( !( is_active_sidebar( 'right-sidebar' ) ) ) {
        $classes[] = 'full-width'; 
    }
    
    if( lawyer_landing_page_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() || 'product' === get_post_type() ) && ! is_active_sidebar( 'shop-sidebar' ) ){
        $classes[] = 'full-width';
    }
    
    if( is_page() ){
        $sidebar_layout = lawyer_landing_page_sidebar_layout();
        if( $sidebar_layout == 'no-sidebar' )
        $classes[] = 'full-width';
    }

    if( is_front_page() && is_page_template( 'template-home.php' ) ){
        $ed_banner = get_theme_mod( 'ed_banner_section' );
        $home_page = get_option( 'page_on_front' );
        if( $ed_banner && has_post_thumbnail( $home_page ) ){
            $classes[] = 'has-banner';    
        }else{
            $classes[] = 'no-banner';
        }
    }else{
        $classes[] = 'no-banner';
    }

	return $classes;
}

/**
 * Flush out the transients used in lawyer_landing_page_categorized_blog.
 */
function lawyer_landing_page_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'lawyer_landing_page_categories' );
}

if ( ! function_exists( 'lawyer_landing_page_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function lawyer_landing_page_excerpt_more() {
	return ' &hellip; ';
}

endif;

if ( ! function_exists( 'lawyer_landing_page_excerpt_length' ) && ! is_admin() ) :
/**
 * Changes the default 55 character in excerpt 
*/
function lawyer_landing_page_excerpt_length( $length ) {
	return is_admin() ? $length : 40;    
}
endif;


if( ! function_exists( 'lawyer_landing_page_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function lawyer_landing_page_change_comment_form_default_fields( $fields ){
    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'lawyer-landing-page' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'lawyer-landing-page' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'lawyer-landing-page' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;
    
}
endif;

if( ! function_exists( 'lawyer_landing_page_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function lawyer_landing_page_change_comment_form_defaults( $defaults ){
    
    // Change the "cancel" to "I would rather not comment" and use a span instead
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'lawyer-landing-page' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    return $defaults;
    
}
endif;

if( ! function_exists( 'lawyer_landing_page_testimonail') ):
/**
 * Ajax Callback for Testiminial content in home page.
*/
function lawyer_landing_page_testimonail(){
    $testimonial_cat = get_theme_mod( 'testimonials_section_cat' );
    $id = $_REQUEST['post_id']; // It goes through esc_sql() in WP_Query
    $qry = new WP_Query( array(    	
    	'post_type'   => 'post',
    	'post_status' => 'publish',
        'p'           => $id,
        'cat'         => $testimonial_cat
    ));
        
    if ( !empty( $id ) && $qry->have_posts() ) : 
        ob_start(); 
        while ( $qry->have_posts() ) : $qry->the_post(); ?>
        <div class="testimonial-holder">
    		<?php the_content(); ?>
	    </div>
        <?php
        endwhile;
        echo ob_get_clean();
    
    endif;
    
    wp_die(); // this is required to terminate immediately and return a proper response
}
endif;
add_action( 'wp_ajax_lawyer_landing_page_testimonial', 'lawyer_landing_page_testimonail' );
add_action( 'wp_ajax_nopriv_lawyer_landing_page_testimonial', 'lawyer_landing_page_testimonail' );

if( ! function_exists( 'lawyer_landing_page_home_section') ):
/**
 * Check if home page section are enable or not.
*/
    function lawyer_landing_page_home_section(){
        $lawyer_landing_page_sections = array( 'banner', 'about', 'practice', 'service', 'testimonial', 'promotional', 'team', 'faq', 'blog' );
        $enable_section = false;
        foreach( $lawyer_landing_page_sections as $section ){ 
            if( get_theme_mod( 'ed_' . $section . '_section' ) == 1 ){
                $enable_section = true;
            }
        }
        return $enable_section;
    }
endif;