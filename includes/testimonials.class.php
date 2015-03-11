<?php

if ( ! class_exists( 'MTS_Testimonials' ) ) :

class MTS_Testimonials {

	function __construct() {
		$this->includes();
		
        add_action( 'init', array( $this, 'init' ), 10 );
	}
	
	function init() {
		// Load class instances
		$this->shortcode_generator = new MTS_Testimonials_Shortcode_Generator;
		$this->shortcodes = new MTS_Testimonials_Shortcodes;
		
		$this->create_post_type();
		
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_js_and_css' ) );
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
				
			$settings = mts_testimonials_get_settings();
			$moderate_testimonials = (int) $settings['general']['moderate_testimonials'];
			
			$post_status = ( $moderate_testimonials == true ? 'draft' : 'publish' );
				
			$title = ( !empty ( $args['title'] ) ? $args['title'] : __('Testimonial', 'mts') );
		
			$testimonial_args = array(
				'post_title'    => $title,
				'post_content'  => $args['testimonial'],
				'post_status'   => $post_status,
				'post_type' => 'mts_testimonials',
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
				
			return true;
		}
	}
	
	/**
     * Include classes
     */
    function includes() {
		require( MTS_TESTIMONIALS_INCLUDES_PATH . '/shortcode-generator.class.php' );
		require( MTS_TESTIMONIALS_INCLUDES_PATH . '/shortcodes.class.php' );
	}
	
	/**
     * Create post type
     */
    function create_post_type() {
		register_post_type( 'mts_testimonials', array(
             'labels' => array(
                 'name' => __( 'Testimonials', 'mts' ),
                'singular_name' => __( 'Testimonials', 'mts' ) 
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array(
                 'title', 'editor', 'custom-fields'
            ),
			'menu_icon' => MTS_TESTIMONIALS_URL . '/assets/img/testimonials.png'
        ) );
    }
	
	/**
	* Enqueues JavaScript and CSS files
	*/
	function enqueue_js_and_css() {
		wp_enqueue_style( 'mts-testimonials', MTS_TESTIMONIALS_URL . '/assets/css/testimonial.css' );
		wp_enqueue_style( 'mts-owl-carousel', MTS_TESTIMONIALS_URL . '/assets/css/owl.carousel.css' );
		wp_enqueue_style( 'mts-font-awesome', MTS_TESTIMONIALS_URL . '/assets/css/font-awesome.min.css' );
		
		wp_enqueue_script( 'mts-testimonials', MTS_TESTIMONIALS_URL . '/assets/js/testimonial.js', array( 'jquery' ) );
		wp_enqueue_script( 'mts-carousel', MTS_TESTIMONIALS_URL . '/assets/js/owl.carousel.min.js', array( 'jquery' ) );
	}
	
	// Install plugin
	function install() {
		if ( get_option( 'mts_testimonials' ) != 'installed' ) {
			update_option( 'mts_testimonials', 'installed' );
		}
	}
}

endif;