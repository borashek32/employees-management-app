$(document).ready(function () {
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
          $("#createUserModal").find('input').val("");
          $("#createUserModal").modal("hide");
          $("span").html("");
          $(".message_success").html("");
          $(".message_success").append(response.message);
        } else {
          $('.message-danger').html("");
          $('.message-danger').append(response.message);
        }
      }
    });
  });
  $(document).on("click", ".close-create-user-form", function () {
    $('#createUserModal').find('input').val("");
    $("span").html("");
  });
});
$(document).ready(function () {
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
            $("tbody").append("<tr>                        <td>" + item.id + "</td>                        <td>" + item.username + "</td>                        <td>" + item.email + "</td>                        <td><button type=\"button\" value=\"" + item.id + "\" class=\"btn btn-info btn-sm\">Show</button>                        <button type=\"button\" value=\"" + item.id + "\" class=\"btn btn-primary btn-sm\">Edit</button>                        <button type=\"button\" value=\"" + item.id + "\" class=\"btn btn-danger btn-sm\">Delete</button></td>                    </tr>");
          });
        } else {
          $('.message_error').html("");
          $('.message_error').append(response.message);
        }
      }
    });
  }
});
