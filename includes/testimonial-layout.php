<?php

/**
  * Get testimonial layout
  *
  * @param array $args
  * @return string
*/
function elm_get_testimonial_layout( $args ) {
	
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
						'. elm_testimonials_get_rating_html( $args['rating'] ) .'
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
						'. elm_testimonials_get_rating_html( $args['rating'] ) .'
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
			$output .= '<p class="quotes"><i class="fa fa-quote-left"></i>'. $args['testimonial'] .'</p>
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
	 }
	break;
	case 'simple_grid_4':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 style-6 style-14">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<div class="container1-right">';
			  
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
		}
		$output .= '</div>';
	 }
	 break;
	 case 'cardbox_grid_author_below':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes"><i class="fa fa-quote-left"></i>'. $args['testimonial'] .'</p>
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
	 }
	break;
	case 'cardbox_grid_author_above':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<div class="container1-right">';
			  
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '<p class="quotes"><i class="fa fa-quote-left"></i>'. $args['testimonial'] .'</p>';
		$output .= '</div>';
	 }
	break;
	case 'cardbox_grid_author_left':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content3">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<div class="container1-right">';
			  
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '<p class="quotes"><i class="fa fa-quote-left"></i>'. $args['testimonial'] .'</p>';
		$output .= '</div>';
	 }
	break;
	case 'cardbox_grid_center_aligned':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content4">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes"><i class="fa fa-quote-left"></i>'. $args['testimonial'] .'</p>';
			$output .= '<div class="container1-right">';

			$output .= '<div class="author_wrap">';
			
			if ( isset( $args['name'] ) ) 
				$output .= '<div class="author-name" itemprop="name">'. $args['name'] .'</div>';
			
			if ( isset( $args['title_of_the_person'] ) && isset( $args['link'] ) )	
				$output .= '<div class="author-work" itemprop="title"><a href="'. $args['link'] .'" itemprop="url" target="_blank">'. $args['title_of_the_person'] .'</a></div>';
				
			if ( isset( $args['show_rating'] ) && $args['show_rating'] == 1 ) {			
					if ( isset( $args['rating'] ) ) {
						$output .= '<div class="rating">
						  <span class="value-title" title="'. $args['rating'] .'"></span> 
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
	 }
	break;
	case 'cardbox_grid2_author_below':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content5 style-1">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
			$output .= '<div class="container1-right">';
			
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
	 }
	break;
	case 'cardbox_grid2_author_above':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content5 style-1">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<div class="container1-right">';
			
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
		$output .= '</div>';
	 }
	break;
	case 'cardbox_grid2_author_left':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content5 style-3">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<div class="container1-right">';
			
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
		$output .= '</div>';
	 }
	break; 
	case 'cardbox_grid2_center_aligned':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content5 style-4">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
			$output .= '<div class="container1-right">';
			
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
	 }
	break;
	case 'simple_grid_author_below':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 style-5">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
			$output .= '<div class="container1-right">';
			
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
	 }
	break;
	case 'simple_grid_author_above':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content6 style-5">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<div class="container1-right">';
			
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
		$output .= '</div>';
	 }
	break;
	case 'cardbox_grid_author_left_style_2':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="container1 content3">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<div class="container1-right">';
			
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
		$output .= '</div>';
	 }
	break;
	case 'speech_bubble_theme':
		$output = '<div itemscope itemtype="http://data-vocabulary.org/Person" class="item container1 content6 style-8">';
		
		if ( isset( $args['testimonial'] ) ) {
			$output .= '<p class="quotes">'. $args['testimonial'] .'</p>';
			$output .= '<div class="container1-right">';
			
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
						  '. elm_testimonials_get_rating_html( $args['rating'] ) .'
						</div>';
					}
					
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
	 }
	break;
	case 'glowing_slider_1':
		$output = '';
	break;
	case 'glowing_slider_2':
		$output = '';
	break;
	default :
		$output = '';
	}
	
	return $output;
}