(function($){
	$(document).ready(function(){
	});

	$(document).on('click', '[data-panel-target]',function(e){
		var burger = $(e.currentTarget);
		var targetSelector = burger.data('panel-target');
		$('.open.is-active').not(targetSelector).not(burger).removeClass('open is-active');
		$(targetSelector).add(burger).toggleClass('open is-active');
		$('html').toggleClass("has-panel-open");
	});

	$(document).on('click', '.krumo-root',function(e){
		$('body').css({
			'overflow-y': 'auto',
		})
	});
})(jQuery);