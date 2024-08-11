<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pedido;
use App\Item;
use App\PedidoProduto;

class PedidoProdutoController extends Controller
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
     * @param \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Item::all();
        $pedido->produtos; //Implementando o eager loading, com o objeto instanciado.
        return view('app.pedido-produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];
        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'quantidade.required' => 'A quantidade precisa ser informada'
        ];
        $request->validate($regras, $feedback);
        // $pedidoProduto = new PedidoProduto();
        // $pedidoProduto->pedido_id = $pedido->id;
        // $pedidoProduto->produto_id = $request->input('produto_id');
        // $pedidoProduto->quantidade = $request->input('quantidade');
        // $pedidoProduto->save(); // Salvando os dados diretamente no banco


        // $pedido->produtos()->attach( //Salvando os dados via relacionamento entre os bancos
        //     $request->input('produto_id'), //produtos() como método mapeia o relacionamento ->produtos dessa forma traz os registros relacionados é diferente
        //     ['quantidade' => $request->input('quantidade')]
        // ); //guardando os dados em outra tabela pelo relacionamento via model

        // $pedido->produtos()->attach(
        //     [ //Podemos salvar vários registros relacionados dessa forma
        //     $request->input('produto_id') => ['quantidade' => $request->input('quantidade')],
        //     $request->input('produto_id') => ['quantidade' => $request->input('quantidade')],
        //     ]
        // );
        $pedido->produtos()->attach(
            [ //Podemos salvar vários registros relacionados dessa forma
            $request->input('produto_id') => ['quantidade' => $request->input('quantidade')],
            ]
        );


        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
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
     * @param  \App\Pedido  $pedido
     * @param  \App\PedidoProduto $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto)
    {
        // dd($pedido->getAttributes(), $produto->getAttributes());
        // PedidoProduto::where(['pedido_id' => $pedido->id, 'produto_id' => $produto->id])->delete(); //Método convencional
        //Uso de array =>, se não for array ,
        // $pedido->produtos()->detach($produto->id); //Apagando
        // dd($pedidoProduto);
        $pedidoProduto->delete();
        // dd($);
        return redirect()->route('pedido-produto.create', ['pedido' => $pedidoProduto->pedido_id]);
    }
}
