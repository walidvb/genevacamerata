(function($){
	Drupal.behaviors.GECA = {
		attach: function (context, settings) {
				GECA.filters(context, settings);
				GECA.carousel(context, settings);
				GECA.infiniteScroll(context, settings);
	  }
	};
})(jQuery);

(function($){
	$(document).on('click', '[data-panel-target]',function(e){
		var burger = $(e.currentTarget);
		var targetSelector = burger.data('panel-target');
		$('.open.is-active').not(targetSelector).not(burger).removeClass('open is-active');
		$(targetSelector).add(burger).toggleClass('open is-active');
		console.log("$('.is-active').length > 0:", $('.is-active').length > 0);
		$('html').toggleClass("has-panel-open", $('.is-active').length > 0);
	});

	$(document).on('click', '.krumo-root',function(e){
		$('body').css({
			'overflow-y': 'auto',
		})
	});
})(jQuery);