<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar()
    {
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $req)
    {

        $msg = '';
        $classe = '';
        $dados = [
            'mensagem' => $msg,
            'classe' => $classe,
        ]; //Padrão utilizado pela prefeitura na criação de sistemas.
        if ($req->input('_token') != '') {
            $regras = [
                'nome' => 'required|min:3max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                //:attribute é uma instrução que recupera o nome do campo.
                //No caso se nome, não for preenchido retornar o campo nome.
                'required' => 'O campo é :attribute é requerido',
                'nome.min' => 'O campo deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo deve ter no maximo 40 caracteres',
                'uf.min' => 'O campo deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo deve ter no maximo 2 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];
            $req->validate($regras, $feedback);
            //Fazendo o validate passando as regras e o feedback.
            $fornecedor = new Fornecedor(); //Objeto fornecedor trazendo ele.
            $fornecedor->create($req->all()); //OBS: Muito interessante essa ideia, vou usar em outros projetos.
            //$fornecedor->create($req->all()); //É interessante pois está preenchedo o fornecedor com a permissao da variavel fillable 'protected $fillable = ['nome','site','uf','email'];'
            //A variavel fillable é definida dentro da model de Fornecedor.

            $msg = 'Cadastro realizado com sucesso';

            $dados = [
                'mensagem' => $msg,
                // 'classe' => //Costume utilizado na criação de sites para a prefeitura a classe era passado como o alert do bootstrap
                // 'alert-success shows', entre outros alertas.
            ];
            // echo 'Cadastrado com sucesso';
        }
        // print_r($req->all()); //Mostrando os dados do formulario com o _token
        return view('app.fornecedor.adicionar', ['msg' => $msg]); //Temos um problema que pode causar sobrecarga de dados, ao atualiza a pagina toda hora o request é mandado
        //Aqui ocorre uma sobrecarga do banco de dados se você redirecionar para a view, ou seja. Temos um problema aqui.
    }
}
/*
$fornecedores = [
    0 => [
        'nome' => 'Fornecedor 1',
        'status' => 'N',
        'cnpj' => '0',
        'ddd' => '', //São Paulo (SP)
        'telefone' => '0000-0000'
    ],
    1 => [
        'nome' => 'Fornecedor 2',
        'status' => 'S',
        'cnpj' => null,
        'ddd' => '85', //Fortaleza (CE)
        'telefone' => '0000-0000'
    ],
    2 => [
        'nome' => 'Fornecedor 2',
        'status' => 'S',
        'cnpj' => null,
        'ddd' => '32', //Juiz de fora (MG)
        'telefone' => '0000-0000'
    ]
];

return view('app.fornecedor.index', compact('fornecedores'));
*/

