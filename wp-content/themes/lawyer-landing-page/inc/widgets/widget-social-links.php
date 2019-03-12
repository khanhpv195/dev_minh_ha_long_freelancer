<?php
/**
 * Widget Social Links
 *
 * @package Lawyer_Landing_Page
 */

// register Lawyer_Landing_Page_Social_Links widget 
function lawyer_landing_page_register_social_links_widget() {
    register_widget( 'Lawyer_Landing_Page_Social_Links' );
}
add_action( 'widgets_init', 'lawyer_landing_page_register_social_links_widget' );

if( !class_exists( 'Lawyer_Landing_Page_Social_Links' ) ):
 /**
 * Adds Lawyer_Landing_Page_Social_Links widget.
 */
class Lawyer_Landing_Page_Social_Links extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'lawyer_landing_page_social_links', // Base ID
			__( 'RARA: Social Links', 'lawyer-landing-page' ), // Name
			array( 'description' => __( 'A Social Links Widget.', 'lawyer-landing-page' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	   
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        
        echo $args['before_widget'];
        
        if( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
        
        lawyer_landing_page_get_social_links();
            
        echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'lawyer-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
            <small><?php esc_html_e( 'You can change the social links from the customizer in Social Settings options.', 'lawyer-landing-page' ); ?></small>
        </p>
        <?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
        $instance = array();
		
        $instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
        
        return $instance;
                
	}

} // class Lawyer_Landing_Page_Social_Links 

endif;