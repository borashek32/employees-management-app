<form method="GET" action="{{ route('users.index') }}">
    <div class="form-row align-items-center">
      <div class="col-auto">
        <label class="sr-only" for="inlineFormInput">Name</label>
        <input type="search" class="form-control mb-2" id="inlineFormInput" 
            name="search" placeholder="Jane Doe">
      </div>
      
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2">Search</button>
      </div>
    </div>
  </form>