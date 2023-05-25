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

Route::get("/contato/{nome}/{categoria_id}", function(string $nome = "Sem nome", int $categoria_id = 1){
    echo "Nome: ".$nome."<br>";
    echo "Categoria: ".$categoria_id."<br>";
})->where('categoria_id', '[0-9]+')->where('nome', '[a-zA-Z]+');

// Route::get('/sobre-nos', function () {
//     return 'Sobre nós';
// });

// Route::get('/contato', function () {
//     return 'Contato';
// });

