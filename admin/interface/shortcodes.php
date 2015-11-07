<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $elm_testimonials, $elm_testimonials_admin;

$settings = elm_testimonials_get_settings();
?>
<div class="wrap testimonials">
	<?php 
	$elm_testimonials_admin->settings_page_tabs_html();
	?>
	<h3><?php _e('Shortcodes', 'elm'); ?></h3>
	
	<div id="add-new-shortcode">
		<a href="<?php echo $elm_testimonials->shortcode_generator->get_add_new_shortcode_url(); ?>" class="button button-secondary"><?php _e('Add new shortcode', 'elm'); ?></a>
	</div>
	
	<?php
	$elm_testimonials_admin->messages_html();
	
	$shortcodes = $elm_testimonials->shortcode_generator->get_shortcode_list();
			
	if ( !empty( $shortcodes ) ) {
	?>
	<table class="wp-list-table widefat fixed">
		<thead>
			<tr>
				<th scope="col">
					<span><?php _e('Shortcode name', 'elm'); ?></span>
				</th>
				<th scope="col">
					<span><?php _e('Shortcode', 'elm'); ?></span>
				</th>
				<th scope="col" class="width-40">
					<!-- -->
				</th>
			</tr>
		</thead>
			
		<tfoot>
			<tr>
				<th scope="col">
					<span><?php _e('Shortcode name', 'elm'); ?></span>
				</th>
				<th scope="col">
					<span><?php _e('Shortcode', 'elm'); ?></span>
				</th>
				<th scope="col" class="width-40">
					<!-- -->
				</th>
			</tr>
		</tfoot>
			
		<tbody>
		<?php
				$count = 0;
				foreach ( $shortcodes as $shortcode_index => $shortcode ) :
					$count++;
				
					$tr_class = ( $count % 2 == 1 ) ? 'alternate' : '';
				?>
				<tr class="<?php echo $tr_class; ?>">
					<td>
						<?php echo $shortcode['name']; ?>
					</td>
					<td>
						[elm_testimonial_sc name="<?php echo $shortcode['name']; ?>"]
					</td>
					<td>
						<a href="<?php echo $elm_testimonials->shortcode_generator->get_shortcode_edit_url( $shortcode_index ); ?>">Edit</a> 
						<a href="<?php echo $elm_testimonials->shortcode_generator->get_shortcode_delete_url( $shortcode_index ); ?>"><?php _e('Delete', 'elm'); ?></a>
					</td>	
				</tr>
				<?php
				endforeach;
		?>
		</tbody>
	</table>
	<?php
	} else {
	?>
		<p><?php _e('No shortcodes. You can add new.', 'elm'); ?></p>
	<?php
	}
	?>
</div>