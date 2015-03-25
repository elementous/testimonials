jQuery(document).ready(function($) {
    var $testimonial = $('.elm-testimonial'),
        $testimonials_images = $('.testimonials-authors li');

    $testimonials_images.hover(function() {
        var $this = $(this),
            active_class = 'active-testimonial',
            image_index = $this.index(),
            previous_index = $this.siblings('.' + active_class).index();

        if ($this.hasClass(active_class)) return;

        $this
            .siblings('li').removeClass(active_class)
            .end()
            .addClass(active_class);

        $testimonial.eq(previous_index).stop(true, true).animate({
            opacity: 0
        }, 100, function() {
            $(this).hide();

            $testimonial.eq(image_index).css({
                'display': 'block',
                'opacity': 0
            }).animate({
                opacity: 1
            }, 100);
        });
    });

    /*2nd script*/
    var $testimonial_2 = $('.elm-testimonial-2'),
        $testimonials_images_2 = $('.testimonials-authors-2 li');

    $testimonials_images_2.hover(function() {
        var $this = $(this),
            active_class = 'active-testimonial-2',
            image_index = $this.index(),
            previous_index = $this.siblings('.' + active_class).index();

        if ($this.hasClass(active_class)) return;

        $this
            .siblings('li').removeClass(active_class)
            .end()
            .addClass(active_class);

        $testimonial_2.eq(previous_index).stop(true, true).animate({
            opacity: 0
        }, 100, function() {
            $(this).hide();

            $testimonial_2.eq(image_index).css({
                'display': 'block',
                'opacity': 0
            }).animate({
                opacity: 1
            }, 100);
        });
    });

    /*3rd Script*/
      var $testimonial_3 = $('.elm-testimonial-3'),
        $testimonials_images_3 = $('.testimonials-authors-3 li'),
        $testi_author_3 = $('.testi-author-3');

    $testimonials_images_3.hover(function() {
        var $this = $(this),
            active_class = 'active-testimonial-3',
            image_index = $this.index(),
            previous_index = $this.siblings('.' + active_class).index();

        if ($this.hasClass(active_class)) return;

        $this
            .siblings('li').removeClass(active_class)
            .end()
            .addClass(active_class);

        $testimonial_3.eq(previous_index).stop(false, true).animate({
            opacity: 0
        }, 100, function() {
            $(this).hide();

            $testimonial_3.eq(image_index).css({
                'display': 'block',
                'opacity': 0
            }).animate({
                opacity: 1
            }, 100);
        });

         $testi_author_3.eq(previous_index).stop(true, true).animate({
            opacity: 0
        }, 100, function() {
            $(this).hide();

             $testi_author_3.eq(image_index).css({
                'display': 'block',
                'opacity': 0
            }).animate({
                opacity: 1
            }, 100);
        });
    });
});