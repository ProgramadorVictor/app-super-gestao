<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;
use App\Unidade;

class ProdutoController extends Controller
{  
    //Isso é muito interessante criado com php artisan make:controller --resource ProdutoController    
    //Alguns métodos interessantes para usar index(), create(), store(), show(), edit(), update(), destroy().
    //index() - Exibe a lista de registros
    //create() - Exibir formulários de criação do registros
    //store() - Receber formulário de criação de registro
    //show() - Exibir registro especifico
    //edit() - Exibir formulários de edição de registro
    //update() - Receber formulário de edição de registro
    //destroy() - Receber dados para remoção de registro
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req) 
    {
        $produtos = Produto::paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'req' => $req->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Função para criar
    {
        $unidades = Unidade::all(); //Chamando as unidades
        //RECUPERANDO TODAS AS UNIDADES.
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req) //Store post, para conclusão da criação do método create
    {
        //Uma outra forma de fazer isso.
        // $produto = new Produto();
        // $nome = $req->input('nome');
        // $descricao = $req->input('descricao');
        // $nome = strtoupper($nome);
        // $produto->nome = $nome;
        // $produto->descricao = $descricao;
        // $produto->save(); 


        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            //Situação nova, a unidade_id tem que vim de outra tabela, no caso a tabela unidades e a coluna
            //Novo método exits:<tabeka>,<coluna>. Dessa forma: 'unidade_id' => 'exits:unidades,id',
        ];
        $feedback = [
            'required' => "O campo :attribute deve ser preenchido.",
            'nome.min' => "O campo nome deve ter no minimo 3 caracteres.",
            'nome.max' => "O campo nome deve ter no maximo 40 caracteres.",
            'descricao.min' => "O campo descrição deve ter no minimo 3 caracteres.",
            'descricao.max' => "O campo descrição deve ter no máximo 200 caracteres.",
            'peso.integer' => "O campo peso deve ser um número inteiro.",
            'unidade_id.exists' => "A unidade de medida informada não existe.",
        ];        
        $req->validate($regras,$feedback);
        Produto::create($req->all()); //Pegando todos os parametros passados para o $req.
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
