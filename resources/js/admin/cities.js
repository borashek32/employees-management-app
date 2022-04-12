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
  // output all states
  fetchCities()

  function fetchCities() {
    $.ajax({
      type: "GET",
      url: "/admin/cities-fetch",
      dataType: "json",
      success: function (response) {
        $("#cities").html("")
        if(response.status == 200) {
          i = 0
          $.each(response.cities, function (key, item) {
            i = i+1
            $("#cities").append(`<tr>\
            <td>`+i+`</td>\
            <td>`+item.country.name+`</td>\
            <td>`+item.state.name+`</td>\
            <td>`+item.name+`</td>\
            <td><button type="button" id="`+item.id+`" class="btn btn-info btn-sm city-show-btn">Show</button>\
            <button type="button" id="`+item.id+`" class="btn btn-primary btn-sm city-edit-btn">Edit</button>\
            <button type="button" id="`+item.id+`" class="btn btn-danger btn-sm city-delete-btn">Delete</button></td>\
          </tr>`);
          });
        } else {
          $('.message_error').html("");
          $('.message_error').append(response.message);
        }
      }
    })
  }

// show city
  $(document).on("click", ".city-show-btn", function (e) {
    e.preventDefault();

    var id = $(this).attr("id");
    $("#showCityModal").modal("show");

    $.ajax({
      type: "GET",
      url: "/admin/cities/"+id,
      dataType: "json",
      success: function (response) {
        if(response.status == 200) {
          $(".show-city-name").append(response.city.name)
          $(".show-city-state_id").append(response.city.state.name)
          $(".show-city-country_id").append(response.city.country.name)
          $("#city").val(response.city.id)

        } else {
          $(".message_error").append(response.message)
        }
      }
    });
  });

  $(document).on("click", ".close-show-city", function () {
    $("#showCityModal").modal("hide")
    $(".show-city-name").html("")
    $(".show-city-country_id").html("")
  });

  $(document).on("click", "body", function () {
    $("#showCityModal").modal("hide")
    $(".show-city-name").html("")
    $(".show-city-country_id").html("")
  });
})
