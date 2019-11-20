/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _autosize_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./autosize.js */ "./resources/assets/js/autosize.js");
/* harmony import */ var _autosize_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_autosize_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _charts_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./charts.js */ "./resources/assets/js/charts.js");
/* harmony import */ var _charts_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_charts_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _dashkit_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./dashkit.js */ "./resources/assets/js/dashkit.js");
/* harmony import */ var _dashkit_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_dashkit_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _dropdowns_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./dropdowns.js */ "./resources/assets/js/dropdowns.js");
/* harmony import */ var _dropdowns_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_dropdowns_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _dropzone_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./dropzone.js */ "./resources/assets/js/dropzone.js");
/* harmony import */ var _dropzone_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_dropzone_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _flatpickr_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./flatpickr.js */ "./resources/assets/js/flatpickr.js");
/* harmony import */ var _flatpickr_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_flatpickr_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _highlight_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./highlight.js */ "./resources/assets/js/highlight.js");
/* harmony import */ var _highlight_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_highlight_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _kanban_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./kanban.js */ "./resources/assets/js/kanban.js");
/* harmony import */ var _kanban_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_kanban_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _list_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./list.js */ "./resources/assets/js/list.js");
/* harmony import */ var _list_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_list_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _map_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./map.js */ "./resources/assets/js/map.js");
/* harmony import */ var _map_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_map_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _navbar_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./navbar.js */ "./resources/assets/js/navbar.js");
/* harmony import */ var _navbar_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_navbar_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _polyfills_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./polyfills.js */ "./resources/assets/js/polyfills.js");
/* harmony import */ var _polyfills_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_polyfills_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _popover_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./popover.js */ "./resources/assets/js/popover.js");
/* harmony import */ var _popover_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_popover_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _quill_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./quill.js */ "./resources/assets/js/quill.js");
/* harmony import */ var _quill_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_quill_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var _select2_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./select2.js */ "./resources/assets/js/select2.js");
/* harmony import */ var _select2_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_select2_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _tooltip_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./tooltip.js */ "./resources/assets/js/tooltip.js");
/* harmony import */ var _tooltip_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(_tooltip_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var _user_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./user.js */ "./resources/assets/js/user.js");
/* harmony import */ var _user_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(_user_js__WEBPACK_IMPORTED_MODULE_16__);
//
// demo.js
// Theme module
//




















var demoMode = function () {
  //
  // Variables
  //
  var form = document.querySelector('#demoForm');
  var topnav = document.querySelector('#topnav');
  var topbar = document.querySelector('#topbar');
  var sidebar = document.querySelector('#sidebar');
  var sidebarSmall = document.querySelector('#sidebarSmall');
  var sidebarUser = document.querySelector('#sidebarUser');
  var sidebarUserSmall = document.querySelector('#sidebarSmallUser');
  var sidebarSizeContainer = document.querySelector('#sidebarSizeContainer');
  var navPositionToggle = document.querySelectorAll('input[name="navPosition"]');
  var containers = document.querySelectorAll('[class^="container"]');
  var stylesheets = document.querySelectorAll('#stylesheetLight, #stylesheetDark');
  var stylesheetLight = document.querySelector('#stylesheetLight');
  var stylesheetDark = document.querySelector('#stylesheetDark');
  var config = {
    colorScheme: localStorage.getItem('dashkitColorScheme') ? localStorage.getItem('dashkitColorScheme') : 'light',
    navPosition: localStorage.getItem('dashkitNavPosition') ? localStorage.getItem('dashkitNavPosition') : 'sidenav',
    navColor: localStorage.getItem('dashkitNavColor') ? localStorage.getItem('dashkitNavColor') : 'default',
    sidebarSize: localStorage.getItem('dashkitSidebarSize') ? localStorage.getItem('dashkitSidebarSize') : 'base'
  }; //
  // Functions
  //

  function parseUrl() {
    var search = window.location.search.substring(1);
    var params = search.split('&');

    for (var i = 0; i < params.length; i++) {
      var arr = params[i].split('=');
      var prop = arr[0];
      var val = arr[1];

      if (prop == 'colorScheme' || prop == 'navPosition' || prop == 'navColor' || prop == 'sidebarSize') {
        // Save to localStorage
        localStorage.setItem('dashkit' + prop.charAt(0).toUpperCase() + prop.slice(1), val); // Update local variables

        config[prop] = val;
      }
    }
  }

  function toggleColorScheme(colorScheme) {
    if (colorScheme == 'light') {
      stylesheetLight.disabled = false;
      stylesheetDark.disabled = true;
      colorScheme = 'light';
    } else if (colorScheme == 'dark') {
      stylesheetLight.disabled = true;
      stylesheetDark.disabled = false;
      colorScheme = 'dark';
    }
  }

  function toggleNavPosition(navPosition) {
    if (topnav && topbar && sidebar && sidebarSmall && sidebarUser && sidebarUserSmall) {
      if (navPosition == 'topnav') {
        hideNode(topbar);
        hideNode(sidebar);
        hideNode(sidebarSmall);

        for (var i = 0; i < containers.length; i++) {
          containers[i].classList.remove('container-fluid');
          containers[i].classList.add('container');
        }
      } else if (navPosition == 'combo') {
        hideNode(topnav);
        hideNode(sidebarUser);
        hideNode(sidebarUserSmall);

        for (var i = 0; i < containers.length; i++) {
          containers[i].classList.remove('container');
          containers[i].classList.add('container-fluid');
        }
      } else if (navPosition == 'sidenav') {
        hideNode(topnav);
        hideNode(topbar);

        for (var i = 0; i < containers.length; i++) {
          containers[i].classList.remove('container');
          containers[i].classList.add('container-fluid');
        }
      }
    }
  }

  function toggleNavColor(navColor) {
    if (sidebar && sidebarSmall && topnav) {
      if (navColor == 'default') {
        // Sidebar
        sidebar.classList.add('navbar-light'); // Sidebar small

        sidebarSmall.classList.add('navbar-light'); // Topnav

        topnav.classList.add('navbar-light');
      } else if (navColor == 'inverted') {
        // Sidebar
        sidebar.classList.add('navbar-dark'); // Sidebar small

        sidebarSmall.classList.add('navbar-dark'); // Topnav

        topnav.classList.add('navbar-dark');
      } else if (navColor == 'vibrant') {
        // Sidebar
        sidebar.classList.add('navbar-dark', 'navbar-vibrant'); // Sidebar small

        sidebarSmall.classList.add('navbar-dark', 'navbar-vibrant'); // Sidebar small

        topnav.classList.add('navbar-dark', 'navbar-vibrant');
      }
    }
  }

  function toggleSidebarSize(sidebarSize) {
    if (sidebarSize == 'base') {
      hideNode(sidebarSmall);
    } else if (sidebarSize == 'small') {
      hideNode(sidebar);
    }
  }

  function toggleFormControls(form, colorScheme, navPosition, navColor, sidebarSize) {
    $(form).find('[name="colorScheme"][value="' + colorScheme + '"]').closest('.btn').button('toggle');
    $(form).find('[name="navPosition"][value="' + navPosition + '"]').closest('.btn').button('toggle');
    $(form).find('[name="navColor"][value="' + navColor + '"]').closest('.btn').button('toggle');
    $(form).find('[name="sidebarSize"][value="' + sidebarSize + '"]').closest('.btn').button('toggle');
  }

  function toggleSidebarSizeCongainer(navPosition) {
    if (navPosition == 'topnav') {
      $(sidebarSizeContainer).collapse('hide');
    } else {
      $(sidebarSizeContainer).collapse('show');
    }
  }

  function submitForm(form) {
    var colorScheme = form.querySelector('[name="colorScheme"]:checked').value;
    var navPosition = form.querySelector('[name="navPosition"]:checked').value;
    var navColor = form.querySelector('[name="navColor"]:checked').value;
    var sidebarSize = form.querySelector('[name="sidebarSize"]:checked').value; // Save data to localStorage

    localStorage.setItem('dashkitColorScheme', colorScheme);
    localStorage.setItem('dashkitNavPosition', navPosition);
    localStorage.setItem('dashkitNavColor', navColor);
    localStorage.setItem('dashkitSidebarSize', sidebarSize); // Reload page

    window.location = window.location.pathname;
  }

  function hideNode(node) {
    node.setAttribute('style', 'display: none !important');
  } //
  // Event
  //
  // Parse url


  parseUrl(); // Toggle color scheme
  // toggleColorScheme(config.colorScheme);
  // Toggle nav position
  // toggleNavPosition(config.navPosition);
  // Toggle sidebar color
  // toggleNavColor(config.navColor);
  // Toggle sidebar size
  // toggleSidebarSize(config.sidebarSize);
  // Toggle form controls

  toggleFormControls(form, config.colorScheme, config.navPosition, config.navColor, config.sidebarSize); // Toggle sidebarSize container

  toggleSidebarSizeCongainer(config.navPosition); // Enable body

  document.body.style.display = 'block';

  if (form) {
    // Form submitted
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      submitForm(form);
    }); // Nav position changed

    [].forEach.call(navPositionToggle, function (el) {
      el.parentElement.addEventListener('click', function () {
        var navPosition = el.value;
        toggleSidebarSizeCongainer(navPosition);
      });
    });
  } //
  // Return
  //


  return true;
}();

/***/ }),

/***/ "./resources/assets/js/autosize.js":
/*!*****************************************!*\
  !*** ./resources/assets/js/autosize.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// autosize.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var toggle = document.querySelectorAll('[data-toggle="autosize"]'); //
  // Function
  //

  function init(el) {
    autosize(el);
  } //
  // Event
  //


  if (typeof autosize !== 'undefined' && toggle) {
    [].forEach.call(toggle, function (el) {
      init(el);
    });
  }
})();

/***/ }),

/***/ "./resources/assets/js/charts.js":
/*!***************************************!*\
  !*** ./resources/assets/js/charts.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// charts.js
// Theme module
//


function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

window.ChartBackgroundColors = ['#2C7BE5', '#5EA2EF', '#7FBCF7', '#AAD8FC', '#D4EDFD', '#66CC1E', '#94E050', '#B5EF75', '#D6F9A4', '#EDFCD1', '#F7960E', '#FAB749', '#FCCD6D', '#FEE29E', '#FEF2CE', '#FF3330', '#FF7363', '#FF9982', '#FFC2AC', '#FFE4D5'];

(function () {
  //
  // Variables
  //
  var colors = {
    gray: {
      300: '#E3EBF6',
      600: '#95AAC9',
      700: '#6E84A3',
      800: '#152E4D',
      900: '#283E59'
    },
    primary: {
      100: '#D2DDEC',
      300: '#A6C5F7',
      700: '#2C7BE5'
    },
    black: '#12263F',
    white: '#FFFFFF',
    transparent: 'transparent'
  };
  var fonts = {
    base: 'Cerebri Sans'
  };
  var toggle = document.querySelectorAll('[data-toggle="chart"]');
  var legend = document.querySelectorAll('[data-toggle="legend"]'); //
  // Functions
  //

  function globalOptions() {
    // Global
    Chart.defaults.global.responsive = true;
    Chart.defaults.global.maintainAspectRatio = false; // Default

    Chart.defaults.global.defaultColor = colors.gray[600];
    Chart.defaults.global.defaultFontColor = colors.gray[600];
    Chart.defaults.global.defaultFontFamily = fonts.base;
    Chart.defaults.global.defaultFontSize = 13; // Layout

    Chart.defaults.global.layout.padding = 0; // Legend

    Chart.defaults.global.legend.display = false;
    Chart.defaults.global.legend.position = 'bottom';
    Chart.defaults.global.legend.labels.usePointStyle = true;
    Chart.defaults.global.legend.labels.padding = 16; // Point

    Chart.defaults.global.elements.point.radius = 0;
    Chart.defaults.global.elements.point.backgroundColor = colors.primary[700]; // Line

    Chart.defaults.global.elements.line.tension = .4;
    Chart.defaults.global.elements.line.borderWidth = 3;
    Chart.defaults.global.elements.line.borderColor = colors.primary[700];
    Chart.defaults.global.elements.line.backgroundColor = colors.transparent;
    Chart.defaults.global.elements.line.borderCapStyle = 'rounded'; // Rectangle

    Chart.defaults.global.elements.rectangle.backgroundColor = colors.primary[700]; // Arc

    Chart.defaults.global.elements.arc.backgroundColor = colors.primary[700];
    Chart.defaults.global.elements.arc.borderColor = colors.white;
    Chart.defaults.global.elements.arc.borderWidth = 4;
    Chart.defaults.global.elements.arc.hoverBorderColor = colors.white; // Tooltips

    Chart.defaults.global.tooltips.enabled = false;
    Chart.defaults.global.tooltips.mode = 'index';
    Chart.defaults.global.tooltips.intersect = false;

    Chart.defaults.global.tooltips.custom = function (model) {
      var tooltip = document.getElementById('chart-tooltip');

      if (!tooltip) {
        tooltip = document.createElement('div');
        tooltip.setAttribute('id', 'chart-tooltip');
        tooltip.setAttribute('role', 'tooltip');
        tooltip.classList.add('popover');
        tooltip.classList.add('bs-popover-top');
        document.body.appendChild(tooltip);
      }

      if (model.opacity === 0) {
        tooltip.style.visibility = 'hidden';
        return;
      }

      function getBody(bodyItem) {
        return bodyItem.lines;
      }

      if (model.body) {
        var titleLines = model.title || [];
        var bodyLines = model.body.map(getBody);
        var html = '';
        html += '<div class="arrow"></div>';
        titleLines.forEach(function (title) {
          html += '<h3 class="popover-header text-center">' + title + '</h3>';
        });
        bodyLines.forEach(function (body, i) {
          var colors = model.labelColors[i];
          var styles = 'background-color: ' + colors.backgroundColor;
          var indicator = '<span class="popover-body-indicator" style="' + styles + '"></span>';
          var align = bodyLines.length > 1 ? 'justify-content-left' : 'justify-content-center';
          html += '<div class="popover-body d-flex align-items-center ' + align + '">' + indicator + body + '</div>';
        });
        tooltip.innerHTML = html;
      }

      var canvas = this._chart.canvas;
      var canvasRect = canvas.getBoundingClientRect();
      var canvasWidth = canvas.offsetWidth;
      var canvasHeight = canvas.offsetHeight;
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
      var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft || 0;
      var canvasTop = canvasRect.top + scrollTop;
      var canvasLeft = canvasRect.left + scrollLeft;
      var tooltipWidth = tooltip.offsetWidth;
      var tooltipHeight = tooltip.offsetHeight;
      var top = canvasTop + model.caretY - tooltipHeight - 16;
      var left = canvasLeft + model.caretX - tooltipWidth / 2;
      tooltip.style.top = top + 'px';
      tooltip.style.left = left + 'px';
      tooltip.style.visibility = 'visible';
    };

    Chart.defaults.global.tooltips.callbacks.label = function (item, data) {
      var label = data.datasets[item.datasetIndex].label || '';
      var yLabel = item.yLabel;
      var content = '';

      if (data.datasets.length > 1) {
        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
      }

      content += '<span class="popover-body-value">' + yLabel + '</span>';
      return content;
    }; // Doughnut


    Chart.defaults.doughnut.cutoutPercentage = 83;

    Chart.defaults.doughnut.tooltips.callbacks.title = function (item, data) {
      var title = data.labels[item[0].index];
      return title;
    };

    Chart.defaults.doughnut.tooltips.callbacks.label = function (item, data) {
      var value = data.datasets[0].data[item.index];
      var content = '';
      content += '<span class="popover-body-value">' + value + '</span>';
      return content;
    };

    Chart.defaults.doughnut.legendCallback = function (chart) {
      var data = chart.data;
      var content = '';
      data.labels.forEach(function (label, index) {
        var bgColor = data.datasets[0].backgroundColor[index];
        content += '<span class="chart-legend-item">';
        content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
        content += label;
        content += '</span>';
      });
      return content;
    }; // yAxes


    Chart.scaleService.updateScaleDefaults('linear', {
      gridLines: {
        borderDash: [2],
        borderDashOffset: [2],
        color: colors.gray[300],
        drawBorder: false,
        drawTicks: false,
        zeroLineColor: colors.gray[300],
        zeroLineBorderDash: [2],
        zeroLineBorderDashOffset: [2]
      },
      ticks: {
        beginAtZero: true,
        padding: 10,
        callback: function callback(value) {
          if (!(value % 10)) {
            return value;
          }
        }
      }
    }); // xAxes

    Chart.scaleService.updateScaleDefaults('category', {
      gridLines: {
        drawBorder: false,
        drawOnChartArea: false,
        drawTicks: false
      },
      ticks: {
        padding: 20
      },
      maxBarThickness: 10
    });
  }

  function toggleOptions(el) {
    var target = el.dataset.target;
    var targetEl = document.querySelector(target);
    var chart = getChartInstance(targetEl);
    var options = JSON.parse(el.dataset.add);

    if (el.checked) {
      pushOptions(chart, options);
    } else {
      popOptions(chart, options);
    }

    chart.update();
  }

  function updateOptions(el) {
    var target = el.dataset.target;
    var targetEl = document.querySelector(target);
    var chart = getChartInstance(targetEl);
    var options = JSON.parse(el.dataset.update);
    var prefix = el.dataset.prefix;
    var suffix = el.dataset.suffix;
    parseOptions(chart, options);

    if (prefix || suffix) {
      toggleTicks(chart, prefix, suffix);
    }

    chart.update();
  }

  function parseOptions(chart, options) {
    for (var item in options) {
      if (_typeof(options[item]) !== 'object') {
        chart[item] = options[item];
      } else {
        parseOptions(chart[item], options[item]);
      }
    }
  }

  function pushOptions(chart, options) {
    for (var item in options) {
      if (Array.isArray(options[item])) {
        options[item].forEach(function (data) {
          chart[item].push(data);
        });
      } else {
        pushOptions(chart[item], options[item]);
      }
    }
  }

  function popOptions(chart, options) {
    for (var item in options) {
      if (Array.isArray(options[item])) {
        options[item].forEach(function (data) {
          chart[item].pop();
        });
      } else {
        popOptions(chart[item], options[item]);
      }
    }
  }

  function toggleTicks(chart, prefix, suffix) {
    prefix = prefix ? prefix : '';
    suffix = suffix ? suffix : '';

    chart.options.scales.yAxes[0].ticks.callback = function (value) {
      if (!(value % 10)) {
        return prefix + value + suffix;
      }
    };

    chart.options.tooltips.callbacks.label = function (item, data) {
      var label = data.datasets[item.datasetIndex].label || '';
      var yLabel = item.yLabel;
      var content = '';

      if (data.datasets.length > 1) {
        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
      }

      content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
      return content;
    };
  }

  function toggleLegend(el) {
    var chart = getChartInstance(el);
    var legend = chart.generateLegend();
    var target = el.dataset.target;
    var targetEl = document.querySelector(target);
    targetEl.innerHTML = legend;
  }

  function getChartInstance(chart) {
    var chartInstance = undefined;
    Chart.helpers.each(Chart.instances, function (instance) {
      if (chart == instance.chart.canvas) {
        chartInstance = instance;
      }
    });
    return chartInstance;
  } //
  // Events
  //


  if (typeof Chart !== 'undefined') {
    // Global options
    globalOptions(); // Toggle chart

    if (toggle) {
      [].forEach.call(toggle, function (el) {
        el.addEventListener('change', function () {
          if (el.dataset.add) {
            toggleOptions(el);
          }
        });
        el.addEventListener('click', function () {
          if (el.dataset.update) {
            updateOptions(el);
          }
        });
      });
    } // Toggle lenegd


    if (legend) {
      document.addEventListener('DOMContentLoaded', function () {
        [].forEach.call(legend, function (el) {
          toggleLegend(el);
        });
      });
    }
  }
})();

/***/ }),

/***/ "./resources/assets/js/dashkit.js":
/*!****************************************!*\
  !*** ./resources/assets/js/dashkit.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// dashkit.js
// Theme module
//
 // Header
//
// Header card chart

(function () {
  //
  // Variables
  //
  var chart = document.getElementById('headerChart'); //
  // Functions
  //

  function init(chart) {
    new Chart(chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              color: '#283E59',
              zeroLineColor: '#283E59'
            },
            ticks: {
              callback: function callback(value) {
                if (!(value % 10)) {
                  return '$' + value + 'k';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function label(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Performance',
          data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40]
        }]
      }
    });
  }

  ; //
  // Events
  //

  if (typeof Chart !== 'undefined' && chart) {
    init(chart);
  }
})(); // Performance
//
// Performance card chart


(function () {
  //
  // Variables
  //
  var chart = document.getElementById('performanceChart'); //
  // Functions
  //

  function init(chart) {
    new Chart(chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            ticks: {
              callback: function callback(value) {
                if (!(value % 10)) {
                  return '$' + value + 'k';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function label(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Performance',
          data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40]
        }]
      }
    });
  } //
  // Events
  //


  if (typeof Chart !== 'undefined' && chart) {
    init(chart);
  }
})(); // Performance alias
//
// Performance alias card chart


(function () {
  //
  // Variables
  //
  var chart = document.getElementById('performanceChartAlias'); //
  // Functions
  //

  function init(chart) {
    new Chart(chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            ticks: {
              callback: function callback(value) {
                if (!(value % 10)) {
                  return '$' + value + 'k';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function label(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Performance',
          data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40]
        }]
      }
    });
  } //
  // Events
  //


  if (typeof Chart !== 'undefined' && chart) {
    init(chart);
  }
})(); // Orders
//
// Orders card chart


(function () {
  //
  // Variables
  //
  var chart = document.getElementById('ordersChart'); //
  // Functions
  //

  function init(chart) {
    new Chart(chart, {
      type: 'bar',
      options: {
        scales: {
          yAxes: [{
            ticks: {
              callback: function callback(value) {
                if (!(value % 10)) {
                  return '$' + value + 'k';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function label(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Sales',
          data: [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 32]
        }]
      }
    });
  } //
  // Events
  //


  if (typeof Chart !== 'undefined' && chart) {
    init(chart);
  }
})(); // Orders alias
//
// Orders alias card chart


(function () {
  //
  // Variables
  //
  var chart = document.getElementById('ordersChartAlias'); //
  // Functions
  //

  function init(chart) {
    new Chart(chart, {
      type: 'bar',
      options: {
        scales: {
          yAxes: [{
            ticks: {
              callback: function callback(value) {
                if (!(value % 10)) {
                  return '$' + value + 'k';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function label(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Sales',
          data: [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 32]
        }]
      }
    });
  } //
  // Events
  //


  if (typeof Chart !== 'undefined' && chart) {
    init(chart);
  }
})(); // Devices
//
// Devices card chart


(function () {
  //
  // Variables
  //
  var chart = document.getElementById('devicesChart'); //
  // Functions
  //

  function init(chart) {
    new Chart(chart, {
      type: 'doughnut',
      options: {
        tooltips: {
          callbacks: {
            title: function title(item, data) {
              var title = data.labels[item[0].index];
              return title;
            },
            label: function label(item, data) {
              var value = data.datasets[0].data[item.index];
              var content = '';
              content += '<span class="popover-body-value">' + value + '%</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: ['Desktop', 'Tablet', 'Mobile'],
        datasets: [{
          data: [60, 25, 15],
          backgroundColor: window.ChartBackgroundColors
        }]
      }
    });
  } //
  // Events
  //


  if (typeof Chart !== 'undefined' && chart) {
    init(chart);
  }
})(); // Weekly hours
//
// Weekly hours card chart


(function () {
  //
  // Variables
  //
  var chart = document.getElementById('weeklyHoursChart'); //
  // Functions
  //

  function init(chart) {
    new Chart(chart, {
      type: 'bar',
      options: {
        scales: {
          yAxes: [{
            ticks: {
              callback: function callback(value) {
                if (!(value % 10)) {
                  return value + 'hrs';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function label(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">' + yLabel + 'hrs</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
          data: [21, 12, 28, 15, 5, 12, 17, 2]
        }]
      }
    });
  } //
  // Events
  //


  if (typeof Chart !== 'undefined' && chart) {
    init(chart);
  }
})(); // Sparkline
//
// Sparkline card chart


(function () {
  //
  // Variables
  //
  var chart = document.getElementById('sparklineChart'); //
  // Functions
  //

  function init(chart) {
    new Chart(chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            display: false
          }],
          xAxes: [{
            display: false
          }]
        },
        elements: {
          line: {
            borderWidth: 2
          },
          point: {
            hoverRadius: 0
          }
        },
        tooltips: {
          custom: function custom() {
            return false;
          }
        }
      },
      data: {
        labels: new Array(12),
        datasets: [{
          data: [0, 15, 10, 25, 30, 15, 40, 50, 80, 60, 55, 65]
        }]
      }
    });
  }

  ; //
  // Events
  //

  if (typeof Chart !== 'undefined' && chart) {
    init(chart);
  }
})(); // Sparkline
//
// Sparkline card charts (gray)


(function () {
  //
  // Variables
  //
  var charts = document.querySelectorAll('#sparklineChartSocialOne, #sparklineChartSocialTwo, #sparklineChartSocialThree, #sparklineChartSocialFour'); //
  // Functions
  //

  function init(chart) {
    new Chart(chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            display: false
          }],
          xAxes: [{
            display: false
          }]
        },
        elements: {
          line: {
            borderWidth: 2,
            borderColor: '#D2DDEC'
          },
          point: {
            hoverRadius: 0
          }
        },
        tooltips: {
          custom: function custom() {
            return false;
          }
        }
      },
      data: {
        labels: new Array(12),
        datasets: [{
          data: [0, 15, 10, 25, 30, 15, 40, 50, 80, 60, 55, 65]
        }]
      }
    });
  }

  ; //
  // Events
  //

  if (typeof Chart !== 'undefined' && charts) {
    [].forEach.call(charts, function (el) {
      init(el);
    });
  }
})(); // Orders select
//
// Select all checkboxes


(function () {
  //
  // Variables
  //
  var ordersSelect = document.querySelectorAll('[name="ordersSelect"]');
  var ordersSelectAll = document.getElementById('ordersSelectAll'); //
  // Functions
  //

  function selectAll(el) {
    [].forEach.call(ordersSelect, function (checkbox) {
      checkbox.checked = el.checked;
    });
  } //
  // Events
  //


  if (ordersSelect && ordersSelectAll) {
    ordersSelectAll.addEventListener('change', function () {
      selectAll(this);
    });
  }
})();

/***/ }),

/***/ "./resources/assets/js/dropdowns.js":
/*!******************************************!*\
  !*** ./resources/assets/js/dropdowns.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// dropdowns.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var dropdown = document.querySelectorAll('.dropup, .dropright, .dropdown, .dropleft');
  var dropdownSubmenuToggle = document.querySelectorAll('.dropdown-menu .dropdown-toggle'); //
  // Functions
  //

  function toggleSubmenu(el) {
    var dropdownMenu = el.parentElement.querySelector('.dropdown-menu');
    var dropdownMenuSiblings = el.closest('.dropdown-menu').querySelectorAll('.dropdown-menu');
    [].forEach.call(dropdownMenuSiblings, function (el) {
      if (el !== dropdownMenu) {
        el.classList.remove('show');
      }
    });
    dropdownMenu.classList.toggle('show');
  }

  function hideSubmenu(el) {
    var dropdownSubmenus = el.querySelectorAll('.dropdown-menu');

    if (dropdownSubmenus) {
      [].forEach.call(dropdownSubmenus, function (el) {
        el.classList.remove('show');
      });
    }
  } //
  // Events
  //


  if (dropdownSubmenuToggle) {
    [].forEach.call(dropdownSubmenuToggle, function (el) {
      el.addEventListener('click', function (e) {
        e.preventDefault();
        toggleSubmenu(el);
        e.stopPropagation();
      });
    });
  }

  $(dropdown).on('hide.bs.dropdown', function () {
    hideSubmenu(this);
  });
})();

/***/ }),

/***/ "./resources/assets/js/dropzone.js":
/*!*****************************************!*\
  !*** ./resources/assets/js/dropzone.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

Dropzone.autoDiscover = false;
jQuery(document).ready(function () {
  //
  // Variables
  //
  var toggle = document.querySelectorAll('[data-toggle="dropzone-custom"]');
  window.uploadedDocumentMap = {}; //
  // Functions
  //

  function init(el) {
    var currentFile = undefined;
    var parentForm = $(el);
    var elementOptions = el.dataset.options;
    elementOptions = elementOptions ? JSON.parse(elementOptions) : {};
    var defaultOptions = {
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      maxFilesize: 20,
      // MB
      thumbnailWidth: 500,
      thumbnailHeight: 1000,
      resizeQuality: 1.0,
      thumbnailMethod: 'contain',
      maxThumbnailFilesize: 20,
      uploadprogress: function uploadprogress(file, progress, bytesSent) {
        if (file.previewElement) {
          var parent = $(file.previewElement).parents(".dropzone.dropzone-single");
          var parentElement = parent.get(0);
          var container = parentElement.querySelector('.progress');
          container.style.display = "block";
          var progressElement = parentElement.querySelector("[data-dz-uploadprogress]");
          progressElement.style.width = progress + "%";
          progressElement.querySelector(".progress-text").textContent = parseInt(progress) + "%";

          if (progress >= 100) {
            container.style.display = "none";
          }
        }
      },
      previewsContainer: el.querySelector('.dz-preview'),
      previewTemplate: el.querySelector('.dz-preview').innerHTML,
      init: function init() {
        this.on('addedfile', function (file) {
          var maxFiles = elementOptions.maxFiles;

          if (maxFiles == 1 && currentFile) {
            this.removeFile(currentFile);
          }

          currentFile = file;
        });
        this.on('sending', function (file, xhr, formData) {
          formData.append('path', $(el).data('image-path'));
        });
        this.on("error", function (file, message) {
          alert(message);
          this.removeFile(file);
        });
      },
      success: function success(file, response) {
        parentForm.parents('form').append('<input type="hidden" name="' + $(el).data('input-name') + '" data-target="' + file.name + '" value="' + response.name + '">');
        uploadedDocumentMap[file.name] = response.name;
      },
      removedfile: function removedfile(file) {
        file.previewElement.remove();
        $(el).removeClass('dz-max-files-reached');
        $(el).find('.progress').hide();
        var name = '';

        if (typeof file.file_name !== 'undefined') {
          name = file.file_name;
        } else {
          name = uploadedDocumentMap[file.name];
        }

        $('input:hidden[data-target="' + file.name + '"][value="' + name + '"]').remove();
      }
    };
    var options = Object.assign(elementOptions, defaultOptions); // Clear preview

    el.querySelector('.dz-preview').innerHTML = ''; // Init dropzone

    var myDropzone = new Dropzone(el, options);
    var image = $(el).data('image');

    if (image) {
      // Create the mock file:
      var mockFile = {
        name: image,
        size: 1
      }; // Call the default addedfile event handler

      myDropzone.emit("addedfile", mockFile); // And optionally show the thumbnail of the file:

      myDropzone.emit("thumbnail", mockFile, $(el).data('storage-url') + image); // Make sure that there is no progress bar, etc...

      myDropzone.emit("complete", mockFile);
      parentForm.parents('form').append('<input type="hidden" name="' + $(el).data('input-name') + '" data-target="' + image + '" value="' + image + '">');
      window.uploadedDocumentMap[image] = image;
      $(el).addClass('dz-max-files-reached');
    }
  } //
  // Events
  //


  if (typeof Dropzone !== 'undefined' && toggle) {
    [].forEach.call(toggle, function (el) {
      init(el);
    });
  }
});

/***/ }),

/***/ "./resources/assets/js/flatpickr.js":
/*!******************************************!*\
  !*** ./resources/assets/js/flatpickr.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// flatpickr.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var toggle = document.querySelectorAll('[data-toggle="flatpickr"]'); //
  // Functions
  //

  function init(el) {
    var options = el.dataset.options;
    options = options ? JSON.parse(options) : {};
    flatpickr(el, options);
  } //
  // Events
  //


  if (typeof flatpickr !== 'undefined' && toggle) {
    [].forEach.call(toggle, function (el) {
      init(el);
    });
  }
})();

/***/ }),

/***/ "./resources/assets/js/highlight.js":
/*!******************************************!*\
  !*** ./resources/assets/js/highlight.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// highlight.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var highlight = document.querySelectorAll('.highlight'); //
  // Functions
  //

  function init(el) {
    hljs.highlightBlock(el);
  } //
  // Events
  //


  if (typeof hljs !== 'undefined' && highlight) {
    [].forEach.call(highlight, function (el) {
      init(el);
    });
  }
})();

/***/ }),

/***/ "./resources/assets/js/kanban.js":
/*!***************************************!*\
  !*** ./resources/assets/js/kanban.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// kanban.js
// Dashkit module
//


(function () {
  //
  // Variables
  //
  var categories = document.querySelectorAll('.kanban-category');
  var links = document.querySelectorAll('.kanban-add-link');
  var forms = document.querySelectorAll('.kanban-add-form'); //
  // Functions
  //

  function init(categories) {
    new Draggable.Sortable(categories, {
      draggable: '.kanban-item',
      mirror: {
        constrainDimensions: true
      }
    });
  }

  function toggleItems(el) {
    var parent = el.closest('.kanban-add');
    var card = parent.querySelector('.card');
    var link = parent.querySelector('.kanban-add-link');
    var form = parent.querySelector('.kanban-add-form');
    link.classList.toggle('d-none');
    form.classList.toggle('d-none');

    if (card) {
      if (card.classList.contains('card-sm')) {
        if (card.classList.contains('card-flush')) {
          card.classList.remove('card-flush');
        } else {
          card.classList.add('card-flush');
        }
      }
    }
  } //
  // Events
  //


  if (typeof Draggable !== 'undefined' && categories) {
    init(categories);
  }

  if (links) {
    [].forEach.call(links, function (el) {
      el.addEventListener('click', function () {
        toggleItems(el);
      });
    });
  }

  if (forms) {
    [].forEach.call(forms, function (el) {
      // Reset
      el.addEventListener('reset', function () {
        toggleItems(el);
      }); // Submit

      el.addEventListener('submit', function (e) {
        e.preventDefault();
      });
    });
  }
})();

/***/ }),

/***/ "./resources/assets/js/list.js":
/*!*************************************!*\
  !*** ./resources/assets/js/list.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// list.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var toggle = document.querySelectorAll('[data-toggle="lists"]');
  var toggleSort = document.querySelectorAll('[data-toggle="lists"] [data-sort]'); //
  // Functions
  //

  function init(el) {
    var options = el.dataset.options;
    options = options ? JSON.parse(options) : {};
    new List(el, options);
  } //
  // Events
  //


  if (typeof List !== 'undefined') {
    if (toggle) {
      [].forEach.call(toggle, function (el) {
        init(el);
      });
    }

    if (toggleSort) {
      [].forEach.call(toggleSort, function (el) {
        el.addEventListener('click', function (e) {
          e.preventDefault();
        });
      });
    }
  }
})();

/***/ }),

/***/ "./resources/assets/js/map.js":
/*!************************************!*\
  !*** ./resources/assets/js/map.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//
// map.js
// Theme module
//
(function () {
  //
  // Variables
  //
  var map = document.querySelectorAll('[data-toggle="map"]');
  var accessToken = 'pk.eyJ1IjoiZ29vZHRoZW1lcyIsImEiOiJjanU5eHR4N2cybDU5NGVwOHZwNGprb3E0In0.msdw9q16dh8v4azJXUdiXg'; //
  // Methods
  //

  function init(el) {
    var elementOptions = el.dataset.options;
    elementOptions = elementOptions ? JSON.parse(elementOptions) : {};
    var defaultOptions = {
      container: el,
      style: 'mapbox://styles/mapbox/light-v9',
      scrollZoom: false,
      interactive: false
    };
    var options = Object.assign(elementOptions, defaultOptions); // Get access token

    mapboxgl.accessToken = accessToken; // Init map

    new mapboxgl.Map(options);
  } //
  // Events
  //


  if (typeof mapboxgl !== 'undefined' && map) {
    [].forEach.call(map, function (el) {
      init(el);
    });
  }
})();

/***/ }),

/***/ "./resources/assets/js/navbar.js":
/*!***************************************!*\
  !*** ./resources/assets/js/navbar.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// navbar.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var navbarCollapse = document.querySelectorAll('.navbar-nav .collapse'); //
  // Functions
  //

  function toggleAccordion(el) {
    var collapses = el.closest('.navbar-nav, .navbar-nav .nav').querySelectorAll('.collapse');
    [].forEach.call(collapses, function (currentEl) {
      if (currentEl !== el) {
        $(currentEl).collapse('hide');
      }
    });
  } //
  // Events
  //


  $(navbarCollapse).on('show.bs.collapse', function () {
    toggleAccordion(this);
  });
})();

/***/ }),

/***/ "./resources/assets/js/polyfills.js":
/*!******************************************!*\
  !*** ./resources/assets/js/polyfills.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// polyfill.js
// Theme module
//
 //
// Closest
//

(function (ELEMENT) {
  ELEMENT.matches = ELEMENT.matches || ELEMENT.mozMatchesSelector || ELEMENT.msMatchesSelector || ELEMENT.oMatchesSelector || ELEMENT.webkitMatchesSelector;

  ELEMENT.closest = ELEMENT.closest || function closest(selector) {
    if (!this) return null;
    if (this.matches(selector)) return this;

    if (!this.parentElement) {
      return null;
    } else return this.parentElement.closest(selector);
  };
})(Element.prototype);

/***/ }),

/***/ "./resources/assets/js/popover.js":
/*!****************************************!*\
  !*** ./resources/assets/js/popover.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// popover.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var toggle = document.querySelectorAll('[data-toggle="popover"]'); //
  // Functions
  //

  function init(toggle) {
    $(toggle).popover();
  } //
  // Events
  //


  if (toggle) {
    init(toggle);
  }
})();

/***/ }),

/***/ "./resources/assets/js/quill.js":
/*!**************************************!*\
  !*** ./resources/assets/js/quill.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// quill.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var toggle = document.querySelectorAll('[data-toggle="quill"]'); //
  // Functions
  //

  function init(el) {
    var elementOptions = el.dataset.options;
    elementOptions = elementOptions ? JSON.parse(elementOptions) : {};
    var defaultOptions = {
      modules: {
        toolbar: [['bold', 'italic'], ['link', 'blockquote', 'code', 'image'], [{
          'list': 'ordered'
        }, {
          'list': 'bullet'
        }]]
      },
      theme: 'snow'
    };
    var options = Object.assign(elementOptions, defaultOptions);
    new Quill(el, options);
  } //
  // Events
  //


  if (typeof Quill !== 'undefined' && toggle) {
    [].forEach.call(toggle, function (el) {
      init(el);
    });
  }
})();

/***/ }),

/***/ "./resources/assets/js/select2.js":
/*!****************************************!*\
  !*** ./resources/assets/js/select2.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// select2.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var toggle = document.querySelectorAll('[data-toggle="select"]'); //
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
  } //
  // Events
  //


  if (jQuery().select2 && toggle) {
    [].forEach.call(toggle, function (el) {
      init(el);
    });
  }
})();

/***/ }),

/***/ "./resources/assets/js/tooltip.js":
/*!****************************************!*\
  !*** ./resources/assets/js/tooltip.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// tooltip.js
// Theme module
//


(function () {
  //
  // Variables
  //
  var toggle = document.querySelectorAll('[data-toggle="tooltip"]'); //
  // Functions
  //

  function init(toggle) {
    $(toggle).tooltip();
  } //
  // Events
  //


  if (toggle) {
    init(toggle);
  }
})();

/***/ }),

/***/ "./resources/assets/js/user.js":
/*!*************************************!*\
  !*** ./resources/assets/js/user.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// user.js
// User scripts
//


function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

window.dd = function (data) {
  console.log(data);
};

var TableCheckboxManager =
/*#__PURE__*/
function () {
  function TableCheckboxManager() {
    _classCallCheck(this, TableCheckboxManager);

    this.init();
  }

  _createClass(TableCheckboxManager, [{
    key: "init",
    value: function init() {
      $('body').on('click', '.table-checkbox-manager', function (event) {
        var el = $(event.target);
        var tableCheckboxes = el.parents('table').find('.table-checkbox-item');
        tableCheckboxes.prop('checked', el.is(':checked'));
        tableCheckboxes.trigger('change');
      });
      $('body').on('change', '.table-checkbox-item', function (event) {
        var el = $(event.target);
        var checked = el.is(':checked');
        var checkedItems = el.parents('table').find('.table-checkbox-item:checked');
        var checkboxManager = el.parents('table').find('.table-checkbox-manager');

        if (checkedItems.length == 0) {
          checkboxManager.prop('checked', false).prop('indeterminate', false);
        } else if (checkedItems.length == el.parents('table').find('.table-checkbox-item').length) {
          checkboxManager.prop('checked', true).prop('indeterminate', false);
        } else {
          checkboxManager.prop('indeterminate', true);
        }

        if (checked) {
          el.parents('tr').addClass('bg-light');
        } else {
          el.parents('tr').removeClass('bg-light');
        }
      });
      $('.table-checkbox-item').trigger('change');
    }
  }]);

  return TableCheckboxManager;
}();

window.slugify = function (text) {
  var separator = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '-';
  text = text.toString().toLowerCase().trim();
  var sets = [{
    to: 'a',
    from: '[ÀÁÂÃÄÅÆĀĂĄẠẢẤẦẨẪẬẮẰẲẴẶ]'
  }, {
    to: 'c',
    from: '[ÇĆĈČ]'
  }, {
    to: 'd',
    from: '[ÐĎĐÞ]'
  }, {
    to: 'e',
    from: '[ÈÉÊËĒĔĖĘĚẸẺẼẾỀỂỄỆ]'
  }, {
    to: 'g',
    from: '[ĜĞĢǴ]'
  }, {
    to: 'h',
    from: '[ĤḦ]'
  }, {
    to: 'i',
    from: '[ÌÍÎÏĨĪĮİỈỊ]'
  }, {
    to: 'j',
    from: '[Ĵ]'
  }, {
    to: 'ij',
    from: '[Ĳ]'
  }, {
    to: 'k',
    from: '[Ķ]'
  }, {
    to: 'l',
    from: '[ĹĻĽŁ]'
  }, {
    to: 'm',
    from: '[Ḿ]'
  }, {
    to: 'n',
    from: '[ÑŃŅŇ]'
  }, {
    to: 'o',
    from: '[ÒÓÔÕÖØŌŎŐỌỎỐỒỔỖỘỚỜỞỠỢǪǬƠ]'
  }, {
    to: 'oe',
    from: '[Œ]'
  }, {
    to: 'p',
    from: '[ṕ]'
  }, {
    to: 'r',
    from: '[ŔŖŘ]'
  }, {
    to: 's',
    from: '[ßŚŜŞŠ]'
  }, {
    to: 't',
    from: '[ŢŤ]'
  }, {
    to: 'u',
    from: '[ÙÚÛÜŨŪŬŮŰŲỤỦỨỪỬỮỰƯ]'
  }, {
    to: 'w',
    from: '[ẂŴẀẄ]'
  }, {
    to: 'x',
    from: '[ẍ]'
  }, {
    to: 'y',
    from: '[ÝŶŸỲỴỶỸ]'
  }, {
    to: 'z',
    from: '[ŹŻŽ]'
  }, {
    to: '-',
    from: '[·/_,:;\']'
  }];
  sets.forEach(function (set) {
    text = text.replace(new RegExp(set.from, 'gi'), set.to);
  });
  text = text.toString().toLowerCase().replace(/\s+/g, '-') // Replace spaces with -
  .replace(/&/g, '-and-') // Replace & with 'and'
  .replace(/[^\w\-]+/g, '') // Remove all non-word chars
  .replace(/\--+/g, '-') // Replace multiple - with single -
  .replace(/^-+/, '') // Trim - from start of text
  .replace(/-+$/, ''); // Trim - from end of text

  if (typeof separator !== 'undefined' && separator !== '-') {
    text = text.replace(/-/g, separator);
  }

  return text;
};

jQuery(document).ready(function ($) {
  /*
   |--------------------------------------------------------------------
   | Vendor Plugins
   |--------------------------------------------------------------------
   */
  new TableCheckboxManager(); // Currency
  // $('.input-currency').mask('#.##0', { reverse: true });

  /*
   |--------------------------------------------------------------------
   | Bootstrap Components
   |--------------------------------------------------------------------
   */
  // Modal
  // $('.modal[data-show="true"]').modal('show');
  // Tooltip
  // $('[data-toggle="tooltip"]').tooltip();
  // Popover
  // data-popover-content="#popover-container"
  // $('[data-toggle="popover"]').popover({
  // 	html : true,
  // 	trigger: 'focus',
  // 	container: '.root',
  // 	content: function() {
  // 		var content = $(this).attr("data-popover-content");
  // 		return $(content).children(".popover-body").html();
  // 	},
  // 	title: function() {
  // 		var title = $(this).attr("data-popover-content");
  // 		return $(title).children(".popover-heading").html();
  // 	}
  //    });

  /*
   |--------------------------------------------------------------------
   | Resource Form
   |--------------------------------------------------------------------
   */
  // Autofocus Form
  // $('.main-content form input:text:visible:first').focus();
  // Delete File
  // $('.upload-wrapper .delete-file').on('click', function (event) {
  // 	let el = $(this);
  // 	let parent = el.parents('.upload-wrapper');
  // 	let filePreview = parent.find('.file-preview');
  // 	let uploadBox = parent.find('.upload-box');
  // 	filePreview.remove();
  // 	uploadBox.removeClass('d-none');
  // });
  // Delete Record

  $('body').on('click', '.delete-record', function (event) {
    event.preventDefault();
    var el = $(this);
    var form = $(el.data('form'));
    var forceDelete = el.data('delete') == 'hard';
    var title = forceDelete ? 'Estás seguro de borrar este registro?' : 'Estás seguro de inactivar este registro?';
    var message = forceDelete ? 'Una vez eliminado, ya no podrás recuperar este dato y todos los datos relacionados serán borrados de la Base de Datos!' : 'Para activar de vuelta este registro puedes usar el botón Restaurar.';
    var modal = bootbox.dialog({
      title: title,
      message: message,
      buttons: {
        cancel: {
          label: 'Cancelar',
          className: 'btn-white btn-cancel-modal'
        },
        confirm: {
          label: 'Sí, eliminar registro',
          className: 'btn-danger btn-activity btn-loading',
          callback: function callback() {
            form.submit();
          }
        }
      },
      animate: false,
      closeButton: false
    });

    if (forceDelete) {
      modal.find('.modal-header').addClass('bg-danger text-white');
    }

    modal.init();
  }); // Input File
  // $('.custom-file input[type="file"]').change(function(event){
  // 	let el = $(this);
  // 	let filename = event.target.files[0].name;
  // 	el.parent().find('.custom-file-label').html(filename);
  // });
  // feature detection for drag&drop upload

  var isAdvancedUpload = function () {
    var div = document.createElement('div');
    return ('draggable' in div || 'ondragstart' in div && 'ondrop' in div) && 'FormData' in window && 'FileReader' in window;
  }();

  $('form').each(function () {
    var $form = $(this),
        $wrapper = $form.find('.upload-wrapper'),
        $box = $wrapper.find('.upload-box'),
        $input = $box.find('input[type="file"]'),
        $multipleAttr = $input.attr('multiple'),
        $label = $wrapper.find('.upload-dragndrop'),
        $errorMsg = $wrapper.find('.upload-error span'),
        $restart = $wrapper.find('.upload-restart'),
        droppedFiles = false,
        $fileHasMultipleAttr = _typeof($multipleAttr) !== ( true ? "undefined" : undefined) && $multipleAttr !== false,
        showFiles = function showFiles(files, isMultiple) {
      $label.text(isMultiple && files.length > 1 ? ($input.attr('data-multiple-caption') || '').replace('{count}', files.length) : files[0].name);
    };

    $input.on('change', function (e) {
      showFiles(e.target.files, $fileHasMultipleAttr);
    }); // drag&drop files if the feature is available

    if (isAdvancedUpload) {
      $wrapper.addClass('has-advanced-upload') // letting the CSS part to know drag&drop is supported by the browser
      .on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
        // preventing the unwanted behaviours
        e.preventDefault();
        e.stopPropagation();
      }).on('dragover dragenter', function () {
        $box.addClass('is-dragover');
      }).on('dragleave dragend drop', function () {
        $box.removeClass('is-dragover');
      }).on('drop', function (e) {
        droppedFiles = e.originalEvent.dataTransfer.files;
        showFiles(droppedFiles, $fileHasMultipleAttr);
        $input.get(0).files = droppedFiles;
      });
    } // Firefox focus bug fix for file input


    $input.on('focus', function () {
      $input.addClass('has-focus');
    }).on('blur', function () {
      $input.removeClass('has-focus');
    });
  });
});

/***/ }),

/***/ "./resources/assets/scss/app.scss":
/*!****************************************!*\
  !*** ./resources/assets/scss/app.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************!*\
  !*** multi ./resources/assets/js/app.js ./resources/assets/scss/app.scss ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/zerokb/Documents/Code/www/nexus/resources/assets/js/app.js */"./resources/assets/js/app.js");
module.exports = __webpack_require__(/*! /Users/zerokb/Documents/Code/www/nexus/resources/assets/scss/app.scss */"./resources/assets/scss/app.scss");


/***/ })

/******/ });