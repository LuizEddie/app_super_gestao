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
        
        $fornecedores = Fornecedor::with('produtos')->where("nome", "like", "%".$request->input('nome')."%")
        ->where("site", "like", "%".$request->input('site')."%")
        ->where("uf", "like", "%".$request->input('uf')."%")
        ->where("email", "like", "%".$request->input('email')."%")
        ->paginate(5);

        return  view("app.fornecedor.listar", ["titulo"=> "Fornecedores", "fornecedores"=>$fornecedores, 'request'=> $request->all()]);
    }

    public function adicionar(Request $request){
        
        $msg = "";

        if($request->input("_token") != ""){
            if($request->input("id") == ""){
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
            }else if($request->input("id") != ""){
                $fornecedor = Fornecedor::find($request->input("id"));
                $update = $fornecedor->update($request->all());

                $msg = $update ? "Dados atualizados com sucesso!" :  "Os dados não foram atualizados";

                return redirect()->route('app.fornecedor.editar', ["id"=>$request->input("id"), "msg"=>$msg]);
            }
            
        }

        return  view("app.fornecedor.adicionar", ["titulo"=> "Fornecedores", "msg"=>$msg]);
    }

    public function editar($id, $msg = ""){
        $fornecedor = Fornecedor::find($id);
        
        return view("app.fornecedor.adicionar", ["titulo"=>"Fornecedores", "msg"=>$msg, 'fornecedor'=>$fornecedor]);
   }

   public function excluir($id){
        Fornecedor::find($id)->delete();
        Fornecedor::find($id)->forceDelete();
        return redirect()->route('app.fornecedor');
   }
}
