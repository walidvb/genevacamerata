/**
 * @file
 *  Ajax loading gif behaviours.
 */
var Ajax_loading_gif = Ajax_loading_gif || {};
Drupal.settings = Drupal.settings || {};

(function ($) {

  'use strict';

  Drupal.behaviors.ajax_loading_gif = {
    attach: function (context) {
      Ajax_loading_gif.ajax_loading_gif.initialize(context);
    }
  };

  Ajax_loading_gif.ajax_loading_gif = {

    initialize: function () {
      this.addAjaxLoadingGifImage();
    },

    addAjaxLoadingGifImage: function () {
      $('html > head').append($("<style>.ajax-progress .throbber {background: transparent url('" + Drupal.settings.ajax_loading_gif.ajax_loading_gif_path + "') no-repeat 0px -18px;}</style>"));
    }

  };

})(jQuery);
