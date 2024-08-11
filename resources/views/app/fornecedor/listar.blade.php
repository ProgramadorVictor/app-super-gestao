@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor - Listar</p>
    </div>
    <div class="menu">
        <ul>
            {{-- <li><a href="{{route('app.fornecedor.listar')}}">Novo</a><li> --}}
            <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a><li>
            <li><a href="{{route('app.fornecedor')}}">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right:auto;">
            {{-- LISTA --}}
            <table border="1" width ="100%"> {{-- ADICIONANDO BORDAR E MODIFICANDO A LARGURA  --}}
                {{-- CRIAÇÃO DE TABELA, ISSO É IMPORTANTE. --}}
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Estava estudando fora da aula sobre o uso do @forelse --}}
                    @forelse($fornecedores as $fornecedor) 
                        <tr>
                            <td>{{$fornecedor->nome}}</td>
                            <td>{{$fornecedor->site}}</td>
                            <td>{{$fornecedor->uf}}</td>
                            <td>{{$fornecedor->email}}</td>
                            {{-- PASSSANDO DOIS, PARAMETROS PARA A ROTA. --}}
                            <td><a href="{{route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></td>
                            {{-- EM EDITAR, PASSAMOS UM PARAMETRO PARA IDENTIFICAR QUAL O FORNECEDOR ESTAMOS EDITANDO--}}
                            <td><a href="{{route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p>Lista de produtos</p>
                                <table border="1" style="margin:20px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fornecedor->produtos as $produto)
                                        <tr>
                                            <td>{{$produto->id}}</td>
                                            <td>{{$produto->nome}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        @empty
                            {{"No momento não existe fornecedores, com a busca especificada."}}
                    @endforelse
                </tbody>
            </table>
            {{-- UTILIZAMOS O MÉTODO DE PAGINATE PARA FAZER A PAGINAÇÃO DA LISTA, AGORA TEMOS A PAGINAÇÃO E PODEMOS VER COM '$fornecedores->links()' --}}
            {{-- {{$fornecedores->links()}} --}}
            {{-- AO INVÉS DE USAR ISSO ACIMA, RESOLUÇÃO DO PROBLEMA ABAIXO, NO QUAL AO CLICA EM UM PAGINATE AS QUERYS SÃO RESETADAS --}}

            {{-- {{$fornecedores->links()}} --}}
            {{$fornecedores->appends($req)->links()}}
            {{-- NO INICIO FICA UMA TELA PESSIMA, MAS PODEMOS MODIFICAR O ESTILO NA PUBLIC --}}
            {{-- Total de registros por página - {{$fornecedores->count()}}
            <br>
            Total de registros da consulta - {{$fornecedores->total()}}
            <br>
            Número do primeiro registro da página - {{$fornecedores->firstItem()}} 
            <br>
            Número do ultimo registro da página - {{$fornecedores->lastItem()}} --}}
            Exibindo {{$fornecedores->count()}} fornecedores de {{$fornecedores->total()}} (de {{$fornecedores->firstItem()}} a {{$fornecedores->lastItem()}})
        </div>
    </div>
</div>
@endsection