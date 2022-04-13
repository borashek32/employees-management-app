<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CityController extends Controller
{
  public function index()
  {
    return view('admin.cities.index');
  }

  public function fetch()
  {
    $cities = City::all()->load(['state', 'country']);

    if($cities) {
      return response()->json([
          'status'    => 200,
          'cities'    => $cities
      ]);

    } else {
      return response()->json([
          'status'   => 400,
          'message'  => "Something went wrong while loading data"
      ]);
    }
  }

  public function show($id)
  {
    $city = City::find($id)->load(['state', 'country']);

    if($city) {
      return response()->json([
        'status'   => 200,
        'city'     => $city
      ]);
    } else {
      return response()->json([
        'status'   => 404,
        'message'  => 'City not Found'
      ]);
    }
  }

  public function create()
  {
    $states    = State::all();
    $countries = Country::all();

    if($states && $countries) {
      return response()->json([
      'status'    => 200,
      'states'    => $states,
      'countries' => $countries
    ]);
    } else {
      return response()->json([
        'status'    => 400,
        'message'   => 'Something went wrong while loading data'
      ]);
    }
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'country_id' => 'required',
      'state_id'   => 'required',
      'name'       => 'required|string|max:255|min:3|unique:cities'
    ]);

    if($validator->fails()) {
      return response()->json([
        'status'    => 422,
        'messages'  => $validator->messages()
      ]);

    } else {
      $city = City::create([
        'name'       => $request->input('name'),
        'country_id' => $request->input('country_id'),
        'state_id'   => $request->input('state_id')
      ]);

      if($city) {
        return response()->json([
          'status'  => 200,
          'message' => 'City Saved Succesfully'
        ]);

      } else {
        return response()->json([
          'status'   => 404,
          'message'  => 'Something Went wrong'
        ]);
      }
    }
  }

  public function edit($id)
  {
    $city        = City::find($id)->load(['country', 'state']);
    $states      = State::all();
    $countries   = Country::all();

    if($city) {
      return response()->json([
        'status'    => 200,
        'city'      => $city,
        'states'    => $states,
        'countries' => $countries
      ]);
    } else {
      return response()->json([
        'status'   => 404,
        'message'  => 'City not Found'
      ]);
    }
  }

  public function update(Request $request, $id)
  {
    $city = City::find($id);
    if($city) {
      $validator = Validator::make($request->all(), [
        'country_id' => 'required',
        'state_id'   => 'required',
        'name'       => 'required|string|max:255|min:3'
      ]);

      if($validator->fails()) {
        return response()->json([
          'status'   => 422,
          'messages' => $validator->messages()
        ]);

      } else {
        $city->name        = $request->name;
        $city->state_id    = $request->state_id;
        $city->country_id  = $request->country_id;
        $city->update();

        return response()->json([
          'status'   => 200,
          'message'  => "City updated successfully"
        ]);
      }
    } else {
      return response()->json([
        'status'    => 404,
        'message'   => "City Not Found"
      ]);
    }
  }

  public function delete($id)
  {
    $city = City::find($id);
    if($city) {
      $city->delete();
      return response()->json([
        'status'   => 200,
        'msg'      => 'City Deleted Succesfully'
      ]);
    } else {
      return response()->json([
        'status'  => 404,
        'msg'     => 'City not found'
      ]);
    }
  }
}
