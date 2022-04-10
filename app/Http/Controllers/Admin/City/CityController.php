<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

  public function create()
  {
    $cities = City::all();

    if($cities) {
      return response()->json([
      'status' => 200,
      'cities' => $cities
    ]);
    } else {
      return response()->json([
        'status'    => 400,
        'message'   => 'Something went wrong while loading data'
      ]);
    }
  }
}
