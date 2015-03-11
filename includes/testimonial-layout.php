<?php

/**
  * Get testimonial layout
  *
  * @param array $args
  * @return string
*/
function mts_get_testimonial_layout( $args ) {
	
	switch ( $args['layout'] ) {
	
	case 'simple_grid':
	
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 style-5 style-11" id="testimonial-id-'. $args['id'] .'">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
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
						'. mts_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
				}
								
				$output .= '</div>';		
				$output .= '</div>';  
			}
			
			$output .= '</div>';
	break;	
	
	case 'simple_grid_2':
	
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content5 style-3 style-12" id="testimonial-id-'. $args['id'] .'">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<div class="container1-right">';
		
			if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
				if ( isset( $args['image'] ) )
					$output .= '<img src="'. $args['image'] .'" itemprop="photo" alt="">';
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
						'. mts_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
				}
			}
								
			$output .= '</div>';
			$output .= '</div>';
			
			$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
		}
		
		$output .= '</div>';
		
	break;
	case 'simple_grid_3':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content4 style-13">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes">'. $args['testimonial'] .'</p>
			<div class="container1-right">';
			  
			if ( isset( $args['show_image'] ) && $args['show_image'] == 1 ) {
				if ( isset( $args['image'] ) )
					$output .= '<img src="'. $args['image'] .'"  itemprop="photo" alt="">';
			}

			$output .= '<div class="author_wrap">';
			
			if ( isset( $args['name'] ) ) 
				$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
			
			if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )	
				$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] .'</a></div>';
				
			if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
					if ( isset( $args['rating'] ) ) {
						$output .= '<div class="rating">
						  <span class="value-title" title="'. $args['rating'] .'"></span> 
						  '. mts_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
	 }
	break;
	default :
		$output = '';
	}
	
	return $output;
}