/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/admin/cities.js ***!
  \**************************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

window.onload = function () {
  requestURL = 'http://127.0.0.1:8000/admin/cities-fetch';
  fetchCities();

  function fetchCities() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', requestURL);

    xhr.onload = function () {
      if (this.readyState == 4 && this.status == 200) {
        var response = JSON.parse(xhr.response);

        var _iterator = _createForOfIteratorHelper(response.cities),
            _step;

        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            city = _step.value;
            console.log(city.name);
            var tbody = document.getElementById("cities");
            var row = document.createElement("tr");
            var rowNumber = document.createElement("td");
            rowNumber.innerHTML = city.id;
            row.appendChild(rowNumber);
            var countryName = document.createElement("td");
            countryName.innerHTML = city.country.name;
            row.appendChild(countryName);
            var stateName = document.createElement("td");
            stateName.innerHTML = city.state.name;
            row.appendChild(stateName);
            var cityName = document.createElement("td");
            cityName.innerHTML = city.name;
            row.appendChild(cityName);
            var cityActions = document.createElement("td");
            cityActions.innerHTML = "<button type=\"button\" id=\"" + city.id + "\" class=\"btn btn-info btn-sm country-show-btn\">Show</button><button type=\"button\" id=\"" + city.id + "\" class=\"btn btn-primary btn-sm ml-2 mr-2 country-edit-btn\">Edit</button><button type=\"button\" id=\"" + city.id + "\" class=\"btn btn-danger btn-sm country-delete-btn\">Delete</button>";
            row.appendChild(cityActions);
            tbody.appendChild(row);
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
      }
    };

    xhr.send();
  }
};
/******/ })()
;