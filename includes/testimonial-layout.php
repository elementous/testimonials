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
		
	if ( !empty( $args['width'] ) )
		$inline_container_css .= 'width: '. $args['width'] . '%;';
		
	if ( !empty( $args['text_color'] ) )
		$inline_css .= 'color: '. $args['text_color'] . ';';	
			
	if ( !empty( $args['background_color'] ) )
		$inline_css .= 'background: '. $args['background_color'] . ';';	
			
	if ( !empty( $args['border_radius'] ) )
		$inline_css .= 'border-radius: '. $args['border_radius'] . 'px;';	
			
	if ( !empty( $args['padding'] ) )
		$inline_css .= 'padding: '. $args['padding'] . 'px;';
			
	if ( !empty( $inline_css ) )
		$style .= 'style="' . $inline_css . '"';
		
	if ( !empty( $inline_container_css ) )
		$style_container .= 'style="' . $inline_container_css . '"';
	
	switch ( $args['layout'] ) {
	
	case 'simple_grid':

		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 testimonial-'. $args['id'] .'" '. $style_container .'>';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes" '. $style .'>'. $args['testimonial'] .'</p>';
			$output .= '<div class="container1-right">';
			
			if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
				if ( isset( $args['image'] ) )
					$output .= '<img src="'. $args['image'] .'" style="border-radius: 0%;" itemprop="photo" alt="">';
			}
		
				$output .= '<div class="author_wrap">';
			
				if ( isset( $args['name'] ) )
					$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
				
				if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
					$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';
				
				if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
					if ( isset( $args['rating'] ) ) {
						$output .= '<div class="rating">
						<span class="value-title" title="'. $args['rating'] .'"></span> 
						'. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
				}
								
				$output .= '</div>';		
				$output .= '</div>';  
			}
			
			$output .= '</div>';
	break;	
	
	case 'single':

		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 testimonial-'. $args['id'] .'" '. $style_container .'>';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes" '. $style .'>'. $args['testimonial'] .'</p>';
			$output .= '<div class="container1-right">';
			
			if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
				if ( isset( $args['image'] ) )
					$output .= '<img src="'. $args['image'] .'" style="border-radius: 0%;" itemprop="photo" alt="">';
			}
		
				$output .= '<div class="author_wrap">';
			
				if ( isset( $args['name'] ) )
					$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
				
				if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
					$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';
				
				if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
					if ( isset( $args['rating'] ) ) {
						$output .= '<div class="rating">
						<span class="value-title" title="'. $args['rating'] .'"></span> 
						'. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
				}
								
				$output .= '</div>';		
				$output .= '</div>';  
			}
			
			$output .= '</div>';
	break;	
	
	case 'one_slide':

		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 testimonial-'. $args['id'] .'" '. $style_container .'>';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes" '. $style .'>'. $args['testimonial'] .'</p>';
			$output .= '<div class="container1-right">';
			
			if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
				if ( isset( $args['image'] ) )
					$output .= '<img src="'. $args['image'] .'" style="border-radius: 0%;" itemprop="photo" alt="">';
			}
		
				$output .= '<div class="author_wrap">';
			
				if ( isset( $args['name'] ) )
					$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
				
				if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
					$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';
				
				if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
					if ( isset( $args['rating'] ) ) {
						$output .= '<div class="rating">
						<span class="value-title" title="'. $args['rating'] .'"></span> 
						'. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
				}
								
				$output .= '</div>';		
				$output .= '</div>';  
			}
			
			$output .= '</div>';
	break;	
	
	case 'multiple_slides':

		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 testimonial-'. $args['id'] .'" '. $style_container .'>';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes" '. $style .'>'. $args['testimonial'] .'</p>';
			$output .= '<div class="container1-right">';
			
			if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
				if ( isset( $args['image'] ) )
					$output .= '<img src="'. $args['image'] .'" style="border-radius: 0%;" itemprop="photo" alt="">';
			}
		
				$output .= '<div class="author_wrap">';
			
				if ( isset( $args['name'] ) )
					$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
				
				if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )
					$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] . '</a></div>';
				
				if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
					if ( isset( $args['rating'] ) ) {
						$output .= '<div class="rating">
						<span class="value-title" title="'. $args['rating'] .'"></span> 
						'. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
				}
								
				$output .= '</div>';		
				$output .= '</div>';  
			}
			
			$output .= '</div>';
	break;	
	
	default :
	$output = '';
	
	}
	
	return $output;
}