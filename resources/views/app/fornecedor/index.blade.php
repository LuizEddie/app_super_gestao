<h3>Fornecedor</h3>

@php

    /*if(empty($variavel)){

    } //retorna true se a variavel estiver vazia("", 0, 0.0, '0', null, false, array(), apenas declarada)*/

@endphp 

@isset($fornecedores)
    @php $i = 0; @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome']}}<br>
        Status: {{ $fornecedores[$i]['status']}}<br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não preenchido'}}<br>
        Telefone: {{ $fornecedores[$i]['ddd'] ?? ''}} {{ $fornecedores[$i]['telefone'] ?? ''}}<br>
        @switch($fornecedores[$i]['ddd'])
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
        @php $i++ @endphp
    @endwhile
@endisset
