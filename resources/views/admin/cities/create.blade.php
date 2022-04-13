<div class="form-row align-items-center">
  <div class="col-auto">
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createCityModal">
      <p class="mb-0 text-white-900">Create new city</p>
    </button>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createCityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5 mb-0 text-gray-800">Create new city</p>
        <button type="button" class="close close-create-city-form" data-dismiss="modal"
          aria-label="Close">
          &times;
        </button>
      </div>

      <form class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="name"
            placeholder="Enter Name">

          <span class="text-danger name"></span>
        </div>

        <div class="form-group">
          <select class="custom-select country-select" name="country_id" id="country_id">
            <option value="" selected>Select country</option>
          </select>

          <span class="text-danger country_id"></span>
        </div>

        <div class="form-group">
          <select class="custom-select state-select" id="state_id">
            <option value="" selected>Select state</option>
          </select>

          <span class="text-danger state_id"></span>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary close-create-city-form"
            data-dismiss="modal" aria-label="Close">
            Close
          </button>

          <div class="btn btn-primary create-city-btn" type="submit">
            Save
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

