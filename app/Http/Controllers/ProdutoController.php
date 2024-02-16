<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use App\Item;
use App\Fornecedor;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Lazy Loading e Eager Loading //MOVIDO PARA A PAGINA INDEX ESTÁ ESCRITO LÁ (Eager Loading é no próprio método)
    //Carregamento lento e carregamento ansioso
    public function index(Request $req) 
    {
        // $produtos = Produto::paginate(10); //Anteriormente usando com nomes padronizados
        // $produtos = Item::paginate(10); 
        // $produtos = Item::with('itemDetalhe','rel2','rel3')->paginate(10); //Esatamos fazendo o carregamento ansioso, Eager Loading  //Cada parametro passado acima, com with, para o carregamento ansioso, representa um método. //Sendo possivel ser breaviamente carregao todos os relacionamentos.
        $produtos = Item::with('itemDetalhe','fornecedor')->paginate(10);

        //Paginate, para organizar melhor os dados de registro da página.
        //$key é o indice do foreach

        // foreach($produtos as $key => $produto){
        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
        //     // Com a utilização do first, a gente pega o primeiro produto detalhe
        //     // Sem ele a gente trazia uma collection, ou seja vários dados.
        //     if(isset($produtoDetalhe)){
        //         $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $produtoDetalhe->largura;
        //         $produtos[$key]['altura'] = $produtoDetalhe->altura;
        //     }
        // }
        
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
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
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
            'fornecedor_id' => 'exists:fornecedores,id'
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
            'fornecedor_id.exists' => 'O fornecedor informado não existe.',
        ];        
        $req->validate($regras,$feedback);
        Item::create($req->all()); //Pegando todos os parametros passados para o $req.
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto) //Edição de produto
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        // return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto) //Atualização de produto
    {
        // $request->all(); //payload = dados enviados pelo formulario
        // $produto; //Instancia do objeto do estado anterior
        // dd($request->all(), $produto->getAttributes()); //Olhando as informações do update e dos dados dentro de $produto.
        // $produto = $request->all(); //Não faça dessa forma, ele vai ter campos extras, como token e method, use o método update.
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
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
            'fornecedor_id.exists' => 'O fornecedor informado não existe.',
        ];        
        $request->validate($regras,$feedback);
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto'=> $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto) //Apagar o registro do produto
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}


