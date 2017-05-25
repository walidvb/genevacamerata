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
			$('html').attr('data-open', targetSelector.substring(1)).toggleClass("has-panel-open");
		});

		// allow scrolling when dpm()'ing
		$(document).on('click', '.krumo-root',function(e){
			$('body').css({
				'overflow-y': 'auto',
			})
		});
	});
})(jQuery);