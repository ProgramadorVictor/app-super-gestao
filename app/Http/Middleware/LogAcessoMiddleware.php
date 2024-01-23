<?php

namespace App\Http\Middleware;
use App\LogAcesso;

use Closure;

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
        //$request podemos manipular o $request se os dados forem atendidos direcionamos para o proximo passo lógico.
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR'); //É atributo por isso que usamos como parametro no get()
        $rota = $request->getRequestUri(); //Não é atributo por isso não puxamos como parametro
        LogAcesso::create(['log' => "IP: $ip requisitou a rota $rota"]); //Adicionando no banco de dados.
        //return $next($request); //Encaminhando a requisiçã para frente para o proximo middleware na lista de encadeamento.
        //No caso seria autenticacao, mas na autenticacao ela nao manda o $request para frente, ele ja da a resposta.
        $resposta = $next($request);
        $resposta->setStatusCode(203,'Casa do Caramba'); //Manipulação do $request trocando o valor de um objeto dentro da resposta.
        //dd($resposta);
        return $resposta;
        
        //response também podemos manipular antes de entregar para o browser.
    }
}
