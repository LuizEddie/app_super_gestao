@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route("pedido.create")}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 60%; margin-left: auto; margin-right: auto">
                <table border="1" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th>Visualizar</th>
                            <th>Excluir</th>
                            <th>Atualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->cliente_id }}</td>
                        <td><a href="{{route('pedido.show', ['pedido'=> $pedido->id])}}">Visualizar</a></td>
                        <td>
                            <form id="form_{{$pedido->id}}" method="post" action="{{route('pedido.destroy', ['pedido'=>$pedido->id])}}">
                                @method("DELETE")
                                @csrf
                                {{-- <button type="submit">Excluir</button> --}}
                                <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{route('pedido.edit', ['pedido'=> $pedido->id])}}">Atualizar</a></td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
 
                {{ $pedidos->appends($request)->links()}}

                <br>
                Exibindo {{ $pedidos->count()}} itens de {{ $pedidos->total()}} (de {{ $pedidos->firstItem()}} a {{ $pedidos->lastItem()}}) 
            </div>
        </div>
    </div>
@endsection