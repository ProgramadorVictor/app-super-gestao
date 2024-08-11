{{-- <a href="file:///D:/Usuários/victor.andrade/Desktop/Victor/app_super_gestao/resources/views/app/fornecedor/adicionar.blade.php">AQUI UTILIZAMOS D:\Usuários\victor.andrade\Desktop\Victor\app_super_gestao\resources\views\app\fornecedor\adicionar.blade.php</a> --}}
{{-- ACIMA A GENTE FEZ O CÓDIGO USANDO A MESMA VIEW, NAO CRIAMOS UM COMPONENTE IGUAL ABAIXO E USAMOS EM DUAS VIEWS. --}}
@extends('app.layouts.basico')

@section('titulo', 'Pedido Pedido')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao Pedido</p>
        {{-- MODIFICAÇÃO FEITA POR MIM --}}
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('pedido.index')}}">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <h4>Detalhes do pedido</h4>
        <p>ID do pedido {{$pedido->id}}</p>
        <p>Cliente: {{$pedido->cliente->nome}}</p>
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            <h4>Itens do pedido</h4>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do produto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedido->produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @component('app.pedido-produto._componentes.form_create',['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div>
</div>
@endsection
