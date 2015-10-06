<?php

/**
 * Get layout options
 *
 * @return array
*/
function elm_admin_get_layout_options() {
	$options = array(
		'simple_grid' => __('Grid', 'elm'),
		'multiple_testimonials' => __('Slider (Multiple slides)', 'elm'),
		'one_slide' => __('Slider (One slide)', 'elm')
	);
	
	return $options;
}

/**
 * Get show image options
 *
 * @return array
*/
function elm_admin_get_show_image_options() {
	$options = array(
		1 => __('Yes', 'elm'),
		0 => __('No', 'elm')
	);
	
	return $options;
}

/**
 * Get rating options
 *
 * @return array
*/
function elm_admin_get_show_rating_options() {
	$options = array(
		1 => __('Yes', 'elm'),
		0 => __('No', 'elm')
	);
	
	return $options;
}

/**
 * Get order by options
 *
 * @return array
*/
function elm_admin_get_order_by_options() {
	$options = array(
		'asc' => __('ASC', 'elm'),
		'desc' => __('DESC', 'elm')
	);
	
	return $options;
}

function elm_admin_get_slide_autoplay_options() {
	$options = array(
		1 => __('Yes', 'elm'),
		0 => __('No', 'elm')
	);
	
	return $options;
}

function elm_admin_get_slide_navigation_options() {
	$options = array(
		1 => __('Yes', 'elm'),
		0 => __('No', 'elm')
	);
	
	return $options;
}

function elm_admin_get_pagination_options() {
	$options = array(
		1 => __('Yes', 'elm'),
		0 => __('No', 'elm')
	);
	
	return $options;
}

function elm_admin_get_stoponhover_options() {
	$options = array(
		1 => __('Yes', 'elm'),
		0 => __('No', 'elm')
	);
	
	return $options;
}

function elm_admin_get_cats_select() {
	$categories = get_terms( 'testimonials_category', 'orderby=count&hide_empty=0' );
	
	$output = '';
	
	if ( $categories ) {
		$output .= '<select name="category" id="category">';
		foreach( $categories as $k => $category ) {
			$output .= '<option value="'. $category->term_id .'">'. $category->name .'</option>';
		}
		$output .= '</select>';
	}
	
	return $output;
}