@extends('layouts.user-dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <p class="h1">Hello, {{ Auth::user()->first_name }}</p>
        </div>
    </div>
</div>
@endsection
