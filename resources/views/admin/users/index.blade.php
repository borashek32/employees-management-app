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
        <div class="card-header d-flex flex-row-reverse justify-content-between bd-highlight mb-3">
          @include('admin.users.search')
          
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
                    <td class="d-flex flex-row">
                        <button type="button" class="btn btn-info m-2">Show</button>

                        <a href="{{ route('users.edit', $user->id) }}">
                          <button type="button" class="btn btn-secondary m-2">Edit</button>
                        </a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger m-2">Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
