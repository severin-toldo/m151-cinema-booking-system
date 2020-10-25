(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["movie_booking_component_logged_in"],{

/***/ "./assets/js/component/movie_entry/booking/movie_booking_logged_in.component.js":
/*!**************************************************************************************!*\
  !*** ./assets/js/component/movie_entry/booking/movie_booking_logged_in.component.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function setSelectedSeats() {
  var movieListEntries = document.getElementsByClassName('seat-btn');
  var selectedSeatIds = [];

  for (var i = 0; i < movieListEntries.length; i++) {
    var e = movieListEntries.item(i);

    if (e.checked && !e.disabled) {
      selectedSeatIds.push(e.dataset.seatId);
    }
  } // save selected seats into cookies. Will be retrieved later by controller and validated again


  document.cookie = "selectedSeats=" + JSON.stringify(selectedSeatIds) + "; path=/";
}

document.addEventListener('DOMContentLoaded', function () {
  var btns = document.getElementsByClassName('book-btn');

  for (var i = 0; i < btns.length; i++) {
    var btn = btns.item(i);
    btn.addEventListener('click', function () {
      return setSelectedSeats();
    });
  }
});

/***/ })

},[["./assets/js/component/movie_entry/booking/movie_booking_logged_in.component.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvY29tcG9uZW50L21vdmllX2VudHJ5L2Jvb2tpbmcvbW92aWVfYm9va2luZ19sb2dnZWRfaW4uY29tcG9uZW50LmpzIl0sIm5hbWVzIjpbInNldFNlbGVjdGVkU2VhdHMiLCJtb3ZpZUxpc3RFbnRyaWVzIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50c0J5Q2xhc3NOYW1lIiwic2VsZWN0ZWRTZWF0SWRzIiwiaSIsImxlbmd0aCIsImUiLCJpdGVtIiwiY2hlY2tlZCIsImRpc2FibGVkIiwicHVzaCIsImRhdGFzZXQiLCJzZWF0SWQiLCJjb29raWUiLCJKU09OIiwic3RyaW5naWZ5IiwiYWRkRXZlbnRMaXN0ZW5lciIsImJ0bnMiLCJidG4iXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBLFNBQVNBLGdCQUFULEdBQTRCO0FBQ3hCLE1BQU1DLGdCQUFnQixHQUFHQyxRQUFRLENBQUNDLHNCQUFULENBQWdDLFVBQWhDLENBQXpCO0FBQ0EsTUFBTUMsZUFBZSxHQUFHLEVBQXhCOztBQUVBLE9BQUssSUFBSUMsQ0FBQyxHQUFHLENBQWIsRUFBZ0JBLENBQUMsR0FBR0osZ0JBQWdCLENBQUNLLE1BQXJDLEVBQTZDRCxDQUFDLEVBQTlDLEVBQWtEO0FBQzlDLFFBQU1FLENBQUMsR0FBR04sZ0JBQWdCLENBQUNPLElBQWpCLENBQXNCSCxDQUF0QixDQUFWOztBQUVBLFFBQUlFLENBQUMsQ0FBQ0UsT0FBRixJQUFhLENBQUNGLENBQUMsQ0FBQ0csUUFBcEIsRUFBOEI7QUFDMUJOLHFCQUFlLENBQUNPLElBQWhCLENBQXFCSixDQUFDLENBQUNLLE9BQUYsQ0FBVUMsTUFBL0I7QUFDSDtBQUNKLEdBVnVCLENBWXhCOzs7QUFDQVgsVUFBUSxDQUFDWSxNQUFULEdBQWtCLG1CQUFtQkMsSUFBSSxDQUFDQyxTQUFMLENBQWVaLGVBQWYsQ0FBbkIsR0FBcUQsVUFBdkU7QUFDSDs7QUFFREYsUUFBUSxDQUFDZSxnQkFBVCxDQUEwQixrQkFBMUIsRUFBOEMsWUFBTTtBQUNoRCxNQUFNQyxJQUFJLEdBQUdoQixRQUFRLENBQUNDLHNCQUFULENBQWdDLFVBQWhDLENBQWI7O0FBRUEsT0FBSyxJQUFJRSxDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHYSxJQUFJLENBQUNaLE1BQXpCLEVBQWlDRCxDQUFDLEVBQWxDLEVBQXNDO0FBQ2xDLFFBQU1jLEdBQUcsR0FBR0QsSUFBSSxDQUFDVixJQUFMLENBQVVILENBQVYsQ0FBWjtBQUNBYyxPQUFHLENBQUNGLGdCQUFKLENBQXFCLE9BQXJCLEVBQThCO0FBQUEsYUFBTWpCLGdCQUFnQixFQUF0QjtBQUFBLEtBQTlCO0FBQ0g7QUFDSixDQVBELEUiLCJmaWxlIjoibW92aWVfYm9va2luZ19jb21wb25lbnRfbG9nZ2VkX2luLmpzIiwic291cmNlc0NvbnRlbnQiOlsiZnVuY3Rpb24gc2V0U2VsZWN0ZWRTZWF0cygpIHtcbiAgICBjb25zdCBtb3ZpZUxpc3RFbnRyaWVzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgnc2VhdC1idG4nKTtcbiAgICBjb25zdCBzZWxlY3RlZFNlYXRJZHMgPSBbXTtcblxuICAgIGZvciAobGV0IGkgPSAwOyBpIDwgbW92aWVMaXN0RW50cmllcy5sZW5ndGg7IGkrKykge1xuICAgICAgICBjb25zdCBlID0gbW92aWVMaXN0RW50cmllcy5pdGVtKGkpO1xuXG4gICAgICAgIGlmIChlLmNoZWNrZWQgJiYgIWUuZGlzYWJsZWQpIHtcbiAgICAgICAgICAgIHNlbGVjdGVkU2VhdElkcy5wdXNoKGUuZGF0YXNldC5zZWF0SWQpO1xuICAgICAgICB9XG4gICAgfVxuXG4gICAgLy8gc2F2ZSBzZWxlY3RlZCBzZWF0cyBpbnRvIGNvb2tpZXMuIFdpbGwgYmUgcmV0cmlldmVkIGxhdGVyIGJ5IGNvbnRyb2xsZXIgYW5kIHZhbGlkYXRlZCBhZ2FpblxuICAgIGRvY3VtZW50LmNvb2tpZSA9IFwic2VsZWN0ZWRTZWF0cz1cIiArIEpTT04uc3RyaW5naWZ5KHNlbGVjdGVkU2VhdElkcykgKyBcIjsgcGF0aD0vXCI7XG59XG5cbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XG4gICAgY29uc3QgYnRucyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ2Jvb2stYnRuJyk7XG5cbiAgICBmb3IgKGxldCBpID0gMDsgaSA8IGJ0bnMubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgY29uc3QgYnRuID0gYnRucy5pdGVtKGkpO1xuICAgICAgICBidG4uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiBzZXRTZWxlY3RlZFNlYXRzKCkpO1xuICAgIH1cbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==