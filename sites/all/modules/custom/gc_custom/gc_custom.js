(function($){
	Drupal.behaviors.gcCustom = {
		attach: function (context, settings) {
			if($(context).hasClass('webform-component-matrix')){
				console.log('test');
				var tds = $('tr:not(:last-child) td:empty', context);
				var tr = tds.parent();
				debugger;
				tds.add(tr).remove();
			
			}
	  }
	};
})(jQuery);