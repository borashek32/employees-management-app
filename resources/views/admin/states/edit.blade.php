<!-- Modal -->
<div class="modal fade" id="editStateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5 mb-0 text-gray-800">Edit state</p>
        <button type="button" class="close close-edit-state-form" data-dismiss="modal"
          aria-label="Close">
          &times;
        </button>
      </div>

      <input type="hidden" value="id" id="state_id">

      <form class="modal-body">
        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>

          <input type="text" class="form-control" id="edit_state_name">

          <span class="text-danger edit_state_name"></span>
        </div>

        <div class="form-group">
          <select class="custom-select edit-country-select">

          </select>

          <span class="text-danger edit_country_id"></span>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-edit-state-form"
            data-dismiss="modal" aria-label="Close">
            Close
          </button>

          <div type="submit" class="btn btn-primary update-state-btn" >
            Save
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

