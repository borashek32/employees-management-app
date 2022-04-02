$(document).ready(function () {
  $(document).on("click", ".user-show-btn", function (e) {
    e.preventDefault();
    
    var id = $(this).attr("id");
    $("#showUserModal").modal("show");

    $.ajax({
      type: "GET",
      url: "/admin/users/"+id,
      dataType: "json",
      success: function (response) {
        if(response.status == 200) {
          $(".show-user-username").append(response.user.username)
          $(".show-user-first_name").append(response.user.first_name)
          $(".show-user-last_name").append(response.user.last_name)
          $(".show-user-email").append(response.user.email)

          $("edit-user-btn").append(`<button type="button" id="`+response.user.id+`" class="btn btn-primary btn-sm">Edit</button>`)
        } else {
          $(".message_error").append(response.message)
        }
      }
    });
  });
  $(document).on("click", ".close-show-user", function () {
    $("#showUserModal").modal("hide");
  });
});