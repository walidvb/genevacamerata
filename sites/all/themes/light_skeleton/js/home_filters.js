GECA = window.GECA || {};
(function($){
	GECA.filters = function(context, settings){
		// dates
		$('.pretty-calendar-week a').on('click', context, function(e){
			e.preventDefault();
			var $this = $(e.currentTarget);
			var href = $this.attr('href');
			var date = /calendar\/(.+)/.exec(href)[1].replace(/\//g, '-');
			loadWithFilters({
				date: date,
				clicked: $this,
			});
		});

		// types
		$('a[data-type]').on('click', context, function(e){
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
			container.addClass('loading');
			$('.is-active, [data-panel-target]').removeClass('is-active open');
			$.get(url, function(data){
					var replace = $('#home-panels .replace-content', data);
					container.replaceWith(replace);
					Drupal.attachBehaviors(replace);
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
	}
})(jQuery);