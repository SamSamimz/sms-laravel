<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    //___index
    public function index()
    {
        return view('auth.login');
    }
    //___store 
    public function store(Request $request)
    {
        $user =  $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:4|max:12'
        ]);
        if (Auth::attempt($user)) {
            return redirect('/');
        } else {
            return back()->with('invalid', 'Invalid login information!');
        }
    }
    //__Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
