GECA = window.GECA || {};
(function($){
	$(document).on('click', '.pretty-calendar-week a', function(e){
		e.preventDefault();
		// do not load dates
		// var $this = $(e.currentTarget);
		// var href = $this.attr('href');
		// var date = /calendar\/(.+)/.exec(href)[1].replace(/\//g, '-');
		// loadWithFilters({
		// 	date: date,
		// 	clicked: $this,
		// });
	});
	GECA.filters = function(context, settings){
		// dates

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
			container.find('.left-container').addClass('loading');
			$('.is-active, [data-panel-target]').removeClass('is-active open');
			$('html, body, .section, .section-container').animate({scrollTop: 0});
			$.get(url, function(data){
					var replace = $('#home-panels .replace-content', data);
					container.replaceWith(replace);
					Drupal.attachBehaviors(replace);
					container.removeClass('loading');
					$('a[data-type]').removeClass('active');
					$('.pretty-calendar-week a').removeClass('active');
					//TODO: close panel again
					$('html').removeClass('has-panel-open').attr('data-panel', '');
					$('html, body, .section, .section-container').animate({scrollTop: 0});
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