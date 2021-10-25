<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $all = $request->all();
        $all['password'] = md5($all['password']);
        $user = User::create($all);
        if ($user)
        {
            Auth::login($user);
            return redirect()->route('index');
        }
        else
        {
            return redirect()->back()->with('error', 'Incorrect Username or Password');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ]));
        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
