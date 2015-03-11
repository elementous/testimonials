<?php
/*
  Plugin Name: ELM Testimonials
  Plugin URI: https://www.elementous.com
  Description: Easily add testimonials to your site.
  Author: Elementous
  Author URI: https://www.elementous.com
  Version: 1.0dev
*/

define( 'MTS_TESTIMONIALS_VERSION', '1.0dev' );
define( 'MTS_TESTIMONIALS_PATH', dirname( __FILE__ ) );
define( 'MTS_TESTIMONIALS_ADMIN_PATH', MTS_TESTIMONIALS_PATH . '/admin' );
define( 'MTS_TESTIMONIALS_INCLUDES_PATH', MTS_TESTIMONIALS_PATH . '/includes' );
define( 'MTS_TESTIMONIALS_FOLDER', basename( MTS_TESTIMONIALS_PATH ) );
define( 'MTS_TESTIMONIALS_URL', plugins_url() . '/' . MTS_TESTIMONIALS_FOLDER );

require MTS_TESTIMONIALS_ADMIN_PATH . '/admin.php';
	
$mts_testimonials_admin = new MTS_Testimonials_Admin();

require MTS_TESTIMONIALS_INCLUDES_PATH . '/functions.php';
require MTS_TESTIMONIALS_INCLUDES_PATH . '/testimonial-layout.php';
require MTS_TESTIMONIALS_INCLUDES_PATH . '/testimonials.class.php';

$mts_testimonials = new MTS_Testimonials();
$mts_testimonials_shortcodes = new MTS_Testimonials_Shortcodes();

register_activation_hook( __FILE__, array( $mts_testimonials, 'install' ) );