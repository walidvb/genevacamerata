GECA = window.GECA || {};

(function($){
	var loading = false;
	GECA.setupBookingForm = function(context, settings){
		$('.page-tickets .node-concert a').attr('target', '_blank');
		$('.page-tickets:not(.page-tickets-5) .buy-link a').on('click', function(evt){
			evt.preventDefault();
			$('.node.node-webform').show();
			var $this = $(this)
			var selectedNid = $this.data('nid');

			var parent = $this.parents('.node-concert');
			$('.selected').removeClass('selected');
			parent.addClass('selected');
			$('#edit-submitted-concert').val(selectedNid);
			setTimeout(function(){
				$(document).animate({
					scrollTop:$('.node.node-webform').offset().top
				});
			}, 300);
		})
	};
})(jQuery);