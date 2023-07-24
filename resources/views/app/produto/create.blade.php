@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produtos - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{-- {{ $msg }} --}}
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <form method="post" action="{{ route('produto.store')}}">
                    {{-- <input type="hidden" name="id" value="{{$fornecedor->id ?? ""}}"> --}}
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="">
                    {{-- {{ $errors->has("nome") ? $errors->first() : ''}} --}}
                    <input type="text" name="descricao" class="borda-preta" placeholder="Descrição"  value="">
                    {{-- {{ $errors->has("site") ? $errors->first() : ''}} --}}
                    <input type="text" name="peso" class="borda-preta" placeholder="Peso"  value="">
                    {{-- {{ $errors->has("uf") ? $errors->first() : ''}} --}}
                    <select name="unidade_id">
                        <option>Selecione a unidade de medida</option>
                        
                        @foreach($unidades as $unidade)
                            <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                        @endforeach

                    </select>
                    {{-- {{ $errors->has("email") ? $errors->first() : ''}} --}}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection