@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Produto</p>
        {{-- MODIFICAÇÃO FEITA POR MIM --}}
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{route('produto.index')}}">Voltar</a><li>
            <li><a href="">Consulta</a><li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right:auto;">
            {{-- 
                autocomplete ="off"
                //Atributo de input, usado para formulários para, não preencher automaticamente.    
            --}}
            <form autocomplete="off" method="post" action="{{route('produto.store')}}">
                {{-- SE NÃO TIVER ESSA TAG COM O NAME ID, ELE NÃO SERÁ PASSADO PARA O $REQ DO CONTROLADOR E NÃO IRA SEGUIR A LOGICA DO CÓDIGO --}}
                {{-- SE NÃO TEM O PARAMETRO ELE SEMPRE VAI ENTRA EM ADICIONAR SE TIVER O PARAMETRO PASSADO ELE VAI ENTRAR EM EDIÇÃO --}}
                {{-- ISSO É MUITO IMPORTANTE, $FORNECEDOR->ID PASSA ANTES PELO METODO EDITAR E TRAS TODOS OS PARAMETROS PARA ESSA TELA. --}}
                @csrf
                <input type="text" name="nome" placeholder="Nome" value="{{old('nome')}}" class="borda-preta">
                {{$errors->has('nome') ? $errors->first('nome') : ''}}
                {{-- CASO $fornecedor->nome esteja definido ele será impresso. --}}
                {{-- Caso ocorra algum erro $errors->has(). verifica se tem algum erro e retornar o erro da variavel. --}}
                <input type="text" name="descricao" placeholder="Descrição" value="{{old('descricao')}}" class="borda-preta">
                {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
                <input type="text" name="peso" placeholder="Peso" value="{{old('peso')}}" class="borda-preta">
                {{$errors->has('peso') ? $errors->first('peso') : ''}}
                <select name="unidade_id" id="">
                    <option>Selecione a unidade de medida</option>
                    @foreach($unidades as $unidade)
                        <option value="{{$unidade->id}}" {{old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                    @endforeach
                </select>
                {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                <button type="submit" class="borda-preta">Cadastrar</button>
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
