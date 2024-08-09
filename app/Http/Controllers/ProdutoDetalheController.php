<?php

namespace App\Http\Controllers;

use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;
use App\ItemDetalhe;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $regras = [
        //     'nome' => 'required',
        // ];
        // $feedback = [
        // ];
        ProdutoDetalhe::create($request->all());
        echo "Cadastro realizado com sucesso";
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
// * @param  App\ProdutoDetalhe $produtoDetalhe
    /**
    //  * QUE É INTERTEGER ELE ESCREVEU NA AULA? NÃO SERIA INTEGER?
     * Show the form for editing the specified resource.
     * 
     *
     * @param int $id //Antes estave Interteger $id
     * @return \Illuminate\Http\Response
     // O parametro também deve ser mudado de nome para podemos usar corretamente.
     */
    // public function edit($id)
    // {
    //     dump($id);
    // }
    //Ao invés de receber um id, vamos receber um objeto do tipo ProdutoDetalhe
    //O nome do Objeto ProdutoDetalhe tem que ser igual ao da model, para trazermos o objeto.
    //A variavel e o objeto tem que ter o mesmo nome da model.
    public function edit($id)
    
    // public function edit(ProdutoDetalhe $produtoDetalhe) // dd($produtoDetalhe->produto->nome); Assim que usamos usando o Model ProdutoDetalhe
    //Anteriormente estava ProdutoDetalhe $produtoDetalhe no parametro, podemos usar dessa maneira também passando o $id do produto, porém acredito que seria melhor usando o objeto $produtoDetalhe
    //Como mudamos a model para itemDetalhe tmb trocamos a model la em cima nos parametros da function
    {
        //A diferença usando Model ProdutoDetalhe para ItemDetalhe
        //ProdutoDetalhe usamos nomes padranizados
        //ItemDetalhe usamos nomes não padraonizados, por isso usamos o $id para buscandos no na model, que busca no banco o $id com o mesmo registro no banco de dados.
        $produtoDetalhe = ItemDetalhe::with('item')->find($id); //Eager Loading
        // $produtoDetalhe = ItemDetalhe::find($id); //Lazy Loading

        $unidades = Unidade::all(); 
        // dd($produtoDetalhe->load('item')); //Aqui estamos entrando na model ItemDetalhe e vendo a conexão da função item, aqui podemos ver todo o necessário para a relação das tabelas até as relações que estão fazendo
        //Muito interessante isso estou aprendendo bem, preciso praticar.
        // dd($produtoDetalhe->item()->getRelation('produtoDetalhe')); //Aqui praticamente a mesma coisa, mostra as tabelas. Comentário abaixo
        //´Porém estou acessando ItemDetalhe, acessando a função item(), e dentro da função item estou buscando o relacionamento com o nome da outra função que esta em outra model relacionada.
        // dd($produtoDetalhe->item()); //Dentre esses comandos eu prefiro esse mostra todas as relações, atributos, esse é o melhor comando, somente acessando a função item na model.
        // dd($produtoDetalhe->item->nome); //Aqui você acessa os atributos da outra tabela relacionada.
        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produtoDetalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\ProdutoDetalhe $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        echo "Atualizado";
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
