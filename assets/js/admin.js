jQuery(document).ready(function(){
	elm_testimonials_media_uploader();
	
	elm_testimonials_live_preview();
	
	elm_add_new_shortcode_default();
	
	elm_add_new_shortcode();
	
	if ( jQuery().ColorPicker ) {
 		jQuery( '.elm-ur-color' ).each( function () {
 			var option_id = jQuery( this ).find( '.elm-color' ).attr( 'id' );
			var color = jQuery( this ).find( '.elm-color' ).val();
			var picker_id = option_id += '_picker';

	 		jQuery( '#' + picker_id ).children( 'div' ).css( 'backgroundColor', color );
			jQuery( '#' + picker_id ).ColorPicker({
				
				color: color,
				onShow: function ( colpkr ) {
					jQuery( colpkr ).fadeIn( 200 );
					return false;
				},
				onHide: function ( colpkr ) {
					jQuery( colpkr ).fadeOut( 200 );
					return false;
				},
				onChange: function ( hsb, hex, rgb ) {
					jQuery( '#' + picker_id ).children( 'div' ).css( 'backgroundColor', '#' + hex );
					jQuery( '#' + picker_id ).next( 'input' ).attr( 'value', '#' + hex );
					
				}
			});
 		});
 	}
});

/**
 * Testimonial live preview
*/
function elm_testimonials_live_preview() {
	jQuery('.live-preview').hide();
	
	if ( jQuery('input[name="name"]').val() ) {
	
//	alert(jQuery('input[name="name"]').val());
		jQuery('.elm_testimonial_sc_name').html(jQuery('input[name="name"]').val());
	}

	jQuery('input[name="name"]').keyup(function() {
		var name = jQuery( 'input[name="name"]' ).val();
		
		jQuery('.elm_testimonial_sc_name').html(name);
	});
}

/**
 * Setup testimonial live preview args
*/
function elm_testimonials_shortcode_atts() {
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
function elm_testimonials_media_uploader() {
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

function elm_add_new_shortcode_default() {
	if ( jQuery( 'input[name="edit_shortcode"]' ).val() != 'true' ) {
		jQuery( '.js-slide-speed' ).hide();
		jQuery( '.js-auto-play' ).hide();
		jQuery( '.js-stop-on-hover' ).hide();
	} else {
		var layout = jQuery( 'select[name="layout"]' ).val();
	
		if ( layout == 'simple_grid'  ) {
			jQuery( '.js-slide-speed' ).hide();
			jQuery( '.js-auto-play' ).hide();
			jQuery( '.js-stop-on-hover' ).hide();
		}
	}
	
	if ( jQuery( 'input[name="edit_shortcode"]' ).val() != 'true' ) {
		jQuery( '.add-new-testimonial .js-width td select' ).val('50');
		jQuery( '.add-new-testimonial .js-text-color td input[type="text"]' ).val('#000000');
		jQuery( '.add-new-testimonial .js-background-color td input[type="text"]' ).val('#ededed');
		jQuery( '.add-new-testimonial .js-border-radius td select' ).val('5');
		jQuery( '.add-new-testimonial .js-padding td select' ).val('5');
		jQuery( '.add-new-testimonial .js-slide-speed td input[type="text"]' ).val('4000');
	}
}

function elm_add_new_shortcode() {
	jQuery( 'select[name="layout"]' ).on( 'change', function() {
		if ( jQuery(this).val() == 'simple_grid' ) {
		
			jQuery( '.js-slide-speed' ).hide();
			jQuery( '.js-auto-play' ).hide();
			jQuery( '.js-stop-on-hover' ).hide();
			
		} else if ( jQuery(this).val() == 'multiple_slides' ) {
		
			jQuery( '.js-slide-speed' ).show();
			jQuery( '.js-auto-play' ).show();
			jQuery( '.js-stop-on-hover' ).show();
			
		} else if ( jQuery(this).val() == 'one_slide' ) {
		
			jQuery( '.js-slide-speed' ).show();
			jQuery( '.js-auto-play' ).show();
			jQuery( '.js-stop-on-hover' ).show();
			
		}
	});
}