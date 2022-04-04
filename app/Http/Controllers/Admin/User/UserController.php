<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateUserStoreForm;
use App\Http\Requests\Admin\ValidateUserUpdateForm;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->has('search')) {
        //     $users = User::where('username', 'like', "%{$request->search}%")
        //         ->orWhere('email', 'like', "%{$request->search}%")
        //         ->get();
        // }
        return view('admin.users.index');
    }

    public function fetch()
    {
        $users = User::all();

        if($users) {
            return response()->json([
                'status'   => 200,
                'users'    => $users
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
            'username'              => 'required|string|max:255|min:3|unique:users',
            'first_name'            => 'required|string|max:255',
            'last_name'             => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        if($request->password !== $request->password_confirmation) {
            return response()->json([
                'status'    => 405,
                'message'   => 'Password confirmation field is not the same as password field'
            ]);

        } else {
            if($validator->fails()) {
                return response()->json([
                    'status'    => 400,
                    'messages'   => $validator->messages()
                ]);

            } else {
                $user = User::create([
                    'username'   => $request->input('username'),
                    'first_name' => $request->input('first_name'),
                    'last_name'  => $request->input('last_name'),
                    'email'      => $request->input('email'),
                    'password'   => Hash::make($request->input('password'))
                ]);

                if($user) {
                    return response()->json([
                        'status'  => 200,
                        'message' => 'User Register Succesfully'
                    ]);

                } else {
                    return response()->json([
                        'status'    => 404,
                        'error'     => 'Something Went wrong'
                    ]);
                }
            }
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user) {
            $validator = Validator::make($request->all(), [
                'username'              => 'required|string|max:255|min:3',
                'first_name'            => 'required|string|max:255',
                'last_name'             => 'required|string|max:255',
                'email'                 => 'required|string|email|max:255'
            ]);

            if($validator->fails()) {
                return response()->json([
                    'status'   => 400,
                    'messages' => $validator->messages()
                ]);

            } else {
                $user->username   = $request->username;
                $user->first_name = $request->first_name;
                $user->last_name  = $request->last_name;
                $user->email      = $request->email;
                $user->update();

                return response()->json([
                    'status'   => 200,
                    'message'  => "User updated successfully"
                ]);
            }
        } else {
            return response()->json([
                'status'    => 404,
                'message'   => "User Not Found"
            ]);
        }
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();

        if($user) {
            return response()->json([
                'status'   => 200,
                'user'     => $user
            ]);
        } else {
            return response()->json([
                'status'   => 404,
                'message'  => 'User not Found'
            ]);
        }
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        if($user) {
            return response()->json([
                'status'   => 200,
                'user'     => $user
            ]);
        } else {
            return response()->json([
                'status'   => 404,
                'message'  => 'User not Found'
            ]);
        }
    }

    public function destroy(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return redirect()
                ->route('users.index')
                ->with('message', 'You are deleting yourself.');
        }
        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('message', 'User Deleted Succesfully');
    }
}
