<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view("app.fornecedor.index", ["titulo"=> "Fornecedores"]);
    }

    public function listar(Request $request){
        
        $fornecedores = Fornecedor::where("nome", "like", "%".$request->input('nome')."%")
        ->where("site", "like", "%".$request->input('site')."%")
        ->where("uf", "like", "%".$request->input('uf')."%")
        ->where("email", "like", "%".$request->input('email')."%")
        ->get();

        return  view("app.fornecedor.listar", ["titulo"=> "Fornecedores", "fornecedores"=>$fornecedores]);
    }

    public function adicionar(Request $request){
        
        $msg = "";

        if($request->input("_token") != ""){
            $regras = [
                "nome" => "required|min:3|max:40",
                "site" => "required",
                "uf" => "required|min:2|max:2",
                "email" => "email"
            ];

            $feedback = [
                "required" => "Campo :attribute obrigatório",
                "email" => "Digite um email válido",
                "nome.min" => "O campo deve ter no minimo 3 caracteres",
                "nome.max" => "O campo deve ter no máximo 40 caracteres",
                "uf.min" => "O campo deve ter no minimo 2 caracteres",
                "uf.max" => "O campo deve ter no máximo 2 caracteres",
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());

            $msg = "Cadastro realizado com sucesso!";

        }

        return  view("app.fornecedor.adicionar", ["titulo"=> "Fornecedores", "msg"=>$msg]);
    }
}
