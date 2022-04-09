/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/admin/states.js ***!
  \**************************************/
$(document).ready(function () {
  // output all states
  fetchStates();

  function fetchStates() {
    $.ajax({
      type: "GET",
      url: "/admin/states-fetch",
      dataType: "json",
      success: function success(response) {
        $("#states").html("");

        if (response.status == 200) {
          i = 0;
          $.each(response.states, function (key, item) {
            i = i + 1;
            $("#states").append("<tr>            <td>" + i + "</td>            <td>" + item.country.name + "</td>            <td>" + item.name + "</td>            <td><button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-info btn-sm state-show-btn\">Show</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-primary btn-sm state-edit-btn\">Edit</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-danger btn-sm state-delete-btn\">Delete</button></td>          </tr>");
          });
        } else {
          $('.message_error').html("");
          $('.message_error').append(response.message);
        }
      }
    });
  } // open create state form and fetch countries


  fetchCountries();

  function fetchCountries() {
    $.ajax({
      type: "GET",
      url: "/admin/states-create",
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $.each(response.countries, function (key, item) {
            $(".country-select").append('<option value="' + item.id + '">' + item.name + '</option>');
          });
        } else {
          $('.message_error').html("");
          $('.message_error').append(response.message);
        }
      }
    });
  } // store state


  $(document).on("click", ".create-state-btn", function (e) {
    e.preventDefault();
    var data = {
      "name": $("#name").val(),
      "country_id": $(".country-select").val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/admin/states",
      data: data,
      dataType: "json",
      success: function success(response) {
        console.log(response.status);

        if (response.status == 400) {
          $.each(response.messages.name, function (key, error_values) {
            $('.name').html("");
            $('.name').append(error_values);
          });
          $.each(response.messages.country_id, function (key, error_values) {
            $('.country_id').html("");
            $('.country_id').append(error_values);
          });
        } else if (response.status == 404) {
          $('.name').html("");
          $('.name').append(response.message);
        } else if (response.status == 200) {
          $("#createStateModal .close").click();
          $("#createStateModal").find('input').val("");
          $(".text-danger").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
          fetchStates();
        }
      }
    });
  }); // clear errors in create form

  $("#name").focusin(function () {
    $(".name").html("");
  });
  $("#country_id").focusin(function () {
    $(".country_id").html("");
  });
  $(document).on("click", ".close-create-state-form", function () {
    $('#createStateModal').find('input').val("");
    $(".text-danger").html("");
  }); // show one country

  $(document).on("click", ".state-show-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#showStateModal").modal("show");
    $.ajax({
      type: "GET",
      url: "/admin/states/" + id,
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $(".show-state-name").append(response.state.name);
          $(".show-state-country_id").append(response.country);
          $("#state").val(response.state.id);
        } else {
          $(".message_error").append(response.message);
        }
      }
    });
  });
  $(document).on("click", ".close-show-state", function () {
    $("#showStateModal").modal("hide");
    $(".show-state-name").html("");
    $(".show-state-country_id").html("");
  });
});
/******/ })()
;