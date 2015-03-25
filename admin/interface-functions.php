<?php

/**
 * Get layout options
 *
 * @return array
*/
function elm_admin_get_layout_options() {
	$options = array(
		'simple_grid' => __('Simple grid', 'elm')
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