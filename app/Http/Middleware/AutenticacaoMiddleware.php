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
        session_start();
        //Super global session ^
        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        }else{
            return redirect()->route('site.login', ['erro' => 2]);
        }
        //Pra isso funcionar no caso temos que colocar uma coluna nova, que puxe no banco de dados o tipo de usuario,
        //Verificando se ele é padrao, vistante ou ldap.

        /*
        echo $metodo_autenticacao.'-'.$perfil.'<br>';
        if($metodo_autenticacao == 'padrao'){
            echo "Verificar o usuário e senha no banco de dados".$perfil.'<br>';
        }
        if($metodo_autenticacao == 'ldap'){
            echo "Verificar o usuario e senha do AD".$perfil.'<br>';
        }
        if($metodo_autenticacao == 'visitante'){
            echo 'Exibir apenas alguns recursos';
        }else{
            echo 'Carregar o pefil do banco de dados';
        }
        if (true){
            return $next($request);
        }else{
            return Response('Acesso negado! Rota precisa de autenticação!');
        }
        */
    }
}
