/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/admin/cities.js ***!
  \**************************************/
// fetch all cities
// window.onload = function() {
//   requestURL = 'http://127.0.0.1:8000/admin/cities-fetch'
//   fetchCities()
//   function fetchCities() {
//     const xhr = new XMLHttpRequest()
//     xhr.open('GET', requestURL)
//     xhr.onload = function() {
//       if(this.readyState == 4 && this.status == 200) {
//         let response = JSON.parse(xhr.response)
//         for(city of response.cities) {
//           const tbody = document.getElementById("cities")
//           const row = document.createElement("tr")
//           const rowNumber = document.createElement("td")
//           rowNumber.innerHTML = city.id
//           row.appendChild(rowNumber);
//           const countryName = document.createElement("td")
//           countryName.innerHTML = city.country.name
//           row.appendChild(countryName);
//           const stateName = document.createElement("td")
//           stateName.innerHTML = city.state.name
//           row.appendChild(stateName);
//           const cityName = document.createElement("td")
//           cityName.innerHTML = city.name
//           row.appendChild(cityName);
//           const cityActions = document.createElement("td")
//           cityActions.innerHTML = `<button type="button" id="`+city.id+`" class="btn btn-info btn-sm city-show-btn">Show</button>
//           <button type="button" id="`+city.id+`" class="btn btn-primary btn-sm ml-2 mr-2 city-edit-btn">Edit</button>
//           <button type="button" id="`+city.id+`" class="btn btn-danger btn-sm city-delete-btn">Delete</button>`
//           row.appendChild(cityActions);
//           tbody.appendChild(row);
//         }
//       }
//     }
//     xhr.send()
//   }
// }
$(document).ready(function () {
  // output all cities
  fetchCities();

  function fetchCities() {
    $.ajax({
      type: "GET",
      url: "/admin/cities-fetch",
      dataType: "json",
      success: function success(response) {
        $("#cities").html("");

        if (response.status == 200) {
          i = 0;
          $.each(response.cities, function (key, item) {
            i = i + 1;
            $("#cities").append("<tr>            <td>" + i + "</td>            <td>" + item.country.name + "</td>            <td>" + item.state.name + "</td>            <td>" + item.name + "</td>            <td><button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-info btn-sm city-show-btn\">Show</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-primary btn-sm city-edit-btn\">Edit</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-danger btn-sm city-delete-btn\">Delete</button></td>          </tr>");
          });
        } else {
          $('.message_error').html("");
          $('.message_error').append(response.message);
        }
      }
    });
  } // show city


  $(document).on("click", ".city-show-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#showCityModal").modal("show");
    $.ajax({
      type: "GET",
      url: "/admin/cities/" + id,
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $(".show-city-name").append(response.city.name);
          $(".show-city-state_id").append(response.city.state.name);
          $(".show-city-country_id").append(response.city.country.name);
          $("#city").val(response.city.id);
        } else {
          $(".message_error").append(response.message);
        }
      }
    });
  });
  $(document).on("click", ".close-show-city", function () {
    $("#showCityModal").modal("hide");
    $(".show-city-name").html("");
    $(".show-city-country_id").html("");
  });
  $(document).on("click", "body", function () {
    $("#showCityModal").modal("hide");
    $(".show-city-name").html("");
    $(".show-city-country_id").html("");
  });
  fetchCountriesStates();

  function fetchCountriesStates() {
    $.ajax({
      type: "GET",
      url: "/admin/cities-create",
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $.each(response.countries, function (key, item) {
            $(".country-select").append('<option value="' + item.id + '">' + item.name + '</option>');
          });
          $.each(response.states, function (key, item) {
            $(".state-select").append('<option value="' + item.id + '">' + item.name + '</option>');
          });
        } else {
          $('.message_error').html("");
          $('.message_error').append(response.message);
        }
      }
    });
  } // store city


  $(document).on("click", ".create-city-btn", function (e) {
    e.preventDefault();
    var data = {
      "name": $("#name").val(),
      "state_id": $(".state-select").val(),
      "country_id": $(".country-select").val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/admin/cities",
      data: data,
      dataType: "json",
      success: function success(response) {
        if (response.status == 422) {
          $.each(response.messages.name, function (key, error_values) {
            $('.name').html("");
            $('.name').append(error_values);
          });
          $.each(response.messages.country_id, function (key, error_values) {
            $('.country_id').html("");
            $('.country_id').append('The country field is required');
          });
          $.each(response.messages.state_id, function (key, error_values) {
            $('.state_id').html("");
            $('.state_id').append('The state field is required');
          });
        } else if (response.status == 404) {
          $('.name').html("");
          $('.name').append(response.message);
        } else if (response.status == 200) {
          $("#createCityModal .close").click();
          $("#createCityModal").find('input').val("");
          $(".text-danger").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
          fetchCities();
        }
      }
    });
  }); // clear errors in create form

  $("#name").focusin(function () {
    $(".name").html("");
  });
  $("#state_id").focusin(function () {
    $(".state_id").html("");
  });
  $("#country_id").focusin(function () {
    $(".country_id").html("");
  });
  $(document).on("click", ".close-create-city-form", function () {
    $('#createCityModal').find('input').val("");
    $(".text-danger").html("");
  }); // edit state

  $(document).on("click", ".city-edit-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#editCityModal").modal("show");
    $.ajax({
      type: "GET",
      url: "/admin/cities/edit/" + id,
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $("#edit_city_name").val(response.city.name);
          $("#city_id").val(response.city.id);
          $(".edit-country-select").append('<option selected value="' + response.city.country.id + '">' + response.city.country.name + '</option>');
          $.each(response.countries, function (key, item) {
            if (response.city.country.id !== item.id) {
              $(".edit-country-select").append('<option value="' + item.id + '">' + item.name + '</option>');
            }
          });
          $(".edit-state-select").append('<option selected value="' + response.city.state.id + '">' + response.city.state.name + '</option>');
          $.each(response.states, function (key, item) {
            if (response.city.state.id !== item.id) {
              $(".edit-state-select").append('<option value="' + item.id + '">' + item.name + '</option>');
            }
          });
        } else {
          $(".message_error").append(response.message);
        }
      }
    });
  });
  $(document).on("click", ".close-edit-city-form", function () {
    $("#editCityModal").modal("hide");
    $(".edit-city-select").html("");
  }); // update cities

  $(document).on("click", ".update-city-btn", function (e) {
    e.preventDefault();
    var id = $("#city_id").val();
    data = {
      "name": $("#edit_city_name").val(),
      "state_id": $(".edit-state-select").val(),
      "country_id": $(".edit-country-select").val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "PUT",
      url: "/admin/cities/update/" + id,
      data: data,
      dataType: "json",
      success: function success(response) {
        if (response.status == 422) {
          $.each(response.messages.name, function (key, error_values) {
            $('.edit_city_name').html("");
            $('.edit_city_name').append(error_values);
          });
          $.each(response.messages.country_id, function (key, error_values) {
            $('.edit_country_id').html("");
            $('.edit_country_id').append('The country field is required');
          });
          $.each(response.messages.state_id, function (key, error_values) {
            $('.edit_state_id').html("");
            $('.edit_state_id').append('The state field is required');
          });
        } else if (response.status == 200) {
          $("#editCityModal").modal("hide");
          $("#editCityModal").find('input').val("");
          $(".edit-country-select").html("");
          $(".edit-state-select").html("");
          $(".text-error").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
          fetchCities();
        } else {
          $('.message-danger').html("");
          $('.message-danger').append(response.message);
        }
      }
    }); // clear update form errors

    $("#edit_city_name").focusin(function () {
      $(".edit_city_name").html("");
    });
    $("#edit_country").focusin(function () {
      $(".edit_country").html("");
    });
    $("#edit_state").focusin(function () {
      $(".edit_state").html("");
    });
  }); // delete city

  $(document).on("click", ".city-delete-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: "/admin/cities/delete/" + id,
      success: function success(response) {
        if (response.status == 404) {
          $(".message_error").text("");
          $(".message_error").text(response.msg);
        } else {
          $(".message_success").text("");
          $(".message_success").append(response.msg);
          fetchCities();
        }
      }
    });
  }); // search cities

  $(document).on("keyup", "#searchCities", function (e) {
    e.preventDefault();
    var query = $("#searchCities").val();
    console.log(query);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/admin/cities/search",
      data: {
        "search": query
      },
      dataType: "json",
      success: function success(response) {
        console.log(response.cities);
        console.log(response.status);
        $("#cities").html(""); // if(response.cities == 200) {

        i = 0;
        $.each(response.cities, function (key, item) {
          console.log(response.cities);
          console.log(response.status);
          i = i + 1;
          $("#cities").append("<tr>            <td>" + i + "</td>            <td>" + item.country.name + "</td>            <td>" + item.state.name + "</td>            <td>" + item.name + "</td>            <td><button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-info btn-sm city-show-btn\">Show</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-primary btn-sm city-edit-btn\">Edit</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-danger btn-sm city-delete-btn\">Delete</button></td>          </tr>");
        }); // } else {
        //   $('.message_error').html("");
        //   $('.message_error').append(response.message);
        // }
      }
    });
  });
});
/******/ })()
;