<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserSearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->ajax()) {
            $users = User::where('username', 'like', "%{$request->search}%")
                        ->orWhere('email', 'like', "%{$request->search}%")
                        ->get();

            if($users) {
                return response()->json([
                    'status'   => 200,
                    'users'    => $users
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
