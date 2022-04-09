<!-- Modal -->
<div class="modal fade" id="editStateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5 mb-0 text-gray-800">Edit state</p>
        <button type="button" class="close close-edit-country-form" data-dismiss="modal"
          aria-label="Close">
          &times;
        </button>
      </div>

      <input type="hidden" value="id" id="country_id">

      <div class="modal-body">
        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>

          <input type="text" class="form-control username" id="edit_name"
            placeholder="Enter name">

          <span class="text-danger edit_name"></span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Code</label>

          <input type="text" class="form-control" id="edit_code"
            placeholder="Enter code">

          <span class="text-danger edit_code"></span>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-edit-country-form"
            data-dismiss="modal" aria-label="Close">
            Close
          </button>

          <div class="btn btn-primary update-country-btn" >
            Save
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

