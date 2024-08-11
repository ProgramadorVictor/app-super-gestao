{{-- SERÁ QUE ISSO É UM BOM MÉTODO PARA O MERCADO DE TRABALHO, AS PESSOAS RECICLAM CÓDIGO? --}}
{{-- AO INVES DE USAR A MESMA VIEW, EU RECOMENDO USAR 1 COMPONENTE DE FORM PARA AS DUAS VIEWS --}}

@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Editar Pedido</p>
        {{-- MODIFICAÇÃO FEITA POR MIM --}}
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('pedido.index')}}">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            {{-- TRANSFORMEI EM UM COMPONENENTE E ESTOU USANDO PARA DUAS VIEWS. --}}
            @component('app.pedido._componentes.form_create_edit', ['pedido' => $pedido, 'clientes' => $clientes])
            @endcomponent
            {{-- PASSANDO OS PARAMETRO PARA OS COMPONENTE --}}
        </div>
    </div>
</div>
@endsection
