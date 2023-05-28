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

Route::get("/", 'PrincipalController@principal')->name('site.index');

Route::get("/contato", "ContatoController@contato")->name('site.contato');

Route::get("/sobre-nos", "SobreNosController@sobreNos")->name('site.sobrenos');

Route::get("/login", function(){
    return 'Login';
})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get("/clientes", function(){
        return 'Clientes';
    })->name('app.clientes');
    Route::get("/fornecedores", function(){
        return 'Fornecedores';
    })->name('app.fornecedores');
    Route::get("/produtos", function(){
        return 'Produtos';
    })->name('app.produtos');
});

// Route::get("/rota1", function(){
//     echo 'Rota1';
// })->name('site.rota1');

// Route::get("/rota2", function(){
//     return redirect('/rota1');
// })->name('site.rota2');

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function(){
    echo 'Rota inexistente,
     <a href="'.route('site.index').'">Clique aqui</a> para ir para a página principal';
});
// Route::redirect('/rota2', '/rota1');

// Route::get("/contato/{nome}/{categoria_id}", function(string $nome = "Sem nome", int $categoria_id = 1){
//     echo "Nome: ".$nome."<br>";
//     echo "Categoria: ".$categoria_id."<br>";
// })->where('categoria_id', '[0-9]+')->where('nome', '[a-zA-Z]+');

// Route::get('/sobre-nos', function () {
//     return 'Sobre nós';
// });

// Route::get('/contato', function () {
//     return 'Contato';
// });

