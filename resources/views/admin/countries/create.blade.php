<div class="form-row align-items-center">
  <div class="col-auto">
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createCountryModal">
      <p class="mb-0 text-white-900">Create new country</p>
    </button>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createCountryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5 mb-0 text-gray-800">Create new country</p>
        <button type="button" class="close close-create-user-form" data-dismiss="modal"
          aria-label="Close">
          &times;
        </button>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>

          <input type="text" class="form-control username" id="name"
            placeholder="Enter name">

          <span class="text-danger name"></span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Code</label>

          <input type="text" class="form-control" id="code"
            placeholder="Enter code">

          <span class="text-danger code"></span>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-create-country-form"
            data-dismiss="modal" aria-label="Close">
            Close
          </button>

          <div class="btn btn-primary create-country-btn">
            Save
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

