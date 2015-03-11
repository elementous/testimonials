<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $mts_testimonials_admin;

$settings = mts_testimonials_get_settings();
?>
<div class="wrap testimonials">
	<?php 
	$mts_testimonials_admin->messages_html();
	$mts_testimonials_admin->settings_page_tabs_html();
	?>
	<h3><?php _e('Add New Shortcode', 'mts'); ?></h3>
	
	<form action="" method="post">
        <table class="form-table">
			<tr>
                <th scope="row">
                    <label for="name"><?php _e('Name', 'mts'); ?></label>
                </th>
                <td>
					<input type="text" name="name" id="name" class="regular-text" value="" />
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="name"><?php _e('Testimonial ID', 'mts'); ?></label>
                </th>
                <td>
					<input type="text" name="testimonial" id="testimonial" class="regular-text" value="all" />
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="layout"><?php _e('Layout', 'mts'); ?></label>
                </th>
                <td>
					<select name="layout" id="layout">
						<?php
						foreach( mts_admin_get_layout_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="color"><?php _e('Color', 'mts'); ?></label>
                </th>
                <td>
					<input type="text" name="color" id="color" class="regular-text" value="" />
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="show-image"><?php _e('Show Image', 'mts'); ?></label>
                </th>
                <td>
					<select name="show_image" id="show-image">
						<?php
						foreach( mts_admin_get_show_image_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="show-rating"><?php _e('Show Rating', 'mts'); ?></label>
                </th>
                <td>
					<select name="show_rating" id="show-rating">
						<?php
						foreach( mts_admin_get_show_rating_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="category"><?php _e('Category', 'mts'); ?></label>
                </th>
                <td>
					<input type="text" name="category" id="category" class="regular-text" value="" />
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="order-by"><?php _e('Order By', 'mts'); ?></label>
                </th>
                <td>
					<select name="order_by" id="order-by">
						<?php
						foreach( mts_admin_get_order_by_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
                </td>
            </tr>
        </table>
		
		<?php wp_nonce_field( 'mts_add_new_shortcode_page_action', 'mts_add_new_shortcode_page_nonce' ); ?>
		
        <p class="submit">
            <input type="submit" name="mts_add_new_shortcode" id="mts-add-new-shortcode" class="button button-primary" value="<?php _e('Save', 'elm'); ?>" />
        </p>
    </form>
	
	<span class="your-shortcode"><?php _e('Your shortcode', 'mts'); ?></span><br />
	<div id="your-shortcode">
		[mts_testimonial_sc name="<span class="mts_testimonial_sc_name"></span>"]
	</div>
	<br />
	
	<span class="live-preview"><?php _e('Live preview', 'mts'); ?></span><br />
	<div id="shortcode-live-preview"></div>
</div>