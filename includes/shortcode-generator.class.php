<?php

if ( ! class_exists( 'ELM_Testimonials_Shortcode_Generator' ) ) :

class ELM_Testimonials_Shortcode_Generator {

	function __construct() {
		add_action( 'init', array( $this, 'init' ), 10 );
	}
	
	function init() {

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
			
			return $shortcodes[$index];
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
			//if ( $shortcodes[$args['sc_name']] )
				//unset( $shortcodes[$args['sc_name']] );
			
			$shortcodes[$args['sc_name']] = $args;
			
			update_option( 'elm_testimonials_shortcodes', $shortcodes );
			
			//$updt = get_option( 'elm_testimonials_shortcodes' );
			
			//print_r( $updt );
			//exit;
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