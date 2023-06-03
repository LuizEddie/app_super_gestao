<h3>Fornecedor</h3>

@php

    /*if(empty($variavel)){

    } //retorna true se a variavel estiver vazia("", 0, 0.0, '0', null, false, array(), apenas declarada)*/

@endphp 

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[1]['nome']}}<br>
    Status: {{ $fornecedores[1]['status']}}<br>
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Dado não preenchido'}}<br>
    <!-- $variavel testada não estiver definida(isset) ou $variavel testada possuir o valor null -->
@endisset
