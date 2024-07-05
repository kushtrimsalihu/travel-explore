/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/app.js":
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
/***/ (() => {

document.addEventListener('DOMContentLoaded', function () {
  var menuItems = document.querySelectorAll('.menu-item');
  menuItems.forEach(function (item) {
    item.addEventListener('click', function () {
      menuItems.forEach(function (i) {
        return i.classList.remove('active');
      });
      this.classList.add('active');
    });
  });
  menuItems.forEach(function (item) {
    var submenu = item.querySelector('.sub-menu');
    if (submenu) {
      item.querySelector('a').classList.add('menu-parent-item');
    }
  });
  menuItems.forEach(function (item) {
    item.addEventListener('click', function (event) {
      var submenu = item.querySelector('.sub-menu');
      if (submenu) {
        if (submenu.style.display === 'none' || submenu.style.display === '') {
          submenu.style.display = 'flex';
          item.querySelector('a').classList.add('toggled');
          item.classList.add('active');
          var links = submenu.querySelectorAll('.sub-menu li');
          links.forEach(function (link) {
            link.addEventListener('click', function (e) {
              var anchor = link.querySelector('a');
              if (anchor) {
                window.location.href = anchor.getAttribute('href');
              }
            });
          });
        } else {
          submenu.style.display = 'none';
          item.querySelector('a').classList.remove('toggled');
          item.classList.remove('active');
        }
        event.preventDefault();
      }
    });
  });
  document.addEventListener('click', function (event) {
    menuItems.forEach(function (item) {
      var submenu = item.querySelector('.sub-menu');
      if (submenu && !item.contains(event.target)) {
        submenu.style.display = 'none';
        item.querySelector('a').classList.remove('toggled');
        item.classList.remove('active');
        item.classList.remove('active');
      }
    });
  });
});
document.addEventListener('DOMContentLoaded', function () {
  var burgerButton = document.getElementById('burger-menu');
  var menuList = document.getElementById('menuList');
  var closeIcon = document.getElementById('close_Icon');
  burgerButton.addEventListener('click', function () {
    if (menuList.style.display === 'none' || menuList.style.display === '') {
      menuList.style.display = 'flex';
      closeIcon.style.display = 'block';
      burgerButton.style.display = 'none';
    } else {
      menuList.style.display = 'none';
    }
  });
  closeIcon.addEventListener('click', function () {
    menuList.style.display = 'none';
    burgerButton.style.display = 'flex';
    closeIcon.style.display = 'none';
  });
});
document.getElementById('closeIcon').addEventListener('click', function () {
  document.getElementById('searchModal').style.visibility = 'hidden';
  document.getElementById('live-search-input').value = '';
});
document.getElementById('search-Icon').addEventListener('click', function () {
  document.getElementById('searchModal').style.visibility = 'visible';
});
document.getElementById('search-Icon-mobile').addEventListener('click', function () {
  document.getElementById('searchModal').style.visibility = 'visible';
});
document.addEventListener('DOMContentLoaded', function () {
  var faqSections = document.querySelectorAll('.faqsection');
  faqSections.forEach(function (section) {
    var questionDiv = section.querySelector('.question');
    var plusIcon = section.querySelector('.plus');
    var minusIcon = section.querySelector('.minus');
    var answerDiv = section.querySelector('.answer');
    questionDiv.addEventListener('click', function () {
      var isAnswerHidden = answerDiv.classList.contains('hidden');
      faqSections.forEach(function (s) {
        s.querySelector('.plus').classList.remove('hidden');
        s.querySelector('.minus').classList.add('hidden');
        s.querySelector('.answer').classList.add('hidden');
      });
      if (isAnswerHidden) {
        plusIcon.classList.add('hidden');
        minusIcon.classList.remove('hidden');
        answerDiv.classList.remove('hidden');
      }
    });
  });
});
document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('contactForm');
  form.addEventListener('submit', function (event) {
    event.preventDefault();
    var fullName = document.getElementById('fullName');
    var email = document.getElementById('email');
    var subject = document.getElementById('subject');
    var message = document.getElementById('message');
    var valid = true;
    document.querySelectorAll('.error').forEach(function (errorElement) {
      errorElement.remove();
    });
    if (fullName.value.trim() === '') {
      displayError(fullName, 'Full Name is required');
      valid = false;
    }
    if (subject.value.trim() === '') {
      displayError(subject, 'Subject is required');
      valid = false;
    }
    if (message.value.trim() === '') {
      displayError(message, 'Message is required');
      valid = false;
    }
    if (valid) {
      var formData = new FormData(form);
      fetch('/wp-content/themes/travel-explore/send-email.php', {
        method: 'POST',
        body: formData
      }).then(function (response) {
        return response.json();
      }).then(function (data) {
        if (data.message) {
          form.innerHTML = '<div class="text-center p-4 text-light-p40"><h3>Thank you for your message!</h3></div>';
          form.reset();
        } else {
          throw new Error(data.error || 'No message received');
        }
      })["catch"](function (error) {
        var messageContainer = document.getElementById('messageContainer');
        messageContainer.innerHTML = "<h3>There was a problem sending the email: ".concat(error.message, "</h3>");
        messageContainer.style.backgroundColor = '#f44336';
        messageContainer.classList.remove('hidden');
        console.error('Error:', error);
      });
    }
  });
  function displayError(element, message) {
    var error = document.createElement('div');
    error.textContent = message;
    error.className = 'error';
    error.style.color = 'red';
    element.parentNode.insertBefore(error, element.nextSibling);
  }
});
document.addEventListener('DOMContentLoaded', function () {
  var mapElement = document.getElementById('map');
  if (mapElement) {
    var latitude = parseFloat(mapElement.getAttribute('latitude'));
    var longitude = parseFloat(mapElement.getAttribute('longitude'));
    console.log('Latitude:', latitude);
    console.log('Longitude:', longitude);
    if (!isNaN(latitude) && !isNaN(longitude)) {
      var map = L.map('map').setView([latitude, longitude], 13);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);
      var marker = L.marker([latitude, longitude]).addTo(map);
      marker.bindPopup('Welcome to our location!');
    } else {
      console.error('Latitude or longitude is not a number.');
    }
  } else {
    console.error('Map element not found.');
  }
});

/***/ }),

/***/ "./src/sass/app.scss":
/*!***************************!*\
  !*** ./src/sass/app.scss ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 			// no module.id needed
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