<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function autenticar(Request $request)
    {
        $usuario = DB::table('users')
            ->where('email', $request->email)
            ->first();

        if ($usuario && Hash::check($request->senha, $usuario->password)) {
            session(['usuario' => $usuario]);
            return redirect('/painel');
        }

        return redirect('/login')->with('erro', 'Email ou senha incorretos!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}