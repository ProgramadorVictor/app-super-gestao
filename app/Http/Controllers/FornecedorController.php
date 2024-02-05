<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $req) {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$req->input('nome').'%')
        ->where('site', 'like', '%'.$req->input('site').'%')
        ->where('uf', 'like', '%'.$req->uf.'%')
        ->where('email', 'like', '%'.$req->email.'%')
        ->paginate(15); //Utilização do paginate, funciona bem para organização de listagem de registros
        //Estou mandado para a tela listar.blade.php e ai estou acessando por la
        //ATENTO: Talvezz utilizar esse código em outro projeto com CSS, para quando fazer a movimentação passa de página.
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'req' => $req->all()]);
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

    public function excluir($id) {
        Fornecedor::find($id)->delete();
        //Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
