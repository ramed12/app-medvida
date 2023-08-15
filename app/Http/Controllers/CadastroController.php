<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CadastroRequest;
use Nette\Utils\Random;

class CadastroController extends Controller
{
    public function index(){
        return view('usuario.cadastro.index');
    }

    public function form(){
        return view('usuario.cadastro.formulario');
    }

    public function store(CadastroRequest $request){
        try {

            $request->merge([
                "status" => 0
            ]);

            if(User::create($request->except(['_token']))){
                session()->flash('alert', ["text" => "Cadastro realizado com suceso", "tipo" => "success"]);
            } else {
                session()->flash('alert', ["text" => "Não foi possível realizar o cadastro!", "tipo" => "error"]);
            }

        }catch(Exception $e){
            session()->flash('alert', ["text" => $e->getMessage(), "tipo" => "error"]);
        }

        return redirect()->route('login');
    }

    public function senha(){
        return view('usuario.auth.senha');
    }

    public function senhaStore(Request $request){
        $findUser = User::where('cpf', $request->input('cpf'))->get()->first();
        if(empty($findUser)){
            return response()->json(["tipo" => "danger", "mensagem" => "CPF digitado não foi encontrado"]);
        }

        try{
            $findUser->recoverySenha = \Str::random(150);
            $findUser->save();
            Mail::send(new \App\Mail\recuperarSenhaUsuario($findUser));
                return response()->json(["tipo" => "success", "mensagem" => "Enviamos um e-mail com as informações para alterar sua senha"]);
        }catch(Exception $e){
            return response()->json(["tipo" => "success", "mensagem" => $e->getMessage()]);
        }
    }

    public function senhaStoreVerify($value){
        $findUser = User::where('recoverySenha', $value)->get()->first();

        if(empty($findUser)){
           return redirect()->route('login');
        }
        try{

            $senhaUsuario = \Str::random(8);
            $findUser->password = $senhaUsuario;
            $findUser->save();
            Mail::send(new \App\Mail\confirmaSenhaUsuario($findUser, $senhaUsuario));
            $findUser->recoverySenha = null;
            $findUser->save();
            session()->flash('alert', ["text" => "Senha atualizada com sucesso. Verifique sua nova senha no seu e-mail", "tipo" => "success"]);
        }catch(Exception $e){
            session()->flash('alert', ["text" => $e->getMessage(), "tipo" => "error"]);
        }

        return redirect()->route('login');
    }
}
