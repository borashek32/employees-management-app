<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        if($user->role_id == 1) {
            return view('admin.home');
        } else {
            return view('user.home');
        }
    }
}
