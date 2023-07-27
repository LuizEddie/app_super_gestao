@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route("produto.create")}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 60%; margin-left: auto; margin-right: auto">
                <table border="1" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th>Visualizar</th>
                            <th>Excluir</th>
                            <th>Atualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->peso }}</td>
                        <td>{{ $produto->unidade_id }}</td>
                        <td>{{ $produto->comprimento ?? ""}}</td>
                        <td>{{ $produto->altura ?? ""}}</td>
                        <td>{{ $produto->largura ?? ""}}</td>
                        <td><a href="{{route('produto.show', ['produto'=> $produto->id])}}">Visualizar</a></td>
                        <td>
                            <form id="form_{{$produto->id}}" method="post" action="{{route('produto.destroy', ['produto'=>$produto->id])}}">
                                @method("DELETE")
                                @csrf
                                {{-- <button type="submit">Excluir</button> --}}
                                <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{route('produto.edit', ['produto'=> $produto->id])}}">Atualizar</a></td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
 
                {{ $produtos->appends($request)->links()}}

                <br>
                Exibindo {{ $produtos->count()}} itens de {{ $produtos->total()}} (de {{ $produtos->firstItem()}} a {{ $produtos->lastItem()}}) 
            </div>
        </div>
    </div>
@endsection