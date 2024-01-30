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

    public function listar(Request $req)
    {
        //Buscando os registros da consulta.
        // $fornecedores = Fornecedor::where('nome', 'like', '%'. $req->nome.'%')
        // ->where('site', 'like', '%'. $req->input('site').'%')
        // ->where('uf', 'like', '%'. $req->uf.'%')
        // ->where('email', 'like', '%'. $req->input('email').'%')
        // ->get();//Buscar uma collection no banco de dados. Com o método get();

        //Uma forma diferente de visualizar os registros com o método paginate
        //OBS: Ele traz uma limitaração de registro por pagina
        $fornecedores = Fornecedor::where('nome', 'like', '%'. $req->nome.'%')
        ->where('site', 'like', '%'.$req->input('site').'%')
        ->where('uf', 'like', '%'.$req->uf.'%')
        ->where('email', 'like', '%'.$req->input('email').'%')
        ->paginate(15);//Buscar uma collection no banco de dados e limita com paginate, podemos fazer links de paginas para avançar e voltar na view.
        //Temos um problema no qual ao buscarmos, retorna corretamente a collection com paginate, porém ao clica em algum botao do paginate a query é resetada e traz todas as informações ao invés de somente o que é solicitado

        // $fornecedores = Fornecedor::where('nome', 'like', '%'. $req->input('nome').'%')->get();//Buscar uma collection no banco de dados.
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'req' => $req->all()]);
        // return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $req)
    {

        $msg = '';
        $classe = '';
        $dados = [
            'mensagem' => $msg,
            'classe' => $classe,
        ]; //Padrão utilizado pela prefeitura na criação de sistemas.
        //AQUI É O METODO DE ADIÇÃO
        if ($req->input('_token') != '' && $req->id == '') {
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
            $fornecedor = new Fornecedor(); //Objeto fornecedor trazendo ele. //Instanciando um objeto
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
        //AQUI É O MÉTODO DE EDIÇÃO, VERIFICAMOS SE O ID É DIFERENTE DE NULO E O INPUT É DIFERENTE DE VAZIO
        if ($req->input('_token') != '' && $req->id != '') {
            $fornecedor = Fornecedor::find($req->id); //BUSCANDO PELO ID
            $update = $fornecedor->update($req->all());
            //Aqui é a saida se deu certo o registro é alterado com sucesso, se não o registro não é alterado.
            if($update){ //Se ocorre o update, faz as mensagens de acordo para a views.
                $msg = "Update realizado com sucesso";
            }else{
                $msg = "Update apresentou problemas";
            }
            return redirect()->route('app.fornecedor.editar', ['id'=> $fornecedor->id, 'msg' => $msg, ]);
        }
        // print_r($req->all()); //Mostrando os dados do formulario com o _token
        //OBS: NESSE RETORNO FOI UMA MODIFICAÇÃO FEITA POR EU, PARA PASSA A VARIAVEL FORNECEDOR PARA LA, PÓS EDIÇÃO EU QUERO QUE OS DADOS PERSITEM
        return view('app.fornecedor.adicionar', ['msg' => $msg]); //Temos um problema que pode causar sobrecarga de dados, ao atualiza a pagina toda hora o request é mandado
        //Aqui ocorre uma sobrecarga do banco de dados se você redirecionar para a view, ou seja. Temos um problema aqui.
    }
    public function editar($id, $msg = ''){ //Definindo um valor default para msg
        $fornecedor = Fornecedor::find($id); //Recuperando os dados do Fornecedor pelo $id, no qual vai ser selecionado na listagem. 
        // Aqui estamos reutilizando uma view, isso é muito importante e deveras interessante
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
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

