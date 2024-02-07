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
        <h4>Produto</h4>
        <div>Nome: {{$produto_detalhe->produto->nome}}</div>
        <br>
        <div>Descrição: {{$produto_detalhe->produto->descricao}} </div>
        {{-- RELACIONAMENTO DE 1, PARA 1, --}}
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            {{-- TRANSFORMEI EM UM COMPONENENTE E ESTOU USANDO PARA DUAS VIEWS. --}}
            @component('app.produto_detalhe._componentes.form_create_edit', ['unidades' => $unidades, 'produto_detalhe' => $produto_detalhe])
            @endcomponent
            {{-- PASSANDO OS PARAMETRO PARA OS COMPONENTE --}}
        </div>
    </div>
</div>
@endsection
