<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function autenticar(Request $request)
    {
        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha,
        ];

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect('/painel');
        }

        return redirect('/login')->with('erro', 'Email ou senha incorretos!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}