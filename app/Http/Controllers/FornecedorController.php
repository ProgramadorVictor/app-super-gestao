<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar (){
        return view('app.fornecedor.listar');
    }

    public function adicionar (Request $req){
        print_r($req->all());


        return view('app.fornecedor.adicionar');
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

