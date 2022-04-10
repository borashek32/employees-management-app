<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ValidateStateStoreForm extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'country_id' => 'required',
      'name'       => 'required|string|max:255|min:3|unique:states'
    ];
  }

  public function messages()
  {
    return [
      'country_id.required' => 'Country field is required',
      'name.required'       => 'Name field is required'
    ];
  }
}
