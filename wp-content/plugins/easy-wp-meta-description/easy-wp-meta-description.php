<?php
/*
Plugin Name: Easy WP Meta Description
Plugin URI: https://westholm.software/wordpress-plugin/meta-description/
Description: Adds meta description to each post
Version: 1.2.3
Author: Mats Westholm
Author URI: https://westholm.software/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: easy-wp-meta-description
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$Easy_WP_Meta_Description = new Easy_WP_Meta_Description();
$Easy_WP_Meta_Description->run();

class Easy_WP_Meta_Description{

	private $plugin_name;
	private $meta_key;
	private $show_on_front;

	function __construct(){
		$this->plugin_name = 'easy-wp-meta-description';
		$this->meta_key = '_easy_wp_meta_description';

		// tells if a page has been selected as front page
		// possible values 'posts' and 'page'
		$this->show_on_front = get_option( 'show_on_front' );
	}

	function run(){
		if( is_admin() ){
			add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
			add_action( 'add_meta_boxes', array( $this, 'description_meta_box') );
			add_action( 'save_post', array( $this, 'save_description' ) );
			if( $this->show_on_front == 'posts' ){
				add_action( 'admin_init', array( $this, 'setting_page' ) );
			}
		}
		else{
			remove_action( 'wp_head', 'rel_canonical' );
			add_action( 'wp_head', array( $this, 'insert_meta_in_head' ) );
			add_action( 'wp_head', 'rel_canonical' );
		}
	}

	function setting_page(){

		$option_group = 'general';
		$option_name = 'easy_wp_meta_description_front';
		register_setting( $option_group, $option_name );

		$id = 'easy_wp_meta_description_front';
		$title = __( 'Front page meta description', 'easy-wp-meta-description' );
		$callback = array( $this, 'front_descr_input' );
		$page = 'general';
		$section = 'default';
		$args = array( 'label_for' => 'easy_wp_meta_description_front' );
		add_settings_field( $id, $title, $callback, $page, $section, $args );
	}

	function load_plugin_textdomain(){
		load_plugin_textdomain( 'easy-wp-meta-description', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	function insert_meta_in_head(){
		$description = '';
		if( ! is_paged() ){
			if( is_single() or is_page() ){
				global $post;
	//			print "<!-- Easy WP Comments is_single() or is_page() \nID: $post->ID\n-->";
				$description = get_post_meta( $post->ID, $this->meta_key, true );
			}
			elseif( is_tag() or is_category() or is_tax()){
				$remove = array( '<p>', '</p>' );
				$description = trim( str_replace( $remove, '', term_description() ) );
			}
			elseif( is_front_page() ){
				if( $this->show_on_front == 'posts' ){
					if( ! $description = get_option( 'easy_wp_meta_description_front' ) ){
						$description = get_bloginfo( 'description', 'display' );
					}
				}
				else{
					$post_id = get_option( 'page_on_front' );
					$description = get_post_meta( $post_id, $this->meta_key, true );
				}
			}
			elseif( is_home() ){
				$home_id = get_option( 'page_for_posts' );
	//			print "<!-- Easy WP Comments is_home()\nID: $post->ID\n\$home_id: $home_id\n -->";
				$description = get_post_meta( $home_id, $this->meta_key, true );
			}
		}
		if( $description ){
				?>

<!-- Easy WP Meta Description -->
<meta name="description" content="<?php print $description; ?>">
<!-- /Easy WP Meta Description -->

				<?php
		}
	}

	function description_meta_box(){
		$id = 'add_description';
		$title =  'Easy WP Meta Description';
		$callback = array( $this, 'add_description_meta_box' );
		$context = 'normal';
		$priority = 'high';
		$callback_args = '';

		// get custom posttypes
		$args = array( 'public'   => true, '_builtin' => false );
		$output = 'names';
		$operator = 'and';
		$custom_posttypes = get_post_types( $args, $output, $operator );
		$builtin_posttypes = array( 'post', 'page' );
		$screens = array_merge( $builtin_posttypes, $custom_posttypes );
		foreach ( $screens as $screen ) {
			add_meta_box( $id, $title, $callback, $screen, $context,
				 $priority, $callback_args,
				 array( '__block_editor_compatible_meta_box' => false, ) );
		}
	}

	function front_descr_input(){
		$setting = get_option( 'easy_wp_meta_description_front' );
		?>
<input type="text" size="40" name="easy_wp_meta_description_front" id="easy_wp_meta_description_front"
	class="regular-text" value="<?php print $setting ?>">
<p class="description" id="meta-description"><?php
	_e( 'Added by', 'easy-wp-meta-description' ); ?> Easy WP Meta Description. <?php
	_e( 'Character count', 'easy-wp-meta-description' ); ?>: <span id="easy_wp_output"></span></p>
<script>
	jQuery( document ).ready( update_output );
	jQuery( '#easy_wp_meta_description_front' ).on( 'keyup', update_output );
	function update_output( event ){
		var n = jQuery( '#easy_wp_meta_description_front' ).val().length;
		jQuery( '#easy_wp_output' ).text( n );
	}
</script>
		<?php
	}

	function add_description_meta_box(){
		wp_nonce_field( 'add_description_meta_box', 'add_description_meta_box_nonce' );
		$post_id = get_the_ID();
		$value = get_post_meta( $post_id, $this->meta_key, true );?>
<div class="wp-editor-container">
<textarea class="wp-editor-area" id="easy_wp_description" name="add_description" cols="80" rows="5"><?php print $value; ?></textarea>
</div>
<p><?php
		_e( 'Add a meta description to your HTML code', 'easy-wp-meta-description' ); ?>. <?php
		_e( 'Character count', 'easy-wp-meta-description' ); ?>: <span id="easy_wp_output"></span></p>
<script>
	jQuery( document ).ready( update_output );
	jQuery( '#easy_wp_description' ).on( 'keyup', update_output );
	function update_output( event ){
		var n = jQuery( '#easy_wp_description' ).val().length;
		jQuery( '#easy_wp_output' ).text( n );
	}
</script>
		<?php
	}

	function save_description( $post_id ){
		if( ! isset( $_POST['add_description_meta_box_nonce'] ) ){
			return;
		}
		if( ! wp_verify_nonce( $_POST['add_description_meta_box_nonce'], 'add_description_meta_box' ) ){
			return;
		}
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( ! isset( $_POST['add_description'] ) ){
			return;
		}
		$data = sanitize_text_field(	$_POST['add_description'] );
		update_post_meta( $post_id, $this->meta_key, $data );
	}

} // class


?>
