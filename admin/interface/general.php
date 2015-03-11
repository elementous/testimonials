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
	<h3><?php _e('General', 'mts'); ?></h3>
			
    <form action="" method="post">
        <table class="form-table">
			<tr>
                <th scope="row">
                    <label><?php _e('General', 'mts'); ?></label>
                </th>
                <td>
				<input type="checkbox" name="moderate_testimonials" id="moderate-testimonials" value="1" <?php checked( $settings['general']['moderate_testimonials'] ); ?> />
				<label for="moderate-testimonials"><?php _e('Moderate testimonials', 'mts'); ?></label>
			
				<p class="description"><?php _e('When this option is enabled, then the submitted testimonial status will be set to draft, otherwise it will be published directly.', 'mts'); ?></p>
                </td>
            </tr>
        </table>

		<?php wp_nonce_field( 'mts_testimonial_general_page_action', 'mts_testimonial_general_page_nonce' ); ?>
		
        <p class="submit">
            <input type="submit" name="mts_save_general_settings" id="mts-save-general-settings" class="button button-primary" value="<?php _e('Save settings', 'mts'); ?>" />
        </p>
    </form>

</div>