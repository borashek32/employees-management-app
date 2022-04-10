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
        if (response.status == 422) {
          $.each(response.messages.name, function (key, error_values) {
            $('.name').html("");
            $('.name').append(error_values);
          });
          $.each(response.messages.country_id, function (key, error_values) {
            $('.country_id').html("");
            $('.country_id').append('The country field is required');
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
  }); // show one state

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
  $(document).on("click", "body", function () {
    $("#showStateModal").modal("hide");
    $(".show-state-name").html("");
    $(".show-state-country_id").html("");
  }); // edit state

  $(document).on("click", ".state-edit-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#editStateModal").modal("show");
    $.ajax({
      type: "GET",
      url: "/admin/states/edit/" + id,
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $("#edit_state_name").val(response.state.name);
          $("#state_id").val(response.state.id); // fetchCountries()

          $.each(response.countries, function (key, item) {
            $(".edit-country-select").append('<option value="' + item.id + '">' + item.name + '</option>');
          });
        } else {
          $(".message_error").append(response.message);
        }
      }
    });
  });
  $(document).on("click", ".close-edit-state-form", function () {
    $("#editStateModal").modal("hide");
    $(".edit-country-select").html("");
  }); // update country

  $(document).on("click", ".update-state-btn", function (e) {
    e.preventDefault();
    var id = $("#state_id").val();
    data = {
      "name": $("#edit_state_name").val(),
      "country_id": $(".edit-country-select").val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "PUT",
      url: "/admin/states/update/" + id,
      data: data,
      dataType: "json",
      success: function success(response) {
        if (response.status == 422) {
          $.each(response.messages.name, function (key, error_values) {
            $('.edit_state_name').html("");
            $('.edit_state_name').append(error_values);
          });
          $.each(response.messages.country_id, function (key, error_values) {
            $('.edit_country_id').html("");
            $('.edit_country_id').append('The country field is required');
          });
        } else if (response.status == 200) {
          $("#editStateModal").modal("hide");
          $("#editStateModal").find('input').val("");
          $(".edit-country-select").html("");
          $(".text-error").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
          fetchStates();
        } else {
          $('.message-danger').html("");
          $('.message-danger').append(response.message);
        }
      }
    }); // clear update form errors

    $("#edit_state_name").focusin(function () {
      $(".edit_state_name").html("");
    });
    $("#edit_country").focusin(function () {
      $(".edit_country").html("");
    });
  }); // delete state

  $(document).on("click", ".state-delete-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: "/admin/states/delete/" + id,
      success: function success(response) {
        if (response.status == 400) {
          $(".message_error").text("");
          $(".message_error").text(response.msg);
        } else {
          $(".message_success").text("");
          $(".message_success").append(response.msg);
          fetchStates();
        }
      }
    });
  });
});
/******/ })()
;