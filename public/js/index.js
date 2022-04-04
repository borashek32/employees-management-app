$(document).ready(function () {
  // create user
  $(document).on("click", ".create-user-btn", function (e) {
    e.preventDefault();
    var data = {
      "username": $("#username").val(),
      "first_name": $("#first_name").val(),
      "last_name": $("#last_name").val(),
      "email": $("#email").val(),
      "password": $("#password").val(),
      "password_confirmation": $("#password_confirmation").val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/admin/users",
      data: data,
      dataType: "json",
      success: function success(response) {
        if (response.status == 405) {
          $('.password_confirmation').html("");
          $('.password_confirmation').append(response.message);
        } else if (response.status == 400) {
          $.each(response.messages.username, function (key, error_values) {
            $('.username').html("");
            $('.username').append(error_values);
          });
          $.each(response.messages.first_name, function (key, error_values) {
            $('.first_name').html("");
            $('.first_name').append(error_values);
          });
          $.each(response.messages.last_name, function (key, error_values) {
            $('.last_name').html("");
            $('.last_name').append(error_values);
          });
          $.each(response.messages.email, function (key, error_values) {
            $('.email').html("");
            $('.email').append(error_values);
          });
          $.each(response.messages.password, function (key, error_values) {
            $('.password').html("");
            $('.password').append(error_values);
          });
          $.each(response.messages.password_confirmation, function (key, error_values) {
            $('.password_confirmation').html("");
            $('.password_confirmation').append(error_values);
          });
        } else if (response.status == 200) {
          $("#createUserModal").addClass("d-none");
          $(".modal-backdrop").addClass("d-none");
          $("body").removeClass("modal-open");
          $("#createUserModal").find('input').val("");
          $("span").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
          $(".message_success").hide(6000);
          fetchUsers();
        } else {
          $('.message-danger').html("");
          $('.message-danger').append(response.message);
        }
      }
    });
  }); // clear inputs in create form

  $("#username").focusin(function () {
    $(".username").html("");
  });
  $("#first_name").focusin(function () {
    $(".first_name").html("");
  });
  $("#last_name").focusin(function () {
    $(".last_name").html("");
  });
  $("#email").focusin(function () {
    $(".email").html("");
  });
  $("#password").focusin(function () {
    $(".password").html("");
  });
  $("#password_confirmation").focusin(function () {
    $(".password_confirmation").html("");
  });
  $(document).on("click", ".close-create-user-form", function () {
    $('#createUserModal').find('input').val("");
    $(".text-danger").html("");
  }); // output all users

  fetchUsers();

  function fetchUsers() {
    $.ajax({
      type: "GET",
      url: "/admin/users-fetch",
      dataType: "json",
      success: function success(response) {
        $("tbody").html("");

        if (response.status == 200) {
          $.each(response.users, function (key, item) {
            $("tbody").append("<tr>            <td>" + item.id + "</td>            <td>" + item.username + "</td>            <td>" + item.email + "</td>            <td><button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-info btn-sm user-show-btn\">Show</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-primary btn-sm user-edit-btn\">Edit</button>            <button type=\"button\" id=\"" + item.id + "\" class=\"btn btn-danger btn-sm\">Delete</button></td>          </tr>");
          });
        } else {
          $('.message_error').html("");
          $('.message_error').append(response.message);
        }
      }
    });
  } // show one user


  $(document).on("click", ".user-show-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#showUserModal").modal("show");
    $.ajax({
      type: "GET",
      url: "/admin/users/" + id,
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $(".show-user-username").append(response.user.username);
          $(".show-user-first_name").append(response.user.first_name);
          $(".show-user-last_name").append(response.user.last_name);
          $(".show-user-email").append(response.user.email);
          $("#user_id").val(response.user.id);
        } else {
          $(".message_error").append(response.message);
        }
      }
    });
  });
  $(document).on("click", ".close-show-user", function () {
    $("#showUserModal").modal("hide");
  }); // edit user

  $(document).on("click", ".user-edit-btn", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#editUserModal").modal("show");
    $("#showUserModal").modal("hide");
    $.ajax({
      type: "GET",
      url: "/admin/users/edit/" + id,
      dataType: "json",
      success: function success(response) {
        if (response.status == 200) {
          $("#edit_username").val(response.user.username);
          $("#edit_first_name").val(response.user.first_name);
          $("#edit_last_name").val(response.user.last_name);
          $("#edit_email").val(response.user.email);
          $("#edit_password").val(response.user.password);
          $("#user_id").val(response.user.id);
        } else {
          $(".message_error").append(response.message);
        }
      }
    });
  });
  $(document).on("click", ".close-edit-user-form", function () {
    $("#editUserModal").modal("hide");
  }); // update user

  $(document).on("click", ".update-user-btn", function (e) {
    e.preventDefault();
    var id = $("#user_id").val();
    data = {
      "username": $("#edit_username").val(),
      "first_name": $("#edit_first_name").val(),
      "last_name": $("#edit_last_name").val(),
      "email": $("#edit_email").val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "PUT",
      url: "/admin/update/" + id,
      data: data,
      dataType: "json",
      success: function success(response) {
        if (response.status == 400) {
          $.each(response.messages.username, function (key, error_values) {
            $('.edit_username').html("");
            $('.edit_username').append(error_values);
          });
          $.each(response.messages.first_name, function (key, error_values) {
            $('.edit_first_name').html("");
            $('.edit_first_name').append(error_values);
          });
          $.each(response.messages.last_name, function (key, error_values) {
            $('.edit_last_name').html("");
            $('.edit_last_name').append(error_values);
          });
          $.each(response.messages.email, function (key, error_values) {
            $('.edit_email').html("");
            $('.edit_email').append(error_values);
          });
        } else if (response.status == 200) {
          $("#editUserModal").modal("hide");
          $("#editUserModal").find('input').val("");
          $("span").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
          $(".message_success").hide(6000);
          fetchUsers();
        } else {
          $('.message-danger').html("");
          $('.message-danger').append(response.message);
        }
      }
    }); // clear update form inputs

    $("#edit_username").focusin(function () {
      $(".edit_username").html("");
    });
    $("#edit_first_name").focusin(function () {
      $(".edit_first_name").html("");
    });
    $("#edit_last_name").focusin(function () {
      $(".edit_last_name").html("");
    });
    $("#edit_email").focusin(function () {
      $(".edit_email").html("");
    });
  });
  $(document).on("click", ".update-password-user-btn", function (e) {
    e.preventDefault();
    var id = $("#user_id").val();
    data = {
      "password": $("#edit_password").val(),
      "password_confirmation": $("#edit_password_confirmation").val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/admin/users/change-password/" + id,
      data: data,
      dataType: "json",
      success: function success(response) {
        console.log(response.messages);

        if (response.status == 400) {
          $('.edit_password_confirmation').html("");
          $('.edit_password_confirmation').append(response.message);
        } else if (response.status == 404) {
          $.each(response.messages.password, function (key, error_values) {
            $('.edit_password').html("");
            $('.edit_password').append(error_values);
          });
          $.each(response.messages.password_confirmation, function (key, error_values) {
            $('.edit_password_confirmation').html("");
            $('.edit_password_confirmation').append(error_values);
          });
        } else {
          $("#editUserModal").modal("hide");
          $("#editUserModal").find('input').val("");
          $("span").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
          $(".message_success").hide(6000);
          fetchUsers();
        }
      }
    });
    $("#edit_password").focusin(function () {
      $(".edit_password").html("");
    });
    $("#edit_password_confirmation").focusin(function () {
      $(".edit_password_confirmation").html("");
    });
  });
}); // $.ajax({
//     type: "POST",
//     url: "{{route('profile.store', ['id' => Auth::user()->id])}}",
//     data: formData, //pass to our Ajax data to send
//     success: function (data) {
//         $("#textpost").html($(data).find("#textpost").html());
//     },
