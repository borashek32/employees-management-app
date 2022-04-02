<!-- Button trigger modal -->
<div class="form-row align-items-center">
  <div class="col-auto">
    <button type="button" class="btn btn-secondary mb-2 btn-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Create a new country
    </button>
  
  <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" 
      data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" 
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              <div class="d-sm-flex align-items-left flex-column mb-2 mt-2">
                <div>
                  <h1 class="h3 mb-0 text-gray-800">Create a new country</h1>
                </div>
                
                <div>
                  <a href="{{ route('countries.index') }}" class="h6">Back</a>
                </div>
              </div>
            </h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" 
              aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form action="{{ route('countries.store') }}" method="POST">
              @csrf

              <div class="form-group">
                <label for="formGroupExampleInput">Country</label>
                <input type="text" class="form-control country_name" id="country_name" 
                  placeholder="Enter a name of the country" name="country_name" value="{{ old('country_name') }}">
    
                @error('country_name')
                  <span class="text-danger">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
        
              <div class="form-group">
                <label for="formGroupExampleInput2">Country code</label>
                <input type="text" class="form-control country_code" id="country_code" 
                  placeholder="Enter a name" name="country_code" value="{{  old('country_code') }}">
    
                @error('country_code')
                  <span class="text-danger">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
      
              <div class="modal-footer">
                <a href="{{ route('countries.index') }}">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                  </button>
                </a>

                <input type="submit" class="btn btn-primary" id="createCountryForm" value="Save">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
