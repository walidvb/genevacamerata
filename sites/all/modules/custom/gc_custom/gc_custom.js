(function($){
	Drupal.behaviors.gcCustom = {
		attach: function (context, settings) {
			if($(context).hasClass('webform-component-matrix')){
				var tds = $('tr:not(:last-child) td:empty', context);
				var tr = tds.parent();
				tds.add(tr).remove();
			}
	  }
	};
})(jQuery);