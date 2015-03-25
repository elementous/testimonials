<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $elm_testimonials_admin;

$settings = elm_testimonials_get_settings();
?>
<div class="wrap testimonials">
	<?php 
	$elm_testimonials_admin->messages_html();
	$elm_testimonials_admin->settings_page_tabs_html();
	?>
	<h3><?php _e('Add New Shortcode', 'elm'); ?></h3>
	
	<form action="" method="post">
        <table class="form-table">
			<tr>
                <th scope="row">
                    <label for="name"><?php _e('Name', 'elm'); ?></label>
                </th>
                <td>
					<input type="text" name="name" id="name" class="regular-text" value="" />
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="name"><?php _e('Testimonial ID', 'elm'); ?></label>
                </th>
                <td>
					<input type="text" name="testimonial" id="testimonial" class="regular-text" value="all" />
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="layout"><?php _e('Layout', 'elm'); ?></label>
                </th>
                <td>
					<select name="layout" id="layout">
						<?php
						foreach( elm_admin_get_layout_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="color"><?php _e('Color', 'elm'); ?></label>
                </th>
                <td>
					<input type="text" name="color" id="color" class="regular-text" value="" />
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="show-image"><?php _e('Show Image', 'elm'); ?></label>
                </th>
                <td>
					<select name="show_image" id="show-image">
						<?php
						foreach( elm_admin_get_show_image_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="show-rating"><?php _e('Show Rating', 'elm'); ?></label>
                </th>
                <td>
					<select name="show_rating" id="show-rating">
						<?php
						foreach( elm_admin_get_show_rating_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="category"><?php _e('Category', 'elm'); ?></label>
                </th>
                <td>
					<input type="text" name="category" id="category" class="regular-text" value="" />
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="order-by"><?php _e('Order By', 'elm'); ?></label>
                </th>
                <td>
					<select name="order_by" id="order-by">
						<?php
						foreach( elm_admin_get_order_by_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
                </td>
            </tr>
        </table>
		
		<?php wp_nonce_field( 'elm_add_new_shortcode_page_action', 'elm_add_new_shortcode_page_nonce' ); ?>
		
        <p class="submit">
            <input type="submit" name="elm_add_new_shortcode" id="elm-add-new-shortcode" class="button button-primary" value="<?php _e('Save', 'elm'); ?>" />
        </p>
    </form>
	
	<span class="your-shortcode"><?php _e('Your shortcode', 'elm'); ?></span><br />
	<div id="your-shortcode">
		[elm_testimonial_sc name="<span class="elm_testimonial_sc_name"></span>"]
	</div>
	<br />
	
	<span class="live-preview"><?php _e('Live preview', 'elm'); ?></span><br />
	<div id="shortcode-live-preview"></div>
</div>