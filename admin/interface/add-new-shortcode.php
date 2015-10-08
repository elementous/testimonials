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
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
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
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
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
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<?php if ( elm_admin_get_cats_select() ) : ?>
			<tr>
                <th scope="row">
                    <label for="category"><?php _e('Category', 'elm'); ?></label>
                </th>
                <td>
					<?php echo elm_admin_get_cats_select(); ?>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<?php endif; ?>
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
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
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
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
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
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="color"><?php _e('Text Color', 'elm'); ?></label>
                </th>
                <td>
					<div class="elm-ur-color">
						<div id="text_color_picker" class="colorSelector small-text">
							<div></div>
						</div>
							<input class="elm-color small-text elm-typography elm-typography-color" name="text" id="text_color" type="text" value="" />
					</div>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="background_color"><?php _e('Background Color', 'elm'); ?></label>
                </th>
                <td>
					<div class="elm-ur-color">
						<div id="background_color_picker" class="colorSelector small-text">
							<div></div>
						</div>
							<input class="elm-color small-text regular-text" name="background" id="background_color" type="text" value="" />
					</div>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="item_border_radius"><?php _e('Border Radius', 'elm'); ?></label>
                </th>
                <td>
					<select name="item_border_radius" id="item_border_radius">
					<?php
						for( $i = 1; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'">'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="item_padding"><?php _e('Padding', 'elm'); ?></label>
                </th>
                <td>
					<select name="item_padding" id="item_padding">
					<?php
						for( $i = 1; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'">'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			

			<tr>
                <th scope="row">
                    <label for="slide_speed"><?php _e('Slide Speed', 'elm'); ?></label>
                </th>
                <td>
					<input type="text" name="slide_speed" id="slide_speed" class="regular-text" value="" />
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="auto_play"><?php _e('Auto Play', 'elm'); ?></label>
                </th>
                <td>
					<select name="auto_play">
						<?php
						foreach( elm_admin_get_slide_autoplay_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="navigation"><?php _e('Navigation', 'elm'); ?></label>
                </th>
                <td>
					<select name="navigation">
						<?php
						foreach( elm_admin_get_slide_navigation_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="pagination"><?php _e('Pagination', 'elm'); ?></label>
                </th>
                <td>
					<select name="pagination">
						<?php
						foreach( elm_admin_get_pagination_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr>
                <th scope="row">
                    <label for="stop_on_hover"><?php _e('Stop On Hover', 'elm'); ?></label>
                </th>
                <td>
					<select name="stop_on_hover">
						<?php
						foreach( elm_admin_get_stoponhover_options() as $key => $value ) :
							echo '<option value="'. $key .'">'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
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