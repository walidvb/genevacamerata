GECA = window.GECA || {};

(function($){
	var loading = false;
	GECA.setupBookingForm = function(context, settings){
		var currentNid = $('[data-nid]').data('nid').match(/(\d+)/)[0];
		$('#edit-submitted-concert').val(currentNid);
	};
})(jQuery);