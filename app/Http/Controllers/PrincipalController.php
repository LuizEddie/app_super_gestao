<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        $titulo = 'Home';
        $motivo_contato = MotivoContato::all();
        return view('site.principal', ["titulo" => $titulo, "motivo_contato" => $motivo_contato]);
    }
}
