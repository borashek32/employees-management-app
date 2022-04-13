<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CitySearchController extends Controller
{
  public function search(Request $request)
  {
    if($request->ajax()) {
      $cities = City::where('name', 'like', "%{$request->search}%")
                ->get()
                ->load(['state', 'country']);

      if($cities) {
        return response()->json([
          'status'    => 200,
          'cities'    => $cities
        ]);

      } else {
        return response()->json([
          'status'   => 404,
          'message'  => 'Nothing found for your request'
        ]);
      }
    }
  }
}
