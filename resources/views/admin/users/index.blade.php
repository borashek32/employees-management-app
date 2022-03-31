@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
        <h1 class="h3 mb-0 text-gray-800">Users List</h1>
    </div>

    @if(session()->has('message'))
      <span class="text-success">
        <strong>{{ session('message') }}</strong>
      </span>   
    @endif

    <div class="card">
        <div class="card-header">
          <a href="{{ route('users.create') }}">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#staticBackdrop">
                Create a new user
            </button>
          </a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button type="button" class="btn btn-info">Show</button>
                        <a href="{{ route('users.edit', $user->id) }}">
                          <button type="button" class="btn btn-secondary">Edit</button>
                        </a>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
