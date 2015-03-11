<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $mts_testimonials, $mts_testimonials_admin;

$settings = mts_testimonials_get_settings();
?>
<div class="wrap testimonials">
	<?php 
	$mts_testimonials_admin->messages_html();
	$mts_testimonials_admin->settings_page_tabs_html();
	?>
	<h3><?php _e('Shortcodes', 'mts'); ?></h3>
	
	<div id="add-new-shortcode">
		<a href="<?php echo $mts_testimonials->shortcode_generator->get_add_new_shortcode_url(); ?>" class="button button-secondary"><?php _e('Add new shortcode', 'elm'); ?></a>
	</div>
	
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
			$shortcodes = $mts_testimonials->shortcode_generator->get_shortcode_list();
			
			if ( !empty( $shortcodes ) ) {
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
						[mts_testimonial_sc name="<?php echo $shortcode_index; ?>"]
					</td>
					<td>
						<a href="<?php echo $mts_testimonials->shortcode_generator->get_shortcode_delete_url( $shortcode_index ); ?>"><img src="<?php echo MTS_TESTIMONIALS_URL . '/assets/img/delete.png' ; ?>" class="delete-image" alt="" /></a>
					</td>	
				</tr>
				<?php
				endforeach;
			}
			?>
		</tbody>
	</table>

</div>