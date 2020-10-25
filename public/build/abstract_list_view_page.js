(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["abstract_list_view_page"],{

/***/ "./assets/css/pages/lists/abstract_list_view.page.css":
/*!************************************************************!*\
  !*** ./assets/css/pages/lists/abstract_list_view.page.css ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/pages/lists/abstract_list_view.page.js":
/*!**********************************************************!*\
  !*** ./assets/js/pages/lists/abstract_list_view.page.js ***!
  \**********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_for_each__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.for-each */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_array_join__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.array.join */ "./node_modules/core-js/modules/es.array.join.js");
/* harmony import */ var core_js_modules_es_array_join__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_join__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_array_sort__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.array.sort */ "./node_modules/core-js/modules/es.array.sort.js");
/* harmony import */ var core_js_modules_es_array_sort__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_sort__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_regexp_exec__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.string.split */ "./node_modules/core-js/modules/es.string.split.js");
/* harmony import */ var core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_split__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _css_pages_lists_abstract_list_view_page_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../css/pages/lists/abstract_list_view.page.css */ "./assets/css/pages/lists/abstract_list_view.page.css");
/* harmony import */ var _css_pages_lists_abstract_list_view_page_css__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_css_pages_lists_abstract_list_view_page_css__WEBPACK_IMPORTED_MODULE_5__);






document.addEventListener('DOMContentLoaded', function () {
  var listItems = document.getElementsByClassName('my-list-group-item');

  var _loop = function _loop(i) {
    var listItem = listItems.item(i);
    var itemId = listItem.dataset.itemId;
    var fromRoute = listItem.dataset.fromRoute;
    var onClickRoute = listItem.dataset.onClickRoute;
    listItem.addEventListener("click", function () {
      var currentUrl = window.location.href;
      var newUrl = currentUrl.split("/", 3).join("/");
      window.location.href = newUrl + '/' + onClickRoute + '?from=' + fromRoute + '&dataId=' + itemId;
    });
  };

  for (var i = 0; i < listItems.length; i++) {
    _loop(i);
  }

  var currentOrderDirection = 'asc';
  var header = document.getElementById('header');
  header.addEventListener('click', function () {
    var list = document.getElementById('list');
    var newList = list.cloneNode(false);
    var items = [];

    if (currentOrderDirection === 'asc') {
      setCurrentOrderDirection('desc');
    } else {
      setCurrentOrderDirection('asc');
    }

    for (var _i = list.childNodes.length; _i--;) {
      var item = list.childNodes[_i];

      if (item.nodeName === 'LI') {
        items.push(item);
      }
    }

    items.sort(function (a, b) {
      var aContent = a.childNodes[0].data;
      var bContent = b.childNodes[0].data;

      if (currentOrderDirection === 'asc') {
        return aContent.localeCompare(bContent);
      } else {
        return bContent.localeCompare(aContent);
      }
    });
    items.forEach(function (item) {
      return newList.appendChild(item);
    });
    list.parentNode.replaceChild(newList, list);
  });

  function setCurrentOrderDirection(orderDirection) {
    var oldText = header.innerText;
    var newText = oldText.substring(0, oldText.length - 1);

    if (orderDirection === 'desc') {
      newText = newText + '↓';
    } else {
      newText = newText + '↑';
    }

    currentOrderDirection = orderDirection;
    header.innerHTML = '<b>' + newText + '</b>';
  }
});

/***/ })

},[["./assets/js/pages/lists/abstract_list_view.page.js","runtime","vendors~abstract_list_view_page~layout~movie_booking_component_logged_out~movie_entry_component~movi~b505c613","vendors~abstract_list_view_page~movie_booking_component_logged_out~movie_entry_list_component","vendors~abstract_list_view_page"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL3BhZ2VzL2xpc3RzL2Fic3RyYWN0X2xpc3Rfdmlldy5wYWdlLmNzcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvcGFnZXMvbGlzdHMvYWJzdHJhY3RfbGlzdF92aWV3LnBhZ2UuanMiXSwibmFtZXMiOlsiZG9jdW1lbnQiLCJhZGRFdmVudExpc3RlbmVyIiwibGlzdEl0ZW1zIiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsImkiLCJsaXN0SXRlbSIsIml0ZW0iLCJpdGVtSWQiLCJkYXRhc2V0IiwiZnJvbVJvdXRlIiwib25DbGlja1JvdXRlIiwiY3VycmVudFVybCIsIndpbmRvdyIsImxvY2F0aW9uIiwiaHJlZiIsIm5ld1VybCIsInNwbGl0Iiwiam9pbiIsImxlbmd0aCIsImN1cnJlbnRPcmRlckRpcmVjdGlvbiIsImhlYWRlciIsImdldEVsZW1lbnRCeUlkIiwibGlzdCIsIm5ld0xpc3QiLCJjbG9uZU5vZGUiLCJpdGVtcyIsInNldEN1cnJlbnRPcmRlckRpcmVjdGlvbiIsImNoaWxkTm9kZXMiLCJub2RlTmFtZSIsInB1c2giLCJzb3J0IiwiYSIsImIiLCJhQ29udGVudCIsImRhdGEiLCJiQ29udGVudCIsImxvY2FsZUNvbXBhcmUiLCJmb3JFYWNoIiwiYXBwZW5kQ2hpbGQiLCJwYXJlbnROb2RlIiwicmVwbGFjZUNoaWxkIiwib3JkZXJEaXJlY3Rpb24iLCJvbGRUZXh0IiwiaW5uZXJUZXh0IiwibmV3VGV4dCIsInN1YnN0cmluZyIsImlubmVySFRNTCJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUEsdUM7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQ0FBO0FBRUFBLFFBQVEsQ0FBQ0MsZ0JBQVQsQ0FBMEIsa0JBQTFCLEVBQThDLFlBQU07QUFDaEQsTUFBTUMsU0FBUyxHQUFHRixRQUFRLENBQUNHLHNCQUFULENBQWdDLG9CQUFoQyxDQUFsQjs7QUFEZ0QsNkJBR3ZDQyxDQUh1QztBQUk1QyxR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QUFsQyxFQUFrRDtBQUM5QyxRQUFNQyxPQUFPLEdBQUd0QixNQUFNLENBQUN1QixTQUF2QjtBQUNBLFFBQUlDLE9BQU8sR0FBR0YsT0FBTyxDQUFDRyxTQUFSLENBQWtCLENBQWxCLEVBQXFCSCxPQUFPLENBQUN4QixNQUFSLEdBQWlCLENBQXRDLENBQWQ7O0FBRUEsUUFBSXVCLGNBQWMsS0FBSyxNQUF2QixFQUErQjtBQUMzQkcsYUFBTyxHQUFHQSxPQUFPLEdBQUcsR0FBcEI7QUFDSCxLQUZELE1BRU87QUFDSEEsYUFBTyxHQUFHQSxPQUFPLEdBQUcsR0FBcEI7QUFDSDs7QUFFRHpCLHlCQUFxQixHQUFHc0IsY0FBeEI7QUFDQXJCLFVBQU0sQ0FBQzBCLFNBQVAsR0FBbUIsUUFBUUYsT0FBUixHQUFrQixNQUFyQztBQUNIO0FBQ0osQ0FsRUQsRSIsImZpbGUiOiJhYnN0cmFjdF9saXN0X3ZpZXdfcGFnZS5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsImltcG9ydCAnLi4vLi4vLi4vY3NzL3BhZ2VzL2xpc3RzL2Fic3RyYWN0X2xpc3Rfdmlldy5wYWdlLmNzcyc7XG5cbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XG4gICAgY29uc3QgbGlzdEl0ZW1zID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgnbXktbGlzdC1ncm91cC1pdGVtJyk7XG5cbiAgICBmb3IgKGxldCBpID0gMDsgaSA8IGxpc3RJdGVtcy5sZW5ndGg7IGkrKykge1xuICAgICAgICBjb25zdCBsaXN0SXRlbSA9IGxpc3RJdGVtcy5pdGVtKGkpO1xuICAgICAgICBjb25zdCBpdGVtSWQgPSBsaXN0SXRlbS5kYXRhc2V0Lml0ZW1JZDtcbiAgICAgICAgY29uc3QgZnJvbVJvdXRlID0gbGlzdEl0ZW0uZGF0YXNldC5mcm9tUm91dGU7XG4gICAgICAgIGNvbnN0IG9uQ2xpY2tSb3V0ZSA9IGxpc3RJdGVtLmRhdGFzZXQub25DbGlja1JvdXRlO1xuXG4gICAgICAgIGxpc3RJdGVtLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoKSA9PiB7XG4gICAgICAgICAgICBjb25zdCBjdXJyZW50VXJsID0gd2luZG93LmxvY2F0aW9uLmhyZWY7XG4gICAgICAgICAgICBjb25zdCBuZXdVcmwgPSBjdXJyZW50VXJsLnNwbGl0KFwiL1wiLCAzKS5qb2luKFwiL1wiKTtcbiAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gbmV3VXJsICsgJy8nICsgb25DbGlja1JvdXRlICsgJz9mcm9tPScgKyBmcm9tUm91dGUgKyAnJmRhdGFJZD0nICsgaXRlbUlkO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBsZXQgY3VycmVudE9yZGVyRGlyZWN0aW9uID0gJ2FzYyc7XG4gICAgY29uc3QgaGVhZGVyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2hlYWRlcicpO1xuXG4gICAgaGVhZGVyLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4ge1xuICAgICAgICBjb25zdCBsaXN0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2xpc3QnKTtcbiAgICAgICAgY29uc3QgbmV3TGlzdCA9IGxpc3QuY2xvbmVOb2RlKGZhbHNlKTtcbiAgICAgICAgY29uc3QgaXRlbXMgPSBbXTtcblxuICAgICAgICBpZiAoY3VycmVudE9yZGVyRGlyZWN0aW9uID09PSAnYXNjJykge1xuICAgICAgICAgICAgc2V0Q3VycmVudE9yZGVyRGlyZWN0aW9uKCdkZXNjJyk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBzZXRDdXJyZW50T3JkZXJEaXJlY3Rpb24oJ2FzYycpO1xuICAgICAgICB9XG5cbiAgICAgICAgZm9yIChsZXQgaSA9IGxpc3QuY2hpbGROb2Rlcy5sZW5ndGg7IGktLTspIHtcbiAgICAgICAgICAgIGNvbnN0IGl0ZW0gPSBsaXN0LmNoaWxkTm9kZXNbaV07XG5cbiAgICAgICAgICAgIGlmIChpdGVtLm5vZGVOYW1lID09PSAnTEknKSB7XG4gICAgICAgICAgICAgICAgaXRlbXMucHVzaChpdGVtKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuXG4gICAgICAgIGl0ZW1zLnNvcnQoKGEsIGIpID0+IHtcbiAgICAgICAgICAgIGNvbnN0IGFDb250ZW50ID0gYS5jaGlsZE5vZGVzWzBdLmRhdGE7XG4gICAgICAgICAgICBjb25zdCBiQ29udGVudCA9IGIuY2hpbGROb2Rlc1swXS5kYXRhO1xuXG4gICAgICAgICAgICBpZiAoY3VycmVudE9yZGVyRGlyZWN0aW9uID09PSAnYXNjJykge1xuICAgICAgICAgICAgICAgIHJldHVybiBhQ29udGVudC5sb2NhbGVDb21wYXJlKGJDb250ZW50KTtcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuIGJDb250ZW50LmxvY2FsZUNvbXBhcmUoYUNvbnRlbnQpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcblxuICAgICAgICBpdGVtcy5mb3JFYWNoKGl0ZW0gPT4gbmV3TGlzdC5hcHBlbmRDaGlsZChpdGVtKSk7XG4gICAgICAgIGxpc3QucGFyZW50Tm9kZS5yZXBsYWNlQ2hpbGQobmV3TGlzdCwgbGlzdCk7XG4gICAgfSk7XG5cbiAgICBmdW5jdGlvbiBzZXRDdXJyZW50T3JkZXJEaXJlY3Rpb24ob3JkZXJEaXJlY3Rpb24pIHtcbiAgICAgICAgY29uc3Qgb2xkVGV4dCA9IGhlYWRlci5pbm5lclRleHQ7XG4gICAgICAgIGxldCBuZXdUZXh0ID0gb2xkVGV4dC5zdWJzdHJpbmcoMCwgb2xkVGV4dC5sZW5ndGggLSAxKTtcblxuICAgICAgICBpZiAob3JkZXJEaXJlY3Rpb24gPT09ICdkZXNjJykge1xuICAgICAgICAgICAgbmV3VGV4dCA9IG5ld1RleHQgKyAn4oaTJztcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIG5ld1RleHQgPSBuZXdUZXh0ICsgJ+KGkSc7XG4gICAgICAgIH1cblxuICAgICAgICBjdXJyZW50T3JkZXJEaXJlY3Rpb24gPSBvcmRlckRpcmVjdGlvbjtcbiAgICAgICAgaGVhZGVyLmlubmVySFRNTCA9ICc8Yj4nICsgbmV3VGV4dCArICc8L2I+JztcbiAgICB9XG59KTsiXSwic291cmNlUm9vdCI6IiJ9