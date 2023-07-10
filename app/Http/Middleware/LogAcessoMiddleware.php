<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        LogAcesso::create(['log'=> 'IP '.$request->server->get('REMOTE_ADDR').' requisitou a rota '.$request->getRequestUri()]);
        return $next($request);
        // return Response("Chegamos no middleware");
    }
}
