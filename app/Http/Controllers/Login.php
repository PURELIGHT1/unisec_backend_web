<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    //
    public function index()
    {
        if (Auth::user()) {
            return redirect()->intended('home');
        }


        return view('login');
    }

    public function proses(HttpRequest $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
        );

        $kreteria = $request->only('username', 'password');

        if (Auth::attempt($kreteria)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user) {
                return redirect()->intended('home');
            }

            return redirect()->intended('/')->with(['success' => 'Berhasil Login']);
        }
        return back()->withErrors([
            'username' => 'Your username is incorrect'
        ])->onlyInput('username');
    }

    public function logout(HttpRequest $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with(['success' => 'Berhasil Logout']);;
    }
}
