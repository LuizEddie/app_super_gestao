<h3>Fornecedor</h3>

@php

    /*if(empty($variavel)){

    } //retorna true se a variavel estiver vazia("", 0, 0.0, '0', null, false, array(), apenas declarada)*/

@endphp 

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[1]['nome']}}<br>
    Status: {{ $fornecedores[1]['status']}}<br>
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Dado não preenchido'}}<br>
    Telefone: {{ $fornecedores[1]['ddd'] ?? ''}} {{ $fornecedores[1]['telefone'] ?? ''}}<br>
    @switch($fornecedores[1]['ddd'])
        @case('11')
            São Paulo - SP
            @break
        @case('35')
            Extrema - MG
            @break
        @case('85')
            Fortaleza - CE 
            @break
        @default
            Estado não identificado
    @endswitch
@endisset
