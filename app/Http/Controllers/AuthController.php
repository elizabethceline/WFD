<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login', ['title' => 'Login']);
    }

    public function login_auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);


        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/courses');
        }

        return back()->with(['error' => 'Email dan password tidak match.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
