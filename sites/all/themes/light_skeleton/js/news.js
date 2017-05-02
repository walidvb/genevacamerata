var $ = jQuery;
(function($){
	var owlOptions = {
		items: 1,
	};
	$(document).ready(function(e){
		$('.view-id-news .view-content').owlCarousel(owlOptions);
	});
})(jQuery);