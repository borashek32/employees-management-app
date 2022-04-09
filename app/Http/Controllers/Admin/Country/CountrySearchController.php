<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountrySearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->ajax()) {
            $countries = Country::where('name', 'like', "%{$request->search}%")
                        ->orWhere('code', 'like', "%{$request->search}%")
                        ->get();

            if($countries) {
                return response()->json([
                    'status'       => 200,
                    'countries'    => $countries
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
