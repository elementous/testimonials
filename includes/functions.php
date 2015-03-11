<?php

/**
  * Get settings
  *
  * @return array
*/
function mts_testimonials_get_settings() {
	global $mts_testimonials_admin;

	$settings = $mts_testimonials_admin->get_settings( true );
	
	return $settings;
}

/**
  * Display rating stars
  *
  * @param integer $rating
  * @return void
*/
function mts_testimonials_get_rating_html( $rating ) {
	$output = '';

	for ( $i = 1; $i <= $rating; $i++ ) {
		$output .= '<i class="fa fa-star"></i>';
	}
	
	return $output;
}

/**
  * Get testimonials from the database
  *
  * @param string $id testimonial id
  * @param integer $status testimonial post status
  * @param integer $order_by order by
  * @return void
*/
function mts_get_testimonial( $id, $status, $order_by = 'DESC' ) {
	global $wpdb;
	
	if ( $id != 'all' ) :
		$rows = $wpdb->get_results( "SELECT * FROM {$wpdb->posts} WHERE ID = {$id} AND post_type = 'mts_testimonials' AND post_status = '{$status}' ORDER By post_date {$order_by}" );
	else :
		$rows = $wpdb->get_results( "SELECT * FROM {$wpdb->posts} WHERE post_type = 'mts_testimonials' AND post_status = '{$status}' ORDER By post_date {$order_by}" );
	endif;
	
	return $rows;
}