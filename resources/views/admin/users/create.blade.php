<div class="form-row align-items-center">
  <div class="col-auto">
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createUserModal">
      <p class="mb-0 text-white-900">Create new user</p>
    </button>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <p class="h5 mb-0 text-gray-800">Create new user</p>
        <button type="button" class="close close-create-user-form" data-dismiss="modal" 
          aria-label="Close">
          &times;
        </button>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="formGroupExampleInput">Username</label>

          <input type="text" class="form-control username" id="username" 
            placeholder="Enter username">

          <span class="text-danger username">
            <strong></strong>
          </span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">First Name</label>

          <input type="text" class="form-control" id="first_name" 
            placeholder="Enter name">

          <span class="text-danger first_name">
            <strong></strong>
          </span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Last Name</label>
          <input type="text" class="form-control" id="last_name" 
            placeholder="Enter surname">

          <span class="text-danger last_name">
            <strong></strong>
          </span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Email Address</label>

          <input type="text" class="form-control" id="email" 
            placeholder="Enter email address">
          
          <span class="text-danger email">
            <strong></strong>
          </span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Password</label>

          <input type="password" class="form-control" id="password" 
            placeholder="Enter password">

          <span class="text-danger password">
            <strong></strong>
          </span>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Confirm password</label>

          <input type="password" class="form-control" id="password_confirmation" 
            placeholder="Enter password one more time">

          <span class="text-danger password_confirmation">
            <strong></strong>
          </span>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-create-user-form"
            data-dismiss="modal" aria-label="Close">
            Close
          </button>
          
          <div class="btn btn-primary create-user-btn" >
            Save
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

