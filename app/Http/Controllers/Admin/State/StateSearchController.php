<?php

namespace App\Http\Controllers\Admin\State;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class StateSearchController extends Controller
{
  public function search(Request $request)
  {
    if($request->ajax()) {
      $states = Country::where('name', 'like', "%{$request->search}%")
                ->orWhere('country_id', 'like', "%{$request->search}%")
                ->get();

      if($states) {
        return response()->json([
          'status'    => 200,
          'states'    => $states
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
