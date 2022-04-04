<!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5 mb-0 text-gray-800">Edit user</p>
        <button type="button" class="close close-edit-user-form" data-dismiss="modal"
          aria-label="Close">
          &times;
        </button>
      </div>

      <input type="hidden" value="id" id="user_id">

      <div class="modal-body">
        <div class="form-group">
          <label for="formGroupExampleInput">Username</label>

          <input type="text" class="form-control username" id="edit_username"
            placeholder="Enter username">

          <span class="text-danger edit_username">
            <strong></strong>
          </span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">First Name</label>

          <input type="text" class="form-control" id="edit_first_name"
            placeholder="Enter name">

          <span class="text-danger edit_first_name">
            <strong></strong>
          </span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Last Name</label>
          <input type="text" class="form-control" id="edit_last_name"
            placeholder="Enter surname">

          <span class="text-danger edit_last_name">
            <strong></strong>
          </span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Email Address</label>

          <input type="text" class="form-control" id="edit_email"
            placeholder="Enter email address">

          <span class="text-danger edit_email">
            <strong></strong>
          </span>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-edit-user-form"
              data-dismiss="modal" aria-label="Close">
              Close
            </button>

            <div class="btn btn-primary update-user-btn" >
              Save
            </div>
          </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Password</label>

          <input type="password" class="form-control" id="edit_password"
            placeholder="Enter new password">

          <span class="text-danger edit_password">
            <strong></strong>
          </span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Confirm password</label>

          <input type="password" class="form-control" id="edit_password_confirmation"
            placeholder="Enter new password one more time">

          <span class="text-danger edit_password_confirmation">
            <strong></strong>
          </span>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-edit-user-form"
            data-dismiss="modal" aria-label="Close">
            Close
          </button>

          <div class="btn btn-primary update-password-user-btn" >
            Save
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

