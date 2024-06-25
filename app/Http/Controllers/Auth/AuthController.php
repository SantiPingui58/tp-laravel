<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function check()
    {
        dd(\Auth::check());
    }

    public function user()
    {
        dd(\Auth::user());
        // dd(\Auth::user()->email);
    }

    public function id()
    {
        dd(\Auth::id());
    }

    public function logout()
    {
        \Auth::logout();

        dd(\Auth::check());
    }

    public function login()
    {
        $user = User::find(1);

        \Auth::login($user);

        dd(\Auth::check());
    }
}
