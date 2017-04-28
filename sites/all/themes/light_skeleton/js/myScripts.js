(function($){
	$(document).ready(function(){
	});

	$(document).on('click', '[data-panel-target]',function(e){
		var burger = $(e.currentTarget);
		var targetSelector = burger.data('panel-target');
		$(targetSelector).add(burger).toggleClass('open is-active');
	});
})(jQuery);