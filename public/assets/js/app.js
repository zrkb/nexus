!function(e){var t={};function a(o){if(t[o])return t[o].exports;var n=t[o]={i:o,l:!1,exports:{}};return e[o].call(n.exports,n,n.exports,a),n.l=!0,n.exports}a.m=e,a.c=t,a.d=function(e,t,o){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(a.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)a.d(o,n,function(t){return e[t]}.bind(null,n));return o},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/",a(a.s=0)}({0:function(e,t,a){a("JO1w"),a("C0yZ"),e.exports=a("hHal")},"1omZ":function(e,t,a){"use strict";var o;o=document.querySelectorAll('[data-toggle="flatpickr"]'),"undefined"!=typeof flatpickr&&o&&[].forEach.call(o,(function(e){!function(e){var t=e.dataset.options;t=t?JSON.parse(t):{},flatpickr(e,t)}(e)}))},"49zD":function(e,t){Dropzone.autoDiscover=!1,jQuery(document).ready((function(){var e=document.querySelectorAll('[data-toggle="dropzone-custom"]');window.uploadedDocumentMap={},"undefined"!=typeof Dropzone&&e&&[].forEach.call(e,(function(e){!function(e){var t=void 0,a=$(e),o=e.dataset.options;o=o?JSON.parse(o):{};var n={headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},maxFilesize:20,thumbnailWidth:500,thumbnailHeight:1e3,resizeQuality:1,thumbnailMethod:"contain",maxThumbnailFilesize:20,uploadprogress:function(e,t,a){if(e.previewElement){var o=$(e.previewElement).parents(".dropzone.dropzone-single").get(0),n=o.querySelector(".progress");n.style.display="block";var r=o.querySelector("[data-dz-uploadprogress]");r.style.width=t+"%",r.querySelector(".progress-text").textContent=parseInt(t)+"%",t>=100&&(n.style.display="none")}},previewsContainer:e.querySelector(".dz-preview"),previewTemplate:e.querySelector(".dz-preview").innerHTML,init:function(){this.on("addedfile",(function(e){1==o.maxFiles&&t&&this.removeFile(t),t=e})),this.on("sending",(function(t,a,o){o.append("path",$(e).data("image-path"))})),this.on("error",(function(e,t){alert(t),this.removeFile(e)}))},success:function(t,o){a.parents("form").append('<input type="hidden" name="'+$(e).data("input-name")+'" data-target="'+t.name+'" value="'+o.name+'">'),uploadedDocumentMap[t.name]=o.name},removedfile:function(t){t.previewElement.remove(),$(e).removeClass("dz-max-files-reached"),$(e).find(".progress").hide();var a="";a=void 0!==t.file_name?t.file_name:uploadedDocumentMap[t.name],$('input:hidden[data-target="'+t.name+'"][value="'+a+'"]').remove()}},r=Object.assign(o,n);e.querySelector(".dz-preview").innerHTML="";var l=new Dropzone(e,r),s=$(e).data("image");if(s){var i={name:s,size:1};l.emit("addedfile",i),l.emit("thumbnail",i,$(e).data("storage-url")+s),l.emit("complete",i),a.parents("form").append('<input type="hidden" name="'+$(e).data("input-name")+'" data-target="'+s+'" value="'+s+'">'),window.uploadedDocumentMap[s]=s,$(e).addClass("dz-max-files-reached")}}(e)}))}))},"4RBU":function(e,t,a){"use strict";var o,n;o=document.querySelectorAll('[data-toggle="lists"]'),n=document.querySelectorAll('[data-toggle="lists"] [data-sort]'),"undefined"!=typeof List&&(o&&[].forEach.call(o,(function(e){!function(e){var t=e.dataset.options;t=t?JSON.parse(t):{},new List(e,t)}(e)})),n&&[].forEach.call(n,(function(e){e.addEventListener("click",(function(e){e.preventDefault()}))})))},"6y0b":function(e,t,a){"use strict";var o;o=document.querySelectorAll('[data-toggle="select"]'),jQuery().select2&&o&&[].forEach.call(o,(function(e){!function(e){var t=e.dataset.options;t=t?JSON.parse(t):{};var a={tags:$(e).data("dynamic-tags")||!1},o=Object.assign(t,a);console.log($(e).data("dynamic-tags")),console.log(o),$(e).select2(o)}(e)}))},"8Io2":function(e,t){var a;a=document.querySelectorAll('[data-toggle="map"]'),"undefined"!=typeof mapboxgl&&a&&[].forEach.call(a,(function(e){!function(e){var t=e.dataset.options;t=t?JSON.parse(t):{};var a={container:e,style:"mapbox://styles/mapbox/light-v9",scrollZoom:!1,interactive:!1},o=Object.assign(t,a);mapboxgl.accessToken="pk.eyJ1IjoiZ29vZHRoZW1lcyIsImEiOiJjanU5eHR4N2cybDU5NGVwOHZwNGprb3E0In0.msdw9q16dh8v4azJXUdiXg",new mapboxgl.Map(o)}(e)}))},C0yZ:function(e,t){},E4TI:function(e,t,a){"use strict";var o;(o=Element.prototype).matches=o.matches||o.mozMatchesSelector||o.msMatchesSelector||o.oMatchesSelector||o.webkitMatchesSelector,o.closest=o.closest||function(e){return this?this.matches(e)?this:this.parentElement?this.parentElement.closest(e):null:null}},GtIW:function(e,t,a){"use strict";var o;o=document.querySelectorAll('[data-toggle="autosize"]'),"undefined"!=typeof autosize&&o&&[].forEach.call(o,(function(e){!function(e){autosize(e)}(e)}))},HVTd:function(e,t,a){"use strict";var o;o=document.querySelectorAll(".highlight"),"undefined"!=typeof hljs&&o&&[].forEach.call(o,(function(e){!function(e){hljs.highlightBlock(e)}(e)}))},IsUf:function(e,t,a){"use strict";var o;o=document.querySelectorAll(".navbar-nav .collapse"),$(o).on("show.bs.collapse",(function(){var e,t;t=(e=this).closest(".navbar-nav, .navbar-nav .nav").querySelectorAll(".collapse"),[].forEach.call(t,(function(t){t!==e&&$(t).collapse("hide")}))}))},JO1w:function(e,t,a){"use strict";a.r(t);a("GtIW"),a("ozCT"),a("kyR3"),a("zeYW"),a("49zD"),a("1omZ"),a("HVTd"),a("aNbZ"),a("4RBU"),a("8Io2"),a("IsUf"),a("E4TI"),a("rF0G"),a("XMBn"),a("6y0b"),a("gfTo"),a("gq9z"),function(){var e=document.querySelector("#demoForm"),t=(document.querySelector("#topnav"),document.querySelector("#topbar"),document.querySelector("#sidebar"),document.querySelector("#sidebarSmall"),document.querySelector("#sidebarUser"),document.querySelector("#sidebarSmallUser"),document.querySelector("#sidebarSizeContainer")),a=document.querySelectorAll('input[name="navPosition"]'),o=(document.querySelectorAll('[class^="container"]'),document.querySelectorAll("#stylesheetLight, #stylesheetDark"),document.querySelector("#stylesheetLight"),document.querySelector("#stylesheetDark"),{colorScheme:localStorage.getItem("dashkitColorScheme")?localStorage.getItem("dashkitColorScheme"):"light",navPosition:localStorage.getItem("dashkitNavPosition")?localStorage.getItem("dashkitNavPosition"):"sidenav",navColor:localStorage.getItem("dashkitNavColor")?localStorage.getItem("dashkitNavColor"):"default",sidebarSize:localStorage.getItem("dashkitSidebarSize")?localStorage.getItem("dashkitSidebarSize"):"base"});function n(e){"topnav"==e?$(t).collapse("hide"):$(t).collapse("show")}(function(){for(var e=window.location.search.substring(1).split("&"),t=0;t<e.length;t++){var a=e[t].split("="),n=a[0],r=a[1];"colorScheme"!=n&&"navPosition"!=n&&"navColor"!=n&&"sidebarSize"!=n||(localStorage.setItem("dashkit"+n.charAt(0).toUpperCase()+n.slice(1),r),o[n]=r)}})(),function(e,t,a,o,n){$(e).find('[name="colorScheme"][value="'+t+'"]').closest(".btn").button("toggle"),$(e).find('[name="navPosition"][value="'+a+'"]').closest(".btn").button("toggle"),$(e).find('[name="navColor"][value="'+o+'"]').closest(".btn").button("toggle"),$(e).find('[name="sidebarSize"][value="'+n+'"]').closest(".btn").button("toggle")}(e,o.colorScheme,o.navPosition,o.navColor,o.sidebarSize),n(o.navPosition),document.body.style.display="block",e&&(e.addEventListener("submit",(function(t){t.preventDefault(),function(e){var t=e.querySelector('[name="colorScheme"]:checked').value,a=e.querySelector('[name="navPosition"]:checked').value,o=e.querySelector('[name="navColor"]:checked').value,n=e.querySelector('[name="sidebarSize"]:checked').value;localStorage.setItem("dashkitColorScheme",t),localStorage.setItem("dashkitNavPosition",a),localStorage.setItem("dashkitNavColor",o),localStorage.setItem("dashkitSidebarSize",n),window.location=window.location.pathname}(e)})),[].forEach.call(a,(function(e){e.parentElement.addEventListener("click",(function(){n(e.value)}))})))}()},XMBn:function(e,t,a){"use strict";var o;o=document.querySelectorAll('[data-toggle="quill"]'),"undefined"!=typeof Quill&&o&&[].forEach.call(o,(function(e){!function(e){var t=e.dataset.options;t=t?JSON.parse(t):{};var a=Object.assign(t,{modules:{toolbar:[["bold","italic"],["link","blockquote","code","image"],[{list:"ordered"},{list:"bullet"}]]},theme:"snow"});new Quill(e,a)}(e)}))},aNbZ:function(e,t,a){"use strict";!function(){var e=document.querySelectorAll(".kanban-category"),t=document.querySelectorAll(".kanban-add-link"),a=document.querySelectorAll(".kanban-add-form");function o(e){var t=e.closest(".kanban-add"),a=t.querySelector(".card"),o=t.querySelector(".kanban-add-link"),n=t.querySelector(".kanban-add-form");o.classList.toggle("d-none"),n.classList.toggle("d-none"),a&&a.classList.contains("card-sm")&&(a.classList.contains("card-flush")?a.classList.remove("card-flush"):a.classList.add("card-flush"))}"undefined"!=typeof Draggable&&e&&function(e){new Draggable.Sortable(e,{draggable:".kanban-item",mirror:{constrainDimensions:!0}})}(e),t&&[].forEach.call(t,(function(e){e.addEventListener("click",(function(){o(e)}))})),a&&[].forEach.call(a,(function(e){e.addEventListener("reset",(function(){o(e)})),e.addEventListener("submit",(function(e){e.preventDefault()}))}))}()},gfTo:function(e,t,a){"use strict";var o;(o=document.querySelectorAll('[data-toggle="tooltip"]'))&&function(e){$(e).tooltip()}(o)},gq9z:function(e,t,a){"use strict";function o(e){return(o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function n(e,t){for(var a=0;a<t.length;a++){var o=t[a];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}window.dd=function(e){console.log(e)};var r=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.init()}var t,a,o;return t=e,(a=[{key:"init",value:function(){$("body").on("click",".table-checkbox-manager",(function(e){var t=$(e.target),a=t.parents("table").find(".table-checkbox-item");a.prop("checked",t.is(":checked")),a.trigger("change")})),$("body").on("change",".table-checkbox-item",(function(e){var t=$(e.target),a=t.is(":checked"),o=t.parents("table").find(".table-checkbox-item:checked"),n=t.parents("table").find(".table-checkbox-manager");0==o.length?n.prop("checked",!1).prop("indeterminate",!1):o.length==t.parents("table").find(".table-checkbox-item").length?n.prop("checked",!0).prop("indeterminate",!1):n.prop("indeterminate",!0),a?t.parents("tr").addClass("bg-light"):t.parents("tr").removeClass("bg-light")})),$(".table-checkbox-item").trigger("change")}}])&&n(t.prototype,a),o&&n(t,o),e}();window.slugify=function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"-";e=e.toString().toLowerCase().trim();var a=[{to:"a",from:"[ÀÁÂÃÄÅÆĀĂĄẠẢẤẦẨẪẬẮẰẲẴẶ]"},{to:"c",from:"[ÇĆĈČ]"},{to:"d",from:"[ÐĎĐÞ]"},{to:"e",from:"[ÈÉÊËĒĔĖĘĚẸẺẼẾỀỂỄỆ]"},{to:"g",from:"[ĜĞĢǴ]"},{to:"h",from:"[ĤḦ]"},{to:"i",from:"[ÌÍÎÏĨĪĮİỈỊ]"},{to:"j",from:"[Ĵ]"},{to:"ij",from:"[Ĳ]"},{to:"k",from:"[Ķ]"},{to:"l",from:"[ĹĻĽŁ]"},{to:"m",from:"[Ḿ]"},{to:"n",from:"[ÑŃŅŇ]"},{to:"o",from:"[ÒÓÔÕÖØŌŎŐỌỎỐỒỔỖỘỚỜỞỠỢǪǬƠ]"},{to:"oe",from:"[Œ]"},{to:"p",from:"[ṕ]"},{to:"r",from:"[ŔŖŘ]"},{to:"s",from:"[ßŚŜŞŠ]"},{to:"t",from:"[ŢŤ]"},{to:"u",from:"[ÙÚÛÜŨŪŬŮŰŲỤỦỨỪỬỮỰƯ]"},{to:"w",from:"[ẂŴẀẄ]"},{to:"x",from:"[ẍ]"},{to:"y",from:"[ÝŶŸỲỴỶỸ]"},{to:"z",from:"[ŹŻŽ]"},{to:"-",from:"[·/_,:;']"}];return a.forEach((function(t){e=e.replace(new RegExp(t.from,"gi"),t.to)})),e=e.toString().toLowerCase().replace(/\s+/g,"-").replace(/&/g,"-and-").replace(/[^\w\-]+/g,"").replace(/\--+/g,"-").replace(/^-+/,"").replace(/-+$/,""),void 0!==t&&"-"!==t&&(e=e.replace(/-/g,t)),e},jQuery(document).ready((function(e){new r,e("body").on("click",".delete-record",(function(t){t.preventDefault();var a=e(this),o=e(a.data("form")),n="hard"==a.data("delete"),r=n?"Estás seguro de borrar este registro?":"Estás seguro de inactivar este registro?",l=n?"Una vez eliminado, ya no podrás recuperar este dato y todos los datos relacionados serán borrados de la Base de Datos!":"Para activar de vuelta este registro puedes usar el botón Restaurar.",s=bootbox.dialog({title:r,message:l,buttons:{cancel:{label:"Cancelar",className:"btn-white btn-cancel-modal"},confirm:{label:"Sí, eliminar registro",className:"btn-danger btn-activity btn-loading",callback:function(){o.submit()}}},animate:!1,closeButton:!1});n&&s.find(".modal-header").addClass("bg-danger text-white"),s.init()}));var t,a=("draggable"in(t=document.createElement("div"))||"ondragstart"in t&&"ondrop"in t)&&"FormData"in window&&"FileReader"in window;e("form").each((function(){var t=e(this).find(".upload-wrapper"),n=t.find(".upload-box"),r=n.find('input[type="file"]'),l=r.attr("multiple"),s=t.find(".upload-dragndrop"),i=(t.find(".upload-error span"),t.find(".upload-restart"),!1),c="undefined"!==o(l)&&!1!==l,d=function(e,t){s.text(t&&e.length>1?(r.attr("data-multiple-caption")||"").replace("{count}",e.length):e[0].name)};r.on("change",(function(e){d(e.target.files,c)})),a&&t.addClass("has-advanced-upload").on("drag dragstart dragend dragover dragenter dragleave drop",(function(e){e.preventDefault(),e.stopPropagation()})).on("dragover dragenter",(function(){n.addClass("is-dragover")})).on("dragleave dragend drop",(function(){n.removeClass("is-dragover")})).on("drop",(function(e){i=e.originalEvent.dataTransfer.files,d(i,c),r.get(0).files=i})),r.on("focus",(function(){r.addClass("has-focus")})).on("blur",(function(){r.removeClass("has-focus")}))}))}))},hHal:function(e,t){},kyR3:function(e,t,a){"use strict";var o,n,r,l;o=document.getElementById("headerChart"),"undefined"!=typeof Chart&&o&&function(e){new Chart(e,{type:"line",options:{scales:{yAxes:[{gridLines:{color:"#283E59",zeroLineColor:"#283E59"},ticks:{callback:function(e){if(!(e%10))return"$"+e+"k"}}}]},tooltips:{callbacks:{label:function(e,t){var a=t.datasets[e.datasetIndex].label||"",o=e.yLabel,n="";return t.datasets.length>1&&(n+='<span class="popover-body-label mr-auto">'+a+"</span>"),n+='<span class="popover-body-value">$'+o+"k</span>"}}}},data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"Performance",data:[0,10,5,15,10,20,15,25,20,30,25,40]}]}})}(o),function(){var e=document.getElementById("performanceChart");"undefined"!=typeof Chart&&e&&function(e){new Chart(e,{type:"line",options:{scales:{yAxes:[{ticks:{callback:function(e){if(!(e%10))return"$"+e+"k"}}}]},tooltips:{callbacks:{label:function(e,t){var a=t.datasets[e.datasetIndex].label||"",o=e.yLabel,n="";return t.datasets.length>1&&(n+='<span class="popover-body-label mr-auto">'+a+"</span>"),n+='<span class="popover-body-value">$'+o+"k</span>"}}}},data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"Performance",data:[0,10,5,15,10,20,15,25,20,30,25,40]}]}})}(e)}(),function(){var e=document.getElementById("performanceChartAlias");"undefined"!=typeof Chart&&e&&function(e){new Chart(e,{type:"line",options:{scales:{yAxes:[{ticks:{callback:function(e){if(!(e%10))return"$"+e+"k"}}}]},tooltips:{callbacks:{label:function(e,t){var a=t.datasets[e.datasetIndex].label||"",o=e.yLabel,n="";return t.datasets.length>1&&(n+='<span class="popover-body-label mr-auto">'+a+"</span>"),n+='<span class="popover-body-value">$'+o+"k</span>"}}}},data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"Performance",data:[0,10,5,15,10,20,15,25,20,30,25,40]}]}})}(e)}(),function(){var e=document.getElementById("ordersChart");"undefined"!=typeof Chart&&e&&function(e){new Chart(e,{type:"bar",options:{scales:{yAxes:[{ticks:{callback:function(e){if(!(e%10))return"$"+e+"k"}}}]},tooltips:{callbacks:{label:function(e,t){var a=t.datasets[e.datasetIndex].label||"",o=e.yLabel,n="";return t.datasets.length>1&&(n+='<span class="popover-body-label mr-auto">'+a+"</span>"),n+='<span class="popover-body-value">$'+o+"k</span>"}}}},data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"Sales",data:[25,20,30,22,17,10,18,26,28,26,20,32]}]}})}(e)}(),function(){var e=document.getElementById("ordersChartAlias");"undefined"!=typeof Chart&&e&&function(e){new Chart(e,{type:"bar",options:{scales:{yAxes:[{ticks:{callback:function(e){if(!(e%10))return"$"+e+"k"}}}]},tooltips:{callbacks:{label:function(e,t){var a=t.datasets[e.datasetIndex].label||"",o=e.yLabel,n="";return t.datasets.length>1&&(n+='<span class="popover-body-label mr-auto">'+a+"</span>"),n+='<span class="popover-body-value">$'+o+"k</span>"}}}},data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"Sales",data:[25,20,30,22,17,10,18,26,28,26,20,32]}]}})}(e)}(),function(){var e=document.getElementById("devicesChart");"undefined"!=typeof Chart&&e&&function(e){new Chart(e,{type:"doughnut",options:{tooltips:{callbacks:{title:function(e,t){var a=t.labels[e[0].index];return a},label:function(e,t){var a="";return a+='<span class="popover-body-value">'+t.datasets[0].data[e.index]+"%</span>"}}}},data:{labels:["Desktop","Tablet","Mobile"],datasets:[{data:[60,25,15],backgroundColor:window.ChartBackgroundColors}]}})}(e)}(),function(){var e=document.getElementById("weeklyHoursChart");"undefined"!=typeof Chart&&e&&function(e){new Chart(e,{type:"bar",options:{scales:{yAxes:[{ticks:{callback:function(e){if(!(e%10))return e+"hrs"}}}]},tooltips:{callbacks:{label:function(e,t){var a=t.datasets[e.datasetIndex].label||"",o=e.yLabel,n="";return t.datasets.length>1&&(n+='<span class="popover-body-label mr-auto">'+a+"</span>"),n+='<span class="popover-body-value">'+o+"hrs</span>"}}}},data:{labels:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],datasets:[{data:[21,12,28,15,5,12,17,2]}]}})}(e)}(),function(){var e=document.getElementById("sparklineChart");"undefined"!=typeof Chart&&e&&function(e){new Chart(e,{type:"line",options:{scales:{yAxes:[{display:!1}],xAxes:[{display:!1}]},elements:{line:{borderWidth:2},point:{hoverRadius:0}},tooltips:{custom:function(){return!1}}},data:{labels:new Array(12),datasets:[{data:[0,15,10,25,30,15,40,50,80,60,55,65]}]}})}(e)}(),n=document.querySelectorAll("#sparklineChartSocialOne, #sparklineChartSocialTwo, #sparklineChartSocialThree, #sparklineChartSocialFour"),"undefined"!=typeof Chart&&n&&[].forEach.call(n,(function(e){!function(e){new Chart(e,{type:"line",options:{scales:{yAxes:[{display:!1}],xAxes:[{display:!1}]},elements:{line:{borderWidth:2,borderColor:"#D2DDEC"},point:{hoverRadius:0}},tooltips:{custom:function(){return!1}}},data:{labels:new Array(12),datasets:[{data:[0,15,10,25,30,15,40,50,80,60,55,65]}]}})}(e)})),r=document.querySelectorAll('[name="ordersSelect"]'),l=document.getElementById("ordersSelectAll"),r&&l&&l.addEventListener("change",(function(){var e;e=this,[].forEach.call(r,(function(t){t.checked=e.checked}))}))},ozCT:function(e,t,a){"use strict";function o(e){return(o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}window.ChartBackgroundColors=["#2C7BE5","#5EA2EF","#7FBCF7","#AAD8FC","#D4EDFD","#66CC1E","#94E050","#B5EF75","#D6F9A4","#EDFCD1","#F7960E","#FAB749","#FCCD6D","#FEE29E","#FEF2CE","#FF3330","#FF7363","#FF9982","#FFC2AC","#FFE4D5"],function(){var e={300:"#E3EBF6",600:"#95AAC9",700:"#6E84A3",800:"#152E4D",900:"#283E59"},t={100:"#D2DDEC",300:"#A6C5F7",700:"#2C7BE5"},a="#FFFFFF",n="transparent",r="Cerebri Sans",l=document.querySelectorAll('[data-toggle="chart"]'),s=document.querySelectorAll('[data-toggle="legend"]');function i(e){var t=e.dataset.target,a=d(document.querySelector(t)),o=JSON.parse(e.dataset.add);e.checked?function e(t,a){for(var o in a)Array.isArray(a[o])?a[o].forEach((function(e){t[o].push(e)})):e(t[o],a[o])}(a,o):function e(t,a){for(var o in a)Array.isArray(a[o])?a[o].forEach((function(e){t[o].pop()})):e(t[o],a[o])}(a,o),a.update()}function c(e){var t=e.dataset.target,a=d(document.querySelector(t)),n=JSON.parse(e.dataset.update),r=e.dataset.prefix,l=e.dataset.suffix;!function e(t,a){for(var n in a)"object"!==o(a[n])?t[n]=a[n]:e(t[n],a[n])}(a,n),(r||l)&&function(e,t,a){t=t||"",a=a||"",e.options.scales.yAxes[0].ticks.callback=function(e){if(!(e%10))return t+e+a},e.options.tooltips.callbacks.label=function(e,o){var n=o.datasets[e.datasetIndex].label||"",r=e.yLabel,l="";return o.datasets.length>1&&(l+='<span class="popover-body-label mr-auto">'+n+"</span>"),l+='<span class="popover-body-value">'+t+r+a+"</span>"}}(a,r,l),a.update()}function d(e){var t=void 0;return Chart.helpers.each(Chart.instances,(function(a){e==a.chart.canvas&&(t=a)})),t}"undefined"!=typeof Chart&&(Chart.defaults.global.responsive=!0,Chart.defaults.global.maintainAspectRatio=!1,Chart.defaults.global.defaultColor=e[600],Chart.defaults.global.defaultFontColor=e[600],Chart.defaults.global.defaultFontFamily=r,Chart.defaults.global.defaultFontSize=13,Chart.defaults.global.layout.padding=0,Chart.defaults.global.legend.display=!1,Chart.defaults.global.legend.position="bottom",Chart.defaults.global.legend.labels.usePointStyle=!0,Chart.defaults.global.legend.labels.padding=16,Chart.defaults.global.elements.point.radius=0,Chart.defaults.global.elements.point.backgroundColor=t[700],Chart.defaults.global.elements.line.tension=.4,Chart.defaults.global.elements.line.borderWidth=3,Chart.defaults.global.elements.line.borderColor=t[700],Chart.defaults.global.elements.line.backgroundColor=n,Chart.defaults.global.elements.line.borderCapStyle="rounded",Chart.defaults.global.elements.rectangle.backgroundColor=t[700],Chart.defaults.global.elements.arc.backgroundColor=t[700],Chart.defaults.global.elements.arc.borderColor=a,Chart.defaults.global.elements.arc.borderWidth=4,Chart.defaults.global.elements.arc.hoverBorderColor=a,Chart.defaults.global.tooltips.enabled=!1,Chart.defaults.global.tooltips.mode="index",Chart.defaults.global.tooltips.intersect=!1,Chart.defaults.global.tooltips.custom=function(e){var t=document.getElementById("chart-tooltip");if(t||((t=document.createElement("div")).setAttribute("id","chart-tooltip"),t.setAttribute("role","tooltip"),t.classList.add("popover"),t.classList.add("bs-popover-top"),document.body.appendChild(t)),0!==e.opacity){if(e.body){var a=e.title||[],o=e.body.map((function(e){return e.lines})),n="";n+='<div class="arrow"></div>',a.forEach((function(e){n+='<h3 class="popover-header text-center">'+e+"</h3>"})),o.forEach((function(t,a){var r='<span class="popover-body-indicator" style="background-color: '+e.labelColors[a].backgroundColor+'"></span>',l=o.length>1?"justify-content-left":"justify-content-center";n+='<div class="popover-body d-flex align-items-center '+l+'">'+r+t+"</div>"})),t.innerHTML=n}var r=this._chart.canvas,l=r.getBoundingClientRect(),s=(r.offsetWidth,r.offsetHeight,window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0),i=window.pageXOffset||document.documentElement.scrollLeft||document.body.scrollLeft||0,c=l.top+s,d=l.left+i,u=t.offsetWidth,f=t.offsetHeight,p=c+e.caretY-f-16,m=d+e.caretX-u/2;t.style.top=p+"px",t.style.left=m+"px",t.style.visibility="visible"}else t.style.visibility="hidden"},Chart.defaults.global.tooltips.callbacks.label=function(e,t){var a=t.datasets[e.datasetIndex].label||"",o=e.yLabel,n="";return t.datasets.length>1&&(n+='<span class="popover-body-label mr-auto">'+a+"</span>"),n+='<span class="popover-body-value">'+o+"</span>"},Chart.defaults.doughnut.cutoutPercentage=83,Chart.defaults.doughnut.tooltips.callbacks.title=function(e,t){return t.labels[e[0].index]},Chart.defaults.doughnut.tooltips.callbacks.label=function(e,t){var a="";return a+='<span class="popover-body-value">'+t.datasets[0].data[e.index]+"</span>"},Chart.defaults.doughnut.legendCallback=function(e){var t=e.data,a="";return t.labels.forEach((function(e,o){var n=t.datasets[0].backgroundColor[o];a+='<span class="chart-legend-item">',a+='<i class="chart-legend-indicator" style="background-color: '+n+'"></i>',a+=e,a+="</span>"})),a},Chart.scaleService.updateScaleDefaults("linear",{gridLines:{borderDash:[2],borderDashOffset:[2],color:e[300],drawBorder:!1,drawTicks:!1,zeroLineColor:e[300],zeroLineBorderDash:[2],zeroLineBorderDashOffset:[2]},ticks:{beginAtZero:!0,padding:10,callback:function(e){if(!(e%10))return e}}}),Chart.scaleService.updateScaleDefaults("category",{gridLines:{drawBorder:!1,drawOnChartArea:!1,drawTicks:!1},ticks:{padding:20},maxBarThickness:10}),l&&[].forEach.call(l,(function(e){e.addEventListener("change",(function(){e.dataset.add&&i(e)})),e.addEventListener("click",(function(){e.dataset.update&&c(e)}))})),s&&document.addEventListener("DOMContentLoaded",(function(){[].forEach.call(s,(function(e){!function(e){var t=d(e).generateLegend(),a=e.dataset.target;document.querySelector(a).innerHTML=t}(e)}))})))}()},rF0G:function(e,t,a){"use strict";var o;(o=document.querySelectorAll('[data-toggle="popover"]'))&&function(e){$(e).popover()}(o)},zeYW:function(e,t,a){"use strict";var o,n;o=document.querySelectorAll(".dropup, .dropright, .dropdown, .dropleft"),(n=document.querySelectorAll(".dropdown-menu .dropdown-toggle"))&&[].forEach.call(n,(function(e){e.addEventListener("click",(function(t){t.preventDefault(),function(e){var t=e.parentElement.querySelector(".dropdown-menu"),a=e.closest(".dropdown-menu").querySelectorAll(".dropdown-menu");[].forEach.call(a,(function(e){e!==t&&e.classList.remove("show")})),t.classList.toggle("show")}(e),t.stopPropagation()}))})),$(o).on("hide.bs.dropdown",(function(){var e;(e=this.querySelectorAll(".dropdown-menu"))&&[].forEach.call(e,(function(e){e.classList.remove("show")}))}))}});