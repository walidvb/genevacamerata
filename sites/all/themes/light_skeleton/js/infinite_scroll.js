
(function($){
	var loading = false;
	$(document).ready(function(){
		$('.center-column, .left-container').on('scroll', function(e){
			var scrollTop = $(this).scrollTop();
			var height = $(this).height();
			var containerHeight = $(this).find('.pane-content, .row').height();
			if(scrollTop + height + 300 >= containerHeight && !loading){
				loadMore();
			}
	});

	$(window).on('scroll', function(){
		var scrollTop = $(this).scrollTop();
		var height = $(this).height();
		var containerHeight = $('body').height();
		if(scrollTop + height + 300 >= containerHeight && !loading){
			loadMore();
		}
	});

	function loadMore(){
		var href = $('.view-id-concerts .item-list .pager-next a').attr('href');
		if(href != undefined){
			loading = true;
			$.ajax({
				url: href,
				success: function(data){
					loading = false;
					var rows = $('.view-id-concerts .view-content .views-row', data);
					var pager = $('.view-id-concerts .item-list', data);
					$('.view-id-concerts .item-list').replaceWith(pager);
					$('.view-id-concerts .view-content').append(rows);
				},
			});
		}
	}

	});

})(jQuery);