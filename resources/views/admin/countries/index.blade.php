@extends('layouts.admin-dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
        <p class="h5 mb-0 text-gray-800">Country List</p>
    </div>

    @if(session()->has('message'))
      <span class="text-success">
        <strong>{{ session('message') }}</strong>
      </span>   
    @endif

    <div class="card">
        <div class="card-header d-flex flex-row-reverse justify-content-between bd-highlight">
          @include('admin.countries.search')
          
          @include('admin.countries.create')
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Country</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($countries as $country)
                  <tr>
                    <th scope="row">{{ $country->id }}</th>
                    <td>{{ $country->country_code }}</td>
                    <td>{{ $country->country_name }}</td>
                    <td class="d-flex flex-row">
                        {{-- <button type="button" class="btn btn-info m-2">Show</button> --}}

                        @include('admin.countries.edit')

                        <form action="{{ route('countries.destroy', $country->id) }}" method="POST">
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
