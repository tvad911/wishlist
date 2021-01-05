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
/******/ 	return __webpack_require__(__webpack_require__.s = 73);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./platform/themes/tienphuoc/assets/js/wishlist.js":
/*!*********************************************************!*\
  !*** ./platform/themes/tienphuoc/assets/js/wishlist.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  "use strict";

  $(document).ready(function () {
    setWishListCount();
    $('.addWishlist').on('click', function (e) {
      e.preventDefault();
      var cookieName = ref_lang + '_wishlist';
      var property_id = $(this).data('id');
      var wishCookies = decodeURIComponent(getCookie(cookieName));
      var arrWList = [];

      if (property_id != null && property_id != 0 && property_id != undefined) {
        // Case 1: Wishlist cookies are undefined
        if (wishCookies == undefined || wishCookies == null || wishCookies == '') {
          var item = {
            id: property_id
          };
          arrWList.push(item);
          toastr.success($.i18n('wishlist_success'), $.i18n('message'), {
            timeOut: 3000,
            progressBar: true,
            positionClass: "toast-bottom-right"
          });
          setCookie(cookieName, JSON.stringify(arrWList), 60);
        } else {
          var item = {
            id: property_id
          };
          arrWList = JSON.parse(wishCookies);
          var index = arrWList.map(function (e) {
            return e.id;
          }).indexOf(item.id);

          if (index === -1) {
            arrWList.push(item);
            clearCookies(cookieName);
            setCookie(cookieName, JSON.stringify(arrWList), 60);
            toastr.success($.i18n('wishlist_success'), $.i18n('message'), {
              timeOut: 3000,
              progressBar: true,
              positionClass: "toast-bottom-right"
            });
          } else {
            arrWList.splice(index, 1);
            clearCookies(cookieName);
            setCookie(cookieName, JSON.stringify(arrWList), 60);
            toastr.error($.i18n('wishlist_remove'), $.i18n('message'), {
              timeOut: 3000,
              progressBar: true,
              positionClass: "toast-bottom-right"
            });
          }
        }
      }

      var arrWList = JSON.parse(getCookie(cookieName));
      var countWishlist = arrWList.length;
      $('.wishlist .count').text(countWishlist);
      $('.wishlist-mb .count').text("(".concat(countWishlist, ")"));
      setWishListCount();
    });
    $('.wishlist-page').on('click', ".p-like", function (e) {
      e.preventDefault();
      var cookieName = ref_lang + '_wishlist';
      var property_id = $(this).data('id');
      var wishCookies = decodeURIComponent(getCookie(cookieName));
      var arrWList = [];

      if (property_id != null && property_id != 0 && property_id != undefined) {
        var item = {
          id: property_id
        };
        arrWList = JSON.parse(wishCookies);
        var index = arrWList.map(function (e) {
          return e.id;
        }).indexOf(item.id);

        if (index != -1) {
          arrWList.splice(index, 1);
          clearCookies(cookieName);
          setCookie(cookieName, JSON.stringify(arrWList), 60);
          toastr.error($.i18n('wishlist_remove'), $.i18n('message'), {
            timeOut: 3000,
            progressBar: true,
            positionClass: "toast-bottom-right"
          });
          $(".wishlist-page .item[data-id=".concat(property_id, "]")).remove();
        }
      }

      var arrWList = JSON.parse(getCookie(cookieName));
      var countWishlist = arrWList.length;

      if (countWishlist <= 0) {
        var html = "<div class=\"no-result text-center\">\n                                <p class=\"message\">".concat($.i18n('no_wishlist'), "</p>\n                            </div>");
        $('.wishlist-page .boxContent .row:first-child').html(html);
        $('.wishlist-page .link-share-page').hide();
      }

      $('.wishlist .count').text(countWishlist);
      $('.wishlist-mb .count').text("(".concat(countWishlist, ")"));
      setWishListCount();
    });
    $('.wishlist-page #form-share-link').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var cookieName = ref_lang + '_wishlist';
      var wishCookies = decodeURIComponent(getCookie(cookieName));
      var arrWList = [];
      arrWList = JSON.parse(wishCookies);
      var countWishlist = arrWList.length;
      var fd = new FormData($(this).closest('form')[0]);
      fd.append('value', wishCookies);

      if (countWishlist > 0) {
        // Thực thi gọi API
        $.ajax({
          type: 'POST',
          cache: false,
          url: $(this).closest('form').prop('action'),
          data: fd,
          contentType: false,
          processData: false,
          success: function success(res) {
            if (!res.error) {
              if (res.data) {
                var popup = $('#popup-wishlist-share');
                popup.find('.title').text($.i18n('share_link'));
                popup.find('#link-share').val(res.data.url);
                $.fancybox.open({
                  src: '#popup-wishlist-share',
                  type: 'inline',
                  opts: {}
                });
              }
            } else {
              toastr.warning(res.message);
            }
          },
          error: function error(res) {
            toastr.error($.i18n('something_went_wrong'), $.i18n('message'));
          }
        });
      } else {
        toastr.error($.i18n('wishlist_nocontent'), $.i18n('message'));
      }
    });
    $('#popup-wishlist-share').on('click', ".btncopy", function (e) {
      e.preventDefault();
      copyFunction('link-share');
    });
    $("#popup-wishlist-share .share-tw").click(function () {
      var t = $("#link-share").val();
      window.open("https://twitter.com/intent/tweet?url=" + t);
    });
    $("#popup-wishlist-share .share-fb").click(function () {
      var t = $("#link-share").val();
      window.open("https://www.facebook.com/sharer.php?u=" + t, "", "width=450,height=450");
    });

    function setWishListCount() {
      var cookieName = ref_lang + '_wishlist';
      var wishListCookies = decodeURIComponent(getCookie(cookieName));
      var arrWishlist = [];

      if (wishListCookies != null && wishListCookies != undefined && !!wishListCookies) {
        var arrList = JSON.parse(wishListCookies);
        var countWishlist = arrList.length;
        $('.wishlist .count').text(countWishlist);
        $('.wishlist-mb .count').text("(".concat(countWishlist, ")"));

        if (countWishlist > 0) {
          $('.addWishlist').removeClass('active');
          $.each(arrList, function (key, value) {
            if (value != null) {
              $(".addWishlist[data-id=".concat(value.id, "]")).addClass('active');
            }
          });
        }
      }
    }

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      var url = new URL(siteUrl);
      d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
      var expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/" + "; domain=" + url.hostname;
    }

    function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');

      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];

        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }

      return "";
    }

    function clearCookies(name) {
      var url = new URL(siteUrl);
      document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/" + "; domain=" + url.hostname;
    }

    function copyFunction(id) {
      var copyText = document.getElementById(id);
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      document.execCommand("copy");
    }
  });
})(jQuery);

/***/ }),

/***/ 73:
/*!***************************************************************!*\
  !*** multi ./platform/themes/tienphuoc/assets/js/wishlist.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\OpenServer\domains\flexhome.doc\platform\themes\tienphuoc\assets\js\wishlist.js */"./platform/themes/tienphuoc/assets/js/wishlist.js");


/***/ })

/******/ });