<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateCountryStoreForm;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::all();
        if ($request->has('search')) {
            $countries = Country::where('country_name', 'like', "%{$request->search}%")
                ->orWhere('country_code', 'like', "%{$request->search}%")
                ->get();
        }

        return view('admin.countries.index', compact('countries'));
    }
    
    public function store(ValidateCountryStoreForm $request)
    {
        Country::create($request->validated());

        return redirect()
            ->route('countries.index')
            ->with('message', 'Country Created Successfully');
    }

    public function update(ValidateCountryStoreForm $request, Country $country)
    {
        $country->update($request->validated());

        return redirect()
            ->route('countries.index')
            ->with('message', 'Country Updated Successfully');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()
            ->route('countries.index')
            ->with('message', 'Country Deleted Successfully');
    }
}