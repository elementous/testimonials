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
	<h3><?php _e('Testimonial form', 'mts'); ?></h3>
	
	<form action="" method="post">
		<table class="form-table">
			<tr>
                <th scope="row">
                    <label><?php _e('Title field', 'mts'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="title_field_checkbox" id="title-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['title_field_checkbox'] ); ?> />
					<label for="title-field-checkbox"><?php _e('Required', 'mts'); ?></label><br /><br />
					<label for="title-field-label"><?php _e('Label:', 'mts'); ?>
						<input type="text" name="title_field_label" id="title-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['title_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Name field', 'mts'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="name_field_checkbox" id="name-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['name_field_checkbox'] ); ?> />
					<label for="name-field-checkbox"><?php _e('Required', 'mts'); ?></label><br /><br />
					<label for="name-field-label"><?php _e('Label:', 'mts'); ?>
						<input type="text" name="name_field_label" id="name-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['name_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Title of the person field', 'mts'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="title_of_the_person_checkbox" id="title-of-the-person-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['title_of_the_person_checkbox'] ); ?> />
					<label for="title-of-the-person-checkbox"><?php _e('Required', 'mts'); ?></label><br /><br />
					<label for="title-of-the-person-field-label"><?php _e('Label:', 'mts'); ?>
						<input type="text" name="title_of_the_person_field_label" id="title-of-the-person-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['title_of_the_person_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Link field', 'mts'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="link_field_checkbox" id="link-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['link_field_checkbox'] ); ?> />
					<label for="link-field-checkbox"><?php _e('Required', 'mts'); ?></label><br /><br />
					<label for="link-field-label"><?php _e('Label:', 'mts'); ?>
						<input type="text" name="link_field_label" id="link-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['link_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Email field', 'mts'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="email_field_checkbox" id="email-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['email_field_checkbox'] ); ?> />
					<label for="email-field-checkbox"><?php _e('Required', 'mts'); ?></label><br /><br />
					<label for="email-field-label"><?php _e('Label:', 'mts'); ?>
						<input type="text" name="email_field_label" id="email-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['email_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Image field', 'mts'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="image_field_checkbox" id="image-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['image_field_checkbox'] ); ?> />
					<label for="image-field-checkbox"><?php _e('Required', 'mts'); ?></label><br /><br />
					<label for="image-field-label"><?php _e('Label:', 'mts'); ?>
						<input type="text" name="image_field_label" id="image-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['image_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Rating field', 'mts'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="rating_field_checkbox" id="rating-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['rating_field_checkbox'] ); ?> />
					<label for="rating-field-checkbox"><?php _e('Required', 'mts'); ?></label><br /><br />
					<label for="rating-field-label"><?php _e('Label:', 'mts'); ?>
						<input type="text" name="rating_field_label" id="rating-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['rating_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Testimonial field', 'mts'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="testimonial_field_checkbox" id="testimonial-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['testimonial_field_checkbox'] ); ?> />
					<label for="testimonial-field-checkbox"><?php _e('Required', 'mts'); ?></label><br /><br />
					<label for="testimonial-field-label"><?php _e('Label:', 'mts'); ?>
						<input type="text" name="testimonial_field_label" id="testimonial-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['testimonial_field_label']; ?>" />
					</label>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Success message', 'mts'); ?></label>
                </th>
                <td>
					<input type="text" name="success_message" id="success-message" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['success_message']; ?>" />
				</td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Error message', 'mts'); ?></label>
                </th>
                <td>
					<input type="text" name="error_message" id="error-message" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['error_message']; ?>" />
				</td>
            </tr>
        </table>

		<?php wp_nonce_field( 'mts_testimonial_forms_page_action', 'mts_testimonial_forms_page_nonce' ); ?>
		
        <p class="submit">
            <input type="submit" name="mts_save_forms_settings" id="mts-save-forms-settings" class="button button-primary" value="<?php _e('Save settings', 'mts'); ?>" />
        </p>
    </form>
</div>