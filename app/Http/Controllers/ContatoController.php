<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use \App\SiteContato;
class ContatoController extends Controller
{
    public function contato(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // echo $request->input("nome");
        // echo "<br>";
        // echo $request->input("email");

        // $contato = new SiteContato();
        // $contato->nome = $request->input("nome");
        // $contato->telefone = $request->input("telefone");
        // $contato->email = $request->input("email");
        // $contato->motivo_contato = $request->input("motivo_contato");
        // $contato->mensagem = $request->input("mensagem");

        // $contato->save();

        // $contato = new SiteContato();
        // $contato->fill($request->all());

        // $contato->save();

        // $contato = new SiteContato();
        // $contato->create($request->all());

        $titulo = 'Contato';
        $motivo_contato = MotivoContato::all();
        return view('site.contato', ['titulo' => $titulo, 'motivo_contato'=>$motivo_contato]);
    }

    public function salvar(Request $request){
        $regras = [
            "nome" => 'required|min:3|max:40|unique:site_contatos',
            "email" => 'email',
            "telefone" => "required",
            "motivo_contatos_id" => "required",
            "mensagem" => "required|max:2000"
        ];

        $feedback = [
            'required' => 'Campo :attribute obrigatório',
            'nome.min' => 'Mínimo de 3 caracteres',
            'nome.max' => 'Máximo de 40 caracteres',
            'nome.unique' => 'Este nome já está sendo usado',
            'email.email' => 'Preencha com um email válido',
            'motivo_contatos_id.required'=> 'Campo motivo contato obrigatório',
            'mensagem.max' => 'Máximo de 2000 caracteres'
        ];

        $request->validate( $regras, $feedback );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
