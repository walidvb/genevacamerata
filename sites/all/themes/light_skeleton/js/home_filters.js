(function($){
	$(document).on('click', 'a[data-type]', function(e){
		e.preventDefault();
		var $this = $(e.target);
		var id = $this.data('type');
		var url = location.pathname + '?field_type=' + id;
		var container = $('#home-concert-list').parent();
		container.addClass('loading').load(url + ' #home-concert-list', function(){
			container.removeClass('loading');
			activateFilter();
		})

		function activateFilter(){
			$('a[data-type]').removeClass('active');
			$('a[data-type="'+id+'"]').addClass('active');
		}
	});
})(jQuery);