<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserChangePasswordController extends Controller
{
    public function changePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password'               =>  'required|min:8',
            'password_confirmation'  =>  'required|min:8|same:password'
        ]);

        if($request->password !== $request->password_confirmation) {
            return response()->json([
                'status'    => 400,
                'messages'  => 'Password confirmation field is not the same as password field'
            ]);
        } else {
            if($validator->fails()) {
                return response()->json([
                    'status'    => 404,
                    'messages'  => $validator->messages()
                ]);
            } else {
                $user = User::find($id);
                $user->update([
                    'password'   => Hash::make($request->password)
                ]);

                return response()->json([
                    'status'   => 200,
                    'message'  => 'Password successfully updated'
                ]);
            }
        }
    }
}
