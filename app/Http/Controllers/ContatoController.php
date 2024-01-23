<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {


        /*
        echo '<pre>';
        print_r($request->all());
        echo '<pre>';
        echo $request->input('nome'); 
        echo '<br>';
        echo $request->input('email');
        */

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        */

        /*
        $contato = new SiteContato();
        $contato->fill($request->all());
        print_r($contato->getAttributes());
        $contato->save();*/

        //var_dump($_POST);


        $motivo_contatos = MotivoContato::all(); //$motivo_contatos está recebendo todos os dados de MotivoContato


        return view('site.contato', ['titulo' => 'Contato (ISSO ESTÁ NO CONTROLADOR)', 'motivo_contatos' => $motivo_contatos]);
    }
    public function salvar(Request $request){
         //realizar a validação dos dados do formularios do request.

        $request->validate(
            $regras = [
                //Pipe disponibilizar fazemos mais de um processo/condição.
                'nome' => 'required|min:3|max:40|unique:site_contatos', //Pipe = |, minimo de caracteres = 3,   maximo de caracteres = 40
                //'nome' tem uma constraint que é 'unique'
                //Nome obrigatório 're'uired', assim faz com que o usuário digite o nome se não digitar, vamos para outra rota.
                'telefone' => 'required','numeric',
                'email' => 'email', //Validação email, verifica se o dado informado é realmente um dado de email valido.
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000' //Limite de 2000 caracteres.
            ],
            $feedback = [
                'nome.required' => 'O campo nome não foi preenchido',
                'nome.min' =>      'O campo tem que ter pelo menos 3 caracteres',
                'nome.max' =>      'O nome tem que ter menos de 40 caracteres',
                'nome.unique' =>   'Não pode ter dois nomes iguais no banco de dados',
                'telefone.numeric'  => 'O telefone tem que ser númerico',
                'email.email' => 'O campo tem que ser um e-mail',
                'mensagem.max' => 'O campo tem que ter no máximo 2000 caracteres',
                //Ao invés de escrever required para vários campos, podemos somenter usar o required
                'required' => "O campo :attribute é requerido"
            ]
        );
        $request->validate($regras, $feedback);

        SiteContato::create($request->all()); // Mesma coisa que $contato = new SiteContato(); $contato->fill($request->all());
        return redirect()->route('site.index');
    }
}
