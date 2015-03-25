<?php
/**
 * Testimonials plugin uninstall
 *
 * Uninstalling Elementous Testimonials deletes options.
 *
 */
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();
	
delete_option( 'elm_testimonials' );
delete_option( 'elm_testimonials_settings' );

// Delete testimonials?
