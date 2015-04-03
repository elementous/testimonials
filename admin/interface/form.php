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
	<h3><?php _e('Testimonial form', 'elm'); ?></h3>
	
	<form action="" method="post">
		<table class="form-table">
			<tr>
                <th scope="row">
                    <label><?php _e('Title field', 'elm'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="title_field_checkbox" id="title-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['title_field_checkbox'] ); ?> />
					<label for="title-field-checkbox"><?php _e('Enable field', 'elm'); ?></label><br />
					
					<input type="checkbox" name="title_field_required_checkbox" id="title-field-required-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['title_field_required_checkbox'] ); ?> />
					<label for="title-field-required-checkbox"><?php _e('Required', 'elm'); ?></label><br /><br />
					
					
					<label for="title-field-label"><?php _e('Label:', 'elm'); ?>
						<input type="text" name="title_field_label" id="title-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['title_field_label']; ?>" />
					</label>
				
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Name field', 'elm'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="name_field_checkbox" id="name-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['name_field_checkbox'] ); ?> />
					<label for="name-field-checkbox"><?php _e('Enable field', 'elm'); ?></label><br />
					
					<input type="checkbox" name="name_field_required_checkbox" id="name-field-required-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['name_field_required_checkbox'] ); ?> />
					<label for="name-field-required-checkbox"><?php _e('Required', 'elm'); ?></label><br /><br />
					
					<label for="name-field-label"><?php _e('Label:', 'elm'); ?>
						<input type="text" name="name_field_label" id="name-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['name_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Title of the person field', 'elm'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="title_of_the_person_checkbox" id="title-of-the-person-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['title_of_the_person_checkbox'] ); ?> />
					<label for="title-of-the-person-checkbox"><?php _e('Enable field', 'elm'); ?></label><br />
					
					<input type="checkbox" name="title_of_the_person_required_checkbox" id="title-of-the-person-required-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['title_of_the_person_required_checkbox'] ); ?> />
					<label for="title-of-the-person-required-checkbox"><?php _e('Required', 'elm'); ?></label><br /><br />
					
					<label for="title-of-the-person-field-label"><?php _e('Label:', 'elm'); ?>
						<input type="text" name="title_of_the_person_field_label" id="title-of-the-person-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['title_of_the_person_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Link field', 'elm'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="link_field_checkbox" id="link-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['link_field_checkbox'] ); ?> />
					<label for="link-field-checkbox"><?php _e('Enable field', 'elm'); ?></label><br />
					
					<input type="checkbox" name="link_field_required_checkbox" id="link-field-required-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['link_field_required_checkbox'] ); ?> />
					<label for="link-field-required-checkbox"><?php _e('Required', 'elm'); ?></label><br /><br />
					
					<label for="link-field-label"><?php _e('Label:', 'elm'); ?>
						<input type="text" name="link_field_label" id="link-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['link_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Email field', 'elm'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="email_field_checkbox" id="email-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['email_field_checkbox'] ); ?> />
					<label for="email-field-checkbox"><?php _e('Enable field', 'elm'); ?></label><br />
					
					<input type="checkbox" name="email_field_required_checkbox" id="email-field-required-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['email_field_required_checkbox'] ); ?> />
					<label for="email-field-required-checkbox"><?php _e('Required', 'elm'); ?></label><br /><br />
					
					<label for="email-field-label"><?php _e('Label:', 'elm'); ?>
						<input type="text" name="email_field_label" id="email-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['email_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Image field', 'elm'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="image_field_checkbox" id="image-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['image_field_checkbox'] ); ?> />
					<label for="image-field-checkbox"><?php _e('Enable field', 'elm'); ?></label><br />
					
					<input type="checkbox" name="image_field_required_checkbox" id="image-field-required-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['image_field_required_checkbox'] ); ?> />
					<label for="image-field-required-checkbox"><?php _e('Required', 'elm'); ?></label><br /><br />
					
					<label for="image-field-label"><?php _e('Label:', 'elm'); ?>
						<input type="text" name="image_field_label" id="image-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['image_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Rating field', 'elm'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="rating_field_checkbox" id="rating-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['rating_field_checkbox'] ); ?> />
					<label for="rating-field-checkbox"><?php _e('Enable field', 'elm'); ?></label><br />
					
					<input type="checkbox" name="rating_field_required_checkbox" id="rating-field-required-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['rating_field_required_checkbox'] ); ?> />
					<label for="rating-field-required-checkbox"><?php _e('Required', 'elm'); ?></label><br /><br />
					
					<label for="rating-field-label"><?php _e('Label:', 'elm'); ?>
						<input type="text" name="rating_field_label" id="rating-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['rating_field_label']; ?>" />
					</label>
                </td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Testimonial field', 'elm'); ?></label>
                </th>
                <td>
					<input type="checkbox" name="testimonial_field_checkbox" id="testimonial-field-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['testimonial_field_checkbox'] ); ?> />
					<label for="testimonial-field-checkbox"><?php _e('Enable field', 'elm'); ?></label><br />
					
					<input type="checkbox" name="testimonial_field_required_checkbox" id="testimonial-field-required-checkbox" value="1" <?php checked( $settings['forms']['testimonial_form']['testimonial_field_required_checkbox'] ); ?> />
					<label for="testimonial-field-required-checkbox"><?php _e('Required', 'elm'); ?></label><br /><br />
			
					<label for="testimonial-field-label"><?php _e('Label:', 'elm'); ?>
						<input type="text" name="testimonial_field_label" id="testimonial-field-label" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['testimonial_field_label']; ?>" />
					</label>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Success message', 'elm'); ?></label>
                </th>
                <td>
					<input type="text" name="success_message" id="success-message" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['success_message']; ?>" />
				</td>
            </tr>
			
			<tr>
                <th scope="row">
                    <label><?php _e('Error message', 'elm'); ?></label>
                </th>
                <td>
					<input type="text" name="error_message" id="error-message" class="regular-text" value="<?php echo $settings['forms']['testimonial_form']['error_message']; ?>" />
				</td>
            </tr>
        </table>

		<?php wp_nonce_field( 'elm_testimonial_forms_page_action', 'elm_testimonial_forms_page_nonce' ); ?>
		
        <p class="submit">
            <input type="submit" name="elm_save_forms_settings" id="elm-save-forms-settings" class="button button-primary" value="<?php _e('Save settings', 'elm'); ?>" />
        </p>
    </form>
</div>