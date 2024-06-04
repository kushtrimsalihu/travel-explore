/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/app.js":
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var tailwindcss_tailwind_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tailwindcss/tailwind.css */ "./node_modules/tailwindcss/tailwind.css");

document.addEventListener('DOMContentLoaded', function () {
  // ======= ACTIVE CLASS ADDED =======
  var menuItems = document.querySelectorAll('.menu-item');
  menuItems.forEach(function (item) {
    item.addEventListener('click', function () {
      menuItems.forEach(function (i) {
        return i.classList.remove('active');
      });
      this.classList.add('active');
    });
  });

  // ======= SUBMENU DOWN ARROW ICON ADDED =======
  menuItems.forEach(function (item) {
    var submenu = item.querySelector('.sub-menu');
    if (submenu) {
      item.querySelector('a').classList.add('menu-parent-item');
    }
  });

  // ======= SUBMENU ACTIVATION AFTER CLICKING ON LI =======

  menuItems.forEach(function (item) {
    item.addEventListener('click', function (event) {
      var submenu = item.querySelector('.sub-menu');
      if (submenu) {
        if (submenu.style.display === 'none' || submenu.style.visibility === 'hidden') {
          submenu.style.display = 'flex';
          submenu.style.visibility = 'visible';
          var links = submenu.querySelectorAll('.sub-menu li a');
          links.forEach(function (link) {
            link.addEventListener('click', function (e) {
              window.location.href = e.currentTarget.getAttribute('href');
            });
          });
        } else {
          submenu.style.display = 'none';
        }
        event.preventDefault();
      }
    });
  });

  // ======= WHEN CLICKING OUTSIDE SUBMENU IT'S HIDDEN =======

  document.addEventListener('click', function (event) {
    menuItems.forEach(function (item) {
      var submenu = item.querySelector('.sub-menu');
      if (submenu && !item.contains(event.target)) {
        submenu.style.display = 'none';
      }
    });
  });
});

// ======= BURGER MENU FUNCTION =======

document.addEventListener('DOMContentLoaded', function () {
  var burgerButton = document.getElementById('burger-menu');
  var menuList = document.getElementById('menuList');
  var closeIcon = document.getElementById('close_Icon');
  burgerButton.addEventListener('click', function () {
    if (menuList.style.display === 'none' || menuList.style.display === '') {
      menuList.style.display = 'flex';
      closeIcon.style.display = 'block';
    } else {
      menuList.style.display = 'none';
    }
  });
  closeIcon.addEventListener('click', function () {
    menuList.style.display = 'none';
    closeIcon.style.display = 'none';
  });
});

// ======= SEARCH MODULE COMES UP/HIDE =======

document.getElementById('closeIcon').addEventListener('click', function () {
  document.getElementById('searchModal').style.visibility = 'hidden';
  var closeIcon = document.getElementById('close_Icon');
  closeIcon.style.display = "block";
});
document.getElementById('search-Icon').addEventListener('click', function () {
  document.getElementById('searchModal').style.visibility = 'visible';
  var closeIcon = document.getElementById('close_Icon');
  closeIcon.style.display = "none";
});

// ======= SEARCH MODULE RESULTS =======

document.getElementById('searchInput').addEventListener('keydown', function (event) {
  if (event.key === 'Enter') {
    document.getElementById('search-form').submit(); // Submit the form programmatically
  }
});

// ======= CLICKING OUTSIDE DIV HIDE SEARCH FORM =======

// var search = document.getElementById('search-form');
// var searchModal = document.getElementById('searchModal');

// if(searchModal.style.visibility="visible"===true){
// document.body.addEventListener('click', function(event) {
//     if (search && !search.contains(event.target)) {
//         searchModal.style.visibility = 'hidden';
//     }
// });
// }

// window.addEventListener('mouseup', function(event) {
//     var searchModal = document.getElementById('search-form');
//     var searchContainer = searchModal.parentElement;
//     if (event.target != searchModal && event.target.parentNode != searchModal && !searchContainer.contains(event.target)) {
//         searchContainer.style.visibility = 'hidden';
//     }
// });

// var search = document.getElementById('searchModal')
// document.onclick = function(div){
//     if(div.target.id !=='search-form'){
//         search.style.visibility = 'hidden';
//     }
// }

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[6].oneOf[1].use[1]!./node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[6].oneOf[1].use[2]!./node_modules/tailwindcss/tailwind.css":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[6].oneOf[1].use[1]!./node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[6].oneOf[1].use[2]!./node_modules/tailwindcss/tailwind.css ***!
  \*********************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "/*\r\n! tailwindcss v3.4.3 | MIT License | https://tailwindcss.com\r\n*//*\r\n1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)\r\n2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)\r\n*/\r\n\r\n*,\r\n::before,\r\n::after {\r\n  box-sizing: border-box; /* 1 */\r\n  border-width: 0; /* 2 */\r\n  border-style: solid; /* 2 */\r\n  border-color: #e5e7eb; /* 2 */\r\n}\r\n\r\n::before,\r\n::after {\r\n  --tw-content: '';\r\n}\r\n\r\n/*\r\n1. Use a consistent sensible line-height in all browsers.\r\n2. Prevent adjustments of font size after orientation changes in iOS.\r\n3. Use a more readable tab size.\r\n4. Use the user's configured `sans` font-family by default.\r\n5. Use the user's configured `sans` font-feature-settings by default.\r\n6. Use the user's configured `sans` font-variation-settings by default.\r\n7. Disable tap highlights on iOS\r\n*/\r\n\r\nhtml,\r\n:host {\r\n  line-height: 1.5; /* 1 */\r\n  -webkit-text-size-adjust: 100%; /* 2 */ /* 3 */\r\n  tab-size: 4; /* 3 */\r\n  font-family: ui-sans-serif, system-ui, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\"; /* 4 */\r\n  font-feature-settings: normal; /* 5 */\r\n  font-variation-settings: normal; /* 6 */\r\n  -webkit-tap-highlight-color: transparent; /* 7 */\r\n}\r\n\r\n/*\r\n1. Remove the margin in all browsers.\r\n2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.\r\n*/\r\n\r\nbody {\r\n  margin: 0; /* 1 */\r\n  line-height: inherit; /* 2 */\r\n}\r\n\r\n/*\r\n1. Add the correct height in Firefox.\r\n2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)\r\n3. Ensure horizontal rules are visible by default.\r\n*/\r\n\r\nhr {\r\n  height: 0; /* 1 */\r\n  color: inherit; /* 2 */\r\n  border-top-width: 1px; /* 3 */\r\n}\r\n\r\n/*\r\nAdd the correct text decoration in Chrome, Edge, and Safari.\r\n*/\r\n\r\nabbr:where([title]) {\r\n  -webkit-text-decoration: underline dotted;\r\n          text-decoration: underline dotted;\r\n}\r\n\r\n/*\r\nRemove the default font size and weight for headings.\r\n*/\r\n\r\nh1,\r\nh2,\r\nh3,\r\nh4,\r\nh5,\r\nh6 {\r\n  font-size: inherit;\r\n  font-weight: inherit;\r\n}\r\n\r\n/*\r\nReset links to optimize for opt-in styling instead of opt-out.\r\n*/\r\n\r\na {\r\n  color: inherit;\r\n  text-decoration: inherit;\r\n}\r\n\r\n/*\r\nAdd the correct font weight in Edge and Safari.\r\n*/\r\n\r\nb,\r\nstrong {\r\n  font-weight: bolder;\r\n}\r\n\r\n/*\r\n1. Use the user's configured `mono` font-family by default.\r\n2. Use the user's configured `mono` font-feature-settings by default.\r\n3. Use the user's configured `mono` font-variation-settings by default.\r\n4. Correct the odd `em` font sizing in all browsers.\r\n*/\r\n\r\ncode,\r\nkbd,\r\nsamp,\r\npre {\r\n  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, \"Liberation Mono\", \"Courier New\", monospace; /* 1 */\r\n  font-feature-settings: normal; /* 2 */\r\n  font-variation-settings: normal; /* 3 */\r\n  font-size: 1em; /* 4 */\r\n}\r\n\r\n/*\r\nAdd the correct font size in all browsers.\r\n*/\r\n\r\nsmall {\r\n  font-size: 80%;\r\n}\r\n\r\n/*\r\nPrevent `sub` and `sup` elements from affecting the line height in all browsers.\r\n*/\r\n\r\nsub,\r\nsup {\r\n  font-size: 75%;\r\n  line-height: 0;\r\n  position: relative;\r\n  vertical-align: baseline;\r\n}\r\n\r\nsub {\r\n  bottom: -0.25em;\r\n}\r\n\r\nsup {\r\n  top: -0.5em;\r\n}\r\n\r\n/*\r\n1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)\r\n2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)\r\n3. Remove gaps between table borders by default.\r\n*/\r\n\r\ntable {\r\n  text-indent: 0; /* 1 */\r\n  border-color: inherit; /* 2 */\r\n  border-collapse: collapse; /* 3 */\r\n}\r\n\r\n/*\r\n1. Change the font styles in all browsers.\r\n2. Remove the margin in Firefox and Safari.\r\n3. Remove default padding in all browsers.\r\n*/\r\n\r\nbutton,\r\ninput,\r\noptgroup,\r\nselect,\r\ntextarea {\r\n  font-family: inherit; /* 1 */\r\n  font-feature-settings: inherit; /* 1 */\r\n  font-variation-settings: inherit; /* 1 */\r\n  font-size: 100%; /* 1 */\r\n  font-weight: inherit; /* 1 */\r\n  line-height: inherit; /* 1 */\r\n  letter-spacing: inherit; /* 1 */\r\n  color: inherit; /* 1 */\r\n  margin: 0; /* 2 */\r\n  padding: 0; /* 3 */\r\n}\r\n\r\n/*\r\nRemove the inheritance of text transform in Edge and Firefox.\r\n*/\r\n\r\nbutton,\r\nselect {\r\n  text-transform: none;\r\n}\r\n\r\n/*\r\n1. Correct the inability to style clickable types in iOS and Safari.\r\n2. Remove default button styles.\r\n*/\r\n\r\nbutton,\r\ninput:where([type='button']),\r\ninput:where([type='reset']),\r\ninput:where([type='submit']) {\r\n  -webkit-appearance: button; /* 1 */\r\n  background-color: transparent; /* 2 */\r\n  background-image: none; /* 2 */\r\n}\r\n\r\n/*\r\nUse the modern Firefox focus style for all focusable elements.\r\n*/\r\n\r\n:-moz-focusring {\r\n  outline: auto;\r\n}\r\n\r\n/*\r\nRemove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)\r\n*/\r\n\r\n:-moz-ui-invalid {\r\n  box-shadow: none;\r\n}\r\n\r\n/*\r\nAdd the correct vertical alignment in Chrome and Firefox.\r\n*/\r\n\r\nprogress {\r\n  vertical-align: baseline;\r\n}\r\n\r\n/*\r\nCorrect the cursor style of increment and decrement buttons in Safari.\r\n*/\r\n\r\n::-webkit-inner-spin-button,\r\n::-webkit-outer-spin-button {\r\n  height: auto;\r\n}\r\n\r\n/*\r\n1. Correct the odd appearance in Chrome and Safari.\r\n2. Correct the outline style in Safari.\r\n*/\r\n\r\n[type='search'] {\r\n  -webkit-appearance: textfield; /* 1 */\r\n  outline-offset: -2px; /* 2 */\r\n}\r\n\r\n/*\r\nRemove the inner padding in Chrome and Safari on macOS.\r\n*/\r\n\r\n::-webkit-search-decoration {\r\n  -webkit-appearance: none;\r\n}\r\n\r\n/*\r\n1. Correct the inability to style clickable types in iOS and Safari.\r\n2. Change font properties to `inherit` in Safari.\r\n*/\r\n\r\n::-webkit-file-upload-button {\r\n  -webkit-appearance: button; /* 1 */\r\n  font: inherit; /* 2 */\r\n}\r\n\r\n/*\r\nAdd the correct display in Chrome and Safari.\r\n*/\r\n\r\nsummary {\r\n  display: list-item;\r\n}\r\n\r\n/*\r\nRemoves the default spacing and border for appropriate elements.\r\n*/\r\n\r\nblockquote,\r\ndl,\r\ndd,\r\nh1,\r\nh2,\r\nh3,\r\nh4,\r\nh5,\r\nh6,\r\nhr,\r\nfigure,\r\np,\r\npre {\r\n  margin: 0;\r\n}\r\n\r\nfieldset {\r\n  margin: 0;\r\n  padding: 0;\r\n}\r\n\r\nlegend {\r\n  padding: 0;\r\n}\r\n\r\nol,\r\nul,\r\nmenu {\r\n  list-style: none;\r\n  margin: 0;\r\n  padding: 0;\r\n}\r\n\r\n/*\r\nReset default styling for dialogs.\r\n*/\r\ndialog {\r\n  padding: 0;\r\n}\r\n\r\n/*\r\nPrevent resizing textareas horizontally by default.\r\n*/\r\n\r\ntextarea {\r\n  resize: vertical;\r\n}\r\n\r\n/*\r\n1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)\r\n2. Set the default placeholder color to the user's configured gray 400 color.\r\n*/\r\n\r\ninput::placeholder,\r\ntextarea::placeholder {\r\n  opacity: 1; /* 1 */\r\n  color: #9ca3af; /* 2 */\r\n}\r\n\r\n/*\r\nSet the default cursor for buttons.\r\n*/\r\n\r\nbutton,\r\n[role=\"button\"] {\r\n  cursor: pointer;\r\n}\r\n\r\n/*\r\nMake sure disabled buttons don't get the pointer cursor.\r\n*/\r\n:disabled {\r\n  cursor: default;\r\n}\r\n\r\n/*\r\n1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)\r\n2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)\r\n   This can trigger a poorly considered lint error in some tools but is included by design.\r\n*/\r\n\r\nimg,\r\nsvg,\r\nvideo,\r\ncanvas,\r\naudio,\r\niframe,\r\nembed,\r\nobject {\r\n  display: block; /* 1 */\r\n  vertical-align: middle; /* 2 */\r\n}\r\n\r\n/*\r\nConstrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)\r\n*/\r\n\r\nimg,\r\nvideo {\r\n  max-width: 100%;\r\n  height: auto;\r\n}\r\n\r\n/* Make elements with the HTML hidden attribute stay hidden by default */\r\n[hidden] {\r\n  display: none;\r\n}\r\n\r\n*, ::before, ::after {\r\n  --tw-border-spacing-x: 0;\r\n  --tw-border-spacing-y: 0;\r\n  --tw-translate-x: 0;\r\n  --tw-translate-y: 0;\r\n  --tw-rotate: 0;\r\n  --tw-skew-x: 0;\r\n  --tw-skew-y: 0;\r\n  --tw-scale-x: 1;\r\n  --tw-scale-y: 1;\r\n  --tw-pan-x:  ;\r\n  --tw-pan-y:  ;\r\n  --tw-pinch-zoom:  ;\r\n  --tw-scroll-snap-strictness: proximity;\r\n  --tw-gradient-from-position:  ;\r\n  --tw-gradient-via-position:  ;\r\n  --tw-gradient-to-position:  ;\r\n  --tw-ordinal:  ;\r\n  --tw-slashed-zero:  ;\r\n  --tw-numeric-figure:  ;\r\n  --tw-numeric-spacing:  ;\r\n  --tw-numeric-fraction:  ;\r\n  --tw-ring-inset:  ;\r\n  --tw-ring-offset-width: 0px;\r\n  --tw-ring-offset-color: #fff;\r\n  --tw-ring-color: rgb(128 176 222 / 0.5);\r\n  --tw-ring-offset-shadow: 0 0 #0000;\r\n  --tw-ring-shadow: 0 0 #0000;\r\n  --tw-shadow: 0 0 #0000;\r\n  --tw-shadow-colored: 0 0 #0000;\r\n  --tw-blur:  ;\r\n  --tw-brightness:  ;\r\n  --tw-contrast:  ;\r\n  --tw-grayscale:  ;\r\n  --tw-hue-rotate:  ;\r\n  --tw-invert:  ;\r\n  --tw-saturate:  ;\r\n  --tw-sepia:  ;\r\n  --tw-drop-shadow:  ;\r\n  --tw-backdrop-blur:  ;\r\n  --tw-backdrop-brightness:  ;\r\n  --tw-backdrop-contrast:  ;\r\n  --tw-backdrop-grayscale:  ;\r\n  --tw-backdrop-hue-rotate:  ;\r\n  --tw-backdrop-invert:  ;\r\n  --tw-backdrop-opacity:  ;\r\n  --tw-backdrop-saturate:  ;\r\n  --tw-backdrop-sepia:  ;\r\n  --tw-contain-size:  ;\r\n  --tw-contain-layout:  ;\r\n  --tw-contain-paint:  ;\r\n  --tw-contain-style:  ;\r\n}\r\n\r\n::backdrop {\r\n  --tw-border-spacing-x: 0;\r\n  --tw-border-spacing-y: 0;\r\n  --tw-translate-x: 0;\r\n  --tw-translate-y: 0;\r\n  --tw-rotate: 0;\r\n  --tw-skew-x: 0;\r\n  --tw-skew-y: 0;\r\n  --tw-scale-x: 1;\r\n  --tw-scale-y: 1;\r\n  --tw-pan-x:  ;\r\n  --tw-pan-y:  ;\r\n  --tw-pinch-zoom:  ;\r\n  --tw-scroll-snap-strictness: proximity;\r\n  --tw-gradient-from-position:  ;\r\n  --tw-gradient-via-position:  ;\r\n  --tw-gradient-to-position:  ;\r\n  --tw-ordinal:  ;\r\n  --tw-slashed-zero:  ;\r\n  --tw-numeric-figure:  ;\r\n  --tw-numeric-spacing:  ;\r\n  --tw-numeric-fraction:  ;\r\n  --tw-ring-inset:  ;\r\n  --tw-ring-offset-width: 0px;\r\n  --tw-ring-offset-color: #fff;\r\n  --tw-ring-color: rgb(128 176 222 / 0.5);\r\n  --tw-ring-offset-shadow: 0 0 #0000;\r\n  --tw-ring-shadow: 0 0 #0000;\r\n  --tw-shadow: 0 0 #0000;\r\n  --tw-shadow-colored: 0 0 #0000;\r\n  --tw-blur:  ;\r\n  --tw-brightness:  ;\r\n  --tw-contrast:  ;\r\n  --tw-grayscale:  ;\r\n  --tw-hue-rotate:  ;\r\n  --tw-invert:  ;\r\n  --tw-saturate:  ;\r\n  --tw-sepia:  ;\r\n  --tw-drop-shadow:  ;\r\n  --tw-backdrop-blur:  ;\r\n  --tw-backdrop-brightness:  ;\r\n  --tw-backdrop-contrast:  ;\r\n  --tw-backdrop-grayscale:  ;\r\n  --tw-backdrop-hue-rotate:  ;\r\n  --tw-backdrop-invert:  ;\r\n  --tw-backdrop-opacity:  ;\r\n  --tw-backdrop-saturate:  ;\r\n  --tw-backdrop-sepia:  ;\r\n  --tw-contain-size:  ;\r\n  --tw-contain-layout:  ;\r\n  --tw-contain-paint:  ;\r\n  --tw-contain-style:  ;\r\n}\r\n\r\n.container {\r\n  width: 100%;\r\n}\r\n\r\n@media (min-width: 640px) {\r\n\r\n  .container {\r\n    max-width: 640px;\r\n  }\r\n}\r\n\r\n@media (min-width: 768px) {\r\n\r\n  .container {\r\n    max-width: 768px;\r\n  }\r\n}\r\n\r\n@media (min-width: 1024px) {\r\n\r\n  .container {\r\n    max-width: 1024px;\r\n  }\r\n}\r\n\r\n@media (min-width: 1280px) {\r\n\r\n  .container {\r\n    max-width: 1280px;\r\n  }\r\n}\r\n\r\n@media (min-width: 1536px) {\r\n\r\n  .container {\r\n    max-width: 1536px;\r\n  }\r\n}\r\n\r\n.visible {\r\n  visibility: visible;\r\n}\r\n\r\n.invisible {\r\n  visibility: hidden;\r\n}\r\n\r\n.fixed {\r\n  position: fixed;\r\n}\r\n\r\n.absolute {\r\n  position: absolute;\r\n}\r\n\r\n.relative {\r\n  position: relative;\r\n}\r\n\r\n.inset-0 {\r\n  inset: 0px;\r\n}\r\n\r\n.left-0 {\r\n  left: 0px;\r\n}\r\n\r\n.right-0 {\r\n  right: 0px;\r\n}\r\n\r\n.right-4 {\r\n  right: 1rem;\r\n}\r\n\r\n.top-0 {\r\n  top: 0px;\r\n}\r\n\r\n.top-28 {\r\n  top: 7rem;\r\n}\r\n\r\n.top-\\[496px\\] {\r\n  top: 496px;\r\n}\r\n\r\n.top-\\[88px\\] {\r\n  top: 88px;\r\n}\r\n\r\n.right-6 {\r\n  right: 1.5rem;\r\n}\r\n\r\n.top-24 {\r\n  top: 6rem;\r\n}\r\n\r\n.top-20 {\r\n  top: 5rem;\r\n}\r\n\r\n.top-16 {\r\n  top: 4rem;\r\n}\r\n\r\n.z-10 {\r\n  z-index: 10;\r\n}\r\n\r\n.z-50 {\r\n  z-index: 50;\r\n}\r\n\r\n.mx-auto {\r\n  margin-left: auto;\r\n  margin-right: auto;\r\n}\r\n\r\n.mb-12 {\r\n  margin-bottom: 3rem;\r\n}\r\n\r\n.ml-3 {\r\n  margin-left: 0.75rem;\r\n}\r\n\r\n.mt-20 {\r\n  margin-top: 5rem;\r\n}\r\n\r\n.mt-4 {\r\n  margin-top: 1rem;\r\n}\r\n\r\n.mt-6 {\r\n  margin-top: 1.5rem;\r\n}\r\n\r\n.mb-4 {\r\n  margin-bottom: 1rem;\r\n}\r\n\r\n.mt-16 {\r\n  margin-top: 4rem;\r\n}\r\n\r\n.block {\r\n  display: block;\r\n}\r\n\r\n.inline-block {\r\n  display: inline-block;\r\n}\r\n\r\n.flex {\r\n  display: flex;\r\n}\r\n\r\n.hidden {\r\n  display: none;\r\n}\r\n\r\n.h-1\\/2 {\r\n  height: 50%;\r\n}\r\n\r\n.h-11 {\r\n  height: 2.75rem;\r\n}\r\n\r\n.h-20 {\r\n  height: 5rem;\r\n}\r\n\r\n.h-5 {\r\n  height: 1.25rem;\r\n}\r\n\r\n.h-\\[245px\\] {\r\n  height: 245px;\r\n}\r\n\r\n.h-auto {\r\n  height: auto;\r\n}\r\n\r\n.h-12 {\r\n  height: 3rem;\r\n}\r\n\r\n.w-2\\/4 {\r\n  width: 50%;\r\n}\r\n\r\n.w-3\\/4 {\r\n  width: 75%;\r\n}\r\n\r\n.w-5 {\r\n  width: 1.25rem;\r\n}\r\n\r\n.w-7\\/12 {\r\n  width: 58.333333%;\r\n}\r\n\r\n.w-\\[614px\\] {\r\n  width: 614px;\r\n}\r\n\r\n.w-full {\r\n  width: 100%;\r\n}\r\n\r\n.w-80 {\r\n  width: 20rem;\r\n}\r\n\r\n.w-8\\/12 {\r\n  width: 66.666667%;\r\n}\r\n\r\n.max-w-\\[1328px\\] {\r\n  max-width: 1328px;\r\n}\r\n\r\n.max-w-\\[800px\\] {\r\n  max-width: 800px;\r\n}\r\n\r\n.cursor-pointer {\r\n  cursor: pointer;\r\n}\r\n\r\n.flex-row {\r\n  flex-direction: row;\r\n}\r\n\r\n.flex-col {\r\n  flex-direction: column;\r\n}\r\n\r\n.items-center {\r\n  align-items: center;\r\n}\r\n\r\n.items-baseline {\r\n  align-items: baseline;\r\n}\r\n\r\n.justify-start {\r\n  justify-content: flex-start;\r\n}\r\n\r\n.justify-end {\r\n  justify-content: flex-end;\r\n}\r\n\r\n.justify-center {\r\n  justify-content: center;\r\n}\r\n\r\n.justify-between {\r\n  justify-content: space-between;\r\n}\r\n\r\n.gap-2 {\r\n  gap: 0.5rem;\r\n}\r\n\r\n.gap-5 {\r\n  gap: 1.25rem;\r\n}\r\n\r\n.gap-7 {\r\n  gap: 1.75rem;\r\n}\r\n\r\n.gap-\\[40px\\] {\r\n  gap: 40px;\r\n}\r\n\r\n.space-x-4 > :not([hidden]) ~ :not([hidden]) {\r\n  --tw-space-x-reverse: 0;\r\n  margin-right: calc(1rem * var(--tw-space-x-reverse));\r\n  margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));\r\n}\r\n\r\n.rounded-\\[40px\\] {\r\n  border-radius: 40px;\r\n}\r\n\r\n.rounded-full {\r\n  border-radius: 9999px;\r\n}\r\n\r\n.rounded-lg {\r\n  border-radius: 0.5rem;\r\n}\r\n\r\n.rounded-tl-\\[32px\\] {\r\n  border-top-left-radius: 32px;\r\n}\r\n\r\n.rounded-tr-\\[32px\\] {\r\n  border-top-right-radius: 32px;\r\n}\r\n\r\n.border {\r\n  border-width: 1px;\r\n}\r\n\r\n.border-\\[\\#88511D\\] {\r\n  --tw-border-opacity: 1;\r\n  border-color: rgb(136 81 29 / var(--tw-border-opacity));\r\n}\r\n\r\n.border-black {\r\n  --tw-border-opacity: 1;\r\n  border-color: rgb(0 0 0 / var(--tw-border-opacity));\r\n}\r\n\r\n.border-light-p40 {\r\n  --tw-border-opacity: 1;\r\n  border-color: rgb(136 81 29 / var(--tw-border-opacity));\r\n}\r\n\r\n.bg-\\[\\#FFF8F5\\] {\r\n  --tw-bg-opacity: 1;\r\n  background-color: rgb(255 248 245 / var(--tw-bg-opacity));\r\n}\r\n\r\n.bg-black {\r\n  --tw-bg-opacity: 1;\r\n  background-color: rgb(0 0 0 / var(--tw-bg-opacity));\r\n}\r\n\r\n.bg-gray-800 {\r\n  --tw-bg-opacity: 1;\r\n  background-color: rgb(31 41 55 / var(--tw-bg-opacity));\r\n}\r\n\r\n.bg-transparent {\r\n  background-color: transparent;\r\n}\r\n\r\n.bg-white-100 {\r\n  --tw-bg-opacity: 1;\r\n  background-color: rgb(255 255 255 / var(--tw-bg-opacity));\r\n}\r\n\r\n.bg-light-p40 {\r\n  --tw-bg-opacity: 1;\r\n  background-color: rgb(136 81 29 / var(--tw-bg-opacity));\r\n}\r\n\r\n.bg-opacity-60 {\r\n  --tw-bg-opacity: 0.6;\r\n}\r\n\r\n.p-0 {\r\n  padding: 0px;\r\n}\r\n\r\n.p-2 {\r\n  padding: 0.5rem;\r\n}\r\n\r\n.p-3 {\r\n  padding: 0.75rem;\r\n}\r\n\r\n.px-3 {\r\n  padding-left: 0.75rem;\r\n  padding-right: 0.75rem;\r\n}\r\n\r\n.px-4 {\r\n  padding-left: 1rem;\r\n  padding-right: 1rem;\r\n}\r\n\r\n.px-5 {\r\n  padding-left: 1.25rem;\r\n  padding-right: 1.25rem;\r\n}\r\n\r\n.px-\\[24px\\] {\r\n  padding-left: 24px;\r\n  padding-right: 24px;\r\n}\r\n\r\n.py-1 {\r\n  padding-top: 0.25rem;\r\n  padding-bottom: 0.25rem;\r\n}\r\n\r\n.py-1\\.5 {\r\n  padding-top: 0.375rem;\r\n  padding-bottom: 0.375rem;\r\n}\r\n\r\n.py-12 {\r\n  padding-top: 3rem;\r\n  padding-bottom: 3rem;\r\n}\r\n\r\n.py-4 {\r\n  padding-top: 1rem;\r\n  padding-bottom: 1rem;\r\n}\r\n\r\n.py-6 {\r\n  padding-top: 1.5rem;\r\n  padding-bottom: 1.5rem;\r\n}\r\n\r\n.py-\\[10px\\] {\r\n  padding-top: 10px;\r\n  padding-bottom: 10px;\r\n}\r\n\r\n.py-2 {\r\n  padding-top: 0.5rem;\r\n  padding-bottom: 0.5rem;\r\n}\r\n\r\n.py-2\\.5 {\r\n  padding-top: 0.625rem;\r\n  padding-bottom: 0.625rem;\r\n}\r\n\r\n.px-6 {\r\n  padding-left: 1.5rem;\r\n  padding-right: 1.5rem;\r\n}\r\n\r\n.pl-7 {\r\n  padding-left: 1.75rem;\r\n}\r\n\r\n.text-center {\r\n  text-align: center;\r\n}\r\n\r\n.font-roboto {\r\n  font-family: Roboto, sans-serif;\r\n}\r\n\r\n.text-3xl {\r\n  font-size: 1.875rem;\r\n  line-height: 2.25rem;\r\n}\r\n\r\n.text-\\[16px\\] {\r\n  font-size: 16px;\r\n}\r\n\r\n.text-\\[45px\\] {\r\n  font-size: 45px;\r\n}\r\n\r\n.text-lg {\r\n  font-size: 1.125rem;\r\n  line-height: 1.75rem;\r\n}\r\n\r\n.text-sm {\r\n  font-size: 0.875rem;\r\n  line-height: 1.25rem;\r\n}\r\n\r\n.text-xs {\r\n  font-size: 0.75rem;\r\n  line-height: 1rem;\r\n}\r\n\r\n.font-bold {\r\n  font-weight: 700;\r\n}\r\n\r\n.font-medium {\r\n  font-weight: 500;\r\n}\r\n\r\n.font-normal {\r\n  font-weight: 400;\r\n}\r\n\r\n.leading-\\[24px\\] {\r\n  line-height: 24px;\r\n}\r\n\r\n.leading-\\[52px\\] {\r\n  line-height: 52px;\r\n}\r\n\r\n.tracking-\\[0\\.5px\\] {\r\n  letter-spacing: 0.5px;\r\n}\r\n\r\n.text-\\[\\#88511D\\] {\r\n  --tw-text-opacity: 1;\r\n  color: rgb(136 81 29 / var(--tw-text-opacity));\r\n}\r\n\r\n.text-blue-500 {\r\n  --tw-text-opacity: 1;\r\n  color: rgb(128 176 222 / var(--tw-text-opacity));\r\n}\r\n\r\n.text-gray-600 {\r\n  --tw-text-opacity: 1;\r\n  color: rgb(75 85 99 / var(--tw-text-opacity));\r\n}\r\n\r\n.text-gray-800 {\r\n  --tw-text-opacity: 1;\r\n  color: rgb(31 41 55 / var(--tw-text-opacity));\r\n}\r\n\r\n.text-green-500 {\r\n  --tw-text-opacity: 1;\r\n  color: rgb(142 182 121 / var(--tw-text-opacity));\r\n}\r\n\r\n.text-red-500 {\r\n  --tw-text-opacity: 1;\r\n  color: rgb(255 137 125 / var(--tw-text-opacity));\r\n}\r\n\r\n.text-white-100 {\r\n  --tw-text-opacity: 1;\r\n  color: rgb(255 255 255 / var(--tw-text-opacity));\r\n}\r\n\r\n.text-light-p40 {\r\n  --tw-text-opacity: 1;\r\n  color: rgb(136 81 29 / var(--tw-text-opacity));\r\n}\r\n\r\n.underline {\r\n  text-decoration-line: underline;\r\n}\r\n\r\n.shadow-md {\r\n  --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);\r\n  --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);\r\n  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);\r\n}\r\n\r\n.blur {\r\n  --tw-blur: blur(8px);\r\n  filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);\r\n}\r\n\r\n.backdrop-blur-sm {\r\n  --tw-backdrop-blur: blur(4px);\r\n  -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);\r\n          backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);\r\n}\r\n\r\n.backdrop-filter {\r\n  -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);\r\n          backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);\r\n}\r\n\r\n.transition {\r\n  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;\r\n  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;\r\n  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;\r\n  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);\r\n  transition-duration: 150ms;\r\n}\r\n\r\n@media (min-width: 768px) {\r\n\r\n  .md\\:relative {\r\n    position: relative;\r\n  }\r\n\r\n  .md\\:top-0 {\r\n    top: 0px;\r\n  }\r\n\r\n  .md\\:block {\r\n    display: block;\r\n  }\r\n\r\n  .md\\:flex {\r\n    display: flex;\r\n  }\r\n\r\n  .md\\:hidden {\r\n    display: none;\r\n  }\r\n\r\n  .md\\:w-1\\/4 {\r\n    width: 25%;\r\n  }\r\n\r\n  .md\\:w-96 {\r\n    width: 24rem;\r\n  }\r\n\r\n  .md\\:flex-row {\r\n    flex-direction: row;\r\n  }\r\n\r\n  .md\\:justify-start {\r\n    justify-content: flex-start;\r\n  }\r\n\r\n  .md\\:justify-center {\r\n    justify-content: center;\r\n  }\r\n\r\n  .md\\:justify-between {\r\n    justify-content: space-between;\r\n  }\r\n\r\n  .md\\:gap-0 {\r\n    gap: 0px;\r\n  }\r\n\r\n  .md\\:bg-transparent {\r\n    background-color: transparent;\r\n  }\r\n\r\n  .md\\:p-6 {\r\n    padding: 1.5rem;\r\n  }\r\n\r\n  .md\\:py-0 {\r\n    padding-top: 0px;\r\n    padding-bottom: 0px;\r\n  }\r\n\r\n  .md\\:text-lg {\r\n    font-size: 1.125rem;\r\n    line-height: 1.75rem;\r\n  }\r\n\r\n  .md\\:text-sm {\r\n    font-size: 0.875rem;\r\n    line-height: 1.25rem;\r\n  }\r\n}\r\n\r\n@media (min-width: 1024px) {\r\n\r\n  .lg\\:justify-start {\r\n    justify-content: flex-start;\r\n  }\r\n\r\n  .lg\\:px-0 {\r\n    padding-left: 0px;\r\n    padding-right: 0px;\r\n  }\r\n}\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/runtime/api.js":
/*!*****************************************************!*\
  !*** ./node_modules/css-loader/dist/runtime/api.js ***!
  \*****************************************************/
/***/ ((module) => {



/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
// eslint-disable-next-line func-names
module.exports = function (cssWithMappingToString) {
  var list = []; // return the list of modules as css string

  list.toString = function toString() {
    return this.map(function (item) {
      var content = cssWithMappingToString(item);

      if (item[2]) {
        return "@media ".concat(item[2], " {").concat(content, "}");
      }

      return content;
    }).join("");
  }; // import a list of modules into the list
  // eslint-disable-next-line func-names


  list.i = function (modules, mediaQuery, dedupe) {
    if (typeof modules === "string") {
      // eslint-disable-next-line no-param-reassign
      modules = [[null, modules, ""]];
    }

    var alreadyImportedModules = {};

    if (dedupe) {
      for (var i = 0; i < this.length; i++) {
        // eslint-disable-next-line prefer-destructuring
        var id = this[i][0];

        if (id != null) {
          alreadyImportedModules[id] = true;
        }
      }
    }

    for (var _i = 0; _i < modules.length; _i++) {
      var item = [].concat(modules[_i]);

      if (dedupe && alreadyImportedModules[item[0]]) {
        // eslint-disable-next-line no-continue
        continue;
      }

      if (mediaQuery) {
        if (!item[2]) {
          item[2] = mediaQuery;
        } else {
          item[2] = "".concat(mediaQuery, " and ").concat(item[2]);
        }
      }

      list.push(item);
    }
  };

  return list;
};

/***/ }),

/***/ "./src/sass/app.scss":
/*!***************************!*\
  !*** ./src/sass/app.scss ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./node_modules/tailwindcss/tailwind.css":
/*!***********************************************!*\
  !*** ./node_modules/tailwindcss/tailwind.css ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _css_loader_dist_cjs_js_ruleSet_1_rules_6_oneOf_1_use_1_postcss_loader_dist_cjs_js_ruleSet_1_rules_6_oneOf_1_use_2_tailwind_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../css-loader/dist/cjs.js??ruleSet[1].rules[6].oneOf[1].use[1]!../postcss-loader/dist/cjs.js??ruleSet[1].rules[6].oneOf[1].use[2]!./tailwind.css */ "./node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[6].oneOf[1].use[1]!./node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[6].oneOf[1].use[2]!./node_modules/tailwindcss/tailwind.css");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_css_loader_dist_cjs_js_ruleSet_1_rules_6_oneOf_1_use_1_postcss_loader_dist_cjs_js_ruleSet_1_rules_6_oneOf_1_use_2_tailwind_css__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_css_loader_dist_cjs_js_ruleSet_1_rules_6_oneOf_1_use_1_postcss_loader_dist_cjs_js_ruleSet_1_rules_6_oneOf_1_use_2_tailwind_css__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {



var isOldIE = function isOldIE() {
  var memo;
  return function memorize() {
    if (typeof memo === 'undefined') {
      // Test for IE <= 9 as proposed by Browserhacks
      // @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
      // Tests for existence of standard globals is to allow style-loader
      // to operate correctly into non-standard environments
      // @see https://github.com/webpack-contrib/style-loader/issues/177
      memo = Boolean(window && document && document.all && !window.atob);
    }

    return memo;
  };
}();

var getTarget = function getTarget() {
  var memo = {};
  return function memorize(target) {
    if (typeof memo[target] === 'undefined') {
      var styleTarget = document.querySelector(target); // Special case to return head of iframe instead of iframe itself

      if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
        try {
          // This will throw an exception if access to iframe is blocked
          // due to cross-origin restrictions
          styleTarget = styleTarget.contentDocument.head;
        } catch (e) {
          // istanbul ignore next
          styleTarget = null;
        }
      }

      memo[target] = styleTarget;
    }

    return memo[target];
  };
}();

var stylesInDom = [];

function getIndexByIdentifier(identifier) {
  var result = -1;

  for (var i = 0; i < stylesInDom.length; i++) {
    if (stylesInDom[i].identifier === identifier) {
      result = i;
      break;
    }
  }

  return result;
}

function modulesToDom(list, options) {
  var idCountMap = {};
  var identifiers = [];

  for (var i = 0; i < list.length; i++) {
    var item = list[i];
    var id = options.base ? item[0] + options.base : item[0];
    var count = idCountMap[id] || 0;
    var identifier = "".concat(id, " ").concat(count);
    idCountMap[id] = count + 1;
    var index = getIndexByIdentifier(identifier);
    var obj = {
      css: item[1],
      media: item[2],
      sourceMap: item[3]
    };

    if (index !== -1) {
      stylesInDom[index].references++;
      stylesInDom[index].updater(obj);
    } else {
      stylesInDom.push({
        identifier: identifier,
        updater: addStyle(obj, options),
        references: 1
      });
    }

    identifiers.push(identifier);
  }

  return identifiers;
}

function insertStyleElement(options) {
  var style = document.createElement('style');
  var attributes = options.attributes || {};

  if (typeof attributes.nonce === 'undefined') {
    var nonce =  true ? __webpack_require__.nc : 0;

    if (nonce) {
      attributes.nonce = nonce;
    }
  }

  Object.keys(attributes).forEach(function (key) {
    style.setAttribute(key, attributes[key]);
  });

  if (typeof options.insert === 'function') {
    options.insert(style);
  } else {
    var target = getTarget(options.insert || 'head');

    if (!target) {
      throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
    }

    target.appendChild(style);
  }

  return style;
}

function removeStyleElement(style) {
  // istanbul ignore if
  if (style.parentNode === null) {
    return false;
  }

  style.parentNode.removeChild(style);
}
/* istanbul ignore next  */


var replaceText = function replaceText() {
  var textStore = [];
  return function replace(index, replacement) {
    textStore[index] = replacement;
    return textStore.filter(Boolean).join('\n');
  };
}();

function applyToSingletonTag(style, index, remove, obj) {
  var css = remove ? '' : obj.media ? "@media ".concat(obj.media, " {").concat(obj.css, "}") : obj.css; // For old IE

  /* istanbul ignore if  */

  if (style.styleSheet) {
    style.styleSheet.cssText = replaceText(index, css);
  } else {
    var cssNode = document.createTextNode(css);
    var childNodes = style.childNodes;

    if (childNodes[index]) {
      style.removeChild(childNodes[index]);
    }

    if (childNodes.length) {
      style.insertBefore(cssNode, childNodes[index]);
    } else {
      style.appendChild(cssNode);
    }
  }
}

function applyToTag(style, options, obj) {
  var css = obj.css;
  var media = obj.media;
  var sourceMap = obj.sourceMap;

  if (media) {
    style.setAttribute('media', media);
  } else {
    style.removeAttribute('media');
  }

  if (sourceMap && typeof btoa !== 'undefined') {
    css += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), " */");
  } // For old IE

  /* istanbul ignore if  */


  if (style.styleSheet) {
    style.styleSheet.cssText = css;
  } else {
    while (style.firstChild) {
      style.removeChild(style.firstChild);
    }

    style.appendChild(document.createTextNode(css));
  }
}

var singleton = null;
var singletonCounter = 0;

function addStyle(obj, options) {
  var style;
  var update;
  var remove;

  if (options.singleton) {
    var styleIndex = singletonCounter++;
    style = singleton || (singleton = insertStyleElement(options));
    update = applyToSingletonTag.bind(null, style, styleIndex, false);
    remove = applyToSingletonTag.bind(null, style, styleIndex, true);
  } else {
    style = insertStyleElement(options);
    update = applyToTag.bind(null, style, options);

    remove = function remove() {
      removeStyleElement(style);
    };
  }

  update(obj);
  return function updateStyle(newObj) {
    if (newObj) {
      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap) {
        return;
      }

      update(obj = newObj);
    } else {
      remove();
    }
  };
}

module.exports = function (list, options) {
  options = options || {}; // Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
  // tags it will allow on a page

  if (!options.singleton && typeof options.singleton !== 'boolean') {
    options.singleton = isOldIE();
  }

  list = list || [];
  var lastIdentifiers = modulesToDom(list, options);
  return function update(newList) {
    newList = newList || [];

    if (Object.prototype.toString.call(newList) !== '[object Array]') {
      return;
    }

    for (var i = 0; i < lastIdentifiers.length; i++) {
      var identifier = lastIdentifiers[i];
      var index = getIndexByIdentifier(identifier);
      stylesInDom[index].references--;
    }

    var newLastIdentifiers = modulesToDom(newList, options);

    for (var _i = 0; _i < lastIdentifiers.length; _i++) {
      var _identifier = lastIdentifiers[_i];

      var _index = getIndexByIdentifier(_identifier);

      if (stylesInDom[_index].references === 0) {
        stylesInDom[_index].updater();

        stylesInDom.splice(_index, 1);
      }
    }

    lastIdentifiers = newLastIdentifiers;
  };
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			id: moduleId,
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunktravel_explore"] = self["webpackChunktravel_explore"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/nonce */
/******/ 	(() => {
/******/ 		__webpack_require__.nc = undefined;
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./src/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./src/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;