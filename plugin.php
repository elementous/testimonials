<?php
/*
  Plugin Name: Testimonials Manager
  Plugin URI: https://www.elementous.com
  Description: Easily add testimonials to your site.
  Author: Elementous
  Author URI: https://www.elementous.com
  Version: 1.0
*/

define( 'ELM_TESTIMONIALS_VERSION', '1.0b' );
define( 'ELM_TESTIMONIALS_PATH', dirname( __FILE__ ) );
define( 'ELM_TESTIMONIALS_ADMIN_PATH', ELM_TESTIMONIALS_PATH . '/admin' );
define( 'ELM_TESTIMONIALS_INCLUDES_PATH', ELM_TESTIMONIALS_PATH . '/includes' );
define( 'ELM_TESTIMONIALS_FOLDER', basename( ELM_TESTIMONIALS_PATH ) );
define( 'ELM_TESTIMONIALS_URL', plugins_url() . '/' . ELM_TESTIMONIALS_FOLDER );

require ELM_TESTIMONIALS_ADMIN_PATH . '/admin.php';
	
$elm_testimonials_admin = new ELM_Testimonials_Admin();

require ELM_TESTIMONIALS_INCLUDES_PATH . '/functions.php';
require ELM_TESTIMONIALS_INCLUDES_PATH . '/testimonial-layout.php';
require ELM_TESTIMONIALS_INCLUDES_PATH . '/testimonials.class.php';

$elm_testimonials = new ELM_Testimonials();
$elm_testimonials_shortcodes = new ELM_Testimonials_Shortcodes();

register_activation_hook( __FILE__, array( $elm_testimonials, 'install' ) );