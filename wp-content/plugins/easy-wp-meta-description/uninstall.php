<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
handle_site();

if( is_multisite() ){
	
	// wordpress 4.6
	if( function_exists( 'get_sites' ) && class_exists( 'WP_Site_Query' ) ) {
		$sites = get_sites();
		foreach( $sites as $site ){
			switch_to_blog( $site->blog_id );
			handle_site();
		}
	}
	else{
		
		// wordpress < 4.6
		if( function_exists( 'wp_get_sites' ) ) {
			$sites = wp_get_sites();
			foreach ( $sites as $site ) {
				switch_to_blog( $site['blog_id'] );
				handle_site();
			}
		}
	}
}

function handle_site(){
	// drop option
	delete_option( 'easy_wp_meta_description_front' );
	// drop post meta
	delete_post_meta_by_key( '_easy_wp_meta_description' );
	
}
 
 

?>
