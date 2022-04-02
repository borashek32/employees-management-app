$(document).ready(function () {
    fetchUsers()

    function fetchUsers() {
        $.ajax({
            type: "GET",
            url: "/admin/users-fetch",
            dataType: "json",
            success: function (response) {
                $("tbody").html("")
                if(response.status == 200) {
                    $.each(response.users, function (key, item) { 
                        $("tbody").append(`<tr>\
                        <td>`+item.id+`</td>\
                        <td>`+item.username+`</td>\
                        <td>`+item.email+`</td>\
                        <td><button type="button" value="`+item.id+`" class="btn btn-info btn-sm">Show</button>\
                        <button type="button" value="`+item.id+`" class="btn btn-primary btn-sm">Edit</button>\
                        <button type="button" value="`+item.id+`" class="btn btn-danger btn-sm">Delete</button></td>\
                    </tr>`);
                    });
                } else {
                    $('.message_error').html("");
                    $('.message_error').append(response.message);
                }
            }
        })
    }
});
