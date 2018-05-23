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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/main.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src sync recursive \\.(styl|css)$":
/*!********************************!*\
  !*** ./src sync \.(styl|css)$ ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("var map = {\n\t\"./main.styl\": \"./src/main.styl\"\n};\n\n\nfunction webpackContext(req) {\n\tvar id = webpackContextResolve(req);\n\tvar module = __webpack_require__(id);\n\treturn module;\n}\nfunction webpackContextResolve(req) {\n\tvar id = map[req];\n\tif(!(id + 1)) { // check for number or string\n\t\tvar e = new Error('Cannot find module \"' + req + '\".');\n\t\te.code = 'MODULE_NOT_FOUND';\n\t\tthrow e;\n\t}\n\treturn id;\n}\nwebpackContext.keys = function webpackContextKeys() {\n\treturn Object.keys(map);\n};\nwebpackContext.resolve = webpackContextResolve;\nmodule.exports = webpackContext;\nwebpackContext.id = \"./src sync recursive \\\\.(styl|css)$\";\n\n//# sourceURL=webpack:///./src_sync_\\.(styl%7Ccss)$?");

/***/ }),

/***/ "./src/assets sync recursive \\.(png|jpg|gif)$":
/*!******************************************!*\
  !*** ./src/assets sync \.(png|jpg|gif)$ ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("var map = {\n\t\"./simple-bg.png\": \"./src/assets/simple-bg.png\"\n};\n\n\nfunction webpackContext(req) {\n\tvar id = webpackContextResolve(req);\n\tvar module = __webpack_require__(id);\n\treturn module;\n}\nfunction webpackContextResolve(req) {\n\tvar id = map[req];\n\tif(!(id + 1)) { // check for number or string\n\t\tvar e = new Error('Cannot find module \"' + req + '\".');\n\t\te.code = 'MODULE_NOT_FOUND';\n\t\tthrow e;\n\t}\n\treturn id;\n}\nwebpackContext.keys = function webpackContextKeys() {\n\treturn Object.keys(map);\n};\nwebpackContext.resolve = webpackContextResolve;\nmodule.exports = webpackContext;\nwebpackContext.id = \"./src/assets sync recursive \\\\.(png|jpg|gif)$\";\n\n//# sourceURL=webpack:///./src/assets_sync_\\.(png%7Cjpg%7Cgif)$?");

/***/ }),

/***/ "./src/assets/simple-bg.png":
/*!**********************************!*\
  !*** ./src/assets/simple-bg.png ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__.p + \"assets/simple-bg.png\";\n\n//# sourceURL=webpack:///./src/assets/simple-bg.png?");

/***/ }),

/***/ "./src/main.js":
/*!*********************!*\
  !*** ./src/main.js ***!
  \*********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\nvar _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\n/*  \nJunk News Aggregator\n--------------------\n\n(Shaun A. Noordin | shaunanoordin.com | 20180518)\n--------------------------------------------------------------------------------\n */\n\n/*  Imports\n    Import style and asset files, so Webpack knows to package them.\n */\n//------------------------------------------------------------------------------\n//Full info on how require.context() and importAll() works is available at\n//https://webpack.js.org/guides/dependency-management/\nfunction importAll(r) {\n  r.keys().forEach(r);\n}\nimportAll(__webpack_require__(\"./src sync recursive \\\\.(styl|css)$\"));\nimportAll(__webpack_require__(\"./src/assets sync recursive \\\\.(png|jpg|gif)$\"));\nimportAll(__webpack_require__(\"./src/pages sync recursive \\\\.(php|html)$\"));\n//------------------------------------------------------------------------------\n\nvar EXAMPLE = {\n  data: [{\n    publisher: \"100percentfedup\",\n    post_ID: \"311190048935167_1703680993019392\",\n    link: \"https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3\",\n    message: \"After 100 years; the BOY Scouts are changing their name to remove the word “Boy;” so as not to offend... girls 🤦‍♂️🤦‍♂️🤦‍♂️  Tell the Boy Scouts how completely stupid their politically correct pandering is!  972-580-2000 or MyScouting@scouting.org\",\n    picture: \"https://scontent.xx.fbcdn.net/v/t1.0-0/p130x130/31823834_1703680869686071_5510796134324371456_n.jpg?_nc_cat=0&oh=81acd9fe53f698974d7b4633df7805b2&oe=5B522AC6\",\n    full_picture: \"https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/31823834_1703680869686071_5510796134324371456_n.jpg?_nc_cat=0&oh=bf2f81b2e7b898c3aae690ac9292a0be&oe=5B5992D3\",\n    created_time: \"2018-05-03T15:30:01+0000\",\n    shares: \"348\",\n    comments: \"108\",\n    likes: \"180\",\n    LOVEs: \"0\",\n    HAHAs: \"4\",\n    WOWs: \"8\",\n    SADs: \"88\",\n    ANGRYs: \"176\"\n  }]\n};\n\n/*  Primary App Class\n */\n//------------------------------------------------------------------------------\n\nvar App = function () {\n  function App() {\n    _classCallCheck(this, App);\n\n    this.html = {\n      app: document.getElementById(\"app\"),\n      list: document.getElementById(\"list\"),\n      filter: document.getElementById(\"filter\"),\n      sort_comments: document.getElementById(\"sort_comments\"),\n      sort_shares: document.getElementById(\"sort_shares\"),\n      sort_likes: document.getElementById(\"sort_likes\"),\n      sort_loves: document.getElementById(\"sort_loves\"),\n      sort_hahas: document.getElementById(\"sort_hahas\"),\n      sort_wows: document.getElementById(\"sort_wows\"),\n      sort_sads: document.getElementById(\"sort_sads\"),\n      sort_angrys: document.getElementById(\"sort_angrys\")\n    };\n\n    this.PAGE_TYPES = {\n      DEFAULT: \"default\", //No particular page type.\n      LIST: \"list\" //Main listing\n    };\n\n    this.currentPageType = this.PAGE_TYPES.DEFAULT;\n    this.init = this.init.bind(this);\n  }\n\n  _createClass(App, [{\n    key: \"init\",\n    value: function init() {\n      console.log('+++ Page Type: ', this.currentPageType);\n\n      if (this.currentPageType === this.PAGE_TYPES.LIST) {\n        this.populateList();\n      }\n    }\n  }, {\n    key: \"populateList\",\n    value: function populateList() {\n      if (!this.html.list) return;\n    }\n  }]);\n\n  return App;\n}();\n//------------------------------------------------------------------------------\n\n/*  Initialisations\n */\n//------------------------------------------------------------------------------\n\n\nwindow.app = new App();\nwindow.onload = window.app.init;\n\n//Note: each page should specify its page type, e.g.\n//  window.app.currentPageType = window.app.PAGE_TYPES.LIST;\n//------------------------------------------------------------------------------\n\n//# sourceURL=webpack:///./src/main.js?");

/***/ }),

/***/ "./src/main.styl":
/*!***********************!*\
  !*** ./src/main.styl ***!
  \***********************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin\n\n//# sourceURL=webpack:///./src/main.styl?");

/***/ }),

/***/ "./src/pages sync recursive \\.(php|html)$":
/*!**************************************!*\
  !*** ./src/pages sync \.(php|html)$ ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("var map = {\n\t\"./common/footer.php\": \"./src/pages/common/footer.php\",\n\t\"./common/header.php\": \"./src/pages/common/header.php\",\n\t\"./index.php\": \"./src/pages/index.php\"\n};\n\n\nfunction webpackContext(req) {\n\tvar id = webpackContextResolve(req);\n\tvar module = __webpack_require__(id);\n\treturn module;\n}\nfunction webpackContextResolve(req) {\n\tvar id = map[req];\n\tif(!(id + 1)) { // check for number or string\n\t\tvar e = new Error('Cannot find module \"' + req + '\".');\n\t\te.code = 'MODULE_NOT_FOUND';\n\t\tthrow e;\n\t}\n\treturn id;\n}\nwebpackContext.keys = function webpackContextKeys() {\n\treturn Object.keys(map);\n};\nwebpackContext.resolve = webpackContextResolve;\nmodule.exports = webpackContext;\nwebpackContext.id = \"./src/pages sync recursive \\\\.(php|html)$\";\n\n//# sourceURL=webpack:///./src/pages_sync_\\.(php%7Chtml)$?");

/***/ }),

/***/ "./src/pages/common/footer.php":
/*!*************************************!*\
  !*** ./src/pages/common/footer.php ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__.p + \"common/footer.php\";\n\n//# sourceURL=webpack:///./src/pages/common/footer.php?");

/***/ }),

/***/ "./src/pages/common/header.php":
/*!*************************************!*\
  !*** ./src/pages/common/header.php ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__.p + \"common/header.php\";\n\n//# sourceURL=webpack:///./src/pages/common/header.php?");

/***/ }),

/***/ "./src/pages/index.php":
/*!*****************************!*\
  !*** ./src/pages/index.php ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__.p + \"index.php\";\n\n//# sourceURL=webpack:///./src/pages/index.php?");

/***/ })

/******/ });