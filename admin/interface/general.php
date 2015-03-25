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
	<h3><?php _e('General', 'elm'); ?></h3>
			
    <form action="" method="post">
        <table class="form-table">
			<tr>
                <th scope="row">
                    <label><?php _e('General', 'elm'); ?></label>
                </th>
                <td>
				<input type="checkbox" name="moderate_testimonials" id="moderate-testimonials" value="1" <?php checked( $settings['general']['moderate_testimonials'] ); ?> />
				<label for="moderate-testimonials"><?php _e('Moderate testimonials', 'elm'); ?></label>
			
				<p class="description"><?php _e('When this option is enabled, then the submitted testimonial status will be set to draft, otherwise it will be published directly.', 'elm'); ?></p>
                </td>
            </tr>
        </table>

		<?php wp_nonce_field( 'elm_testimonial_general_page_action', 'elm_testimonial_general_page_nonce' ); ?>
		
        <p class="submit">
            <input type="submit" name="elm_save_general_settings" id="elm-save-general-settings" class="button button-primary" value="<?php _e('Save settings', 'elm'); ?>" />
        </p>
    </form>

</div>