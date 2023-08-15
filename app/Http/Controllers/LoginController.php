<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('usuario.auth.index');
    }

    public function store(Request $request)
    {
        if (Auth::guard('web')->attempt($request->except('_token'))) {
            return response()->json(["status" => "success", "mensagem" => "Login Realizado com sucesso...."]);
        };

        return response()->json(["status" => "danger", "mensagem" => "CPF ou Senha incorretos. Por favor, tente novamente"]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        redirect('/');
    }
}
