<?php

/**
  * Get settings
  *
  * @return array
*/
function elm_testimonials_get_settings() {
	global $elm_testimonials_admin;

	$settings = $elm_testimonials_admin->get_settings( true );
	
	return $settings;
}

/**
  * Display rating stars
  *
  * @param integer $rating
  * @return void
*/
function elm_testimonials_get_rating_html( $rating ) {
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
function elm_get_testimonial( $category = '', $order_by = 'DESC' ) {

	$arguments = array(
		'post_type' => 'elm_testimonials',
		'order' => $order_by,
		'orderby' => 'date',
	);

	if ( !empty( $category ) )
		$arguments['tax_query'] = array(
			array(
				'taxonomy' => 'testimonials_category',
				'field'    => 'slug',
				'terms'    => $category
			)
		);

	$testimonials = new WP_Query( $arguments );
	
	return $testimonials->posts;
}