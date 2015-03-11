<?php

if ( ! class_exists( 'MTS_Testimonials_Shortcode_Generator' ) ) :

class MTS_Testimonials_Shortcode_Generator {

	function __construct() {
		add_action( 'init', array( $this, 'init' ), 10 );
		
		add_action( 'wp_ajax_mts_testimonial_live_preview', array( $this, 'testimonial_live_preview' ) );
	}
	
	function init() {
	
	}
	
	/**
	 * AJAX Callback
	 *
	 * @return void
     */
	function testimonial_live_preview() {
		check_ajax_referer( 'mts_add_new_shortcode_page_action', 'nonce' );
		
		global $mts_testimonials;
		
		$atts = array();
		$output = '';
		
		// Setup attributes
		$atts['category'] = esc_attr( $_POST['category'] );
		$atts['color'] = esc_attr( $_POST['color'] );
		$atts['layout'] = esc_attr( $_POST['layout'] );
		$atts['order_by'] = esc_attr( $_POST['order_by'] );
		$atts['show_image'] = esc_attr( $_POST['show_image'] );
		$atts['show_rating'] = esc_attr( $_POST['show_rating'] );
		
		// Render preview
		$output .= $mts_testimonials->shortcodes->testimonial_shortcode( $atts );
		
		$response = array(
            'message' => __('OK', 'mts'),
			'output' => $output
        );
		
		echo json_encode( $response );
		
        die;
	}
	
	/**
	 * Add shortcode to the database
	 *
     * @param array $args
     */
	function add_shortcode( $args ) {
		$shortcodes = get_option( 'mts_testimonials_shortcodes' );
	
		// Check if shortcode does not exist
		if ( ! $this->get_shortcode( $args['name'] ) ) {
			$index = strtolower( $args['name'] );
			$shortcodes[$index] = $args;
			
			update_option( 'mts_testimonials_shortcodes', $shortcodes );
		}
	}
	
	/**
	 * Get shortcode from the database
	 *
     * @param string $name
     */
	function get_shortcode( $name ) {
		$shortcodes = get_option( 'mts_testimonials_shortcodes' );
		
		if ( ! is_array( $shortcodes ) )
			$shortcodes = array();
		
		if ( array_key_exists( strtolower( $name ), $shortcodes ) )
			return $shortcodes[$name];
	}
	
	/**
	 * Get shortcodes from the database
	 *
     */
	function get_shortcode_list() {
		$shortcodes = get_option( 'mts_testimonials_shortcodes' );
		
		if ( is_array( $shortcodes ) )
			// Reorder array to get the latest shortcode first
			return array_reverse( $shortcodes );
	}
	
	/**
	 * Delete shortcode from the database
	 *
     * @param string $name
     */
	function delete_shortcode( $name ) {
		$shortcodes = get_option( 'mts_testimonials_shortcodes' );
		
		if ( $this->get_shortcode( $name ) ) {
			unset( $shortcodes[$name] );
			
			update_option( 'mts_testimonials_shortcodes', $shortcodes );
		}
	}
	
	/**
	 * Get add new shortcode URL
	 *
     */
	function get_add_new_shortcode_url() {
		$url = add_query_arg( array( 'page' => 'mts_testimonials_add_new_shortcode' ), admin_url( 'admin.php' ) );

		return $url;
	}
	
	/**
	 * Get shortcode delete URL
	 *
     */
	function get_shortcode_delete_url( $name ) {
		$admin_url = admin_url( 'admin.php' );
		
		$url = wp_nonce_url( add_query_arg( array( 'page' => 'mts_testimonials_shortcodes', 'mts_delete_shortcode' => $name ), $admin_url ), 'mts_delete_shortcode_action' );
		
		return $url;
	}
	
}

endif;