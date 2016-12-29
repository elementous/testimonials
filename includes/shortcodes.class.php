<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'ELM_Testimonials_Shortcodes' ) ) :

class ELM_Testimonials_Shortcodes extends ELM_Testimonials {

	function __construct() {
		add_action( 'init', array( $this, 'init' ), 20 );
		
		add_shortcode( 'elm_testimonial_form', array( $this, 'testimonial_form' ) );
		add_shortcode( 'elm_testimonial', array( $this, 'testimonial_shortcode' ) );
		add_shortcode( 'elm_testimonial_sc', array( $this, 'generated_shortcode' ) );
	}
	
	function init() {
		static $submit_testimonial;
	
		// Process front-end testimonial form
		if ( isset( $_POST['submit_testimonial'] ) && wp_verify_nonce( $_POST['testimonial_nonce'], 'testimonial_form' ) && $submit_testimonial == null ) {
			global $testimonial_form_messages;
			
			$settings = elm_testimonials_get_settings();
		
			if ( isset( $_POST['title'] ) )
				$args['title'] = sanitize_text_field( $_POST['title'] );
				
			if ( isset( $_POST['person_name'] ) )
				$args['name'] = sanitize_text_field( $_POST['person_name'] );
				
			if ( isset( $_POST['title_of_the_person'] ) )
				$args['title_of_the_person'] = sanitize_text_field( $_POST['title_of_the_person'] );
				
			if ( isset( $_POST['link'] ) ) {
				//if ( !filter_var( $_POST['link'], FILTER_VALIDATE_URL ) ) :
					//$testimonial_form_messages['error'][] = sprintf( __('Invalid %s address', 'elm'), strtolower( $settings['forms']['testimonial_form']['link_field_label'] ) );
				//else :
					$args['link'] = esc_url( $_POST['link'] );
				//endif;
			}
				
			if ( isset( $_POST['email'] ) ) {
				if ( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) :
					$testimonial_form_messages['error'][] = sprintf( __('Invalid %s address', 'elm'), strtolower( $settings['forms']['testimonial_form']['email_field_label'] ) );
				else :
					$args['email'] = sanitize_text_field( $_POST['email'] );
				endif;
			}
				
			if ( isset( $_FILES['image'] ) && !empty ( $_FILES['image']['name'] ) ) {
				// Handle image upload
				if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
				
				$uploadedfile = $_FILES['image'];
				$upload_overrides = array( 'test_form' => false );
				$upload = wp_handle_upload( $uploadedfile, $upload_overrides );
				
				if ( $upload && !empty( $upload['file'] ) ) {
					// Resize image
					$image_editor = wp_get_image_editor( $upload['file'] );
					$image_editor->resize( 75, 75 );
					$saved = $image_editor->save( $upload['file'] );
				
					$args['image'] = $upload['url'];
				}
			}
			
			if ( isset( $_POST['category'] ) && ! empty( $_POST['category'] ) ) {
				$args['category'] = sanitize_text_field( $_POST['category'] );
			}
				
			if ( isset( $_POST['rating'] ) )
				$args['rating'] = (int) $_POST['rating'];
				
			if ( isset( $_POST['testimonial'] ) )
				$args['testimonial'] = sanitize_text_field( $_POST['testimonial'] );
	
			if ( ! @is_array( $testimonial_form_messages['error'] ) ) :
				if ( !empty( $args ) ) :
					$add_testimonial = $this->add_testimonial( $args );
				else :
					$add_testimonial = false;
				endif;
			else :
				$add_testimonial = false;
			endif;
			
			// Display message
			if ( $add_testimonial ) {
				$testimonial_form_messages['success'] = $settings['forms']['testimonial_form']['success_message'];
			} else {
				$testimonial_form_messages['error'][] = $settings['forms']['testimonial_form']['error_message'];
			}
			
			$submit_testimonial = true;
		}
	}
	
	/**
     * Front-end testimonial form shortcode
	 *
     * @param array $atts
     */
	function testimonial_form( $atts ) {
		global $testimonial_form_messages;
		
		$settings = elm_testimonials_get_settings();
	
		$nonce = wp_create_nonce( 'testimonial_form' );
		
		$output = '';
		
		// Display messages
		if ( is_array( $testimonial_form_messages ) ) {
			if ( @$testimonial_form_messages['success'] ) {
				$output .= "<div class=\"elm-success\">". $testimonial_form_messages['success'] ."</div>";
			} else if ( $testimonial_form_messages['error'] ) {
				$output .= "<div class=\"elm-error\">";
				foreach( $testimonial_form_messages['error'] as $k => $message ) {
					$output .= $message . "<br />\r\n";
				}
				$output .= "</div>";
			}
		}
		
		$extracted_atts = shortcode_atts( array(
			'category' => ''
		), $atts );
	
		$output .= '<div class="testimonial-form">';
		$output .= "<form action=\"\" method=\"post\" enctype=\"multipart/form-data\">";
		
		if ( (int) $settings['forms']['testimonial_form']['title_field_checkbox'] ) {
			$output .= "<label for=\"title\">". $settings['forms']['testimonial_form']['title_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"title\" id=\"title\" value=\"\">";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['name_field_checkbox'] ) { 
			$output .= "<label for=\"name\">". $settings['forms']['testimonial_form']['name_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"person_name\" id=\"name\" value=\"\">";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['title_of_the_person_checkbox'] ) {
			$output .= "<label for=\"title_of_the_person\">". $settings['forms']['testimonial_form']['title_of_the_person_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"title_of_the_person\" id=\"title_of_the_person\" value=\"\">";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['link_field_checkbox'] ) {
			$output .= "<label for=\"link\">". $settings['forms']['testimonial_form']['link_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"link\" id=\"link\" value=\"\">";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['email_field_checkbox'] ) {
			$output .= "<label for=\"email\">". $settings['forms']['testimonial_form']['email_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"email\" id=\"email\" value=\"\">";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['image_field_checkbox'] ) {
			$output .= "<label for=\"image\">". $settings['forms']['testimonial_form']['image_field_label'] ."</label><br />";
			$output .= "<input type=\"file\" name=\"image\" id=\"image\"><br />";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['rating_field_checkbox'] ) {
			$output .= "<label for=\"rating\">". $settings['forms']['testimonial_form']['rating_field_label'] ."</label><br />";
			$output .= "<select name=\"rating\" id=\"rating\">
				<option value=\"1\">1</option>
				<option value=\"2\">2</option>
				<option value=\"3\">3</option>
				<option value=\"4\">4</option>
				<option value=\"5\">5</option>
			</select><br />";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['testimonial_field_checkbox'] ) {
			$output .= "<label for=\"testimonial\">". $settings['forms']['testimonial_form']['testimonial_field_label'] ."</label><br />";
			$output .= "<textarea name=\"testimonial\" id=\"testimonial\" rows=\"4\" cols=\"50\"></textarea>";
		}
		
		if ( $extracted_atts['category'] ) {
			$output .= "<input type=\"hidden\" name=\"category\" value=\"". $extracted_atts['category'] ."\" />";
		}
		
		$output .= "<input type=\"hidden\" name=\"testimonial_nonce\" value=\"". $nonce ."\" />";
		$output .= "<br /><br />";
		
		$output .= "<input type=\"submit\" name=\"submit_testimonial\" id=\"submit_testimonial\" value=\"". $settings['forms']['testimonial_form']['submit_label']  . "\" />";
		$output .= "</form>";
		$output .= '</div>';
	
		return $output;
	}
	
	/**
	 * Get generated shortcode and display testimonial
	 *
	 * @param array $atts
	 * @return string
	 */
	function generated_shortcode( $atts ) {
		global $elm_testimonials;
	
		$attribute = shortcode_atts( array(
			'name' => ''
		), $atts );
		
		$shortcodes = array();
		
		$output = '';
		
		$attribute['name'] = strtolower( $attribute['name'] );
	
		if ( !empty( $attribute['name'] ) ) {
			$shortcodes = $elm_testimonials->shortcode_generator->get_shortcode_list();
			
			if ( array_key_exists( $attribute['name'], $shortcodes ) ) {
				$atts = $shortcodes[$attribute['name']];
				
				$output .= $this->testimonial_shortcode( $atts );
			}
		}
		
		return $output;
	}
	
	/**
	 * The main shortcode to display testimonial
	 *
	 * @param array $atts
	 * @return string
	 */
	function testimonial_shortcode( $atts ) {
	/*	$attribute = shortcode_atts( array(
			'testimonial' => 'all',
			'category' => '',
			'order_by' => '',
			'color' => '',
			'layout' => 'simple_grid_2',
			'show_image' => 1,
			'show_rating' => 1
		), $atts );*/
		//else :
			//$testimonial_query = elm_get_testimonial( esc_attr( $atts['testimonial'] ), 'publish', esc_attr( $atts['order_by'] ) );
		//endif;
		
		$output = '';
		$args = array();
		
		$args = array_merge( $atts, $args );
		
		if ( $args['category'] == 'all' )
			$args['category'] = '';
		
		$testimonial_query = elm_get_testimonial( sanitize_text_field( $args['category'] ), sanitize_text_field( $args['order_by'] ) );
		
		// Add slider wrapper for specific layouts
		switch ( $args['layout'] ) {
			case 'one_slide':
			
			$output .= '<div id="owl-one-slide" class="owl-carousel owl-theme testimonial-'. strtolower( str_replace( ' ', '-', $atts['name'] ) ) .'">';

			break;
			
			case 'multiple_slides':
			
			$output .= '<div id="owl-multiple-slides" class="owl-carousel owl-theme testimonial-'. strtolower( str_replace( ' ', '-', $atts['name'] ) ) .'">';
			
			break;
		}
		
		foreach( $testimonial_query as $post ) {
			// Setup testimonial arguments
			$title = get_post_meta( $post->ID, 'testimonial_title', true );
			$name = get_post_meta( $post->ID, 'testimonial_name', true );
			$title_of_the_person = get_post_meta( $post->ID, 'testimonial_title_of_the_person', true );
			$link = get_post_meta( $post->ID, 'testimonial_link', true );
			$email = get_post_meta( $post->ID, 'testimonial_email', true );			
			$image = get_post_meta( $post->ID, 'testimonial_image', true );
			$rating = get_post_meta( $post->ID, 'testimonial_rating', true );
			$testimonial_background = get_post_meta( $post->ID, 'testimonial_color', true );
			$testimonial_content = $post->post_content;
			
			if ( isset ( $title ) )
				$args['title'] =  sanitize_text_field( $title );
			if ( isset ( $name ) )
				$args['name'] =  sanitize_text_field( $name );
			if ( isset ( $title_of_the_person ) )
				$args['title_of_the_person'] =  sanitize_text_field( $title_of_the_person );
			if ( isset ( $link ) )
				$args['link'] =  sanitize_text_field( $link );
			if ( isset ( $email ) )
				$args['email'] =  sanitize_text_field( $email );
			if ( isset ( $image ) )
				$args['image'] =  sanitize_text_field( $image );
			if ( isset ( $rating ) )
				$args['rating'] =  (int) $rating;
			if ( isset ( $testimonial_background ) )
				$args['testimonial_background'] =  sanitize_text_field( $testimonial_background );
			if ( isset ( $testimonial_content ) )
				$args['testimonial'] = sanitize_text_field( $testimonial_content );
			
			$args['id'] = (int) $post->ID;
			
			$output .= elm_get_testimonial_layout( $args );
		}
		
		// Close slider wrapper for specific layouts
		switch ( $args['layout'] ) {
			case 'one_slide':
			
			$output .= '</div>';
			
			$owl_arguments = 'singleItem: true,
				items : 1, 
				itemsDesktop : true,
				itemsDesktopSmall : true,
				itemsTablet: true,
				itemsMobile : true,
				loop: true';
				
			if ( $args['auto_play'] )
				$owl_arguments .= ', autoplay:true';
				
			if ( $args['stop_on_hover'] )
				$owl_arguments .= ', autoplayHoverPause:true';
				
			if ( $args['slide_speed'] )
				$owl_arguments .= ', slideSpeed:' . $args['slide_speed'] . ', autoplayTimeout: '. $args['slide_speed'];
			
			// Slider JavaScript
			$output .= '
			<script type="text/javascript">
				jQuery( document ).ready(function( $ ) {
					jQuery(".testimonial-'. strtolower( str_replace( ' ', '-', $atts['name'] ) ) .'").owlCarousel({
						'. apply_filters( 'elm_owl_arguments', $owl_arguments ) .'
					});
				});
			</script>
			';

			break;
					
			case 'multiple_slides':
			
			$output .= '</div>';
			
			$owl_arguments = 'singleItem: true,
				items : 2, 
				itemsDesktop : true,
				itemsDesktopSmall : true,
				itemsTablet: true,
				itemsMobile : true,
				loop: true';
				
			if ( $args['auto_play'] )
				$owl_arguments .= ', autoplay:true';
				
			if ( $args['stop_on_hover'] )
				$owl_arguments .= ', autoplayHoverPause:true';
				
			if ( $args['slide_speed'] )
				$owl_arguments .= ', slideSpeed:' . $args['slide_speed'] . ', autoplayTimeout: '. $args['slide_speed'];
			
			// Slider JavaScript
			$output .= '
			<script type="text/javascript">
				jQuery( document ).ready(function( $ ) {
					jQuery(".testimonial-'. strtolower( str_replace( ' ', '-', $atts['name'] ) ) .'").owlCarousel({
						'. apply_filters( 'elm_owl_arguments', $owl_arguments ) .'
					});
				});
			</script>
			';
			
			break;
		}
		
		return $output;
	}
}

endif;