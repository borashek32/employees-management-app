<form method="GET" action="{{ route('countries.index') }}">
  <div class="form-row align-items-center">
    <div class="col-auto">
      <input type="search" class="form-control mb-2" id="inlineFormInput" 
          name="search" placeholder="Canada">
    </div>
    
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Search</button>
      
      <a href="{{ route('users.index') }}">
          <button type="button" class="btn btn-secondary mb-2">Refresh</button>
      </a>
    </div>
  </div>
</form>