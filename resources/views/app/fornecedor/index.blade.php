<h3>Fornecedor</h3>

@php

    /*if(empty($variavel)){

    } //retorna true se a variavel estiver vazia("", 0, 0.0, '0', null, false, array(), apenas declarada)*/

@endphp 

@isset($fornecedores)
    @foreach($fornecedores as $f)
        Fornecedor: {{ $f['nome']}}<br>
        Status: {{ $f['status']}}<br>
        CNPJ: {{ $f['cnpj'] ?? 'Dado não preenchido'}}<br>
        Telefone: {{ $f['ddd'] ?? ''}} {{ $f['telefone'] ?? ''}}<br>
        @switch($f['ddd'])
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
        <hr>
    @endforeach
@endisset
