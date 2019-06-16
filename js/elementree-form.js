(function($, Drupal) {
  Drupal.behaviors.autocompleteCRWidgets = {
    attach: function(context, settings) {

      var field_enable = $('[name=elementree_enable]');
      var field_component = $('.form-item-elementree-component-name');

      var keys = Object.keys(CRWidgets);

      if (keys) {
        field_component.once('autocomplete-processed').autocomplete({
          source: keys,
          autoFocus: true
        });
      }

      field_component.toggle(field_enable.is(":checked"));

      field_enable.once('elementree-processed').change(function(e) {
        field_component.toggle(this.checked);
      });
    }
  }
}
)(jQuery, Drupal);
