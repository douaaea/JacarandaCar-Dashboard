<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('login.show');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email ,'password' => $password];
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $login = Profile::where('email', $email)->first();
            $request->session()->put('login', $login);
            return redirect()->route('dashboard.acceuil');
        } else {
            return back()->withErrors([
             'email' => 'Email ou mot de passe incorrect.'
            ])->onlyInput('email');
        }

    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login.show');
    }
}
