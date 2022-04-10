window.onload = function() {
  requestURL = 'http://127.0.0.1:8000/admin/cities-fetch'
  fetchCities()

  function fetchCities() {
    var xhr = new XMLHttpRequest()
    xhr.open('GET', requestURL)

    xhr.onload = function() {
      if(this.readyState == 4 && this.status == 200) {

        let response = JSON.parse(xhr.response)

        for(city of response.cities) {
          console.log(city.name)

          var tbody = document.getElementById("cities")
          var row = document.createElement("tr")

          var rowNumber = document.createElement("td")
          rowNumber.innerHTML = city.id
          row.appendChild(rowNumber);

          var countryName = document.createElement("td")
          countryName.innerHTML = city.country.name
          row.appendChild(countryName);

          var stateName = document.createElement("td")
          stateName.innerHTML = city.state.name
          row.appendChild(stateName);

          var cityName = document.createElement("td")
          cityName.innerHTML = city.name
          row.appendChild(cityName);

          var cityActions = document.createElement("td")
          cityActions.innerHTML = `<button type="button" id="`+city.id+`" class="btn btn-info btn-sm country-show-btn">Show</button><button type="button" id="`+city.id+`" class="btn btn-primary btn-sm ml-2 mr-2 country-edit-btn">Edit</button><button type="button" id="`+city.id+`" class="btn btn-danger btn-sm country-delete-btn">Delete</button>`
          row.appendChild(cityActions);

          tbody.appendChild(row);
        }
      }
    }
    xhr.send()
  }
}

