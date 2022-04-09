<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return view('admin.countries.index');
    }

    public function fetch()
    {
        $countries = Country::all();

        if($countries) {
            return response()->json([
                'status'       => 200,
                'countries'    => $countries
            ]);

        } else {
            return response()->json([
                'status'   => 400,
                'message'  => "Something went wrong while loading a data"
            ]);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:255|unique:countries',
            'name' => 'required|string|max:255|min:3|unique:countries'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'messages'  => $validator->messages()
            ]);

        } else {
            $country = Country::create([
                'name' => $request->input('name'),
                'code' => $request->input('code')
            ]);

            if($country) {
                return response()->json([
                    'status'  => 200,
                    'message' => 'Country Saved Succesfully'
                ]);

            } else {
                return response()->json([
                    'status'    => 404,
                    'error'     => 'Something Went wrong'
                ]);
            }
        }
    }

    public function show($id)
    {
        $country = Country::where('id', $id)->first();

        if($country) {
            return response()->json([
                'status'   => 200,
                'country'  => $country
            ]);
        } else {
            return response()->json([
                'status'   => 404,
                'message'  => 'Country not Found'
            ]);
        }
    }

    public function edit($id)
    {
        $country = Country::where('id', $id)->first();

        if($country) {
            return response()->json([
                'status'   => 200,
                'country'  => $country
            ]);
        } else {
            return response()->json([
                'status'   => 404,
                'message'  => 'User not Found'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        if($country) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|min:3',
                'code' => 'required|string|max:255'
            ]);

            if($validator->fails()) {
                return response()->json([
                    'status'   => 400,
                    'messages' => $validator->messages()
                ]);

            } else {
                $country->name = $request->name;
                $country->code = $request->code;
                $country->update();

                return response()->json([
                    'status'   => 200,
                    'message'  => "Country updated successfully"
                ]);
            }
        } else {
            return response()->json([
                'status'    => 404,
                'message'   => "Country Not Found"
            ]);
        }
    }

    public function delete($id)
    {
        $country = Country::find($id);
        if($country) {
            $country->delete();
                return response()->json([
                    'status'   => 200,
                    'msg'      => 'Country Deleted Succesfully'
                ]);
        } else {
            return response()->json([
                'status'  => 404,
                'msg'     => 'Country not found'
            ]);
        }
    }
}
