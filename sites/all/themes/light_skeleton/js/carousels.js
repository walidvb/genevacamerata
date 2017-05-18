var $ = jQuery;
GECA = window.GECA || {};
(function($){
	GECA.carousel = function(context, settings){
		var owlOptions = {
			items: 1,
			loop: true,
			autoplay: true,
			autoplayTimeout: 5000,
			
		};

		var selectors = [
			'.view-display-id-panel_pane_2.view-id-artist_from_concert .view-content > div',
			'.view-id-news .view-content',
		];
		$(selectors.join(','), context).addClass('owl-carousel owl-theme').owlCarousel(owlOptions);
	}
})(jQuery);