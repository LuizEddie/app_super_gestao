<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        echo $metodo_autenticacao . " - " . $perfil;
        echo "<br>";

        if($metodo_autenticacao == 'padrao'){
            echo 'Verificar o usuario e senha no BD';
        }else if($metodo_autenticacao == 'ldap'){
            echo 'Verificar o usuario e senha no AD';
        }

        echo "<br>";

        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos';
        }else{
            echo 'Acesso total';
        }

        echo "<br>";

        if(true){
            return $next($request);
        }else{
            return Response('Acesso negado! Esta rota exige autenticação!');
        }
    }
}
