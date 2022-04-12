<div class="form-row align-items-center">
  <div class="col-auto">
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createStateModal">
      <p class="mb-0 text-white-900">Create new state</p>
    </button>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createStateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5 mb-0 text-gray-800">Create new state</p>
        <button type="button" class="close close-create-state-form" data-dismiss="modal"
          aria-label="Close">
          &times;
        </button>
      </div>

      <form class="modal-body">
        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>

          <input type="text" class="form-control" id="name"
            placeholder="Enter Name">

          <span class="text-danger name"></span>
        </div>

        <div class="form-group">
          <select class="custom-select country-select" id="country_id">
            <option value="" selected>Select</option>
          </select>

          <span class="text-danger country_id"></span>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary close-create-state-form"
            data-dismiss="modal" aria-label="Close">
            Close
          </button>

          <div class="btn btn-primary create-state-btn">
            Save
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

