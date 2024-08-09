{{-- SERÁ QUE ISSO É UM BOM MÉTODO PARA O MERCADO DE TRABALHO, AS PESSOAS RECICLAM CÓDIGO? --}}
{{-- AO INVES DE USAR A MESMA VIEW, EU RECOMENDO USAR 1 COMPONENTE DE FORM PARA AS DUAS VIEWS --}}

@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Editar Detalhes do Produto</p>
        {{-- MODIFICAÇÃO FEITA POR MIM --}}
    </div>
    <div class="menu">
        <ul>
            <li><a href="">Voltar</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{-- {{$produto_detalhe->toJson()}} --}}
        {{-- {{$produto_detalhe->toJson()}} --}}
        {{-- ACIMA É O USO DE LAZY LOANDING OU EAGER LOANDING --}}
        <h4>Produto</h4>
        {{-- O QUE ESTÁ COMENTADO É QUE EU ESTAVA USANDO ANTERIORMENTE COM O NOME PADRONIZADO --}}
        {{-- <div>Nome: {{$produto_detalhe->produto->nome}}</div>
        <br>
        <div>Descrição: {{$produto_detalhe->produto->descricao}} </div> --}}
        {{-- O nome entre as relações dos bancos tem que ser o nome do método da model, acima era anteriormente usando o produtoDetalhem, abaixo eu usei o ItemDetalhe --}}
        <div>Nome: {{$produto_detalhe->item->nome}}</div>
        <br>
        <div>Descrição: {{$produto_detalhe->item->descricao}} </div>
        {{-- RELACIONAMENTO DE 1, PARA 1, --}}
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            {{-- TRANSFORMEI EM UM COMPONENENTE E ESTOU USANDO PARA DUAS VIEWS. --}}
            @component('app.produto_detalhe._componentes.form_create_edit', ['unidades' => $unidades, 'produto_detalhe' => $produto_detalhe])
            @endcomponent
            {{-- PASSANDO OS PARAMETRO PARA OS COMPONENTE --}}
        </div>
        {{-- {{$produto_detalhe->toJson()}} --}}
    </div>
</div>
@endsection
