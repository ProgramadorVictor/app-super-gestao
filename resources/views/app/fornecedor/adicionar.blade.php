@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor - Adicionar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{$msg}}
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            {{-- 
                autocomplete ="off"
                //Atributo de input, usado para formulários para, não preencher automaticamente.    
            --}}
            <form autocomplete="off" ="post" action="{{route('app.fornecedor.adicionar')}}">
                @csrf
                <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{old('nome')}}">
                {{$errors->has('nome') ? $errors->first('nome') : ''}}
                <input type="text" name="site" placeholder="Site" class="borda-preta" value="{{old('site')}}">
                {{$errors->has('site') ? $errors->first('site') : ''}}
                <input type="text" name="uf" placeholder="UF" class="borda-preta" value="{{old('uf')}}">
                {{$errors->has('uf') ? $errors->first('uf') : ''}}
                <input type="text" name="email" placeholder="E-mail" class="borda-preta" value="{{old('email')}}">
                {{$errors->has('email') ? $errors->first('email') : ''}}
                <button type="submt" class="borda-preta">Cadastrar</button>
                {{-- 
                    TEM VÁRIAS FORMAS DE FAZER UMA BOA VALIDAÇÃO, EU USO JAVASCRIPT -> JQUERY
                    1) Poderia usar esse $req->validate() é do próprio Laravel.
                    2) Fazer testes em outros sistemas.
                --}}
            </form>
        </div>
    </div>
</div>

@endsection