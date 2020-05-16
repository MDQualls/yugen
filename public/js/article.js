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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/article.js":
/*!*********************************!*\
  !*** ./resources/js/article.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  /*
  * #############################
  * REPLY FORM
  * #############################
  */
  function toggleReplyForm(target) {
    var formContainer = $('.comment-reply-form-container');
    var commentReplyContainer = $(target).closest('.comment-reply-container').html();
    var commentReplyForm = formContainer.html();
    $(target).closest('.comment-reply-container').html(commentReplyForm);
    $(formContainer).html(commentReplyContainer);
    $("#commentReplyForm #parent_comment_id").val($(target).attr('data-parent-id'));
    $('#commentReplyTextarea').removeClass('required-error');
  }

  $(document).on('click', 'div.comment-reply-container a.text-info', function (e) {
    e.preventDefault();
    toggleReplyForm(e.target);
  });
  $(document).on('click', 'div.comment-reply-button-box a.comment-reply-cancel', function (e) {
    e.preventDefault();
    toggleReplyForm(e.target);
  });
  $(document).on('click', 'div.comment-reply-button-box a.comment-reply-submit', function (e) {
    e.preventDefault();
    var textarea = $('#commentReplyTextarea');
    var regex = RegExp('[a-zA-Z0-9]+');

    if (textarea.val() === undefined || regex.test(textarea.val()) === false) {
      textarea.addClass('required-error');
      return false;
    }

    $('#commentReplyForm').submit();
  });
  /*
  * #############################
  * EDIT FORM
  * #############################
  */

  function toggleCommentForm(target) {
    var formContainer = $('.edit-comment-form-container');
    var commentContainer = $(target).closest('.media-body').children('.comment-box');
    var commentContainerContent = commentContainer.html();
    var commentFormContent = formContainer.html();
    commentContainer.html(commentFormContent);
    formContainer.html(commentContainerContent);
    $("#editCommentForm #comment_id").val($(target).attr('data-comment-id'));
    $("#editCommentForm #editCommentTextarea").val(commentContainerContent.trim());
    $('#editCommentTextarea').removeClass('required-error');
  }

  $(document).on('click', 'div.edit-comment-link-box a.edit-comment-link', function (e) {
    e.preventDefault();
    $('.edit-comment-link-box').css('visibility', 'hidden');
    toggleCommentForm(this);
  });
  $(document).on('click', 'div.comment-box a.edit-comment-cancel', function (e) {
    e.preventDefault();
    $('.edit-comment-link-box').css('visibility', 'visible');
    toggleCommentForm(this);
  });
  $(document).on('click', 'div.edit-comment-button-box a.edit-comment-submit', function (e) {
    e.preventDefault();
    var textarea = $('#editCommentTextarea');
    var regex = RegExp('[a-zA-Z0-9]+');

    if (textarea.val() === undefined || regex.test(textarea.val()) === false) {
      textarea.addClass('required-error');
      return false;
    }

    $('#editCommentForm').submit();
  });
});

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/article.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! E:\laravel6\yugen\resources\js\article.js */"./resources/js/article.js");


/***/ })

/******/ });