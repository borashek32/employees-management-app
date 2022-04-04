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
          {{-- @foreach($users as $user)
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <div class="d-flex flex-row">
                  <button type="button" class="btn btn-info m-2">Show</button>

                  <button type="button" class="btn btn-secondary m-2">Edit</button>

                  <button type="submit" class="btn btn-danger m-2">Delete</button>
                </div>
              </td>
            </tr>
          @endforeach --}}
        </tbody>
      </table>
    </div>
  </div>
@endsection
