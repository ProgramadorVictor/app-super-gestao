@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>{{isset($produto->id) ? 'Editar' : 'Adicionar'}} Produto</p>
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
            {{-- DENTRE ESSES IF E FORM, ELE NA AULA REUTILIZOU CÓDIGO, POIS ERAM PRATICAMENTE IGUAIS, SE RECEBER ID, ELE VAI FAZER O FORMULÁRIO DE EDITAR SE NÃO ELE VAI ADICIONAR. --}}
            @if(isset($produto->id))
                <form autocomplete="off" method="post" action="{{route('produto.update', $produto->id)}}">
                    @csrf
                    @method('put')
            @else
                <form autocomplete="off" method="post" action="{{route('produto.store')}}">
                @csrf 
            @endif
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
                    <button type="submit" class="borda-preta"> {{isset($produto->id) ? 'Editar' : 'Cadastrar'}}</button>
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
