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
			var targetSelector = burger.data('panel-target').substring(1);
			var currentPanel = $('html').attr('data-panel');
			if(currentPanel == targetSelector){
				$('html').attr('data-panel', '').removeClass("has-panel-open");
			}
			else{
				$('html').attr('data-panel', targetSelector).addClass("has-panel-open");	
			}
		});

		// allow scrolling when dpm()'ing
		$(document).on('click', '.krumo-root',function(e){
			$('body').css({
				'overflow-y': 'auto',
			})
		});
	});
})(jQuery);