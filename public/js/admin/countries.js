/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/admin/countries.js ***!
  \*****************************************/
$(document).ready(function () {
  // output all countries
  fetchCountries();

  function fetchCountries() {
    $.ajax({
      type: "GET",
      url: "/admin/countries-fetch",
      dataType: "json",
      success: function success(response) {
        $("#countries").html("");

        if (response.status == 200) {
          i = 0;
          $.each(response.countries, function (key, item) {
            i = i + 1;
            $("#countries").append("<tr>            <td>" + i + "</td>            <td>" + item.code + "</td>            <td>" + item.name + "</td>            <td><button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-info btn-sm country-show-btn\">Show</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-primary btn-sm country-edit-btn\">Edit</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-danger btn-sm country-delete-btn\">Delete</button></td>          </tr>");
          });
        } else {
          $('.message_error').html("");
          $('.message_error').append(response.message);
        }
      }
    });
  } // create country


  $(document).on("click", ".create-country-btn", function (e) {
    e.preventDefault();
    var data = {
      "name": $("#name").val(),
      "code": $("#code").val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/admin/countries",
      data: data,
      dataType: "json",
      success: function success(response) {
        if (response.status == 400) {
          $.each(response.messages.name, function (key, error_values) {
            $('.name').html("");
            $('.name').append(error_values);
          });
          $.each(response.messages.code, function (key, error_values) {
            $('.code').html("");
            $('.code').append(error_values);
          });
        } else if (response.status == 200) {
          $("#createCountryModal .close").click();
          $("#createCountryModal").find('input').val("");
          $(".text-danger").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
          fetchCountries();
        } else {
          $('.message-danger').html("");
          $('.message-danger').append(response.message);
        }
      }
    });
  }); // clear errors in create form

  $("#name").focusin(function () {
    $(".name").html("");
  });
  $("#code").focusin(function () {
    $(".code").html("");
  });
  $(document).on("click", ".close-create-country-form", function () {
    $('#createCountryModal').find('input').val("");
    $(".text-danger").html("");
  }); // show one country

  $(document).on("click", ".country-show-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#showCountryModal").modal("show");
    $.ajax({
      type: "GET",
      url: "/admin/countries/" + id,
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $(".show-country-name").append(response.country.name);
          $(".show-country-code").append(response.country.code);
        } else {
          $(".message_error").append(response.message);
        }
      }
    });
  });
  $(document).on("click", ".close-show-country", function () {
    $("#showCountryModal").modal("hide");
    $(".show-country-name").html("");
    $(".show-country-code").html("");
  });
  $(document).on("click", "body", function () {
    $("#showCountryModal").modal("hide");
    $(".show-country-name").html("");
    $(".show-country-code").html("");
  }); // edit country

  $(document).on("click", ".country-edit-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#editCountryModal").modal("show");
    $.ajax({
      type: "GET",
      url: "/admin/countries/edit/" + id,
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $("#edit_name").val(response.country.name);
          $("#edit_code").val(response.country.code);
          $("#country_id").val(response.country.id);
        } else {
          $(".message_error").append(response.message);
        }
      }
    });
  });
  $(document).on("click", ".close-edit-country-form", function () {
    $("#editCountryModal").modal("hide");
  }); // update country

  $(document).on("click", ".update-country-btn", function (e) {
    e.preventDefault();
    var id = $("#country_id").val();
    data = {
      "name": $("#edit_name").val(),
      "code": $("#edit_code").val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "PUT",
      url: "/admin/countries/update/" + id,
      data: data,
      dataType: "json",
      success: function success(response) {
        if (response.status == 400) {
          $.each(response.messages.name, function (key, error_values) {
            $('.edit_name').html("");
            $('.edit_name').append(error_values);
          });
          $.each(response.messages.code, function (key, error_values) {
            $('.edit_code').html("");
            $('.edit_code').append(error_values);
          });
        } else if (response.status == 200) {
          $("#editCountryModal").modal("hide");
          $("#editCountryModal").find('input').val("");
          $(".text-error").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
          fetchCountries();
        } else {
          $('.message-danger').html("");
          $('.message-danger').append(response.message);
        }
      }
    }); // clear update form errors

    $("#edit_name").focusin(function () {
      $(".edit_name").html("");
    });
    $("#edit_code").focusin(function () {
      $(".edit_code").html("");
    });
  }); // delete country

  $(document).on("click", ".country-delete-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: "/admin/countries/delete/" + id,
      success: function success(response) {
        if (response.status == 400) {
          $(".message_error").text("");
          $(".message_error").text(response.msg);
        } else {
          $(".message_success").text("");
          $(".message_success").append(response.msg);
          fetchCountries();
        }
      }
    });
  }); // search countries

  $(document).on("keyup", "#searchCountries", function (e) {
    e.preventDefault();
    var query = $("#searchCountries").val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/admin/countries/search",
      data: {
        "search": query
      },
      dataType: "json",
      success: function success(response) {
        $("#countries").html("");

        if (response.status == 200) {
          i = 0;
          $.each(response.countries, function (key, item) {
            i = i + 1;
            $("#countries").append("<tr>            <td>" + i + "</td>            <td>" + item.name + "</td>            <td>" + item.code + "</td>            <td><button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-info btn-sm user-show-btn\">Show</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-primary btn-sm user-edit-btn\">Edit</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-danger btn-sm user-delete-btn\">Delete</button></td>          </tr>");
          });
        } else {
          $('.message_error').html("");
          $('.message_error').append(response.message);
        }
      }
    });
  });
});
/******/ })()
;