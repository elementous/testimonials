<?php

if ( ! class_exists( 'ELM_Testimonials_Admin' ) ) :

class ELM_Testimonials_Admin {

	public $message;

	function __construct() {
		$this->settings = $this->get_settings();
		
		$this->verify_settings();
		
		add_action( 'init', array( $this, 'init' ), 20 );
	}
	
	function init() {
		$this->process_forms();
		$this->process_get();
		
		add_action( 'admin_menu', array( $this, 'menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
		add_action( 'add_meta_boxes', array( $this, 'custom_fields_meta_box' ) );
	}
	
	/*
     * Process settings forms
     */
	function process_forms() {
		global $elm_testimonials;
		
		// Process general settings page form
		if ( isset( $_POST['elm_save_general_settings'] ) && check_admin_referer( 'elm_testimonial_general_page_action', 'elm_testimonial_general_page_nonce' ) ) {
		
			$this->settings['general']['moderate_testimonials'] = intval( @$_POST['moderate_testimonials'] );
			$this->settings['general']['notifications'] = intval( @$_POST['notifications'] );
			$this->settings['general']['rich_snippets'] = intval( @$_POST['rich_snippets'] );
			
			$this->settings['general']['notifications_email'] = esc_attr( @$_POST['notifications_email'] );
			
			$this->save_settings();

			$this->message['update'][] = __( 'Your settings have been saved.', 'elm' );
		}
		
		// Process forms settings page form
		if ( isset( $_POST['elm_save_forms_settings'] ) && check_admin_referer( 'elm_testimonial_forms_page_action', 'elm_testimonial_forms_page_nonce' ) ) {
			// Checkboxes
			// Enable input
			$this->settings['forms']['testimonial_form']['title_field_checkbox'] =  intval( @$_POST['title_field_checkbox'] );
			$this->settings['forms']['testimonial_form']['name_field_checkbox'] =  intval( @$_POST['name_field_checkbox'] );
			$this->settings['forms']['testimonial_form']['title_of_the_person_checkbox'] =  intval( @$_POST['title_of_the_person_checkbox'] );
			$this->settings['forms']['testimonial_form']['link_field_checkbox'] =  intval( @$_POST['link_field_checkbox'] );
			$this->settings['forms']['testimonial_form']['email_field_checkbox'] =  intval( @$_POST['email_field_checkbox'] );
			$this->settings['forms']['testimonial_form']['image_field_checkbox'] =  intval( @$_POST['image_field_checkbox'] );
			$this->settings['forms']['testimonial_form']['rating_field_checkbox'] =  intval( @$_POST['rating_field_checkbox'] );
			$this->settings['forms']['testimonial_form']['testimonial_field_checkbox'] =  intval( @$_POST['testimonial_field_checkbox'] );

			// Labels
			$this->settings['forms']['testimonial_form']['title_field_label'] =  esc_attr( $_POST['title_field_label'] );
			$this->settings['forms']['testimonial_form']['name_field_label'] =  esc_attr( $_POST['name_field_label'] );
			$this->settings['forms']['testimonial_form']['title_of_the_person_field_label'] =  esc_attr( $_POST['title_of_the_person_field_label'] );
			$this->settings['forms']['testimonial_form']['link_field_label'] =  esc_attr( $_POST['link_field_label'] );
			$this->settings['forms']['testimonial_form']['email_field_label'] =  esc_attr( $_POST['email_field_label'] );
			$this->settings['forms']['testimonial_form']['image_field_label'] =  esc_attr( $_POST['image_field_label'] );
			$this->settings['forms']['testimonial_form']['rating_field_label'] =  esc_attr( $_POST['rating_field_label'] );
			$this->settings['forms']['testimonial_form']['testimonial_field_label'] =  esc_attr( $_POST['testimonial_field_label'] );
			$this->settings['forms']['testimonial_form']['submit_label'] =  esc_attr( $_POST['submit_label'] );
	
			// Messages
			$this->settings['forms']['testimonial_form']['success_message'] =  esc_attr( $_POST['success_message'] );
			$this->settings['forms']['testimonial_form']['error_message'] =  esc_attr( $_POST['error_message'] );
			
			$this->save_settings();
			
			$this->message['update'][] = __( 'Your settings have been saved.', 'elm' );
		}
		
		// Note: Check name for different symbols
		
		// Process add new shortcode form
		if ( isset( $_POST['elm_add_new_shortcode'] ) && check_admin_referer( 'elm_add_new_shortcode_page_action', 'elm_add_new_shortcode_page_nonce' ) ) {
			// Validate
			if ( empty( $_POST['name'] ) ) :
				$this->message['error'][] = __( 'You cannot leave the name field empty.', 'elm' );
			elseif ( $elm_testimonials->shortcode_generator->get_shortcode( esc_attr( $_POST['name'] ) ) ) :
				$this->message['error'][] = __( 'The shortcode name already exists in the system. Please choose a different one.', 'elm' );
			endif;
		
			if ( empty( $this->message['error'] ) ) {
				$args = array(
					'name' => esc_attr( $_POST['name'] ),
					'layout' => esc_attr( $_POST['layout'] ),
					'show_image' => intval( $_POST['show_image'] ),
					'show_rating' => intval( $_POST['show_rating'] ),
					'category' => esc_attr( $_POST['category'] ),
					'order_by' => esc_attr( $_POST['order_by'] ),
					'width' => esc_attr( $_POST['item_width'] ),
					'text_color' => esc_attr( $_POST['text'] ),
					'background_color' => esc_attr( $_POST['background'] ),
					'border_radius' => esc_attr( $_POST['item_border_radius'] ),
					'padding' => esc_attr( $_POST['item_padding'] ),
					'slide_speed' => esc_attr( $_POST['slide_speed'] ),
					'auto_play' => esc_attr( $_POST['auto_play'] ),
					'navigation' => esc_attr( $_POST['navigation'] ),
					'pagination' => esc_attr( $_POST['pagination'] ),
					'stop_on_hover' => esc_attr( $_POST['stop_on_hover'] )
				);
				
				// Add shortcode
				$elm_testimonials->shortcode_generator->add_shortcode( $args );
				
				$this->message['update'][] = __( 'Shortcode added.', 'elm' );
			}
		}
	}
	
	/*
     * Process GET requests
     */
	function process_get() {
		global $elm_testimonials;
	
		// Delete shortcode
		if ( isset( $_GET['elm_delete_shortcode'] ) && check_admin_referer( 'elm_delete_shortcode_action' ) ) {
			$shortcode_name = esc_attr( $_GET['elm_delete_shortcode'] );
		
			if ( $elm_testimonials->shortcode_generator->get_shortcode( $shortcode_name ) ) :
				$elm_testimonials->shortcode_generator->delete_shortcode( $shortcode_name );
				
				$this->message['update'][] = __( 'Shortcode permanently deleted.', 'elm' );
			endif;
		}
	}
	
	/**
	 * Updates testimonial meta data
	 *
     * @param integer $post_id
     */
	function save_post( $post_id ) {
		if ( isset( $_POST['title'] ) ) {
			$args['title'] = esc_attr( $_POST['title'] );
			
			update_post_meta( $post_id, 'testimonial_title', $args['title'] );
		}
				
		if ( isset( $_POST['person_name'] ) ) {
			$args['name'] = esc_attr( $_POST['person_name'] );
			
			update_post_meta( $post_id, 'testimonial_name', $args['name'] );
		}
				
		if ( isset( $_POST['title_of_the_person'] ) ) {
			$args['title_of_the_person'] = esc_attr( $_POST['title_of_the_person'] );
			
			update_post_meta( $post_id, 'testimonial_title_of_the_person', $args['title_of_the_person'] );
		}
				
		if ( isset( $_POST['link'] ) ) {
			$args['link'] = esc_url( $_POST['link'] );
			
			update_post_meta( $post_id, 'testimonial_link', $args['link'] );
		}
				
		if ( isset( $_POST['email'] ) ) {
			$args['email'] = esc_attr( $_POST['email'] );
			
			update_post_meta( $post_id, 'testimonial_email', $args['email'] );
		}
			
		if ( isset( $_POST['image'] ) ) {
			$args['image'] = esc_attr( $_POST['image'] );
			
			update_post_meta( $post_id, 'testimonial_image', $args['image'] );
		}
				
		if ( isset( $_POST['rating'] ) ) {
			$args['rating'] = (int) $_POST['rating'];
			
			update_post_meta( $post_id, 'testimonial_rating', $args['rating'] );
		}
	}
	
	/**
     * Adds meta box for testimonial custom fields
     */
	function custom_fields_meta_box() {
		add_meta_box( 'elm_testimonials_metabox', __( 'Testimonial Fields', 'elm' ), array( $this, 'custom_fields_meta_box_callback' ), 'elm_testimonials', 'normal', 'high' );
	}
	
	/**
     * Testimonial Fields meta box callback
     */
	function custom_fields_meta_box_callback() {
		global $post;
		
		$settings = elm_testimonials_get_settings();
		
		// Setup testimonial arguments
		$title = get_post_meta( $post->ID, 'testimonial_title', true );
		$name = get_post_meta( $post->ID, 'testimonial_name', true );
		$title_of_the_person = get_post_meta( $post->ID, 'testimonial_title_of_the_person', true );
		$link = get_post_meta( $post->ID, 'testimonial_link', true );
		$email = get_post_meta( $post->ID, 'testimonial_email', true );			
		$image = get_post_meta( $post->ID, 'testimonial_image', true );
		$rating = get_post_meta( $post->ID, 'testimonial_rating', true );
		
		$output = '<div id="elm-testimonials-cf-meta-box">';
		
		if ( (int) $settings['forms']['testimonial_form']['title_field_checkbox'] ) {
			$output .= "<label for=\"title\">". $settings['forms']['testimonial_form']['title_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"title\" id=\"title\" value=\"". $title ."\"><br />";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['name_field_checkbox'] ) { 
			$output .= "<label for=\"name\">". $settings['forms']['testimonial_form']['name_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"person_name\" id=\"name\" value=\"". $name ."\"><br />";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['title_of_the_person_checkbox'] ) {
			$output .= "<label for=\"title_of_the_person\">". $settings['forms']['testimonial_form']['title_of_the_person_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"title_of_the_person\" id=\"title_of_the_person\" value=\"". $title_of_the_person ."\"><br />";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['link_field_checkbox'] ) {
			$output .= "<label for=\"link\">". $settings['forms']['testimonial_form']['link_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"link\" id=\"link\" value=\"". $link ."\"><br />";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['email_field_checkbox'] ) {
			$output .= "<label for=\"email\">". $settings['forms']['testimonial_form']['email_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"email\" id=\"email\" value=\"". $email ."\"><br />";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['image_field_checkbox'] ) {
			$output .= "<label for=\"image\">". $settings['forms']['testimonial_form']['image_field_label'] ."</label><br />";
			$output .= "<input type=\"text\" name=\"image\" id=\"image\" value=\"" . $image . "\" /> <input type=\"button\" class=\"upload-button\" value=\"" . __('Upload', 'elm') . "\" /><br />";
		}
		
		if ( (int) $settings['forms']['testimonial_form']['rating_field_checkbox'] ) {
			$output .= "<label for=\"rating\">". $settings['forms']['testimonial_form']['rating_field_label'] ."</label><br />";
			$output .= "<select name=\"rating\" id=\"rating\">
				<option value=\"1\" ". selected( 1, $rating, false ) .">1</option>
				<option value=\"2\" ". selected( 2, $rating, false ) .">2</option>
				<option value=\"3\" ". selected( 3, $rating, false ) .">3</option>
				<option value=\"4\" ". selected( 4, $rating, false ) .">4</option>
				<option value=\"5\" ". selected( 5, $rating, false ) .">5</option>
			</select><br />";
		}
		
		$output .= "</div>";
		
		echo $output;
	}
	
	/**
     * Get settings
	 *
     * @param string $saved
     */
    function get_settings( $saved = true ) {
        if ( $saved == true )
            $this->settings = get_option( 'elm_testimonials_settings' );
        
        return $this->settings;
    }
    
    /**
     * Get setting
	 *
     * @param string $param1
     * @param string $param2
     * @param string $param3
     */
    function get_setting( $param1 = '', $param2 = '', $param3 = '' ) {
        $settings = $this->get_settings();
        
        if ( $param1 ) {
            $setting = @$settings[$param1];
        }
        
        if ( $param1 && $param2 ) {
            $setting = @$settings[$param1][$param2];
        }
        
        if ( $param1 && $param2 && $param3 ) {
            $setting = @$settings[$param1][$param2][$param3];
        }
        
        return $setting;
    }
    
    /*
     * Save settings
     */
    function save_settings() {
        $save = update_option( 'elm_testimonials_settings', $this->settings );
		
		return true;
    }
    
    /*
     * Delete settings
     */
    function delete_settings( $array, $array2 = null ) {
        if ( !$array2 ) {
            unset( $this->settings[$array] );
        } else {
            unset( $this->settings[$array][$array2] );
        }
        
        $this->save_settings();
    }
    
    /*
     * Delete settings option
     */
    function delete_settings_option() {
        delete_option( 'elm_testimonials_settings' );
    }
    
    /*
     * Verify settings
     */
    function verify_settings() {
        $update_settings = false;
        
        $default_settings = array(
			'version' => ELM_TESTIMONIALS_VERSION,
             'general' => array(
                 'moderate_testimonials' => 1
                ),
			'forms' => array(
				'testimonial_form' => array(
					 'title_field_checkbox' => 1,
					 'name_field_checkbox' => 1,
					 'title_of_the_person_checkbox' => 1,
					 'link_field_checkbox' => 1,
					 'email_field_checkbox' => 1,
					 'image_field_checkbox' => 1,
					 'rating_field_checkbox' => 1,
					 'title_field_label' => __('Title', 'elm'),
					 'name_field_label' => __('Name', 'elm'),
					 'title_of_the_person_field_label' => __('Title of the person', 'elm'),
					 'link_field_label' => __('Link', 'elm'),
					 'email_field_label' => __('Email', 'elm'),
					 'image_field_label' => __('Image', 'elm'),
					 'rating_field_label' => __('Rating', 'elm'),
					 'testimonial_field_label' => __('Testimonial', 'elm'),
					 'submit_label' => __('Submit', 'elm'),
					 'success_message' => __('Thank you for your feedback!', 'elm'),
					 'error_message' => __('Please fill in all fields', 'elm')
				 )
			)
		);
        
        foreach ( $default_settings as $element_settings => $settings ) {
            if ( is_array( $settings ) ) {
                foreach ( $settings as $element => $value ) {
                    if ( !isset( $this->settings[$element_settings][$element] ) ) {
                        $this->settings[$element_settings][$element] = $value;
                        $update_settings                             = true;
                    }
                }
            } else {
                if ( !isset( $this->settings[$element_settings] ) ) {
                    $this->settings[$element_settings] = $settings;
                    $update_settings                   = true;
                }
            }
            
            if ( $update_settings == true )
                $this->save_settings();
        }
    }
	
	/*
     * Get messages for admin pages
     */
	function get_messages() {
        if ( !empty( $this->message ) ) {
            $messages = '';
            
            if ( !empty( $this->message['update'] ) ) {
                foreach ( $this->message['update'] as $message ) {
                    $messages .= $message . "<br /> \r\n";
                }
                
                $output = '<div class="updated"><p><strong>' . $messages . '</strong></p></div>';
                
                return $output;
            } else if ( !empty( $this->message['error'] ) ) {
                foreach ( $this->message['error'] as $message ) {
                    $messages .= $message . "<br /> \r\n";
                }
                
                $output = '<div class="error"><p><strong>' . $messages . '</strong></p></div>';
                
                return $output;
            }
        }
    }
    
    /*
     * Output messages
     */
    function messages_html() {
        echo $this->get_messages();
    }

	/*
     * Menu
     */
	function menu() {
        add_submenu_page( 'edit.php?post_type=elm_testimonials', __( 'General', 'elm' ), __( 'Settings', 'elm' ), 'manage_options', 'elm_testimonials', array( $this, 'settings_general_content' ), null );
		add_submenu_page( null, __( 'Form', 'elm' ), __( 'Form', 'elm' ), 'manage_options', 'elm_testimonials_forms', array( $this, 'settings_forms_content' ), null );
		add_submenu_page( null, __( 'Display', 'elm' ), __( 'Display', 'elm' ), 'manage_options', 'elm_testimonials_shortcodes', array( $this, 'settings_shortcodes_content' ), null );
		add_submenu_page( null, __( 'Add New Shortcode', 'elm' ), __( 'Add New Shortcode', 'elm' ), 'manage_options', 'elm_testimonials_add_new_shortcode', array( $this, 'settings_add_new_shortcode_content' ), null );
		add_submenu_page( null, __( 'Edit Shortcode', 'elm' ), __( 'Edit Shortcode', 'elm' ), 'manage_options', 'elm_testimonials_edit_shortcode', array( $this, 'settings_edit_shortcode_content' ), null );
		
		
	}
	
	/*
     * General settings page
     */
	function settings_general_content() {
		include( ELM_TESTIMONIALS_ADMIN_PATH . '/interface/general.php' );
	}
	
	/*
     * Forms settings page
     */
	function settings_forms_content() {
		include( ELM_TESTIMONIALS_ADMIN_PATH . '/interface/form.php' );
	}
	
	/*
     * Shortcodes settings page
     */
	function settings_shortcodes_content() {
		include( ELM_TESTIMONIALS_ADMIN_PATH . '/interface/shortcodes.php' );
	}
	
	/*
     * Add new shortcode page
     */
	function settings_add_new_shortcode_content() {
		include( ELM_TESTIMONIALS_ADMIN_PATH . '/interface/add-new-shortcode.php' );
	}
	
	/*
     * Add new shortcode page
     */
	function settings_edit_shortcode_content() {
		include( ELM_TESTIMONIALS_ADMIN_PATH . '/interface/edit-shortcode.php' );
	}
	
	/*
     * Settings tabs HTML
     */
	function settings_page_tabs_html() {
		$general_active  = ( basename( $_GET['page'] ) == 'elm_testimonials' ) ? 'nav-tab-active' : '';
		$forms_active    = ( basename( $_GET['page'] ) == 'elm_testimonials_forms' ) ? 'nav-tab-active' : '';
		$shortcodes_active    = ( basename( $_GET['page'] ) == 'elm_testimonials_shortcodes' || basename( $_GET['page'] ) == 'elm_testimonials_add_new_shortcode' ) ? 'nav-tab-active' : '';
        
        $html = '<h2 class="nav-tab-wrapper" id="elm-settings-tabs">' . "\r\n";
        $html .= '<a class="nav-tab ' . $general_active . '" id="elm-settings-general-tab" href="' . admin_url( 'admin.php?page=elm_testimonials' ) . '">' . __( 'General', 'elm' ) . '</a>' . "\r\n";
        $html .= '<a class="nav-tab ' . $forms_active . '" id="elm-settings-forms-tab" href="' . admin_url( 'admin.php?page=elm_testimonials_forms' ) . '">' . __( 'Form', 'elm' ) . '</a>' . "\r\n";
		$html .= '<a class="nav-tab ' . $shortcodes_active . '" id="elm-settings-display-tab" href="' . admin_url( 'admin.php?page=elm_testimonials_shortcodes' ) . '">' . __( 'Display', 'elm' ) . '</a>' . "\r\n";
        $html .= '</h2>' . "\r\n";
        
        echo $html;
    }
	
	/**
	 * Enqueues scripts for admin
     */
	function enqueue_scripts() {
		global $post, $pagenow;
		
		if ( @get_post_type( $post ) == 'elm_testimonials' || $pagenow == 'admin.php' && isset( $_GET['page'] ) && $_GET['page'] == 'elm_testimonials_shortcodes'  ||
			isset( $_GET['page'] ) && $_GET['page'] == 'elm_testimonials_add_new_shortcode' ) {
			wp_register_style( 'elm_testimonials_css', ELM_TESTIMONIALS_URL . '/assets/css/admin.css', false );
			wp_enqueue_style( 'elm_testimonials_css' );
			
			wp_enqueue_script( 'elm_testimonials', ELM_TESTIMONIALS_URL . '/assets/js/admin.js', array( 'jquery' ) );
		
			if ( @get_post_type( $post ) == 'elm_testimonials' )
				return;
				
			// Enqueue these scripts for live preview and only for the shortcodes page
			wp_enqueue_style( 'elm-testimonials', ELM_TESTIMONIALS_URL . '/assets/css/testimonial.css' );
			wp_enqueue_style( 'elm-owl-carousel', ELM_TESTIMONIALS_URL . '/assets/css/owl.carousel.css' );
			wp_enqueue_style( 'elm-font-awesome', ELM_TESTIMONIALS_URL . '/assets/css/font-awesome.min.css' );
			
			wp_enqueue_script( 'elm-testimonials', ELM_TESTIMONIALS_URL . '/assets/js/testimonial.js', array( 'jquery' ) );
			wp_enqueue_script( 'elm-carousel', ELM_TESTIMONIALS_URL . '/assets/js/owl.carousel.min.js', array( 'jquery' ) );
		}
	}
}

endif;