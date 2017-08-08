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
		var browser = /webkit|safari/i.test(navigator.userAgent) ? 'webkit' : 'mozilla';
		$('html').addClass(browser);
		$(document).on('click touchstart', '[data-panel-target]', function(e){
			e.preventDefault();
			console.log("fucking touched:");
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
	});
	// allow scrolling when dpm()'ing
	$(document).on('click', '.krumo-root',function(e){
		$('body').css({
			'overflow-y': 'auto',
		})
	});
})(jQuery);