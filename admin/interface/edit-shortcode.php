<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $elm_testimonials, $elm_testimonials_admin;

$shortcode_name = esc_attr( $_GET['elm_edit_shortcode'] );

$shortcodes = $elm_testimonials->shortcode_generator->get_shortcode_list();

if ( ! $shortcodes[$shortcode_name] )
	return;
	
$shortcode_settings = $shortcodes[$shortcode_name];

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
					<input type="hidden" name="sc_name" id="sc-name" value="<?php echo $shortcode_settings['name']; ?>" />
					<input type="text" name="name" id="name" class="regular-text" value="<?php echo $shortcode_settings['name']; ?>" />
					
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
							echo '<option value="'. $key .'" '. selected( $key, $shortcode_settings['show_image'], false ) .'>'. $value .'</option>';
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
							echo '<option value="'. $key .'" '. selected( $key, $shortcode_settings['show_rating'], false ) .'>'. $value .'</option>';
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
					<?php echo elm_admin_get_cats_select( $shortcode_settings['category'] ); ?>
					
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
							echo '<option value="'. $key .'" '. selected( $key, $shortcode_settings['order_by'], false ) .'>'. $value .'</option>';
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
							echo '<option value="'. $key .'" '. selected( $key, $shortcode_settings['layout'], false ) .'>'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
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
							echo '<option value="'. $i .'" '. selected( $i, $shortcode_settings['width'], false ) .'>'. $i .'%</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-text-color">
                <th scope="row">
                    <label for="color"><?php _e('Text Color', 'elm'); ?></label>
                </th>
                <td>
					<div class="elm-ur-color">
						<div id="text_color_picker" class="colorSelector small-text">
							<div></div>
						</div>
							<input class="elm-color small-text elm-typography elm-typography-color" name="txt_color" id="text_color" type="text" value="<?php echo $shortcode_settings['text_color']; ?>" />
					</div>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-background-color">
                <th scope="row">
                    <label for="background_color"><?php _e('Background Color', 'elm'); ?></label>
                </th>
                <td>
					<div class="elm-ur-color">
						<div id="background_color_picker" class="colorSelector small-text">
							<div></div>
						</div>
							<input class="elm-color small-text regular-text" name="bg_color" id="background_color" type="text" value="<?php echo $shortcode_settings['background_color']; ?>" />
					</div>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-border-radius">
                <th scope="row">
                    <label for="item_border_radius"><?php _e('Border Radius', 'elm'); ?></label>
                </th>
                <td>
					<select name="item_border_radius" id="item_border_radius">
					<?php
						for( $i = 1; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'" '. selected( $i, $shortcode_settings['border_radius'], false ) .'>'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-padding">
                <th scope="row">
                    <label for="item_padding"><?php _e('Padding', 'elm'); ?></label>
                </th>
                <td>
					<select name="item_padding" id="item_padding">
					<?php
						for( $i = 1; $i <= 100; $i++ ) {
							echo '<option value="'. $i .'" '. selected( $i, $shortcode_settings['padding'], false ) .'>'. $i .'px</option>';
						}
					?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			
			
			<tr class="js-slide-speed">
                <th scope="row">
                    <label for="slide_speed"><?php _e('Slide Speed', 'elm'); ?></label>
                </th>
                <td>
					<input type="text" name="slide_speed" id="slide_speed" class="regular-text" value="<?php echo $shortcode_settings['slide_speed']; ?>" />
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-auto-play">
                <th scope="row">
                    <label for="auto_play"><?php _e('Auto Play', 'elm'); ?></label>
                </th>
                <td>
					<select name="auto_play">
						<?php
						foreach( elm_admin_get_slide_autoplay_options() as $key => $value ) :
							echo '<option value="'. $key .'" '. selected( $key, $shortcode_settings['auto_play'], false ) .'>'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>
			<tr class="js-stop-on-hover">
                <th scope="row">
                    <label for="stop_on_hover"><?php _e('Stop On Hover', 'elm'); ?></label>
                </th>
                <td>
					<select name="stop_on_hover">
						<?php
						foreach( elm_admin_get_stoponhover_options() as $key => $value ) :
							echo '<option value="'. $key .'" '. selected( $key, $shortcode_settings['stop_on_hover'], false ) .'>'. $value .'</option>';
						endforeach;
						?>
					</select>
					
					<p class="description"><?php _e('Lorem ipsum dolor sit amet.', 'elm'); ?></p>
                </td>
            </tr>

        </table>
		
		<?php wp_nonce_field( 'elm_update_shortcode_page_action', 'elm_update_shortcode_page_nonce' ); ?>
		
        <p class="submit">
            <input type="submit" name="elm_update_shortcode" id="elm-update-shortcode" class="button button-primary" value="<?php _e('Update', 'elm'); ?>" />
        </p>
    </form>
	
	<span class="your-shortcode"><?php _e('Your shortcode', 'elm'); ?></span><br />
	<div id="your-shortcode">
		[elm_testimonial_sc name="<span class="elm_testimonial_sc_name"></span>"]
	</div>
	<br />
	
	<!--
	<span class="live-preview"><?php _e('Live preview', 'elm'); ?></span><br />
	<div id="shortcode-live-preview"></div>
	-->
</div>