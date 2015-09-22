<?php

if ( ! class_exists( 'ELM_Testimonials' ) ) :

class ELM_Testimonials {

	function __construct() {
		$this->includes();
		
        add_action( 'init', array( $this, 'init' ), 10 );
	}
	
	function init() {
		// Load class instances
		$this->shortcode_generator = new ELM_Testimonials_Shortcode_Generator;
		$this->shortcodes = new ELM_Testimonials_Shortcodes;
		
		$this->create_post_type();
		
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_js_and_css' ) );
		add_action( 'elm_add_testimonial', array( $this, 'notify_about_new_testimonial' ), 10, 2 );
		add_action( 'wp_footer', array( $this, 'footer' ) );
	}
	
	function footer() {
	?>
    <script>
        'use strict';

        document.addEventListener('DOMContentLoaded', function () {
            var simple           = document.querySelector('.js_simple');
            var percentage       = document.querySelector('.js_percentage');
            var rewind           = document.querySelector('.js_rewind');
            var rewind_percentage = document.querySelector('.js_rewind_percentage');
            var variableWidth    = document.querySelector('.js_variablewidth');
            var multiSlides      = document.querySelector('.js_multislides');
            var ease             = document.querySelector('.js_ease');
            var events           = document.querySelector('.js_events');

            lory(simple, {
                infinite: 1
            });

            lory(percentage, {
                infinite: 1
            });

            lory(rewind, {
                rewind: true
            });

            lory(rewind_percentage, {
                rewind: true
            });

            lory(variableWidth, {
                rewind: true
            });

            lory(multiSlides, {
                infinite: 4,
                slidesToScroll: 4
            });

            lory(ease, {
                infinite: 4,
                slidesToScroll: 4,
                slideSpeed: 300,
                ease: 'cubic-bezier(0.455, 0.03, 0.515, 0.955)'
            });
			/*
            function handleEvent(e) {
                var newSpan = document.createElement('span');
                var time = new Date();
                time = time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds() + ',' + time.getMilliseconds();
                var newContent = document.createTextNode('[' + time + '] Event dispatched: "' + e.type + '"');
                newSpan.appendChild(newContent);
                e.target.nextElementSibling.appendChild(newSpan);
            }

            events.addEventListener('before.lory.init', handleEvent);
            events.addEventListener('after.lory.init', handleEvent);
            events.addEventListener('before.lory.slide', handleEvent);
            events.addEventListener('after.lory.slide', handleEvent);

            events.addEventListener('on.lory.resize', handleEvent);
            events.addEventListener('on.lory.touchend', handleEvent);
            events.addEventListener('on.lory.touchmove', handleEvent);
            events.addEventListener('on.lory.touchstart', handleEvent);
            events.addEventListener('on.lory.destroy', handleEvent);

            lory(events, {
                infinite: 1
            });*/
        });
    </script>
	
	<?php
	}
	
	/**
	 * Notify about new testimonial
	 *
	 * @param array $args
	 * @return void
	 */
	function notify_about_new_testimonial( $testimonial_id, $args ) {
		global $elm_testimonials_admin;

		$enabled = $elm_testimonials_admin->get_setting( 'general', 'notifications' );
		$recipients = $elm_testimonials_admin->get_setting( 'general', 'notifications_email' );
		
		if ( $enabled && !empty ( $recipients ) ) {
			
			$subject = 'New testimonial';
			
			$body = __('There\'s new testimonial. You can check it here:', 'elm') . ' ' . '<a href="' . get_permalink( $testimonial_id ) . '">' . get_permalink( $testimonial_id )  . '</a>';
			
			wp_mail( $recipients, $subject, $body );
			
		}
	}
	
	/**
	 * Adds testimonial to the database
	 *
	 * @param array $args
	 * @return void
	 */
	function add_testimonial( $args = array() ) {
		if ( !empty ( $args ) ) {
			// Required fields
			if ( empty( $args['testimonial'] ) )
				return;
				
			$settings = elm_testimonials_get_settings();
			$moderate_testimonials = (int) $settings['general']['moderate_testimonials'];
			
			$post_status = ( $moderate_testimonials == true ? 'draft' : 'publish' );
				
			$title = ( !empty ( $args['title'] ) ? $args['title'] : __('Testimonial', 'elm') );
		
			$testimonial_args = array(
				'post_title'    => $title,
				'post_content'  => $args['testimonial'],
				'post_status'   => $post_status,
				'post_type' => 'elm_testimonials',
				'post_author'   => 1
			);

			$testimonial_id = wp_insert_post( $testimonial_args );
			
			if ( isset ( $args['title'] ) )
				add_post_meta( $testimonial_id, 'testimonial_title', $args['title'] );
			if ( isset ( $args['name'] ) )
				add_post_meta( $testimonial_id, 'testimonial_name', $args['name'] );
			if ( isset ( $args['title_of_the_person'] ) )
				add_post_meta( $testimonial_id, 'testimonial_title_of_the_person', $args['title_of_the_person'] );
			if ( isset ( $args['link'] ) )
				add_post_meta( $testimonial_id, 'testimonial_link', $args['link'] );
			if ( isset ( $args['email'] ) )
				add_post_meta( $testimonial_id, 'testimonial_email', $args['email'] );			
			if ( isset ( $args['image'] ) )
				add_post_meta( $testimonial_id, 'testimonial_image', $args['image'] );
			if ( isset ( $args['rating'] ) )
				add_post_meta( $testimonial_id, 'testimonial_rating', $args['rating'] );
			if ( isset( $args['category'] ) ) {
				$cat_id = get_term_by( 'name', $args['category'], 'testimonials_category' );
				$cat_id = $cat_id->term_id; 
				
				if ( $cat_id ) {
					wp_set_post_terms( $testimonial_id, array( $cat_id ), 'testimonials_category' );
				}
			}
			
			do_action( 'elm_add_testimonial', $testimonial_id, $args );
				
			return true;
		}
	}
	
	/**
     * Include classes
     */
    function includes() {
		require( ELM_TESTIMONIALS_INCLUDES_PATH . '/shortcode-generator.class.php' );
		require( ELM_TESTIMONIALS_INCLUDES_PATH . '/shortcodes.class.php' );
	}
	
	/**
     * Create post type
     */
    function create_post_type() {
		register_post_type( 'elm_testimonials', array(
             'labels' => array(
                 'name' => __( 'Testimonials', 'elm' ),
                'singular_name' => __( 'Testimonials', 'elm' ) 
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array(
                 'title', 'editor', 'custom-fields'
            ) 
        ) );
		
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Categories' ),
			'all_items'         => __( 'All Categories' ),
			'parent_item'       => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category:' ),
			'edit_item'         => __( 'Edit Category' ),
			'update_item'       => __( 'Update Category' ),
			'add_new_item'      => __( 'Add New Category' ),
			'new_item_name'     => __( 'New Genre Category' ),
			'menu_name'         => __( 'Categories' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'testimonials_category' ),
		);

		register_taxonomy( 'testimonials_category', array( 'elm_testimonials' ), $args );
    }
	
	/**
	* Enqueues JavaScript and CSS files
	*/
	function enqueue_js_and_css() {
		wp_enqueue_style( 'elm-testimonials', ELM_TESTIMONIALS_URL . '/assets/css/testimonial.css' );
		//wp_enqueue_style( 'elm-owl-carousel', ELM_TESTIMONIALS_URL . '/assets/css/owl.carousel.css' );
		wp_enqueue_style( 'elm-font-awesome', ELM_TESTIMONIALS_URL . '/assets/css/font-awesome.min.css' );
		
		wp_enqueue_script( 'elm-testimonials', ELM_TESTIMONIALS_URL . '/assets/js/testimonial.js', array( 'jquery' ) );
		wp_enqueue_script( 'elm-lory', ELM_TESTIMONIALS_URL . '/assets/js/lory.min.js', array( 'jquery' ) );
	}
	
	// Install plugin
	function install() {
		if ( get_option( 'elm_testimonials' ) != 'installed' ) {
			update_option( 'elm_testimonials', 'installed' );
		}
	}
}

endif;