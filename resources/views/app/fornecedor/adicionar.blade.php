@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor ADICIONAR - {{isset($fornecedor->id) ? 'Editar' : 'Adicionar'}}</p>
        {{-- MODIFICAÇÃO FEITA POR MIM --}}
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('app.fornecedor.add')}}">Novo</a><li>
            <li><a href="{{route('app.fornecedor')}}">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{$msg ?? ''}}
        {{-- FAZEMOS TESTE AQUI O NOME DISSO ?? É  COALESCÊNCIA NULA --}}
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            {{-- 
                autocomplete ="off"
                //Atributo de input, usado para formulários para, não preencher automaticamente.    
            --}}
            <form autocomplete="off" method="post" action="{{route('app.fornecedor.add')}}">
                <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
                @csrf
                {{-- SE NÃO TIVER ESSA TAG COM O NAME ID, ELE NÃO SERÁ PASSADO PARA O $REQ DO CONTROLADOR E NÃO IRA SEGUIR A LOGICA DO CÓDIGO --}}
                {{-- SE NÃO TEM O PARAMETRO ELE SEMPRE VAI ENTRA EM ADICIONAR SE TIVER O PARAMETRO PASSADO ELE VAI ENTRAR EM EDIÇÃO --}}
                {{-- ISSO É MUITO IMPORTANTE, $FORNECEDOR->ID PASSA ANTES PELO METODO EDITAR E TRAS TODOS OS PARAMETROS PARA ESSA TELA. --}}
                <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{$fornecedor->nome ?? old('nome')}}">
                {{-- CASO $fornecedor->nome esteja definido ele será impresso. --}}
                {{$errors->has('nome') ? $errors->first('nome') : ''}}
                {{-- Caso ocorra algum erro $errors->has(). verifica se tem algum erro e retornar o erro da variavel. --}}
                <input type="text" name="site" placeholder="Site" class="borda-preta" value="{{$fornecedor->site ?? old('site')}}">
                {{$errors->has('site') ? $errors->first('site') : ''}}
                <input type="text" name="uf" placeholder="UF" class="borda-preta" value="{{$fornecedor->uf ?? old('uf')}}">
                {{$errors->has('uf') ? $errors->first('uf') : ''}}
                <input type="text" name="email" placeholder="E-mail" class="borda-preta" value="{{$fornecedor->email ?? old('email')}}">
                {{$errors->has('email') ? $errors->first('email') : ''}}
                <button type="submit" class="borda-preta">{{isset($fornecedor->id) ? 'Editar' : 'Cadastrar'}}</button>
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
{{-- ESSE CÓDIGO É ANTES DE REUTILIZAR A VIEW, PARA FAZER A FUNÇÃO EDITAR, VERIFICAR AMBAS, MUITO INTERESSANTE. --}}
{{-- 
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
        {{isset($msg)}}
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
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
            </form>
        </div>
    </div>
</div>
@endsection
--}}