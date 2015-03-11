/**
 * Testimonials back-end script
 * This file contains functions such as testimonial photo upload and shortcode live preview.
 *
 * Author: Elementous
*/
jQuery(document).ready(function(){
	mts_testimonials_media_uploader();
	
	mts_testimonials_live_preview();
});

/**
 * Testimonial live preview
*/
function mts_testimonials_live_preview() {
	jQuery('.live-preview').hide();

	jQuery('input[name="name"]').keyup(function() {
		var name = jQuery( 'input[name="name"]' ).val();
		
		jQuery('.mts_testimonial_sc_name').html(name);
	});
	
	// Handle selects
	jQuery('select[name="layout"], select[name="show_image"], select[name="show_rating"], select[name="order_by"]').change(function() {
		jQuery('.live-preview').show();
		
		var nonce = jQuery( 'input[name="mts_add_new_shortcode_page_nonce"]' ).val();
		var live_preview_div = jQuery( '#shortcode-live-preview' );
		
		// Display AJAX loader
		live_preview_div.html('<div class="mts-loading"></div>');
		
		 var data = {
				action: 'mts_testimonial_live_preview',
				nonce: nonce
		};
	
		var shortcode_atts = mts_testimonials_shortcode_atts();
		var atts = jQuery.extend({}, shortcode_atts);
		
		var merged_data = jQuery.extend(data, atts);
			
		jQuery.post(ajaxurl, merged_data, function(response) {
			live_preview_div.html(response.output);
		}, "json");
	});
	
	// Handle inputs
	jQuery('input[name="color"], input[name="category"]').keyup(function() {
		jQuery('.live-preview').show();
		
		var nonce = jQuery( 'input[name="mts_add_new_shortcode_page_nonce"]' ).val();
		var live_preview_div = jQuery( '#shortcode-live-preview' );
		
		// Display AJAX loader
		live_preview_div.html('<div class="mts-loading"></div>');
		
		 var data = {
				action: 'mts_testimonial_live_preview',
				nonce: nonce
		};
	
		var shortcode_atts = mts_testimonials_shortcode_atts();
		var atts = jQuery.extend({}, shortcode_atts);
		
		var merged_data = jQuery.extend(data, atts);
			
		jQuery.post(ajaxurl, merged_data, function(response) {
			live_preview_div.html(response.output);
		}, "json");
	});
}

/**
 * Setup testimonial live preview args
*/
function mts_testimonials_shortcode_atts() {
	var atts = [];

	var color = jQuery( 'input[name="color"]' ).val();
	var category = jQuery( 'input[name="category"]' ).val();

	var layout = jQuery( 'select[name="layout"]' ).val();
	var show_image = jQuery( 'select[name="show_image"]' ).val();
	var show_rating = jQuery( 'select[name="show_rating"]' ).val();
	var order_by = jQuery( 'select[name="order_by"]' ).val();
	
	atts['color'] = color;
	atts['category'] = category;
	atts['layout'] = layout;
	atts['show_image'] = show_image;
	atts['show_rating'] = show_rating;
	atts['order_by'] = order_by;
	
	return atts;
}

/**
 * Testimonial photo upload
*/
function mts_testimonials_media_uploader() {
	var uploadID = '';

	jQuery('.upload-button').click(function() {
		uploadID = jQuery(this).prev('input');
		formfield = jQuery('.upload').attr('name');
		tb_show('', 'media-upload.php?type=file&tab=libraryTB_iframe=true');
		
		return false;
	});

	window.send_to_editor = function(html) {
		imgurl = jQuery(html).attr('href');
		uploadID.val(imgurl); 
		tb_remove();
	}
}