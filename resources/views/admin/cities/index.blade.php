@extends('layouts.admin-dashboard')

@section('content')
  {{-- @include('admin.states.show')
  @include('admin.states.edit') --}}

  <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
    <p class="h5 mb-0 text-gray-800">Cities List</p>
  </div>

  <span class="text-success message_success"></span>

  <span class="text-danger message_error"></span>

  <div class="card">
    <div class="card-header d-flex flex-row-reverse justify-content-between bd-highlight">
      {{-- @include('admin.states.search')

      @include('admin.states.create') --}}
    </div>

    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">City</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody id="cities">

        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ mix('js/admin/cities.js') }}"></script>
@endsection
