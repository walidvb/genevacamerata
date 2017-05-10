var $ = jQuery;
(function($){
	var owlOptions = {
		items: 1,
	};

	var selectors = [
		'.view-display-id-panel_pane_2.view-id-artist_from_concert .view-content > div',
		'.view-id-news .view-content',
	];
	$('document').ready(function(e){
		$(selectors.join(',')).addClass('owl-carousel owl-theme').owlCarousel(owlOptions);
	});
})(jQuery);