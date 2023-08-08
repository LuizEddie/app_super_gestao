@if(isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['clinte'=>$cliente->id])}}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store')}}">
        @csrf
@endif

        <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{$cliente->nome ?? old("nome")}}">
        {{ $errors->has("nome") ? $errors->first('nome') : ''}}

        <button type="submit" class="borda-preta">Cadastrar</button>
</form>