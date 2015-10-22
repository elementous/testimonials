<?php

if ( ! class_exists( 'ELM_Testimonials_Shortcode_Generator' ) ) :

class ELM_Testimonials_Shortcode_Generator {

	function __construct() {
		add_action( 'init', array( $this, 'init' ), 10 );
		
		add_action( 'wp_ajax_elm_testimonial_live_preview', array( $this, 'testimonial_live_preview' ) );
	}
	
	function init() {

	}
	
	/**
	 * AJAX Callback
	 *
	 * @return void
     */
	function testimonial_live_preview() {
		check_ajax_referer( 'elm_add_new_shortcode_page_action', 'nonce' );
		
		global $elm_testimonials;
		
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
		$output .= $elm_testimonials->shortcodes->testimonial_shortcode( $atts );
		
		$response = array(
            'message' => __('OK', 'elm'),
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
		$shortcodes = get_option( 'elm_testimonials_shortcodes' );
	
		// Check if shortcode does not exist
		if ( ! $this->get_shortcode( $args['sc_name'] ) ) {
			$index = strtolower( $args['sc_name'] );
			$shortcodes[$index] = $args;
			
			update_option( 'elm_testimonials_shortcodes', $shortcodes );
		}
	}
	
	/**
	 * Update shortcode
	 *
     * @param array $args
     */
	function update_shortcode( $args ) {
		$shortcodes = get_option( 'elm_testimonials_shortcodes' );
	
		// Check if shortcode does not exist
	//	if ( ! $this->get_shortcode( $args['sc_name'] ) ) {
			//$index = strtolower( $args['sc_name'] );
			if ( $shortcodes[$args['sc_name']] )
				unset( $shortcodes[$args['sc_name']] );
			
			$shortcodes[$args['sc_name']] = $args;
			
			//print_r($shortcodes);
			//exit;
			
			update_option( 'elm_testimonials_shortcodes', $shortcodes );
		//}
	}
	
	/**
	 * Get shortcode from the database
	 *
     * @param string $name
     */
	function get_shortcode( $name ) {
		$shortcodes = get_option( 'elm_testimonials_shortcodes' );
		
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
		$shortcodes = array();
	
		$shortcodes = get_option( 'elm_testimonials_shortcodes' );
		
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
		$shortcodes = get_option( 'elm_testimonials_shortcodes' );
		
		if ( $this->get_shortcode( $name ) ) {
			unset( $shortcodes[$name] );
			
			update_option( 'elm_testimonials_shortcodes', $shortcodes );
		}
	}
	
	/**
	 * Get add new shortcode URL
	 *
     */
	function get_add_new_shortcode_url() {
		$url = add_query_arg( array( 'page' => 'elm_testimonials_add_new_shortcode' ), admin_url( 'admin.php' ) );

		return $url;
	}
	
	/**
	 * Get shortcode edit URL
	 *
     */
	function get_shortcode_edit_url( $name ) {
		$admin_url = admin_url( 'admin.php' );
		
		$url = wp_nonce_url( add_query_arg( array( 'page' => 'elm_testimonials_edit_shortcode', 'elm_edit_shortcode' => $name ), $admin_url ), 'elm_edit_shortcode_action' );
		
		return $url;
	}
	
	/**
	 * Get shortcode delete URL
	 *
     */
	function get_shortcode_delete_url( $name ) {
		$admin_url = admin_url( 'admin.php' );
		
		$url = wp_nonce_url( add_query_arg( array( 'page' => 'elm_testimonials_shortcodes', 'elm_delete_shortcode' => $name ), $admin_url ), 'elm_delete_shortcode_action' );
		
		return $url;
	}
	
}

endif;