(function ($, Drupal, drupalSettings) {
    var initialized;
    function init() {
        if(!initialized) {
            initialized = true;
            $('#message')
        }
    Drupal.behaviors.DesignThinkingGraphic = {
      attach: function (context, settings) {
        // can access setting from 'drupalSettings';
        init();
      }
    };
    })(jQuery, Drupal, drupalSettings);