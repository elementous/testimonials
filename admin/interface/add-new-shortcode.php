<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $elm_testimonials_admin;

$settings = elm_testimonials_get_settings();
?>
<div class="wrap testimonials add-new-testimonial">
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
					
					<p class="description"><?php _e('Enter the name for this shortcode', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="show-image"><?php _e('Show image', 'elm'); ?></label>
                </th>
                <td>
					<select name="show_image" id="show-image">
						<?php
						foreach( elm_admin_get_show_image_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Select option to show or hide author image on testimonials.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="show-rating"><?php _e('Show rating', 'elm'); ?></label>
                </th>
                <td>
					<select name="show_rating" id="show-rating">
						<?php
						foreach( elm_admin_get_show_rating_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Select option to show or to hide rating information on testimonials.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="author-position"><?php _e('Author position', 'elm'); ?></label>
                </th>
                <td>
					<select name="author_position" id="author-position">
						<?php
						foreach( elm_admin_get_author_pos() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Select position for author information on testimonials.', 'elm'); ?></p>
                </td>
            </tr>
			<?php if ( elm_admin_get_cats_select() ) : ?>
			<tr>
                <th scope="row">
                    <label for="category"><?php _e('Category', 'elm'); ?></label>
                </th>
                <td>
					<?php echo elm_admin_get_cats_select(); ?>
					
					<p class="description"><?php _e('Select testimonials category to use with this shortcode..', 'elm'); ?></p>
                </td>
            </tr>
			<?php endif; ?>
			<tr>
                <th scope="row">
                    <label for="order-by"><?php _e('Order by', 'elm'); ?></label>
                </th>
                <td>
					<select name="order_by" id="order-by">
						<?php
						foreach( elm_admin_get_order_by_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Sort testimonials by ascending or descending date order.', 'elm'); ?></p>
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
					
					<p class="description"><?php _e('Select layout type to display testimonials.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-width">
                <th scope="row">
                    <label for="item_width"><?php _e('Width', 'elm'); ?></label>
                </th>
                <td>
					<select name="item_width" id="item_width">
					<?php
						for( $i = 10; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'">'. $i .'%</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Select percentage width of testimonial form.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-text-color">
                <th scope="row">
                    <label for="color"><?php _e('Text color', 'elm'); ?></label>
                </th>
                <td>
					<div class="elm-ur-color">
						<div id="text_color_picker" class="colorSelector small-text">
							<div></div>
						</div>
							<input class="elm-color small-text elm-typography elm-typography-color" name="txt_color" id="text_color" type="text" value="" />
					</div>
					
					<p class="description"><?php _e('Select testimonial text color.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-background-color">
                <th scope="row">
                    <label for="background_color"><?php _e('Background color', 'elm'); ?></label>
                </th>
                <td>
					<div class="elm-ur-color">
						<div id="background_color_picker" class="colorSelector small-text">
							<div></div>
						</div>
							<input class="elm-color small-text regular-text" name="bg_color" id="background_color" type="text" value="" />
					</div>
					
					<p class="description"><?php _e('Select testimonial form background color', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="quotebg_color"><?php _e('Quote background color', 'elm'); ?></label>
                </th>
                <td>
					<div class="elm-ur-color">
						<div id="quotebg_color_picker" class="colorSelector small-text">
							<div></div>
						</div>
							<input class="elm-color small-text" name="quotebg_color" id="quotebg_color" type="text" value="" />
					</div>
					
					<p class="description"><?php _e('Select background color for quote section on testimonial form.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-border-radius">
                <th scope="row">
                    <label for="item_border_radius"><?php _e('Border radius', 'elm'); ?></label>
                </th>
                <td>
					<select name="item_border_radius" id="item_border_radius">
					<?php
						for( $i = 1; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'">'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Select border radius value', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-padding">
                <th scope="row">
                    <label for="item_padding"><?php _e('Quote padding', 'elm'); ?></label>
                </th>
                <td>
					<select name="item_padding" id="item_padding">
					<?php
						for( $i = 1; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'">'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Select quote section padding', 'elm'); ?></p>
                </td>
            </tr>

			<tr class="min-height">
				<th scope="row">
					<label for="container_min_height"><?php _e('Container min height', 'elm'); ?></label>
				</th>
				<td>
					<input class="" name="container_min_height" id="container_min_height" type="text" value="" /> px

					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
				</td>
			</tr>
			
			<tr>
                <th scope="row">
                    <label for="container_top_padding"><?php _e('Container top padding', 'elm'); ?></label>
                </th>
                <td>
					<select name="container_top_padding" id="container_top_padding">
					<?php
						for( $i = 0; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'">'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Select testimonial form container top padding', 'elm'); ?></p>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label for="container_bottom_padding"><?php _e('Container bottom padding', 'elm'); ?></label>
                </th>
                <td>
					<select name="container_bottom_padding" id="container_bottom_padding">
					<?php
						for( $i = 0; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'">'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Select testimonial form container bottom padding', 'elm'); ?></p>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label for="container_left_padding"><?php _e('Container left padding', 'elm'); ?></label>
                </th>
                <td>
					<select name="container_left_padding" id="container_left_padding">
					<?php
						for( $i = 0; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'">'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Select testimonial form container left padding', 'elm'); ?></p>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label for="container_right_padding"><?php _e('Container right padding', 'elm'); ?></label>
                </th>
                <td>
					<select name="container_right_padding" id="container_right_padding">
					<?php
						for( $i = 0; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'">'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Select testimonial form container right padding', 'elm'); ?></p>
                </td>
            </tr>
			
			
			<tr class="js-slide-speed">
                <th scope="row">
                    <label for="slide_speed"><?php _e('Slide speed', 'elm'); ?></label>
                </th>
                <td>
					<input type="text" name="slide_speed" id="slide_speed" class="regular-text" value="" />
					
					<p class="description"><?php _e('Set the speed value for slider.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-auto-play">
                <th scope="row">
                    <label for="auto_play"><?php _e('Auto play', 'elm'); ?></label>
                </th>
                <td>
					<select name="auto_play">
						<?php
						foreach( elm_admin_get_slide_autoplay_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Enable or disable slider autoplay function.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-stop-on-hover">
                <th scope="row">
                    <label for="stop_on_hover"><?php _e('Stop on hover', 'elm'); ?></label>
                </th>
                <td>
					<select name="stop_on_hover">
						<?php
						foreach( elm_admin_get_stoponhover_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Stop slide when the mouse cursor is over the slide area.', 'elm'); ?></p>
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
	
</div>
