<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{

    public function index()
    {
        return view('dashboard.auth.index');
    }

    public function store(Request $request)
    {
        if (Auth::guard('adm')->attempt($request->except('_token'))) {
            return response()->json(["status" => "success", "mensagem" => "Login Realizado com sucesso...."]);
        };

        return response()->json(["status" => "danger", "mensagem" => "CPF ou Senha incorretos. Por favor, tente novamente"]);
    }

    public function logout(Request $request)
    {
        Auth::guard('adm')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Alert::toast('Você se desconectou!','success');
        
        return redirect()->route('dashboard.index');
    }
}
