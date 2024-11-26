<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $credential = $request->only(['email', 'password']);
        if (Auth::attempt($credential)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors(['email' => 'Invalid email or password!'])->withInput();
        }
    }
}