<?php 

// don't load directly
if ( !defined('ABSPATH') )
	exit;

class Elm_Testimonials_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress
	 */
	function __construct() {
		parent::__construct(
			'elm_testimonials', // Base ID
			__('Testimonials', 'elm'), // Name
			array( 'description' => __( 'Display testimonials.', 'elm' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments
	 * @param array $instance Saved values from database
	 */
	public function widget( $args, $instance ) {
		global $wpdb;
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'Testimonials', 'elm' );
		}
		
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		echo do_shortcode( '[elm_testimonial_sc name="'. $instance['generated_shortcode'] .'"]' );
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database
	 */
	public function form( $instance ) {
		global $elm_testimonials;
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'Testimonials', 'elm' );
		}
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<?php
		$categories = get_terms( 'testimonials_category', 'orderby=count&hide_empty=0' );
		
		if ( $categories ) {
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'shortcode-name' ); ?>"><?php _e( 'Shortcode:' ); ?></label><br />
		<select id="<?php echo $this->get_field_id( 'shortcode-name' ); ?>" name="<?php echo $this->get_field_name( 'generated_shortcode' ); ?>" class="widefat">
		<?php
		
		$shortcodes = $elm_testimonials->shortcode_generator->get_shortcode_list();
			
		if ( !empty( $shortcodes ) ) {
			foreach ( $shortcodes as $real_sc_name => $shortcode ) :
				$selected = ( $instance[ 'generated_shortcode' ] == $real_sc_name ) ? 'selected' : '';
				echo '<option value="'. $real_sc_name .'" '. $selected .'>'. $shortcode['name'] .'</option>';
			endforeach;
		}
		?>
		</select> 
		</p>
		<?php
		}
	}

	/**
	 * Sanitize widget form values as they are saved
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved
	 * @param array $old_instance Previously saved values from database
	 *
	 * @return array Updated safe values to be saved
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['generated_shortcode'] = ( ! empty( $new_instance['generated_shortcode'] ) ) ? strip_tags( $new_instance['generated_shortcode'] ) : '';
		
		
		return $instance;
	}
}

class Elm_Testimonial_Form_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress
	 */
	function __construct() {
		parent::__construct(
			'elm_testimonial_form', // Base ID
			__('Testimonial Form', 'elm'), // Name
			array( 'description' => __( 'Display testimonial form.', 'elm' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments
	 * @param array $instance Saved values from database
	 */
	public function widget( $args, $instance ) {
		global $wpdb;
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'Testimonial Form', 'elm' );
		}
		
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		echo do_shortcode( '[elm_testimonial_form]' );
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database
	 */
	public function form( $instance ) {
		global $elm_testimonials;
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'Testimonial Form', 'elm' );
		}
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php
	}

	/**
	 * Sanitize widget form values as they are saved
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved
	 * @param array $old_instance Previously saved values from database
	 *
	 * @return array Updated safe values to be saved
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}

add_action('widgets_init',
     create_function('', 'return register_widget("Elm_Testimonials_Widget");')
);
add_action('widgets_init',
     create_function('', 'return register_widget("Elm_Testimonial_Form_Widget");')
);