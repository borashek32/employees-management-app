<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateUserStoreForm;
use App\Http\Requests\ValidateUserUpdateForm;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        if ($request->has('search')) {
            $users = User::where('username', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%")
                ->get();
        }
        return view('admin.users.index', compact('users'));
    }

    public function show()
    {
        //
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(ValidateUserStoreForm $request)
    {
        User::create([
            'username'   => $request->username,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password)
        ]);

        return redirect()
            ->route('users.index')
            ->with('message', 'User Register Succesfully');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(ValidateUserUpdateForm $request, User $user)
    {
        $user->update([
            'username'   => $request->username,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
        ]);

        return redirect()
            ->route('users.index')
            ->with('message', 'User Updated Succesfully');
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