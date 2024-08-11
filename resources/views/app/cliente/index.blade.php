@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Clientes</p>
    </div>
    <div class="menu">
        <ul>
            {{-- <li><a href="{{route('app.fornecedor.listar')}}">Novo</a><li> --}}
            <li><a href="{{route('cliente.create')}}">Novo</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{-- {{$produtos->toJson()}} --}}
        {{-- ISSO SE CHAMA LAZY LOADING E EAGER LOADING, QUANDO VOCÊ TRAZ OS REGISTROS E VERIFICA COM TOJSON--}}
        <div style="width: 90%; margin-left: auto; margin-right:auto;">
            {{-- LISTA --}}
            <table border="1" width ="100%"> {{-- ADICIONANDO BORDAR E MODIFICANDO A LARGURA  --}}
                {{-- CRIAÇÃO DE TABELA, ISSO É IMPORTANTE. --}}
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nome}}</td>
                            <td><a href="{{route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                            {{-- PASSSANDO DOIS, PARAMETROS PARA A ROTA. --}}
                            <td>
                                {{-- ISSO AQUI É MUITO IMPORTANTE PRESTA ATENÇÃO --}}
                                {{-- O FORMULARIO COM ESSA NOMEAÇÃO PODEMOS TER VÁRIOS FORMULÁRIOS. --}}
                                <form id="form_{{$cliente->id}}" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    {{-- VER O VERBO EM php artisan route:list , o método delete pertecen a route:resource e temos que mudar se não, fica bem dificil do laravel entender --}}
                                    {{-- DIRECIONAMOS PARA A ROTA COM O VERBO DELETE --}}
                                    {{-- <button type="submit">Excluir</button> --}}
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    {{-- SE NÃO ESTIVER NADA NO <a href=""></a> dessa maneira o código vai recarregar a página precisa pelo menos ter uma hashtag  --}}
                                </form>
                            </td>
                            {{-- EM EDITAR, PASSAMOS UM PARAMETRO PARA IDENTIFICAR QUAL O FORNECEDOR ESTAMOS EDITANDO--}}
                            <td><a href="{{route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- APÓS CHAMAR UMA ÚNICA VEZ O MÉTODO É O CARREGAMENTO LENTO LAZY LOADING, ELA TRAZ AS INFORMAÇÕES DO BANCO DE DADOS RELACIONADAS, AS RELAÇÕES --}}
            {{-- {{$produtos->toJson()}}  --}}

            {{-- UTILIZAMOS O MÉTODO DE PAGINATE PARA FAZER A PAGINAÇÃO DA LISTA, AGORA TEMOS A PAGINAÇÃO E PODEMOS VER COM '$fornecedores->links()' --}}
            {{-- {{$fornecedores->links()}} --}}
            {{-- AO INVÉS DE USAR ISSO ACIMA, RESOLUÇÃO DO PROBLEMA ABAIXO, NO QUAL AO CLICA EM UM PAGINATE AS QUERYS SÃO RESETADAS --}}
            {{$clientes->appends($req)->links()}}
            {{-- NO INICIO FICA UMA TELA PESSIMA, MAS PODEMOS MODIFICAR O ESTILO NA PUBLIC --}}
            {{-- Total de registros por página - {{$fornecedores->count()}}
            <br>
            Total de registros da consulta - {{$fornecedores->total()}}
            <br>
            Número do primeiro registro da página - {{$fornecedores->firstItem()}} 
            <br>
            Número do ultimo registro da página - {{$fornecedores->lastItem()}} --}}
            <br>
            Exibindo {{$clientes->count()}} clientes de {{$clientes->total()}} (de {{$clientes->firstItem()}} a {{$clientes->lastItem()}})
        </div>
    </div>
</div>
@endsection