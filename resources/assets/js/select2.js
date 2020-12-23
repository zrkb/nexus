//
// select2.js
// Theme module
//

'use strict';

(function() {

  //
  // Variables
  //

  var toggle = document.querySelectorAll('[data-toggle="select"]');

  //
  // Functions
  //

  function init(el) {
    var elementOptions = el.dataset.options ? JSON.parse(el.dataset.options) : {};

    var defaultOptions = {
      containerCssClass: el.getAttribute('class'),
      dropdownAutoWidth: true,
      dropdownCssClass: el.classList.contains('custom-select-sm') || el.classList.contains('form-control-sm') ? 'dropdown-menu dropdown-menu-sm show' : 'dropdown-menu show',
      dropdownParent: el.closest('.modal') ? el.closest('.modal') : document.body,
      templateResult: formatTemplate
    };

    var options = Object.assign(defaultOptions, elementOptions);

    // Init
    $(el).select2(options);
  }

  function formatTemplate(item) {

    // Quit if there's no avatar to display
    if (!item.id || !item.element || !item.element.dataset.avatarSrc) {
      return item.text;
    }

    var avatar = item.element.dataset.avatarSrc;
    var content = document.createElement('div');

    content.innerHTML = '<span class="avatar avatar-xs mr-3"><img class="avatar-img rounded-circle" src="' + avatar + '" alt="' + item.text + '"></span><span>' + item.text + '</span>';

    return content;
  }

  //
  // Events
  //

  if (jQuery().select2 && toggle) {
    [].forEach.call(toggle, function(el) {
      init(el);
    });
  }

})();
