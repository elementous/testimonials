<?php

/**
 * Get layout options
 *
 * @return array
*/
function elm_admin_get_layout_options() {
	$options = array(
		'simple_grid' => __('Grid', 'elm'),
		'multiple_slides' => __('Slider (Multiple slides)', 'elm'),
		'one_slide' => __('Slider (One slide)', 'elm')
	);
	
	return $options;
}

/**
 * Get author position
 *
 * @return array
*/
function elm_admin_get_author_pos() {
	$options = array(
		'top_left' => __('Top left', 'elm'),
		'top_center' => __('Top center', 'elm'),
		'top_right' => __('Top right', 'elm'),
		'bottom_left' => __('Bottom left', 'elm'),
		'bottom_center' => __('Bottom center', 'elm'),
		'bottom_right' => __('Bottom right', 'elm'),
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

function elm_admin_get_cats_select( $selected_value = '' ) {
	$categories = get_terms( 'testimonials_category', 'orderby=count&hide_empty=0' );
	
	$output = '';
	
	if ( $categories ) {
		$output .= '<select name="category" id="category">';
		foreach( $categories as $k => $category ) {
			$output .= '<option value="'. $category->slug .'" '. selected( $category->term_id, $selected_value, false ) .'>'. $category->name .'</option>';
		}
		$output .= '</select>';
	}
	
	return $output;
}