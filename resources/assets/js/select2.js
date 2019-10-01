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
    var elementOptions = el.dataset.options;
        elementOptions = elementOptions ? JSON.parse(elementOptions) : {};
    var defaultOptions = {
      tags: $(el).data('dynamic-tags') || false
    };
    var options = Object.assign(elementOptions, defaultOptions);

    console.log($(el).data('dynamic-tags'));
    console.log(options);

    $(el).select2(options);
  }

  function formatTemplate(item) {
    if (!item.id) {
      return item.text;
    }

    var option = item.element;
    var avatar = option.dataset.avatarSrc;

    if (avatar) {
      var content = document.createElement('div');

      content.innerHTML = '<span class="avatar avatar-xs mr-3"><img class="avatar-img rounded-circle" src="' + avatar + '" alt="' + item.text + '"></span><span>' + item.text + '</span>';
    } else {
      var content = item.text;
    }

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
