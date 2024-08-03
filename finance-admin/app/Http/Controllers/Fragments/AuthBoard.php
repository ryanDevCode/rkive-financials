<?php

namespace App\Http\Controllers\Fragments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthBoard extends Controller
{
    public function login()
    {
        return view('board.auth.login');
    }

    public function register()
    {
        return view('board.auth.register');
    }

    public function reset()
    {
        return view('board.auth.reset');
    }

    public function block()
    {
        return view('board.auth.block');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been successfully logged out.');
    }
}
