<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
    }

    function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
