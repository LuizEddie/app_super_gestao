<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 =>[
            'nome'=>'Fornecedor 1', 
            'status'=> 'N', 
            'cnpj' => ''],
            1 => [
                'nome'=>'Fornecedor 1', 
                'status'=> 'N', 
            ]
        ];

        // $msg =  isset($fornecedores[1]['cnpj']) ? 'CNPJ Informado' : 'CNPJ não informado';
        // echo $msg;
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
