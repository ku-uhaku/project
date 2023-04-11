<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($request->password == $user->password) {
            $request->session()->put('user', $user);
            return redirect()->route('main');
        } else {
            return back()->with('fail', 'Incorrect password');
        };
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect()->route('main');
    }
}
