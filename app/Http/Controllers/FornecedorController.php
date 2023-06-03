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
            'cnpj' => '0',
            'ddd' => '11',
            'telefone' => '00000-0000'
            ],
            1 => [
                'nome'=>'Fornecedor 2', 
                'status'=> 'S', 
                'cnpj' => null,
                'ddd' => '85',
                'telefone' => '00000-0000'
            ],
            2 => [
                'nome'=>'Fornecedor 3', 
                'status'=> 'S', 
                'cnpj' => null,
                'ddd' => '99',
                'telefone' => '00000-0000'
            ],
            3 => [
                'nome'=>'Fornecedor 4', 
                'status'=> 'S', 
                'cnpj' => null,
                'ddd' => '35',
                'telefone' => '00000-0000'
            ]
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
