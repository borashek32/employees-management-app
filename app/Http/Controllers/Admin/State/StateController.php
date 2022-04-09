<?php

namespace App\Http\Controllers\Admin\State;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class StateController extends Controller
{
  public function index()
  {
      return view('admin.states.index');
  }

  public function create()
  {
    $countries = Country::all();

    if($countries) {
      return response()->json([
      'status'    => 200,
      'countries' => $countries
    ]);
    } else {
      return response()->json([
        'status'    => 400,
        'message'   => 'Something went wrong while loading data'
      ]);
    }
  }

  public function fetch()
  {
    $states = State::all()->load('country');

    if($states) {
      return response()->json([
          'status'    => 200,
          'states'    => $states
      ]);

    } else {
      return response()->json([
          'status'   => 400,
          'message'  => "Something went wrong while loading data"
      ]);
    }
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'country_id' => 'required',
      'name'       => 'required|string|max:255|min:3|unique:states'
    ]);

    if($validator->fails()) {
      return response()->json([
        'status'    => 400,
        'messages'  => $validator->messages()
      ]);

    } else {
      $country = State::create([
        'name'       => $request->input('name'),
        'country_id' => $request->input('country_id')
      ]);

      if($country) {
        return response()->json([
          'status'  => 200,
          'message' => 'Country Saved Succesfully'
        ]);

      } else {
        return response()->json([
          'status'   => 404,
          'message'  => 'Something Went wrong'
        ]);
      }
    }
  }

  public function show($id)
  {
    $state        = State::where('id', $id)->first();
    $country      = Country::where('id', $state->country_id)->first();
    $country_name = $country->name;

    if($state) {
      return response()->json([
        'status'   => 200,
        'state'    => $state,
        'country'  => $country_name
      ]);
    } else {
      return response()->json([
        'status'   => 404,
        'message'  => 'State not Found'
      ]);
    }
  }
}