<h3>Fornecedor</h3>

@php

    /*if(){

    } //executa se o retorno for true*/

@endphp 
Fornecedor: {{ $fornecedores[0]['nome']}} <br>
Status: {{ $fornecedores[0]['status']}} <br>

@if ((!($fornecedores[0]['status'] == 'S')))
    Fornecedor Inativo<br>
@endif

@unless($fornecedores[0]['status'] == 'S')
Fornecedor Inativo
@endunless
{{-- @unless executa se o retorno for false --}}