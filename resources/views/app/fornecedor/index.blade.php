<h3>Fornecedor</h3>

@php

    /*if(empty($variavel)){

    } //retorna true se a variavel estiver vazia("", 0, 0.0, '0', null, false, array(), apenas declarada)*/

@endphp 

@isset($fornecedores)
    @forelse($fornecedores as $f)
        Iteração atual: {{ $loop->iteration}}<br>
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
        <br>
        @if($loop->first) 
            Primeira iteração do loop
        @endif

        @if($loop->last)
            Ultima iteração do loop
            <br>
            Total de Registros: {{ $loop->count}}
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset
