{{$slot}}
<form action={{route("site.contato")}} method="POST">
    @csrf
    <input type="text" name="nome" value="{{ old('nome')}}" placeholder="Nome" class="{{$classe}}">
    <br>
    <input type="text" name="telefone" value="{{ old('telefone')}}" placeholder="Telefone" class="{{$classe}}">
    <br>
    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="{{$classe}}">
    <br>
    <select class="{{$classe}}" name="motivo_contatos_id" >
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contato as $key => $value)
            <option value="{{$value['id']}}" {{ old("motivo_contatos_id") == $value['id'] ? "selected" : ""}}>{{$value['motivo_contato']}}</option>
        @endforeach
    </select>
    <br>
    <textarea class="{{$classe}}" name="mensagem">{{ (old("mensagem") != "") ? old("mensagem") : 'Preencha aqui a sua mensagem' }}
    </textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

<div style="position:absolute; top:0px; left:0px; width: 100%; background:red">

<pre>
    {{print_r($errors)}}
</pre>

</div>
