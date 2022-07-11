<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index() 
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email:dns',
        //     'password' => 'required'
        // ]);
        
        $credentials = $request->validate([
            // 'email' => 'required|email:dns',
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // dd('berhasil login');

        if(Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
