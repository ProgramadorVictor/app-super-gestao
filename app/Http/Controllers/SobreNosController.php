<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
    public function __construct(){ //Verificar como funciona isso.
        $this->middleware('log.acesso'); //Pode ser usado aqui  //Mais um modo de como podemos usar a middleware.
    }
    //Construtor do controlador é a primeira coisa a ser executada, isso aqui foi um exemplo de middleware no controlador.
    //Podemos também implementar middleware no controlador, também. ex acima!
    public function sobreNos() {
        return view('site.sobre-nos');
    }
}
