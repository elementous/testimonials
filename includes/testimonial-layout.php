<?php

/**
  * Get testimonial layout
  *
  * @param array $args
  * @return string
*/
function elm_get_testimonial_layout( $args ) {

	$style = '';
	$inline_css = '';
	$style_container = '';
	$inline_container_css = '';
	$inline_author_css = '';
		
	if ( !empty( $args['width'] ) ) {
		$inline_container_css .= 'width: '. $args['width'] . '%;';
	}
		
	if ( !empty( $args['text_color'] ) )
		$inline_css .= 'color: '. $args['text_color'] . ';';	
			
	if ( !empty( $args['border_radius'] ) )
		$inline_css .= 'border-radius: '. $args['border_radius'] . 'px;';	
			
	if ( !empty( $args['padding'] ) )
		$inline_css .= 'padding: '. $args['padding'] . 'px;';
		
	if ( !empty( $args['quote_background_color'] ) )
		$inline_css .= 'background: '. $args['quote_background_color'] . ';';	
			
	if ( !empty( $inline_css ) )
		$style .= 'style="' . $inline_css . '"';
		
	if ( !empty( $args['testimonial_background'] ) ) {
		$inline_container_css .= 'background: '. $args['testimonial_background'] . ';';	
		
	} else {
		if ( !empty( $args['background_color'] ) )
			$inline_container_css .= 'background: '. $args['background_color'] . ';';	
	}
		
	if ( !empty( $args['container_top_padding'] ) )
		$inline_container_css .= 'padding-top: '. $args['container_top_padding'] . 'px;';	
		
	if ( !empty( $args['container_bottom_padding'] ) )
		$inline_container_css .= 'padding-bottom: '. $args['container_bottom_padding'] . 'px;';	
		
	if ( !empty( $args['container_left_padding'] ) )
		$inline_container_css .= 'padding-left: '. $args['container_left_padding'] . 'px;';	
		
	if ( !empty( $args['container_right_padding'] ) )
		$inline_container_css .= 'padding-right: '. $args['container_right_padding'] . 'px;';	
		
	if ( !empty( $inline_container_css ) )
		$style_container .= 'style="' . $inline_container_css . '"';
		
		
	if ( $args['author_position'] == 'top_left' || $args['author_position'] == 'bottom_left' ) {
		$author_pos_inline = 'width: 130px; float: left;';
	} else if ( $args['author_position'] == 'top_center' || $args['author_position'] == 'bottom_center' ) {
		$author_pos_inline = 'width: 130px; margin: 0 auto; display: block;';
	} else if ( $args['author_position'] == 'top_right' || $args['author_position'] == 'bottom_right' ) {
		$author_pos_inline = 'width: 130px; float: right;';
	}
	
	switch ( $args['layout'] ) {
	
	case 'simple_grid':

		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 testimonial-'. $args['id'] .'" '. $style_container .'>';
		
		if ( isset( $args['testimonial'] ) ) {
		
		if ( $args['author_position'] == 'top_left' || $args['author_position'] == 'top_center' || $args['author_position'] == 'top_right' ) {
				$output .= '<div class="author_wrap" style="'. $author_pos_inline . '">';
					
						if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
							if ( isset( $args['image'] ) ) {
								$output .= '<div class="author_img">';
								$output .= '<div class="round">';
									$output .= '<img src="'. $args['image'] .'" style="border-radius: 0%;" itemprop="photo" alt="">';
								$output .= '</div>';
								$output .= '</div>';
							}
						}
						
					if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
						$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';
				
					if ( isset( $args['name'] ) )
						$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
					
					if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
						if ( isset( $args['rating'] ) ) {
							$output .= '<div class="rating">
							<span class="value-title" title="'. $args['rating'] .'"></span> 
							'. elm_testimonials_get_rating_html( $args['rating'] ) .'
							</div>';
						}
					}
									
			$output .= '</div>';
		}
		
		// Testimonial text
			$output .= '<p class="quotes" '. $style .'>'. $args['testimonial'] .'</p>';
			
		if ( $args['author_position'] == 'bottom_left' || $args['author_position'] == 'bottom_center' || $args['author_position'] == 'bottom_right' ) {
				$output .= '<div class="author_wrap" style="'. $author_pos_inline .'">';
					
						if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
							if ( isset( $args['image'] ) ) {
								$output .= '<div class="author_img">';
								$output .= '<div class="round">';
									$output .= '<img src="'. $args['image'] .'" style="border-radius: 0%;" itemprop="photo" alt="">';
								$output .= '</div>';
								$output .= '</div>';
							}
						}
						
				
					if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
						$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';
				
					if ( isset( $args['name'] ) )
						$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
					
					if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
						if ( isset( $args['rating'] ) ) {
							$output .= '<div class="rating">
							<span class="value-title" title="'. $args['rating'] .'"></span> 
							'. elm_testimonials_get_rating_html( $args['rating'] ) .'
							</div>';
						}
					}
									
			$output .= '</div>';
		}	
			
			
			
			$output .= '<div class="container1-right">';
					
				$output .= '</div>';  
			}
			
			$output .= '</div>';
	break;
	
	case 'one_slide':

		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 testimonial-'. $args['id'] .'" '. $style_container .'>';
		
		if ( isset( $args['testimonial'] ) ) {
		
				if ( $args['author_position'] == 'top_left' || $args['author_position'] == 'top_center' || $args['author_position'] == 'top_right' ) {
					$output .= '<div class="author_wrap" style="'. $author_pos_inline .'">';
						
							if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
								if ( isset( $args['image'] ) ) {
									$output .= '<div class="author_img">';
									$output .= '<div class="round">';
										$output .= '<img src="'. $args['image'] .'" style="border-radius: 50%;" itemprop="photo" alt="">';
									$output .= '</div>';
									$output .= '</div>';
								}
							}
							
						if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
							$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';
					
						if ( isset( $args['name'] ) )
							$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';

						if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
							if ( isset( $args['rating'] ) ) {
								$output .= '<div class="rating">
								<span class="value-title" title="'. $args['rating'] .'"></span> 
								'. elm_testimonials_get_rating_html( $args['rating'] ) .'
								</div>';
							}
						}
										
				$output .= '</div>';
			}
		
		// Testimonial text 
			$output .= '<p class="quotes" '. $style .'>'. $args['testimonial'] .'</p>';
			
			$output .= '<div class="container1-right">';
			
			if ( $args['author_position'] == 'bottom_left' || $args['author_position'] == 'bottom_center' || $args['author_position'] == 'bottom_right' ) {
					$output .= '<div class="author_wrap" style="'. $author_pos_inline .'">';
						
							if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
								if ( isset( $args['image'] ) ) {
									$output .= '<div class="author_img">';
									$output .= '<div class="round">';
										$output .= '<img src="'. $args['image'] .'" style="border-radius: 50%;" itemprop="photo" alt="">';
									$output .= '</div>';
									$output .= '</div>';
								}
							}
					

						
						if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
							$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';					
					
						if ( isset( $args['name'] ) )
							$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
						
						if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
							if ( isset( $args['rating'] ) ) {
								$output .= '<div class="rating">
								<span class="value-title" title="'. $args['rating'] .'"></span> 
								'. elm_testimonials_get_rating_html( $args['rating'] ) .'
								</div>';
							}
						}
										
				$output .= '</div>';
			}	
				
				$output .= '</div>';  
			}
			
			$output .= '</div>';
	break;	
	
	case 'multiple_slides':

		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 testimonial-'. $args['id'] .'" '. $style_container .'>';
		
		if ( isset( $args['testimonial'] ) ) {
		
			if ( $args['author_position'] == 'top_left' || $args['author_position'] == 'top_center' || $args['author_position'] == 'top_right' ) {
					$output .= '<div class="author_wrap" style="'. $author_pos_inline .'">';
						
							if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
								if ( isset( $args['image'] ) ) {
									$output .= '<div class="author_img">';
									$output .= '<div class="round">';
										$output .= '<img src="'. $args['image'] .'" style="border-radius: 50%;" itemprop="photo" alt="">';
									$output .= '</div>';
									$output .= '</div>';
								}
							}
							
							
						if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
							$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';
					
						if ( isset( $args['name'] ) )
							$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
						
						if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
							if ( isset( $args['rating'] ) ) {
								$output .= '<div class="rating">
								<span class="value-title" title="'. $args['rating'] .'"></span> 
								'. elm_testimonials_get_rating_html( $args['rating'] ) .'
								</div>';
							}
						}
										
				$output .= '</div>';
		}
		
		// Testimonial
			$output .= '<p class="quotes" '. $style .'>'. $args['testimonial'] .'</p>';
			
			$output .= '<div class="container1-right">';
			
				if ( $args['author_position'] == 'bottom_left' || $args['author_position'] == 'bottom_center' || $args['author_position'] == 'bottom_right' ) {
						$output .= '<div class="author_wrap" style="'. $author_pos_inline .'">';
							
								if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
									if ( isset( $args['image'] ) ) {
										$output .= '<div class="author_img">';
										$output .= '<div class="round">';
											$output .= '<img src="'. $args['image'] .'" style="border-radius: 50%;" itemprop="photo" alt="">';
										$output .= '</div>';
										$output .= '</div>';
									}
								}
								
							if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
								$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';	
						
							if ( isset( $args['name'] ) )
								$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
							
							if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
								if ( isset( $args['rating'] ) ) {
									$output .= '<div class="rating">
									<span class="value-title" title="'. $args['rating'] .'"></span> 
									'. elm_testimonials_get_rating_html( $args['rating'] ) .'
									</div>';
								}
							}
											
					$output .= '</div>';
				}	
				
				$output .= '</div>';  
			}
			
			$output .= '</div>';
	break;	
	
	default :
	$output = '';
	
	}
	
	return $output;
}