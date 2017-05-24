(function($){
	Drupal.behaviors.GECA = {
		attach: function (context, settings) {
				GECA.filters(context, settings);
				GECA.carousel(context, settings);
				GECA.infiniteScroll(context, settings);
				GECA.setupBookingForm(context, settings);
	  }
	};
})(jQuery);

(function($){
	$(document).ready(function(){
		$('[data-panel-target]').on('click touch', function(e){
			var burger = $(e.currentTarget);
			var targetSelector = burger.data('panel-target');
			var allTriggers = $('[data-panel-target="'+targetSelector+'"]');
			$('[data-panel-target]').not($('[data-panel-target="'+targetSelector+'"]')).removeClass('is-active');
			allTriggers.toggleClass('is-active');
			var shouldOpen = burger.hasClass('is-active');
			$('.open').removeClass('open');
			$(targetSelector).toggleClass('open', shouldOpen);
			$('html').toggleClass("has-panel-open", shouldOpen);
		});

		// allow scrolling when dpm()'ing
		$(document).on('click', '.krumo-root',function(e){
			$('body').css({
				'overflow-y': 'auto',
			})
		});
	});
})(jQuery);