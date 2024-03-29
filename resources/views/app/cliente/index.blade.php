@extends('app.layouts.basico')
@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route("cliente.create")}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 60%; margin-left: auto; margin-right: auto">
                <table border="1" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Visualizar</th>
                            <th>Excluir</th>
                            <th>Atualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td><a href="{{route('cliente.show', ['cliente'=> $cliente->id])}}">Visualizar</a></td>
                        <td>
                            <form id="form_{{$cliente->id}}" method="post" action="{{route('cliente.destroy', ['cliente'=>$cliente->id])}}">
                                @method("DELETE")
                                @csrf
                                {{-- <button type="submit">Excluir</button> --}}
                                <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{route('cliente.edit', ['cliente'=> $cliente->id])}}">Atualizar</a></td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
 
                {{ $clientes->appends($request)->links()}}

                <br>
                Exibindo {{ $clientes->count()}} itens de {{ $clientes->total()}} (de {{ $clientes->firstItem()}} a {{ $clientes->lastItem()}}) 
            </div>
        </div>
    </div>
@endsection