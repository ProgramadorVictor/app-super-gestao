<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        //$erro = $request->get('erro'); //Só aparece quando o tentamos logar pela prima vez e dar erro, com senha inválida
        $erros = '';
        //dd($request);

        if($request->get('erro') == 1){
            $erros = "Usuário e ou senha não existe!";
        }
        if($request->get('erro') == 2){
            $erros = "Necessário realizar login para ter acesso interno a página!";
        }
        //Esta recuperando os atributos do erro, que vai ser dado pelo $request
        /*
        Isso começou em autenticar, foi enviado para a rota e foi recuperado nesse controlador.
        */ 

        return view('site.login', ['titulo' => 'Login', 'erro' => $erros]); //Enviando a váriavel $erro como parametro para site.login como a váriavel erro
    }
    public function autenticar(Request $request){
        //Validação e feedback.
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        $feedback = [
            'usuario.email' => 'E-mail é requerido',
            'senha.required' => 'Senha não digitada!'
        ];
        $request->validate($regras, $feedback);
        
        //recuperamos os parametros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //Mostrar o email e a senha
        // echo "Usuário:$email | Senha:$password <br>";

        //Inicial o Model User
        $user = new User(); //Registro de usuário.
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first(); //email tem que ser igual o email no banco de dados e a senha também
        //Ele busca no banco de dados email e password digitados no site, se forem iguais ele traz os atributos do método get, se não ele não traz nada.

        if(isset($usuario->name)){//Se $usuario tem objeto name,

            //VERIFICA SE AS SESSÕES ESTÃO CORRETAS, SE SIM PROSSEGUE ATÉ AUTENTICACAÇÃOMIDDLEWARE
            session_start(); //SUPER GLOBAL SESSION
            $_SESSION['nome'] =  $usuario->name;
            $_SESSION['email'] =  $usuario->email;
            //SÓ FICAM DISPONIVEL DO LADO DO SERVIDOR

            return redirect()->route('app.home');
            //echo "Usuario existe"; 
        } else{
            return redirect()->route('site.login',['erro' => 1]); //Enviando parametro para o redirect, para a rota site.login
            //O parametro enviado acima está definindo que dentro do $request o nome do parametro é erro.
            //echo "Usuário não existe";
        }

        echo "<pre>";
        print_r($usuario);
        echo "</pre>";
    }
    public function sair() {
        session_destroy(); //Destruindo a sessão em outra palaravas, fazendo o logout
        return redirect()->route('site.index'); //Redirecionando para a rota do site principal.
    }
}
