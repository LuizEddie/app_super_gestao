<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
    Verbos http
    get, post, put, delete, patch
*/

// Route::get('/', function () {
//     return 'Olá, seja bem-vindo ao curso';
// });

Route::get("/", 'PrincipalController@principal');

Route::get("/contato", "ContatoController@contato");

Route::get("/sobre-nos", "SobreNosController@sobreNos");

Route::get("/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}", function(string $nome = "Sem nome", string $categoria = "Sem categoria", string $assunto = "Sem assunto", string $mensagem = "Sem mensagem"){
    echo "Nome: ".$nome."<br>";
    echo "Categoria: ".$categoria."<br>";
    echo "Assunto: ".$assunto."<br>";
    echo "Mensagem: ".$mensagem."<br>";

});
// Route::get('/sobre-nos', function () {
//     return 'Sobre nós';
// });

// Route::get('/contato', function () {
//     return 'Contato';
// });

