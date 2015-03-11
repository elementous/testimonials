<?php
/**
 * MyThemeShop Testimonials Uninstall
 *
 * Uninstalling MyThemeShop Testimonials deletes options.
 *
 */
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();
	
delete_option( 'mts_testimonials' );
delete_option( 'mts_testimonials_settings' );

// Delete testimonials?
