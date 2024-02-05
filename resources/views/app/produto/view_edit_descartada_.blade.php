{{-- ESSA VIEW FOI DESCARTADA POIS ESTAMOS USANDO A MESMA VIEW create.blade.php PARA ADICIONAR OU EDITAR. --}}
{{-- SERÁ QUE ISSO É UM BOM MÉTODO PARA O MERCADO DE TRABALHO, AS PESSOAS RECICLAM CÓDIGO? --}}

@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Editar Produto</p>
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
            <form autocomplete="off" method="post" action="{{route('produto.update', ['produto' => $produto->id] )}}">
                @csrf
                {{--  ABAIXO FICA O MÉTODO QUE VAMOS UTLIZAR SE VAMOS UTILIZAR PUT OU PATCH --}}
                @method('put')
                <input type="text" name="nome" placeholder="Nome" value="{{$produto->nome ?? old('nome')}}" class="borda-preta">
                {{$errors->has('nome') ? $errors->first('nome') : ''}}
                {{-- CASO $fornecedor->nome esteja definido ele será impresso. --}}
                {{-- Caso ocorra algum erro $errors->has(). verifica se tem algum erro e retornar o erro da variavel. --}}
                <input type="text" name="descricao" placeholder="Descrição" value="{{$produto->descricao ?? old('descricao')}}" class="borda-preta">
                {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
                <input type="text" name="peso" placeholder="Peso" value="{{$produto->peso ?? old('peso')}}" class="borda-preta">
                {{$errors->has('peso') ? $errors->first('peso') : ''}}
                <select name="unidade_id" id="">
                    <option>Selecione a unidade de medida</option>
                    @foreach($unidades as $unidade)
                        <option value="{{$unidade->id}}" {{$produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                    @endforeach
                </select>
                {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                <button type="submit" class="borda-preta">Editar</button>
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
