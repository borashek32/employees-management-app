@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-left flex-column mb-2 mt-2">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Create a new user</h1>
        </div>
        
        <div>
            <a href="{{ route('users.index') }}">Back</a>
        </div>
    </div>

    <form action="{{ route('users.store') }}" class="mt-4" method="POST">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Username</label>
            <input type="text" class="form-control" id="username" 
                placeholder="Enter a username" name="username" value="{{ old('username') }}">

            @error('username')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput2">First Name</label>
            <input type="text" class="form-control" id="first_name" 
                placeholder="Enter a name" name="first_name" value="{{  old('first_name') }}">

            @error('first_name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput2">Last Name</label>
            <input type="text" class="form-control" id="last_name" 
                placeholder="Enter a surname" name="last_name" value="{{  old('last_name') }}">

            @error('last_name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput2">Email Address</label>
            <input type="text" class="form-control" id="email" 
                placeholder="Enter email address" name="email" value="{{  old('email') }}">
            
            @error('email')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput2">Password</label>
            <input type="password" class="form-control" id="password" 
                placeholder="Enter a password" name="password" value={{ old('password') }}>
        </div>

        @error('password')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        <div class="modal-footer">
            <a href="{{ route('users.index') }}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
            <input type="submit" class="btn btn-primary" value="Save">
        </div>
    </form>   
@endsection
