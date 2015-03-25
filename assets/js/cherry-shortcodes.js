jQuery(document).ready(function ($) {

	// Enable swiper carousels
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

	// Google map
	if( $('.google-map-container').length !== 0 ){
		$('.google-map-container').cherryGoogleMap();
	}

	// Spoiler
	$('body').on('click', '.cherry-spoiler-title', function (e) {
		var $title = $(this),
			$spoiler = $title.parent(),
			bar = ($('#wpadminbar').length > 0) ? 28 : 0;
		// Open/close spoiler
		$spoiler.toggleClass('cherry-spoiler-closed');
		// Close other spoilers in accordion
		$spoiler.parent('.cherry-accordion').children('.cherry-spoiler').not($spoiler).addClass('cherry-spoiler-closed');
		// Scroll in spoiler in accordion
		if ($(window).scrollTop() > $title.offset().top) $(window).scrollTop($title.offset().top - $title.height() - bar);
		e.preventDefault();
	});
	$('.cherry-spoiler-content').removeAttr('style');

	// Tabs
	$('body').on('click', '.cherry-tabs-nav span', function (e) {
		var $tab = $(this),
			data = $tab.data(),
			index = $tab.index(),
			is_disabled = $tab.hasClass('cherry-tabs-disabled'),
			$tabs = $tab.parent('.cherry-tabs-nav').children('span'),
			$panes = $tab.parents('.cherry-tabs').find('.cherry-tabs-pane'),
			$gmaps = $panes.eq(index).find('.cherry-gmap:not(.cherry-gmap-reloaded)');
		// Check tab is not disabled
		if (is_disabled) return false;
		// Hide all panes, show selected pane
		$panes.hide().eq(index).show();
		// Disable all tabs, enable selected tab
		$tabs.removeClass('cherry-tabs-current').eq(index).addClass('cherry-tabs-current');
		// Reload gmaps
		if ($gmaps.length > 0) $gmaps.each(function () {
			var $iframe = $(this).find('iframe:first');
			$(this).addClass('cherry-gmap-reloaded');
			$iframe.attr('src', $iframe.attr('src'));
		});
		// Set height for vertical tabs
		tabs_height();
		// Open specified url
		if (data.url !== '') {
			if (data.target === 'self') window.location = data.url;
			else if (data.target === 'blank') window.open(data.url);
		}
		e.preventDefault();
	});

	// Activate tabs
	$('.cherry-tabs').each(function () {
		var active = parseInt($(this).data('active')) - 1;
		$(this).children('.cherry-tabs-nav').children('span').eq(active).trigger('click');
		tabs_height();
	});

	// Activate anchor nav for tabs and spoilers
	anchor_nav();

	function tabs_height() {
		$('.cherry-tabs-vertical').each(function () {
			var $tabs = $(this),
				$nav = $tabs.children('.cherry-tabs-nav'),
				$panes = $tabs.find('.cherry-tabs-pane'),
				height = 0;
			$panes.css('min-height', $nav.outerHeight(true));
		});
	}

	function anchor_nav() {
		// Check hash
		if (document.location.hash === '') return;
		// Go through tabs
		$('.cherry-tabs-nav span[data-anchor]').each(function () {
			if ('#' + $(this).data('anchor') === document.location.hash) {
				var $tabs = $(this).parents('.cherry-tabs'),
					bar = ($('#wpadminbar').length > 0) ? 28 : 0;
				// Activate tab
				$(this).trigger('click');
				// Scroll-in tabs container
				window.setTimeout(function () {
					$(window).scrollTop($tabs.offset().top - bar - 10);
				}, 100);
			}
		});
		// Go through spoilers
		$('.cherry-spoiler[data-anchor]').each(function () {
			if ('#' + $(this).data('anchor') === document.location.hash) {
				var $spoiler = $(this),
					bar = ($('#wpadminbar').length > 0) ? 28 : 0;
				// Activate tab
				if ($spoiler.hasClass('cherry-spoiler-closed')) $spoiler.find('.cherry-spoiler-title:first').trigger('click');
				// Scroll-in tabs container
				window.setTimeout(function () {
					$(window).scrollTop($spoiler.offset().top - bar - 10);
				}, 100);
			}
		});
	}
});