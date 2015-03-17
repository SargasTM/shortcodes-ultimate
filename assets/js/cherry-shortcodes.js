jQuery(document).ready(function ($) {
	// Enable carousels
	jQuery('.cherry-swiper-carousel').each(function(){
		var
			swiper
		,	slides_per_view = parseFloat( jQuery(this).data('slides-per-view') )
		,	slides_per_column = parseFloat( jQuery(this).data('slides-per-column') )
		,	space_between_slides = parseFloat( jQuery(this).data('space-between-slides') )
		,	duration_speed = parseFloat( jQuery(this).data('duration-speed') )
		,	swiper_loop = jQuery(this).data('swiper-loop')
		,	free_mode = jQuery(this).data('free-mode')
		,	grab_cursor = jQuery(this).data('grab-cursor')
		,	mouse_wheel = jQuery(this).data('mouse-wheel')
		,	centered_slide = jQuery(this).data('centered-slide')
		,	swiper_effect = jQuery(this).data('swiper-effect')
		,	$nextButton = jQuery('.swiper-button-next',this)
		,	$prevButton = jQuery('.swiper-button-prev',this)
		,	$pagination = jQuery('.swiper-pagination',this)
		,	widthLayout = ''
		,	widthLayoutChanger = function(){
				windowWidth = jQuery(this).width();
				if ( windowWidth > 1200 ) { widthLayout = 'large'; }
				if ( windowWidth <= 1199 && windowWidth > 768 ) { widthLayout = 'medium'; }
				if ( windowWidth <= 767 ) { widthLayout = 'small'; }

				switch ( widthLayout ) {
					case 'large':
						slidesPerView = slides_per_view;
						break
					case 'medium':
						slidesPerView = Math.ceil( slides_per_view / 2 );
						break
					case 'small':
						slidesPerView = 1;
						break
				}
				if( swiper_effect == 'cube' ){ slidesPerView = 1; }
				return slidesPerView;
			}
		;


		swiper = new Swiper( jQuery(this), {
				slidesPerView: widthLayoutChanger(),
				slidesPerColumn: slides_per_column,
				spaceBetween: space_between_slides,
				speed: duration_speed,
				loop: swiper_loop,
				freeMode: free_mode,
				grabCursor: grab_cursor,
				mousewheelControl: mouse_wheel,
				centeredSlides: centered_slide,
				effect: swiper_effect,
				paginationClickable: true,
				nextButton: $nextButton,
				prevButton: $prevButton,
				pagination: $pagination,
				cube: {
					shadow: false,
					slideShadows: false,
				}
			}
		);

		jQuery(window).on('resize.swiper_resize', function(){
			var slidesNumber = widthLayoutChanger();
			swiper.params.slidesPerView = slidesNumber;
		});
	})
});