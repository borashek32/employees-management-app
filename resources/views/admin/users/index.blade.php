@extends('layouts.admin-dashboard')

@section('content')
  @include('admin.users.show')
  @include('admin.users.edit')

  <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
      <p class="h5 mb-0 text-gray-800">Users List</p>
  </div>

  <span class="text-success message_success">
    <strong></strong>
  </span>

  <span class="text-danger message_error">
    <strong></strong>
  </span>

  <div class="card">
    <div class="card-header d-flex flex-row justify-content-between bd-highlight mb-3">
      {{-- @include('admin.users.search') --}}

      @include('admin.users.create')
    </div>

    <div class="card-body">
      <table class="table table-sm table-borderedless">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
@endsection
