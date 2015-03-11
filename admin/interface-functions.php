<?php

/**
 * Get layout options
 *
 * @return array
*/
function mts_admin_get_layout_options() {
	$options = array(
		'simple_grid' => __('Simple grid', 'mts')
	);
	
	return $options;
}

/**
 * Get show image options
 *
 * @return array
*/
function mts_admin_get_show_image_options() {
	$options = array(
		1 => __('Yes', 'mts'),
		0 => __('No', 'mts')
	);
	
	return $options;
}

/**
 * Get rating options
 *
 * @return array
*/
function mts_admin_get_show_rating_options() {
	$options = array(
		1 => __('Yes', 'mts'),
		0 => __('No', 'mts')
	);
	
	return $options;
}

/**
 * Get order by options
 *
 * @return array
*/
function mts_admin_get_order_by_options() {
	$options = array(
		'asc' => __('ASC', 'mts'),
		'desc' => __('DESC', 'mts')
	);
	
	return $options;
}