/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/app.js":
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
/***/ (() => {

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
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
  if (form) {
    var displayError = function displayError(element, message) {
      var error = document.createElement('div');
      error.textContent = message;
      error.className = 'error';
      error.style.color = 'red';
      element.parentNode.insertBefore(error, element.nextSibling);
    };
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
  }
});
document.addEventListener('DOMContentLoaded', function () {
  var mapElement = document.getElementById('map');
  if (mapElement) {
    var latitude = parseFloat(mapElement.getAttribute('latitude'));
    var longitude = parseFloat(mapElement.getAttribute('longitude'));
    if (!isNaN(latitude) && !isNaN(longitude)) {
      var map = L.map('map').setView([latitude, longitude], 13);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);
      var marker = L.marker([latitude, longitude]).addTo(map);
      marker.bindPopup('Welcome to our location!');
    }
  }
});
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.reply-toggle').forEach(function (button) {
    button.addEventListener('click', function () {
      var commentId = this.getAttribute('data-comment-id');
      document.getElementById('reply-form-' + commentId).classList.toggle('hidden');
    });
  });
  document.querySelectorAll('.cancel-reply').forEach(function (button) {
    button.addEventListener('click', function () {
      var commentId = this.closest('.reply-form').id.replace('reply-form-', '');
      document.getElementById('reply-form-' + commentId).classList.add('hidden');
    });
  });
});
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.show-replies').forEach(function (toggle) {
    toggle.addEventListener('click', function () {
      var commentId = this.getAttribute('data-comment-id');
      var repliesContainer = document.getElementById("replies-".concat(commentId));
      repliesContainer.classList.toggle('hidden');
      this.textContent = repliesContainer.classList.contains('hidden') ? 'Show replies' : 'Hide replies';
    });
  });
});
document.addEventListener('DOMContentLoaded', function () {
  var commentForm = document.getElementById('commentform');
  if (commentForm) {
    commentForm.addEventListener('submit', function (event) {
      if (currentUserId !== postAuthorId && currentUserId !== 1) {
        window.location.reload();
        alert('Your comment will be approved by the admin.');
      } else {
        window.location.reload();
        alert('Your comment added succesfully.');
      }
    });
  }
  var replyForms = document.querySelectorAll('.comment-form');
  replyForms.forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (currentUserId !== postAuthorId && currentUserId !== 1) {
        window.location.reload();
        alert('Your reply will be approved by the admin.');
      } else {
        window.location.reload();
        alert('Your reply added succesfully.');
      }
    });
  });
});
document.addEventListener('DOMContentLoaded', function () {
  var showPasswordsCheckbox = document.getElementById('show_passwords');
  if (showPasswordsCheckbox) {
    showPasswordsCheckbox.addEventListener('change', function () {
      var passwordFields = document.querySelectorAll('input[type="password"], input[type="text"]');
      var showPasswords = this.checked;
      passwordFields.forEach(function (field) {
        if (field.type === 'password' && showPasswords) {
          field.dataset.type = 'password';
          field.type = 'text';
        } else if (field.dataset.type === 'password') {
          field.type = 'password';
        }
      });
    });
  }
});
document.addEventListener('DOMContentLoaded', function () {
  var cookieConsentBanner = document.getElementById('cookie-consent-banner');
  var cookieConsentAccept = document.getElementById('cookie-consent-accept');
  var cookieConsentReject = document.getElementById('cookie-consent-reject');
  setTimeout(function () {
    var cookieConsentBanner = document.getElementById('cookie-consent-banner');
    if (!getCookie('cookie_consent')) {
      cookieConsentBanner.classList.remove('hidden');
    }
    cookieConsentAccept.addEventListener('click', function () {
      setCookie('cookie_consent', 'accepted', 365);
      cookieConsentBanner.classList.add('hidden');
    });
    cookieConsentReject.addEventListener('click', function () {
      cookieConsentBanner.classList.add('hidden');
    });
  }, 2000);
  function setCookie(name, value, days) {
    var d = new Date();
    d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
  }
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }
  if (getCookie('cookie_consent') === 'accepted') {
    loadTrackingScripts();
  }
  function loadTrackingScripts() {
    var script = document.createElement('script');
    script.async = true;
    script.src = 'https://www.googletagmanager.com/gtag/js?id=UA-XXXXX-Y';
    document.head.appendChild(script);
    script.onload = function () {
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-XXXXX-Y');
    };
  }
});
document.addEventListener('DOMContentLoaded', function () {
  var priceElement = document.getElementById('card_price');
  var personsElement = document.getElementById('persons');
  var totalPriceElement = document.getElementById('total_price');
  var totalPriceDisplay = document.getElementById('total-price-display');
  if (priceElement && personsElement && totalPriceElement && totalPriceDisplay) {
    var updateTotalPrice = function updateTotalPrice() {
      var numberOfPersons = parseInt(personsElement.value);
      if (!isNaN(numberOfPersons) && !isNaN(basePrice)) {
        var totalPrice = basePrice * numberOfPersons;
        totalPriceElement.value = totalPrice.toFixed(2);
        totalPriceDisplay.textContent = "Total Price: \u20AC".concat(totalPrice.toFixed(2));
      } else {
        totalPriceElement.value = '0.00';
        totalPriceDisplay.textContent = 'Total Price: €0.00';
      }
    };
    var basePrice = parseFloat(priceElement.value);
    personsElement.addEventListener('input', updateTotalPrice);
    updateTotalPrice();
  }
});
document.addEventListener('DOMContentLoaded', function () {
  var popup = document.getElementById('popup-notification');
  var closeBtn = document.getElementById('close-popup');
  function showPopup() {
    popup.classList.remove('hidden');
  }
  function closePopup() {
    popup.classList.add('hidden');
  }
  if (closeBtn) {
    closeBtn.addEventListener('click', closePopup);
    if (window.ShowPopup) {
      showPopup();
    }
  }
});
document.addEventListener('DOMContentLoaded', function () {
  if (window.showEncouragementNotification) {
    var encouragementNotification = document.getElementById('encouragementNotification');
    var closeEncouragementBtn = document.getElementById('closeEncouragementNotification');
    encouragementNotification.classList.remove('hidden');
    closeEncouragementBtn.addEventListener('click', function () {
      encouragementNotification.classList.add('hidden');
    });
  }
});
document.addEventListener('DOMContentLoaded', function () {
  var urlParams = new URLSearchParams(window.location.search);
  var location = urlParams.get('location');
  if (location) {
    document.getElementById('end-input').value = location;
  }
  if (document.getElementById('route-map')) {
    var getCoordinates = /*#__PURE__*/function () {
      var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(location) {
        var response, data, _data$, lat, lon;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              _context.prev = 0;
              _context.next = 3;
              return fetch("https://nominatim.openstreetmap.org/search?format=json&q=".concat(location));
            case 3:
              response = _context.sent;
              _context.next = 6;
              return response.json();
            case 6:
              data = _context.sent;
              if (!(data && data.length > 0)) {
                _context.next = 12;
                break;
              }
              _data$ = data[0], lat = _data$.lat, lon = _data$.lon;
              return _context.abrupt("return", L.latLng(lat, lon));
            case 12:
              alert('Could not find the location: ' + location);
              return _context.abrupt("return", null);
            case 14:
              _context.next = 21;
              break;
            case 16:
              _context.prev = 16;
              _context.t0 = _context["catch"](0);
              console.error('Geocoding error:', _context.t0);
              alert('An error occurred while fetching location data.');
              return _context.abrupt("return", null);
            case 21:
            case "end":
              return _context.stop();
          }
        }, _callee, null, [[0, 16]]);
      }));
      return function getCoordinates(_x) {
        return _ref.apply(this, arguments);
      };
    }();
    var map = L.map('route-map').setView([42.6629, 21.1655], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19
    }).addTo(map);
    var control = L.Routing.control({
      waypoints: [],
      routeWhileDragging: true,
      router: L.Routing.osrmv1({
        serviceUrl: 'https://router.project-osrm.org/route/v1/'
      })
    }).addTo(map);
    var start, end;
    var currentLocationMarker;
    var startLocationType = 'current';
    control.on('routesfound', function (e) {
      var routes = e.routes;
      var summary = routes[0].summary;
      var distance = (summary.totalDistance / 1000).toFixed(1) + ' km';
      var totalMinutes = summary.totalTime / 60;
      var duration;
      if (totalMinutes > 60) {
        var hours = Math.floor(totalMinutes / 60);
        var minutes = Math.floor(totalMinutes % 60);
        duration = hours + ' hr ' + minutes + ' min';
      } else {
        duration = totalMinutes.toFixed(0) + ' min';
      }
      document.getElementById('route-info').innerHTML = '<p class="distance">Distance: ' + distance + '</p>' + '<p class="duration">Duration: ' + duration + '</p>';
      document.getElementById('route-info').style.display = 'flex';
    });
    document.getElementById('location-type').addEventListener('change', function () {
      startLocationType = document.getElementById('location-type').value;
      var manualLocationDiv = document.getElementById('manual-location');
      if (startLocationType === 'manual') {
        manualLocationDiv.style.display = 'block';
      } else {
        manualLocationDiv.style.display = 'none';
      }
    });
    document.getElementById('start-now').addEventListener('click', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee3() {
      var endInput, startInput;
      return _regeneratorRuntime().wrap(function _callee3$(_context3) {
        while (1) switch (_context3.prev = _context3.next) {
          case 0:
            endInput = document.getElementById('end-input').value;
            if (!(startLocationType === 'current')) {
              _context3.next = 5;
              break;
            }
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition( /*#__PURE__*/function () {
                var _ref3 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2(position) {
                  return _regeneratorRuntime().wrap(function _callee2$(_context2) {
                    while (1) switch (_context2.prev = _context2.next) {
                      case 0:
                        start = L.latLng(position.coords.latitude, position.coords.longitude);
                        _context2.next = 3;
                        return getCoordinates(endInput);
                      case 3:
                        end = _context2.sent;
                        if (end) {
                          control.setWaypoints([start, end]);
                          document.getElementById('start-navigation').style.display = 'inline-block'; // Show the start button
                        } else {
                          alert('Please enter a valid location for the end point.');
                        }
                      case 5:
                      case "end":
                        return _context2.stop();
                    }
                  }, _callee2);
                }));
                return function (_x2) {
                  return _ref3.apply(this, arguments);
                };
              }(), function (error) {
                alert('Error retrieving current location: ' + error.message);
              });
            } else {
              alert('Geolocation is not supported by this browser.');
            }
            _context3.next = 13;
            break;
          case 5:
            startInput = document.getElementById('city-input').value;
            _context3.next = 8;
            return getCoordinates(startInput);
          case 8:
            start = _context3.sent;
            _context3.next = 11;
            return getCoordinates(endInput);
          case 11:
            end = _context3.sent;
            if (start && end) {
              control.setWaypoints([start, end]);
              document.getElementById('start-navigation').style.display = 'inline-block';
            } else {
              alert('Please enter valid locations for both start and end points.');
            }
          case 13:
          case "end":
            return _context3.stop();
        }
      }, _callee3);
    })));
    document.getElementById('start-navigation').addEventListener('click', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee5() {
      return _regeneratorRuntime().wrap(function _callee5$(_context5) {
        while (1) switch (_context5.prev = _context5.next) {
          case 0:
            if (startLocationType === 'current') {
              if (navigator.geolocation) {
                navigator.geolocation.watchPosition( /*#__PURE__*/function () {
                  var _ref5 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee4(position) {
                    var currentLocation;
                    return _regeneratorRuntime().wrap(function _callee4$(_context4) {
                      while (1) switch (_context4.prev = _context4.next) {
                        case 0:
                          currentLocation = L.latLng(position.coords.latitude, position.coords.longitude);
                          if (currentLocationMarker) {
                            currentLocationMarker.setLatLng(currentLocation);
                          } else {
                            currentLocationMarker = L.marker(currentLocation).addTo(map).bindPopup('You are here').openPopup();
                          }
                          map.setView(currentLocation, 19);
                          if (start && end) {
                            control.setWaypoints([currentLocation, end]);
                          }
                        case 4:
                        case "end":
                          return _context4.stop();
                      }
                    }, _callee4);
                  }));
                  return function (_x3) {
                    return _ref5.apply(this, arguments);
                  };
                }(), function (error) {
                  alert('Error retrieving current location for navigation: ' + error.message);
                }, {
                  enableHighAccuracy: true,
                  maximumAge: 0,
                  timeout: Infinity
                });
              } else {
                alert('Geolocation is not supported by this browser.');
              }
            } else {
              if (start && end) {
                control.setWaypoints([start, end]);
              } else {
                alert('Please enter valid locations for both start and end points.');
              }
            }
          case 1:
          case "end":
            return _context5.stop();
        }
      }, _callee5);
    })));
  }
});
document.addEventListener('DOMContentLoaded', function () {
  var loader = document.getElementById('loader');
  loader.classList.remove('hidden');
  setTimeout(function () {
    loader.classList.add('hidden');
  }, 1800);
});
document.addEventListener('DOMContentLoaded', function () {
  function submitBookingForm(image, title, duration, description, price) {
    document.getElementById('formImage').value = image;
    document.getElementById('formTitle').value = title;
    document.getElementById('formDuration').value = duration;
    document.getElementById('formDescription').value = description;
    document.getElementById('formPrice').value = price;
    document.getElementById('bookingForm').submit();
  }
  window.submitBookingForm = submitBookingForm;
});
document.addEventListener('DOMContentLoaded', function () {
  var closeButton = document.getElementById('closeButton');
  if (closeButton) {
    closeButton.addEventListener('click', function () {
      document.getElementById('modal').style.display = 'none';
    });
  }
});
document.querySelectorAll('input[name="_mc4wp_action"]').forEach(function (radio) {
  radio.addEventListener('change', function () {
    var subscribeRadio = document.querySelector('input[name="_mc4wp_action"]:checked').value;
    var submitButton = document.getElementById('submitButton');
    submitButton.value = subscribeRadio.charAt(0).toUpperCase() + subscribeRadio.slice(1);
  });
});
document.addEventListener('DOMContentLoaded', function () {
  var reservationForm = document.getElementById('reservation-form');
  if (reservationForm) {
    reservationForm.addEventListener('submit', function (event) {
      alert('Your reservation is being processed. You will be redirected to the Homepage.');
    });
  }
});
document.addEventListener('DOMContentLoaded', function () {
  var locationTypeSelect = document.getElementById('location-type');
  var manualLocationDiv = document.getElementById('manual-location');
  locationTypeSelect.addEventListener('change', function () {
    if (locationTypeSelect.value === 'manual') {
      manualLocationDiv.style.display = 'block';
    } else {
      manualLocationDiv.style.display = 'none';
    }
  });
  var svgIcon = "\n        <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n            <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M12 2C8.13401 2 5 5.13401 5 9C5 13.904 12 22 12 22C12 22 19 13.904 19 9C19 5.13401 15.866 2 12 2ZM12 11.5C10.6193 11.5 9.5 10.3807 9.5 9C9.5 7.61929 10.6193 6.5 12 6.5C13.3807 6.5 14.5 7.61929 14.5 9C14.5 10.3807 13.3807 11.5 12 11.5Z\" fill=\"currentColor\"/>\n        </svg>\n    ";
  function setupSuggestions(inputElement, suggestionsContainer) {
    if (inputElement) {
      inputElement.addEventListener('input', function () {
        var cityName = inputElement.value.trim();
        if (cityName.length > 2) {
          fetch("".concat(ajaxurl.url, "?action=fetch_city_data&city_name=").concat(cityName)).then(function (response) {
            return response.json();
          }).then(function (data) {
            suggestionsContainer.innerHTML = '';
            if (data.success && data.data && data.data.length) {
              suggestionsContainer.classList.add('show');
              suggestionsContainer.style.width = "".concat(inputElement.offsetWidth, "px");
              data.data.forEach(function (city) {
                var suggestionItem = document.createElement('div');
                suggestionItem.classList.add('suggestion-item');
                var containerDiv = document.createElement('div');
                containerDiv.classList.add('flex', 'items-center');
                containerDiv.innerHTML = svgIcon;
                var country = city.country === 'XK' ? 'Kosovo' : city.country;
                var highlightedText = city.name.replace(new RegExp(cityName, 'gi'), function (match) {
                  return "<strong>".concat(match, "</strong>");
                });
                var cityText = document.createElement('span');
                cityText.innerHTML = " ".concat(highlightedText, ", ").concat(country);
                containerDiv.appendChild(cityText);
                suggestionItem.appendChild(containerDiv);
                suggestionsContainer.appendChild(suggestionItem);
                suggestionItem.addEventListener('click', function () {
                  inputElement.value = "".concat(city.name, ", ").concat(country);
                  suggestionsContainer.innerHTML = '';
                  suggestionsContainer.classList.remove('show');
                  var event = new Event('input', {
                    bubbles: true,
                    cancelable: true
                  });
                  inputElement.dispatchEvent(event);
                });
              });
            } else {
              suggestionsContainer.classList.remove('show');
            }
          })["catch"](function (error) {
            suggestionsContainer.classList.remove('show');
            console.error('Error fetching city data:', error);
          });
        } else {
          suggestionsContainer.classList.remove('show');
        }
      });
      inputElement.addEventListener('focus', function () {
        suggestionsContainer.style.width = "".concat(inputElement.offsetWidth, "px");
      });
    } else {
      console.error('Input field not found');
    }
  }
  var cityInput = document.getElementById('city-input');
  var citySuggestions = document.getElementById('suggestions');
  setupSuggestions(cityInput, citySuggestions);
  var endInput = document.getElementById('end-input');
  var endSuggestions = document.getElementById('end-suggestions');
  setupSuggestions(endInput, endSuggestions);
  window.addEventListener('resize', function () {
    if (cityInput) {
      citySuggestions.style.width = "".concat(cityInput.offsetWidth, "px");
    }
    if (endInput) {
      endSuggestions.style.width = "".concat(endInput.offsetWidth, "px");
    }
  });
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