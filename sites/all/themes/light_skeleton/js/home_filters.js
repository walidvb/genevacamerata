(function($){
	// dates
	$(document).on('click', '.pretty-calendar-week a', function(e){
		e.preventDefault();
		var $this = $(e.currentTarget);
		var href = $this.attr('href');
		console.log("$this, e:", $this, e);
		var date = /calendar\/(.+)/.exec(href)[1].replace(/\//g, '-');
		loadWithFilters({
			date: date,
			clicked: $this,
		});
	});

	// types
	$(document).on('click', 'a[data-type]', function(e){
		e.preventDefault();
		var $this = $(e.target);
		var id = $this.data('type');
		loadWithFilters({
			id: id,
		});

	});

	function loadWithFilters(options){
		var url = location.pathname;
		url += options.id ? '?&field_type=' + options.id : '';
		url += options.date ? '?&field_date=' + options.date : '';
		var container = $('.replace-content');
		container.addClass('loading').load(url + ' #home-panels .replace-content', function(){
			container.removeClass('loading');
			$('a[data-type]').removeClass('active');
			$('.pretty-calendar-week a').removeClass('active');
			if(options.id){
				$('a[data-type="'+options.id+'"]').addClass('active');
			}
			else if(options.date){
				options.clicked.addClass('active');
			}
		});
	};
})(jQuery);